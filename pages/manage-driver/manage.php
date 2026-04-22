<?php
require_once 'controllers/Manage.php';

$manageObj = new Manage();
$today = date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime(" +1 day"));
// $today = '2024-09-29';
// $tomorrow = '2024-09-30';
$get_date = !empty($_GET['search_travel_date']) ? $_GET['search_travel_date'] : $tomorrow; // $tomorrow->format("Y-m-d")
$search_car = !empty($_GET['search_car']) ? $_GET['search_car'] : 'all';
$search_driver = !empty($_GET['search_driver']) ? $_GET['search_driver'] : 'all';
$search_return = !empty($_GET['search_return']) ? $_GET['search_return'] : 1;
$search_status = $_GET['search_status'] != "" ? $_GET['search_status'] : 'all';
$search_agent = $_GET['search_agent'] != "" ? $_GET['search_agent'] : 'all';
$search_product = $_GET['search_product'] != "" ? $_GET['search_product'] : 'all';
$search_voucher_no = $_GET['voucher_no'] != "" ? $_GET['voucher_no'] : '';
$refcode = $_GET['refcode'] != "" ? $_GET['refcode'] : '';
$name = $_GET['name'] != "" ? $_GET['name'] : '';
$hotel = $_GET['hotel'] != "" ? $_GET['hotel'] : '';
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
$frist_zone = array();
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
            $chrage_tourist[$booking['id']] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
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

            if (($booking['pickup_id'] != $booking['hdropoff_id']) || ($booking['outside'] != $booking['outside_dropoff'])) {
                $check_dropoff[$booking['product_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
            }

            if ($booking['mange_id'] > 0) {
                $bo_manage[$booking['product_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
            }

            if ((in_array($booking['zonep_id'], $frist_zone) == false)) {
                $frist_zone[] = $booking['zonep_id'];
                $zone['name'][] = !empty($booking['zonep_name']) ? $booking['zonep_name'] : '';
            }
        }

        # --- get value manage transfer --- #
        if ((in_array($booking['bomange_id'], $frist_bomange) == false) && $booking['mange_id'] > 0) {
            $frist_bomange[] = $booking['bomange_id'];
            // $mange = $booking['mange_pickup'] > 0 ? 1 : 2;
            $reteun = 1;
            $bomange_id[$booking['mange_id']][] = !empty($booking['bomange_id']) ? $booking['bomange_id'] : 0;
            $bomange_bo[$booking['mange_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
            $check_book[$reteun][] = !empty($booking['id']) ? $booking['id'] : 0;
            $check_bt[$reteun][] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
            $check_mange[$reteun][$booking['product_id']][] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
        }

        # --- get value manage transfer dropoff --- #
        if ((in_array($booking['dropoff_id'], $frist_dropoff) == false) && $booking['dropoff_manage'] > 0) {
            $frist_dropoff[] = $booking['dropoff_id'];
            $bomange_bo[$booking['dropoff_manage']][] = !empty($booking['id']) ? $booking['id'] : 0;
        }

        # --- get value manage transfer overnight --- #
        if ((in_array($booking['over_id'], $frist_over) == false) && $booking['over_manage'] > 0) {
            $frist_over[] = $booking['over_id'];
            $bomange_bo[$booking['over_manage']][] = !empty($booking['id']) ? $booking['id'] : 0;
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

        $arr_trans['mange_id'][] = !empty($manage['id']) ? $manage['id'] : 0;
        $arr_trans['pickup'][] = !empty($manage['pickup']) ? $manage['pickup'] : 1;
        $arr_trans['dropoff'][] = !empty($manage['dropoff']) ? $manage['dropoff'] : 0;
        $arr_trans['product_id'][] = !empty($manage['product_id']) ? $manage['product_id'] : 0;
        $arr_trans['driver_id'][] = !empty($manage['driver_id']) ? $manage['driver_id'] : 0;
        $arr_trans['name'][] = !empty($manage['driver_name']) ? $manage['driver_name'] : $manage['outside_driver'];
        $arr_trans['car'][] = !empty($manage['car_name']) ? $manage['car_name'] : '';
        $arr_trans['driver'][] = !empty($manage['driver']) ? $manage['driver'] : '';
        $arr_trans['license'][] = !empty($manage['license']) ? $manage['license'] : '';
        $arr_trans['telephone'][] = !empty($manage['telephone']) ? $manage['telephone'] : '';
        $arr_trans['note'][] = !empty($manage['note']) ? $manage['note'] : '';
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
                        <h2 class="content-header-title float-left mb-0">จัดรถ</h2>
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
            <!-- list start -->
            <section class="app-booking-list">
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
                                            $select = $booktype['id'] == $search_status ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $booktype['id']; ?>" <?php echo $select; ?>><?php echo $booktype['name']; ?></option>
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
                                            $select = $product['id'] == $search_product ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $product['id']; ?>" <?php echo $select; ?>><?php echo $product['name']; ?></option>
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
                                            $select = $car['id'] == $search_car ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $car['id']; ?>" data-name="<?php echo $car['name']; ?>" <?php echo $select; ?>><?php echo $car['name']; ?></option>
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
                                            $select = $driver['id'] == $search_driver ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $driver['id']; ?>" <?php echo $select; ?>><?php echo $driver['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
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
                            <div class="col-md-4 col-12 mb-1">
                                <button type="submit" class="btn btn-primary"><i data-feather='search'></i> Search</button>
                                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-transfers"
                                    onclick="modal_transfer('<?php echo date('j F Y', strtotime($get_date)); ?>', 0, 0, 1);"><i data-feather='plus'></i> เปิดรถ</button> -->
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <span>
                                </span>
                                <span>
                                    <!-- <button type="button" class="btn btn-warning waves-effect waves-float waves-light"
                                        onclick="auto_assign_transfer('<?php echo $get_date; ?>');">
                                        <i data-feather='zap'></i> จัดรถอัตโนมัติ
                                    </button> -->
                                    <!-- 🗑️ ปุ่มยกเลิกรถทั้งหมด -->
                                    <!-- <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                                        onclick="cancel_all_transfer('<?php echo $get_date; ?>');">
                                        <i data-feather='trash-2'></i> ยกเลิกรถทั้งหมด
                                    </button> -->

                                    <button type="button" class="btn btn-success waves-effect waves-float waves-light"
                                        data-toggle="modal" data-target="#modal-logistics-center">
                                        <i data-feather='truck'></i> ศูนย์โลจิสติกส์
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- filter end -->

                <div id="div-manage-list">
                    <!-- Start Table Overnight -->
                    <!------------------------------------------------------------------>
                    <div class="card">

                        <div id="div-overnight-list">
                            <?php if (!empty($overnight['bo_id'])) { ?>
                                <div class="card-header">
                                    <h4 class="card-title">Overnight Booking</h4>
                                </div>
                                <div class="card-body pt-0 p-50">
                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="cell-fit text-center">CAR</th>
                                                <th class="text-nowrap">PROGRAME</th>
                                                <th class="text-nowrap">TRAVEL DATE</th>
                                                <th class="text-nowrap">TIME</th>
                                                <th>HOTEL</th>
                                                <th class="text-nowrap">ROOM</th>
                                                <th class="text-nowrap">Name</th>
                                                <th class="cell-fit text-center">A</th>
                                                <th class="cell-fit text-center">C</th>
                                                <th class="cell-fit text-center">INF</th>
                                                <th class="cell-fit text-center">FOC</th>
                                                <th class="text-nowrap">V/C</th>
                                                <th>REMARKE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_tourist = 0;
                                            $total_adult = 0;
                                            $total_child = 0;
                                            $total_infant = 0;
                                            $total_foc = 0;
                                            for ($i = 0; $i < count($overnight['bo_id']); $i++) {
                                                $id = $overnight['bo_id'][$i];

                                                $total_adult += !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0;
                                                $total_child += !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0;
                                                $total_infant += !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0;
                                                $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                                $total_tourist += !empty($tourist_array[$id]) ? !empty($chrage_tourist[$id]) ? array_sum($tourist_array[$id]) - $chrage_tourist[$id] : array_sum($tourist_array[$id]) : 0;

                                                $text_hotel = (!empty($hotel_name[$id][1])) ? $hotel_name[$id][1] : $outside[$id][1];
                                                $text_hotel .= (!empty($zone_name[$id][1])) ? ' (' . $zone_name[$id][1] . ')' : '';
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#edit_manage_transfer" onclick="modal_manage_transfer(
                                                                    'overnight', 
                                                                    <?php echo $bt_id[$id]; ?>, 
                                                                    <?php echo $product_id[$id]; ?>, 
                                                                    <?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?>,
                                                                    <?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?>,
                                                                    <?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?>,
                                                                    <?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?>,
                                                                    0, 
                                                                    0);">
                                                            <span class="badge badge-light-danger">เพิ่มรถ</span>
                                                        </a>
                                                    </td>
                                                    <td class="cell-fit"><?php echo $product_name[$id]; ?></td>
                                                    <td class="cell-fit"><span class="text-nowrap"><?php echo date('j F Y', strtotime($travel_date[$id])); ?></span></td>
                                                    <td class="cell-fit"><?php echo !empty($start_pickup[$id]) ? date("H:i", strtotime($start_pickup[$id])) . ' - ' . date("H:i", strtotime($end_pickup[$id])) : '00:00'; ?></td>
                                                    <td style="padding: 5px;"><?php echo $text_hotel; ?></td>
                                                    <td class="cell-fit"><?php echo $room_no[$id]; ?></td>
                                                    <td><?php echo $cus_name[$id][0]; ?></td>
                                                    <td class="text-center"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                                                    <td><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></td>
                                                    <td>
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
                                        <tfoot>
                                            <tr>
                                                <td colspan="15" class="text-center h5">Total: <?php echo $total_tourist; ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                    <!------------------------------------------------------------------>
                    <!-- End Table Overnight -->

                    <!-- Start Table Dropoff -->
                    <!------------------------------------------------------------------>
                    <div class="card">

                        <div id="div-dropoff-list">
                            <?php if (!empty($dropoff['bo_id'])) { ?>
                                <div class="card-header">
                                    <h4 class="card-title">Dropoff Booking</h4>
                                </div>
                                <div class="card-body pt-0 p-50">
                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="cell-fit text-center">CAR</th>
                                                <th class="text-nowrap">PROGRAME</th>
                                                <th class="text-nowrap">TRAVEL DATE</th>
                                                <th class="text-nowrap">TIME</th>
                                                <th>HOTEL</th>
                                                <th class="text-nowrap">ROOM</th>
                                                <th class="text-nowrap">Name</th>
                                                <th class="cell-fit text-center">A</th>
                                                <th class="cell-fit text-center">C</th>
                                                <th class="cell-fit text-center">INF</th>
                                                <th class="cell-fit text-center">FOC</th>
                                                <th class="text-nowrap">V/C</th>
                                                <th>REMARKE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_tourist = 0;
                                            $total_adult = 0;
                                            $total_child = 0;
                                            $total_infant = 0;
                                            $total_foc = 0;
                                            for ($i = 0; $i < count($dropoff['bo_id']); $i++) {
                                                $id = $dropoff['bo_id'][$i];

                                                $total_adult += !empty($adult[$id]) ? array_sum($adult[$id]) : 0;
                                                $total_child += !empty($child[$id]) ? array_sum($child[$id]) : 0;
                                                $total_infant += !empty($infant[$id]) ? array_sum($infant[$id]) : 0;
                                                $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                                $total_tourist += !empty($tourist_array[$id]) ? !empty($chrage_tourist[$id]) ? array_sum($tourist_array[$id]) - $chrage_tourist[$id] : array_sum($tourist_array[$id]) : 0;

                                                // $text_hotel = (!empty($hotel_name[$id][1])) ? '<b>Pickup : </b>' . $hotel_name[$id][1] : '<b>Pickup : </b>' . $outside[$id][1];
                                                // $text_hotel .= (!empty($zone_name[$id][1])) ? ' (' . $zone_name[$id][1] . ')</br>' : '</br>';
                                                $text_hotel = (!empty($hotel_name[$id][2])) ? '<b>Dropoff : </b>' . $hotel_name[$id][2] : '<b>Dropoff : </b>' . $outside[$id][2];
                                                $text_hotel .= (!empty($zone_name[$id][2])) ? ' (' . $zone_name[$id][2] . ')' : '';
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#edit_manage_transfer" onclick="modal_manage_transfer(
                                                                    'dropoff', 
                                                                    <?php echo $bt_id[$id]; ?>, 
                                                                    <?php echo $product_id[$id]; ?>,
                                                                    <?php echo !empty($adult[$id]) ? array_sum($adult[$id]) : 0; ?>,
                                                                    <?php echo !empty($child[$id]) ? array_sum($child[$id]) : 0; ?>,
                                                                    <?php echo !empty($infant[$id]) ? array_sum($infant[$id]) : 0; ?>,
                                                                    <?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?>, 
                                                                    0, 
                                                                    0);">
                                                            <span class="badge badge-light-danger">เพิ่มรถ</span>
                                                        </a>
                                                    </td>
                                                    <td class="cell-fit"><?php echo $product_name[$id]; ?></td>
                                                    <td class="cell-fit"><span class="text-nowrap"><?php echo date('j F Y', strtotime($get_date)); ?></span></td>
                                                    <td class="cell-fit"><?php echo !empty($start_pickup[$id]) ? date("H:i", strtotime($start_pickup[$id])) . ' - ' . date("H:i", strtotime($end_pickup[$id])) : '00:00'; ?></td>
                                                    <td style="padding: 5px;"><?php echo $text_hotel; ?></td>
                                                    <td class="cell-fit"><?php echo $room_no[$id]; ?></td>
                                                    <td><?php echo $cus_name[$id][0]; ?></td>
                                                    <td class="text-center"><?php echo !empty($adult[$id]) ? array_sum($adult[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($child[$id]) ? array_sum($child[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($infant[$id]) ? array_sum($infant[$id]) : 0; ?></td>
                                                    <td class="text-center"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                                                    <td><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></td>
                                                    <td>
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
                                        <tfoot>
                                            <tr>
                                                <td colspan="15" class="text-center h5"><span class="text-danger">Total: <?php echo $total_tourist; ?></span> | <?php echo $total_adult; ?> <?php echo $total_child; ?> <?php echo $total_infant; ?> <?php echo $total_foc; ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                    <!------------------------------------------------------------------>
                    <!-- End Table Dropoff -->

                    <!-- Start Table Programe -->
                    <!------------------------------------------------------------------>
                    <div class="card">

                        <div id="div-manages-list">
                            <textarea id="array_trans" hidden><?php echo !empty($mange) ? json_encode($mange, true) : ''; ?></textarea>
                            <?php
                            if (!empty($mange['id'])) {
                                for ($i = 0; $i < count($mange['id']); $i++) {

                            ?>
                                    <div class="card-body pt-0 p-50">
                                        <div class="d-flex justify-content-between align-items-center header-actions mx-1 mt-75">
                                            <div class="col-4 text-left text-bold h4"></div>
                                            <div class="col-4 text-center">
                                                <span class="h4 badge-light-purple"><?php echo !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i]; ?></span>
                                                <span class="h4 badge-light-orange"><?php echo $mange['product_name'][$i]; ?></span>
                                            </div>
                                            <div class="col-4 text-right mb-50">
                                                <button type="button" class="btn btn-icon btn-icon btn-flat-info waves-effect btn-page-block-spinner" data-toggle="modal" data-target="#modal-booking"
                                                    onclick="search_booking(
                                                        '<?php echo $get_date; ?>',
                                                        1,
                                                        <?php echo $mange['id'][$i]; ?>, 
                                                        <?php echo $mange['product'][$i]; ?>,
                                                        '<?php echo $mange['product_name'][$i]; ?>',
                                                        '<?php echo $mange['driver_name'][$i]; ?>', 
                                                        '<?php echo $mange['car_name'][$i]; ?>', 
                                                        <?php echo $mange['seat'][$i]; ?>);">
                                                    <i data-feather='plus'></i>
                                                    เพิ่ม Booking
                                                </button>
                                                <button type="button" class="btn btn-icon btn-icon btn-flat-warning waves-effect btn-page-block-spinner" data-toggle="modal" data-target="#modal-transfers"
                                                    onclick="modal_transfer('<?php echo date('j F Y', strtotime($get_date)); ?>', <?php echo $mange['id'][$i]; ?>, <?php echo $i; ?>)">
                                                    <i data-feather='edit'></i>
                                                    แก้ใขรถ
                                                </button>
                                                <input type="hidden" id="arr_mange<?php echo $mange['id'][$i]; ?>" value='<?php echo json_encode($mange, JSON_HEX_APOS, JSON_UNESCAPED_UNICODE); ?>'>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th colspan="3">คนขับ : <?php echo $mange['driver_name'][$i]; ?></th>
                                                    <th colspan="7">ป้ายทะเบียน : <?php echo $mange['license'][$i]; ?></th>
                                                    <th colspan="4">โทรศัพท์ : <?php echo $mange['telephone'][$i]; ?></th>
                                                </tr>
                                                <tr>
                                                    <th class="cell-fit text-center">รถ</th>
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
                                            <?php if ($bomange_bo[$mange['id'][$i]]) { ?>
                                                <tbody>
                                                    <?php
                                                    $total_tourist = 0;
                                                    $total_adult = 0;
                                                    $total_child = 0;
                                                    $total_infant = 0;
                                                    $total_foc = 0;
                                                    $dropoff_arr = array();
                                                    for ($a = 0; $a < count($bomange_bo[$mange['id'][$i]]); $a++) {
                                                        $id = $bomange_bo[$mange['id'][$i]][$a];

                                                        $total_adult += !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0;
                                                        $total_child += !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0;
                                                        $total_infant += !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0;
                                                        $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                                        $total_tourist += !empty($tourist_array[$id]) ? !empty($chrage_tourist[$id]) ? array_sum($tourist_array[$id]) - $chrage_tourist[$id] : array_sum($tourist_array[$id]) : 0;

                                                        $t_adult += !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0;
                                                        $t_child += !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0;
                                                        $t_infant += !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0;

                                                        $text_hotel = (!empty($hotel_name[$id][1])) ? $hotel_name[$id][1] : $outside[$id][1];
                                                        $text_hotel .= (!empty($zone_name[$id][1])) ? ' (' . $zone_name[$id][1] . ')</br>' : '</br>';

                                                        # --- over night or dropoff booking --- #
                                                        $car_driver = !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i];
                                                        $span_text = '';
                                                        if ($over_id[$id] > 0 && $over_manage[$id] == $mange['id'][$i]) {
                                                            $span_text = '<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_manage_transfer" onclick="modal_manage_transfer(\'overnight\', ' .
                                                                $bt_id[$id] . ', ' .
                                                                $product_id[$id] . ', ' .
                                                                $t_adult . ', ' .
                                                                $t_child . ', ' .
                                                                $t_infant . ', ' .
                                                                array_sum($foc[$id]) . ', ' .
                                                                $mange['id'][$i] . ', ' .
                                                                $over_id[$id] .
                                                                ');"><span class="badge badge-pill badge-light-purple-small text-capitalized">' . $car_driver . '</span></a>';
                                                        } elseif (($dropoff_id[$id] > 0 && $dropoff_manage[$id] == $mange['id'][$i])) {
                                                            if (in_array($bt_id[$id], $dropoff_arr) == false) {
                                                                $dropoff_arr[] = $bt_id[$id];
                                                                $span_text = '<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_manage_transfer" onclick="modal_manage_transfer(\'dropoff\', ' .
                                                                    $bt_id[$id] . ', ' .
                                                                    $product_id[$id] . ', ' .
                                                                    $t_adult . ', ' .
                                                                    $t_child . ', ' .
                                                                    $t_infant . ', ' .
                                                                    array_sum($foc[$id]) . ', ' .
                                                                    $mange['id'][$i] . ', ' .
                                                                    $dropoff_id[$id] .
                                                                    ');"><span class="badge badge-pill badge-light-wheat text-capitalized">' . $car_driver . '</span></a>';
                                                                $text_hotel = (!empty($hotel_name[$id][2])) ? '<b>Dropoff : </b>' . $hotel_name[$id][2] : '<b>Dropoff : </b>' . $outside[$id][2];
                                                                $text_hotel .= (!empty($zone_name[$id][2])) ? ' (' . $zone_name[$id][2] . ')' : '';
                                                            } else {
                                                                $span_text = '<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_manage_transfer" onclick="modal_manage_transfer(\'manage\', ' .
                                                                    $bt_id[$id] . ', ' .
                                                                    $product_id[$id] . ', ' .
                                                                    $t_adult . ', ' .
                                                                    $t_child . ', ' .
                                                                    $t_infant . ', ' .
                                                                    array_sum($foc[$id]) . ', ' .
                                                                    $mange['id'][$i] . ', ' .
                                                                    0 .
                                                                    ');"><span class="badge badge-pill badge-light-success text-capitalized">' . $car_driver . '</span></a>';
                                                            }
                                                        } else {
                                                            $span_text = '<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_manage_transfer" onclick="modal_manage_transfer(\'manage\', ' .
                                                                $bt_id[$id] . ', ' .
                                                                $product_id[$id] . ', ' .
                                                                $t_adult . ', ' .
                                                                $t_child . ', ' .
                                                                $t_infant . ', ' .
                                                                array_sum($foc[$id]) . ', ' .
                                                                $mange['id'][$i] . ', ' .
                                                                0 .
                                                                ');"><span class="badge badge-pill badge-light-success text-capitalized">' . $car_driver . '</span></a>';
                                                        }
                                                    ?>
                                                        <tr>
                                                            <td class="cell-fit"><?php echo $span_text; ?></td>
                                                            <td class="cell-fit">
                                                                <span class="fw-bold">
                                                                    <?php if (!empty($category_name[$id])) {
                                                                        for ($c = 0; $c < count($category_name[$id]); $c++) {
                                                                            echo $c == 0 ? $category_name[$id][$c] : ', ' . $category_name[$id][$c];
                                                                        }
                                                                    } ?>
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
                                                            <td><b class="text-info">
                                                                    <?php if (!empty($bec_id[$id])) {
                                                                        for ($e = 0; $e < count($bec_name[$id]); $e++) {
                                                                            echo $e == 0 ? $bec_name[$id][$e] : ' : ' . $bec_name[$id][$e];
                                                                        }
                                                                    }
                                                                    echo $note[$id]; ?></b>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="16" class="text-center h5">Total: <?php echo $total_tourist; ?> | <?php echo $total_adult; ?> <?php echo $total_child; ?> <?php echo $total_infant; ?> <?php echo $total_foc; ?></td>
                                                    </tr>
                                                </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>

                    </div>
                    <!------------------------------------------------------------------>
                    <!-- End Table Programe -->

                    <!-- Start Management Transfer -->
                    <!------------------------------------------------------------------>
                    <div class="card">

                        <div id="div-booking-list">
                            <?php if (!empty($programe_id)) { ?>
                                <div class="card-header">
                                    <h4 class="card-title">Booking ที่ยังไม่ได้จัดรถ</h4>
                                </div>
                                <?php
                                $retrun = 1;
                                for ($a = 0; $a < count($programe_id); $a++) {
                                    if (!empty($bo_id[$programe_id[$a]])) {
                                ?>
                                        <div class="card-body pt-0 p-50">
                                            <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                                <div class="col-lg-12 col-xl-12 text-center"><span class="h4 badge-light-orange"><?php echo $programe_name[$a]; ?></span></div>
                                            </div>
                                            <table class="table table-bordered table-striped">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th class="cell-fit text-center">คนขับ</th>
                                                        <th class="cell-fit text-center">STATUS</th>
                                                        <th class="text-nowrap">TRAVEL DATE</th>
                                                        <th class="text-nowrap">TIME</th>
                                                        <th>HOTEL</th>
                                                        <th class="text-nowrap">ROOM</th>
                                                        <th class="text-nowrap">Name</th>
                                                        <th class="cell-fit text-center">A</th>
                                                        <th class="cell-fit text-center">C</th>
                                                        <th class="cell-fit text-center">INF</th>
                                                        <th class="cell-fit text-center">FOC</th>
                                                        <th class="text-nowrap">V/C</th>
                                                        <th class="text-nowrap">COT</th>
                                                        <th>REMARKE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $total_tourist = 0;
                                                    $total_adult = 0;
                                                    $total_child = 0;
                                                    $total_infant = 0;
                                                    $total_foc = 0;
                                                    for ($i = 0; $i < count($bo_id[$programe_id[$a]]); $i++) {
                                                        if (empty($check_book[1]) || !empty($check_book[1]) && in_array($bo_id[$programe_id[$a]][$i], $check_book[1]) == false) {
                                                            $id = $bo_id[$programe_id[$a]][$i];

                                                            $total_adult += !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0;
                                                            $total_child += !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0;
                                                            $total_infant += !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0;
                                                            $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                                            $total_tourist += !empty($tourist_array[$id]) ? !empty($chrage_tourist[$id]) ? array_sum($tourist_array[$id]) - $chrage_tourist[$id] : array_sum($tourist_array[$id]) : 0;

                                                            $text_hotel = (!empty($hotel_name[$id][1])) ? '<b>Pickup : </b>' . $hotel_name[$id][1] : '<b>Pickup : </b>' . $outside[$id][1];
                                                            $text_hotel .= (!empty($zone_name[$id][1])) ? ' (' . $zone_name[$id][1] . ')</br>' : '</br>';
                                                            $text_hotel .= (!empty($hotel_name[$id][2])) ? '<b>Dropoff : </b>' . $hotel_name[$id][2] : '<b>Dropoff : </b>' . $outside[$id][2];
                                                            $text_hotel .= (!empty($zone_name[$id][2])) ? ' (' . $zone_name[$id][2] . ')' : '';
                                                    ?>
                                                            <tr>
                                                                <td class="cell-fit"><a href="javascript:void(0);" data-toggle="modal" data-target="#edit_manage_transfer"
                                                                        onclick="modal_manage_transfer(
                                                                        'manage',
                                                                        <?php echo $bt_id[$id]; ?>, 
                                                                        <?php echo $programe_id[$a]; ?>,
                                                                        <?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?>,
                                                                        <?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?>,
                                                                        <?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?>,
                                                                        <?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?>, 
                                                                        0, 
                                                                        0);"><span class="badge badge-light-danger">ไม่มีการจัดรถ</span></a></td>
                                                                <td class="cell-fit"><?php echo $status[$id]; ?></td>
                                                                <td class="cell-fit"><span class="text-nowrap"><?php echo (!empty($bp_id[$id])) ? date('j F Y', strtotime($travel_date[$id])) : 'ไม่มีสินค้า'; ?></span></td>
                                                                <td class="cell-fit"><?php echo !empty($start_pickup[$id]) ? date("H:i", strtotime($start_pickup[$id])) . ' - ' . date("H:i", strtotime($end_pickup[$id])) : '00:00'; ?></td>
                                                                <td style="padding: 5px;"><?php echo $text_hotel; ?></td>
                                                                <td><?php echo (!empty($room_no[$id])) ? $room_no[$id] : ''; ?></td>
                                                                <td><?php echo !empty($cus_name[$id][0]) ? $cus_name[$id][0] : ''; ?></td>
                                                                <td class="text-center"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?></td>
                                                                <td class="text-center"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?></td>
                                                                <td class="text-center"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?></td>
                                                                <td class="text-center"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                                                                <td><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></td>
                                                                <td class="text-nowrap"><?php echo number_format($cot[$id]); ?></td>
                                                                <td><?php
                                                                    if (!empty($bec_id[$id])) {
                                                                        for ($e = 0; $e < count($bec_name[$id]); $e++) {
                                                                            echo $e == 0 ? $bec_name[$id][$e] : ' : ' . $bec_name[$id][$e];
                                                                        }
                                                                    }
                                                                    echo $note[$id]; ?>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="15" class="text-center h5"><span class="text-danger">Total: <?php echo $total_tourist; ?></span> | <?php echo $total_adult; ?> <?php echo $total_child; ?> <?php echo $total_infant; ?> <?php echo $total_foc; ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                            <?php }
                                }
                            } ?>
                        </div>

                    </div>
                    <!------------------------------------------------------------------>
                    <!-- End Management Transfer -->
                </div>

            </section>

            <!-- Start Form Modal -->
            <!------------------------------------------------------------------>

            <!-- action boat -->
            <div class="modal-size-xl d-inline-block">
                <div class="modal fade text-left" id="modal-transfers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel17">จัดรถ (<span id="text-travel-date"></span>)</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="show-div-cus"></div>
                                <form id="transfer-form" name="transfer-form" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="manage_id" name="manage_id" value="">
                                    <input type="hidden" id="retrun" name="retrun" value="">
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="product_id">โปรแกรม</label>
                                                <select class="form-control select2" id="product_id" name="product_id">
                                                    <option value="">กรุญาเลือกโปรแกรม...</option>
                                                    <?php
                                                    $products = $manageObj->showproducts();
                                                    foreach ($products as $product) {
                                                    ?>
                                                        <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group" id="frm-car">
                                                <label for="car">ชื่อรถ</label>
                                                <select class="form-control select2" id="car" name="car" onchange="check_outside('car');">
                                                    <option value="0">กรุญาเลือกรถ...</option>
                                                    <option value="outside">กรอกข้อมูลเพิ่มเติม</option>
                                                    <?php
                                                    $cars = $manageObj->showcars();
                                                    foreach ($cars as $car) {
                                                    ?>
                                                        <option value="<?php echo $car['id']; ?>" data-name="<?php echo $car['name']; ?>"><?php echo $car['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group" id="frm-car-outside" hidden>
                                                <label class="form-label" for="outside_car">กรอกข้อมูลเพิ่มเติม </label></br>
                                                <div class="input-group input-group-merge mb-2">
                                                    <input type="text" class="form-control" id="outside_car" name="outside_car" value="" />
                                                    <div class="input-group-append" onclick="check_outside('outside_car');">
                                                        <span class="input-group-text cursor-pointer"><i data-feather='x'></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group" id="frm-driver">
                                                <label for="driver">ชื่อคนขับ</label>
                                                <select class="form-control select2" id="driver" name="driver" onchange="check_driver();">
                                                    <option value="0">กรุญาเลือกคนขับ...</option>
                                                    <option value="outside">กรอกข้อมูลเพิ่มเติม</option>
                                                    <?php
                                                    $drivers = $manageObj->showdrivers();
                                                    foreach ($drivers as $driver) {
                                                    ?>
                                                        <option value="<?php echo $driver['id']; ?>" data-name="<?php echo $driver['name']; ?>" data-seat="<?php echo $driver['seat']; ?>" data-license="<?php echo $driver['number_plate']; ?>" data-telephone="<?php echo $driver['telephone']; ?>"><?php echo $driver['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group" id="frm-driver-outside" hidden>
                                                <label class="form-label" for="outside_driver">กรอกข้อมูลเพิ่มเติม </label></br>
                                                <div class="input-group input-group-merge mb-2">
                                                    <input type="text" class="form-control" id="outside_driver" name="outside_driver" value="" />
                                                    <div class="input-group-append" onclick="check_outside('outside_driver');">
                                                        <span class="input-group-text cursor-pointer"><i data-feather='x'></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-12">
                                            <label for="seat">ที่นั่ง</label>
                                            <select class="form-control select2" id="seat" name="seat">
                                                <option value="0">กรุญาเลือกจำนวนที่นั่ง...</option>
                                                <option value="10">10</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="license">ป้ายทะเบียน</label></br>
                                                <input type="text" class="form-control" id="license" name="license" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="telephone">โทรศัพท์</label></br>
                                                <input type="text" class="form-control" id="telephone" name="telephone" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="note">หมายเหตุ</label></br>
                                                <textarea name="note" id="note" class="form-control" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-danger" id="delete_manage" onclick="delete_transfer();">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- create booking manage boat -->
            <div class="modal-size-xl d-inline-block">
                <div class="modal fade text-left" id="modal-booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel17">เลือก Booking</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive" id="div-manage-boooking">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- edit booking manage boat -->
            <div class="modal fade text-left" id="edit_manage_transfer" tabindex="-1" aria-labelledby="myModalLabel18" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel18">เพิ่มรถ</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="edit-manage-form" name="edit-manage-form" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="type" name="type" value="">
                            <input type="hidden" id="type_id" name="type_id" value="">
                            <input type="hidden" id="brfore_manage_id" name="brfore_manage_id" value="">
                            <input type="hidden" id="edit_bt_id" name="edit_bt_id" value="">
                            <input type="hidden" id="adult" name="adult" value="">
                            <input type="hidden" id="child" name="child" value="">
                            <input type="hidden" id="infant" name="infant" value="">
                            <input type="hidden" id="foc" name="foc" value="">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="edit_manage">รถ</label>
                                            <select class="form-control select2" id="edit_manage" name="edit_manage">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- manage logistics transfer -->
            <div class="modal fade text-left" id="modal-logistics-center" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="max-width: 95%;">
                    <div class="modal-content">

                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-white">
                                <i data-feather="truck" class="mr-50"></i> TOURMATE LOGISTICS CENTER
                            </h4>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-2">

                            <form id="logistics-filter-form">
                                <div class="row mb-2 d-flex align-items-end">
                                    <!-- <div class="col-md-3">
                                        <div class="form-group mb-0">
                                            <label class="font-weight-bold">วันที่เดินทาง (Travel Date)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control date-picker" id="logistics-date" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group mb-0">
                                            <label class="font-weight-bold">อุทยาน (Park)</label>
                                            <select class="form-control select2" id="logistics-park">
                                                <option value="all">-- เลือกอุทยาน --</option>
                                                <?php
                                                $parks = $manageObj->showparks();
                                                foreach ($parks as $park) {
                                                    echo "<option value='{$park['id']}'>{$park['name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-0">
                                            <label class="font-weight-bold">โปรแกรม (Program)</label>
                                            <select class="form-control select2" id="logistics-programs" multiple>
                                                <?php
                                                $products = $manageObj->showproducts();
                                                foreach ($products as $product) {
                                                    echo "<option value='{$product['id']}' data-park='{$product['park_id']}'>{$product['name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary btn-block" id="btn-fetch-pool">
                                            <i data-feather="search"></i> ค้นหา
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">

                                <div class="col-md-8 border-right">

                                    <!-- <h5 class="font-weight-bolder text-primary mb-25">ROUTE-SORTED BOOKINGS (Waiting Pool)</h5>
                                    <p class="text-muted small mb-1">Master list of all unassigned bookings sorted logically by AI according to pickup route (farthest hotels first)</p> -->

                                    <ul class="nav nav-tabs nav-justified" id="bookingTypeTabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active font-weight-bolder text-primary" id="join-tab" data-toggle="tab" href="#join-pool" role="tab">
                                                <i data-feather="users"></i> รับ-ส่ง แบบจอย (JOIN TRANSFERS) <span class="badge badge-pill badge-light-primary ml-50" id="badge-join">0</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-weight-bolder text-warning" id="private-tab" data-toggle="tab" href="#private-pool" role="tab">
                                                <i data-feather="user-check"></i> รับ-ส่ง แบบส่วนตัว (PRIVATE TRANSFERS) <span class="badge badge-pill badge-light-warning ml-50" id="badge-private">0</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <p class="text-muted small mb-1 mt-50">Master list of all unassigned bookings sorted logically by AI according to pickup route</p>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="join-pool" role="tabpanel">
                                            <div class="table-responsive table-waiting-pool">
                                                <table class="table table-hover table-bordered table-sm" id="table-join">
                                                    <thead class="thead-light text-center">
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="checkAllJoin"><label class="custom-control-label" for="checkAllJoin"></label></div>
                                                            </th>
                                                            <th>ETD</th>
                                                            <th>Hotel (Zone)</th>
                                                            <th>Room#</th>
                                                            <th>Guest Name</th>
                                                            <th>Pax</th>
                                                            <th>V/C</th>
                                                            <th>Programe</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-join">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="private-pool" role="tabpanel">
                                            <div class="table-responsive table-waiting-pool">
                                                <table class="table table-hover table-bordered table-sm" id="table-private">
                                                    <thead class="thead-light text-center">
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="checkAllPrivate"><label class="custom-control-label" for="checkAllPrivate"></label></div>
                                                            </th>
                                                            <th>ETD</th>
                                                            <th>Hotel (Zone)</th>
                                                            <th>Room#</th>
                                                            <th>Guest Name</th>
                                                            <th>Pax</th>
                                                            <th>V/C</th>
                                                            <th>Programe</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-private">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="van-builder-panel p-2 h-100 d-flex flex-column">
                                        <!-- <h5 class="font-weight-bolder mb-1">ACTIVE VAN BUILDER (V01)</h5> -->

                                        <div class="row text-center mb-2">
                                            <div class="col-6 border-right">
                                                <span class="d-block text-muted small font-weight-bold">PAX COUNTER</span>
                                                <span class="pax-counter-text text-primary"><span style="font-size:1.5rem;" class="text-secondary">/</span></span>
                                            </div>
                                            <!-- <div class="col-4 border-right">
                                                <span class="d-block text-muted small font-weight-bold">Big Luggage</span>
                                                <span class="pax-counter-text text-dark"></span>
                                            </div> -->
                                            <div class="col-6">
                                                <span class="d-block text-muted small font-weight-bold">Remaining</span>
                                                <span class="pax-counter-text text-success"> Seats</span>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <select class="form-control" id="van-logistics" name="van_logistics">
                                                <option>Select Cars ...</option>
                                                <?php
                                                $cars = $manageObj->showcars();
                                                foreach ($cars as $car) {
                                                ?>
                                                    <option value="<?php echo $car['id']; ?>" data-name="<?php echo $car['name']; ?>" data-seat="<?php echo $car['capacity']; ?>"><?php echo $car['name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <select class="form-control" id="driver-logistics" name="driver_logistics">
                                                <option>Select Driver ...</option>
                                                <?php
                                                $drivers = $manageObj->showdrivers();
                                                foreach ($drivers as $driver) {
                                                ?>
                                                    <option value="<?php echo $driver['id']; ?>" data-name="<?php echo $driver['name']; ?>" data-seat="<?php echo $driver['seat']; ?>" data-license="<?php echo $driver['number_plate']; ?>" data-telephone="<?php echo $driver['telephone']; ?>"><?php echo $driver['name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <hr class="w-100 my-1">

                                        <div class="flex-grow-1 overflow-auto mb-2" style="max-height: 250px;">
                                            <!-- <div class="selected-booking-item font-weight-bold text-primary bg-light-primary">
                                                <i data-feather="map-pin" class="mr-50" width="16" height="16"></i> Kamala/Nai Yang (Zone)
                                            </div>
                                            <div class="selected-booking-item">
                                                <i data-feather="check-circle" class="text-success mr-50" width="16" height="16"></i> Parent B52 (Nationaliam) <span class="badge badge-light-secondary ml-auto">2 Pax</span>
                                            </div>
                                            <div class="selected-booking-item">
                                                <i data-feather="check-circle" class="text-success mr-50" width="16" height="16"></i> Parent B54-A (15 pax) <span class="badge badge-light-secondary ml-auto">4 Pax</span>
                                            </div>
                                            <div class="selected-booking-item border-danger">
                                                <i data-feather="check-circle" class="text-success mr-50" width="16" height="16"></i> Parent B54 (33 pax) <span class="badge badge-light-secondary ml-auto">3 Pax</span>
                                                <i data-feather="alert-circle" class="text-danger ml-50" width="14" height="14" data-toggle="tooltip" title="Wheelchair Request"></i>
                                            </div> -->
                                        </div>

                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-success btn-block btn-lg mb-1 font-weight-bold shadow-sm" id="btn-assign-van">
                                                <i data-feather="check"></i> CLOSE VAN V01 & ASSIGN
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-block font-weight-bold">
                                                <i data-feather="x"></i> CLEAR SELECTION
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade text-left" id="modal-split-booking" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-light-primary">
                            <h5 class="modal-title text-primary"><i data-feather="scissors"></i> แบ่งกลุ่มลูกค้า (Split Booking)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning mb-2" role="alert">
                                <div class="alert-body d-flex align-items-center">
                                    <i data-feather="info" class="mr-50"></i>
                                    <span>ลูกค้ากลุ่มนี้มี <b><span id="split-total-pax">18</span> คน</b> คุณต้องการแบ่งกลุ่มอย่างไร?</span>
                                </div>
                            </div>

                            <input type="hidden" id="split-booking-id" value="">

                            <div class="form-group">
                                <label>กลุ่มที่ 1 (จำนวนคน)</label>
                                <input type="number" class="form-control" id="split-group-1" min="1" placeholder="เช่น 9">
                            </div>
                            <div class="form-group">
                                <label>กลุ่มที่ 2 (จำนวนคนที่เหลือ)</label>
                                <input type="number" class="form-control" id="split-group-2" readonly style="background-color: #f8f8f8;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-primary" id="btn-confirm-split">ยืนยันการแบ่ง</button>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------>
            <!-- End Form Modal -->

        </div>
    </div>