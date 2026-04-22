<?php
require_once 'controllers/Manage.php';

$manageObj = new Manage();
$today = date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime(" +1 day"));

$get_date = !empty($_GET['search_travel_date']) ? $_GET['search_travel_date'] : $tomorrow; // $tomorrow->format("Y-m-d")
$search_car = !empty($_GET['search_car']) ? $_GET['search_car'] : 'all';
$search_driver = !empty($_GET['search_driver']) ? $_GET['search_driver'] : 'all';
$search_product = !empty($_GET['search_product']) ? $_GET['search_product'] : 'all';
$search_return = !empty($_GET['search_return']) ? $_GET['search_return'] : 1;
$search_status = $_GET['search_status'] != "" ? $_GET['search_status'] : 'all';
$search_agent = $_GET['search_agent'] != "" ? $_GET['search_agent'] : 'all';
$search_product = $_GET['search_product'] != "" ? $_GET['search_product'] : 'all';
$search_voucher_no = $_GET['voucher_no'] != "" ? $_GET['voucher_no'] : '';
$refcode = $_GET['refcode'] != "" ? $_GET['refcode'] : '';
$name = $_GET['name'] != "" ? $_GET['name'] : '';
$hotel = $_GET['hotel'] != "" ? $_GET['hotel'] : '';

