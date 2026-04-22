<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Invoice.php';

$invObj = new Invoice();

if (isset($_POST['action']) && $_POST['action'] == "delete" && isset($_POST['id'])) {
    // get value from ajax
    $id = !empty($_POST['id']) ? $_POST['id'] : 0;
    $inv_id = !empty($_POST['inv_id']) ? $_POST['inv_id'] : 0;
    $photo = !empty($_POST['photo']) ? $_POST['photo'] : '';

    $bookings = $invObj->get_value('booking_id as bo_id', 'invoice_bookings', 'invoice_id = ' . $inv_id, 1);

    $response = $invObj->delete_receipt($id, $photo);

    foreach ($bookings as $booking) {
        $response = $invObj->update_booking_paid('deleted', $booking['bo_id'], 6);
    }

    echo $response;
} else {
    echo $response = false;
}
