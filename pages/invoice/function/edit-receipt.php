<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Invoice.php');

$recObj = new Invoice();
$response = true;
$today = date("Y-m-d");
$times = date("H:i:s");

function setNumberLength($num, $length)
{
    $sumstr = strlen($num);
    $zero = str_repeat("0", $length - $sumstr);
    $results = $zero . $num;

    return $results;
}

if (isset($_POST['action']) && $_POST['action'] == "edit" && (isset($_POST['rec_id']))) {
    # --- get value --- #
    $rec_id = !empty($_POST['rec_id']) ? $_POST['rec_id'] : 0;
    $is_approved = !empty($_POST['rec_approved']) ? $_POST['rec_approved'] : 0;
    $rec_date = $_POST['rec_date'] != "" ? $_POST['rec_date'] : '';
    $payment_id = !empty($_POST['payments_type']) ? $_POST['payments_type'] : 0;
    $bank_account_id = !empty($_POST['bank_account']) ? $_POST['bank_account'] : 0;
    $bank_cheque_id = !empty($_POST['rec_bank']) ? $_POST['rec_bank'] : 0;
    $cheque_no = !empty($_POST['check_no']) && is_int($_POST['check_no']) ? $_POST['check_no'] : 0;
    $cheque_date = !empty($_POST['date_check']) ? $_POST['date_check'] : 0;
    $amount = !empty($_POST['amount']) ? $_POST['amount'] : 0;
    $note = $_POST['rec_note'] != "" ? $_POST['rec_note'] : '';

    // get details of the uploaded file
    $countfiles = count($_FILES['photo']['name']);
    $fileArray = array();

    for ($i = 0; $i < $countfiles; $i++) {
        $fileArray['fileTmpPath'][$i] = $_FILES['photo']['tmp_name'][$i];
        $fileArray['fileName'][$i] = $_FILES['photo']['name'][$i];
        $fileArray['fileSize'][$i] = $_FILES['photo']['size'][$i];
        $fileArray['fileBefore'][$i] = !empty($_POST['before_photo'][$i]) ? $_POST['before_photo'][$i] : '';
        $fileArray['fileDelete'][$i] = !empty($_POST['delete_photo'][$i]) && $_POST['delete_photo'][$i] == 1 ? $_POST['delete_photo'][$i] : 0;
    }

    $response = $recObj->update_receipt($rec_date, $cheque_no, $cheque_date, $bank_account_id, $bank_cheque_id, $payment_id, $is_approved, $note, $fileArray, $rec_id);

    echo $response != false && $response > 0 ? $response : false;
} else {
    echo $response = false;
}