$href = "./?pages=manage-driver/print";
$href .= "&date_travel=" . $get_date;
$href .= "&search_car=" . $search_car;
$href .= "&search_driver=" . $search_driver;
$href .= "&search_status=" . $search_status;
$href .= "&search_product=" . $search_product;
$href .= "&search_voucher_no=" . $search_voucher_no;
$href .= "&refcode=" . $refcode;
$href .= "&name=" . $name;
$href .= "&hotel=" . $hotel;
$href .= "&action=print";
# --- show list boats booking --- #
$first_booking = array();
$first_prod = array();
$first_cus = array();
$first_program = array();
$first_ext = array();
$frist_bt[1] = [];
$frist_bt[2] = [];
$first_manage = [];
$first_bo = [];
$first_trans = [];
$frist_bomange = array();
$first_bpr = array();
$frist_dropoff = array();
$frist_over = array();
$bookings = $manageObj->showlisttransfers('all', $get_date, $search_car, $search_driver, $search_status, $search_agent, $search_product, $search_voucher_no, $refcode, $name, $hotel);
# --- Check products --- #
if (!empty($bookings)) {
    foreach ($bookings as $booking) {
        # --- get value Programe --- #
        if (in_array($booking['product_id'], $first_prod) == false && ($booking['travel_date'] == $get_date)) {
            $first_prod[] = $booking['product_id'];
            $programe_id[] = !empty($booking['product_id']) ? $booking['product_id'] : 0;
            $programe_name[] = !empty($booking['product_name']) ? $booking['product_name'] : '';
            $programe_type[] = !empty($booking['pg_type_name']) ? $booking['pg_type_name'] : '';
        }

        # --- get value booking --- #
        if (in_array($booking['id'], $first_booking) == false) {
            $first_booking[] = $booking['id'];

            if ($booking['travel_date'] == $get_date && $booking['mange_id'] == 0) {
                $bo_id[$booking['product_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
            }

            $bo_type[$booking['id']] = !empty($booking['booktye_name']) ? $booking['booktye_name'] : '';
            $status_by_name[$booking['id']] = !empty($booking['status_by']) ? $booking['stabyFname'] . ' ' . $booking['stabyLname'] : '';
            $status[$booking['id']] = '<span class="badge badge-pill ' . $booking['booksta_class'] . ' text-capitalized"> ' . $booking['booksta_name'] . ' </span>';
            $cus_name[$booking['id']][] = !empty($booking['cus_name']) ? $booking['cus_name'] : '';
            $sender[$booking['id']] = !empty($booking['sender']) ? $booking['sender'] : '';
            $note[$booking['id']] = !empty($booking['note']) ? $booking['note'] : '';
            $bp_id[$booking['id']] = !empty($booking['bp_id']) ? $booking['bp_id'] : 0;
            $cot[$booking['id']] = !empty($booking['total_paid']) ? $booking['total_paid'] : 0;
            $book_full[$booking['id']] = !empty($booking['book_full']) ? $booking['book_full'] : '';
            $voucher_no[$booking['id']] = !empty(!empty($booking['voucher_no_agent'])) ? $booking['voucher_no_agent'] : '';
            $travel_date[$booking['id']] = !empty(!empty($booking['travel_date'])) ? $booking['travel_date'] : '0000-00-00';
            $product_id[$booking['id']] = !empty(!empty($booking['product_id'])) ? $booking['product_id'] : '';
            $product_name[$booking['id']] = !empty(!empty($booking['product_name'])) ? $booking['product_name'] : '';
            $pier_name[$booking['id']] = !empty(!empty($booking['pier_name'])) ? $booking['pier_name'] : '';
            $agent_name[$booking['id']] = !empty($booking['comp_name']) ? $booking['comp_name'] : '';
            $boat_name[$booking['id']] = !empty($booking['boat_name']) ? $booking['boat_name'] : $booking['outside_boat'];

            if (!empty(!empty($booking['overnight'])) && $booking['overnight'] == $get_date && empty($booking['over_id'])) {
                $overnight['bo_id'][] = $booking['id'];
            }

            if (($booking['pickup_type'] == 3 || ($booking['pickup_id'] != $booking['hdropoff_id']) || ($booking['outside'] != $booking['outside_dropoff'])) && empty($booking['dropoff_id'])) {
                $dropoff['bo_id'][] = $booking['id'];
            }

            # --- chrage --- #
            $chrage_id[$booking['id']] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
            $chrage_adult[$booking['id']] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
            $chrage_child[$booking['id']] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
            $chrage_infant[$booking['id']] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
        }

        # --- get value booking product rate --- #
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

        # --- get value booking transfer --- #
        if ((in_array($booking['bt_id'], $frist_bt[1]) == false)) {
            $frist_bt[1][] = $booking['bt_id'];
            $bt_id[$booking['id']] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
            $mange_id[$booking['id']][1] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
            $arrange[$booking['id']][1] = !empty($booking['arrange']) ? $booking['arrange'] : 0;
            $bt_adult[$booking['id']][1] = !empty($booking['bt_adult']) ? $booking['bt_adult'] : 0;
            $bt_child[$booking['id']][1] = !empty($booking['bt_child']) ? $booking['bt_child'] : 0;
            $bt_infant[$booking['id']][1] = !empty($booking['bt_infant']) ? $booking['bt_infant'] : 0;
            $bt_foc[$booking['id']][1] = !empty($booking['bt_foc']) ? $booking['bt_foc'] : 0;
            $hotel_name[$booking['id']][1] = !empty($booking['pickup_name']) ? $booking['pickup_name'] : $booking['outside'];
            $hotel_name[$booking['id']][2] = !empty($booking['dropoff_name']) ? $booking['dropoff_name'] : $booking['outside_dropoff'];
            $zone_name[$booking['id']][1] = !empty($booking['zonep_name']) ? $booking['zonep_name'] : '';
            $zone_name[$booking['id']][2] = !empty($booking['zoned_name']) ? $booking['zoned_name'] : '';
            $room_no[$booking['id']] = !empty($booking['room_no']) ? $booking['room_no'] : '';
            $start_pickup[$booking['id']] = !empty($booking['start_pickup']) && $booking['start_pickup'] != '00:00' ? $booking['start_pickup'] : '00:00';
            $end_pickup[$booking['id']] = !empty($booking['end_pickup']) && $booking['end_pickup'] != '00:00' ? $booking['end_pickup'] : '00:00';
            $outside[$booking['id']][1] = !empty($booking['outside']) ? $booking['outside'] : '';
            $outside[$booking['id']][2] = !empty($booking['outside_dropoff']) ? $booking['outside_dropoff'] : '';

            $over_id[$booking['id']] = !empty($booking['over_id']) ? $booking['over_id'] : 0;
            $over_manage[$booking['id']] = !empty($booking['over_manage']) ? $booking['over_manage'] : 0;
            $dropoff_id[$booking['id']] = !empty($booking['dropoff_id']) ? $booking['dropoff_id'] : 0;
            $dropoff_manage[$booking['id']] = !empty($booking['dropoff_manage']) ? $booking['dropoff_manage'] : 0;

            $bt_car[$booking['bt_id']] = !empty($booking['car_name']) ? $booking['car_name'] : '';
            $bt_driver[$booking['bt_id']] = !empty($booking['driver_name']) ? $booking['driver_name'] : '';

            if (($booking['pickup_id'] != $booking['hdropoff_id']) || ($booking['outside'] != $booking['outside_dropoff'])) {
                $check_dropoff[$booking['id']] = !empty($booking['id']) ? $booking['id'] : 0;
            }

            if ($booking['mange_id'] > 0) {
                $bo_manage[$booking['product_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
            }
        }

        # --- get value manage transfer --- #
        if ((in_array($booking['bomange_id'], $frist_bomange) == false) && $booking['mange_id'] > 0) {
            $frist_bomange[] = $booking['bomange_id'];
            // $mange = $booking['mange_pickup'] > 0 ? 1 : 2;
            $reteun = 1;
            $bomange_id[$booking['mange_id']][] = !empty($booking['bomange_id']) ? $booking['bomange_id'] : 0;
            // $bomange_bo[$booking['mange_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
            $check_book[$reteun][] = !empty($booking['id']) ? $booking['id'] : 0;
            $check_bt[$reteun][] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
            $check_mange[$reteun][$booking['product_id']][] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
            $bomange_bo[$booking['mange_id']]['go'][] = !empty($booking['id']) ? $booking['id'] : 0;
            if (empty($booking['dropoff_manage'])) {
                $bomange_bo[$booking['mange_id']]['back'][] = !empty($booking['id']) ? $booking['id'] : 0;
            }
        }

        # --- get value manage transfer dropoff --- #
        if ((in_array($booking['dropoff_id'], $frist_dropoff) == false) && $booking['dropoff_manage'] > 0) {
            $frist_dropoff[] = $booking['dropoff_id'];
            // $bomange_bo[$booking['dropoff_manage']][] = !empty($booking['id']) ? $booking['id'] : 0;
            // $bomange_bo[$booking['dropoff_manage']]['go'][] = !empty($booking['id']) ? $booking['id'] : 0;
            $bomange_bo[$booking['dropoff_manage']]['back'][] = !empty($booking['id']) ? $booking['id'] : 0;
        }

        # --- get value manage transfer overnight --- #
        if ((in_array($booking['over_id'], $frist_over) == false) && $booking['over_manage'] > 0) {
            $frist_over[] = $booking['over_id'];
            // $bomange_bo[$booking['over_manage']][] = !empty($booking['id']) ? $booking['id'] : 0;
            // $bomange_bo[$booking['over_manage']]['go'][] = !empty($booking['id']) ? $booking['id'] : 0;
            $bomange_bo[$booking['over_manage']]['back'][] = !empty($booking['id']) ? $booking['id'] : 0;
        }
    }
}
# --- get data --- #
$manages = $manageObj->show_manage_transfer($get_date, $search_car, $search_driver, $search_product);
foreach ($manages as $manage) {
    if (in_array($manage['id'], $first_manage) == false) {
        $first_manage[] = $manage['id'];
        $mange['id'][] = !empty($manage['id']) ? $manage['id'] : 0;
        $mange['seat'][] = !empty($manage['seat']) ? $manage['seat'] : 0;
        $mange['pickup'][] = !empty($manage['pickup']) ? $manage['pickup'] : 1;
        $mange['car'][] = !empty($manage['car_id']) ? $manage['car_name'] : '';
        $mange['driver'][] = !empty($manage['driver']) ? $manage['driver'] : '';
        $mange['license'][] = !empty($manage['license']) ? $manage['license'] : '';
        $mange['product'][] = !empty($manage['product_id']) ? $manage['product_id'] : '';
        $mange['product_name'][] = !empty($manage['product_name']) ? $manage['product_name'] : '';
        $mange['telephone'][] = !empty($manage['telephone']) ? $manage['telephone'] : '';
        $mange['driver_id'][] = !empty($manage['driver_id']) ? $manage['driver_id'] : 0;
        $mange['driver_name'][] = !empty($manage['driver_name']) ? $manage['driver_name'] : $manage['outside_driver'];
        $mange['guide_id'][] = !empty($manage['guide_id']) ? $manage['guide_id'] : 0;
        $mange['guide_name'][] = !empty($manage['guide_id']) ? $manage['guide_name'] : '';
        $mange['car_id'][] = !empty($manage['car_id']) ? $manage['car_id'] : 0;
        $mange['car_name'][] = !empty($manage['car_id']) ? $manage['car_name'] : $manage['outside_car'];
        $mange['outside_car'][] = !empty($manage['outside_car']) ? $manage['outside_car'] : '';
        $mange['note'][] = !empty($manage['note']) ? $manage['note'] : '';
    }
}
?>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">ใบงานรถ</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="today-tab" data-toggle="tab" href="#today" aria-controls="today" role="tab" aria-selected="true">Today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tomorrow-tab" data-toggle="tab" href="#tomorrow" aria-controls="tomorrow" role="tab" aria-selected="false">Tomorrow</a>
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
            <!-- Sortable lists section start -->
            <section id="sortable-lists">
                <!-- filter start -->
                <div class="card">
                    <h5 class="card-header">Search Filter</h5>
                    <form id="manages-search-form" name="manages-search-form" method="get" enctype="multipart/form-data">
                        <input type="hidden" name="pages" value="<?php echo $_GET['pages']; ?>">
                        <div class="d-flex align-items-center mx-50 row pt-0 pb-0">
                            <div class="col-md-3 col-12">
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
                                    <label for="search_car">ชื่อรถ</label>
                                    <select class="form-control select2" id="search_car" name="search_car">
                                        <option value="all">All</option>
                                        <?php
                                        $cars = $manageObj->showcars();
                                        foreach ($cars as $car) {
                                            $selected = ($car['id'] == $search_car) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $car['id']; ?>" data-name="<?php echo $car['name']; ?>" <?php echo $selected; ?>><?php echo $car['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="search_driver">ชื่อคนขับ</label>
                                    <select class="form-control select2" id="search_driver" name="search_driver">
                                        <option value="all">All</option>
                                        <?php
                                        $drivers = $manageObj->showdrivers();
                                        foreach ($drivers as $driver) {
                                            $selected = ($driver['id'] == $search_driver) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $driver['id']; ?>" <?php echo $selected; ?>><?php echo $driver['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="search_travel_date">วันที่เที่ยว (Travel Date)</label></br>
                                    <input type="text" class="form-control date-picker" id="search_travel_date" name="search_travel_date" value="<?php echo $get_date; ?>" />
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
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="hotel">Hotel</label>
                                    <input type="text" class="form-control" id="hotel" name="hotel" value="<?php echo $hotel; ?>" />
                                </div>
                            </div>
                            <input type="hidden" id="pickup_retrun" name="search_retrun" value="1">
                            <div class="col-md-4 col-12 mb-1">
                                <button type="submit" class="btn btn-primary"><i data-feather='search'></i> Search</button>
                                <!-- <a href="<?php echo $href; ?>" target="_blank" class="btn btn-info"><i data-feather='printer'></i> Print</a> -->
                                <button type="button" class="btn btn-info" id="btnCopy"><i data-feather='copy'></i> Copy</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- filter end -->

                <div id="div-manage-list" style="background-color: #FFF;">

                    <!-- Header starts -->
                    <div class="card-body pb-0 pt-1">
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing">
                            <span class="brand-logo"><img src="app-assets/images/logo/logo-500.png" height="50"></span>
                            <span class="text-black">
                                โทร : +66 76 390 250 </br>
                                Email : info@loveandaman.com
                            </span>
                        </div>
                        <div class="text-center card-text">
                            <h4 class="font-weight-bolder text-black">ใบจัดรถ (Pickup)</h4>
                            <div class="badge badge-pill badge-light-danger">
                                <h5 class="m-0 pl-1 pr-1 text-danger"><?php echo date('j F Y', strtotime($get_date)); ?></h5>
                            </div>
                        </div>
                    </div>
                    </br>
                    <!-- Header ends -->
                    <!-- Body starts -->
                    <?php
                    if (!empty($mange['id'])) {
                        for ($i = 0; $i < count($mange['id']); $i++) {
                            if (!empty($bomange_bo[$mange['id'][$i]]['go'])) {
                    ?>
                                <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                    <div class="col-4 text-left text-bold h4"></div>
                                    <div class="col-4 text-center">
                                        <span class="h4 badge-light-purple"><?php echo !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i]; ?></span>
                                        <span class="h4 badge-light-orange"><?php echo $mange['product_name'][$i]; ?></span>
                                        <span class="h4 badge-light-sky"> ขาไป</span>
                                    </div>
                                    <div class="col-4 text-right mb-50"></div>
                                </div>

                                <table class="table table-striped text-uppercase table-vouchure-t2 text-black">
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="3">คนขับ : <?php echo $mange['driver_name'][$i]; ?></th>
                                            <th colspan="7">ป้ายทะเบียน : <?php echo $mange['license'][$i]; ?></th>
                                            <th colspan="4">โทรศัพท์ : <?php echo $mange['telephone'][$i]; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <th>Time</th>
                                            <th>Hotel</th>
                                            <th>Room</th>
                                            <th>Client</th>
                                            <th class="text-center cell-fit">A</th>
                                            <th class="text-center cell-fit">C</th>
                                            <th class="text-center cell-fit">Inf</th>
                                            <th class="text-center cell-fit">FOC</th>
                                            <th>AGENT</th>
                                            <th>SENDER</th>
                                            <th>V/C</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <?php if ($bomange_bo[$mange['id'][$i]]['go']) { ?>
                                        <tbody>
                                            <?php
                                            $total_tourist = 0;
                                            $total_adult = 0;
                                            $total_child = 0;
                                            $total_infant = 0;
                                            $total_foc = 0;
                                            $dropoff_arr = array();
                                            for ($a = 0; $a < count($bomange_bo[$mange['id'][$i]]['go']); $a++) {
                                                $id = $bomange_bo[$mange['id'][$i]]['go'][$a];

                                                $total_adult += !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0;
                                                $total_child += !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0;
                                                $total_infant += !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0;
                                                $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                                $total_tourist += !empty($tourist_array[$id]) ? array_sum($tourist_array[$id]) : 0;

                                                $text_hotel = (!empty($hotel_name[$id][1])) ? $hotel_name[$id][1] : $outside[$id][1];
                                                $text_hotel .= (!empty($zone_name[$id][1])) ? ' (' . $zone_name[$id][1] . ')' : '';

                                                # --- over night or dropoff booking --- #
                                                $car_driver = !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i];
                                                $color_tr = '';
                                                $remake_dropoff = '';
                                                if ($over_id[$id] > 0 && $over_manage[$id] == $mange['id'][$i]) {
                                                    $color_tr = 'table-primary';
                                                }
                                                // elseif (($dropoff_id[$id] > 0 && $dropoff_manage[$id] == $mange['id'][$i])) {
                                                //     if (in_array($bt_id[$id], $dropoff_arr) == false) {
                                                //         $dropoff_arr[] = $bt_id[$id];
                                                //         $color_tr = 'table-wheat';
                                                //     }
                                                // }
                                                $remake_dropoff = $check_dropoff[$id] > 0 ? 'ไม่ต้องส่งกลับ' : '';
                                            ?>
                                                <tr class="<?php echo $color_tr; ?>">
                                                    <td class="cell-fit">
                                                        <span class="fw-bold">
                                                            <?php if (!empty($category_name[$id])) {
                                                                for ($c = 0; $c < count($category_name[$id]); $c++) {
                                                                    echo $c == 0 ? $category_name[$id][$c] : ', ' . $category_name[$id][$c];
                                                                }
                                                            } // echo ', id : ' . $id; 
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td class="cell-fit"><?php echo !empty($start_pickup[$id]) ? date("H:i", strtotime($start_pickup[$id])) . ' - ' . date("H:i", strtotime($end_pickup[$id])) : '00:00'; ?></td>
                                                    <td><?php echo $text_hotel; ?></td>
                                                    <td class="cell-fit"><?php echo $room_no[$id]; ?></td>
                                                    <td><?php echo $cus_name[$id][0]; ?></td>
                                                    <td class="text-center"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                                                    <td><?php echo $agent_name[$id]; ?></td>
                                                    <td><?php echo $sender[$id]; ?></td>
                                                    <td><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></td>
                                                    <td>
                                                        <b><?php echo $remake_dropoff; ?></b>
                                                        <b class="text-info">
                                                            <?php if (!empty($bec_id[$id])) {
                                                                for ($e = 0; $e < count($bec_name[$id]); $e++) {
                                                                    echo $e == 0 ? $bec_name[$id][$e] : ' : ' . $bec_name[$id][$e];
                                                                }
                                                            }
                                                            echo $note[$id]; ?>
                                                        </b>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } ?>
                                </table>

                                <div class="text-center mt-2 pb-50">
                                    <h4>
                                        <div class="badge badge-pill badge-light-warning">
                                            <b class="text-danger">TOTAL <?php echo $total_tourist; ?></b> <span class="text-black"><?php echo $total_adult; ?> <?php echo $total_child; ?> <?php echo $total_infant; ?> <?php echo $total_foc; ?></span>
                                        </div>
                                    </h4>
                                </div>

                            <?php } ?>

                            <?php if (!empty($bomange_bo[$mange['id'][$i]]['back'])) { ?>

                                <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                    <div class="col-4 text-left text-bold h4"></div>
                                    <div class="col-4 text-center">
                                        <span class="h4 badge-light-purple"><?php echo !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i]; ?></span>
                                        <span class="h4 badge-light-orange"><?php echo $mange['product_name'][$i]; ?></span>
                                        <span class="h4 badge-light-green-2"> ขากลับ</span>
                                    </div>
                                    <div class="col-4 text-right mb-50"></div>
                                </div>

                                <table class="table table-striped text-uppercase table-vouchure-t2 text-black">
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="3">คนขับ : <?php echo $mange['driver_name'][$i]; ?></th>
                                            <th colspan="7">ป้ายทะเบียน : <?php echo $mange['license'][$i]; ?></th>
                                            <th colspan="4">โทรศัพท์ : <?php echo $mange['telephone'][$i]; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <th>Time</th>
                                            <th>Hotel</th>
                                            <th>Room</th>
                                            <th>Client</th>
                                            <th class="text-center cell-fit">A</th>
                                            <th class="text-center cell-fit">C</th>
                                            <th class="text-center cell-fit">Inf</th>
                                            <th class="text-center cell-fit">FOC</th>
                                            <th>AGENT</th>
                                            <th>SENDER</th>
                                            <th>V/C</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <?php if ($bomange_bo[$mange['id'][$i]]['back']) { ?>
                                        <tbody>
                                            <?php
                                            $total_tourist = 0;
                                            $total_adult = 0;
                                            $total_child = 0;
                                            $total_infant = 0;
                                            $total_foc = 0;
                                            $dropoff_arr = array();
                                            for ($a = 0; $a < count($bomange_bo[$mange['id'][$i]]['back']); $a++) {
                                                $id = $bomange_bo[$mange['id'][$i]]['back'][$a];

                                                $total_adult += !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0;
                                                $total_child += !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0;
                                                $total_infant += !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0;
                                                $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                                $total_tourist += !empty($tourist_array[$id]) ? array_sum($tourist_array[$id]) : 0;

                                                $text_hotel = (!empty($hotel_name[$id][2])) ? $hotel_name[$id][2] : $outside[$id][2];
                                                $text_hotel .= (!empty($zone_name[$id][2])) ? ' (' . $zone_name[$id][2] . ')' : '';

                                                # --- over night or dropoff booking --- #
                                                $car_driver = !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i];
                                                $color_tr = '';
                                                $remake_dropoff = '';
                                                if ($over_id[$id] > 0 && $over_manage[$id] == $mange['id'][$i]) {
                                                    $color_tr = 'table-primary';
                                                    $remake_dropoff = 'ฝากส่งกลับ';
                                                    $car = $manageObj->get_values(
                                                        'cars.name as car_name, drivers.name as driver_name',
                                                        'booking_manage_transfer 
                                                        LEFT JOIN manage_transfer ON booking_manage_transfer.manage_id = manage_transfer.id 
                                                        LEFT JOIN cars ON cars.id = manage_transfer.car_id
                                                        LEFT JOIN drivers ON drivers.id = manage_transfer.driver_id',
                                                        'booking_manage_transfer.booking_transfer_id = ' . $bt_id[$id],
                                                        0
                                                    );
                                                    $remake_dropoff = !empty($car['car_name']) ? $remake_dropoff . ' /' . $car['car_name'] : $remake_dropoff;
                                                    $remake_dropoff = !empty($car['driver_name']) ? $remake_dropoff . '-' . $car['driver_name'] : $remake_dropoff;
                                                } elseif (($dropoff_id[$id] > 0 && $dropoff_manage[$id] == $mange['id'][$i])) {
                                                    if (in_array($bt_id[$id], $dropoff_arr) == false) {
                                                        $dropoff_arr[] = $bt_id[$id];
                                                        $color_tr = 'table-wheat';
                                                        $remake_dropoff = 'ฝากส่งกลับ';
                                                        $remake_dropoff = !empty($bt_car[$bt_id[$id]]) ? $remake_dropoff . ' /' . $bt_car[$bt_id[$id]] : $remake_dropoff;
                                                        $remake_dropoff = !empty($bt_driver[$bt_id[$id]]) ? $remake_dropoff . '-' . $bt_driver[$bt_id[$id]] : $remake_dropoff;
                                                    }
                                                }

                                            ?>
                                                <tr class="<?php echo $color_tr; ?>">
                                                    <td class="cell-fit">
                                                        <span class="fw-bold">
                                                            <?php if (!empty($category_name[$id])) {
                                                                for ($c = 0; $c < count($category_name[$id]); $c++) {
                                                                    echo $c == 0 ? $category_name[$id][$c] : ', ' . $category_name[$id][$c];
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td class="cell-fit"><?php echo !empty($start_pickup[$id]) ? date("H:i", strtotime($start_pickup[$id])) . ' - ' . date("H:i", strtotime($end_pickup[$id])) : '00:00'; ?></td>
                                                    <td><?php echo $text_hotel; ?></td>
                                                    <td class="cell-fit"><?php echo $room_no[$id]; ?></td>
                                                    <td><?php echo $cus_name[$id][0]; ?></td>
                                                    <td class="text-center"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                                                    <td><?php echo $agent_name[$id]; ?></td>
                                                    <td><?php echo $sender[$id]; ?></td>
                                                    <td><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></td>
                                                    <td>
                                                        <b><?php echo $remake_dropoff; ?></b>
                                                        <b class="text-info">
                                                            <?php
                                                            if (!empty($bec_id[$id])) {
                                                                echo '<br>';
                                                                for ($e = 0; $e < count($bec_name[$id]); $e++) {
                                                                    echo $e == 0 ? $bec_name[$id][$e] : ' : ' . $bec_name[$id][$e];
                                                                }
                                                            }
                                                            echo $note[$id]; ?>
                                                        </b>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } ?>
                                </table>

                                <div class="text-center mt-2 pb-5">
                                    <h4>
                                        <div class="badge badge-pill badge-light-warning">
                                            <b class="text-danger">TOTAL <?php echo $total_tourist; ?></b> <span class="text-black"><?php echo $total_adult; ?> <?php echo $total_child; ?> <?php echo $total_infant; ?> <?php echo $total_foc; ?></span>
                                        </div>
                                    </h4>
                                </div>
                    <?php }
                        }
                    } ?>
                    <input type="hidden" id="name_img" name="name_img" value="<?php echo 'ใบจัดรถ - ' . date('j F Y', strtotime($tomorrow)); ?>">
                    <!-- Body ends -->
                </div>

            </section>
            <!-- Sortable lists section end -->

        </div>

    </div>