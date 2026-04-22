<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Manage.php');

$manageObj = new Manage();
$response = false;

if (isset($_POST['action']) && $_POST['action'] == "create" && (!empty($_POST['boats']))) {
    // get value from ajax
    $boat_id = !empty($_POST['boats']) ? ($_POST['boats'] != 'outside') ? $_POST['boats'] : 0 : 0;
    $guide_id = !empty($_POST['guides']) ? ($_POST['guides'] != 'outside') ? $_POST['guides'] : 0 : 0;
    // $programe_id = !empty($_POST['programe']) ? $_POST['programe'] : 0;
    $color_id = !empty($_POST['color']) ? $_POST['color'] : 0;
    $time = !empty($_POST['time']) ? $_POST['time'] : '00:00:00';
    $outside_boat = !empty($_POST['outside_boat']) ? $_POST['outside_boat'] : '';
    $outside_guide = !empty($_POST['outside_guide']) ? $_POST['outside_guide'] : '';
    $travel_date = !empty($_POST['travel_date']) ? $_POST['travel_date'] : '0000-00-00';
    $note = !empty($_POST['note']) ? $_POST['note'] : '';
    $counter = !empty($_POST['counter']) ? $_POST['counter'] : '';

    # --- insert captain (outside) --- #
    if (!empty($_POST['outside_boat']) && ($_POST['boats'] == 'outside')) {
        $boat_id = $manageObj->insert_boat($_POST['outside_boat']);
    }

    # --- insert guide (outside) --- #
    if (!empty($_POST['outside_guide']) && ($_POST['guides'] == 'outside')) {
        $guide_id = $manageObj->insert_guide($_POST['outside_guide']);
    }

    $manage_id = $manageObj->insert_manage_boat($travel_date, $time, $counter, $note, $boat_id, $guide_id, $color_id);

    echo ($manage_id > 0 && $manage_id != false) ? $manage_id : false;
} else {
    echo $response = FALSE;
}
