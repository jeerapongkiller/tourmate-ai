<?php
require_once 'controllers/Manage.php';

$today = date("Y-m-d");
$tomorrow = new DateTime('tomorrow');
$manageObj = new Manage();

if (isset($_GET['action']) && $_GET['action'] == "print" && !empty($_GET['date_travel'])) {
    // get value from ajax
    $get_date = $_GET['date_travel'] != "" ? $_GET['date_travel'] : '0000-00-00';
    $search_car = $_GET['search_car'] != "" ? $_GET['search_car'] : 'all';
    $search_driver = $_GET['search_driver'] != "" ? $_GET['search_driver'] : 'all';
    $search_retrun = $_GET['retrun'] != "" ? $_GET['retrun'] : 0;
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
        }
    }
?>
    <div id="div-driver-job-image" style="background-color: #FFF;">
        <?php
        if (!empty($mange['id'])) {
            for ($i = 0; $i < count($mange['id']); $i++) {
                if (!empty($bomange_bo[$mange['id'][$i]])) {
        ?>
                    <div class="table-responsive">
                        <table class="tableprint table-striped text-uppercase">
                            <thead class="">
                                <tr>
                                    <th colspan="13" style="background-color: #FFF;">
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <span class="col-6 brand-logo"><img src="app-assets/images/logo/logo-500.png" height="50"></span>
                                                <span class="col-6 text-right" style="color: #000;">
                                                    โทร : +66 76 390 250 </br>
                                                    Email : info@loveandaman.com
                                                </span>
                                            </div>
                                            <div class="text-center card-text">
                                                <h4 class="font-weight-bolder">ใบจัดรถ</h4>
                                                <div class="badge badge-pill badge-light-danger">
                                                    <h5 class="m-0 pl-1 pr-1 text-danger"><?php echo date('j F Y', strtotime($get_date)); ?></h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75 pt-1">
                                            <div class="col-4 text-left text-bold h4"></div>
                                            <div class="col-4 text-center">
                                                <span class="h4 badge-light-purple"><?php echo !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i]; ?></span>
                                                <span class="h4 badge-light-orange"><?php echo $mange['product_name'][$i]; ?></span>
                                            </div>
                                            <div class="col-4 text-right mb-50"></div>
                                        </div>

                                    </th>
                                </tr>
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
                                        $total_adult += !empty($adult[$id]) ? array_sum($adult[$id]) : 0;
                                        $total_child += !empty($child[$id]) ? array_sum($child[$id]) : 0;
                                        $total_infant += !empty($infant[$id]) ? array_sum($infant[$id]) : 0;
                                        $total_foc += !empty($foc[$id]) ? array_sum($foc[$id]) : 0;
                                        $total_tourist += !empty($tourist_array[$id]) ? array_sum($tourist_array[$id]) : 0;

                                        # --- over night or dropoff booking --- #
                                        $car_driver = !empty($mange['car_name'][$i]) ? $mange['car_name'][$i] : $mange['driver_name'][$i];
                                        $color_tr = '';
                                        if ($over_id[$id] > 0 && $over_manage[$id] == $mange['id'][$i]) {
                                            $color_tr = 'table-primary';
                                        } elseif (($dropoff_id[$id] > 0 && $dropoff_manage[$id] == $mange['id'][$i])) {
                                            if (in_array($bt_id[$id], $dropoff_arr) == false) {
                                                $dropoff_arr[] = $bt_id[$id];
                                                $color_tr = 'table-wheat';
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
                                                    } ?>
                                                </span>
                                            </td>
                                            <td class="cell-fit"><?php echo !empty($start_pickup[$id]) ? date("H:i", strtotime($start_pickup[$id])) . ' - ' . date("H:i", strtotime($end_pickup[$id])) : '00:00'; ?></td>
                                            <td><?php echo (!empty($outside[$id][1])) ? $outside[$id][1] : $hotel_name[$id][1]; ?></td>
                                            <td class="cell-fit"><?php echo $room_no[$id]; ?></td>
                                            <td><?php echo $cus_name[$id][0]; ?></td>
                                            <td class="text-center"><?php echo !empty($adult[$id]) ? array_sum($adult[$id]) : 0; ?></td>
                                            <td class="text-center"><?php echo !empty($child[$id]) ? array_sum($child[$id]) : 0; ?></td>
                                            <td class="text-center"><?php echo !empty($infant[$id]) ? array_sum($infant[$id]) : 0; ?></td>
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
                                        <td colspan="16" class="text-center h5"><b class="text-danger">TOTAL <?php echo $total_tourist; ?></b> <span class="text-black"><?php echo $total_adult; ?> <?php echo $total_child; ?> <?php echo $total_infant; ?> <?php echo $total_foc; ?></span></td>
                                    </tr>
                                </tfoot>
                            <?php } ?>
                            <!-- <tfoot>
                                <tr>
                                    <td colspan="12" class="p-0" style="border: 0;">
                                        <div class="card-body invoice-padding py-0 bg-danger">
                                            <p class="text-center pt-50 pb-50 text-white">ถ้าลูกค้าช้า 5-10 นาทีกรุณาติดต่อกลับด่วน</p>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot> -->
                        </table>

                    </div>
                    <!-- <div class="pagebreak"></div> -->
            <?php }
            } ?>
        <?php } ?>
        <!-- Body ends -->
    </div>
    <input type="hidden" id="name_img" name="name_img" value="<?php echo 'ใบจัดรถ - ' . date('j F Y', strtotime($get_date)); ?>">
<?php
}
?>