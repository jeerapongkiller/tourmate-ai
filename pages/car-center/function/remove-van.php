<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

// รับข้อมูล JSON จาก Frontend
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['manage_id'])) {
    $manage_id = (int)$data['manage_id'];

    // เรียกฟังก์ชันทำลายรถ
    if ($manageObj->cancel_single_manage_transfer($manage_id)) {
        echo json_encode(['status' => 'success', 'message' => 'Van removed successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to remove van']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
}
