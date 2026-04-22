<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Agent.php';

$agObj = new Agent();
$response = true;

if (isset($_POST['action']) && $_POST['action'] == "create") {
    // get value from ajax
    $is_approved = $_POST['is_approved'] != "" ? $_POST['is_approved'] : 0;
    $tat_license = $_POST['tat_license'] != "" ? $_POST['tat_license'] : '';
    $name = $_POST['name'] != "" ? $_POST['name'] : '';
    $name_account = $_POST['name_account'] != "" ? $_POST['name_account'] : '';
    $email = $_POST['email'] != "" ? $_POST['email'] : '';
    $telephone = $_POST['telephone'] != "" ? $_POST['telephone'] : '';
    $address = $_POST['address'] != "" ? $_POST['address'] : '';
    $address_account = $_POST['address_account'] != "" ? $_POST['address_account'] : '';
    $contact_person = $_POST['contact_person'] != "" ? $_POST['contact_person'] : '';
    $note = $_POST['note'] != "" ? $_POST['note'] : '';
    $sale_id = !empty($_POST['sale_id']) ? $_POST['sale_id'] : 0;
    # --- get value offices form --- #
    $offices = !empty($_POST['offices']) ? $_POST['offices'] : [];

    // get details of the uploaded file
    $countfiles = count($_FILES['logo']['name']);
    $fileArray = array();

    for ($i = 0; $i < $countfiles; $i++) {
        $fileArray['fileTmpPath'][$i] = $_FILES['logo']['tmp_name'][$i];
        $fileArray['fileName'][$i] = $_FILES['logo']['name'][$i];
        $fileArray['fileSize'][$i] = $_FILES['logo']['size'][$i];
        $fileArray['fileBefore'][$i] = '';
        $fileArray['fileDelete'][$i] = 0;
    }

    $company_id = $agObj->insert_data($is_approved, $tat_license, $name, $name_account, $email, $telephone, $address, $address_account, $contact_person, $note, $sale_id, $fileArray);

    if ($offices != ''  && $company_id > 0 && $company_id != false) {
        for ($i = 0; $i < count($offices); $i++) {
            $response = ($response > 0 && $response != false) && (!empty($offices[$i]['name'])) ? $agObj->insert_offices($offices[$i]['tat_license'], $offices[$i]['name'], $offices[$i]['telephone'], $offices[$i]['address'], $company_id) : $response; // insert customers
        }
    }


    echo $response;
} else {
    echo $response = false;
}
