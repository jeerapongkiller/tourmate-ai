<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

if (isset($_POST['action']) && $_POST['action'] == "search" && isset($_POST['travel_date']) && isset($_POST['product_id'])) {
    // get value from ajax
    $travel = !empty($_POST['travel_date']) ? $_POST['travel_date'] : '0000-00-00';
    $manage_id = !empty($_POST['manage_id']) ? $_POST['manage_id'] : 0;
    $car = !empty($_POST['car']) ? $_POST['car'] : '';
    $driver = !empty($_POST['driver']) ? $_POST['driver'] : '';
    $seat = !empty($_POST['seat']) ? $_POST['seat'] : 0;
    $product_id = !empty($_POST['product_id']) ? $_POST['product_id'] : '';
    $manage_product = !empty($_POST['product_name']) ? $_POST['product_name'] : '';
    $return = !empty($_POST['return']) ? $_POST['return'] : 1;

    $first_bo = array();
    $first_bt = array();
    $first_prod = array();
    $first_manage_bt = array();
    $frist_bomange = array();
    $first_bpr = array();
    $bookings = $manageObj->showlisttransfers('manage', $travel, 'all', 'all', 'all', 'all', $product_id, '', '', '', ''); // search
    if (!empty($bookings)) {
        foreach ($bookings as $booking) {
            # --- get value Programe --- #
            if (in_array($booking['product_id'], $first_prod) == false) {
                $first_prod[] = $booking['product_id'];
                $programe_id[] = !empty($booking['product_id']) ? $booking['product_id'] : 0;
                $programe_name[] = !empty($booking['product_name']) ? $booking['product_name'] : '';
                $programe_type[] = !empty($booking['pg_type_name']) ? $booking['pg_type_name'] : '';
            }
            # --- get value booking --- #
            if ((in_array($booking['id'], $first_bo) == false)) {
                $first_bo[] = $booking['id'];
                $bo_id[] = !empty($booking['id']) ? $booking['id'] : 0;
                $bp_id[$booking['id']] = !empty($booking['bp_id']) ? $booking['bp_id'] : 0;
                $bt_id[$booking['id']] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
                $travel_date[$booking['id']] = !empty(!empty($booking['travel_date'])) ? $booking['travel_date'] : '0000-00-00';
                $book_full[$booking['id']] = !empty($booking['book_full']) ? $booking['book_full'] : '';
                $voucher_no[$booking['id']] = !empty(!empty($booking['voucher_no_agent'])) ? $booking['voucher_no_agent'] : '';
                $agent_name[$booking['id']] = !empty($booking['comp_name']) ? $booking['comp_name'] : '';
                $cus_name[$booking['id']] = !empty($booking['cus_name']) ? $booking['cus_name'] : '';
                $product[$booking['id']] = !empty($booking['product_id']) ? $booking['product_id'] : 0;
                $product_name[$booking['id']] = !empty($booking['product_name']) ? $booking['product_name'] : '';
                $booktye_name[$booking['id']] = !empty($booking['booktye_name']) ? $booking['booktye_name'] : '';
                $hotel_name[$booking['id']] = !empty($booking['pickup_id']) ? $booking['pickup_name'] : $booking['outside'];
                $hotel_dropoff[$booking['id']] = !empty($booking['hdropoff_id']) ? $booking['hdropoff_name'] : $booking['outside_dropoff'];
                $note[$booking['id']] = !empty($booking['note']) ? $booking['note'] : '';
                $start_pickup[$booking['id']] = !empty($booking['start_pickup']) && $booking['start_pickup'] != '00:00' ? $booking['start_pickup'] : '00:00';
                $end_pickup[$booking['id']] = !empty($booking['end_pickup']) && $booking['end_pickup'] != '00:00' ? $booking['end_pickup'] : '00:00';
                $zone_name[$booking['id']] = !empty($booking['zonep_name']) ? $booking['zonep_name'] : '';

                # --- chrage --- #
                $chrage_id[$booking['id']] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
                $chrage_adult[$booking['id']] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
                $chrage_child[$booking['id']] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
                $chrage_infant[$booking['id']] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
                $chrage_tourist[$booking['id']] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
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

            if (in_array($booking['bt_id'], $first_bt) == false) {
                $first_bt[] = $booking['bt_id'];
                $pickup_id[$booking['id']][1] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
                // $dropoff_id[$booking['id']][2] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
                if (($booking['pickup_id'] != $booking['hdropoff_id']) || ($booking['outside'] != $booking['outside_dropoff'])) {
                    $check_dropoff[$booking['product_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
                }
            }

            if ($booking['mange_id'] > 0 && (in_array($booking['bomange_id'], $frist_bomange) == false)) {
                $frist_bomange[] = $booking['bomange_id'];
                $reteun = 1;
                $bomange_id[$booking['mange_id']][] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
                $bomange_bo[$reteun][$booking['id']][] = !empty($booking['id']) ? $booking['id'] : 0;
                $check_book[$reteun][] = !empty($booking['id']) ? $booking['id'] : 0;
                $check_mange[$reteun][$booking['product_id']][] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
                $manage_bt[$booking['mange_id']][] = !empty($booking['bt_id']) ? $booking['bt_id'] : 0;
                $manage_bo[$booking['mange_id']][] = !empty($booking['id']) ? $booking['id'] : 0;
                if ($booking['mange_id'] == $manage_id) {
                    $mange_id[$reteun] = !empty($booking['mange_id']) ? $booking['mange_id'] : 0;
                }
            }
        }
?>
        <div class="text-center mb-50">
            <span class="badge-light-purple"><?php echo !empty($car) ? $car : $driver; ?></span>
            <div class="badge-light-orange"><?php echo $manage_product; ?></div>
            <div class="badge-light-sky"><?php echo date('j F Y', strtotime($travel)); ?></div>
        </div>
        <div class="row border-top border-bottom text-center mx-0">
            <div class="col-3 border-right py-1">
                <p class="card-text text-muted mb-0">Booking ที่ไม่ได้เลือก</p>
                <h3 class="font-weight-bolder mb-0" id="booking-false"></h3>
            </div>
            <div class="col-3 border-right py-1">
                <p class="card-text text-muted mb-0">Total ที่ไม่ได้เลือก</p>
                <h3 class="font-weight-bolder mb-0" id="toc-false"></h3>
            </div>
            <div class="col-3 border-right py-1">
                <p class="card-text text-muted mb-0">Booking ที่เลือก</p>
                <h3 class="font-weight-bolder mb-0" id="booking-true"></h3>
            </div>
            <div class="col-3 py-1">
                <p class="card-text text-muted mb-0">Total ที่เลือก</p>
                <h3 class="font-weight-bolder mb-0"><span id="toc-true"></span>/<?php echo $seat; ?></h3>
            </div>
        </div>
        <?php
        if (!empty($programe_id) && $return == 1) {
            for ($a = 0; $a < count($programe_id); $a++) {
        ?>
                <table class="table table-bordered table-striped table-vouchure-t2">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input dt-checkboxes" type="checkbox" id="<?php echo 'checkbo_all' . $programe_id[$a]; ?>" name="<?php echo 'checkbo_all' . $programe_id[$a]; ?>" onclick="checkbox('booking', <?php echo $programe_id[$a]; ?>);">
                                    <label class="custom-control-label" for="<?php echo 'checkbo_all' . $programe_id[$a]; ?>"></label>
                                </div>
                            </th>
                            <th>เวลารับ</th>
                            <th>Category</th>
                            <!-- <th>โซน</th> -->
                            <th>Hotel</th>
                            <th>Name</th>
                            <th class="cell-fit text-center">Total</th>
                            <th class="cell-fit text-center">A</th>
                            <th class="cell-fit text-center">C</th>
                            <th class="cell-fit text-center">INF</th>
                            <th class="cell-fit text-center">FOC</th>
                            <th class="text-nowrap">Agent</th>
                            <th class="text-nowrap">V/C</th>
                            <th>REMARKE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $prod_arr = array();
                        for ($b = 0; $b < count($bo_id); $b++) {
                            if (empty($bomange_bo[1][$bo_id[$b]])) {
                                $id = $bo_id[$b];
                                if ($product[$id] == $programe_id[$a]) {
                                    $text_hotel = (!empty($hotel_name[$id])) ? $hotel_name[$id] : '';
                                    $text_hotel .= (!empty($zone_name[$id])) ? ' (' . $zone_name[$id] . ')</br>' : '</br>';
                        ?>
                                    <tr>
                                        <td class="cell-fit">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input dt-checkboxes checkbox-<?php echo $programe_id[$a]; ?> checkbox-book"
                                                    type="checkbox"
                                                    id="checkbox<?php echo $bt_id[$id]; ?>"
                                                    name="bt_id[]"
                                                    value="<?php echo $bt_id[$id]; ?>"
                                                    onclick="sum_checkbox();">
                                                <label class="custom-control-label" for="checkbox<?php echo $bt_id[$id]; ?>"></label>
                                            </div>
                                        </td>
                                        <td class="cell-fit"><?php echo $start_pickup[$id] != '00:00' ? date('H:i', strtotime($start_pickup[$id])) . ' - ' . date('H:i', strtotime($end_pickup[$id])) : ''; ?></td>
                                        <td class="cell-fit">
                                            <span class="fw-bold">
                                                <?php if (!empty($category_name[$id])) {
                                                    for ($c = 0; $c < count($category_name[$id]); $c++) {
                                                        echo $c == 0 ? $category_name[$id][$c] : ', ' . $category_name[$id][$c];
                                                    }
                                                } ?>
                                            </span>
                                        </td>
                                        <td style="padding: 5px;"><?php echo $text_hotel; ?></td>
                                        <td><span class="fw-bold"><?php echo $cus_name[$id]; ?></span></td>
                                        <td class="text-center" id="toc-bookings<?php echo $bt_id[$id]; ?>"><?php echo !empty($tourist_array[$id]) ? array_sum($tourist_array[$id]) : 0; ?></td>
                                        <td class="text-center" id="adult-bookings<?php echo $bt_id[$id]; ?>"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?></td>
                                        <td class="text-center" id="child-bookings<?php echo $bt_id[$id]; ?>"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?></td>
                                        <td class="text-center" id="infant-bookings<?php echo $bt_id[$id]; ?>"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?></td>
                                        <td class="text-center" id="foc-bookings<?php echo $bt_id[$id]; ?>"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                                        <td><?php echo $agent_name[$id]; ?></td>
                                        <td><span class="fw-bold"><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></span></td>
                                        <td><?php echo $note[$id]; ?></td>
                                    </tr>
                        <?php }
                            }
                        } ?>
                    </tbody>
                </table>
        <?php }
        } ?>
        <!----- Management Car ------>
        <?php if (!empty($mange_id[$return])) { ?>
            <div class="divider divider-dark">
                <div class="divider-text">
                    <h3 class="text-bold mb-0">จัดรถ</h3>
                </div>
            </div>
            <input type="hidden" id="before_bomange" name="before_bomange" value="<?php echo json_encode($bomange_id[$manage_id], true); ?>">
            <table class="table table-bordered table-striped table-vouchure-t2" id="list-group">
                <thead class="table-dark">
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input dt-checkboxes" type="checkbox" id="checkmanage_all" name="checkmanage_all" onclick="checkbox('manage');" checked>
                                <label class="custom-control-label" for="checkmanage_all"></label>
                            </div>
                        </th>
                        <th>เวลารับ</th>
                        <th>Program</th>
                        <th>Hotel</th>
                        <th>Name</th>
                        <th class="cell-fit text-center">Total</th>
                        <th class="cell-fit text-center">A</th>
                        <th class="cell-fit text-center">C</th>
                        <th class="cell-fit text-center">INF</th>
                        <th class="cell-fit text-center">FOC</th>
                        <th class="text-nowrap">Agent</th>
                        <th class="text-nowrap">V/C</th>
                        <th>REMARKE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($c = 0; $c < count($manage_bt[$manage_id]); $c++) {
                        $id = $manage_bo[$manage_id][$c];

                        $text_hotel = (!empty($hotel_name[$id])) ? $hotel_name[$id] : '';
                        $text_hotel .= (!empty($zone_name[$id])) ? ' (' . $zone_name[$id] . ')</br>' : '</br>';
                    ?>
                        <tr>
                            <td class="cell-fit">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input dt-checkboxes checkbox-manage" type="checkbox"
                                        id="checkbox<?php echo $manage_bt[$manage_id][$c]; ?>" name="bomange[]"
                                        data-manage="<?php echo $manage_bt[$manage_id][$c]; ?>"
                                        value="<?php echo $bomange_id[$manage_id][$c]; ?>"
                                        onclick="sum_checkbox();" checked>
                                    <label class="custom-control-label" for="checkbox<?php echo $manage_bt[$manage_id][$c]; ?>"></label>
                                </div>
                            </td>
                            <td class="cell-fit"><?php echo $start_pickup[$id] != '00:00' ? date('H:i', strtotime($start_pickup[$id])) . ' - ' . date('H:i', strtotime($end_pickup[$id])) : ''; ?></td>
                            <td class="cell-fit">
                                <span class="fw-bold">
                                    <?php if (!empty($category_name[$id])) {
                                        for ($b = 0; $b < count($category_name[$id]); $b++) {
                                            echo $b == 0 ? $category_name[$id][$b] : ', ' . $category_name[$id][$b];
                                        }
                                    } ?>
                                </span>
                            </td>
                            <td><?php echo $text_hotel; ?></td>
                            <td><span class="fw-bold"><?php echo $cus_name[$id]; ?></span></td>
                            <td class="text-center" id="toc-manage<?php echo $manage_bt[$manage_id][$c]; ?>"><?php echo !empty($tourist_array[$id]) ? array_sum($tourist_array[$id]) : 0; ?></td>
                            <td class="text-center"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - $chrage_adult[$id] : array_sum($adult[$id]) : 0; ?></td>
                            <td class="text-center"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - $chrage_child[$id] : array_sum($child[$id]) : 0; ?></td>
                            <td class="text-center"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - $chrage_infant[$id] : array_sum($infant[$id]) : 0; ?></td>
                            <td class="text-center"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                            <td><?php echo $agent_name[$id]; ?></td>
                            <td><span class="fw-bold"><?php echo !empty($voucher_no[$id]) ? $voucher_no[$id] : $book_full[$id]; ?></span></td>
                            <td><?php echo $note[$id]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <hr>
        <div class="d-flex justify-content-between">
            <span></span>
            <button type="submit" class="btn btn-primary" onclick="submit_booking_manage(<?php echo $return; ?>, <?php echo $manage_id; ?>);">Submit</button>
        </div>
<?php
    }
} else {
    echo false;
}
?>