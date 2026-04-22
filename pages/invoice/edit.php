<?php
include_once('controllers/Invoice.php');

$invObj = new Invoice();
$today = date("Y-m-d");
$nextday = date("Y-m-d", strtotime(" +1 day"));
$times = date("H:i:s");

function diff_date($today, $diff_date)
{
    $diff_inv = array();
    $date1 = date_create($today);
    $date2 = date_create($diff_date);
    $diff = date_diff($date1, $date2);
    $diff_inv['day'] =  $diff->format("%R%a");
    $diff_inv['num'] =  $diff->format("%a");

    return $diff_inv;
}

function bahtText(float $amount): string
{
    [$integer, $fraction] = explode('.', number_format(abs($amount), 2, '.', ''));

    $baht = convert($integer);
    $satang = convert($fraction);

    $output = $amount < 0 ? 'ติดลบ' : '';
    $output .= $baht ? $baht . 'บาท' : '';
    $output .= $satang ? $satang . 'สตางค์' : 'ถ้วน';

    return $baht . $satang === '' ? 'ศูนย์บาทถ้วน' : $output;
}

function convert(string $number): string
{
    $values = ['', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า'];
    $places = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
    $exceptions = ['หนึ่งสิบ' => 'สิบ', 'สองสิบ' => 'ยี่สิบ', 'สิบหนึ่ง' => 'สิบเอ็ด'];

    $output = '';

    foreach (str_split(strrev($number)) as $place => $value) {
        if ($place % 6 === 0 && $place > 0) {
            $output = $places[6] . $output;
        }

        if ($value !== '0') {
            $output = $values[$value] . $places[$place % 6] . $output;
        }
    }

    foreach ($exceptions as $search => $replace) {
        $output = str_replace($search, $replace, $output);
    }

    return $output;
}

$id = !empty($_GET['id']) ? $_GET['id'] : 0;
if (!empty($id)) {
    $invoices = $invObj->get_data($id);

    $no = 0;
    $amount = 0;
    $sum_total = 0;
    $first_inv = array();
    $first_booking = array();
    $first_extar = array();
    $first_bpr = array();
    $first_disc = array();
    if (!empty($invoices)) {
        foreach ($invoices as $invoice) {
            # --- get value booking --- #
            if (in_array($invoice['id'], $first_inv) == false) {
                $first_inv[] = $invoice['id'];
                $inv_id = !empty($invoice['id']) ? $invoice['id'] : 0;
                $inv_full = !empty($invoice['inv_full']) ? $invoice['inv_full'] : '';
                $withholding = !empty($invoice['withholding']) ? $invoice['withholding'] : 0;
                $vat_id = !empty($invoice['vat_id']) ? $invoice['vat_id'] : 0;
                $date_from = !empty($invoice['date_from']) ? $invoice['date_from'] : '0000-00-00';
                $date_to = !empty($invoice['date_to']) ? $invoice['date_to'] : '0000-00-00';
                $date_inv = !empty($invoice['date_inv']) ? $invoice['date_inv'] : '0000-00-00';
                $due_date = !empty($invoice['due_date']) ? $invoice['due_date'] : '0000-00-00';
                $is_approved = !empty($invoice['is_approved']) ? $invoice['is_approved'] : 0;
                $note = !empty($invoice['note']) ? $invoice['note'] : '';

                $comp_id = !empty($invoice['comp_id']) ? $invoice['comp_id'] : 0;
                $office_id = !empty($invoice['office_id']) ? $invoice['office_id'] : 0;
                $agent_name = !empty($invoice['comp_name']) ? $invoice['comp_name'] : '';
                $agent_license = !empty($invoice['tat_license']) ? $invoice['tat_license'] : '';
                $agent_telephone = !empty($invoice['comp_telephone']) ? $invoice['comp_telephone'] : '';
                $agent_address = !empty($invoice['comp_address']) ? $invoice['comp_address'] : '';
                $office_name = !empty($invoice['office_name']) ? $invoice['office_name'] : '';
                $banacc_id = !empty($invoice['banacc_id']) ? $invoice['banacc_id'] : 0;
                $account_name = !empty($invoice['account_name']) ? $invoice['account_name'] : '';
                $account_no = !empty($invoice['account_no']) ? $invoice['account_no'] : '';
                $bank_name = !empty($invoice['bank_name']) ? $invoice['bank_name'] : '';

                $rec_id = !empty($invoice['rec_id']) ? $invoice['rec_id'] : 0;
                $rec_approved = !empty($invoice['rec_approved']) ? $invoice['rec_approved'] : 0;
                $rec_full = !empty($invoice['rec_full']) ? $invoice['rec_full'] : '';
                $rec_date = !empty($invoice['date_rec']) ? $invoice['date_rec'] : '0000-00-00';
                $cheque_no = !empty($invoice['cheque_no']) ? $invoice['cheque_no'] : '';
                $cheque_date = !empty($invoice['cheque_date']) ? $invoice['cheque_date'] : '0000-00-00';
                $rec_note = !empty($invoice['rec_note']) ? $invoice['rec_note'] : '';
                $payt_id = !empty($invoice['payment_id']) ? $invoice['payment_id'] : 0;
                $payment_name = !empty($invoice['payment_name']) ? $invoice['payment_name'] : '';
                $rec_account = !empty($invoice['rec_account']) ? $invoice['rec_account'] : 0;
                $rec_acc_name = !empty($invoice['rec_acc_name']) ? $invoice['rec_acc_name'] : '';
                $rec_acc_no = !empty($invoice['rec_acc_no']) ? $invoice['rec_acc_no'] : '';
                $bank_cheque = !empty($invoice['bank_cheque']) ? $invoice['bank_cheque'] : 0;
                $bank_cheque_name = !empty($invoice['bank_cheque_name']) ? $invoice['bank_cheque_name'] : '';
                $rec_photo = !empty($invoice['rec_photo']) ? $invoice['rec_photo'] : '';
            }
            # --- get value booking --- #
            if (in_array($invoice['bo_id'], $first_booking) == false) {
                $first_booking[] = $invoice['bo_id'];
                $bo_id[] = !empty($invoice['bo_id']) ? $invoice['bo_id'] : 0;
                $status[] = !empty($invoice['booksta_id']) ? $invoice['booksta_id'] : 0;
                $status_name[] = !empty($invoice['booksta_name']) ? $invoice['booksta_name'] : '';
                $travel_date[] = !empty($invoice['travel_date']) ? $invoice['travel_date'] : '0000-00-00';
                $cot[] = !empty($invoice['total_paid']) ? $invoice['total_paid'] : 0;
                $start_pickup[] = !empty($invoice['start_pickup']) ? date('H:i', strtotime($invoice['start_pickup'])) : '00:00:00';
                $car_name[] = !empty($invoice['car_name']) ? $invoice['car_name'] : '';
                $cus_name[] = !empty($invoice['cus_name']) ? $invoice['cus_name'] : '';
                $book_full[] = !empty($invoice['book_full']) ? $invoice['book_full'] : '';
                $voucher_no[] = !empty($invoice['voucher_no_agent']) ? $invoice['voucher_no_agent'] : '';
                $pickup_type[] = !empty($invoice['pickup_type']) ? $invoice['pickup_type'] : 0;
                $room_no[] = !empty($invoice['room_no']) ? $invoice['room_no'] : '-';
                $hotel_pickup[] = !empty($invoice['pickup_name']) ? $invoice['pickup_name'] : $invoice['outside'];
                $zone_pickup[] = !empty($invoice['zonep_name']) ? ' (' . $invoice['zonep_name'] . ')' : '';
                $hotel_dropoff[] = !empty($invoice['dropoff_name']) ? $invoice['dropoff_name'] : $invoice['outside_dropoff'];
                $zone_dropoff[] = !empty($invoice['zoned_name']) ? ' (' . $invoice['zoned_name'] . ')' : '';
                $bp_note[] = !empty($invoice['bp_note']) ? $invoice['bp_note'] : '';
                $product_name[] = !empty($invoice['product_name']) ? $invoice['product_name'] : '';
                $discount[] = !empty($invoice['discount']) ? $invoice['discount'] : 0;

                $chrage_id[] = !empty($invoice['chrage_id']) ? $invoice['chrage_id'] : 0;
                $chrage_adult[] = !empty($invoice['chrage_adult']) ? $invoice['chrage_adult'] : 0;
                $chrage_child[] = !empty($invoice['chrage_child']) ? $invoice['chrage_child'] : 0;
                $chrage_infant[] = !empty($invoice['chrage_infant']) ? $invoice['chrage_infant'] : 0;
            }
            # --- get value rates --- #
            if ((in_array($invoice['bpr_id'], $first_bpr) == false) && !empty($invoice['bpr_id'])) {
                $first_bpr[] = $invoice['bpr_id'];
                $bpr_id[$invoice['bo_id']][] = !empty($invoice['bpr_id']) ? $invoice['bpr_id'] : 0;
                $category_id[$invoice['bo_id']][] = !empty($invoice['category_id']) ? $invoice['category_id'] : 0;
                $category_name[$invoice['bo_id']][] = !empty($invoice['category_name']) ? $invoice['category_name'] : 0;
                $category_cus[$invoice['bo_id']][] = !empty($invoice['category_cus']) ? $invoice['category_cus'] : 0;
                $adult[$invoice['bo_id']][] = !empty($invoice['adult']) ? $invoice['adult'] : 0;
                $child[$invoice['bo_id']][] = !empty($invoice['child']) ? $invoice['child'] : 0;
                $infant[$invoice['bo_id']][] = !empty($invoice['infant']) ? $invoice['infant'] : 0;
                $foc[$invoice['bo_id']][] = !empty($invoice['foc']) ? $invoice['foc'] : 0;
                $rate_adult[$invoice['bo_id']][] = !empty($invoice['rates_adult']) && $invoice['adult'] > 0 ? $invoice['rates_adult'] : 0;
                $rate_child[$invoice['bo_id']][] = !empty($invoice['rates_child']) && $invoice['child'] > 0 ? $invoice['rates_child'] : 0;
                $rate_infant[$invoice['bo_id']][] = !empty($invoice['rate_infant']) && $invoice['infant'] > 0 ? $invoice['rate_infant'] : 0;
                $total[$invoice['bo_id']][] = $invoice['booktye_id'] == 1 ? ($invoice['booksta_id'] != 3 && $invoice['booksta_id'] != 5) ? ($invoice['adult'] * $invoice['rates_adult']) + ($invoice['child'] * $invoice['rates_child'] + $invoice['infant'] * $invoice['rates_infant']) : $invoice['rates_private'] : $invoice['rates_private'];
                // $total[$invoice['bo_id']][] = ($invoice['booktye_id'] == 1) ? ($invoice['adult'] * $invoice['rates_adult']) + ($invoice['child'] * $invoice['rates_child']) : $invoice['rates_private'];
            }
            # --- get value booking --- #
            if (in_array($invoice['bec_id'], $first_extar) == false && !empty($invoice['bec_id'])) {
                $first_extar[] = $invoice['bec_id'];
                $bec_id[$invoice['bo_id']][] = !empty($invoice['bec_id']) ? $invoice['bec_id'] : 0;
                $bec_name[$invoice['bo_id']][] = !empty($invoice['extra_name']) ? $invoice['extra_name'] : $invoice['bec_name'];
                $bec_adult[$invoice['bo_id']][] = !empty($invoice['bec_adult']) ? $invoice['bec_adult'] : $invoice['bec_privates'];
                $bec_child[$invoice['bo_id']][] = !empty($invoice['bec_child']) ? $invoice['bec_child'] : 0;
                $bec_rate_adult[$invoice['bo_id']][] = !empty($invoice['bec_rate_adult']) && $invoice['bec_adult'] > 0 ? $invoice['bec_rate_adult'] : 0;
                $bec_rate_child[$invoice['bo_id']][] = !empty($invoice['bec_rate_child']) && $invoice['bec_child'] > 0 ? $invoice['bec_rate_child'] : 0;
                $bec_privates[$invoice['bo_id']][] = !empty($invoice['bec_privates']) ? $invoice['bec_privates'] : 0;
                $bec_rate_private[$invoice['bo_id']][] = !empty($invoice['bec_rate_private']) && $invoice['bec_privates'] > 0 ? $invoice['bec_rate_private'] : 0;
                $bec_total[$invoice['bo_id']][] = $invoice['bec_type'] == 1 ? ($invoice['bec_adult'] * $invoice['bec_rate_adult']) + ($invoice['bec_child'] * $invoice['bec_rate_child']) : ($invoice['bec_privates'] * $invoice['bec_rate_private']);
            }
            # --- get value discount --- #
            if (in_array($invoice['discount_id'], $first_disc) == false && !empty($invoice['discount_id'])) {
                $first_disc[] = $invoice['discount_id'];
                $discount_id[$invoice['bo_id']][] = !empty($invoice['discount_id']) ? $invoice['discount_id'] : 0;
                $discount_detail[$invoice['bo_id']][] = !empty($invoice['discount_detail']) ? $invoice['discount_detail'] : '';
                $discount_rates[$invoice['bo_id']][] = !empty($invoice['discount_rates']) ? $invoice['discount_rates'] : 0;
            }
        }
    }
}
?>
<style>
    #invoice-preview,
    #receipt-preview {
        background-color: #fff;
    }

    #invoice-preview .table-black td,
    #receipt-preview .table-black td {
        color: #FFFFFF;
        background-color: <?php echo ($vat_id > 0) ? '#960007' : '#003285'; ?>;
        padding: 0.7rem;
    }

    #invoice-preview .table-black-2 td,
    #receipt-preview .table-black-2 td {
        color: #FFFFFF;
        background-color: <?php echo ($vat_id > 0) ? '#ff3f49' : '#0060ff'; ?>;
        padding: 0.5rem;
    }

    #invoice-preview .table-content td,
    #receipt-preview .table-content td {
        border: 1px solid #000;
        font-size: 14px;
        color: #000;
        padding: 0.72rem 2rem
    }
