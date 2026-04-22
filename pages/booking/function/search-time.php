<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Booking.php');

$bookObj = new Booking();

if (isset($_POST['action']) && $_POST['action'] == "search" && !empty($_POST['zone_id'])) {
    # --- get value --- #
    $product_id = !empty($_POST['product_id']) ? $_POST['product_id'] : 0;
    $zone_id = !empty($_POST['zone_id']) ? $_POST['zone_id'] : 0;

    $times = $bookObj->search_time($zone_id, $product_id);

    $times_array['start_pickup'] = !empty($times[0]['start_pickup']) ? date("H:i", strtotime($times[0]['start_pickup'])) : '00:00';
    $times_array['end_pickup'] = !empty($times[0]['end_pickup']) ?date("H:i", strtotime($times[0]['end_pickup'])) : '00:00';

    echo !empty($times_array) ? json_encode($times_array) : false;
} else {
    echo $response = false;
}