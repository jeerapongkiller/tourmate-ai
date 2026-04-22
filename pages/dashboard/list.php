<?php
require_once 'controllers/Dashboard.php';

$dashObj = new Dashboard();
$times = date("H:i:s");
$today = date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime(" +1 day"));
// $tomorrow = '2025-12-12';
$get_date = !empty($_GET['search_travel']) ? $_GET['search_travel'] : $tomorrow;
$search_island = !empty($_GET['search_island']) ? $_GET['search_island'] : 'all';
# --- get data --- #
$first_book = array();
$first_bpr = array();
$first_prod = array();
$first_pay = array();
$first_ext = array();
$first_tran = array();
$first_boat = array();
$first_dis = array();
$total_sum = 0;
$revenue = 0;
$count_confirm = 0;
$count_noshow = 0;
$count_cancel = 0;
$bookings = $dashObj->showlist($get_date, $search_island);
# --- Check products --- #
if (!empty($bookings)) {
    foreach ($bookings as $booking) {

        # --- get value booking --- #
        if (in_array($booking['product_id'], $first_prod) == false) {
            $first_prod[] = $booking['product_id'];
            $programe_id[] = !empty($booking['product_id']) ? $booking['product_id'] : 0;
            $programe_name[] = !empty($booking['product_name']) ? $booking['product_name'] : '';
            $programe_park[$booking['product_id']] = !empty($booking['park_id']) ? $booking['park_id'] : 0;
        }

        # --- get value booking --- #
        if (in_array($booking['id'], $first_book) == false) {
            $first_book[] = $booking['id'];

            $bo_id[$booking['product_id']][] = !empty($booking['id']) ? $booking['id'] : 0;

            $bp_id[$booking['id']] = !empty($booking['bp_id']) ? $booking['bp_id'] : 0;
            $bt_id[$booking['id']] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
            $book_full[$booking['id']] = !empty($booking['book_full']) ? $booking['book_full'] : '';
            $voucher_no[$booking['id']] = !empty(!empty($booking['voucher_no_agent'])) ? $booking['voucher_no_agent'] : '';
            // $discount[$booking['id']] = !empty(!empty($booking['discount'])) ? $booking['discount'] : 0;
            $travel_date[$booking['id']] = !empty(!empty($booking['travel_date'])) ? $booking['travel_date'] : '0000-00-00';
            $product_name[$booking['id']] = !empty(!empty($booking['product_name'])) ? $booking['product_name'] : '';
            $agent_name[$booking['id']] = !empty($booking['comp_name']) ? $booking['comp_name'] : '';
            $cus_name[$booking['id']] = !empty($booking['cus_name']) ? $booking['cus_name'] : '';
            $hotel_pickup[$booking['id']] = !empty($booking['hotel_pickup']) ? $booking['hotel_pickup'] : '';
            $hotel_dropoff[$booking['id']] = !empty($booking['hotel_dropoff']) ? $booking['hotel_dropoff'] : '';
            $zone_name[$booking['id']] = !empty($booking['pickup_name']) ? $booking['pickup_name'] : '';
            $zoned_name[$booking['id']] = !empty($booking['dropoff_name']) ? $booking['dropoff_name'] : '';
            $pickup_type[$booking['id']] = !empty($booking['pickup_type']) ? $booking['pickup_type'] : 0;
            $room_no[$booking['id']] = !empty($booking['room_no']) ? $booking['room_no'] : '';
            $start_pickup[$booking['id']] = !empty($booking['start_pickup']) ? !empty($booking['end_pickup']) ? date('H:i', strtotime($booking['start_pickup'])) . '-' . date('H:i', strtotime($booking['end_pickup'])) : date('H:i', strtotime($booking['start_pickup'])) : '';
            $booker_name[$booking['id']] = !empty($booking['booker_id']) ? $booking['booker_fname'] . ' ' . $booking['booker_lname'] : '';
            $status_by_name[$booking['id']] = !empty($booking['status_by']) ? $booking['stabyFname'] . ' ' . $booking['stabyLname'] : '';
            $status[$booking['id']] = !empty($booking['is_deleted']) ? '<span class="badge badge-pill badge-light-danger text-capitalized">Delete</span>' : '<span class="badge badge-pill ' . $booking['booksta_class'] . ' text-capitalized"> ' . $booking['booksta_name'] . ' </span>';
            $note[$booking['id']] = !empty($booking['note']) ? $booking['note'] : '';
            $created_at[$booking['id']] = !empty(!empty($booking['created_at'])) ? $booking['created_at'] : '0000-00-00';
            $check_in[$booking['id']] = !empty($booking['check_in']) ? $booking['check_in'] : 0;
            $park_id[$booking['id']] = !empty($booking['park_id']) ? $booking['park_id'] : 0;

            $bt_status[$booking['id']] = !empty($booking['bt_status']) ? $booking['bt_status'] : 0;
            $boat_status[$booking['id']] = !empty($booking['boat_status']) ? $booking['boat_status'] : 0;

            $mboat_id[$booking['id']] = $booking['mboat_id'];
            $bob_id[$booking['id']] = $booking['bob_id'];
            $boat_name[$booking['id']] = !empty($booking['boat_name']) ? $booking['boat_name'] : '';
            $boat_color[$booking['id']] = !empty($booking['boat_color']) ? $booking['boat_color'] : '';
            $boat_background[$booking['id']] = !empty($booking['boat_background']) ? $booking['boat_background'] : '';

            # --- chrage --- #
            $chrage[$booking['id']]['id'] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
            $chrage[$booking['id']]['adult'] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
            $chrage[$booking['id']]['child'] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
            $chrage[$booking['id']]['infant'] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
            $chrage[$booking['id']]['all'] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];

            $chrage_prod[$booking['product_id']]['adult'][] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
            $chrage_prod[$booking['product_id']]['child'][] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
            $chrage_prod[$booking['product_id']]['infant'][] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
            $chrage_prod[$booking['product_id']]['all'][] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
        }

        # --- get value booking --- #
        if (in_array($booking['discount_id'], $first_dis) == false) {
            $first_dis[] = $booking['discount_id'];

            $discount[$booking['id']]['id'][] = !empty($booking['discount_id']) ? $booking['discount_id'] : 0;
            $discount[$booking['id']]['detail'][] = !empty($booking['discount_detail']) ? $booking['discount_detail'] : '';
            $discount[$booking['id']]['rates'][] = !empty($booking['discount_rates']) ? $booking['discount_rates'] : 0;
        }

        # --- get value booking --- #
        if (in_array($booking['bpr_id'], $first_bpr) == false) {
            $first_bpr[] = $booking['bpr_id'];
            $adult[$booking['id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
            $child[$booking['id']][] = !empty($booking['child']) ? $booking['child'] : 0;
            $infant[$booking['id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
            $foc[$booking['id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;

            $prod_adult[$booking['product_id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
            $prod_child[$booking['product_id']][] = !empty($booking['child']) ? $booking['child'] : 0;
            $prod_infant[$booking['product_id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
            $prod_foc[$booking['product_id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;
            $all_toursit[$booking['product_id']][] = $booking['adult'] + $booking['child'] + $booking['infant'];

            $boat_total[$booking['product_id']][$booking['boat_id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];

            $arr_category[$booking['id']]['id'][] = !empty($booking['category_id']) ? $booking['category_id'] : 0;
            $arr_category[$booking['id']]['name'][] = !empty($booking['category_name']) ? $booking['category_name'] : '';

            $arr_rates[$booking['id']]['adult'][] = !empty($booking['adult']) ? $booking['adult'] : 0;
            $arr_rates[$booking['id']]['child'][] = !empty($booking['child']) ? $booking['child'] : 0;
            $arr_rates[$booking['id']]['infant'][] = !empty($booking['infant']) ? $booking['infant'] : 0;
            $arr_rates[$booking['id']]['rates_adult'][] = !empty($booking['rates_adult']) ? $booking['rates_adult'] : 0;
            $arr_rates[$booking['id']]['rates_child'][] = !empty($booking['rates_child']) ? $booking['rates_child'] : 0;
            $arr_rates[$booking['id']]['rates_infant'][] = !empty($booking['rates_infant']) ? $booking['rates_infant'] : 0;
        }

        # --- get value booking extra chang --- #
        if ((in_array($booking['bec_id'], $first_ext) == false) && !empty($booking['bec_id'])) {
            $first_ext[] = $booking['bec_id'];
            $bec_id[$booking['id']][] = $booking['bec_id'];
            $bec_name[$booking['id']][] = !empty($booking['bec_name']) ? $booking['bec_name'] : $booking['extra_name'];

            $extra[$booking['bec_id']]['id'] = !empty($booking['bec_id']) ? $booking['bec_id'] : 0;
            $extra[$booking['bec_id']]['adult'] = !empty($booking['bec_adult']) ? $booking['bec_adult'] : 0;
            $extra[$booking['bec_id']]['child'] = !empty($booking['bec_child']) ? $booking['bec_child'] : 0;
            $extra[$booking['bec_id']]['infant'] = !empty($booking['bec_infant']) ? $booking['bec_infant'] : 0;
            $extra[$booking['bec_id']]['privates'] = !empty($booking['bec_privates']) ? $booking['bec_privates'] : 0;
            $extra[$booking['bec_id']]['type'] = !empty($booking['bec_type']) ? $booking['bec_type'] : 0;
            $extra[$booking['bec_id']]['rate_adult'] = !empty($booking['bec_rate_adult']) ? $booking['bec_rate_adult'] : 0;
            $extra[$booking['bec_id']]['rate_child'] = !empty($booking['bec_rate_child']) ? $booking['bec_rate_child'] : 0;
            $extra[$booking['bec_id']]['rate_infant'] = !empty($booking['bec_rate_infant']) ? $booking['bec_rate_infant'] : 0;
            $extra[$booking['bec_id']]['rate_private'] = !empty($booking['bec_rate_private']) ? $booking['bec_rate_private'] : 0;

            if ($booking['extra_id'] == 1) {
                $longtail_id[$booking['id']] = $booking['bec_id'];
                $longtail_type[$booking['id']] = $booking['bec_type'];
                $longtail_join[$booking['product_id']][] = ($booking['bec_type'] == 1) ? $booking['bec_adult'] + $booking['bec_child'] + $booking['bec_infant'] : 0;
                $longtail_private[$booking['product_id']][] = ($booking['bec_type'] == 2) ? $booking['bec_privates'] : 0;
            }
        }

        # --- get value manage transfer --- #
        if ((in_array($booking['mtran_id'], $first_tran) == false) && !empty($booking['mtran_id'])) {
            $first_ext[] = $booking['mtran_id'];
            $mtran_id[$booking['id']] = $booking['mtran_id'];
            $car_name[$booking['id']] = !empty($booking['car_name']) ? $booking['car_name'] : '';
            $driver_name[$booking['id']] = !empty($booking['driver_name']) ? $booking['driver_name'] : '';
        }

        if (!empty($booking['boat_id'])) {
            $prod_boat_id[$booking['product_id']][] = !empty($booking['boat_id']) ? $booking['boat_id'] : '';
            $prod_boat_name[$booking['boat_id']] = !empty($booking['boat_name']) ? $booking['boat_name'] : '';
            $prod_boat_color[$booking['boat_id']] = !empty($booking['boat_color']) ? $booking['boat_color'] : '';
            $prod_boat_background[$booking['boat_id']] = !empty($booking['boat_background']) ? $booking['boat_background'] : '';
        }

        # --- get value booking payment --- #
        if ((in_array($booking['bopa_id'], $first_pay) == false) && !empty($booking['bopa_id'])) {
            $first_pay[] = $booking['bopa_id'];
            $bopa_id[$booking['id']] = !empty($booking['bopa_id']) ? $booking['bopa_id'] : 0;
            $cot[$booking['id']] = $booking['bopay_id'] == 4 ? $booking['total_paid'] : 0;
            $cot_status[$booking['id']] = $booking['bopay_id'] == 4 ? $booking['status_cot'] : 0;
        }
    }
}
?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">

            </div>
        </div>

        <div class="content-body">
            <!-- dashboards list start -->
            <section class="app-booking-list">
                <!-- dashboards filter start -->
                <div class="card">
                    <h5 class="card-header">Search Filter</h5>
                    <form id="dashboard-search-form" name="dashboard-search-form" method="get" enctype="multipart/form-data">
                        <input type="hidden" name="pages" value="<?php echo $_GET['pages']; ?>">
                        <div class="d-flex align-items-center mx-50 row pt-0 pb-2">
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="search_travel">Travel Date</label>
                                    <input type="text" class="form-control" id="search_travel" name="search_travel" value="<?php echo $get_date; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="search_island">Island</label>
                                    <select class="form-control select2" id="search_island" name="search_island">
                                        <option value="all">All</option>
                                        <?php
                                        $parks = $dashObj->showpark();
                                        foreach ($parks as $park) {
                                            $selected = ($park['id'] == $search_island) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $park['id']; ?>" <?php echo $selected; ?>><?php echo $park['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- dashboards filter end -->

                <!-- list section start -->
                <div id="dashboard-search-table">
                    <?php
                    if (!empty($programe_id)) {
                        for ($i = 0; $i < count($programe_id); $i++) {
                            if ($bo_id[$programe_id[$i]]) { ?>
                                <div class="card">
                                    <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                        <div class="col-4 text-left text-bold h4"></div>
                                        <div class="col-4 text-center text-bold h6">
                                            <span class="badge-light-purple">
                                                <?php echo $programe_name[$i]; ?>
                                            </span>
                                        </div>
                                        <div class="col-4 text-right mb-50">
                                        </div>
                                    </div>
                                    <div class="card-datatable pt-0">
                                        <table class="dashboard-list-table table table-responsive">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th style="font-size: 14px;" colspan="2">จำนวนทั้งหมด</th>
                                                    <th style="font-size: 14px;" class="cell-fit <?php echo (!empty($chrage_prod[$programe_id[$i]]['adult']) && array_sum($chrage_prod[$programe_id[$i]]['adult']) > 0) ? 'font-weight-bolder text-info' : ''; ?>">
                                                        <?php echo !empty($prod_adult[$programe_id[$i]]) ? !empty($chrage_prod[$programe_id[$i]]['adult']) ? array_sum($prod_adult[$programe_id[$i]]) - array_sum($chrage_prod[$programe_id[$i]]['adult']) : array_sum($prod_adult[$programe_id[$i]]) : 0; ?>
                                                    </th>
                                                    <th style="font-size: 14px;" class="cell-fit <?php echo (!empty($chrage_prod[$programe_id[$i]]['child']) && array_sum($chrage_prod[$programe_id[$i]]['child']) > 0) ? 'font-weight-bolder text-info' : ''; ?>">
                                                        <?php echo !empty($prod_child[$programe_id[$i]]) ? !empty($chrage_prod[$programe_id[$i]]['child']) ? array_sum($prod_child[$programe_id[$i]]) - array_sum($chrage_prod[$programe_id[$i]]['child']) : array_sum($prod_child[$programe_id[$i]]) : 0; ?>
                                                    </th>
                                                    <th style="font-size: 14px;" class="cell-fit <?php echo (!empty($chrage_prod[$programe_id[$i]]['infant']) && array_sum($chrage_prod[$programe_id[$i]]['infant']) > 0) ? 'font-weight-bolder text-info' : ''; ?>">
                                                        <?php echo !empty($prod_infant[$programe_id[$i]]) ? !empty($chrage_prod[$programe_id[$i]]['infant']) ? array_sum($prod_infant[$programe_id[$i]]) - array_sum($chrage_prod[$programe_id[$i]]['infant']) : array_sum($prod_infant[$programe_id[$i]]) : 0; ?>
                                                    </th>
                                                    <th style="font-size: 14px;" class="cell-fit">
                                                        <?php echo !empty($prod_foc[$programe_id[$i]]) ? array_sum($prod_foc[$programe_id[$i]]) : 0; ?>
                                                    </th>
                                                    <th style="font-size: 14px;" class="text-danger" colspan="1">Cancel</th>
                                                    <th style="font-size: 14px;" class="text-danger" colspan="1">
                                                        <?php echo (!empty($chrage_prod[$programe_id[$i]]['all'])) ? array_sum($chrage_prod[$programe_id[$i]]['all']) : 0; ?>
                                                    </th>
                                                    <th style="font-size: 14px;" class="text-success" colspan="1">Total</th>
                                                    <th style="font-size: 14px;" class="text-success" colspan="1">
                                                        <?php echo !empty($all_toursit[$programe_id[$i]]) ? (!empty($chrage_prod[$programe_id[$i]]['all'])) ? array_sum($all_toursit[$programe_id[$i]]) - array_sum($chrage_prod[$programe_id[$i]]['all']) : array_sum($all_toursit[$programe_id[$i]]) : 0; ?>
                                                    </th>
                                                    <th style="font-size: 16px;" colspan="5">
                                                        <?php
                                                        $first_boat = array();
                                                        if ($prod_boat_id[$programe_id[$i]]) {
                                                            for ($p = 0; $p < count($prod_boat_id[$programe_id[$i]]); $p++) {
                                                                if ((in_array($prod_boat_id[$programe_id[$i]][$p], $first_boat) == false)) {
                                                                    $first_boat[] = $prod_boat_id[$programe_id[$i]][$p];
                                                                    echo ' <span class="badge" style="color:' . $prod_boat_color[$prod_boat_id[$programe_id[$i]][$p]] . '; background-color: ' . $prod_boat_background[$prod_boat_id[$programe_id[$i]][$p]] . ';">' . $prod_boat_name[$prod_boat_id[$programe_id[$i]][$p]] . ' </span> ';
                                                                    echo '<span class="badge" style="color:' . $prod_boat_color[$prod_boat_id[$programe_id[$i]][$p]] . '; background-color: ' . $prod_boat_background[$prod_boat_id[$programe_id[$i]][$p]] . ';"> ' . array_sum($boat_total[$programe_id[$i]][$prod_boat_id[$programe_id[$i]][$p]]) . ' </span>';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </th>
                                                    <th style="font-size: 14px;" colspan="3">
                                                        <?php if ($programe_park[$programe_id[$i]] != 1) { ?>
                                                            <span class="badge" style="color:#28C76F; background-color: #E8FFEB;">
                                                                เรือหางยาว
                                                            </span>
                                                            <span class="badge" style="color:#28C76F; background-color: #E8FFEB;">
                                                                <?php echo (!empty($longtail_join[$programe_id[$i]])) ? array_sum($longtail_join[$programe_id[$i]]) : 0; ?>
                                                            </span>
                                                            <span class="badge" style="color:#662e93; background-color: #d7c4e0;">
                                                                เรือหางยาว
                                                            </span>
                                                            <span class="badge" style="color:#662e93; background-color: #d7c4e0;">
                                                                <?php echo (!empty($longtail_private[$programe_id[$i]])) ? array_sum($longtail_private[$programe_id[$i]]) : 0; ?>
                                                            </span>
                                                        <?php } ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>VOUCHER NO.</th>
                                                    <th>ชื่อลูกค้า</th>
                                                    <th class="cell-fit">AD</th>
                                                    <th class="cell-fit">CHD</th>
                                                    <th class="cell-fit">INF</th>
                                                    <th class="cell-fit">FOC</th>
                                                    <th>COT</th>
                                                    <th>Staff</th>
                                                    <th>Boat</th>
                                                    <th>Car</th>
                                                    <th>Time</th>
                                                    <th>Pickup</th>
                                                    <th>Room</th>
                                                    <th>Zone</th>
                                                    <th>Send back</th>
                                                    <th>Special Request</th>
                                                    <th>Service</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                for ($a = 0; $a < count($bo_id[$programe_id[$i]]); $a++) {
                                                    $id = $bo_id[$programe_id[$i]][$a];
                                                    switch ($bt_status[$id]) {
                                                        case '1':
                                                            $transfer = '<span class="bullet bullet-sm bullet-yellow" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '2':
                                                            $transfer = '<span class="bullet bullet-sm bullet-light-green" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '3':
                                                            $transfer = '<span class="bullet bullet-sm bullet-success" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '4':
                                                            $transfer = '<span class="bullet bullet-sm bullet-white" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '5':
                                                            $transfer = '<span class="bullet bullet-sm bullet-danger" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                    }
                                                    switch ($boat_status[$id]) {
                                                        case '1':
                                                            $bullet_boat = '<span class="bullet bullet-sm bullet-yellow" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '2':
                                                            $bullet_boat = '<span class="bullet bullet-sm bullet-success" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '3':
                                                            $bullet_boat = '<span class="bullet bullet-sm bullet-danger" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                    }
                                                    switch ($cot_status[$id]) {
                                                        case '1':
                                                            $bullet_cot = '<span class="bullet bullet-sm bullet-info" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '2':
                                                            $bullet_cot = '<span class="bullet bullet-sm bullet-yellow" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '3':
                                                            $bullet_cot = '<span class="bullet bullet-sm bullet-light-green" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                        case '4':
                                                            $bullet_cot = '<span class="bullet bullet-sm bullet-success" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></span> ';
                                                            break;
                                                    }
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <a href="./?pages=booking/edit&id=<?php echo $id; ?>" style="color: #6E6B7B;" target="_blank">
                                                                <?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <textarea name="note<?php echo $id; ?>" id="note<?php echo $id; ?>" hidden><?php echo $note[$id]; ?></textarea>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input dt-checkboxes" type="checkbox" id="checkbox<?php echo $id; ?>" name="manage_bo[]"
                                                                    value="<?php echo $id; ?>" onclick="update_status('confirm', <?php echo $id; ?>, 0)" <?php echo $check_in[$id] ? 'checked' : ''; ?>>
                                                                <label class="custom-control-label" for="checkbox<?php echo $id; ?>"></label>
                                                                <a href="javascripy:void(0);" data-toggle="modal" data-target="#modal-forchrage" style="color: #6E6B7B;"
                                                                    onclick='modal_forchrage(
                                                                    <?php echo $id; ?>,
                                                                    <?php echo json_encode($chrage[$id], true); ?>,
                                                                    <?php echo json_encode($discount[$id], true); ?>,
                                                                    <?php echo json_encode($arr_rates[$id], true); ?>);'>
                                                                    <?php echo $cus_name[$id]; ?>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="cell-fit <?php echo !empty($chrage[$id]['adult']) ? 'font-weight-bolder text-info' : ''; ?>"><?php echo !empty($adult[$id]) ? (array_sum($adult[$id]) - $chrage[$id]['adult']) : 0; ?></td>
                                                        <td class="cell-fit <?php echo !empty($chrage[$id]['child']) ? 'font-weight-bolder text-info' : ''; ?>"><?php echo !empty($child[$id]) ? (array_sum($child[$id]) - $chrage[$id]['child']) : 0; ?></td>
                                                        <td class="cell-fit <?php echo !empty($chrage[$id]['infant']) ? 'font-weight-bolder text-info' : ''; ?>"><?php echo !empty($infant[$id]) ? (array_sum($infant[$id]) - $chrage[$id]['infant']) : 0; ?></td>
                                                        <td class="cell-fit <?php echo !empty($chrage[$id]['foc']) ? 'font-weight-bolder text-info' : ''; ?>"><?php echo !empty($foc[$id]) ? (array_sum($foc[$id]) - $chrage[$id]['foc']) : 0; ?></td>
                                                        <td>
                                                            <?php if (!empty($cot[$id])) { ?>
                                                                <?php echo $bullet_cot; ?>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="javascript:update_status('cot', <?php echo $bopa_id[$id]; ?>, 1)">
                                                                        <span class="bullet bullet-sm bullet-info"></span> Start
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('cot', <?php echo $bopa_id[$id]; ?>, 2)">
                                                                        <span class="bullet bullet-sm bullet-yellow"></span> เงินสด
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('cot', <?php echo $bopa_id[$id]; ?>, 3)">
                                                                        <span class="bullet bullet-sm bullet-light-green"></span> โอน
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('cot', <?php echo $bopa_id[$id]; ?>, 4)">
                                                                        <span class="bullet bullet-sm bullet-success"></span> Credit
                                                                    </a>
                                                                </div>
                                                                <?php echo number_format($cot[$id]); ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <?php if (!empty($boat_name[$id])) { ?>
                                                                <?php echo $bullet_boat; ?>
                                                                <div class="dropdown-menu">
                                                                    <h6 class="dropdown-header"><?php echo $boat_name[$id]; ?></h6>

                                                                    <a class="dropdown-item" href="javascript:update_status('boat', <?php echo $bob_id[$id]; ?>, 1)">
                                                                        <span class="bullet bullet-sm bullet-yellow"></span> Start
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('boat', <?php echo $bob_id[$id]; ?>, 2)">
                                                                        <span class="bullet bullet-sm bullet-success"></span> Check In
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('boat', <?php echo $bob_id[$id]; ?>, 3)">
                                                                        <span class="bullet bullet-sm bullet-danger"></span> No Show
                                                                    </a>
                                                                </div>
                                                                <span class="badge" style="color:<?php echo $boat_color[$id]; ?>; background-color: <?php echo $boat_background[$id]; ?>;"><?php echo $boat_name[$id]; ?></span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($car_name[$id]) || !empty($driver_name[$id])) { ?>
                                                                <?php echo $transfer; ?>
                                                                <div class="dropdown-menu">
                                                                    <h6 class="dropdown-header">
                                                                        <?php echo !empty($car_name[$id]) ? $car_name[$id] : $driver_name[$id]; ?>
                                                                    </h6>

                                                                    <a class="dropdown-item" href="javascript:update_status('transfer', <?php echo $bt_id[$id]; ?>, 1)">
                                                                        <span class="bullet bullet-sm bullet-yellow"></span> Start
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('transfer', <?php echo $bt_id[$id]; ?>, 2)">
                                                                        <span class="bullet bullet-sm bullet-light-green"></span> Standby
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('transfer', <?php echo $bt_id[$id]; ?>, 3)">
                                                                        <span class="bullet bullet-sm bullet-success"></span> Following
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('transfer', <?php echo $bt_id[$id]; ?>, 4)">
                                                                        <span class="bullet bullet-sm bullet-white"></span> Success
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:update_status('transfer', <?php echo $bt_id[$id]; ?>, 5)">
                                                                        <span class="bullet bullet-sm bullet-danger"></span> No Show
                                                                    </a>
                                                                </div>

                                                                <?php echo !empty($car_name[$id]) ? $car_name[$id] : $driver_name[$id]; ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $start_pickup[$id] != '00:00' ? date('H:i', strtotime($start_pickup[$id])) . ' - ' . date('H:i', strtotime($end_pickup[$id])) : ''; ?></td>
                                                        <td><?php echo !empty($hotel_pickup[$id]) ? $hotel_pickup[$id] : ''; ?></td>
                                                        <td><?php echo $room_no[$id]; ?></td>
                                                        <td><?php echo $zone_name[$id]; ?></td>
                                                        <td><?php echo !empty($hotel_dropoff[$id]) ? $hotel_dropoff[$id] : ''; ?></td>
                                                        <td>
                                                            <b class="text-info">
                                                                <?php echo nl2br($note[$id]); ?>
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <?php if ($park_id[$id] != 1) { ?>
                                                                <a href="javascripy:void(0);" data-toggle="modal" data-target="#modal-long-tail" onclick='modal_long_tail(this, <?php echo $id; ?>);' data-extra='<?php echo (!empty($extra[$longtail_id[$id]])) ? json_encode($extra[$longtail_id[$id]], JSON_HEX_APOS, JSON_UNESCAPED_UNICODE) : ""; ?>'>
                                                                    <span class="badge"
                                                                        <?php echo (!empty($longtail_id[$id])) ?
                                                                            ($longtail_type[$id] == 1) ?
                                                                            'style="color:#662e93; background-color: #d7c4e0;"' :
                                                                            'style="color:#28C76F; background-color: #E8FFEB;"' :
                                                                            'style="color:#3B3B3B; background-color: #EDEDED;"'; ?>>
                                                                        เรือหางยาว
                                                                    </span>
                                                                </a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        <?php }
                        } ?>

                        <div class="row">
                            <div class="col-3">
                                <label for="">Status Transfer</label> <br>
                                <span class="bullet bullet-sm bullet-yellow"></span> Start <br>
                                <span class="bullet bullet-sm bullet-light-green"></span> Standby <br>
                                <span class="bullet bullet-sm bullet-success"></span> Following <br>
                                <span class="bullet bullet-sm bullet-white"></span> Success <br>
                                <span class="bullet bullet-sm bullet-danger"></span> No Show
                            </div>
                            <div class="col-3">
                                <label for="">Status Boat</label> <br>
                                <span class="bullet bullet-sm bullet-yellow"></span> Start <br>
                                <span class="bullet bullet-sm bullet-success"></span> Check In <br>
                                <span class="bullet bullet-sm bullet-danger"></span> No Show
                            </div>
                            <div class="col-3">
                                <label for="">Status Cash On Tour</label> <br>
                                <span class="bullet bullet-sm bullet-info"></span> Start <br>
                                <span class="bullet bullet-sm bullet-yellow"></span> เงินสด <br>
                                <span class="bullet bullet-sm bullet-light-green"></span> โอน <br>
                                <span class="bullet bullet-sm bullet-success"></span> Credit
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- list section end -->
            </section>
            <!-- dashboards list ends -->

            <!-- Start Form Modal -->
            <!------------------------------------------------------------------>
            <div class="modal-size-xl d-inline-block">
                <div class="modal fade text-left" id="modal-long-tail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="long-tail-form" name="long-tail-form" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="longtail_id" name="longtail_id" value="0">
                                <input type="hidden" id="longtail_bo" name="longtail_bo" value="0">
                                <div class="modal-header">
                                    <h4 class="modal-title">เพิ่มเรือหางยาว</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="boat_join" name="boat_type" class="custom-control-input" value="1" checked onclick="hide_div('long-tail');" />
                                                <label class="custom-control-label" for="boat_join">Join</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="boat_private" name="boat_type" class="custom-control-input" value="2" onclick="hide_div('long-tail');" />
                                                <label class="custom-control-label" for="boat_private">Private</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="div-boat-join">
                                        <div class="form-group col-md-4 col-12">
                                            <label class="form-label" for="adult">Adult</label>
                                            <input type="text" class="form-control numeral-mask" id="adult" name="adult" value="" placeholder="0" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label class="form-label" for="rates_adult">Rates Adult</label>
                                            <input type="text" class="form-control numeral-mask" id="rates_adult" name="rates_adult" value="" placeholder="0" />
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <b class="card-text col-title mb-md-50 mb-0">Total Adult</b><br>
                                            <b class="card-text mb-0 total-adult">$0.00</b>
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label class="form-label" for="child">Children</label>
                                            <input type="text" class="form-control numeral-mask" id="child" name="child" value="" placeholder="0" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label class="form-label" for="rates_child">Rates Children</label>
                                            <input type="text" class="form-control numeral-mask" id="rates_child" name="rates_child" value="" placeholder="0" />
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <b class="card-text col-title mb-md-50 mb-0">Total Children</b><br>
                                            <b class="card-text mb-0 total-child">$0.00</b>
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label class="form-label" for="infant">Infant</label>
                                            <input type="text" class="form-control numeral-mask" id="infant" name="infant" value="" placeholder="0" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label class="form-label" for="rates_infant">Rates Infant</label>
                                            <input type="text" class="form-control numeral-mask" id="rates_infant" name="rates_infant" value="" placeholder="0" />
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <b class="card-text col-title mb-md-50 mb-0">Total Infant</b><br>
                                            <b class="card-text mb-0 total-infant">$0.00</b>
                                        </div>
                                    </div>
                                    <div class="row" id="div-boat-private" hidden>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="form-label" for="unit">Private Unit</label>
                                            <input type="text" class="form-control numeral-mask" id="unit" name="unit" value="" placeholder="0" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label class="form-label" for="rates_private">Rates Private</label>
                                            <input type="text" class="form-control numeral-mask" id="rates_private" name="rates_private" value="" placeholder="0" />
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <b class="card-text col-title mb-md-50 mb-0">Total Private</b><br>
                                            <b class="card-text mb-0 total-private">$0.00</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between align-items-center">
                                    <span>
                                        <b class="card-text col-title mb-md-50 mb-0">Total Amount</b><br>
                                        <b class="card-text mb-0 total-amount">$0.00</b>
                                    </span>
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <span class="align-middle d-sm-inline-block d-none"><i data-feather='plus'></i> Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-size-xl d-inline-block">
                <div class="modal fade text-left" id="modal-forchrage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="for-chrage-form" name="for-chrage-form" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="chrage_id" name="chrage_id" value="0">
                                <input type="hidden" id="chrage_bo_id" name="bo_id" value="0">
                                <div class="modal-header">
                                    <h4 class="modal-title">ลูกค้าที่ไม่มา</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="dashboard-list-table table mb-2 table-bordered table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <td class="text-center" rowspan="2"><b>จำนวนทั้งหมด</b></td>
                                                <th class="text-center">Adult</th>
                                                <th class="text-center">Children</th>
                                                <th class="text-center">Infant</th>
                                            </tr>
                                            <tr id="tr-category-charge">
                                            </tr>
                                        </thead>
                                    </table>

                                    <div class="row d-flex align-items-start">
                                        <div class="form-group col-md-4 col-12">
                                            <label class="form-label" for="chrage-adult">Adult</label>
                                            <input type="text" class="form-control numeral-mask" id="chrage-adult" name="adult" value="" placeholder="0" />
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="form-label" for="chrage-child">Children</label>
                                            <input type="text" class="form-control numeral-mask" id="chrage-child" name="child" value="" placeholder="0" />
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="form-label" for="chrage-infant">Infant</label>
                                            <input type="text" class="form-control numeral-mask" id="chrage-infant" name="infant" value="" placeholder="0" />
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="form-label" for="note">Note</label>
                                            <textarea class="form-control" name="note" id="note"></textarea>
                                        </div>
                                    </div>
                                    <!-- <hr>
                                    <div class="discount-repeater">
                                        <div data-repeater-list="discount">
                                            <div id="div-discount-repeater"></div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <a href="javascript:void(0);" data-repeater-create>
                                                    <b><i data-feather="plus" class="mr-25"></i> Add Detail</b>
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="modal-footer d-flex justify-content-between align-items-center">
                                    <span>
                                    </span>
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <span class="align-middle d-sm-inline-block d-none"><i data-feather='plus'></i> Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-size-xl d-inline-block">
                <div class="modal fade text-left" id="modal-forchrage-close" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="for-chrage-form" name="for-chrage-form" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Chrage</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="for-charge-repeater">
                                        <div data-repeater-list="for-charge">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-start">
                                                    <div class="form-group col-4">
                                                        <div class="category-radio-wrapper"></div>
                                                    </div>
                                                    <div class="form-group col-4">
                                                        <div class="charge-type-wrapper"></div>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <div class="value-type-wrapper"></div>
                                                    </div>
                                                </div>

                                                <div class="row d-flex align-items-start">
                                                    <div class="form-group col-3">
                                                        <label class="form-label" for="adult-chrage">Adult</label>
                                                        <input type="text" class="form-control numeral-mask" id="adult-chrage" name="adult" value="" placeholder="0" />
                                                    </div>
                                                    <div class="form-group col-5 rates-adult-chrage">
                                                        <label class="form-label" for="rates_adult_chrage">Charge Adult</label>
                                                        <input type="text" class="form-control numeral-mask" id="rates_adult_chrage" name="rates_adult" value="" placeholder="0" />
                                                    </div>
                                                    <div class="form-group col-3 percent-adult">
                                                        <label class="form-label" for="percent-adult">Percent (%)</label>
                                                        <input type="text" class="form-control numeral-mask" id="percent-adult" name="percent_adult" value="" placeholder="%" />
                                                    </div>
                                                    <div class="col-md-3 mt-1 div-rates-adult">
                                                        <b class="card-text col-title mb-md-50 mb-0">Rates Adult</b><br>
                                                        <b class="card-text mb-0 rates-adult">$0.00</b>
                                                    </div>
                                                    <div class="col-md-3 mt-1 div-total-adult-chrage">
                                                        <b class="card-text col-title mb-md-50 mb-0">Charge Adult</b><br>
                                                        <b class="card-text mb-0 total-adult-chrage">$0.00</b>
                                                    </div>
                                                </div>

                                                <div class="row d-flex align-items-start">
                                                    <div class="form-group col-3">
                                                        <label class="form-label" for="child-chrage">Children</label>
                                                        <input type="text" class="form-control numeral-mask" id="child-chrage" name="child" value="" placeholder="0" />
                                                    </div>
                                                    <div class="form-group col-5 rates-child-chrage">
                                                        <label class="form-label" for="rates_child_chrage">Charge Adult</label>
                                                        <input type="text" class="form-control numeral-mask" id="rates_child_chrage" name="rates_child" value="" placeholder="0" />
                                                    </div>
                                                    <div class="form-group col-3 percent-child">
                                                        <label class="form-label" for="percent-child">Percent (%)</label>
                                                        <input type="text" class="form-control numeral-mask" id="percent-child" name="percent_child" value="" placeholder="%" />
                                                    </div>
                                                    <div class="col-md-3 mt-1 div-rates-child">
                                                        <b class="card-text col-title mb-md-50 mb-0">Total Child</b><br>
                                                        <b class="card-text mb-0 child-rates">$0</b>
                                                    </div>
                                                    <div class="col-md-3 mt-1 div-total-child-chrage">
                                                        <b class="card-text col-title mb-md-50 mb-0">Charge Child</b><br>
                                                        <b class="card-text mb-0 total-child-chrage">$0.00</b>
                                                    </div>
                                                </div>

                                                <div class="row d-flex align-items-start">
                                                    <div class="form-group col-3">
                                                        <label class="form-label" for="infant-chrage">Infant</label>
                                                        <input type="text" class="form-control numeral-mask" id="infant-chrage" name="infant" value="" placeholder="0" />
                                                    </div>
                                                    <div class="form-group col-5 rates-infant-chrage">
                                                        <label class="form-label" for="rates_infant_chrage">Charge Infant</label>
                                                        <input type="text" class="form-control numeral-mask" id="rates_infant_chrage" name="rates_infant" value="" placeholder="0" />
                                                    </div>
                                                    <div class="form-group col-3 percent-infant">
                                                        <label class="form-label" for="percent-infant">Percent (%)</label>
                                                        <input type="text" class="form-control numeral-mask" id="percent-infant" name="percent_infant" value="" placeholder="%" />
                                                    </div>
                                                    <div class="col-md-3 mt-1 div-rates-infant">
                                                        <b class="card-text col-title mb-md-50 mb-0">Total Infant</b><br>
                                                        <b class="card-text mb-0 infant-rates">$0</b>
                                                    </div>
                                                    <div class="col-md-3 mt-1 div-total-infant-chrage">
                                                        <b class="card-text col-title mb-md-50 mb-0">Charge Infant</b><br>
                                                        <b class="card-text mb-0 total-infant-chrage">$0.00</b>
                                                    </div>

                                                    <div class="col-1 mt-2">
                                                        <div class="form-group">
                                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <a href="javascript:void(0);" data-repeater-create>
                                                    <b><i data-feather="plus" class="mr-25"></i> Add wiht Chang</b>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between align-items-center">
                                    <span>
                                        <b class="card-text col-title mb-md-50 mb-0">Total Amount</b><br>
                                        <b class="card-text mb-0 total-amount">$0.00</b>
                                    </span>
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <span class="align-middle d-sm-inline-block d-none"><i data-feather='plus'></i> Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------>
            <!-- End Form Modal -->

        </div>
    </div>
</div>