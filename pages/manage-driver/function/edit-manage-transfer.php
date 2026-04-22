<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Manage.php');

$manageObj = new Manage();
$response = true;

$id = !empty($_POST['type_id']) ? $_POST['type_id'] : 0;
$brfore_manage_id = !empty($_POST['brfore_manage_id']) ? $_POST['brfore_manage_id'] : 0;
$bt_id = !empty($_POST['edit_bt_id']) ? $_POST['edit_bt_id'] : 0;
$manage_id = !empty($_POST['edit_manage']) ? $_POST['edit_manage'] : 0;
$adult = !empty($_POST['adult']) ? $_POST['adult'] : 0;
$child = !empty($_POST['child']) ? $_POST['child'] : 0;
$infant = !empty($_POST['infant']) ? $_POST['infant'] : 0;
$foc = !empty($_POST['foc']) ? $_POST['foc'] : 0;

if (isset($_POST['type']) && $_POST['type'] == "manage" && !empty($_POST['edit_bt_id'])) {

    if ($manage_id == 0 && $brfore_manage_id > 0) {
        $response = $manageObj->delete_manage_booking($brfore_manage_id, $bt_id);
    } elseif ($manage_id > 0 && $brfore_manage_id > 0) {
        $response = $manageObj->update_manage_booking($brfore_manage_id, 0, $manage_id, $bt_id);
    } elseif ($manage_id > 0 && $brfore_manage_id == 0) {
        $response = $manageObj->insert_manage_booking(0, $adult, $child, $infant, $foc, $manage_id, $bt_id);
    }

    echo ($response > 0 && $response != false) ? $response : false;
} elseif (isset($_POST['type']) && $_POST['type'] == "overnight" && !empty($_POST['edit_bt_id'])) {

    if ($manage_id == 0 && $brfore_manage_id > 0) {
        $response = $manageObj->delete_overnight_transfer(0, $id);
    } elseif ($brfore_manage_id > 0 && $manage_id != $brfore_manage_id) {
        $response = $manageObj->update_overnight_transfer($manage_id, $id);
    } elseif ($manage_id > 0 && $brfore_manage_id == 0) {
        $response = $manageObj->insert_overnight_transfer($bt_id, $manage_id);
    }

    echo ($response > 0 && $response != false) ? $response : false;
} elseif (isset($_POST['type']) && $_POST['type'] == "dropoff" && !empty($_POST['edit_bt_id'])) {

    if ($manage_id == 0 && $brfore_manage_id > 0) {
        $response = $manageObj->delete_dropoff_transfers(0, $id);
    } elseif ($brfore_manage_id > 0 && $manage_id != $brfore_manage_id) {
        $response = $manageObj->update_dropoff_transfers($manage_id, $id);
    } elseif ($manage_id > 0 && $brfore_manage_id == 0) {
        $response = $manageObj->insert_dropoff_transfers($bt_id, $manage_id);
    }

    echo ($response > 0 && $response != false) ? $response : false;
} else {
    echo $response = FALSE;
}
