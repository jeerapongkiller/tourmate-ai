<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Invoice.php';

$invObj = new Invoice();

if (isset($_POST['action']) && $_POST['action'] == "delete" && isset($_POST['id'])) {
    // get value from ajax
    $id = !empty($_POST['id']) ? $_POST['id'] : 0;

    $bookings = $invObj->get_value('booking_id as bo_id', 'invoice_bookings', 'invoice_id = ' . $id, 1);

    $response = $invObj->delete_data($id);

    foreach ($bookings as $booking) {
        $response = $invObj->delete_invoice_bookings($booking['bo_id']);
        $response = $invObj->delete_booking_paid($booking['bo_id']);
    }

    echo $response;
} else {
    echo $response = false;
}
