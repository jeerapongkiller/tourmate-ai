<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Zone.php';

$zoneObj = new Zone();

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['action']) && $data['action'] == "save_order") {
    $ordered_ids = $data['ordered_ids'];

    if ($zoneObj->update_route_order($ordered_ids)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
}
