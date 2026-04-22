<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

// 💡 1. ตั้งค่ารัศมีทำการ (กิโลเมตร) สำหรับการดึงโซนอื่นมาแจม
$MAX_RADIUS_KM = 5;

// 💡 2. Helper: คำนวณระยะทาง Lat/Lng (Haversine Formula)
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

if (isset($_POST['action']) && $_POST['action'] == "auto_assign" && !empty($_POST['travel_date'])) {
    $travel_date = $_POST['travel_date'];
    $max_seats = 12;

    $all_bookings = $manageObj->get_all_transfer_bookings_for_auto($travel_date);
    if (empty($all_bookings)) {
        echo 'false';
        exit;
    }

    $vans = [];
    $unassigned_groups = [];

    // 💡 3. กวาดข้อมูลแยกรถที่จัดแล้ว กับยังไม่จัด
    foreach ($all_bookings as $row) {
        $total_pax = $row['adult'] + $row['child'] + $row['foc'];
        $direction = ($row['transfer_type'] == 'pickup') ? 'pickup' : 'return';

        if (!empty($row['manage_id'])) {
            // ดึงข้อมูลรถเก่า
            $m_id = $row['manage_id'];
            if (!isset($vans[$m_id])) {
                $vans[$m_id] = [
                    'manage_id' => $m_id,
                    'product_id' => $row['product_id'],
                    'direction' => $direction,
                    'zone_id' => $row['zone_id'], // ยึดโซนหลักของรถคันนี้
                    'current_pax' => 0,
                    'max_seats' => !empty($row['max_seats']) ? $row['max_seats'] : $max_seats,
                    'hotels_coords' => [], // เก็บพิกัดทุกโรงแรมในรถคันนี้
                    'bookings' => []
                ];
            }
            $vans[$m_id]['current_pax'] += $total_pax;
            $vans[$m_id]['hotels_coords'][] = ['lat' => $row['latitude'], 'lng' => $row['longitude']];
            $vans[$m_id]['bookings'][] = $row;
        } else {
            // กองที่ยังไม่มีรถ (จับกลุ่มตาม โซน + โปรแกรม + ทิศทาง)
            $group_key = $row['product_id'] . '_' . $direction . '_' . $row['zone_id'];
            $unassigned_groups[$group_key][] = $row;
        }
    }

    $vans_to_resort = [];
    $is_success = false;

    // 💡 4. เริ่มจับคนใส่รถ
    foreach ($unassigned_groups as $group_key => $bookings_in_group) {

        // จัดเรียงคิวคร่าวๆ ก่อนเอาขึ้นรถ (เวลาเช้าสุด -> พิกัดเหนือสุด)
        usort($bookings_in_group, function ($a, $b) {
            $time_cmp = strcmp($a['action_time'], $b['action_time']);
            if ($time_cmp === 0) {
                return $b['latitude'] <=> $a['latitude']; // Latitude DESC (North to South)
            }
            return $time_cmp;
        });

        foreach ($bookings_in_group as $b) {
            $b_pax = $b['adult'] + $b['child'] + $b['foc'];
            $target_product = $b['product_id'];
            $target_direction = ($b['transfer_type'] == 'pickup') ? 'pickup' : 'return';
            $assigned = false;

            // สอดแนมรถเก่า
            foreach ($vans as $m_id => &$van) {
                if ($van['product_id'] == $target_product && $van['direction'] == $target_direction) {
                    if ($van['current_pax'] + $b_pax <= $van['max_seats']) {

                        $is_eligible = false;

                        // เงื่อนไข 1: เป็นโซนเดียวกัน (ขึ้นรถได้เลย)
                        if ($van['zone_id'] == $b['zone_id']) {
                            $is_eligible = true;
                        } else {
                            // เงื่อนไข 2: คนละโซน แต่มีโรงแรมใดโรงแรมหนึ่งในรถ ห่างไม่เกิน 5 กม.
                            foreach ($van['hotels_coords'] as $coord) {
                                $dist = getDistance($b['latitude'], $b['longitude'], $coord['lat'], $coord['lng']);
                                if ($dist <= $MAX_RADIUS_KM) {
                                    $is_eligible = true;
                                    break;
                                }
                            }
                        }

                        if ($is_eligible) {
                            if ($b['transfer_type'] == 'pickup') {
                                $manageObj->insert_manage_booking(99, $b['adult'], $b['child'], $b['infant'], $b['foc'], $m_id, $b['bt_id']);
                            } elseif ($b['transfer_type'] == 'dropoff') {
                                $manageObj->insert_dropoff_transfers($b['bt_id'], $m_id);
                            } elseif ($b['transfer_type'] == 'overnight') {
                                $manageObj->insert_overnight_transfer($b['bt_id'], $m_id);
                            }

                            $van['current_pax'] += $b_pax;
                            $van['hotels_coords'][] = ['lat' => $b['latitude'], 'lng' => $b['longitude']];
                            $van['bookings'][] = $b;
                            $vans_to_resort[$m_id] = $van;
                            $assigned = true;
                            $is_success = true;
                            break;
                        }
                    }
                }
            }

            // ถ้าไม่มีรถคันไหนรับได้ ต้อง "เปิดรถใหม่"
            if (!$assigned) {
                $prefix = ($target_direction == 'return') ? "Auto-Return-" : "Auto-";
                $zone_name = !empty($b['zone_name']) ? trim($b['zone_name']) : 'Zone';
                $car_name = $prefix . $zone_name;

                $new_m_id = $manageObj->insert_manage_transfer(
                    $car_name,
                    "",
                    "",
                    "",
                    $travel_date,
                    "Auto Assigned",
                    $max_seats,
                    0,
                    0,
                    $target_product
                );

                if ($new_m_id > 0) {
                    if ($b['transfer_type'] == 'pickup') {
                        $manageObj->insert_manage_booking(1, $b['adult'], $b['child'], $b['infant'], $b['foc'], $new_m_id, $b['bt_id']);
                    } elseif ($b['transfer_type'] == 'dropoff') {
                        $manageObj->insert_dropoff_transfers($b['bt_id'], $new_m_id);
                    } elseif ($b['transfer_type'] == 'overnight') {
                        $manageObj->insert_overnight_transfer($b['bt_id'], $new_m_id);
                    }

                    $vans[$new_m_id] = [
                        'manage_id' => $new_m_id,
                        'product_id' => $target_product,
                        'direction' => $target_direction,
                        'zone_id' => $b['zone_id'],
                        'current_pax' => $b_pax,
                        'max_seats' => $max_seats,
                        'hotels_coords' => [['lat' => $b['latitude'], 'lng' => $b['longitude']]],
                        'bookings' => [$b]
                    ];
                    $vans_to_resort[$new_m_id] = &$vans[$new_m_id];
                    $is_success = true;
                }
            }
        }
    }

    // 💡 5. Re-sort เส้นทางในรถ (กวาดทิศเหนือลงทิศใต้ สำหรับเวลาที่เท่ากัน)
    foreach ($vans_to_resort as $m_id => $van) {
        if ($van['direction'] != 'pickup') continue;

        $unsorted_bookings = $van['bookings'];

        usort($unsorted_bookings, function ($a, $b) {
            // เรียงลำดับที่ 1: เวลารับ (น้อยไปมาก)
            $time_cmp = strcmp($a['action_time'], $b['action_time']);

            // เรียงลำดับที่ 2: ถ้าเวลารับเท่ากัน ให้เรียงพิกัด (เหนือลงใต้)
            if ($time_cmp === 0) {
                // พิกัด Latitude ยิ่งมากแปลว่ายิ่งอยู่ทิศเหนือ 
                // ใช้ <=> คืนค่า 1, 0, -1 สำหรับเปรียบเทียบ
                return $b['latitude'] <=> $a['latitude'];
            }
            return $time_cmp;
        });

        // อัปเดตคิวเรียงลำดับลง Database
        $arrange = 1;
        foreach ($unsorted_bookings as $b) {
            $manageObj->update_bmt_arrange($m_id, $b['bt_id'], $arrange);
            $arrange++;
        }
    }

    echo $is_success ? 'true' : 'false';
} else {
    echo 'false';
}
