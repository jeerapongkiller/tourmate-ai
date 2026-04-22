<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Dashboard.php';

$dashObj = new Dashboard();
$response = false;

// get value from ajax
$chrage_id = $_POST['chrage_id'];
$bo_id = $_POST['bo_id'];
$adult = !empty($_POST['adult']) ? $_POST['adult'] : 0;
$child = !empty($_POST['child']) ? $_POST['child'] : 0;
$infant = !empty($_POST['infant']) ? $_POST['infant'] : 0;
$note = !empty($_POST['note']) ? $_POST['note'] : '';
// $before_note = $dashObj->get_values('note', 'booking_products', 'booking_id = ' . $bo_id, 0);
// $new_note = $note . '<br>' . $before_note['note'];
// $discount = !empty($_POST['discount']) ? $_POST['discount'] : [];
// $before = !empty($_POST['before']) ? $_POST['before'] : [];

if (isset($_POST['action'])) {

    if ($chrage_id == 0 && !empty($bo_id)) {
        $response = $dashObj->insert_chrage($adult, $child, $infant, $bo_id);
    }

    if ($chrage_id > 0) {
        $response = $dashObj->update_chrage($adult, $child, $infant, $chrage_id);
    }

    $response = (!empty($note)) ? $dashObj->update_note($note, $bo_id) : $response;

    // if (!empty($discount)) {
    //     for ($i = 0; $i < count($discount); $i++) {
    //         if (empty($discount[$i]['id'])) {
    //             $response = $dashObj->insert_discount($discount[$i]['detail'], preg_replace('(,)', '', $discount[$i]['rates']), $bo_id);
    //         } elseif ($discount[$i]['id'] > 0) {
    //             $discoun_id[] = $discount[$i]['id'];
    //             $response = $dashObj->update_discount($discount[$i]['detail'], preg_replace('(,)', '', $discount[$i]['rates']), $discount[$i]['id']);
    //         }
    //     }
    //     if (!empty($before) && !empty($discoun_id)) {
    //         for ($i = 0; $i < count($before); $i++) {
    //             if (in_array($before[$i], $discoun_id) == false) {
    //                 $response = $dashObj->delete_discount($before[$i]);
    //             }
    //         }
    //     }
    // }

    echo $response;
} else {
    echo false;
}
