<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

// รับข้อมูล JSON จาก Frontend
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['manage_id']) && isset($data['bookings'])) {
    $manage_id = (int)$data['manage_id'];
    $bookings = $data['bookings'];

    $success_count = 0;

    // วนลูปอัปเดตทีละรายการ ตามลำดับที่ส่งมา
    foreach ($bookings as $b) {
        $arrange = (int)$b['arrange'];
        $bt_id = (int)$b['bt_id'];
        $transfer_type = $b['transfer_type'];

        // เรียกใช้ฟังก์ชันที่เราเพิ่งอัปเดตไป
        if ($manageObj->update_van_arrange($manage_id, $bt_id, $arrange, $transfer_type)) {
            $success_count++;
        }
    }

    echo json_encode([
        'status' => 'success', 
        'message' => 'Updated successfully', 
        'updated_count' => $success_count
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data payload']);
}