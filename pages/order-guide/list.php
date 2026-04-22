<?php
require_once 'controllers/Manage.php';

$manageObj = new Manage();

$today = date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime(" +1 day"));
// $today = '2025-12-12';

$first_bpr = array();
$first_booking = array();
$first_prod = array();
$first_cus = array();
$first_program = array();
$first_ext = array();
$first_bmanage = array();
$frist_over = array();
$first_bomanage = array();
$first_bo = [];
$first_trans = [];
$bookings = $manageObj->showlistboats('guide', 0, $today, $boat = 'all', $guide = 'all', $status = 'all', $agent = 'all', $product = 'all', $voucher_no = '', $refcode = '', $name = '', $hotel = '');
if (!empty($bookings)) {
    foreach ($bookings as $booking) {
        # --- get value Programe --- #
        if (in_array($booking['product_id'], $first_prod) == false) {
            $first_prod[] = $booking['product_id'];
            $programe_id[] = !empty($booking['product_id']) ? $booking['product_id'] : 0;
            $programe_name[] = !empty($booking['product_name']) ? $booking['product_name'] : '';
            $programe_type[] = !empty($booking['pg_type_name']) ? $booking['pg_type_name'] : '';
            $programe_pier[] = !empty($booking['pier_name']) ? $booking['pier_name'] : '';
        }
        # --- get value booking --- #
        if (in_array($booking['id'], $first_booking) == false) {
            $first_booking[] = $booking['id'];
            $bo_id[] = !empty($booking['id']) ? $booking['id'] : 0;
            $status_by_name[$booking['id']] = !empty($booking['status_by']) ? $booking['stabyFname'] . ' ' . $booking['stabyLname'] : '';
            $status[$booking['id']] = '<span class="badge badge-pill ' . $booking['booksta_class'] . ' text-capitalized"> ' . $booking['booksta_name'] . ' </span>';
            $hotel_name[$booking['id']] = !empty($booking['pickup_name']) ? $booking['pickup_name'] : '';
            $zone_pickup[$booking['id']] = !empty($booking['zonep_name']) ? ' (' . $booking['zonep_name'] . ')' : '';
            $dropoff_name[$booking['id']] = !empty($booking['dropoff_name']) ? $booking['dropoff_name'] : '';
            $zone_dropoff[$booking['id']] = !empty($booking['zoned_name']) ? ' (' . $booking['zoned_name'] . ')' : '';
            $room_no[$booking['id']] = !empty($booking['room_no']) ? $booking['room_no'] : '';
            $start_pickup[$booking['id']] = !empty($booking['start_pickup']) && $booking['start_pickup'] != '00:00' ? $booking['start_pickup'] : '00:00';
            $end_pickup[$booking['id']] = !empty($booking['end_pickup']) && $booking['end_pickup'] != '00:00' ? $booking['end_pickup'] : '00:00';
            $outside[$booking['id']] = !empty($booking['outside']) ? $booking['outside'] : '';
            $outside_dropoff[$booking['id']] = !empty($booking['outside_dropoff']) ? $booking['outside_dropoff'] : '';
            $pickup_type[$booking['id']] = !empty($booking['pickup_type']) ? $booking['pickup_type'] : 0;
            $sender[$booking['id']] = !empty($booking['sender']) ? $booking['sender'] : '';
            $note[$booking['id']] = !empty($booking['bp_note']) ? $booking['bp_note'] : '';
            $bp_id[$booking['id']] = !empty($booking['bp_id']) ? $booking['bp_id'] : 0;
            $cot[$booking['id']] = !empty($booking['total_paid']) ? $booking['total_paid'] : 0;
            $book_full[$booking['id']] = !empty($booking['book_full']) ? $booking['book_full'] : '';
            $voucher_no[$booking['id']] = !empty(!empty($booking['voucher_no_agent'])) ? $booking['voucher_no_agent'] : '';
            $travel_date[$booking['id']] = !empty(!empty($booking['travel_date'])) ? $booking['travel_date'] : '0000-00-00';
            $product_name[$booking['id']] = !empty(!empty($booking['product_name'])) ? $booking['product_name'] : '';
            $agent_name[$booking['id']] = !empty($booking['comp_name']) ? $booking['comp_name'] : '';
            $mange_id[$booking['id']] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
            $boat_id[$booking['id']] = !empty($booking['boat_id']) ? $booking['boat_id'] : '';
            $boat_name[$booking['id']] = !empty($booking['boat_name']) ? $booking['boat_name'] : '';
            $color_id[$booking['id']] = !empty($booking['color_id']) ? $booking['color_id'] : '';
            $check_in[$booking['id']] = !empty($booking['check_id']) ? $booking['check_id'] : 0;
            # --- array programe --- #
            $check_mange[$booking['product_id']][] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
            $prod_adult[$booking['product_id']][] = !empty($booking['adult']) && $booking['mange_id'] == 0 ? $booking['adult'] : 0;
            $prod_child[$booking['product_id']][] = !empty($booking['child']) && $booking['mange_id'] == 0 ? $booking['child'] : 0;
            $prod_infant[$booking['product_id']][] = !empty($booking['infant']) && $booking['mange_id'] == 0 ? $booking['infant'] : 0;
            $prod_foc[$booking['product_id']][] = !empty($booking['foc']) && $booking['mange_id'] == 0 ? $booking['bp_foc'] : 0;
            # --- chrage --- #
            $chrage_id[$booking['id']] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
            $chrage_adult[$booking['id']] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
            $chrage_child[$booking['id']] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
            $chrage_infant[$booking['id']] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
            $chrage_tourist[$booking['id']] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
        }
        # --- get value customer --- #
        if (in_array($booking['cus_id'], $first_cus) == false) {
            $first_cus[] = $booking['cus_id'];
            $cus_id[$booking['id']][] = !empty($booking['cus_id']) ? $booking['cus_id'] : 0;
            $cus_name[$booking['id']][] = !empty($booking['cus_name']) ? $booking['cus_name'] : '';
            $passport[$booking['id']][] = !empty($booking['id_card']) ? $booking['id_card'] : '';
            $birth_date[$booking['id']][] = !empty($booking['birth_date']) && $booking['birth_date'] != '0000-00-00' ? date('j F Y', strtotime($booking['birth_date'])) : '';
            $nation_name[$booking['id']][] = !empty($booking['nation_name']) ? $booking['nation_name'] : '';
        }

        if (in_array($booking['bpr_id'], $first_bpr) == false) {
            $first_bpr[] = $booking['bpr_id'];
            $category_name[$booking['id']][] = !empty($booking['category_name']) ? $booking['category_name'] : '';
            $adult[$booking['id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
            $child[$booking['id']][] = !empty($booking['child']) ? $booking['child'] : 0;
            $infant[$booking['id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
            $foc[$booking['id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;
            $rate_adult[$booking['id']][] = !empty($booking['rate_adult']) ? $booking['rate_adult'] : 0;
            $rate_child[$booking['id']][] = !empty($booking['rate_child']) ? $booking['rate_child'] : 0;
            $cate_transfer[$booking['id']][] = !empty($booking['category_transfer']) ? $booking['category_transfer'] : 0;
            $tourist_array[$booking['id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];
        }

        # --- get value booking --- #
        if (in_array($booking['boman_id'], $first_bmanage) == false) {
            $first_bmanage[] = $booking['boman_id'];
            $bo_mange_id[$booking['mange_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
        }

        # --- get value manage transfer overnight --- #
        if ((in_array($booking['over_id'], $frist_over) == false) && $booking['over_manage'] > 0) {
            $frist_over[] = $booking['over_id'];
            $bo_mange_id[$booking['over_manage']][] = !empty($booking['id']) ? $booking['id'] : 0;
            $over_id[$booking['id']] = !empty($booking['over_id']) ? $booking['over_id'] : 0;
            $over_manage[$booking['id']] = !empty($booking['over_manage']) ? $booking['over_manage'] : 0;
        }

        # --- get value booking extra chang --- #
        if ((in_array($booking['bec_id'], $first_ext) == false) && !empty($booking['bec_id'])) {
            $first_ext[] = $booking['bec_id'];
            $bec_id[$booking['id']][] = !empty($booking['bec_id']) ? $booking['bec_id'] : 0;
            $bec_name[$booking['id']][] = !empty($booking['bec_name']) ? $booking['bec_name'] : $booking['extra_name'];
            $bec_type[$booking['id']][] = !empty($booking['bec_type']) ? $booking['bec_type'] : 0;
            $bec_adult[$booking['id']][] = !empty($booking['bec_adult']) ? $booking['bec_adult'] : 0;
            $bec_child[$booking['id']][] = !empty($booking['bec_child']) ? $booking['bec_child'] : 0;
            $bec_infant[$booking['id']][] = !empty($booking['bec_infant']) ? $booking['bec_infant'] : 0;
            $bec_privates[$booking['id']][] = !empty($booking['bec_privates']) ? $booking['bec_privates'] : 0;
            $bec_rate_adult[$booking['id']][] = !empty($booking['bec_rate_adult']) ? $booking['bec_rate_adult'] : 0;
            $bec_rate_child[$booking['id']][] = !empty($booking['bec_rate_child']) ? $booking['bec_rate_child'] : 0;
            $bec_rate_infant[$booking['id']][] = !empty($booking['bec_rate_infant']) ? $booking['bec_rate_infant'] : 0;
            $bec_rate_private[$booking['id']][] = !empty($booking['bec_rate_private']) ? $booking['bec_rate_private'] : 0;
            $bec_rate_total[$booking['id']][] = $booking['bec_type'] > 0 ? $booking['bec_type'] == 1 ? (($booking['bec_adult'] * $booking['bec_rate_adult']) + ($booking['bec_child'] * $booking['bec_rate_child']) + ($booking['bec_infant'] * $booking['bec_rate_infant'])) : ($booking['bec_privates'] * $booking['bec_rate_private']) : 0;
        }

        if (in_array($booking['bomanage_id'], $first_bomanage) == false) {
            $first_bomanage[] = $booking['bomanage_id'];
            // $retrun_t = !empty($booking['pickup']) ? 1 : 2;
            // $retrun_t = 1;
            // $managet['bomanage_id'][$booking['id']][$retrun_t] = !empty($booking['bomanage_id']) ? $booking['bomanage_id'] : 0;
            // $managet['id'][$booking['id']][$retrun_t] = !empty($booking['manget_id']) ? $booking['manget_id'] : 0;
            // $managet['car'][$booking['id']][$retrun_t] = !empty($booking['car_name']) ? $booking['car_name'] : '';
            // $managet['pickup'][$booking['id']][] = !empty($booking['pickup']) ? $booking['pickup'] : 0;
            // $managet['dropoff'][$booking['id']][] = !empty($booking['dropoff']) ? $booking['dropoff'] : 0;

            $car_name[$booking['id']][] = !empty($booking['car_name']) ? $booking['car_name'] : '';
            $driver_name[$booking['id']][] = !empty($booking['driver_name']) ? $booking['driver_name'] : '';
        }
    }
}
# --- show list boats manage --- #
$first_manage = array();
$manages = $manageObj->show_manage_boat($today, $boat = 'all', 0);
if (!empty($manages)) {
    foreach ($manages as $manage) {
        if (in_array($manage['id'], $first_manage) == false) {
            $first_manage[] = $manage['id'];
            $mange['id'][] = !empty($manage['id']) ? $manage['id'] : 0;
            $mange['color'][] = !empty($manage['boat_color']) ? $manage['boat_color'] : '';
            $mange['background'][] = !empty($manage['boat_background']) ? $manage['boat_background'] : '';
            $mange['time'][] = !empty($manage['time']) ? date('H:i', strtotime($manage['time'])) : '00:00';
            $mange['boat_id'][] = !empty($manage['boat_id']) ? $manage['boat_id'] : 0;
            $mange['boat_name'][] = !empty($manage['boat_id']) ? !empty($manage['boat_name']) ? $manage['boat_name'] : '' : $manage['outside_boat'];
            $mange['counter'][] = !empty($manage['counter']) ? $manage['counter'] : '';
            $mange['guide_id'][] = !empty($manage['guide_id']) ? $manage['guide_id'] : 0;
            $mange['guide_name'][] = !empty($manage['guide_name']) ? $manage['guide_name'] : '';
            $mange['captain_id'][] = !empty($manage['captain_id']) ? $manage['captain_id'] : 0;
            $mange['captain_name'][] = !empty($manage['captain_id']) ?  $manage['captain_name'] : '';
            $mange['crewf_id'][] = !empty($manage['crewf_id']) ? $manage['crewf_id'] : 0;
            $mange['crews_id'][] = !empty($manage['crews_id']) ? $manage['crews_id'] : 0;
            $mange['crewf_name'][] = !empty($manage['crewf_id']) ? $manage['crewf_name'] : '';
            $mange['crews_name'][] = !empty($manage['crews_id']) ? $manage['crews_name'] : '';
            $mange['product_id'][] = !empty($manage['product_id']) ? $manage['product_id'] : 0;
            $mange['product_name'][] = !empty($manage['product_name']) ? $manage['product_name'] : '';
            $mange['booktye_name'][] = !empty($manage['booktye_name']) ? $manage['booktye_name'] : '';
            $mange['pier_name'][] = !empty($manage['pier_name']) ? $manage['pier_name'] : '';
            $mange['note'][] = !empty($manage['note']) ? $manage['note'] : '';
            $mange['outside_boat'][] = !empty($manage['outside_boat']) ? $manage['outside_boat'] : '';

            $arr_boat['mange_id'][] = !empty($manage['id']) ? $manage['id'] : 0;
            $arr_boat['id'][] = !empty($manage['boat_id']) ? $manage['boat_id'] : 0;
            $arr_boat['boat_id'][] = !empty($manage['boat_id']) ? $manage['boat_id'] : 0;
            $arr_boat['name'][] = !empty($manage['boat_id']) ? !empty($manage['boat_name']) ? $manage['boat_name'] : '' : $manage['outside_boat'];
            $arr_boat['refcode'][] = !empty($manage['boat_refcode']) ? $manage['boat_refcode'] : '';
        }
    }
}

$name_img = 'ใบงาน [' . date('j F Y', strtotime($today)) . ']';
?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="today-tab" data-toggle="tab" href="#today" aria-controls="today" role="tab" aria-selected="true" data-day="<?php echo $today; ?>" onclick="trigger_search(this);">Today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tomorrow-tab" data-toggle="tab" href="#tomorrow" aria-controls="tomorrow" role="tab" aria-selected="false" data-day="<?php echo $tomorrow; ?>" onclick="trigger_search(this);">Tomorrow</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="customh-tab" data-toggle="tab" href="#custom" aria-controls="custom" role="tab" aria-selected="true">Custom</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="today" aria-labelledby="today-tab" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="tomorrow" aria-labelledby="tomorrow-tab" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="custom" aria-labelledby="custom-tab" role="tabpanel">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- order job list start -->
            <section class="app-user-list">
                <!-- list section start -->
                <div class="card">
                    <!-- order job filter end -->
                    <div class="content-header">
                        <h5 class="pt-1 pl-2 pb-0">Search Filter</h5>
                        <form id="order-guide-search-form" name="order-guide-search-form" method="post" enctype="multipart/form-data">
                            <div class="d-flex align-items-center mx-50 row pt-0">
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="search_status">Status</label>
                                        <select class="form-control select2" id="search_status" name="search_status">
                                            <option value="all">All</option>
                                            <?php
                                            $bookstype = $manageObj->showliststatus();
                                            foreach ($bookstype as $booktype) {
                                                $selected = $search_status == $booktype['id'] ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $booktype['id']; ?>" <?php echo $selected; ?>><?php echo $booktype['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="search_agent">Agent</label>
                                        <select class="form-control select2" id="search_agent" name="search_agent">
                                            <option value="all">All</option>
                                            <?php
                                            $agents = $manageObj->showlistagent();
                                            foreach ($agents as $agent) {
                                                $selected = $search_agent == $agent['id'] ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $agent['id']; ?>" <?php echo $selected; ?>><?php echo $agent['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="search_product">Programe</label>
                                        <select class="form-control select2" id="search_product" name="search_product">
                                            <option value="all">All</option>
                                            <?php
                                            $products = $manageObj->showlistproduct();
                                            foreach ($products as $product) {
                                                $selected = $search_product == $product['id'] ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $product['id']; ?>" <?php echo $selected; ?>><?php echo $product['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="search_boat">เรือ</label>
                                        <select class="form-control select2" id="search_boat" name="search_boat">
                                            <option value="all">All</option>
                                            <?php
                                            $boats = $manageObj->showboats();
                                            foreach ($boats as $boat) {
                                                $selected = $search_boat == $boat['id'] ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $boat['id']; ?>" <?php echo $selected; ?>><?php echo $boat['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="search_guide">ไกด์</label>
                                        <select class="form-control select2" id="search_guide" name="search_guide">
                                            <option value="all">All</option>
                                            <?php
                                            $guides = $manageObj->showguides();
                                            foreach ($guides as $guide) {
                                            ?>
                                                <option value="<?php echo $guide['id']; ?>"><?php echo $guide['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="date_travel_form">วันที่เที่ยว (Travel Date)</label></br>
                                        <input type="text" class="form-control date-picker" id="date_travel_form" name="date_travel_form" value="<?php echo $today; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="refcode">Booking No #</label>
                                        <input type="text" class="form-control" id="refcode" name="refcode" value="<?php echo $refcode; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="voucher_no">Voucher No #</label>
                                        <input type="text" class="form-control" id="voucher_no" name="voucher_no" value="<?php echo $search_voucher_no; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Customer Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <button type="submit" class="btn btn-primary"><i data-feather='search'></i> Search</button>
                                    <button type="button" class="btn btn-info" id="btnCopy"><i data-feather='copy'></i> Copy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr class="pb-0 pt-0">
                    <div id="order-guide-search-table" style="background-color: #FFF;">
                        <!-- Header starts -->
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing">
                                <span class="brand-logo"><img src="app-assets/images/logo/logo-500.png" height="50"></span>
                                <span style="color: #000;">
                                    โทร : 062-3322800 / 084-7443000 / 083-1757444 </br>
                                    Email : Fantasticsimilantravel11@gmail.com
                                </span>
                            </div>
                            <div class="text-center card-text">
                                <h4 class="font-weight-bolder">ใบไกด์ - Daily Guide Report</h4>
                                <div class="badge badge-pill badge-light-danger">
                                    <h5 class="m-0 pl-1 pr-1 text-danger"><?php echo date('j F Y', strtotime($today)); ?></h5>
                                </div>
                            </div>
                        </div>
                        </br>
                        <!-- Header ends -->
                        <!-- Body starts -->
                        <div id="div-guide-list">
                            <?php
                            if (!empty($mange['id'])) {
                                for ($i = 0; $i < count($mange['id']); $i++) {
                            ?>
                                    <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                        <div class="col-4 text-left text-bold h4"></div>
                                        <div class="col-4 text-center">
                                            <span class="h4 badge-light-purple"
                                                style="color:<?php echo $mange['color'][$i]; ?>; background-color: <?php echo $mange['background'][$i]; ?>;">
                                                <?php echo $mange['boat_name'][$i]; ?>
                                            </span>
                                        </div>
                                        <div class="col-4 text-right mb-50"></div>
                                    </div>

                                    <table class="table table-striped text-uppercase table-vouchure-t2">
                                        <thead class="bg-light">
                                            <tr>
                                                <th colspan="7">ไกด์ : <?php echo $mange['guide_name'][$i]; ?></th>
                                                <th colspan="8">เคาน์เตอร์ : <?php echo $mange['counter'][$i]; ?></th>
                                            </tr>
                                            <tr>
                                                <th class="text-center cell-fit" width="1%">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input dt-checkboxes" type="checkbox" id="checkall<?php echo $mange["id"][$i]; ?>" onclick="checkbox(<?php echo $mange["id"][$i]; ?>);" <?php echo !empty($checkall) ? $checkall : ''; ?> />
                                                        <label class="custom-control-label" for="checkall<?php echo $mange["id"][$i]; ?>"></label>
                                                    </div>
                                                </th>
                                                <th width="5%">เวลารับ</th>
                                                <th width="5%">Driver</th>
                                                <th>Programe</th>
                                                <th>Category</th>
                                                <th width="15%">เอเยนต์</th>
                                                <th width="15%">ชื่อลูกค้า</th>
                                                <th width="5%">V/C</th>
                                                <th width="20%">โรงแรม</th>
                                                <th width="9%">ห้อง</th>
                                                <th class="text-center" width="1%">A</th>
                                                <th class="text-center" width="1%">C</th>
                                                <th class="text-center" width="1%">Inf</th>
                                                <th class="text-center" width="1%">FOC</th>
                                                <th>Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_tourist = 0;
                                            $total_adult = 0;
                                            $total_child = 0;
                                            $total_infant = 0;
                                            $total_foc = 0;
                                            if (!empty($bo_mange_id[$mange["id"][$i]])) {
                                                for ($a = 0; $a < count($bo_mange_id[$mange["id"][$i]]); $a++) {
                                                    $id = $bo_mange_id[$mange["id"][$i]][$a];

                                                    $total_adult += !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0;
                                                    $total_child += !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0;
                                                    $total_infant += !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0;
                                                    $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                                    $total_tourist += !empty($tourist_array[$id]) ? array_sum($tourist_array[$id]) : 0;

                                                    $text_hotel = (!empty($hotel_name[$id])) ? '<b>Pickup : </b>' . $hotel_name[$id] : '<b>Pickup : </b>' . $outside[$id];
                                                    $text_hotel .= (!empty($zone_pickup[$id])) ? ' ' . $zone_pickup[$id] . '</br>' : '</br>';
                                                    $text_hotel .= (!empty($dropoff_name[$id])) ? '<b>Dropoff : </b>' . $dropoff_name[$id] : '<b>Dropoff : </b>' . $outside_dropoff[$id];
                                                    $text_hotel .= (!empty($zone_dropoff[$id])) ? ' ' . $zone_dropoff[$id] . '' : '';

                                                    $color_tr = '';
                                                    if (!empty($over_id[$id]) && $over_id[$id] > 0 && $over_manage[$id] == $mange["id"][$i]) {
                                                        $color_tr = 'table-primary';
                                                    }
                                            ?>
                                                    <tr>
                                                        <td class="text-center cell-fit">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input dt-checkboxes checkbox-<?php echo $mange["id"][$i]; ?>" type="checkbox"
                                                                    data-check="<?php echo !empty($check_in[$id]) ? $check_in[$id] : 0; ?>"
                                                                    data-mange="<?php echo $mange["id"][$i]; ?>"
                                                                    id="checkbox<?php echo $id; ?>"
                                                                    value="<?php echo $id; ?>"
                                                                    onclick="submit_check_in('only', this);"
                                                                    <?php echo (!empty($check_in[$id]) && $check_in[$id] > 0) ? 'checked' : ''; ?> />
                                                                <label class="custom-control-label" for="checkbox<?php echo $id; ?>"></label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo !empty($start_pickup[$id]) ? date("H:i", strtotime($start_pickup[$id])) . ' - ' . date("H:i", strtotime($end_pickup[$id])) : '00:00'; ?></td>
                                                        <td class="cell-fit">
                                                            <?php if (!empty($car_name[$id])) {
                                                                for ($c = 0; $c < count($car_name[$id]); $c++) {
                                                                    echo !empty($car_name[$id][$c]) ? '<div class="badge badge-light-success">' . $car_name[$id][$c] . '</div>' : '<div class="badge badge-light-success">' . $driver_name[$id][$c] . '</div>';
                                                                }
                                                            } ?>
                                                        </td>
                                                        <td class="cell-fit"><?php echo $product_name[$id]; ?></td>
                                                        <td class="cell-fit">
                                                            <?php if (!empty($category_name[$id])) {
                                                                for ($c = 0; $c < count($category_name[$id]); $c++) {
                                                                    echo $c == 0 ? $category_name[$id][$c] : ', ' . $category_name[$id][$c];
                                                                }
                                                            } ?>
                                                        </td>
                                                        <td><?php echo $agent_name[$id]; ?></td>
                                                        <td><?php echo $cus_name[$id][0]; ?></td>
                                                        <td><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></td>
                                                        <td style="padding: 5px;">
                                                            <?php echo $text_hotel; ?>
                                                        </td>
                                                        <td><?php echo $room_no[$id]; ?></td>
                                                        <td class="text-center cell-fit"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?></td>
                                                        <td class="text-center cell-fit"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?></td>
                                                        <td class="text-center cell-fit"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?></td>
                                                        <td class="text-center cell-fit"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                                                        <td><b class="text-info">
                                                                <?php if (!empty($bec_id[$id])) {
                                                                    for ($e = 0; $e < count($bec_name[$id]); $e++) {
                                                                        echo $e == 0 ? $bec_name[$id][$e] : ' : ' . $bec_name[$id][$e];
                                                                    }
                                                                }
                                                                echo $note[$id]; ?></b>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>

                                    <div class="text-center mt-1 pb-2">
                                        <h4>
                                            <div class="badge badge-pill badge-light-warning">
                                                <b class="text-danger">TOTAL <?php echo $total_tourist; ?></b> |
                                                Adult : <?php echo $total_adult; ?>
                                                Child : <?php echo $total_child; ?>
                                                Infant : <?php echo $total_infant; ?>
                                                FOC : <?php echo $total_foc; ?>
                                            </div>
                                        </h4>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                        <!-- Body ends -->
                        <input type="hidden" id="name_img" name="name_img" value="<?php echo $name_img; ?>">
                    </div>
                </div>
                <!-- list section end -->
            </section>
            <!-- order job list ends -->

        </div>
    </div>
</div>