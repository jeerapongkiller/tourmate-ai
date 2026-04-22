<?php
include_once('controllers/Invoice.php');

$invObj = new Invoice();
$today = date("Y-m-d");
$nextday = date("Y-m-d", strtotime(" +1 day"));
$times = date("H:i:s");

$array = !empty($_POST['array_booking']) ? json_decode($_POST['array_booking'], true) : [];
$array_rates = !empty($_POST['array_rates']) ? json_decode($_POST['array_rates'], true) : [];
$array_discount = !empty($_POST['array_discount']) ? json_decode($_POST['array_discount'], true) : [];
$array_extar = !empty($_POST['array_extar']) ? json_decode($_POST['array_extar'], true) : [];
$array_company = !empty($_POST['array_company']) ? json_decode($_POST['array_company'], true) : [];
$booking = !empty($_POST['booking']) ? $_POST['booking'] : '';
$travel = !empty($_POST['search_travel_inv']) ? $_POST['search_travel_inv'] : '';
?>

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
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Validation -->
            <section class="bs-validation">
                <div class="row">
                    <!-- jQuery Validation -->
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="invoice-create-form" name="invoice-create-form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="today" name="today" value="<?php echo $today; ?>">
                                    <input type="hidden" id="bo_id" name="bo_id" value='<?php echo json_encode($booking, true); ?>'>
                                    <div id="div-show"></div>
                                    <div class="row">
                                        <div class="form-group col-md-3 col-12">
                                            <label class="form-label" for="is_approved"></label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="is_approved" name="is_approved" value="1" checked />
                                                <label class="custom-control-label" for="is_approved">วางบิลแล้ว</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-50">
                                        <div class="form-group col-md-2 col-12">
                                            <label>วันที่</label><br>
                                            <b><?php echo $travel; ?></b>
                                            <?php
                                            if (!empty($travel) && $travel != '0000-00-00') {
                                            ?>
                                                <input type="hidden" id="date_from" name="date_from" value="<?php echo substr($travel, 0, 10); ?>">
                                                <input type="hidden" id="date_to" name="date_to" value="<?php echo !empty(substr($travel, 14, 24)) ? substr($travel, 14, 24) : '0000-00-00'; ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>ชื่อ</label><br>
                                            <b id="text-name"><?php echo $array_company['name']; ?></b>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>ชื่อทางบัญชี</label><br>
                                            <b id="text-name-account"><?php echo $array_company['name_account']; ?></b>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>เบอร์โทร</label><br>
                                            <b id="text-telephone"><?php echo $array_company['comp_telephone']; ?></b>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>หมายเลขภาษี</label><br>
                                            <b id="text-tat-license"><?php echo $array_company['tat_license']; ?></b>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label for="company_address">ที่อยู่ทางบัญชี</label><br>
                                            <b id="text-comp-address"><?php echo $array_company['address_account']; ?></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2 col-12">
                                            <label for="office">สาขา</label>
                                            <select class="form-control select2" id="office" name="office" onchange="show_detail(this);">
                                                <option value="0" data-tat_license="<?php echo $array_company['tat_license'] != '' ? $array_company['tat_license'] : '-'; ?>" data-name="<?php echo $array_company['name']; ?>" data-name_account="<?php echo $array_company['name_account'] != '' ? $array_company['name_account'] : '-'; ?>" data-telephone="<?php echo $array_company['comp_telephone'] != '' ? $array_company['comp_telephone'] : '-'; ?>" data-address="<?php echo $array_company['address_account'] != '' ? $array_company['address_account'] : '-'; ?>">เลือกสาขา ... </option>
                                                <?php
                                                $offices = $invObj->showoffices($array_company['id']);
                                                foreach ($offices as $office) {
                                                ?>
                                                    <option value="<?php echo $office['id']; ?>" data-tat_license="<?php echo $office['tat_license'] != '' ? $office['tat_license'] : '-'; ?>" data-name="<?php echo $array_company['name']; ?>" data-name_account="<?php echo $office['name'] != '' ? $office['name'] : '-'; ?>" data-telephone="<?php echo $office['telephone'] != '' ? $office['telephone'] : '-'; ?>" data-address="<?php echo $office['address'] != '' ? $office['address'] : '-'; ?>"><?php echo $office['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2 col-12" hidden="true">
                                            <label for="invoice_no">หมายเลขใบวางบิล</label>
                                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" value="" />
                                        </div>
                                        <div class="form-group col-md-2 col-12">
                                            <label class="form-label" for="date_inv">วันที่วางบิล</label></br>
                                            <input type="text" class="form-control picker" id="date_inv" name="date_inv" value="<?php echo $today; ?>" required />
                                        </div>
                                        <div class="form-group col-md-2 col-12">
                                            <label class="form-label" for="due_date">กำหนดครบชำระภายในวันที่</label></br>
                                            <input type="text" class="form-control picker" id="due_date" name="due_date" value="" onchange="check_diff_date('due_date')" required />
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
                                                    ?>
                                                        <option value="<?php echo $vat['id']; ?>" data-name="<?php echo $vat['name']; ?>"><?php echo $vat['name']; ?></option>
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
                                                <input type="text" class="form-control numeral-mask" id="withholding" name="withholding" value="0" onchange="calculator_invoice();" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 col-12">
                                            <label for="bank_account">บัญชี</label>
                                            <select class="form-control select2" id="bank_account" name="bank_account">
                                                <option value="0">เลือกบัญชี ... </option>
                                                <?php
                                                $banks_acc = $invObj->showbankaccount();
                                                foreach ($banks_acc as $banks) {
                                                ?>
                                                    <option value="<?php echo $banks['id']; ?>"><?php echo $banks['account_name'] . ' (' . $banks['account_no'] . ')'; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="note">Note</label>
                                            <textarea class="form-control" name="note" id="note"></textarea>
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
                                                        <td class="text-center"><b>วันที่เดินทาง</b></td>
                                                        <td class="text-center"><b>ชื่อลูกค้า</b></td>
                                                        <td class="text-center"><b>โปรแกรม</b></td>
                                                        <td class="text-center"><b>หมายเลข</b></td>
                                                        <td class="text-center cell-fit" colspan="2"><b>จํานวน</b></td>
                                                        <td class="text-center cell-fit" colspan="2"><b>ราคาต่อหน่วย</b></td>
                                                        <!-- <td class="text-center"><b>ส่วนลด</b></td> -->
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
                                                        <!-- <td class="text-center p-50"><small>Discount</small></td> -->
                                                        <td class="text-center p-50"><small>Amounth</small></td>
                                                        <td class="text-center p-50"><small>เงินมัดจำ</small></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $total = 0;
                                                    $amount = 0;
                                                    $cot = 0;
                                                    $discount = 0;
                                                    $no = 1;
                                                    if (!empty($array['bo_id']) && !empty($booking)) {
                                                        for ($i = 0; $i < count($array['bo_id']); $i++) {
                                                            $id = $array['bo_id'][$i];
                                                            $cot = ($array['cot'][$i] > 0) ? $array['cot'][$i] + $cot : $cot;
                                                            if (in_array($id, $booking) == true) {
                                                                $rates = $array_rates[$id];
                                                                $rowspan = count($rates['id']);
                                                                for ($a = 0; $a < $rowspan; $a++) {
                                                                    if ($a == 0) {
                                                                        $amount = $rates['total'][$a] > 0 ? $amount + $rates['total'][$a] : $amount;
                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                                            <td class="text-center cell-fit" rowspan="<?php echo $rowspan; ?>"> <?php echo $array['travel_date'][$i]; ?> </td>
                                                                            <td rowspan="<?php echo $rowspan; ?>"> <?php echo $array['cus_name'][$i]; ?> </td>
                                                                            <td> <?php echo $array['product_name'][$i] . ' (' . $rates['category_name'][$a] . ')'; ?> </td>
                                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo $array['voucher_no'][$i]; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['adult'][$a])) ? number_format($rates['adult'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['child'][$a])) ? number_format($rates['child'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['rate_adult'][$a])) ? number_format($rates['rate_adult'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['rate_child'][$a])) ? number_format($rates['rate_child'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['total'][$a])) ? number_format($rates['total'][$a]) : 0; ?> </td>
                                                                            <td class="text-center" rowspan="<?php echo $rowspan; ?>"> <?php echo ($array['cot'][$i] > 0) ? number_format($array['cot'][$i]) : '-'; ?> </td>
                                                                        </tr>
                                                                    <?php } elseif ($a > 0) {
                                                                        $amount = $rates['total'][$a] > 0 ? $amount + $rates['total'][$a] : $amount; ?>
                                                                        <tr>
                                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                                            <td> <?php echo $array['product_name'][$i] . ' (' . $rates['category_name'][$a] . ')'; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['adult'][$a])) ? number_format($rates['adult'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['child'][$a])) ? number_format($rates['child'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['rate_adult'][$a])) ? number_format($rates['rate_adult'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['rate_child'][$a])) ? number_format($rates['rate_child'][$a]) : 0; ?> </td>
                                                                            <td class="text-center"> <?php echo (!empty($rates['total'][$a])) ? number_format($rates['total'][$a]) : 0; ?> </td>
                                                                        </tr>
                                                                    <?php }
                                                                }
                                                            }
                                                            if (!empty($array_extar[$id])) {
                                                                for ($e = 0; $e < count($array_extar[$id]['id']); $e++) {
                                                                    $amount = $array_extar[$id]['rate_total'][$e] > 0 ? $amount + $array_extar[$id]['rate_total'][$e] : $amount; ?>
                                                                    <tr>
                                                                        <td class="text-left" colspan="2"> <?php echo (!empty($array_extar[$id]['name'][$e])) ? $array_extar[$id]['name'][$e] : $array_extar[$id]['extra_name'][$e]; ?> </td>
                                                                        <td class="text-left" colspan="3"> </td>
                                                                        <td class="text-center"> <?php echo $array_extar[$id]['adult'][$e]; ?> </td>
                                                                        <td class="text-center"> <?php echo $array_extar[$id]['child'][$e]; ?> </td>
                                                                        <td class="text-center"> <?php echo number_format($array_extar[$id]['rate_adult'][$e]); ?> </td>
                                                                        <td class="text-center"> <?php echo number_format($array_extar[$id]['rate_child'][$e]); ?> </td>
                                                                        <td class="text-center"> <?php echo number_format($array_extar[$id]['rate_total'][$e]); ?> </td>
                                                                        <td class="text-center"></td>
                                                                    </tr>
                                                                <?php }
                                                            }
                                                            if (!empty($array_discount[$id])) {
                                                                for ($c = 0; $c < count($array_discount[$id]['id']); $c++) {
                                                                    $discount = ($array_discount[$id]['rates'][$c] > 0) ? $array_discount[$id]['rates'][$c] + $discount : $discount; ?>
                                                                    <tr>
                                                                        <td class="text-left" colspan="5"> <?php echo $array_discount[$id]['detail'][$c]; ?> </td>
                                                                        <td class="text-center"> </td>
                                                                        <td class="text-center"> </td>
                                                                        <td class="text-center"> </td>
                                                                        <td class="text-center"> </td>
                                                                        <td class="text-center"> <?php echo number_format($array_discount[$id]['rates'][$c]); ?> </td>
                                                                        <td class="text-center"></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                            }
                                                            if (!empty($array['chrage_id'][$i])) {
                                                                ?>
                                                                <tr>
                                                                    <td class="text-left" colspan="5"> Cancle wiht out Chrage </td>
                                                                    <td class="text-center"> <?php echo $array['chrage_adult'][$i]; ?> </td>
                                                                    <td class="text-center"> <?php echo $array['chrage_child'][$i]; ?> </td>
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
                                                    <tr <?php echo $cot == 0 ? 'hidden' : ''; ?>>
                                                        <td colspan="8"></td>
                                                        <td class="text-center" colspan="2"><b>Cash on tour</b></td>
                                                        <td class="text-center" id="inv-cot-td"><?php echo number_format($cot); ?></td>
                                                    </tr>
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
                                                    <tr>
                                                        <td colspan="8"></td>
                                                        <td class="text-center" colspan="2"><b>ยอดชำระ</b><br><small>(Payment Amount)</small></td>
                                                        <td class="text-center" id="inv-amount">0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span></span>
                                        <button class="btn btn-primary btn-submit btn-page-block-spinner">
                                            <span class="align-middle d-sm-inline-block d-none">Submit</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /jQuery Validation -->
                </div>
            </section>
            <!-- /Validation -->
        </div>
    </div>
</div>

<?php
$close_conn = $invObj->close();
?>