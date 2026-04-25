<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['manage_id']) && isset($data['bt_id'])) {
    $manage_id = (int)$data['manage_id'];
    $bt_id = (int)$data['bt_id'];
    $type = $data['transfer_type'];

    if ($manageObj->remove_booking_from_van($manage_id, $bt_id, $type)) {
        echo json_encode(['status' => 'success', 'message' => 'Removed successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to remove booking']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
}
