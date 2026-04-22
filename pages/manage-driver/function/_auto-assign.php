<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

// 💡 Helper Function: Haversine Formula (คำนวณระยะทาง)
if (!function_exists('getDistance')) {
    function getDistance($lat1, $lon1, $lat2, $lon2)
    {
        if (empty($lat1) || empty($lon1) || empty($lat2) || empty($lon2)) return 9999;
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

    // 1. เรียกใช้ Method จาก Controller แทนการเขียน SQL ตรงนี้
    $unassigned_bookings = $manageObj->get_unassigned_bookings_for_auto($travel_date);

    if (empty($unassigned_bookings)) {
        echo 'false';
        exit;
    }

    $groups = [];
    foreach ($unassigned_bookings as $row) {
        $group_key = $row['product_id'] . '_' . $row['zone_id'];
        $groups[$group_key][] = $row;
    }

    $is_success = false;

    foreach ($groups as $key => $unsorted_bookings) {
        // --- 💡 Smart Route Sorting ---
        $sorted_bookings = [];
        usort($unsorted_bookings, function ($a, $b) {
            return strcmp($a['start_pickup'], $b['start_pickup']);
        });

        $current_node = array_shift($unsorted_bookings);
        $sorted_bookings[] = $current_node;

        while (count($unsorted_bookings) > 0) {
            $nearest_idx = 0;
            $min_distance = 9999;
            foreach ($unsorted_bookings as $idx => $node) {
                $dist = getDistance($current_node['latitude'], $current_node['longitude'], $node['latitude'], $node['longitude']);
                if ($dist < $min_distance) {
                    $min_distance = $dist;
                    $nearest_idx = $idx;
                }
            }
            $current_node = $unsorted_bookings[$nearest_idx];
            $sorted_bookings[] = $current_node;
            array_splice($unsorted_bookings, $nearest_idx, 1);
        }

        // --- 💡 Bin Packing & Saving ---
        $current_van_pax = 0;
        $current_manage_id = 0;
        $arrange = 1;

        foreach ($sorted_bookings as $b) {
            $total_pax = $b['adult'] + $b['child'] + $b['foc'];
            $zone_name = !empty($b['zone_name']) ? trim($b['zone_name']) : 'ไม่ระบุโซน';

            if ($current_van_pax + $total_pax > $max_seats || $current_manage_id == 0) {
                $car_name = "Auto-" . $zone_name;
                $current_manage_id = $manageObj->insert_manage_transfer(
                    $car_name,
                    "",
                    "",
                    "",
                    $travel_date,
                    "Auto Assigned (Smart Route)",
                    $max_seats,
                    0,
                    0,
                    $b['product_id']
                );
                $current_van_pax = 0;
                $arrange = 1;
            }

            if ($current_manage_id > 0) {
                $manageObj->insert_manage_booking(
                    $arrange,
                    $b['adult'],
                    $b['child'],
                    $b['infant'],
                    $b['foc'],
                    $current_manage_id,
                    $b['bt_id']
                );
                $current_van_pax += $total_pax;
                $arrange++;
                $is_success = true;
            }
        }
    }
    echo $is_success ? 'true' : 'false';
} else {
    echo 'false';
}
