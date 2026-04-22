<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Agent.php';

$agObj = new Agent();

if (isset($_POST['action']) && $_POST['action'] == "edit" && isset($_POST['company_id']) && $_POST['company_id'] > 0) {
    // get value from ajax
    $company_id = $_POST['company_id'] > 0 ? $_POST['company_id'] : 0;
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
    $offices = !empty($_POST['offices']) ? $_POST['offices'] : '';

    // get details of the uploaded file
    $countfiles = count($_FILES['logo']['name']);
    $fileArray = array();

    for ($i = 0; $i < $countfiles; $i++) {
        $fileArray['fileTmpPath'][$i] = $_FILES['logo']['tmp_name'][$i];
        $fileArray['fileName'][$i] = $_FILES['logo']['name'][$i];
        $fileArray['fileSize'][$i] = $_FILES['logo']['size'][$i];
        $fileArray['fileBefore'][$i] = !empty($_POST['before_logo'][$i]) ? $_POST['before_logo'][$i] : '';
        $fileArray['fileDelete'][$i] = !empty($_POST['delete_logo'][$i]) && $_POST['delete_logo'][$i] == 1 ? $_POST['delete_logo'][$i] : 0;
    }

    if ($company_id > 0) {
        $response = $agObj->update_data($is_approved, $tat_license, $name, $name_account, $email, $telephone, $address, $address_account, $contact_person, $note, $sale_id, $fileArray, $company_id);
    }

    # ---- update offices ---- #
    if ($offices) {
        for ($i = 0; $i < count($offices); $i++) {
            if (empty($offices[$i]['id']) && !empty($offices[$i]['name'])) {
                $response = ($response > 0 && $response != false) ? $agObj->insert_offices($offices[$i]['tat_license'], $offices[$i]['name'], $offices[$i]['telephone'], $offices[$i]['address'], $company_id) : $response; // insert data officess 
            } elseif ($offices[$i]['id'] > 0 && !empty($offices[$i]['name'])) {
                $response = ($response > 0 && $response != false) ? $agObj->update_offices($offices[$i]['tat_license'], $offices[$i]['name'], $offices[$i]['telephone'], $offices[$i]['address'], $offices[$i]['id']) : $response; // update data officess
            }
        }
        if (!empty($_POST['office_before'])) {
            for ($i = 0; $i < count($_POST['office_before']); $i++) {
                $response = ($response > 0 && $response != false && !empty($_POST['office_before'][$i])) ? $agObj->delete_offices($_POST['office_before'][$i], $company_id) : $response; // delete data officess 
            }
        }
    }

    echo $response;
} else {
    echo $response = false;
}
