<?php
// header('Content-Type: application/json; charset=utf-8');
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

// Helper: Haversine Formula (คำนวณระยะทาง)
if (!function_exists('getDistance')) {
    function getDistance($lat1, $lon1, $lat2, $lon2)
    {
        if (empty($lat1) || empty($lon1) || empty($lat2) || empty($lon2)) return 999999;
        $earth_radius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        return $earth_radius * $c;
    }
}

if (isset($_POST['travel_date']) && isset($_POST['product_ids'])) {
    $travel_date = $_POST['travel_date'];
    $product_ids = $_POST['product_ids'];
    $zone_ids = (!empty($_POST['zone_ids'])) ? $_POST['zone_ids'] : [];
    if (!is_array($product_ids)) {
        $product_ids = [$product_ids];
    }
    if (!is_array($zone_ids)) {
        $zone_ids = [$zone_ids];
    }

    $bookings = $manageObj->get_waiting_pool_bookings($travel_date, $product_ids, $zone_ids);

    if (empty($bookings)) {
        echo json_encode(['status' => 'success', 'data' => [], 'summary' => ['total_vans' => 0, 'total_pax' => 0]]);
        exit;
    }

    $unsorted_bookings = [];

    // 1. เตรียมข้อมูล
    foreach ($bookings as $row) {
        $is_private = ($row['bt_type'] == 2) ? true : false;
        $row['transfer_mode'] = $is_private ? 'private' : 'join';
        $row['pax_total'] = (int)$row['remaining_pax'];
        $row['adult'] = (int)$row['sum_adult'];
        $row['child'] = (int)$row['sum_child'];
        $row['infant'] = (int)$row['sum_infant'];
        $row['foc'] = (int)$row['sum_foc'];

        $row['guest_name'] = !empty($row['guest_name']) ? $row['guest_name'] : 'Customer';
        $row['guest_phone'] = !empty($row['guest_phone']) ? $row['guest_phone'] : '-';
        $row['nationality'] = !empty($row['nationality']) ? $row['nationality'] : '-';
        $row['country'] = !empty($row['country_code']) ? '<i class="flag-icon flag-icon-' . strtolower($row['country_code']) . ' mr-50"></i>' : '';
        $row['hotel_name'] = (!empty($row['hotel_name'])) ? $row['hotel_name'] : $row['hotel_pickup'];
        $row['action_time'] = ($row['action_time'] != '00:00:00' && !empty($row['action_time'])) ? date('H:i', strtotime($row['action_time'])) : '-';

        // 🌟 ดึงค่าเส้นทาง (ถ้าไม่ได้ตั้งไว้ให้ไปอยู่ลำดับ 999 ท้ายสุด)
        $row['zone_route_order'] = isset($row['zone_route_order']) ? (int)$row['zone_route_order'] : 999;

        $unsorted_bookings[] = $row;
    }

    $final_sorted_list = [];

    // 🌟 2. จัดเรียงเส้นทางอัจฉริยะแบบ Hybrid (Zone Sequence + Nearest Neighbor)
    if (count($unsorted_bookings) > 0) {

        // 2.1 จัดกลุ่ม Booking ตามลำดับโซน (route_order)
        $grouped_by_zone = [];
        foreach ($unsorted_bookings as $node) {
            $grouped_by_zone[$node['zone_route_order']][] = $node;
        }

        // 2.2 เรียงลำดับก้อนโซนจากบนลงล่าง (เช่น 10, 20, 30...)
        ksort($grouped_by_zone);

        // 2.3 จัดการลากเส้นพิกัด "ภายในแต่ละโซน" ให้ต่อเนื่องกัน
        foreach ($grouped_by_zone as $zone_order => $zone_bookings) {

            // หาจุดเริ่มต้นของโซนนี้ (เอาคนที่เวลารับเช้าสุดขึ้นก่อน หรือพิกัดอยู่เหนือสุด)
            usort($zone_bookings, function ($a, $b) {
                $time_cmp = strcmp($a['action_time'], $b['action_time']);
                if ($time_cmp === 0) {
                    return $b['latitude'] <=> $a['latitude']; // ถ้าเวลาเท่ากัน เอาเหนือสุดขึ้นก่อน
                }
                return $time_cmp;
            });

            // ดึงคนแรกออกมาเป็นจุดตั้งต้นของโซนนี้
            $current_node = array_shift($zone_bookings);
            $final_sorted_list[] = $current_node;

            // ลากเส้นหาจุดที่ใกล้ที่สุดภายในโซนเดียวกัน (Nearest Neighbor)
            while (count($zone_bookings) > 0) {
                $nearest_idx = 0;
                $min_distance = 999999;

                foreach ($zone_bookings as $idx => $node) {
                    // คำนวณระยะห่างด้วย Haversine Formula
                    $dist = getDistance($current_node['latitude'], $current_node['longitude'], $node['latitude'], $node['longitude']);

                    if ($dist < $min_distance) {
                        $min_distance = $dist;
                        $nearest_idx = $idx;
                    }
                }

                // ขยับไปจุดที่ใกล้ที่สุด
                $current_node = $zone_bookings[$nearest_idx];
                $final_sorted_list[] = $current_node;

                // เอาจุดที่จัดแล้วออกจากตะกร้าย่อย
                array_splice($zone_bookings, $nearest_idx, 1);
            }
        }
    }

    // 🌟 ดึงข้อมูลสรุปยอดรถที่จัดแล้ว
    $summary = $manageObj->get_assigned_van_summary($travel_date);

    // 3. ส่งกลับให้ Frontend
    echo json_encode([
        'status' => 'success',
        'data' => $final_sorted_list,
        'summary' => $summary // 🌟 แนบข้อมูลสรุปกลับไปด้วย
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
}
