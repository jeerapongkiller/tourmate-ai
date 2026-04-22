<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Invoice.php';

$invObj = new Invoice();

if (isset($_POST['action']) && $_POST['action'] == "search" && isset($_POST['search_travel'])) {
    // get value from ajax
    $search_travel = $_POST['search_travel'] != "" ? $_POST['search_travel'] : '0000-00-00';

    $frist_agent = array();
    $frist_book  = array();
    $frist_invbook = array();
    $agents = $invObj->check_agent($search_travel);
    if (!empty($agents)) {
        foreach ($agents as $agent) {
            # --- agent --- #
            if (in_array($agent['comp_id'], $frist_agent) == false && !empty($agent['comp_id'])) {
                $frist_agent[] = $agent['comp_id'];
                $comp_arr['id'][] = $agent['comp_id'];
                $comp_arr['name'][] = $agent['comp_name'];
            }
            # --- booking invoice --- #
            if (in_array($agent['bo_id'], $frist_book) == false && !empty($agent['comp_id']) && !empty($agent['invbo_id'])) {
                $frist_book[] = $agent['bo_id'];
                $invbook_arr[$agent['comp_id']][] = $agent['bo_id'];
            }
            # --- booking --- #
            if (in_array($agent['bo_id'], $frist_invbook) == false && !empty($agent['comp_id']) && empty($agent['invbo_id'])) {
                $frist_invbook[] = $agent['bo_id'];
                $book_arr[$agent['comp_id']][] = $agent['bo_id'];
            }
        }
    }

    if (!empty($comp_arr['id'])) {
        for ($i = 0; $i < count($comp_arr['id']); $i++) {
            if (!empty($book_arr[$comp_arr['id'][$i]])) {
                $comp_arr['not'][$comp_arr['id'][$i]] = count($book_arr[$comp_arr['id'][$i]]);
            }
            if (!empty($invbook_arr[$comp_arr['id'][$i]])) {
                $comp_arr['do'][$comp_arr['id'][$i]] = count($invbook_arr[$comp_arr['id'][$i]]);
            }
        }
    }

    echo !empty($comp_arr) ? json_encode($comp_arr, true) : false;
} else {
    echo $response = false;
}
