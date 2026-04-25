<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['manage_id'])) {
    $manage_id = (int)$data['manage_id'];
    $car_id = (int)$data['car_id'];
    $driver_id = (int)$data['driver_id'];
    $seat = (int)$data['seat'];

    if ($manageObj->update_manage_transfer_info($manage_id, $car_id, $driver_id, $seat)) {
        echo json_encode(['status' => 'success', 'message' => 'Updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update database']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
}