</style>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Invoice</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item btn-page-block-spinner"><a href="./?pages=invoice/list">Invoice List</a></li>
                                <li class="breadcrumb-item active"><b><?php echo $invoices[0]['inv_full']; ?></b></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Vertical Wizard -->
            <section class="horizontal-wizard">
                <div class="bs-stepper horizontal-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#preview-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Preview</span>
                                    <span class="bs-stepper-subtitle">Please fill out</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#details-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Invoice Details</span>
                                    <span class="bs-stepper-subtitle">Please fill out</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#payments-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">ข้อมูลการชำระ</span>
                                    <span class="bs-stepper-subtitle">Please fill out</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#record-vertical" hidden>
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">ข้อมูลประวัติ</span>
                                    <span class="bs-stepper-subtitle">Please fill out</span>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="bs-stepper-content">
                        <!-- Start Voucher Preview Vertical -->
                        <!------------------------------------------------------------------>
                        <div id="preview-vertical" class="content">
                            <div class="d-flex justify-content-between">
                                <span>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="preview1" name="preview" class="custom-control-input" value="1" checked onclick="togglePreview();">
                                        <label class="custom-control-label" for="preview1">Invoice</label>
                                    </div>
                                    <div class="custom-control custom-radio" <?php echo empty($rec_id) ? 'hidden' : ''; ?>>
                                        <input type="radio" id="preview2" name="preview" class="custom-control-input" value="2" onclick="togglePreview();">
                                        <label class="custom-control-label" for="preview2">Receipt</label>
                                    </div>
                                </span>
                                <button type="button" class="btn btn-info" id="btnCopy"><i data-feather='copy'></i> Copy</button>
                            </div>
                            <hr class="p-0">
                            <?php if (!empty($id)) { ?>
                                <div class="card-body invoice-padding pb-0" id="invoice-preview">
                                    <!-- Header starts -->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="brand-logo"><img src="app-assets/images/logo/logo-500.png" height="120"></span>
                                        </div>
                                        <div class="col-6 text-right mt-md-0 mt-2">
                                            <span style="color: #000;">
                                                <?php echo $main_document; ?>
                                            </span>
                                            <table width="100%" class="mt-50">
                                                <tr class="table-content">
                                                    <th rowspan="2" class="text-center" style="background-color: <?php echo ($vat_id > 0) ? '#960007' : '#003285'; ?>; color: #fff; border-radius: 15px 0px 0px 0px;">
                                                        ใบแจ้งหนี้ / INVOICE
                                                    </th>
                                                    <td class="text-center">
                                                        INVOICE NO.
                                                    </td>
                                                </tr>
                                                <tr class="table-content">
                                                    <td class="text-center">
                                                        <?php echo $inv_full; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Header ends -->
                                    <?php if ($inv_id > 0) { ?>
                                        <table width="100%" class="mt-1">
                                            <tr class="table-content">
                                                <td width="34%" align="left" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-4 text-right">
                                                            Company
                                                        </dt>
                                                        <dd class="col-sm-8"><?php echo $agent_name; ?></dd>
                                                    </dl>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-4 text-right">
                                                            Address
                                                        </dt>
                                                        <dd class="col-sm-8"><?php echo $agent_address; ?></dd>
                                                    </dl>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-4 text-right">
                                                            Tel
                                                        </dt>
                                                        <dd class="col-sm-8"><?php echo $agent_telephone; ?></dd>
                                                    </dl>
                                                </td>
                                                <td width="34%" align="left" colspan="2">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-6 text-right">
                                                            Tax ID.
                                                        </dt>
                                                        <dd class="col-sm-6"><?php echo $agent_license; ?></dd>
                                                    </dl>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-6 text-right">
                                                            สำนักงาน
                                                        </dt>
                                                        <dd class="col-sm-6"><?php echo $office_name; ?></dd>
                                                    </dl>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-6 text-right">
                                                            Departure Date
                                                        </dt>
                                                        <dd class="col-sm-6"><?php echo date('j F Y', strtotime($date_inv)); ?></dd>
                                                    </dl>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-6 text-right">
                                                            Due Date
                                                        </dt>
                                                        <dd class="col-sm-6"><?php echo date('j F Y', strtotime($due_date)); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%" class="mt-1">
                                            <tr class="table-black">
                                                <td class="text-center" style="border-radius: 15px 0px 0px 0px;" width="3%"><b>เลขที่</b></td>
                                                <td class="text-center"><b>วันที่เดินทาง</b></td>
                                                <td class="text-center"><b>ชื่อลูกค้า</b></td>
                                                <td class="text-center"><b>โปรแกรม</b></td>
                                                <td class="text-center"><b>หมายเลข</b></td>
                                                <td class="text-center" colspan="2"><b>จํานวน</b></td>
                                                <td class="text-center" colspan="2"><b>ราคาต่อหน่วย</b></td>
                                                <td class="text-center"><b>จำนวนเงิน</b></td>
                                                <td class="text-center" style="border-radius: 0px 15px 0px 0px;"><b>Cash on tour</b></td>
                                            </tr>
                                            <tr class="table-black-2">
                                                <td class="text-center"><small>Items</small></td>
                                                <td class="text-center"><small>Date</small></td>
                                                <td class="text-center"><small>Customer's name</small></td>
                                                <td class="text-center"><small>Programe</small></td>
                                                <td class="text-center"><small>Voucher No.</small></td>
                                                <td class="text-center"><small>Adult</small></td>
                                                <td class="text-center"><small>Child</small></td>
                                                <td class="text-center"><small>Adult</small></td>
                                                <td class="text-center"><small>Child</small></td>
                                                <td class="text-center"><small>Amounth</small></td>
                                                <td class="text-center"><small>เงินมัดจำ</small></td>
                                            </tr>
                                            <?php
                                            $amount = 0;
                                            $discount = 0;
                                            $no = 1;
                                            if (!empty($bo_id)) {
                                                for ($i = 0; $i < count($bo_id); $i++) {
                                                    $rowspan = count($bpr_id[$bo_id[$i]]);
                                                    for ($a = 0; $a < $rowspan; $a++) {
                                                        if ($a == 0) {
                                                            $amount += $total[$bo_id[$i]][$a];
                                            ?>
                                                            <tr class="table-content">
                                                                <td class="text-center"><?php echo $no++; ?></td>
                                                                <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $travel_date[$i]; ?> </td>
                                                                <td rowspan="<?php echo $rowspan; ?>"> <?php echo $cus_name[$i]; ?> </td>
                                                                <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                                <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $voucher_no[$i]; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo !empty($cot[$i]) ? $cot[$i] : '-'; ?> </td>
                                                            </tr>
                                                        <?php } elseif ($a > 0) {
                                                            $amount += $total[$bo_id[$i]][$a]; ?>
                                                            <tr class="table-content">
                                                                <td class="text-center"><?php echo $no++; ?></td>
                                                                <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            </tr>
                                                        <?php }
                                                    }
                                                    if (!empty($bec_id[$bo_id[$i]])) {
                                                        for ($e = 0; $e < count($bec_id[$bo_id[$i]]); $e++) {
                                                            $amount += $bec_total[$bo_id[$i]][$e]; ?>
                                                            <tr class="table-content">
                                                                <td class="text-left" colspan="5"> <?php echo $bec_name[$bo_id[$i]][$e]; ?> </td>
                                                                <td class="text-center"> <?php echo $bec_adult[$bo_id[$i]][$e]; ?> </td>
                                                                <td class="text-center"> <?php echo $bec_child[$bo_id[$i]][$e]; ?> </td>
                                                                <td class="text-center"> <?php echo number_format($bec_rate_adult[$bo_id[$i]][$e]); ?> </td>
                                                                <td class="text-center"> <?php echo number_format($bec_rate_child[$bo_id[$i]][$e]); ?> </td>
                                                                <td class="text-center"> <?php echo number_format($bec_total[$bo_id[$i]][$e]); ?> </td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        <?php }
                                                    }
                                                    if (!empty($discount_id[$bo_id[$i]])) {
                                                        for ($c = 0; $c < count($discount_id[$bo_id[$i]]); $c++) {
                                                            $discount = ($discount_rates[$bo_id[$i]][$c] > 0) ? $discount_rates[$bo_id[$i]][$c] + $discount : $discount; ?>
                                                            <tr class="table-content">
                                                                <td class="text-left" colspan="5"> <?php echo $discount_detail[$bo_id[$i]][$c]; ?> </td>
                                                                <td class="text-center"> </td>
                                                                <td class="text-center"> </td>
                                                                <td class="text-center"> </td>
                                                                <td class="text-center"> </td>
                                                                <td class="text-center"> <?php echo number_format($discount_rates[$bo_id[$i]][$c]); ?> </td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    }
                                                    if (!empty($chrage_id[$i])) {
                                                        ?>
                                                        <tr class="table-content">
                                                            <td class="text-left" colspan="5">Cancle wiht out Chrage <?php echo $chrage_id[$i]; ?> </td>
                                                            <td class="text-center"> <?php echo $chrage_adult[$i]; ?> </td>
                                                            <td class="text-center"> <?php echo $chrage_child[$i]; ?> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"></td>
                                                        </tr>
                                            <?php }
                                                }
                                            }
                                            $total_amount = $amount;
                                            $amount = !empty($cot) ? $amount - array_sum($cot) : $amount;
                                            $amount -= $discount;
                                            if ($vat_id == 1) {
                                                $vat_total = $amount * 100 / 107;
                                                $vat_cut = $vat_total;
                                                $vat_total = $amount - $vat_total;
                                                $withholding_total = $withholding > 0 ? ($vat_cut * $withholding) / 100 : 0;
                                            } elseif ($vat_id == 2) {
                                                $vat_total = ($amount * 7) / 100;
                                                $amount = $amount + $vat_total;
                                                $withholding_total = $withholding > 0 ? ($amount - $vat_total) * $withholding / 100 : 0;
                                            }
                                            $amount = !empty($withholding_total) ? $amount - $withholding_total : $amount;
                                            ?>

                                            <tr class="table-content">
                                                <td class="text-center" colspan="8"><em><b><?php echo bahtText($amount) ?></b></em></td>
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b>ยอดรวม : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Total)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($total_amount); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>

                                            <tr class="table-content">
                                                <td colspan="8" rowspan="5">
                                                    <b>หมายเหตุและเงื่อนใข (Terms & Conditions)</b><br>
                                                    <p>
                                                        <?php echo !empty($account_name) ? '</br><b>ชื่อบัญชี</b> ' . $account_name . '</br><b>เลขที่บัญชี</b> ' . $account_no . '</br><b>ธนาคาร</b> ' . $bank_name : ''; ?>
                                                    </p>
                                                    <p>
                                                        <?php echo $note; ?>
                                                    </p>
                                                </td>
                                                <?php if (!empty($discount)) { ?>
                                                    <td class="table-content text-center" colspan="4">
                                                        <dl class="row" style="margin-bottom: 0;">
                                                            <dt class="col-sm-8 text-right">
                                                                <b> ส่วนลด : </b>
                                                                <p style="font-size: 10px; margin-bottom: 2px;">(Discount)</p>
                                                            </dt>
                                                            <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($discount); ?></dd>
                                                        </dl>
                                                    </td>
                                                <?php } ?>
                                            </tr>

                                            <?php if (!empty($cot) && (array_sum($cot) > 0)) { ?>
                                                <tr class="table-content">
                                                    <td class="text-center" colspan="4">
                                                        <dl class="row" style="margin-bottom: 0;">
                                                            <dt class="col-sm-8 text-right">
                                                                <b>Cash on tour :</b>
                                                            </dt>
                                                            <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format(array_sum($cot)); ?></dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <?php if ($vat_id > 0) { ?>
                                                <tr class="table-content">
                                                    <td class="text-center" colspan="4">
                                                        <dl class="row" style="margin-bottom: 0;">
                                                            <dt class="col-sm-8 text-right">
                                                                <b> <?php echo $vat_id != '-' ? $vat_id == 1 ? 'รวมภาษี 7%' : 'แยกภาษี 7%' : '-' ?> : </b>
                                                                <p style="font-size: 10px; margin-bottom: 2px;">(Tax)</p>
                                                            </dt>
                                                            <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($vat_total, 2); ?></dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <?php if ($withholding > 0) { ?>
                                                <tr class="table-content">
                                                    <td class="text-center" colspan="4">
                                                        <dl class="row" style="margin-bottom: 0;">
                                                            <dt class="col-sm-8 text-right">
                                                                <b> หัก ณ ที่จ่าย (<?php echo $withholding; ?>%) : </b>
                                                                <p style="font-size: 10px; margin-bottom: 2px;">(Withholding Tax)</p>
                                                            </dt>
                                                            <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($withholding_total, 2); ?></dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <tr class="table-content">
                                                <td class="text-center" style="color: #fff; background-color: <?php echo ($vat_id > 0) ? '#960007' : '#003285'; ?>;" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b>ยอดชำระ : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Payment Amount)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap"><b>฿ <?php echo number_format($amount, 2); ?></b></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%" class="mt-1">
                                            <tr>
                                                <table width="100%" height="150px">
                                                    <tr class="table-content">
                                                        <td class="table-content" align="center" valign="bottom" width="35%">
                                                            _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ <br>
                                                            ผู้รับวางบิล / Receiver Signature <br>
                                                            วันที่ / Date _ _ _ _ _ _ _ _ _ _ _ _ _ _
                                                        </td>
                                                        <td class="table-content" align="center" valign="center" width="30%" style="font-weight: bold; font-size: 24px; color: rgba(0, 0, 0, 0.5);">
                                                            ตราประทับบริษัท
                                                        </td>
                                                        <td class="table-content" align="center" valign="bottom" width="35%">
                                                            _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ <br>
                                                            ผู้มีอำนาจลงนาม / Authorized Signature <br>
                                                            วันที่ / Date _ _ _ _ _ _ _ _ _ _ _ _ _ _
                                                        </td>
                                                    </tr>
                                                </table>
                                            </tr>
                                        </table>

                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty($rec_id)) { ?>
                                <div class="card-body receipt-padding pb-0" id="receipt-preview" hidden>
                                    <!-- Header starts -->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="brand-logo"><img src="app-assets/images/logo/logo-500.png" height="120"></span>
                                        </div>
                                        <div class="col-6 text-right mt-md-0 mt-2">
                                            <span style="color: #000;">
                                                <?php echo $main_document; ?>
                                            </span>
                                            <table width="100%" class="mt-50">
                                                <tr class="table-content">
                                                    <th rowspan="2" class="text-center" style="background-color: <?php echo ($vat_id > 0) ? '#960007' : '#003285'; ?>; color: #fff; border-radius: 15px 0px 0px 0px;">
                                                        <?php echo ($vat[0] > 0) ? 'ใบเสร็จรับเงิน / ใบกำกับภาษี <br> RECEIPT / TAX INVOICE' : 'ใบเสร็จรับเงิน <br> RECEIPT'; ?>
                                                    </th>
                                                    <td class="text-center">
                                                        เลขใบเสร็จรับเงิน
                                                    </td>
                                                </tr>
                                                <tr class="table-content">
                                                    <td class="text-center">
                                                        <?php echo $rec_full; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <table width="100%" class="mt-1">
                                        <tr class="table-content">
                                            <td width="34%" align="left" colspan="4">
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-4 text-right">
                                                        Company
                                                    </dt>
                                                    <dd class="col-sm-8"><?php echo $agent_name; ?></dd>
                                                </dl>
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-4 text-right">
                                                        Address
                                                    </dt>
                                                    <dd class="col-sm-8"><?php echo $agent_address; ?></dd>
                                                </dl>
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-4 text-right">
                                                        Tel
                                                    </dt>
                                                    <dd class="col-sm-8"><?php echo $agent_telephone; ?></dd>
                                                </dl>
                                            </td>
                                            <td align="left" colspan="2">
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-6 text-right">
                                                        Tax ID.
                                                    </dt>
                                                    <dd class="col-sm-6"><?php echo $agent_license; ?></dd>
                                                </dl>
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-6 text-right">
                                                        สำนักงาน
                                                    </dt>
                                                    <dd class="col-sm-6"><?php echo $office_name; ?></dd>
                                                </dl>
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-6 text-right">
                                                        PAID Date
                                                    </dt>
                                                    <dd class="col-sm-6"><?php echo date('j F Y', strtotime($rec_date)); ?></dd>
                                                </dl>
                                            </td>
                                            <td width="34%" align="left" colspan="2">
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-4 text-right">
                                                        การชำระเงิน
                                                    </dt>
                                                    <dd class="col-sm-8"><?php echo $payment_name; ?></dd>
                                                </dl>
                                                <?php if ($receipts[0]['payt_id'] == 4) { ?>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-4 text-right">
                                                            เลขบัญชี
                                                        </dt>
                                                        <dd class="col-sm-8"><?php echo $rec_acc_name . ' (' . $rec_acc_no . ')'; ?></dd>
                                                    </dl>
                                                <?php } elseif ($receipts[0]['payt_id'] == 5) { ?>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-4 text-right">
                                                            เลขที่เช็ค/ธนาคาร
                                                        </dt>
                                                        <dd class="col-sm-8"><?php echo $cheque_no . ' / ' . $bank_name; ?></dd>
                                                    </dl>
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-4 text-right">
                                                            วันที่เช็ค
                                                        </dt>
                                                        <dd class="col-sm-8"><?php echo date('j F Y', strtotime($cheque_date)); ?></dd>
                                                    </dl>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%" class="mt-1">
                                        <tr class="table-black">
                                            <td class="text-center" style="border-radius: 15px 0px 0px 0px;" width="3%"><b>เลขที่</b></td>
                                            <td class="text-center"><b>วันที่เดินทาง</b></td>
                                            <td class="text-center"><b>ชื่อลูกค้า</b></td>
                                            <td class="text-center"><b>โปรแกรม</b></td>
                                            <td class="text-center"><b>หมายเลข</b></td>
                                            <td class="text-center" colspan="2"><b>จํานวน</b></td>
                                            <td class="text-center" colspan="2"><b>ราคาต่อหน่วย</b></td>
                                            <td class="text-center"><b>จำนวนเงิน</b></td>
                                            <td class="text-center" style="border-radius: 0px 15px 0px 0px;"><b>Cash on tour</b></td>
                                        </tr>
                                        <tr class="table-black-2">
                                            <td class="text-center"><small>Items</small></td>
                                            <td class="text-center"><small>Date</small></td>
                                            <td class="text-center"><small>Customer's name</small></td>
                                            <td class="text-center"><small>Programe</small></td>
                                            <td class="text-center"><small>Voucher No.</small></td>
                                            <td class="text-center"><small>Adult</small></td>
                                            <td class="text-center"><small>Child</small></td>
                                            <td class="text-center"><small>Adult</small></td>
                                            <td class="text-center"><small>Child</small></td>
                                            <td class="text-center"><small>Amounth</small></td>
                                            <td class="text-center"><small>เงินมัดจำ</small></td>
                                        </tr>
                                        <?php
                                        $amount = 0;
                                        $discount = 0;
                                        $no = 1;
                                        if (!empty($bo_id)) {
                                            for ($i = 0; $i < count($bo_id); $i++) {
                                                $rowspan = count($bpr_id[$bo_id[$i]]);
                                                for ($a = 0; $a < $rowspan; $a++) {
                                                    if ($a == 0) {
                                                        $amount += $total[$bo_id[$i]][$a];
                                        ?>
                                                        <tr class="table-content">
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $travel_date[$i]; ?> </td>
                                                            <td rowspan="<?php echo $rowspan; ?>"> <?php echo $cus_name[$i]; ?> </td>
                                                            <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $voucher_no[$i]; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo !empty($cot[$i]) ? $cot[$i] : '-'; ?> </td>
                                                        </tr>
                                                    <?php } elseif ($a > 0) {
                                                        $amount += $total[$bo_id[$i]][$a]; ?>
                                                        <tr class="table-content">
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                        </tr>
                                                    <?php }
                                                }
                                                if (!empty($bec_id[$bo_id[$i]])) {
                                                    for ($e = 0; $e < count($bec_id[$bo_id[$i]]); $e++) {
                                                        $amount += $bec_total[$bo_id[$i]][$e]; ?>
                                                        <tr class="table-content">
                                                            <td class="text-left" colspan="5"> <?php echo $bec_name[$bo_id[$i]][$e]; ?> </td>
                                                            <td class="text-center"> <?php echo $bec_adult[$bo_id[$i]][$e]; ?> </td>
                                                            <td class="text-center"> <?php echo $bec_child[$bo_id[$i]][$e]; ?> </td>
                                                            <td class="text-center"> <?php echo number_format($bec_rate_adult[$bo_id[$i]][$e]); ?> </td>
                                                            <td class="text-center"> <?php echo number_format($bec_rate_child[$bo_id[$i]][$e]); ?> </td>
                                                            <td class="text-center"> <?php echo number_format($bec_total[$bo_id[$i]][$e]); ?> </td>
                                                            <td class="text-center"></td>
                                                        </tr>
                                                    <?php }
                                                }
                                                if (!empty($discount_id[$bo_id[$i]])) {
                                                    for ($c = 0; $c < count($discount_id[$bo_id[$i]]); $c++) {
                                                        $discount = ($discount_rates[$bo_id[$i]][$c] > 0) ? $discount_rates[$bo_id[$i]][$c] + $discount : $discount; ?>
                                                        <tr class="table-content">
                                                            <td class="text-left" colspan="5"> <?php echo $discount_detail[$bo_id[$i]][$c]; ?> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> <?php echo number_format($discount_rates[$bo_id[$i]][$c]); ?> </td>
                                                            <td class="text-center"></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                }
                                                if (!empty($chrage_id[$i])) {
                                                    ?>
                                                    <tr class="table-content">
                                                        <td class="text-left" colspan="5">Cancle wiht out Chrage <?php echo $chrage_id[$i]; ?> </td>
                                                        <td class="text-center"> <?php echo $chrage_adult[$i]; ?> </td>
                                                        <td class="text-center"> <?php echo $chrage_child[$i]; ?> </td>
                                                        <td class="text-center"> </td>
                                                        <td class="text-center"> </td>
                                                        <td class="text-center"> </td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                        <?php }
                                            }
                                        }
                                        $total_amount = $amount;
                                        $amount = !empty($cot) ? $amount - array_sum($cot) : $amount;
                                        $amount -= $discount;
                                        if ($vat_id == 1) {
                                            $vat_total = $amount * 100 / 107;
                                            $vat_cut = $vat_total;
                                            $vat_total = $amount - $vat_total;
                                            $withholding_total = $withholding > 0 ? ($vat_cut * $withholding) / 100 : 0;
                                        } elseif ($vat_id == 2) {
                                            $vat_total = ($amount * 7) / 100;
                                            $amount = $amount + $vat_total;
                                            $withholding_total = $withholding > 0 ? ($amount - $vat_total) * $withholding / 100 : 0;
                                        }
                                        $amount = !empty($withholding_total) ? $amount - $withholding_total : $amount;
                                        ?>

                                        <tr class="table-content">
                                            <td class="text-center" colspan="8"><em><b><?php echo bahtText($amount) ?></b></em></td>
                                            <td class="text-center" colspan="4">
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-8 text-right">
                                                        <b>ยอดรวม : </b>
                                                        <p style="font-size: 10px; margin-bottom: 2px;">(Total)</p>
                                                    </dt>
                                                    <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($total_amount); ?></dd>
                                                </dl>
                                            </td>
                                        </tr>

                                        <tr class="table-content">
                                            <td colspan="8" rowspan="5">
                                                <b>หมายเหตุและเงื่อนใข (Terms & Conditions)</b><br>
                                                <p>
                                                    <?php echo !empty($account_name) ? '</br><b>ชื่อบัญชี</b> ' . $account_name . '</br><b>เลขที่บัญชี</b> ' . $account_no . '</br><b>ธนาคาร</b> ' . $bank_name : ''; ?>
                                                </p>
                                                <p>
                                                    <?php echo $note; ?>
                                                </p>
                                            </td>
                                            <?php if (!empty($discount)) { ?>
                                                <td class="table-content text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b> ส่วนลด : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Discount)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($discount); ?></dd>
                                                    </dl>
                                                </td>
                                            <?php } ?>
                                        </tr>

                                        <?php if (!empty($cot) && (array_sum($cot) > 0)) { ?>
                                            <tr class="table-content">
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b>Cash on tour :</b>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format(array_sum($cot)); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($vat_id > 0) { ?>
                                            <tr class="table-content">
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b> <?php echo $vat_id != '-' ? $vat_id == 1 ? 'รวมภาษี 7%' : 'แยกภาษี 7%' : '-' ?> : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Tax)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($vat_total, 2); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($withholding > 0) { ?>
                                            <tr class="table-content">
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b> หัก ณ ที่จ่าย (<?php echo $withholding; ?>%) : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Withholding Tax)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($withholding_total, 2); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <tr class="table-content">
                                            <td class="text-center" style="color: #fff; background-color: <?php echo ($vat_id > 0) ? '#960007' : '#003285'; ?>;" colspan="4">
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-8 text-right">
                                                        <b>ยอดชำระ : </b>
                                                        <p style="font-size: 10px; margin-bottom: 2px;">(Payment Amount)</p>
                                                    </dt>
                                                    <dd class="col-sm-4 mt-50 text-nowrap"><b>฿ <?php echo number_format($amount, 2); ?></b></dd>
                                                </dl>
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%" class="mt-1">
                                        <tr>
                                            <table width="100%" height="150px">
                                                <tr class="table-content">
                                                    <td class="table-content" align="center" valign="bottom" width="35%">
                                                        _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ <br>
                                                        ผู้รับวางบิล / Receiver Signature <br>
                                                        วันที่ / Date _ _ _ _ _ _ _ _ _ _ _ _ _ _
                                                    </td>
                                                    <td class="table-content" align="center" valign="center" width="30%" style="font-weight: bold; font-size: 24px; color: rgba(0, 0, 0, 0.5);">
                                                        ตราประทับบริษัท
                                                    </td>
                                                    <td class="table-content" align="center" valign="bottom" width="35%">
                                                        _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ <br>
                                                        ผู้มีอำนาจลงนาม / Authorized Signature <br>
                                                        วันที่ / Date _ _ _ _ _ _ _ _ _ _ _ _ _ _
                                                    </td>
                                                </tr>
                                            </table>
                                        </tr>
                                    </table>
                                    <br><br>

                                </div>
                            <?php } ?>
                        </div>
                        <!------------------------------------------------------------------>
                        <!-- End Voucher Preview Vertical -->

                        <!-- Start Programs Detail Vertical -->
                        <!------------------------------------------------------------------>
                        <div id="details-vertical" class="content">
                            <form id="invoice-create-form" name="invoice-create-form" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="today" name="today" value="<?php echo $today; ?>">
                                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                <div class="row">
                                    <div class="form-group col-md-3 col-6">
                                        <label class="form-label" for="is_approved"></label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="is_approved" name="is_approved" value="1" <?php echo ($is_approved > 0) ? 'checked' : ''; ?> />
                                            <label class="custom-control-label" for="is_approved">วางบิลแล้ว</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-50">
                                    <div class="form-group col-md-2 col-12">
                                        <label>วันที่</label><br>
                                        <b><?php echo $date_from . ' - ' . $date_to; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>ชื่อ</label><br>
                                        <b id="text-name"><?php echo $agent_name; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>ชื่อทางบัญชี</label><br>
                                        <b id="text-name-account"><?php echo $account_name; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>เบอร์โทร</label><br>
                                        <b id="text-telephone"><?php echo $agent_telephone; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>หมายเลขภาษี</label><br>
                                        <b id="text-tat-license"><?php echo $agent_license; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label for="company_address">ที่อยู่ทางบัญชี</label><br>
                                        <b id="text-comp-address"><?php echo $agent_address; ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2 col-12">
                                        <label for="office">สาขา</label>
                                        <select class="form-control select2" id="office" name="office">
                                            <option value="0">เลือกสาขา ... </option>
                                            <?php
                                            $offices = $invObj->showoffices($comp_id);
                                            foreach ($offices as $office) {
                                            ?>
                                                <option value="<?php echo $office['id']; ?>" <?php echo ($office_id == $office['id']) ? 'selected' : ''; ?>><?php echo $office['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label class="form-label" for="date_inv">วันที่วางบิล</label></br>
                                        <input type="text" class="form-control picker" id="date_inv" name="date_inv" value="<?php echo $date_inv; ?>" required />
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label class="form-label" for="due_date">กำหนดครบชำระภายในวันที่</label></br>
                                        <input type="text" class="form-control picker" id="due_date" name="due_date" value="<?php echo $due_date; ?>" onchange="check_diff_date('due_date')" required />
                                        <p class="text-danger font-weight-bold" id="diff_due_date"></small>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label for="vat">ภาษีมูลค่าเพิ่ม</label>
                                        <div id="div-vat">
                                            <select class="form-control select2" id="vat" name="vat" onchange="calculator_invoice();">
                                                <option value="0">No Vat ... </option>
                                                <?php
                                                $vats = $invObj->showvat();
                                                foreach ($vats as $vat) {
                                                    $selected = ($vat['id'] == $vat_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?php echo $vat['id']; ?>" data-name="<?php echo $vat['name']; ?>" <?php echo $selected; ?>><?php echo $vat['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <span id="vat_text"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label for="withholding">หัก ณ ที่จ่าย (%)</label>
                                        <div id="div-withholding">
                                            <input type="text" class="form-control numeral-mask" id="withholding" name="withholding" value="<?php echo $withholding; ?>" onchange="calculator_invoice();" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label for="bank_account">บัญชี</label>
                                        <select class="form-control select2" id="bank_account" name="bank_account">
                                            <option value="0">เลือกบัญชี ... </option>
                                            <?php
                                            $banks_acc = $invObj->showbankaccount();
                                            foreach ($banks_acc as $banks) {
                                                $selected = ($banks['id'] == $banacc_id) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $banks['id']; ?>" <?php echo $selected; ?>><?php echo $banks['account_name'] . ' (' . $banks['account_no'] . ')'; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="note">Note</label>
                                        <textarea class="form-control" name="note" id="note"><?php echo nl2br($note); ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr class="mt-0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead class="bg-darken-2 text-white">
                                                <tr class="table-black" id="tr-invoice" style="background-color: rgb(0, 50, 133);">
                                                    <td class="text-center cell-fit" style="border-radius: 15px 0px 0px 0px; padding: 5px 0;" width="3%"><b>เลขที่</b></td>
                                                    <td class="text-center cell-fit"><b>วันที่เดินทาง</b></td>
                                                    <td class="text-center"><b>ชื่อลูกค้า</b></td>
                                                    <td class="text-center"><b>โปรแกรม</b></td>
                                                    <td class="text-center"><b>หมายเลข</b></td>
                                                    <td class="text-center cell-fit" colspan="2"><b>จํานวน</b></td>
                                                    <td class="text-center cell-fit" colspan="2"><b>ราคาต่อหน่วย</b></td>
                                                    <td class="text-center cell-fit"><b>จำนวนเงิน</b></td>
                                                    <td class="text-center cell-fit" style="border-radius: 0px 15px 0px 0px;"><b>Cash on tour</b></td>
                                                </tr>
                                                <tr class="table-black-2" id="tr-invoice-2" style="background-color: rgb(0, 96, 255);">
                                                    <td class="text-center p-50"><small>Items</small></td>
                                                    <td class="text-center p-50"><small>Date</small></td>
                                                    <td class="text-center p-50"><small>Customer's name</small></td>
                                                    <td class="text-center p-50"><small>Programe</small></td>
                                                    <td class="text-center p-50"><small>Voucher No.</small></td>
                                                    <td class="text-center p-50"><small>Adult</small></td>
                                                    <td class="text-center p-50"><small>Child</small></td>
                                                    <td class="text-center p-50"><small>Adult</small></td>
                                                    <td class="text-center p-50"><small>Child</small></td>
                                                    <td class="text-center p-50"><small>Amounth</small></td>
                                                    <td class="text-center p-50"><small>เงินมัดจำ</small></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $amount = 0;
                                                $discount = 0;
                                                $no = 1;
                                                if (!empty($bo_id)) {
                                                    for ($i = 0; $i < count($bo_id); $i++) {
                                                        $rowspan = count($bpr_id[$bo_id[$i]]);
                                                        for ($a = 0; $a < $rowspan; $a++) {
                                                            if ($a == 0) {
                                                                $amount += $total[$bo_id[$i]][$a];
                                                ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                                    <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $travel_date[$i]; ?> </td>
                                                                    <td rowspan="<?php echo $rowspan; ?>"> <?php echo $cus_name[$i]; ?> </td>
                                                                    <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                                    <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $voucher_no[$i]; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo !empty($cot[$i]) ? $cot[$i] : '-'; ?> </td>
                                                                </tr>
                                                            <?php } elseif ($a > 0) {
                                                                $amount += $total[$bo_id[$i]][$a]; ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                                    <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                    <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                                </tr>
                                                            <?php }
                                                        }
                                                        if (!empty($bec_id[$bo_id[$i]])) {
                                                            for ($e = 0; $e < count($bec_id[$bo_id[$i]]); $e++) {
                                                                $amount += $bec_total[$bo_id[$i]][$e]; ?>
                                                                <tr>
                                                                    <td class="text-left" colspan="5"> <?php echo $bec_name[$bo_id[$i]][$e]; ?> </td>
                                                                    <td class="text-center"> <?php echo $bec_adult[$bo_id[$i]][$e]; ?> </td>
                                                                    <td class="text-center"> <?php echo $bec_child[$bo_id[$i]][$e]; ?> </td>
                                                                    <td class="text-center"> <?php echo number_format($bec_rate_adult[$bo_id[$i]][$e]); ?> </td>
                                                                    <td class="text-center"> <?php echo number_format($bec_rate_child[$bo_id[$i]][$e]); ?> </td>
                                                                    <td class="text-center"> <?php echo number_format($bec_total[$bo_id[$i]][$e]); ?> </td>
                                                                    <td class="text-center"></td>
                                                                </tr>
                                                            <?php }
                                                        }
                                                        if (!empty($discount_id[$bo_id[$i]])) {
                                                            for ($c = 0; $c < count($discount_id[$bo_id[$i]]); $c++) {
                                                                $discount = ($discount_rates[$bo_id[$i]][$c] > 0) ? $discount_rates[$bo_id[$i]][$c] + $discount : $discount; ?>
                                                                <tr>
                                                                    <td class="text-left" colspan="5"> <?php echo $discount_detail[$bo_id[$i]][$c]; ?> </td>
                                                                    <td class="text-center"> </td>
                                                                    <td class="text-center"> </td>
                                                                    <td class="text-center"> </td>
                                                                    <td class="text-center"> </td>
                                                                    <td class="text-center"> <?php echo number_format($discount_rates[$bo_id[$i]][$c]); ?> </td>
                                                                    <td class="text-center"></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        }
                                                        if (!empty($chrage_id[$i])) {
                                                            ?>
                                                            <tr>
                                                                <td class="text-left" colspan="5">Cancle wiht out Chrage <?php echo $chrage_id[$i]; ?> </td>
                                                                <td class="text-center"> <?php echo $chrage_adult[$i]; ?> </td>
                                                                <td class="text-center"> <?php echo $chrage_child[$i]; ?> </td>
                                                                <td class="text-center"> </td>
                                                                <td class="text-center"> </td>
                                                                <td class="text-center"> </td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                <?php }
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="8"></td>
                                                    <td class="text-center" colspan="2"><b>รวมเป็นเงิน</b><br><small>(Total)</small></td>
                                                    <td class="text-center" id="inv-total-td"><?php echo number_format($amount); ?></td>
                                                </tr>
                                                <tr <?php echo $discount == 0 ? 'hidden' : ''; ?>>
                                                    <td colspan="8"></td>
                                                    <td class="text-center" colspan="2"><b>ส่วนลด</b><br><small>(Discount)</small></td>
                                                    <td class="text-center" id="inv-discount-td"><?php echo number_format($discount); ?></td>
                                                </tr>
                                                <?php if (!empty($cot) && (array_sum($cot) > 0)) { ?>
                                                    <tr>
                                                        <td colspan="8"></td>
                                                        <td class="text-center" colspan="2"><b>Cash on tour</b></td>
                                                        <td class="text-center" id="inv-cot-td"><?php echo number_format(array_sum($cot)); ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr id="tr-vat" hidden="true">
                                                    <td colspan="8"></td>
                                                    <td class="text-center" colspan="2"><b id="vat-text"></b><br><small>(Vat)</small></td>
                                                    <td class="text-center" id="inv-vat">0</td>
                                                </tr>
                                                <tr id="tr-withholding" hidden="true">
                                                    <td colspan="8"></td>
                                                    <td class="text-center" colspan="2"><b id="withholding-text"></b><br><small>(Withholding Tax)</small></td>
                                                    <td class="text-center" id="inv-withholding">0</td>
                                                </tr>
                                                <tr style="color: #fff;">
                                                    <td colspan="8"></td>
                                                    <td class="text-center" id="tr-invoice-3" colspan="2"><b>ยอดชำระ</b><br><small>(Payment Amount)</small></td>
                                                    <td class="text-center" id="inv-amount">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger" type="button" onclick="deleteInvoice();">
                                        <span class="align-middle d-sm-inline-block d-none"><i data-feather='trash-2'></i> Delete</span>
                                    </button>
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <span class="align-middle d-sm-inline-block d-none"><i data-feather='plus'></i> Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!------------------------------------------------------------------>
                        <!-- End Programs Detail Vertical -->

                        <!-- Start Programs Detail Vertical -->
                        <!------------------------------------------------------------------>
                        <div id="payments-vertical" class="content">
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <h3>ข้อมูลการชำระใบวางบิลเลขที่ #<?php echo $invoices[0]['inv_full']; ?></h3>
                                    <div id="status-payment"></div>
                                </div>
                            </div>
                            <form id="receipt-form" name="receipt-form" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="inv_id" name="inv_id" value="<?php echo $id; ?>">
                                <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $rec_id; ?>">
                                <input type="hidden" id="bo_id" name="bo_id" value="<?php echo !empty($bo_id) ? json_encode($bo_id, true) : [];  ?>">
                                <div class="row">
                                    <div class="form-group col-md-3 col-6">
                                        <label class="form-label" for="rec_approved"></label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rec_approved" name="rec_approved" value="1" <?php echo (!empty($rec_id)) ? ($rec_approved > 0) ? 'checked' : '' : 'checked'; ?> />
                                            <label class="custom-control-label" for="rec_approved">ชำระเงินแล้ว</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="rec_no">Receipt No.</label>
                                        <div class="input-group">
                                            <b><?php echo $rec_full; ?></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-50">
                                    <div class="form-group col-md-2 col-12">
                                        <label>วันที่</label><br>
                                        <b><?php echo $date_from . ' - ' . $date_to; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>ชื่อ</label><br>
                                        <b id="text-name"><?php echo $agent_name; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>ชื่อทางบัญชี</label><br>
                                        <b id="text-name-account"><?php echo $account_name; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>เบอร์โทร</label><br>
                                        <b id="text-telephone"><?php echo $agent_telephone; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label>หมายเลขภาษี</label><br>
                                        <b id="text-tat-license"><?php echo $agent_license; ?></b>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label for="company_address">ที่อยู่ทางบัญชี</label><br>
                                        <b id="text-comp-address"><?php echo $agent_address; ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2 col-12">
                                        <label class="form-label" for="rec_date">วันที่ชำระ</label></br>
                                        <input type="text" class="form-control picker" id="rec_date" name="rec_date" value="<?php echo !empty($rec_id) ? $rec_date : $today; ?>" required />
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label for="payments_type">รูปแบบการชำระเงิน</label>
                                        <select class="form-control select2" id="payments_type" name="payments_type" onchange="check_payment();">
                                            <option value="">Please choose payments type ... </option>
                                            <?php $payments = $invObj->showpayments(2);
                                            foreach ($payments as $payment) {
                                                $selecet = ($payt_id == $payment['id']) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $payment['id']; ?>" data-name="<?php echo $payment['name']; ?>" <?php echo $selecet; ?>><?php echo $payment['name']; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-12" id="div-bank-account" hidden>
                                        <label for="bank_account">เข้าบัญชี</label>
                                        <select class="form-control select2" id="bank_account" name="bank_account">
                                            <option value="">Please choose bank account ... </option>
                                            <?php $banks_acc = $invObj->showbankaccount();
                                            foreach ($banks_acc as $bank_acc) {
                                                $selecet = ($rec_account == $bank_acc['id']) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $bank_acc['id']; ?>" data-name="<?php echo $bank_acc['account_name']; ?>" <?php echo $selecet; ?>><?php echo $bank_acc['banName'] . ' ' . $bank_acc['account_no'] . ' (' . $bank_acc['account_name'] . ')'; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-12" id="div-bank" hidden>
                                        <label for="rec_bank">ธนาคาร</label>
                                        <select class="form-control select2" id="rec_bank" name="rec_bank">
                                            <option value="">Please choose bank ... </option>
                                            <?php $banks = $invObj->showbank();
                                            foreach ($banks as $bank) {
                                                $selecet = ($bank_cheque == $bank['id']) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $bank['id']; ?>" data-name="<?php echo $bank['name']; ?>" <?php echo $selecet; ?>><?php echo $bank['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-12" id="div-check-no" hidden>
                                        <label class="form-label" for="check_no">เลขที่เช็ค</label>
                                        <input type="text" id="check_no" name="check_no" class="form-control" value="<?php echo $cheque_no; ?>" />
                                    </div>
                                    <div class="form-group col-md-2 col-12" id="div-check-date" hidden>
                                        <label class="form-label" for="date_check">วันที่เช็ค</label></br>
                                        <input type="text" class="form-control" id="date_check" name="date_check" value="<?php echo $cheque_date; ?>" />
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="rec_note">Note</label>
                                        <textarea class="form-control" name="rec_note" id="rec_note"><?php echo nl2br($rec_note); ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2 col-12">
                                        <label>แนบรูปภาพ</label>
                                        <?php if (!empty($rec_photo)) { ?>
                                            <div class="form-group mt-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="delete_photo" name="delete_photo[]" value="1" />
                                                    <label class="custom-control-label" for="delete_photo">Delete</label>
                                                </div>
                                            </div>
                                            <input type="hidden" id="before_photo" name="before_photo[]" class="form-control" value="<?php echo $rec_photo; ?>" />
                                            <div class="d-flex align-items-center justify-content-center mt-2 mb-2">
                                                <img src="<?php echo $hostPageUrl; ?>/uploads/receipt/<?php echo $rec_photo; ?>" class="img-fluid product-img" alt="Logo" />
                                            </div>
                                        <?php } ?>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo" name="photo[]" />
                                            <label class="custom-file-label" for="photo">Choose photo file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr class="mt-0">
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead class="bg-darken-2 text-white">
                                        <tr class="table-black" style="background-color: <?php echo ($vat_id > 0) ? '#960007' : '#003285'; ?>;">
                                            <td class="text-center" style="border-radius: 15px 0px 0px 0px;" width="3%"><b>เลขที่</b></td>
                                            <td class="text-center"><b>วันที่เดินทาง</b></td>
                                            <td class="text-center"><b>ชื่อลูกค้า</b></td>
                                            <td class="text-center"><b>โปรแกรม</b></td>
                                            <td class="text-center"><b>หมายเลข</b></td>
                                            <td class="text-center" colspan="2"><b>จํานวน</b></td>
                                            <td class="text-center" colspan="2"><b>ราคาต่อหน่วย</b></td>
                                            <td class="text-center"><b>จำนวนเงิน</b></td>
                                            <td class="text-center" style="border-radius: 0px 15px 0px 0px;"><b>Cash on tour</b></td>
                                        </tr>
                                        <tr class="table-black-2" style="background-color: <?php echo ($vat_id > 0) ? '#ff3f49' : '#0060ff'; ?>;">
                                            <td class="text-center"><small>Items</small></td>
                                            <td class="text-center"><small>Date</small></td>
                                            <td class="text-center"><small>Customer's name</small></td>
                                            <td class="text-center"><small>Programe</small></td>
                                            <td class="text-center"><small>Voucher No.</small></td>
                                            <td class="text-center"><small>Adult</small></td>
                                            <td class="text-center"><small>Child</small></td>
                                            <td class="text-center"><small>Adult</small></td>
                                            <td class="text-center"><small>Child</small></td>
                                            <td class="text-center"><small>Amounth</small></td>
                                            <td class="text-center"><small>เงินมัดจำ</small></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $amount = 0;
                                        $discount = 0;
                                        $no = 1;
                                        if (!empty($bo_id)) {
                                            for ($i = 0; $i < count($bo_id); $i++) {
                                                $rowspan = count($bpr_id[$bo_id[$i]]);
                                                for ($a = 0; $a < $rowspan; $a++) {
                                                    if ($a == 0) {
                                                        $amount += $total[$bo_id[$i]][$a];
                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $travel_date[$i]; ?> </td>
                                                            <td rowspan="<?php echo $rowspan; ?>"> <?php echo $cus_name[$i]; ?> </td>
                                                            <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $voucher_no[$i]; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo !empty($cot[$i]) ? $cot[$i] : '-'; ?> </td>
                                                        </tr>
                                                    <?php } elseif ($a > 0) {
                                                        $amount += $total[$bo_id[$i]][$a]; ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td> <?php echo $product_name[$i] . ' (' . $category_name[$bo_id[$i]][$a] . ')'; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($adult[$bo_id[$i]][$a])) ? number_format($adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($child[$bo_id[$i]][$a])) ? number_format($child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_adult[$bo_id[$i]][$a])) ? number_format($rate_adult[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($rate_child[$bo_id[$i]][$a])) ? number_format($rate_child[$bo_id[$i]][$a]) : 0; ?> </td>
                                                            <td class="text-center"> <?php echo (!empty($total[$bo_id[$i]][$a])) ? number_format($total[$bo_id[$i]][$a]) : 0; ?> </td>
                                                        </tr>
                                                    <?php }
                                                }
                                                if (!empty($bec_id[$bo_id[$i]])) {
                                                    for ($e = 0; $e < count($bec_id[$bo_id[$i]]); $e++) {
                                                        $amount += $bec_total[$bo_id[$i]][$e]; ?>
                                                        <tr>
                                                            <td class="text-left" colspan="5"> <?php echo $bec_name[$bo_id[$i]][$e]; ?> </td>
                                                            <td class="text-center"> <?php echo $bec_adult[$bo_id[$i]][$e]; ?> </td>
                                                            <td class="text-center"> <?php echo $bec_child[$bo_id[$i]][$e]; ?> </td>
                                                            <td class="text-center"> <?php echo number_format($bec_rate_adult[$bo_id[$i]][$e]); ?> </td>
                                                            <td class="text-center"> <?php echo number_format($bec_rate_child[$bo_id[$i]][$e]); ?> </td>
                                                            <td class="text-center"> <?php echo number_format($bec_total[$bo_id[$i]][$e]); ?> </td>
                                                            <td class="text-center"></td>
                                                        </tr>
                                                    <?php }
                                                }
                                                if (!empty($discount_id[$bo_id[$i]])) {
                                                    for ($c = 0; $c < count($discount_id[$bo_id[$i]]); $c++) {
                                                        $discount = ($discount_rates[$bo_id[$i]][$c] > 0) ? $discount_rates[$bo_id[$i]][$c] + $discount : $discount; ?>
                                                        <tr>
                                                            <td class="text-left" colspan="5"> <?php echo $discount_detail[$bo_id[$i]][$c]; ?> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> </td>
                                                            <td class="text-center"> <?php echo number_format($discount_rates[$bo_id[$i]][$c]); ?> </td>
                                                            <td class="text-center"></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                }
                                                if (!empty($chrage_id[$i])) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-left" colspan="5">Cancle wiht out Chrage <?php echo $chrage_id[$i]; ?> </td>
                                                        <td class="text-center"> <?php echo $chrage_adult[$i]; ?> </td>
                                                        <td class="text-center"> <?php echo $chrage_child[$i]; ?> </td>
                                                        <td class="text-center"> </td>
                                                        <td class="text-center"> </td>
                                                        <td class="text-center"> </td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                        <?php }
                                            }
                                        }
                                        $total_amount = $amount;
                                        $amount = !empty($cot) ? $amount - array_sum($cot) : $amount;
                                        $amount -= $discount;
                                        if ($vat_id == 1) {
                                            $vat_total = $amount * 100 / 107;
                                            $vat_cut = $vat_total;
                                            $vat_total = $amount - $vat_total;
                                            $withholding_total = $withholding > 0 ? ($vat_cut * $withholding) / 100 : 0;
                                        } elseif ($vat_id == 2) {
                                            $vat_total = ($amount * 7) / 100;
                                            $amount = $amount + $vat_total;
                                            $withholding_total = $withholding > 0 ? ($amount - $vat_total) * $withholding / 100 : 0;
                                        }
                                        $amount = !empty($withholding_total) ? $amount - $withholding_total : $amount;
                                        ?>

                                        <tr>
                                            <td class="text-center" colspan="8"><em><b><?php echo bahtText($amount) ?></b></em></td>
                                            <td class="text-center" colspan="4">
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-8 text-right">
                                                        <b>ยอดรวม : </b>
                                                        <p style="font-size: 10px; margin-bottom: 2px;">(Total)</p>
                                                    </dt>
                                                    <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($total_amount); ?></dd>
                                                </dl>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="8" rowspan="5">
                                                <b>หมายเหตุและเงื่อนใข (Terms & Conditions)</b><br>
                                                <p>
                                                    <?php echo !empty($account_name) ? '</br><b>ชื่อบัญชี</b> ' . $account_name . '</br><b>เลขที่บัญชี</b> ' . $account_no . '</br><b>ธนาคาร</b> ' . $bank_name : ''; ?>
                                                </p>
                                                <p>
                                                    <?php echo $note; ?>
                                                </p>
                                            </td>
                                            <?php if (!empty($discount)) { ?>
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b> ส่วนลด : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Discount)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($discount); ?></dd>
                                                    </dl>
                                                </td>
                                            <?php } ?>
                                        </tr>

                                        <?php if (!empty($cot) && (array_sum($cot) > 0)) { ?>
                                            <tr>
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b>Cash on tour :</b>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format(array_sum($cot)); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($vat_id > 0) { ?>
                                            <tr>
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b> <?php echo $vat_id != '-' ? $vat_id == 1 ? 'รวมภาษี 7%' : 'แยกภาษี 7%' : '-' ?> : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Tax)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($vat_total, 2); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($withholding > 0) { ?>
                                            <tr>
                                                <td class="text-center" colspan="4">
                                                    <dl class="row" style="margin-bottom: 0;">
                                                        <dt class="col-sm-8 text-right">
                                                            <b> หัก ณ ที่จ่าย (<?php echo $withholding; ?>%) : </b>
                                                            <p style="font-size: 10px; margin-bottom: 2px;">(Withholding Tax)</p>
                                                        </dt>
                                                        <dd class="col-sm-4 mt-50 text-nowrap">฿ <?php echo number_format($withholding_total, 2); ?></dd>
                                                    </dl>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <tr>
                                            <td class="text-center" style="color: #fff; background-color: <?php echo ($vat_id > 0) ? '#960007' : '#003285'; ?>;" colspan="4">
                                                <dl class="row" style="margin-bottom: 0;">
                                                    <dt class="col-sm-8 text-right">
                                                        <b>ยอดชำระ : </b>
                                                        <p style="font-size: 10px; margin-bottom: 2px;">(Payment Amount)</p>
                                                    </dt>
                                                    <dd class="col-sm-4 mt-50 text-nowrap"><b>฿ <?php echo number_format($amount, 2); ?></b></dd>
                                                </dl>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span <?php echo !empty($rec_id) ? 'hidden' : ''; ?>></span>
                                    <button class="btn btn-danger" type="button" onclick="deleteReceipt();" <?php echo empty($rec_id) ? 'hidden' : ''; ?>>
                                        <span class="align-middle d-sm-inline-block d-none"><i data-feather='trash-2'></i> Delete</span>
                                    </button>
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <span class="align-middle d-sm-inline-block d-none"><i data-feather='plus'></i> Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!------------------------------------------------------------------>
                        <!-- End Programs Detail Vertical -->

                        <!-- Start Programs Detail Vertical -->
                        <!------------------------------------------------------------------>
                        <div id="record-vertical" class="content" hidden>
                            <div class="row">
                                <div class="col-12 border-bottom pb-1">
                                    <h3>ประวัติการใช้งานใบวางบิลเลขที่ #<?php echo $invoice_no; ?></h3>
                                </div>
                                <div class="col-12">
                                    <div class="card-body">
                                        <ul class="timeline">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!------------------------------------------------------------------>
                        <!-- End Programs Detail Vertical -->

                    </div>

            </section>
        </div>

        <!-- Start Modal select booking -->
        <!------------------------------------------------------------------>
        <div class="modal-size-xl d-inline-block">
            <div class="modal fade text-left" id="modal-select-booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel16">เลือก Invoice</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="booking-form" name="booking-form" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="bo_id" name="bo_id" value="<?php echo json_encode($bo_id, true); ?>">
                                <div id="div-show-booking"></div>
                                <div class="align-items-center row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="search_agent_inv">Agent</label></br>
                                            <span><?php echo $comp_name; ?></span>
                                            <input type="hidden" id="search_agent_inv" name="search_agent_inv" value="<?php echo $comp_id; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="search_travel_inv">Travel Date</label>
                                            <input type="text" class="form-control flatpickr-range" id="search_travel_inv" name="search_travel_inv" value="<?php echo $date_from . ' to ' . $date_to; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <button type="button" class="btn btn-warning" onclick="search_booking();">Search</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-striped table-vouchure-t2">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="cell-fit">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input dt-checkboxes" type="checkbox" id="checkbox_all" name="checkbox_all" onclick="checkbox();" />
                                                            <label class="custom-control-label" for="checkbox_all"></label>
                                                        </div>
                                                    </th>
                                                    <th class="cell-fit">TRAVEL DATE</th>
                                                    <th class="cell-fit">NAME</th>
                                                    <th>PROGRAM</th>
                                                    <th>VOUCHER NO.</th>
                                                    <th>TRANSFER</th>
                                                    <th>A</th>
                                                    <th>C</th>
                                                    <th>INF</th>
                                                    <th>FOC</th>
                                                    <th>COT</th>
                                                    <th>REMARK</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-booking-form">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span></span>
                                    <button type="submit" class="btn btn-primary" id="btn-submit-inv" name="submit" value="Submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-size-xl d-inline-block">
            <div class="modal fade text-left" id="modal-payment-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-white">
                            <!-- <h4 class="modal-title" id="myModalLabel16">เลือก Invoice</h4> -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="receipt-form" name="receipt-form" method="post" enctype="multipart/form-data">
                                <span id="div-payment-options">
                                </span>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span></span>
                                    <button type="submit" class="btn btn-primary" name="submit" value="Submit">รับการชำระเงิน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="receipt-img" tabindex="-1" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Image</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center justify-content-center">
                            <img id="img-modal" src="" class="img-fluid product-img" alt="Image" width="800px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------>
        <!-- End /Modal select booking -->

    </div>
</div>

<?php
$close_conn = $invObj->close();
?>