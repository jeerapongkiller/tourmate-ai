<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

if (isset($_POST['action']) && $_POST['action'] == "cancel_all" && !empty($_POST['travel_date'])) {
    $travel_date = $_POST['travel_date'];
    
    // เรียกใช้ฟังก์ชันล้างไพ่ที่เราเพิ่งสร้าง
    $result = $manageObj->cancel_all_manage_transfer($travel_date);
    
    echo $result ? 'true' : 'false';
} else {
    echo 'false';
}