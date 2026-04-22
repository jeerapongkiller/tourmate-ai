<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Manage.php');

$manageObj = new Manage();

if (isset($_POST['action']) && $_POST['action'] == "edit" && !empty($_POST['manage_id'])  && !empty($_POST['product_id']) && (!empty($_POST['car']) || !empty($_POST['driver']))) {
    // get value from ajax
    $response = false;
    $id = !empty($_POST['manage_id']) ? $_POST['manage_id'] : 0;
    $product_id = !empty($_POST['product_id']) ? $_POST['product_id'] : 0;
    $car_id = !empty($_POST['car']) ? $_POST['car'] : 0;
    $seat = !empty($_POST['seat']) ? $_POST['seat'] : 0;
    $driver_id = !empty($_POST['driver'] && $_POST['driver'] != 'outside') ? $_POST['driver'] : 0;
    $license = !empty($_POST['license']) ? $_POST['license'] : '';
    $telephone = !empty($_POST['telephone']) ? $_POST['telephone'] : '';
    $travel_date = !empty($_POST['travel_date']) ? $_POST['travel_date'] : '0000-00-00';
    $note = !empty($_POST['note']) ? $_POST['note'] : '';
    $outside_driver = !empty($_POST['outside_driver']) ? $_POST['outside_driver'] : '';
    $outside_car = !empty($_POST['outside_car']) ? $_POST['outside_car'] : '';

    # --- insert car (outside) --- #
    if (!empty($_POST['outside_car']) && ($_POST['car'] == 'outside')) {
        $car = $manageObj->insert_car($_POST['outside_car']);
    }

    # --- insert driver (outside) --- #
    if (!empty($_POST['outside_driver']) && ($_POST['driver'] == 'outside')) {
        $driver = $manageObj->insert_driver($_POST['outside_driver'], $telephone, $license, $seat);
    }

    $response = $manageObj->update_manage_transfer($outside_car, $outside_driver, $license, $telephone, $note, $seat, $driver_id, $car_id, $product_id, $id);

    echo $response;
} else {
    echo $response = FALSE;
}
