<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

if (isset($_POST['travel_date'])) {
    $travel_date = $_POST['travel_date'];
    $vans = $manageObj->get_assigned_vans_with_bookings($travel_date);
    echo json_encode(['status' => 'success', 'data' => $vans]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No date provided']);
}
