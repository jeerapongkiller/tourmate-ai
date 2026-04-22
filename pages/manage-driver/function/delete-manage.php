<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Manage.php');

$manageObj = new Manage();

if (isset($_POST['action']) && $_POST['action'] == "delete" && (!empty($_POST['manage_id']))) {
    // get value from ajax
    $manage_id = !empty($_POST['manage_id']) ? $_POST['manage_id'] : 0;

    $response = $manageObj->delete_manage_transfer($manage_id);
    $response = $manageObj->delete_manage_booking($manage_id, 0);
    $response = $manageObj->delete_overnight_transfer($manage_id, 0);
    $response = $manageObj->delete_dropoff_transfers($manage_id, 0);

    echo $response;
} else {
    echo $response = FALSE;
}
