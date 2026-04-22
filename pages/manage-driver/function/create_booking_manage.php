<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Manage.php');

$manageObj = new Manage();
$response = false;

if (isset($_POST['action']) && $_POST['action'] == "create" && (!empty($_POST['manage_id']))) {
    # --- get value --- #
    $manage_id = !empty($_POST['manage_id']) ? $_POST['manage_id'] : 0;
    $return = !empty($_POST['return']) ? $_POST['return'] : 0;
    $bt_id = !empty($_POST['transfer']) ? json_decode($_POST['transfer'], true) : [];
    $adult = !empty($_POST['adult']) ? json_decode($_POST['adult'], true) : [];
    $child = !empty($_POST['child']) ? json_decode($_POST['child'], true) : [];
    $infant = !empty($_POST['infant']) ? json_decode($_POST['infant'], true) : [];
    $foc = !empty($_POST['foc']) ? json_decode($_POST['foc'], true) : [];
    $bomange = !empty($_POST['bomange']) ? json_decode($_POST['bomange'], true) : [];
    $before = !empty($_POST['before']) ? json_decode($_POST['before'], true) : [];

    # --- delete booking manage --- #
    if ($manage_id != false && $manage_id > 0) {
        if (!empty($before)) {
            for ($i = 0; $i < count($before); $i++) {
                if ((in_array($before[$i], $bomange) == false)) {
                    $response = $manageObj->delete_manage_booking($manage_id, $before[$i]);
                }
            }
        }
    }
    # --- update booking transfer manage --- #
    $arrange = 1;
    if ($manage_id != false && $manage_id > 0 && !empty($bomange)) {
        for ($i = 0; $i < count($bomange); $i++) {
            $response = $manageObj->update_manage_booking(0, $arrange, $manage_id, $bomange[$i]);
            $arrange++;
        }
    }
    # --- insert booking transfer manage --- #
    if ($manage_id != false && $manage_id > 0 && !empty($bt_id)) {
        for ($i = 0; $i < count($bt_id); $i++) {
            $response = $manageObj->insert_manage_booking($arrange, $adult[$i], $child[$i], $infant[$i], $foc[$i], $manage_id, $bt_id[$i]);
            $arrange++;
        }
    }

    echo ($response > 0 && $response != false) ? $response : false;
} else {
    echo $response = FALSE;
}
