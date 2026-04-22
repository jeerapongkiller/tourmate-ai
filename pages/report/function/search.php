<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Report.php';

$repObj = new Report();
$today = date("Y-m-d");
$times = date("H:i:s");

if (isset($_POST['action']) && $_POST['action'] == "search") {
    $search_status = !empty($_POST["search_status"]) ? $_POST["search_status"] : 'all';
    $search_payment = !empty($_POST["search_payment"]) ? $_POST["search_payment"] : 'all';
    $search_travel = !empty($_POST["search_travel"]) ? $_POST["search_travel"] : $today;
    $date_form = substr($search_travel, 0, 10) != '' ? substr($search_travel, 0, 10) : '0000-00-00';
    $date_to = substr($search_travel, 14, 10) != '' ? substr($search_travel, 14, 10) : $date_form;
    $search_agent = $_POST['search_agent'] != "" ? $_POST['search_agent'] : 'all';
    $search_product = $_POST['search_product'] != "" ? $_POST['search_product'] : 'all';
    $text_travel = ($date_form != '0000-00-00') ? ($date_to != '0000-00-00' && $date_form != $date_to) ? 'วันที่ ' . date('j F Y', strtotime($date_form)) . ' ถึง ' . date('j F Y', strtotime($date_to)) : 'วันที่ ' . date('j F Y', strtotime($date_form)) : '';

    $text_detail = '';
    $text_detail .= $date_form != '0000-00-00' ? $date_to != '0000-00-00' ? 'วันที่ ' . date('j F Y', strtotime($date_form)) . ' ถึง ' . date('j F Y', strtotime($date_to)) : 'วันที่ ' . date('j F Y', strtotime($date_form)) : '';
    $text_detail .= $search_agent != 'all' ? ' เอเยนต์ ' . $repObj->get_value('name', 'companies', $search_agent)['name'] : ' เอเยนต์ทั้งหมด';
    $text_detail .= $search_product != 'all' ? ' โปรแกรม ' . $repObj->get_value('name', 'products', $search_product)['name'] : ' โปรแกรมทั้งหมด';

    $count_boboat = 0;
    $count_bot = 0;
    $paid = 0;
    $not_issued = 0;
    $issued_inv = 0;
    $first_book = array();
    $first_agent = array();
    $first_bpr = array();
    $first_mange = array();
    $first_bot = array();
    $first_boboat = array();
    $first_pay = array();
    $first_extar = array();
    $first_disc = array();
    $bookings = $repObj->showlist($search_status, $date_form, $date_to, $search_agent, $search_product, $search_payment);
    foreach ($bookings as $booking) {
        # --- get value booking --- #
        if (in_array($booking['id'], $first_book) == false) {
            $first_book[] = $booking['id'];
            # --- get value booking --- #
            $bo_id[] = !empty($booking['id']) ? $booking['id'] : 0;
            $status[] = '<span class="badge badge-pill ' . $booking['booksta_class'] . ' text-capitalized"> ' . $booking['booksta_name'] . ' </span>';
            $rec_id[] = !empty($booking['rec_id']) ? $booking['rec_id'] : 0;
            $book_full[] = !empty($booking['book_full']) ? $booking['book_full'] : '';
            $voucher_no_agent[] = !empty($booking['voucher_no_agent']) ? $booking['voucher_no_agent'] : '';
            $inv_full[] = !empty($booking['inv_full']) ? $booking['inv_full'] : '';
            $travel_date[] = !empty($booking['travel_date']) ? $booking['travel_date'] : '0000-00-00';
            $bo_status[] = !empty($booking['booksta_id']) ? $booking['booksta_id'] : 0;
            $sender[] = !empty($booking['sender']) ? $booking['sender'] : '';
            # --- get value booking products --- #
            $hotel_pickup_name[] = !empty($booking['hotel_pickup_name']) ? $booking['hotel_pickup_name'] : $booking['hotel_pickup'];
            $hotel_dropoff_name[] = !empty($booking['hotel_dropoff_name']) ? $booking['hotel_dropoff_name'] : $booking['hotel_dropoff'];
            # --- get value customers --- #
            $cus_name[] = !empty($booking['cus_name']) && $booking['cus_head'] == 1 ? $booking['cus_name'] : '';
            # --- Agent --- #
            $comp_id[] = !empty($booking['comp_id']) ? $booking['comp_id'] : 0;
            $comp_name[] = !empty($booking['comp_name']) ? $booking['comp_name'] : '';
            # --- Programe --- #
            $prod_id[] = !empty($booking['product_id']) ? $booking['product_id'] : 0;
            $product_name[$booking['product_id']] = !empty($booking['product_name']) ? $booking['product_name'] : '';
            $category_name[$booking['product_id']] = !empty($booking['category_name']) ? $booking['category_name'] : '';

            # --- chrage --- #
            $chrage_id[] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
            $chrage_adult[] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
            $chrage_child[] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
            $chrage_infant[] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
            $chrage_tourist[] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
            $comp_chrage[$booking['comp_id']][] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
            $product_chrage[$booking['comp_id']][] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
            $chrage_bo[$booking['id']][] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
            # --- order boat --- #
            if (!empty(!empty($booking['mangeb_id'])) && !empty($booking['mangeb_id']) > 0) {
                $mangeb_id[$booking['mangeb_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
                $mangeb_travel[$booking['mangeb_id']] = !empty($booking['mangeb_travel_date']) ? $booking['mangeb_travel_date'] : 0;
                # --- Boat --- #
                $boat_id[$booking['mangeb_id']][] = !empty($booking['boat_id']) ? $booking['boat_id'] : 0;
                $boat_name[$booking['boat_id']] = !empty($booking['boat_name']) ? $booking['boat_name'] : '';
                $boat_color[$booking['boat_id']] = !empty($booking['boat_color']) ? $booking['boat_color'] : '';
                $boat_background[$booking['boat_id']] = !empty($booking['boat_background']) ? $booking['boat_background'] : '';
                $boat_order_id[$booking['mangeb_id']][] = !empty($booking['boat_id']) ? $booking['boat_id'] : 0;
                $boat_product[$booking['mangeb_id']] = !empty($booking['product_id']) ? $booking['product_id'] : 0;
            }
        }
        # --- get value booking product rates --- #
        if (in_array($booking['bpr_id'], $first_bpr) == false) {
            $first_bpr[] = $booking['bpr_id'];
            $adult[$booking['id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
            $child[$booking['id']][] = !empty($booking['child']) ? $booking['child'] : 0;
            $infant[$booking['id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
            $foc[$booking['id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;
            $tourist_max[$booking['id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];
            $tourist_all[] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];

            $total = $booking['booking_type_id'] == 1 ? ($booking['adult'] * $booking['rates_adult']) + ($booking['child'] * $booking['rates_child']) : $booking['rates_private'];

            $array_total[] = $total;
            $array_amount[$booking['id']][] = $total;

            $comp_amount[$booking['comp_id']][] = $total;
            $comp_revenue[$booking['comp_id']][] = !empty($booking['rec_id']) ? $total : 0;

            $comp_adult[$booking['comp_id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
            $comp_child[$booking['comp_id']][] = !empty($booking['child']) ? $booking['child'] : 0;
            $comp_infant[$booking['comp_id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
            $comp_foc[$booking['comp_id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;
            $comp_sum[$booking['comp_id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];

            $product_adult[$booking['product_id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
            $product_child[$booking['product_id']][] = !empty($booking['child']) ? $booking['child'] : 0;
            $product_infant[$booking['product_id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
            $product_foc[$booking['product_id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;
            $product_tourist[$booking['product_id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];
        }
        # --- get value agent company --- #
        if (in_array($booking['comp_id'], $first_agent) == false) {
            $first_agent[] = $booking['comp_id'];
            $agent_id[] = !empty($booking['comp_id']) ? $booking['comp_id'] : 0;
            $agent_name[] = !empty($booking['comp_name']) ? $booking['comp_name'] : 'ไม่ได้ระบุ';
            $agent_logo[] = !empty($booking['comp_logo']) ? $booking['comp_logo'] : '';
        }
        # --- get value booking payment --- #
        if ((in_array($booking['bopa_id'], $first_pay) == false) && !empty($booking['bopa_id'])) {
            # --- in array get value booking payment --- #
            $first_pay[] = $booking['bopa_id'];
            $bopay_id[$booking['id']] = !empty($booking['bopay_id']) ? $booking['bopay_id'] : 0;
            $bopay_name_class[$booking['id']] = !empty($booking['bopay_name_class']) ? $booking['bopay_name_class'] : '';
            $bopay_paid_name[$booking['id']] = $booking['bopay_id'] == 4 || $booking['bopay_id'] == 5 ? $booking['bopay_name'] . '</br>(' . number_format($booking['total_paid']) . ')' : $booking['bopay_name'];

            $pay_id[$booking['id']][] = !empty($booking['bopay_id']) ? $booking['bopay_id'] : 0;
            $pay_name[$booking['id']][] = !empty($booking['bopay_name']) ? $booking['bopay_name'] : 0;
            $bo_cot[$booking['id']][] = !empty($booking['total_paid']) ? $booking['total_paid'] : 0;
            $cot[] = !empty($booking['total_paid']) ? $booking['total_paid'] : 0;
        }
        # --- get value booking order transfer --- #
        if (in_array($booking['mange_id'], $first_mange) == false && !empty($booking['mange_id'])) {
            $first_mange[] = $booking['mange_id'];
            $mange_id[] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
            $car_name[] = !empty($booking['car_name']) ? $booking['car_name'] : '';
            $car_registration[] = !empty($booking['license']) ? $booking['license'] : '';
            $driver_name[] = !empty($booking['driver_name']) ? $booking['driver_name'] : '';
            $manage_travel_date[] = !empty($booking['manage_travel_date']) ? $booking['manage_travel_date'] : 0;

            $count_bot++;
        }
        if (in_array($booking['bomange_id'], $first_bot) == false && !empty($booking['bomange_id'])) {
            $first_bot[] = $booking['bomange_id'];
            $bomange_id[$booking['mange_id']][] = !empty($booking['bomange_id']) ? $booking['bomange_id'] : 0;
            $bot_bo[$booking['mange_id']][] = $booking['id'];
        }
        # --- get value booking order boat --- #
        if (in_array($booking['boboat_id'], $first_boboat) == false && !empty($booking['mangeb_id']) && !empty($booking['boboat_id'])) {
            $first_boboat[] = $booking['boboat_id'];
            $boboat_id[$booking['mangeb_id']][] = $booking['boboat_id'];
            $count_boboat++;
        }
        # --- get value booking payment --- #
        if ((in_array($booking['bopa_id'], $first_pay) == false) && !empty($booking['bopa_id'])) {
            # --- in array get value booking payment --- #
            $first_pay[] = $booking['bopa_id'];
            $bopay_id[$booking['id']] = !empty($booking['bopay_id']) ? $booking['bopay_id'] : 0;
            $bopay_name_class[$booking['id']] = !empty($booking['bopay_name_class']) ? $booking['bopay_name_class'] : '';
            $bopay_paid_name[$booking['id']] = $booking['bopay_id'] == 4 || $booking['bopay_id'] == 5 ? $booking['bopay_name'] . '</br>(' . number_format($booking['total_paid']) . ')' : $booking['bopay_name'];

            $pay_id[$booking['id']][] = !empty($booking['bopay_id']) ? $booking['bopay_id'] : 0;
            $pay_name[$booking['id']][] = !empty($booking['bopay_name']) ? $booking['bopay_name'] : 0;
            $cot[$booking['id']][] = !empty($booking['total_paid']) ? $booking['total_paid'] : 0;
        }
        # --- get value booking --- #
        if (in_array($booking['bec_id'], $first_extar) == false && (!empty($booking['extra_id']) || !empty($booking['bec_name']))) {
            $first_extar[] = $booking['bec_id'];
            $ext_total = $booking['bec_type'] == 1 ? ($booking['bec_adult'] * $booking['bec_rate_adult']) + ($booking['bec_child'] * $booking['bec_rate_child']) : ($booking['bec_privates'] * $booking['bec_rate_private']);
            $extar_total[$booking['id']][] = $ext_total;
            $extar_total_agent[$booking['comp_id']][] = $ext_total;
            $extar_arr_total[] = $ext_total;
        }
        # --- get value discount --- #
        if (in_array($booking['discount_id'], $first_disc) == false && !empty($booking['discount_id'])) {
            $first_disc[] = $booking['discount_id'];
            $discount_id[$booking['id']][] = !empty($booking['discount_id']) ? $booking['discount_id'] : 0;
            $discount_detail[$booking['id']][] = !empty($booking['discount_detail']) ? $booking['discount_detail'] : '';
            $discount_rates[$booking['id']][] = !empty($booking['discount_rates']) ? $booking['discount_rates'] : 0;
            $discount[] = !empty($booking['discount_rates']) ? $booking['discount_rates'] : 0;
            $comp_discount[$booking['comp_id']][] = !empty($booking['discount_rates']) ? $booking['discount_rates'] : 0;
        }
    }
    # ------ calculate booking paid ------ #
    if (!empty($bopay_id)) {
        foreach ($bopay_id as $x => $val) {
            # --- calculator booking --- #
            $total = !empty($array_amount[$x]) ? array_sum($array_amount[$x]) : 0; // booking
            $total -= !empty($discount_rates[$x]) ? array_sum($discount_rates[$x]) : 0; // - discount
            $total -= !empty($bo_cot[$x]) ? array_sum($bo_cot[$x]) : 0; // - cot
            $total += !empty($extar_total[$x]) ? array_sum($extar_total[$x]) : 0; // + extar

            $not_issued += (!empty($pay_id[$x]) && (in_array(6, $pay_id[$x]) == false) && (in_array(3, $pay_id[$x]) == false)) ?  $total : 0;
            $issued_inv += (!empty($pay_id[$x]) && (in_array(6, $pay_id[$x]) == true) && (in_array(3, $pay_id[$x]) == false)) ?  $total : 0;
            $paid += (!empty($pay_id[$x]) && (in_array(3, $pay_id[$x]) == true)) ? $total : 0;
        }
    }

    # --- set href --- #
    $href = '';
    $href .= '&search_agent=' . $search_agent;
    $href .= '&search_product=' . $search_product;
    $href .= '&search_travel=' . $search_travel;
    if (!empty($search_status) && $search_status != 'all') {
        for ($i = 0; $i < count($search_status); $i++) {
            $href .= '&search_status[]=' . $search_status[$i];
        }
    }
    if (!empty($search_payment) && $search_payment != 'all') {
        for ($i = 0; $i < count($search_payment); $i++) {
            $href .= '&search_payment[]=' . $search_payment[$i];
        }
    }
?>
    <div class="bs-stepper-header p-1">
        <div class="step" data-target="#report-overview">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">1</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Overview</span>
                    <span class="bs-stepper-subtitle">Please fill out</span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#report-booking">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">2</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Booking</span>
                    <span class="bs-stepper-subtitle">Please fill out</span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#report-agent">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">3</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Agent</span>
                    <span class="bs-stepper-subtitle">Please fill out</span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#report-programe">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">4</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Programe</span>
                    <span class="bs-stepper-subtitle">Please fill out</span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#report-transfer">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">5</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Transfer</span>
                    <span class="bs-stepper-subtitle">Please fill out</span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#report-boat">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">6</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Boat</span>
                    <span class="bs-stepper-subtitle">Please fill out</span>
                </span>
            </button>
        </div>
    </div>

    <div class="bs-stepper-content p-0">
        <!----- Start Report Overview Vertical -------------------------------->
        <!-------------------------------------------------------------------->
        <div id="report-overview" class="content">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-info mt-50 ml-1" id="btnCopyOverview">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    Copy
                </button>
                <span>
                </span>
            </div>
            <hr>
            <div id="div-booking">
                <h3 class="text-center pt-1">รายงาน <span class="text-warning font-weight-bolder">Overview</span></h3>
                <!----- statistics --------------->
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($bo_id) ? count($bo_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Booking ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-archive" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($tourist_all) ? !empty($chrage_id) ? array_sum($tourist_all) - array_sum($chrage_tourist) : array_sum($tourist_all) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">จำนวนคนทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-archive" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($chrage_id) ? array_sum($chrage_tourist) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Cancel Chrage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-primary">
                                        <?php
                                        $total = !empty($array_total) ? array_sum($array_total) : 0;
                                        $total -= !empty($discount) ? array_sum($discount) : 0;
                                        $total += !empty($extar_arr_total) ? array_sum($extar_arr_total) : 0;
                                        echo number_format($total);
                                        ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">ยอดขายทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-success">
                                        <?php echo !empty($paid) ? number_format($paid) : 0; ?> THB
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">รับเงินทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-warning mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-warning"><?php echo !empty($cot) ? number_format(array_sum($cot)) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">Cash On Tour</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-info"><?php echo !empty($not_issued) ? number_format($not_issued) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">ค้างจ่ายที่ยังไม่ได้ออก Invoice</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-danger"><?php echo !empty($issued_inv) ? number_format($issued_inv) . ' THB' : '0 THB'; ?></h4>
                                    <p class="card-text font-small-3 mb-0">ค้างจ่าย</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-warning mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-warning"><?php echo !empty($discount) ? number_format(array_sum($discount)) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">Discount</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($bo_status) ? array_count_values($bo_status)[1] : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Confirm</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo (!empty($bo_status)) ? !empty(array_count_values($bo_status)[3]) ? array_count_values($bo_status)[3] : 0 : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Cancel</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-secondary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo (!empty($bo_status)) ? !empty(array_count_values($bo_status)[4]) ? array_count_values($bo_status)[4] : 0 : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">No Show</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--- Start Programe --->
                    <?php
                    if (!empty($prod_id)) {
                        $age = array_count_values($prod_id);
                        arsort($age);
                    ?>
                        <div class="row">
                            <?php foreach ($age as $x => $x_value) { ?>
                                <div class="col-4 mb-2">
                                    <div class="media">
                                        <div class="avatar bg-light-secondary mr-2">
                                            <div class="avatar-content m-50">
                                                <i class="fa-solid fa-location-arrow" style="font-size: 20px;"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0"><?php echo !empty($product_tourist[$x]) ? !empty($product_chrage[$x]) ? array_sum($product_tourist[$x]) - array_sum($product_chrage[$x]) : array_sum($product_tourist[$x]) : 0; ?></h4>
                                            <p class="card-text font-small-3 mb-0"><?php echo $product_name[$x] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!--- End Programe --->

                    <!--- Start Transfer --->
                    <?php if (!empty($mange_id)) { ?>
                        <div class="row">
                            <?php foreach ($mange_id as $x => $val) {
                                $tourist_car = 0;
                                $chrage_car = 0;
                                foreach ($bot_bo[$val] as $id) {
                                    $tourist_car += !empty($tourist_max[$id]) ? array_sum($tourist_max[$id]) : 0;
                                    $chrage_car += !empty($chrage_bo[$id]) ? array_sum($chrage_bo[$id]) : 0;
                                }
                            ?>
                                <div class="col-4 mb-2">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content m-50">
                                                <i class="fa-solid fa-car" style="font-size: 20px;"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0"><?php echo $tourist_car - $chrage_car; ?></h4>
                                            <p class="card-text font-small-3 mb-0">
                                                <?php
                                                echo !empty($car_name[$x]) ? $car_name[$x] : '';
                                                echo !empty($driver_name[$x]) ? !empty($car_name[$x]) ? ' / ' . $driver_name[$x] : $driver_name[$x] : '';
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!--- End Transfer --->

                    <!--- Start Boat --->
                    <?php if (!empty($boat_order_id)) { ?>
                        <div class="row">
                            <?php foreach ($boat_order_id as $x => $val) {
                                $tourist_boat = 0;
                                $chrage_boat = 0;
                                foreach ($mangeb_id[$x] as $id) {
                                    $tourist_boat += !empty($tourist_max[$id]) ? array_sum($tourist_max[$id]) : 0;
                                    $chrage_boat += !empty($chrage_bo[$id]) ? array_sum($chrage_bo[$id]) : 0;
                                }
                            ?>
                                <div class="col-4 mb-2">
                                    <div class="media">
                                        <div class="avatar mr-2" style="color:<?php echo $boat_color[$val[0]]; ?>; background-color: <?php echo $boat_background[$val[0]]; ?>;">
                                            <div class="avatar-content m-50">
                                                <i class="fas fa-ship" style="font-size: 20px;"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0"><?php echo $tourist_boat - $chrage_boat; ?></h4>
                                            <p class="card-text font-small-3 mb-0"><span style="color: <?php echo $boat_color[$val[0]]; ?>; font-weight: bold;"><?php echo $boat_name[$val[0]]; ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!--- End Boat --->

                    <?php
                    if (!empty($prod_id)) {
                        $age = array_count_values($prod_id);
                        arsort($age);
                    ?>
                        <div class="row" hidden>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card card-transaction" style="box-shadow : 0 0 0 0 !important">
                                    <div class="card-header">
                                        <h4 class="card-title">Programe</h4>
                                        <div class="font-weight-bolder text-danger"><?php echo !empty($prod_id) ? count($age) : 0; ?></div>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($age as $x => $x_value) { ?>
                                            <div class="transaction-item">
                                                <div class="media">
                                                    <!-- <div class="avatar bg-light-primary rounded">
                                                        <div class="avatar-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket avatar-icon font-medium-3">
                                                                <path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path>
                                                                <polyline points="8 10 12 14 16 10"></polyline>
                                                            </svg>
                                                        </div>
                                                    </div> -->
                                                    <div class="media-body">
                                                        <h6 class="transaction-title"><?php echo $product_name[$x] ?></h6>
                                                        <!-- <small>Starbucks</small> -->
                                                    </div>
                                                </div>
                                                <div class="font-weight-bolder text-success"><?php echo !empty($product_tourist[$x]) ? !empty($product_chrage[$x]) ? array_sum($product_tourist[$x]) - array_sum($product_chrage[$x]) : array_sum($product_tourist[$x]) : 0; ?></div>
                                            </div>
                                        <?php } ?>

                                        <div class="transaction-item">
                                            <div class="media">
                                                <div class="avatar bg-light-success rounded">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check avatar-icon font-medium-3">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="transaction-title">Bank Transfer</h6>
                                                    <small>Add Money</small>
                                                </div>
                                            </div>
                                            <div class="font-weight-bolder text-success">+ $480</div>
                                        </div>
                                        <div class="transaction-item">
                                            <div class="media">
                                                <div class="avatar bg-light-danger rounded">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon font-medium-3">
                                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="transaction-title">Paypal</h6>
                                                    <small>Add Money</small>
                                                </div>
                                            </div>
                                            <div class="font-weight-bolder text-success">+ $590</div>
                                        </div>
                                        <div class="transaction-item">
                                            <div class="media">
                                                <div class="avatar bg-light-warning rounded">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card avatar-icon font-medium-3">
                                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="transaction-title">Mastercard</h6>
                                                    <small>Ordered Food</small>
                                                </div>
                                            </div>
                                            <div class="font-weight-bolder text-danger">- $23</div>
                                        </div>
                                        <div class="transaction-item">
                                            <div class="media">
                                                <div class="avatar bg-light-info rounded">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon font-medium-3">
                                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                            <polyline points="17 6 23 6 23 12"></polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="transaction-title">Transfer</h6>
                                                    <small>Refund</small>
                                                </div>
                                            </div>
                                            <div class="font-weight-bolder text-success">+ $98</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <!-------------------------------------------------------------------->
        <!----- End Report Overview Vertical ---------------------------------->

        <!----- Start Report Booking Vertical -------------------------------->
        <!-------------------------------------------------------------------->
        <div id="report-booking" class="content">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-info mt-50 ml-1" id="btnCopyBooking">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    Copy
                </button>
                <span>
                </span>
            </div>
            <hr>
            <div id="div-booking">
                <h3 class="text-center pt-1">รายงาน <span class="text-warning font-weight-bolder">Booking</span></h3>
                <h5 class="text-center">เอเยนต์ทั้งหมด โปรแกรมทั้งหมด</h5>
                <input type="hidden" id="name-img-booking" value="<?php echo "รายงานบุ๊คกิ้ง-" . date("dmY-Hs"); ?>">
                <!----- statistics --------------->
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($bo_id) ? count($bo_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Booking ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-archive" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($tourist_all) ? !empty($chrage_id) ? array_sum($tourist_all) - array_sum($chrage_tourist) : array_sum($tourist_all) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">จำนวนคนทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-archive" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($chrage_id) ? array_sum($chrage_tourist) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Cancel Chrage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-primary">
                                        <?php
                                        $total = !empty($array_total) ? array_sum($array_total) : 0;
                                        $total -= !empty($discount) ? array_sum($discount) : 0;
                                        $total += !empty($extar_arr_total) ? array_sum($extar_arr_total) : 0;
                                        echo number_format($total);
                                        ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">ยอดขายทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-success">
                                        <?php echo !empty($paid) ? number_format($paid) : 0; ?> THB
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">รับเงินทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-warning mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-warning"><?php echo !empty($cot) ? number_format(array_sum($cot)) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">Cash On Tour</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-info"><?php echo !empty($not_issued) ? number_format($not_issued) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">ค้างจ่ายที่ยังไม่ได้ออก Invoice</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-danger"><?php echo !empty($issued_inv) ? number_format($issued_inv) . ' THB' : '0 THB'; ?></h4>
                                    <p class="card-text font-small-3 mb-0">ค้างจ่าย</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-warning mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-warning"><?php echo !empty($discount) ? number_format(array_sum($discount)) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">Discount</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($bo_status) ? array_count_values($bo_status)[1] : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Confirm</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo (!empty($bo_status)) ? !empty(array_count_values($bo_status)[3]) ? array_count_values($bo_status)[3] : 0 : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Cancel</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-secondary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo (!empty($bo_status)) ? !empty(array_count_values($bo_status)[4]) ? array_count_values($bo_status)[4] : 0 : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">No Show</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- table --------------->
                <table class="table table-striped text-uppercase table-vouchure-t2">
                    <thead class="bg-light">
                        <tr>
                            <th>Status</th>
                            <th>Payment</th>
                            <th class="cell-fit">Voucher No.</th>
                            <th>Agent</th>
                            <th>Travel Date</th>
                            <th>Programe</th>
                            <th>Pax</th>
                            <th>Hotel</th>
                            <th>Customer</th>
                            <th>Booker</th>
                        </tr>
                    </thead>
                    <?php if (!empty($bo_id)) { ?>
                        <tbody>
                            <?php for ($i = 0; $i < count($bo_id); $i++) { ?>
                                <tr>
                                    <td class="cell-fit"><?php echo $status[$i]; ?></td>
                                    <td class="cell-fit"><?php echo !empty($bopay_id[$bo_id[$i]]) ? '<span class="badge badge-pill ' . $bopay_name_class[$bo_id[$i]] . ' text-capitalized"> ' . $bopay_paid_name[$bo_id[$i]] . ' </span>' : '<span class="badge badge-pill badge-light-primary text-capitalized"> ไม่ได้ระบุ </span>'; ?></td>
                                    <td class="cell-fit"><?php echo !empty($voucher_no_agent[$i]) ? $voucher_no_agent[$i] : $book_full[$i]; ?></td>
                                    <td><?php echo $comp_name[$i]; ?></td>
                                    <td class="text-nowrap cell-fit"><?php echo (!empty($travel_date[$i])) ? date('j F Y', strtotime($travel_date[$i])) : ''; ?></td>
                                    <td class="text-nowrap">
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bolder text-primary"><?php echo $product_name[$prod_id[$i]]; ?></span>
                                            <!-- <span class="font-small-3"><?php echo $category_name[$prod_id[$i]]; ?></span> -->
                                        </div>
                                    </td>
                                    <td class="cell-fit <?php echo (!empty($chrage_id[$i])) ? 'text-info font-weight-bolder' : ''; ?>"><?php echo !empty($tourist_max[$bo_id[$i]]) ? (!empty($chrage_id[$i])) ? array_sum($tourist_max[$bo_id[$i]]) - $chrage_tourist[$i] : array_sum($tourist_max[$bo_id[$i]]) : 0; ?></td>
                                    <td><?php echo $hotel_pickup_name[$i]; ?></td>
                                    <td><?php echo $cus_name[$i]; ?></td>
                                    <td><?php echo $sender[$i]; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-------------------------------------------------------------------->
        <!----- End Report Booking Vertical ---------------------------------->

        <!-- Start Report Agent Vertical ------------------------------------->
        <!-------------------------------------------------------------------->
        <div id="report-agent" class="content">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-info mt-50 ml-1" id="btnCopyAgent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    Copy
                </button>
                <span>
                </span>
            </div>
            <hr>
            <div id="div-agent">
                <h3 class="text-center pt-1">รายงาน <span class="text-warning font-weight-bolder">Agent</span></h3>
                <h5 class="text-center">เอเยนต์ทั้งหมด โปรแกรมทั้งหมด</h5>
                <input type="hidden" id="name-img-agent" value="<?php echo "รายงานเอเยนต์-" . date("dmY-Hs"); ?>">
                <!----- statistics --------------->
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-5">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($agent_id) ? count($agent_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Agent ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-primary"><?php echo !empty($comp_id) ? count($comp_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Booking ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-primary">
                                        <?php
                                        $total = !empty($array_total) ? array_sum($array_total) : 0;
                                        $total -= !empty($discount) ? array_sum($discount) : 0;
                                        $total += !empty($extar_arr_total) ? array_sum($extar_arr_total) : 0;
                                        echo number_format($total);
                                        ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">ยอดขายทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-success">
                                        <?php echo !empty($paid) ? number_format($paid) : 0; ?> THB
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">รับเงินทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-warning mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-warning"><?php echo !empty($cot) ? number_format(array_sum($cot)) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">Cash On Tour</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-info"><?php echo !empty($not_issued) ? number_format($not_issued) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">ค้างจ่ายที่ยังไม่ได้ออก Invoice</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-danger"><?php echo !empty($issued_inv) ? number_format($issued_inv) . ' THB' : '0 THB'; ?></h4>
                                    <p class="card-text font-small-3 mb-0">ค้างจ่าย</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="media">
                                <div class="avatar bg-light-warning mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-warning"><?php echo !empty($discount) ? number_format(array_sum($discount)) : 0; ?> THB</h4>
                                    <p class="card-text font-small-3 mb-0">Discount</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- table -------------------->
                <table class="table table-striped text-uppercase table-vouchure-t2">
                    <thead class="bg-light">
                        <tr>
                            <th>Agent</th>
                            <th class="text-center">Booking</th>
                            <th class="text-center">A</th>
                            <th class="text-center">C</th>
                            <th class="text-center">INF</th>
                            <th class="text-center">FOC</th>
                            <th class="text-center">Cancel</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center">Amount</br><small>(THB)</small></th>
                            <th class="text-center">Income</br><small>(THB)</small></th>
                            <th class="text-center">Overdue</br><small>(THB)</small></th>
                        </tr>
                    </thead>
                    <?php if (!empty($agent_id)) { ?>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($agent_id); $i++) {
                                $amount_comp = !empty($comp_amount[$agent_id[$i]]) ? array_sum($comp_amount[$agent_id[$i]]) : 0;
                                $amount_comp -= !empty($comp_discount[$agent_id[$i]]) ? array_sum($comp_discount[$agent_id[$i]]) : 0;
                                $amount_comp += !empty($extar_total_agent[$agent_id[$i]]) ? array_sum($extar_total_agent[$agent_id[$i]]) : 0;

                                $revenue_comp = !empty($comp_revenue[$agent_id[$i]]) ? array_sum($comp_revenue[$agent_id[$i]]) : 0;
                                $revenue_comp -= (!empty($comp_discount[$agent_id[$i]]) && $revenue_comp > 0) ? array_sum($comp_discount[$agent_id[$i]]) : 0;
                                $revenue_comp += (!empty($extar_total_agent[$agent_id[$i]]) && $revenue_comp > 0) ? array_sum($extar_total_agent[$agent_id[$i]]) : 0;
                            ?>
                                <tr>
                                    <td>
                                        <img src="storage/uploads/no-image.jpg" class="mr-75" height="40" width="40" alt="Angular">
                                        <span class="font-weight-bolder text-primary"><?php echo $agent_name[$i]; ?></span>
                                    </td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($comp_id) ? array_count_values($comp_id)[$agent_id[$i]] : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($comp_adult[$agent_id[$i]]) ? array_sum($comp_adult[$agent_id[$i]]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($comp_child[$agent_id[$i]]) ? array_sum($comp_child[$agent_id[$i]]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($comp_infant[$agent_id[$i]]) ? array_sum($comp_infant[$agent_id[$i]]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($comp_foc[$agent_id[$i]]) ? array_sum($comp_foc[$agent_id[$i]]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($comp_chrage[$agent_id[$i]]) ? array_sum($comp_chrage[$agent_id[$i]]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($comp_sum[$agent_id[$i]]) ? (!empty($comp_chrage[$agent_id[$i]])) ? array_sum($comp_sum[$agent_id[$i]]) - array_sum($comp_chrage[$agent_id[$i]]) : array_sum($comp_sum[$agent_id[$i]]) : 0; ?></td>
                                    <td class="text-nowrap text-center font-weight-bolder">
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bolder mb-25 text-warning"><?php echo number_format($amount_comp); ?></span>
                                        </div>
                                    </td>
                                    <td class="text-nowrap text-center font-weight-bolder">
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bolder mb-25 text-success"><?php echo number_format($revenue_comp); ?></span>
                                        </div>
                                    </td>
                                    <td class="text-nowrap text-center font-weight-bolder">
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bolder mb-25 text-danger"><?php echo number_format($amount_comp - $revenue_comp); ?></span>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-------------------------------------------------------------------->
        <!----- End Report Agent Vertical ------------------------------------>

        <!-- Report Programe Vertical ---------------------------------------->
        <!-------------------------------------------------------------------->
        <div id="report-programe" class="content">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-info mt-50 ml-1" id="btnCopyPrograme">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    Copy
                </button>
                <span>
                </span>
            </div>
            <hr>
            <div id="div-programe">
                <h3 class="text-center pt-1">รายงาน <span class="text-warning font-weight-bolder">Programe</span></h3>
                <h5 class="text-center">เอเยนต์ทั้งหมด โปรแกรมทั้งหมด</h5>
                <input type="hidden" id="name-img-programe" value="<?php echo "รายงานโปรแกรม-" . date("dmY-Hs"); ?>">
                <!----- statistics --------------->
                <div class="card-body statistics-body pb-0">
                    <div class="row">
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package font-medium-5">
                                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($prod_id) ? count($prod_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Programe ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-primary"><?php echo !empty($prod_id) ? count($prod_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Booking ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- table -------------------->
                <table class="table table-striped text-uppercase table-vouchure-t2">
                    <thead class="bg-light">
                        <tr>
                            <th>Programe Name</th>
                            <th class="text-center">A</th>
                            <th class="text-center">C</th>
                            <th class="text-center">INF</th>
                            <th class="text-center">FOC</th>
                            <th class="text-center">Cancel</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <?php if (!empty($prod_id)) { ?>
                        <tbody>
                            <?php
                            $age = array_count_values($prod_id);
                            arsort($age);
                            foreach ($age as $x => $x_value) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="font-weight-bolder text-primary"><?php echo $product_name[$x] ?></div>
                                    </td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($product_adult[$x]) ? array_sum($product_adult[$x]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($product_child[$x]) ? array_sum($product_child[$x]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($product_infant[$x]) ? array_sum($product_infant[$x]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($product_foc[$x]) ? array_sum($product_foc[$x]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($product_chrage[$x]) ? array_sum($product_chrage[$x]) : 0; ?></td>
                                    <td class="text-center font-weight-bolder"><?php echo !empty($product_tourist[$x]) ? !empty($product_chrage[$x]) ? array_sum($product_tourist[$x]) - array_sum($product_chrage[$x]) : array_sum($product_tourist[$x]) : 0; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-------------------------------------------------------------------->
        <!----- End Report Programe Vertical --------------------------------->

        <!-- Start Report Transfer Vertical ---------------------------------->
        <!-------------------------------------------------------------------->
        <div id="report-transfer" class="content">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-info mt-50 ml-1" id="btnCopyTransfer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    Copy
                </button>
                <span>
                </span>
            </div>
            <hr>
            <div id="div-transfer">
                <h3 class="text-center pt-1">รายงาน <span class="text-warning font-weight-bolder">Transfer</span></h3>
                <h5 class="text-center">เอเยนต์ทั้งหมด โปรแกรมทั้งหมด</h5>
                <input type="hidden" id="name-img-transfer" value="<?php echo "รายงานรถ-" . date("dmY-Hs"); ?>">
                <!----- statistics --------------->
                <div class="card-body statistics-body pb-0">
                    <div class="row">
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck font-medium-5">
                                            <rect x="1" y="3" width="15" height="13"></rect>
                                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_id) ? count($mange_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Car ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-primary"><?php echo $count_bot; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Booking ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- table -------------------->
                <table class="table table-striped text-uppercase table-vouchure-t2">
                    <thead class="bg-light">
                        <tr>
                            <th>Car & Driver</th>
                            <th>Travel Date</th>
                            <th class="text-center">Booking</th>
                            <th class="text-center">A</th>
                            <th class="text-center">C</th>
                            <th class="text-center">Inf</th>
                            <th class="text-center">FOC</th>
                            <th class="text-center">Cancel</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mange_id)) {
                            foreach ($mange_id as $x => $val) {
                                $adult_car = 0;
                                $child_car = 0;
                                $infant_car = 0;
                                $foc_car = 0;
                                $tourist_car = 0;
                                $chrage_car = 0;
                                foreach ($bot_bo[$val] as $bo_id) {
                                    $adult_car += !empty($adult[$bo_id]) ? array_sum($adult[$bo_id]) : 0;
                                    $child_car += !empty($child[$bo_id]) ? array_sum($child[$bo_id]) : 0;
                                    $infant_car += !empty($infant[$bo_id]) ? array_sum($infant[$bo_id]) : 0;
                                    $foc_car += !empty($foc[$bo_id]) ? array_sum($foc[$bo_id]) : 0;
                                    $tourist_car += !empty($tourist_max[$bo_id]) ? array_sum($tourist_max[$bo_id]) : 0;
                                    $chrage_car += !empty($chrage_bo[$bo_id]) ? array_sum($chrage_bo[$bo_id]) : 0;
                                }
                        ?>
                                <tr>
                                    <td>
                                        <div class="font-weight-bolder text-primary">
                                            <?php
                                            echo !empty($car_name[$x]) ? $car_name[$x] : '';
                                            echo !empty($driver_name[$x]) ? !empty($car_name[$x]) ? ' / ' . $driver_name[$x] : $driver_name[$x] : '';
                                            ?>
                                        </div>
                                    </td>
                                    <td><b><?php echo (!empty($manage_travel_date[$x])) ? date('j F Y', strtotime($manage_travel_date[$x])) : ''; ?></b></td>
                                    <td class="text-center"><b><?php echo !empty($bot_bo[$val]) ? count($bot_bo[$val]) : 0; ?></b></td>
                                    <td class="text-center"><b><?php echo $adult_car; ?></b></td>
                                    <td class="text-center"><b><?php echo $child_car; ?></b></td>
                                    <td class="text-center"><b><?php echo $infant_car; ?></b></td>
                                    <td class="text-center"><b><?php echo $foc_car; ?></b></td>
                                    <td class="text-center"><b><?php echo $chrage_car; ?></b></td>
                                    <td class="text-center"><b><?php echo $tourist_car - $chrage_car; ?></b></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-------------------------------------------------------------------->
        <!----- End Report Transfer Vertical --------------------------------->

        <!-- Start Report Boat Vertical -------------------------------------->
        <!-------------------------------------------------------------------->
        <div id="report-boat" class="content">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-info mt-50 ml-1" id="btnCopyBoat">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    Copy
                </button>
                <span>
                </span>
            </div>
            <hr>
            <div id="div-boat">
                <h3 class="text-center pt-1">รายงาน <span class="text-warning font-weight-bolder">Boat</span></h3>
                <h5 class="text-center">เอเยนต์ทั้งหมด โปรแกรมทั้งหมด</h5>
                <input type="hidden" id="name-img-boat" value="<?php echo "รายงานเรือ-" . date("dmY-Hs"); ?>">
                <!----- statistics --------------->
                <div class="card-body statistics-body pb-0">
                    <div class="row">
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation-2 font-medium-5">
                                            <polygon points="12 2 19 21 12 17 5 21 12 2"></polygon>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"><?php echo !empty($mangeb_id) ? count($mangeb_id) : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Boat ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content m-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0 text-primary"><?php echo !empty($count_boboat) ? $count_boboat : 0; ?></h4>
                                    <p class="card-text font-small-3 mb-0">Booking ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- table --------------->
                <table class="table table-striped text-uppercase table-vouchure-t2">
                    <thead class="bg-light">
                        <tr>
                            <th>Boat & Captain</th>
                            <th>Programe</th>
                            <th>Travel Date</th>
                            <th class="text-center">Booking</th>
                            <th class="text-center">A</th>
                            <th class="text-center">C</th>
                            <th class="text-center">Inf</th>
                            <th class="text-center">FOC</th>
                            <th class="text-center">Cancel</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($boat_order_id)) {
                            foreach ($boat_order_id as $x => $val) {
                                $adult_boat = 0;
                                $child_boat = 0;
                                $infant_boat = 0;
                                $foc_boat = 0;
                                $tourist_boat = 0;
                                $chrage_boat = 0;
                                foreach ($mangeb_id[$x] as $bo_id) {
                                    $adult_boat += !empty($adult[$bo_id]) ? array_sum($adult[$bo_id]) : 0;
                                    $child_boat += !empty($child[$bo_id]) ? array_sum($child[$bo_id]) : 0;
                                    $infant_boat += !empty($infant[$bo_id]) ? array_sum($infant[$bo_id]) : 0;
                                    $foc_boat += !empty($foc[$bo_id]) ? array_sum($foc[$bo_id]) : 0;
                                    $tourist_boat += !empty($tourist_max[$bo_id]) ? array_sum($tourist_max[$bo_id]) : 0;
                                    $chrage_boat += !empty($chrage_bo[$bo_id]) ? array_sum($chrage_bo[$bo_id]) : 0;
                                }
                        ?>
                                <tr>
                                    <td style="color: <?php echo $boat_color[$val[0]]; ?>; font-weight: bold;"><?php echo $boat_name[$val[0]]; ?></span></td>
                                    <td>
                                        <div class="text-primary font-weight-bolder"><?php echo $product_name[$boat_product[$x]]; ?></div>
                                    </td>
                                    <td><b><?php echo (!empty($mangeb_travel[$x])) ? date('j F Y', strtotime($mangeb_travel[$x])) : ''; ?></b></td>
                                    <td class="text-center"><b><?php echo count($boboat_id[$x]); ?></b></td>
                                    <td class="text-center"><b><?php echo $adult_boat; ?></b></td>
                                    <td class="text-center"><b><?php echo $child_boat; ?></b></td>
                                    <td class="text-center"><b><?php echo $infant_boat; ?></b></td>
                                    <td class="text-center"><b><?php echo $foc_boat; ?></b></td>
                                    <td class="text-center"><b><?php echo $chrage_boat; ?></b></td>
                                    <td class="text-center"><b><?php echo $tourist_boat - $chrage_boat; ?></b></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-------------------------------------------------------------------->
        <!----- End Report Boat Vertical ------------------------------------->

    </div>
<?php } ?>