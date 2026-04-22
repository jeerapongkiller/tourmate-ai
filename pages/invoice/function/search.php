<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Invoice.php';

$invObj = new Invoice();
$today = date("Y-m-d");
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

if (isset($_POST['action']) && $_POST['action'] == "search") {
    // get value from ajax
    $search_type = !empty($_POST['search_type']) ? $_POST['search_type'] : 'all';
    $search_agent = $_POST['search_agent'] != "" ? $_POST['search_agent'] : 'all';
    $search_billing = !empty($_POST['search_billing_date']) ? $_POST['search_billing_date'] : '';
    $search_due = !empty($_POST['search_due_date']) ? $_POST['search_due_date'] : '';
    $search_payment = !empty($_POST['search_payment_date']) ? $_POST['search_payment_date'] : '';
    $search_travel = !empty($_POST['search_travel_date']) ? $_POST['search_travel_date'] : '';
    $refcode = !empty($_POST['refcode']) ? $_POST['refcode'] : '';
    $voucher_no = !empty($_POST['search_voucher_no']) ? $_POST['search_voucher_no'] : '';
    // $search_travel_form = !empty(substr($_POST['search_travel'], 0, 10)) ? substr($_POST['search_travel'], 0, 10) : '0000-00-00';
    // $search_travel_to = !empty(substr($_POST['search_travel'], 14, 24)) ? substr($_POST['search_travel'], 14, 24) : $search_travel_form;

    if (empty($search_billing) && empty($search_due) && empty($search_payment) && empty($search_travel) && $search_agent == 'all') {
        echo $bookings = false;
        exit();
    }

    $first_inv = array();
    $first_book = array();
    $first_extra = array();
    $first_bpr = array();
    $first_disc = array();
    $invoices = $invObj->showlistinvoice('list', $search_travel, $search_agent, $search_billing, $search_due, $search_payment, $refcode, $voucher_no);
    if (!empty($invoices)) {
        foreach ($invoices as $invoice) {
            # --- get value booking --- #
            if (in_array($invoice['id'], $first_inv) == false) {
                $first_inv[] = $invoice['id'];
                if ((diff_date($today, $invoice['due_date'])['day'] <= 0) && ($search_type == 1 || $search_type == 'all')) {
                    $inv_id[2][] = !empty($invoice['id']) ? $invoice['id'] : 0; // due date
                } elseif (!empty($invoice['rec_id']) && ($search_type == 3 || $search_type == 'all')) {
                    $inv_id[3][] = !empty($invoice['id']) ? $invoice['id'] : 0; // success
                } elseif ($search_type == 2 || $search_type == 'all') {
                    $inv_id[1][] = !empty($invoice['id']) ? $invoice['id'] : 0; // start
                }

                $inv_full[$invoice['id']] = !empty($invoice['inv_full']) ? $invoice['inv_full'] : '';
                $withholding[$invoice['id']] = !empty($invoice['withholding']) ? $invoice['withholding'] : 0;
                $vat[$invoice['id']] = !empty($invoice['vat_id']) ? $invoice['vat_id'] : 0;
                $date_from[$invoice['id']] = !empty($invoice['date_from']) ? $invoice['date_from'] : '0000-00-00';
                $date_to[$invoice['id']] = !empty($invoice['date_to']) ? $invoice['date_to'] : '0000-00-00';
                $date_inv[$invoice['id']] = !empty($invoice['date_inv']) ? $invoice['date_inv'] : '0000-00-00';
                $due_date[$invoice['id']] = !empty($invoice['due_date']) ? $invoice['due_date'] : '0000-00-00';
                $comp_name[$invoice['id']] = !empty($invoice['comp_name']) ? $invoice['comp_name'] : '';

                $rec_id[$invoice['id']] = !empty($invoice['rec_id']) ? $invoice['rec_id'] : 0;
                $rec_date[$invoice['id']] = !empty($invoice['rec_date']) ? $invoice['rec_date'] : '0000-00-00';
            }
            # --- get value rates --- #
            if ((in_array($invoice['bpr_id'], $first_bpr) == false) && !empty($invoice['bpr_id'])) {
                $first_bpr[] = $invoice['bpr_id'];
                $total[$invoice['id']][] = $invoice['booktye_id'] == 1 ? ($invoice['booksta_id'] != 3 && $invoice['booksta_id'] != 5) ? ($invoice['adult'] * $invoice['rates_adult']) + ($invoice['child'] * $invoice['rates_child'] + $invoice['infant'] * $invoice['rates_infant']) : $invoice['rates_private'] : $invoice['rates_private'];
            }
            # --- get value invoice booking --- #
            if (in_array($invoice['bo_id'], $first_book) == false) {
                $first_book[] = $invoice['bo_id'];
                $bo_id[$invoice['id']][] = !empty($invoice['bo_id']) ? $invoice['bo_id'] : 0;
                $cus_name[$invoice['bo_id']] = !empty($invoice['cus_name']) ? $invoice['cus_name'] : '';
                $cot[$invoice['id']][] = !empty($invoice['total_paid']) ? $invoice['total_paid'] : 0;
            }
            # --- get value invoice extra --- #
            if (in_array($invoice['bec_id'], $first_extra) == false && !empty($invoice['bec_id'])) {
                $first_extra[] = $invoice['bec_id'];
                $extra_rates_private[$invoice['id']][] = !empty($invoice['extra_rates_private']) ? $invoice['extra_rates_private'] : 0;
                $extra_discount[$invoice['id']][] = !empty($invoice['extra_discount']) ? $invoice['extra_discount'] : 0;

                $extra_total[$invoice['id']][] = $invoice['bec_type'] == 1 ? ($invoice['bec_adult'] * $invoice['bec_rate_adult']) + ($invoice['bec_child'] * $invoice['bec_rate_child']) : ($invoice['bec_privates'] * $invoice['bec_rate_private']);
            }
            # --- get value discount --- #
            if (in_array($invoice['discount_id'], $first_disc) == false && !empty($invoice['discount_id'])) {
                $first_disc[] = $invoice['discount_id'];
                $discount_id[$invoice['id']][] = !empty($invoice['discount_id']) ? $invoice['discount_id'] : 0;
                $discount_rates[$invoice['id']][] = !empty($invoice['discount_rates']) ? $invoice['discount_rates'] : 0;
            }
        }
    }
?>

    <?php if (!empty($inv_id[2])) { ?>
        <div class="card" id="basic-table">
            <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                <div class="col-lg-12 col-xl-12 text-center text-bold h4"> เกินกำหนดชำระ </div>
            </div>
            <table class="table table-bordered table-striped table-vouchure-t2">
                <thead class="thead-light">
                    <tr>
                        <th class="cell-fit"></th>
                        <th>วันที่วางบิล</th>
                        <th>เลขที่เอกสาร</th>
                        <th>ลูกค้า</th>
                        <th>กำหนดรับชำระ</th>
                        <th class="cell-fit">Booking</th>
                        <th class="cell-fit">ภาษีมูลค่าเพิ่ม</th>
                        <th class="cell-fit">หัก ณ ที่จ่าย (%)</th>
                        <th>AMOUNT</th>
                        <th>ชำระแล้ว</th>
                        <th class="cell-fit">รับชำระ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($inv_id[2])) {
                        $amount_array = array();
                        $amount_pay_array = array();
                        $status = '';
                        for ($i = 0; $i < count($inv_id[2]); $i++) {
                            $id = $inv_id[2][$i];
                            $amount = 0;
                            $withholding_total = 0;
                            $status = ((diff_date($today, $due_date[$id])['day'] <= 0)) ? 'danger' : 'info';
                            $status = ($rec_id[$id] > 0) ? 'success' : $status;

                            if ($status == 'danger') {
                                $amount += !empty($total[$id]) ? array_sum($total[$id]) : 0;
                                $amount += !empty($extra_total[$id]) ? array_sum($extra_total[$id]) : 0;
                                $amount -= !empty($discount_rates[$id]) ? array_sum($discount_rates[$id]) : 0;
                                $amount -= !empty($cot[$id]) ? array_sum($cot[$id]) : 0;
                                if ($vat[$id] == 1) {
                                    $vat_total = $amount * 100 / 107;
                                    $vat_cut = $vat_total;
                                    // $amount -= $vat_total;
                                    $withholding_total = $withholding[$id] > 0 ? ($vat_cut * $withholding[$id]) / 100 : 0;
                                } elseif ($vat[$id] == 2) {
                                    $vat_total = ($amount * 7) / 100;
                                    $amount += $vat_total;
                                    $withholding_total = $withholding[$id] > 0 ? ($amount - $vat_total) * $withholding[$id] / 100 : 0;
                                }
                                $amount -= !empty($withholding_total) ? $withholding_total : 0;
                                $amount_array[] = $amount;
                                $amount_pay_array[] = ($rec_id[$id]) ? $amount : 0;

                                $href = 'href="./?pages=invoice/edit&id=' . $id . '" style="color:#6E6B7B" target="_blank" '; ?>
                                <tr>
                                    <td class="cell-fit text-center"><span class="bullet bullet-sm bullet-<?php echo $status; ?>"></span></td>
                                    <td class="cell-fit"><a <?php echo $href; ?>><?php echo ($date_inv[$id] != '0000-00-00') ? date("j F Y", strtotime($date_inv[$id])) : '-'; ?></a></td>
                                    <td class="text-nowrap cell-fit"><a <?php echo $href; ?>><?php echo $inv_full[$id]; ?></a></td>
                                    <td class="text-nowrap"><a <?php echo $href; ?>><?php echo $comp_name[$id]; ?></a></td>
                                    <td class="cell-fit"><a <?php echo $href; ?>><?php echo $status == 'success' ? date("j F Y", strtotime($due_date[$id])) : date("j F Y", strtotime($due_date[$id])) . ' <b class="text-danger">(' . diff_date($today, $due_date[$id])['day'] . ')</b>'; ?></a></td>
                                    <td class="text-center text-nowrap"><a <?php echo $href; ?>><?php echo !empty($bo_id[$id]) ? count($bo_id[$id]) : '-'; ?></a></td>
                                    <td class="text-center cell-fit"><a <?php echo $href; ?>><?php echo !empty($vat[$id]) ? ($vat[$id] == 1) ? 'รวมภาษี 7%' : 'แยกภาษี 7%' : '-'; ?></a></td>
                                    <td class="text-center"><a <?php echo $href; ?>><?php echo $withholding[$id]; ?></a></td>
                                    <td class="text-right text-nowrap"><a <?php echo $href; ?>><?php echo number_format($amount, 2); ?></a></td>
                                    <td class="text-right text-nowrap"><a <?php echo $href; ?>><?php echo ($rec_id[$id]) ? number_format($amount, 2) : '-'; ?></a></td>
                                    <td class="text-center cell-fit"><a href="javascript:void(0)"><a href="./?pages=invoice/edit&id=<?php echo $id; ?>&tab=3" target="_blank"><button type="button" class="btn btn-sm btn-gradient-info">ชำระ</button></a></td>
                                </tr>
                        <?php }
                        } ?>
                        <tr>
                            <td colspan="8"></td>
                            <td class="text-right font-weight-bolder"><?php echo !empty($amount_array) ? number_format(array_sum($amount_array), 2) : '0'; ?></td>
                            <td class="text-right font-weight-bolder"><?php echo !empty($amount_pay_array) ? number_format(array_sum($amount_pay_array), 2) : '0'; ?></td>
                            <td colspan="1"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($inv_id[1])) { ?>
        <div class="card" id="basic-table">
            <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                <div class="col-lg-12 col-xl-12 text-center text-bold h4"> ไม่เกินกำหนดชำระ </div>
            </div>
            <table class="table table-bordered table-striped table-vouchure-t2">
                <thead class="thead-light">
                    <tr>
                        <th class="cell-fit"></th>
                        <th>วันที่วางบิล</th>
                        <th>เลขที่เอกสาร</th>
                        <th>ลูกค้า</th>
                        <th>กำหนดรับชำระ</th>
                        <th class="cell-fit">Booking</th>
                        <th class="cell-fit">ภาษีมูลค่าเพิ่ม</th>
                        <th class="cell-fit">หัก ณ ที่จ่าย (%)</th>
                        <th>AMOUNT</th>
                        <th>ชำระแล้ว</th>
                        <th class="cell-fit">รับชำระ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($inv_id[1])) {
                        $amount_array = array();
                        $amount_pay_array = array();
                        $status = '';
                        for ($i = 0; $i < count($inv_id[1]); $i++) {
                            $id = $inv_id[1][$i];
                            $amount = 0;
                            $withholding_total = 0;
                            $status = ((diff_date($today, $due_date[$id])['day'] <= 0)) ? 'danger' : 'info';
                            $status = ($rec_id[$id] > 0) ? 'success' : $status;

                            if ($status == 'info') {
                                $amount += !empty($total[$id]) ? array_sum($total[$id]) : 0;
                                $amount += !empty($extra_total[$id]) ? array_sum($extra_total[$id]) : 0;
                                $amount -= !empty($discount_rates[$id]) ? array_sum($discount_rates[$id]) : 0;
                                $amount -= !empty($cot[$id]) ? array_sum($cot[$id]) : 0;
                                if ($vat[$id] == 1) {
                                    $vat_total = $amount * 100 / 107;
                                    $vat_cut = $vat_total;
                                    // $amount -= $vat_total;
                                    $withholding_total = $withholding[$id] > 0 ? ($vat_cut * $withholding[$id]) / 100 : 0;
                                } elseif ($vat[$id] == 2) {
                                    $vat_total = ($amount * 7) / 100;
                                    $amount += $vat_total;
                                    $withholding_total = $withholding[$id] > 0 ? ($amount - $vat_total) * $withholding[$id] / 100 : 0;
                                }
                                $amount -= !empty($withholding_total) ? $withholding_total : 0;
                                $amount_array[] = $amount;
                                $amount_pay_array[] = ($rec_id[$id]) ? $amount : 0;

                                $href = 'href="./?pages=invoice/edit&id=' . $id . '" style="color:#6E6B7B" target="_blank" '; ?>
                                <tr>
                                    <td class="cell-fit text-center"><span class="bullet bullet-sm bullet-<?php echo $status; ?>"></span></td>
                                    <td class="cell-fit"><a <?php echo $href; ?>><?php echo ($date_inv[$id] != '0000-00-00') ? date("j F Y", strtotime($date_inv[$id])) : '-'; ?></a></td>
                                    <td class="text-nowrap cell-fit"><a <?php echo $href; ?>><?php echo $inv_full[$id]; ?></a></td>
                                    <td class="text-nowrap"><a <?php echo $href; ?>><?php echo $comp_name[$id]; ?></a></td>
                                    <td class="cell-fit"><a <?php echo $href; ?>><?php echo $status == 'success' ? date("j F Y", strtotime($due_date[$id])) : date("j F Y", strtotime($due_date[$id])) . ' <b class="text-danger">(' . diff_date($today, $due_date[$id])['day'] . ')</b>'; ?></a></td>
                                    <td class="text-center text-nowrap"><a <?php echo $href; ?>><?php echo !empty($bo_id[$id]) ? count($bo_id[$id]) : '-'; ?></a></td>
                                    <td class="text-center cell-fit"><a <?php echo $href; ?>><?php echo !empty($vat[$id]) ? ($vat[$id] == 1) ? 'รวมภาษี 7%' : 'แยกภาษี 7%' : '-'; ?></a></td>
                                    <td class="text-center"><a <?php echo $href; ?>><?php echo $withholding[$id]; ?></a></td>
                                    <td class="text-right text-nowrap"><a <?php echo $href; ?>><?php echo number_format($amount, 2); ?></a></td>
                                    <td class="text-right text-nowrap"><a <?php echo $href; ?>><?php echo ($rec_id[$id]) ? number_format($amount, 2) : '-'; ?></a></td>
                                    <td class="text-center cell-fit"><a href="javascript:void(0)"><a href="./?pages=invoice/edit&id=<?php echo $id; ?>&tab=3" target="_blank"><button type="button" class="btn btn-sm btn-gradient-info">ชำระ</button></a></td>
                                </tr>
                        <?php }
                        } ?>
                        <tr>
                            <td colspan="8"></td>
                            <td class="text-right font-weight-bolder"><?php echo !empty($amount_array) ? number_format(array_sum($amount_array), 2) : '0'; ?></td>
                            <td class="text-right font-weight-bolder"><?php echo !empty($amount_pay_array) ? number_format(array_sum($amount_pay_array), 2) : '0'; ?></td>
                            <td colspan="1"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($inv_id[3])) { ?>
        <div class="card" id="basic-table">
            <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                <div class="col-lg-12 col-xl-12 text-center text-bold h4"> รับชำระเรียบร้อย </div>
            </div>
            <table class="table table-bordered table-striped table-vouchure-t2">
                <thead class="thead-light">
                    <tr>
                        <th class="cell-fit"></th>
                        <th>วันที่วางบิล</th>
                        <th>วันที่ชำระ</th>
                        <th>เลขที่เอกสาร</th>
                        <th>ลูกค้า</th>
                        <th>กำหนดรับชำระ</th>
                        <th class="cell-fit">Booking</th>
                        <th class="cell-fit">ภาษีมูลค่าเพิ่ม</th>
                        <th class="cell-fit">หัก ณ ที่จ่าย (%)</th>
                        <th>AMOUNT</th>
                        <th>ชำระแล้ว</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($inv_id[3])) {
                        $amount_array = array();
                        $amount_pay_array = array();
                        $status = '';
                        for ($i = 0; $i < count($inv_id[3]); $i++) {
                            $id = $inv_id[3][$i];
                            $amount = 0;
                            $withholding_total = 0;
                            $status = ((diff_date($today, $due_date[$id])['day'] <= 0)) ? 'danger' : 'info';
                            $status = (!empty($rec_id[$id])) ? 'success' : $status;

                            if ($status == 'success') {
                                $amount += !empty($total[$id]) ? array_sum($total[$id]) : 0;
                                $amount += !empty($extra_total[$id]) ? array_sum($extra_total[$id]) : 0;
                                $amount -= !empty($discount_rates[$id]) ? array_sum($discount_rates[$id]) : 0;
                                $amount -= !empty($cot[$id]) ? array_sum($cot[$id]) : 0;
                                if ($vat[$id] == 1) {
                                    $vat_total = $amount * 100 / 107;
                                    $vat_cut = $vat_total;
                                    // $amount -= $vat_total;
                                    $withholding_total = $withholding[$id] > 0 ? ($vat_cut * $withholding[$id]) / 100 : 0;
                                } elseif ($vat[$id] == 2) {
                                    $vat_total = ($amount * 7) / 100;
                                    $amount += $vat_total;
                                    $withholding_total = $withholding[$id] > 0 ? ($amount - $vat_total) * $withholding[$id] / 100 : 0;
                                }
                                $amount -= !empty($withholding_total) ? $withholding_total : 0;
                                $amount_array[] = $amount;
                                $amount_pay_array[] = ($rec_id[$id]) ? $amount : 0;

                                $href = 'href="./?pages=invoice/edit&id=' . $id . '" style="color:#6E6B7B" target="_blank" '; ?>
                                <tr>
                                    <td class="cell-fit text-center"><span class="bullet bullet-sm bullet-<?php echo $status; ?>"></span></td>
                                    <td class="cell-fit"><a <?php echo $href; ?>><?php echo ($date_inv[$id] != '0000-00-00') ? date("j F Y", strtotime($date_inv[$id])) : '-'; ?></a></td>
                                    <td class="cell-fit"><a <?php echo $href; ?>><?php echo ($rec_date[$id] != '0000-00-00') ? date("j F Y", strtotime($rec_date[$id])) : '-'; ?></a></td>
                                    <td class="text-nowrap cell-fit"><a <?php echo $href; ?>><?php echo $inv_full[$id]; ?></a></td>
                                    <td class="text-nowrap"><a <?php echo $href; ?>><?php echo $comp_name[$id]; ?></a></td>
                                    <td class="cell-fit"><a <?php echo $href; ?>><?php echo $status == 'success' ? date("j F Y", strtotime($due_date[$id])) : date("j F Y", strtotime($due_date[$id])) . ' <b class="text-danger">(' . diff_date($today, $due_date[$id])['day'] . ')</b>'; ?></a></td>
                                    <td class="text-center text-nowrap"><a <?php echo $href; ?>><?php echo !empty($bo_id[$id]) ? count($bo_id[$id]) : '-'; ?></a></td>
                                    <td class="text-center cell-fit"><a <?php echo $href; ?>><?php echo !empty($vat[$id]) ? ($vat[$id] == 1) ? 'รวมภาษี 7%' : 'แยกภาษี 7%' : '-'; ?></a></td>
                                    <td class="text-center"><a <?php echo $href; ?>><?php echo $withholding[$id]; ?></a></td>
                                    <td class="text-right text-nowrap"><a <?php echo $href; ?>><?php echo number_format($amount, 2); ?></a></td>
                                    <td class="text-right text-nowrap"><a <?php echo $href; ?>><?php echo ($rec_id[$id]) ? number_format($amount, 2) : '-'; ?></a></td>
                                </tr>
                        <?php }
                        } ?>
                        <tr>
                            <td colspan="9"></td>
                            <td class="text-right font-weight-bolder"><?php echo !empty($amount_array) ? number_format(array_sum($amount_array), 2) : '0'; ?></td>
                            <td class="text-right font-weight-bolder"><?php echo !empty($amount_pay_array) ? number_format(array_sum($amount_pay_array), 2) : '0'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

<?php
} else {
    echo $bookings = false;
}
