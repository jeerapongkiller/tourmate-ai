<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Dashboard.php';

$dashObj = new Dashboard();

if (isset($_POST['action']) && !empty($_POST['id'])) {
    // get value from ajax

    $response = $dashObj->update_status($_POST['action'], $_POST['id'], $_POST['status']);

    echo $response;
} else {
    echo false;
}
