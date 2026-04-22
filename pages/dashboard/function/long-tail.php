<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Dashboard.php';

$dashObj = new Dashboard();

// get value from ajax
$id = $_POST['longtail_id'];
$bo_id = $_POST['longtail_bo'];
$boat_type = $_POST['boat_type'];
$adult = !empty($_POST['adult']) ? $_POST['adult'] : 0;
$rates_adult = !empty($_POST['rates_adult']) ? preg_replace('(,)', '', $_POST['rates_adult']) : 0;
$child = !empty($_POST['child']) ? $_POST['child'] : 0;
$rates_child = !empty($_POST['rates_child']) ? preg_replace('(,)', '', $_POST['rates_child']) : 0;
$infant = !empty($_POST['infant']) ? $_POST['infant'] : 0;
$rates_infant = !empty($_POST['rates_infant']) ? preg_replace('(,)', '', $_POST['rates_infant']) : 0;
$privates = !empty($_POST['unit']) ? $_POST['unit'] : 0;
$rates_private = !empty($_POST['rates_private']) ? preg_replace('(,)', '', $_POST['rates_private']) : 0;

if (isset($_POST['action']) && $_POST['action'] == 'create' && !empty($bo_id)) {

    $response = $dashObj->insert_extra($adult, $child, $infant, $privates, $rates_adult, $rates_child, $rates_infant, $rates_private, $bo_id, $extra_charge_id = 1, $boat_type);

    echo $response;
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit' && !empty($id)) {

    $response = $dashObj->update_extra($adult, $child, $infant, $privates, $rates_adult, $rates_child, $rates_infant, $rates_private, $boat_type, $id);

    echo $response;
} else {
    echo false;
}
