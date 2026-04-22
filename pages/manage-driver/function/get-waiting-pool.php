<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

// Helper: Haversine Formula
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
    $product_ids = $_POST['product_ids']; // ตอนนี้จะรับมาเป็น Array

    // ป้องกันกรณีส่งมาค่าเดียว
    if (!is_array($product_ids)) {
        $product_ids = [$product_ids];
    }

    $bookings = $manageObj->get_waiting_pool_bookings($travel_date, $product_ids);

    if (empty($bookings)) {
        echo json_encode(['status' => 'success', 'data' => []]);
        exit;
    }

    // 1. แยกตะกร้า (ขาไป vs ขากลับ) เพื่อเรียงเส้นทางไม่ให้ปนกัน
    $route_groups = [
        'pickup' => [],
        'return' => [] // Dropoff กับ Overnight จัดอยู่กลุ่มขากลับเหมือนกัน
    ];

    foreach ($bookings as $row) {
        // ประมวลผลว่าเป็น Join หรือ Private (เช็คจากคำว่า Private ในประเภท)
        // สามารถปรับเปลี่ยน Logic ตรงนี้ได้ตามโครงสร้าง Category ของคุณ
        $is_private = (strpos(strtolower($row['booking_type_name']), 'private') !== false || $row['category_transfer'] == 2) ? true : false;

        $row['transfer_mode'] = $is_private ? 'private' : 'join';
        $row['pax_total'] = $row['adult'] + $row['child'] + $row['foc'];
        $row['guest_display'] = !empty($row['guest_name']) ? $row['guest_name'] : 'Customer';
        if (!empty($row['nationality'])) {
            $row['guest_display'] .= ' (' . $row['nationality'] . ')';
        }

        $dir = ($row['transfer_type'] == 'pickup') ? 'pickup' : 'return';
        $route_groups[$dir][] = $row;
    }

    $final_sorted_list = [];

    // 2. จัดเรียงเส้นทางอัจฉริยะ (AI Route Sorting) ทีละทิศทาง
    foreach ($route_groups as $dir => $unsorted_bookings) {
        if (empty($unsorted_bookings)) continue;

        // ลำดับที่ 1: เรียงตามเวลา (เช้าสุดขึ้นก่อน) และพิกัดเหนือลงใต้
        usort($unsorted_bookings, function ($a, $b) {
            $time_cmp = strcmp($a['action_time'], $b['action_time']);
            if ($time_cmp === 0) {
                return $b['latitude'] <=> $a['latitude'];
            }
            return $time_cmp;
        });

        $current_node = array_shift($unsorted_bookings);
        $final_sorted_list[] = $current_node;

        // ลำดับที่ 2: ลากเส้นพิกัด Nearest Neighbor
        while (count($unsorted_bookings) > 0) {
            $nearest_idx = 0;
            $min_distance = 999999;
            foreach ($unsorted_bookings as $idx => $node) {
                $dist = getDistance($current_node['latitude'], $current_node['longitude'], $node['latitude'], $node['longitude']);
                if ($dist < $min_distance) {
                    $min_distance = $dist;
                    $nearest_idx = $idx;
                }
            }
            $current_node = $unsorted_bookings[$nearest_idx];
            $final_sorted_list[] = $current_node;
            array_splice($unsorted_bookings, $nearest_idx, 1);
        }
    }

    // ส่ง JSON กลับไปให้ Frontend
    echo json_encode([
        'status' => 'success',
        'data' => $final_sorted_list
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
}
