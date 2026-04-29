<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

if (isset($_POST['travel_date'])) {
    $travel_date = $_POST['travel_date'];

    // 🌟 รับค่า Filter พร้อมแปลงร่างให้เป็น Array เสมอเพื่อกัน Error
    $product_ids = !empty($_POST['product_ids']) ? $_POST['product_ids'] : [];
    if (!is_array($product_ids)) {
        $product_ids = [$product_ids];
    }

    $zone_ids = !empty($_POST['zone_ids']) ? $_POST['zone_ids'] : [];
    if (!is_array($zone_ids)) {
        $zone_ids = [$zone_ids];
    }

    // ส่งค่าไปดึงข้อมูลรถ
    $vans = $manageObj->get_assigned_vans_with_bookings($travel_date, $product_ids, $zone_ids);

    if ($vans !== false) {
        echo json_encode(['status' => 'success', 'data' => $vans]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch data']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Travel date missing']);
}
