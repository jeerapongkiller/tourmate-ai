<?php
$id = $_GET['id'];
$bookings = $bookObj->get_data($id);
# --- get value booking --- #
if ($bookings[0]['id'] > 0) {
    $total_sum = 0;
    $total_product = 0;
    $bo_id = !empty($bookings[0]['id']) ? $bookings[0]['id'] : 0;
    $book_full = !empty($bookings[0]['book_full']) ? $bookings[0]['book_full'] : '';
    $book_date = !empty(!empty($bookings[0]['booking_date'])) ? $bookings[0]['booking_date'] : '0000-00-00';
    $book_time = !empty(!empty($bookings[0]['booking_time'])) ? $bookings[0]['booking_time'] : '00:00:00';
    $voucher_no_agent = !empty($bookings[0]['voucher_no_agent']) ? $bookings[0]['voucher_no_agent'] : '';
    $discount = !empty($bookings[0]['discount']) ? $bookings[0]['discount'] : 0;
    $booker_name = !empty($bookings[0]['booker_id']) ? $bookings[0]['booker_fname'] . ' ' . $bookings[0]['booker_lname'] : '';
    $sender = !empty($bookings[0]['sender']) ? $bookings[0]['sender'] : '';
    $agent_id = !empty($bookings[0]['company_id']) ? $bookings[0]['company_id'] : 0;
    $agent_name = !empty($bookings[0]['comp_name']) ? $bookings[0]['comp_name'] : '';
    $agent_license = !empty($bookings[0]['tat_license']) ? $bookings[0]['tat_license'] : '';
    $agent_telephone = !empty($bookings[0]['comp_telephone']) ? $bookings[0]['comp_telephone'] : '';
    $agent_address = !empty($bookings[0]['comp_address']) ? $bookings[0]['comp_address'] : '';
    $book_type = !empty(!empty($bookings[0]['booking_type_id'])) ? $bookings[0]['booking_type_id'] : 0;
    $book_type_name = !empty(!empty($bookings[0]['booking_type_id'])) ? $bookings[0]['booktye_name'] : '';
    $book_status = !empty(!empty($bookings[0]['booking_status_id'])) ? $bookings[0]['booking_status_id'] : 0;
    $book_status_name = !empty(!empty($bookings[0]['booksta_name'])) ? $bookings[0]['booksta_name'] : 0;
    $confirm_id = !empty($bookings[0]['confirm_id']) ? $bookings[0]['confirm_id'] : 0;
    $created_at = date('j F Y', strtotime($bookings[0]['created_at']));
    $guests_type = $agent_id == 0 ? 'Supplier' : 'Agent';
    # --- chrage --- #
    $chrage_id = !empty($bookings[0]['chrage_id']) ? $bookings[0]['chrage_id'] : 0;
    $chrage_adult = !empty($bookings[0]['chrage_adult']) ? $bookings[0]['chrage_adult'] : 0;
    $chrage_child = !empty($bookings[0]['chrage_child']) ? $bookings[0]['chrage_child'] : 0;
    $chrage_infant = !empty($bookings[0]['chrage_infant']) ? $bookings[0]['chrage_infant'] : 0;
    $chrage_total = $bookings[0]['chrage_adult'] + $bookings[0]['chrage_child'] + $bookings[0]['chrage_infant'];
    # --- get value manage boat, transfer and confirm --- #
    $mange_transfer_id = !empty($bookings[0]['bmt_id']) ? $bookings[0]['bmt_id'] : 0;
    $mange_transfer = !empty($bookings[0]['manget_id']) ? $bookings[0]['manget_id'] : 0;
    $mange_boat_id = !empty($bookings[0]['bmb_id']) ? $bookings[0]['bmb_id'] : 0;
    $mange_boat = !empty($bookings[0]['mangeb_id']) ? $bookings[0]['mangeb_id'] : 0;
    $confirm_id = !empty($bookings[0]['confirm_id']) ? $bookings[0]['confirm_id'] : 0;
    # --- get value booking products --- #
    $bp_id = !empty($bookings[0]['bp_id']) ? $bookings[0]['bp_id'] : 0;
    $product_id = !empty($bookings[0]['product_id']) ? $bookings[0]['product_id'] : 0;
    $product_name = !empty($bookings[0]['product_name']) ? $bookings[0]['product_name'] : 0;
    $travel_date = !empty($bookings[0]['travel_date']) ? $bookings[0]['travel_date'] : '0000-00-00';
    $overnight = !empty($bookings[0]['overnight']) ? $bookings[0]['overnight'] : '0000-00-00';
    $note = !empty($bookings[0]['note']) ? $bookings[0]['note'] : '';
    $private_type = !empty($bookings[0]['bp_private_type']) ? $bookings[0]['bp_private_type'] : 0;
    $booking_day = date('j F Y', strtotime($bookings[0]['created_at']));
    # --- get value booking transfer --- #
    $bt_id = !empty($bookings[0]['bt_id']) ? $bookings[0]['bt_id'] : 0;
    $start_pickup = !empty($bookings[0]['start_pickup']) ? $bookings[0]['start_pickup'] : '00:00:00';
    $end_pickup = !empty($bookings[0]['end_pickup']) ? $bookings[0]['end_pickup'] : '00:00:00';
    $hotel_pickup_id = !empty($bookings[0]['hotel_pickup_id']) ? $bookings[0]['hotel_pickup_id'] : 0;
    $hotel_pickup_name = !empty($bookings[0]['hotel_pickup_name']) ? $bookings[0]['hotel_pickup_name'] : '';
    $hotel_dropoff_id = !empty($bookings[0]['hotel_dropoff_id']) ? $bookings[0]['hotel_dropoff_id'] : 0;
    $hotel_dropoff_name = !empty($bookings[0]['hotel_dropoff_name']) ? $bookings[0]['hotel_dropoff_name'] : '';
    // $hotel_pickup_outside = !empty($bookings[0]['hotel_pickup']) ? $bookings[0]['hotel_pickup'] : '';
    // $hotel_dropoff_outside = !empty($bookings[0]['hotel_dropoff']) ? $bookings[0]['hotel_dropoff'] : '';
    $room_no = !empty($bookings[0]['room_no']) ? $bookings[0]['room_no'] : '';
    $bt_note = !empty($bookings[0]['bt_note']) ? $bookings[0]['bt_note'] : '';
    $transfer_type = !empty($bookings[0]['transfer_type']) ? $bookings[0]['transfer_type'] : 0;
    $pickup_type = !empty($bookings[0]['pickup_type']) ? $bookings[0]['pickup_type'] : 0;
    $pickup_id = !empty($bookings[0]['pickup_id']) ? $bookings[0]['pickup_id'] : 0;
    $pickup_name = !empty($bookings[0]['pickup_name']) ? $bookings[0]['pickup_name'] : '';
    $dropoff_id = !empty($bookings[0]['dropoff_id']) ? $bookings[0]['dropoff_id'] : 0;
    $dropoff_name = !empty($bookings[0]['dropoff_name']) ? $bookings[0]['dropoff_name'] : '';
    # --- get value booking transfer rate !transfer_type == 1! --- #
    $btr_id = !empty($bookings[0]['btr_id']) ? $bookings[0]['btr_id'] : 0;
    # --- get value in array !foreach! --- #
    $first_cus = array();
    $first_btr = array();
    $first_ext = array();
    $first_pay = array();
    $first_dis = array();
    $first_bpr = array();
    foreach ($bookings as $booking) {
        # --- get value customers --- #
        if ((in_array($booking['cus_id'], $first_cus) == false) && !empty($booking['cus_id'])) {
            $first_cus[] = $booking['cus_id'];
            $customers['cus_id'][] = !empty($booking['cus_id']) ? $booking['cus_id'] : 0;
            $customers['cus_age'][] = !empty($booking['cus_age']) ? $booking['cus_age'] : 0;
            $customers['name'][] = !empty($booking['cus_name']) ? $booking['cus_name'] : '';
            $customers['birth_date'][] = !empty($booking['birth_date']) ? $booking['birth_date'] : '0000-00-00';
            $customers['id_card'][] = !empty($booking['id_card']) ? $booking['id_card'] : '';
            $customers['telephone'][] = !empty($booking['telephone']) ? $booking['telephone'] : '';
            $customers['address'][] = !empty($booking['cus_address']) ? $booking['cus_address'] : '';
            $customers['head'][] = !empty($booking['cus_head']) ? $booking['cus_head'] : 0;
            $customers['nationality'][] = !empty($booking['nationality_id']) ? $booking['nationality_id'] : 0;
            $customers['cus_type'][] = !empty($booking['cus_type']) ? $booking['cus_type'] : 0;
            $customers['nation_name'][] = !empty($booking['nation_name']) ? $booking['nation_name'] : '';
        }
        # --- get value booking Extra charge --- #
        if ((in_array($booking['bec_id'], $first_ext) == false) && !empty($booking['bec_id'])) {
            $first_ext[] = $booking['bec_id'];
            $extar['bec_id'][] = !empty($booking['bec_id']) ? $booking['bec_id'] : 0;
            $extar['bec_name'][] = !empty($booking['bec_name']) ? $booking['bec_name'] : '';
            $extar['extra_id'][] = !empty($booking['extra_id']) ? $booking['extra_id'] : 0;
            $extar['extra_name'][] = !empty($booking['extra_name']) ? $booking['extra_name'] : '';
            $extar['bec_type'][] = !empty($booking['bec_type']) ? $booking['bec_type'] : 0;
            $extar['bec_adult'][] = !empty($booking['bec_adult']) ? $booking['bec_adult'] : 0;
            $extar['bec_child'][] = !empty($booking['bec_child']) ? $booking['bec_child'] : 0;
            $extar['bec_infant'][] = !empty($booking['bec_infant']) ? $booking['bec_infant'] : 0;
            $extar['bec_privates'][] = !empty($booking['bec_privates']) ? $booking['bec_privates'] : 0;
            $extar['bec_rate_adult'][] = !empty($booking['bec_rate_adult']) ? $booking['bec_rate_adult'] : 0;
            $extar['bec_rate_child'][] = !empty($booking['bec_rate_child']) ? $booking['bec_rate_child'] : 0;
            $extar['bec_rate_infant'][] = !empty($booking['bec_rate_infant']) ? $booking['bec_rate_infant'] : 0;
            $extar['bec_rate_private'][] = !empty($booking['bec_rate_private']) ? $booking['bec_rate_private'] : 0;
            $extar['bec_rate_total'][] = $booking['bec_type'] > 0 ? $booking['bec_type'] == 1 ? (($booking['bec_adult'] * $booking['bec_rate_adult']) + ($booking['bec_child'] * $booking['bec_rate_child']) + ($booking['bec_infant'] * $booking['bec_rate_infant'])) : ($booking['bec_privates'] * $booking['bec_rate_private']) : 0;
            $total_sum = $booking['bec_type'] > 0 ? $booking['bec_type'] == 1 ? $total_sum + (($booking['bec_adult'] * $booking['bec_rate_adult']) + ($booking['bec_child'] * $booking['bec_rate_child']) + ($booking['bec_infant'] * $booking['bec_rate_infant'])) : $total_sum + ($booking['bec_privates'] * $booking['bec_rate_private']) : $total_sum;
        }
        # --- get value booking payment --- #
        if ((in_array($booking['bopa_id'], $first_pay) == false) && !empty($booking['bopa_id'])) {
            # --- in array get value booking payment --- #
            $first_pay[] = $booking['bopa_id'];
            $payments['bopa_id'][] = !empty($booking['bopa_id']) ? $booking['bopa_id'] : 0;
            if ($booking['bopay_id'] == 4) {
                $cot_id = !empty($booking['bopa_id']) ? $booking['bopa_id'] : 0;
                $cot = !empty($booking['total_paid']) ? $booking['total_paid'] : 0;
            }
        }
        # --- get value booking --- #
        if (in_array($booking['discount_id'], $first_dis) == false) {
            $first_dis[] = $booking['discount_id'];

            $discount_id[] = !empty($booking['discount_id']) ? $booking['discount_id'] : 0;
            $discount_detail[] = !empty($booking['discount_detail']) ? $booking['discount_detail'] : '';
            $discount_rates[] = !empty($booking['discount_rates']) ? $booking['discount_rates'] : 0;
        }
        # --- get value booking product rates --- #
        if ((in_array($booking['bpr_id'], $first_bpr) == false) && !empty($booking['bpr_id'])) {
            $first_bpr[] = $booking['bpr_id'];
            $rate_total[] = ($booking['adult'] * $booking['rates_adult']) + ($booking['child'] * $booking['rates_child']) + ($booking['infant'] * $booking['rates_infant']);
            $rates_private[] = $booking['rates_private'];
            $bpr_id[] = $booking['bpr_id'];
            $categorys[] = $booking['category_id'];
            $all_tourist = $booking['adult'] + $booking['child'] + $booking['infant'];
        }
        $total_sum = (!empty($first_bpr)) ? ($book_type > 0) ? ($book_type == 1) ?  array_sum($rate_total) + $total_product + $total_sum : array_sum($rates_private) + $total_product + $total_sum : $total_product + $total_sum : 0;
        $total_product = (!empty($first_bpr)) ? ($book_type > 0) ? ($book_type == 1) ?  array_sum($rate_total) + $total_product : array_sum($rates_private) + $total_product : $total_product : 0;
        $product_total = ($adult * $rate_adult) + ($child * $rate_child) + ($infant * $rate_infant);
        $payment_total = !empty($cot) ? $cot : 0;
        $extar_total = !empty($extar['bec_rate_total']) ? array_sum($extar['bec_rate_total']) : 0;
        $payment_name = !empty($booking['bopay_name']) ? $booking['bopay_name'] : '';
    }
}
if (!empty($bookings[0]['bp_id'])) {
?>

    <div id="div-inc-print" style="background-color: #fff;">
        <div class="content-body text-black">
            <div class="p-3">

                <style>
                    .header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }

                    .logo img {
                        height: 55px;
                    }

                    .company-info {
                        text-align: right;
                        font-size: 13px;
                        line-height: 18px;
                    }

                    .top-box {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 25px;
                    }

                    .voucher-box {
                        background: #00A6D6;
                        color: #fff;
                        padding: 10px 20px;
                        font-size: 22px;
                        font-weight: bold;
                    }

                    .voucher-number {
                        background: #E0F7FF;
                        padding: 10px 25px;
                        font-size: 22px;
                        color: #000;
                        font-weight: bold;
                        margin-left: 5px;
                    }

                    .booking-status {
                        background: #00C0EA;
                        color: #fff;
                        padding: 14px 25px;
                        font-size: 18px;
                        font-weight: bold;
                        border-radius: 4px;
                    }

                    h4.title {
                        margin-top: 25px;
                        margin-bottom: 5px;
                        font-size: 15px;
                        font-weight: bold;
                    }

                    .section {
                        margin-top: 20px;
                    }

                    .table-box {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 10px;
                    }

                    .table-box th {
                        background: #001F54;
                        color: #fff;
                        padding: 10px;
                        font-size: 13px;
                        border: 1px solid #fff;
                    }

                    .table-box td {
                        padding: 10px;
                        border: 1px solid #ccc;
                        font-size: 13px;
                    }

                    .location-box th {
                        background: #001F54;
                        color: #fff;
                        padding: 10px;
                        text-align: left;
                        border: none;
                    }

                    .location-box td {
                        padding: 8px 0;
                        border: none;
                        font-size: 14px;
                    }

                    .payment-section {
                        width: 100%;
                        margin-top: 25px;
                        border-top: 2px solid #000;
                        padding-top: 20px;
                    }

                    .pay-table td {
                        padding: 8px 0;
                        font-size: 14px;
                    }

                    .payment-method-box {
                        background: #00C0EA;
                        color: #fff;
                        padding: 20px;
                        width: 180px;
                        text-align: center;
                        font-size: 22px;
                        font-weight: bold;
                        border-radius: 4px;
                    }

                    .footer-info {
                        margin-top: 20px;
                        font-size: 14px;
                    }


                    .payment-wrapper {
                        display: flex;
                        justify-content: space-between;
                        align-items: flex-start;
                        margin-top: 25px;
                        border-top: 2px solid #000;
                        padding-top: 20px;
                    }

                    .payment-left {
                        width: 60%;
                    }

                    .payment-right {
                        width: 35%;
                        text-align: center;
                    }

                    .payment-right-title {
                        font-weight: bold;
                        margin-bottom: 10px;
                        font-size: 14px;
                    }

                    .pay-table {
                        width: 100%;
                        border-collapse: collapse;
                        font-size: 14px;
                    }

                    .pay-table td {
                        padding: 8px 0;
                    }

                    .payment-method-box {
                        background: #00C0EA;
                        color: #fff;
                        padding: 25px 20px;
                        width: 220px;
                        font-size: 22px;
                        font-weight: bold;
                        border-radius: 3px;
                        margin: 0 auto;
                    }
                </style>
                <!-- </head> -->

                <div style="color: #000;">

                    <!-- HEADER -->
                    <div class="header">
                        <div class="logo">
                            <img src="app-assets/images/logo/logo-500.png" height="300">
                        </div>

                        <div class="company-info">
                            <?php echo $main_document; ?>
                        </div>
                    </div>

                    <!-- VOUCHER TOP BAR -->
                    <div class="top-box">
                        <div style="display: flex; align-items: center;">
                            <div class="voucher-box">VOUCHER NO.</div>
                            <div class="voucher-number"><?php echo $book_full; ?></div>
                        </div>
                        <div class="booking-status">Booking <?php echo ($book_status == 3 || $book_status == 4) ? 'Canceled' : 'Comfirmation'; ?></div>
                    </div>

                    <!-- CUSTOMER DETAILS -->
                    <h4 class="title">◎ CUSTOMER DETAILS</h4>
                    <div style="margin-left: 15px; line-height: 20px; font-size: 15px;">
                        <?php if (!empty($customers)) {
                            for ($i = 0; $i < count($customers['cus_id']); $i++) {
                                switch ($customers['cus_age'][$i]) {
                                    case '1':
                                        $age_name = 'Adult';
                                        break;
                                    case '2':
                                        $age_name = 'Child';
                                        break;
                                    case '3':
                                        $age_name = 'Infant';
                                        break;
                                    case '4':
                                        $age_name = 'FOC';
                                        break;
                                    default:
                                        $age_name = '';
                                        break;
                                }
                                echo (!empty($age_name)) ? '<b>' . $age_name . '</b> ' : '';
                                echo 'Name : <b>' . ' ' . $customers['name'][$i] . '</b>';
                                echo ($customers['birth_date'][$i] != '0000-00-00') ? ' Birth Date : <b>' . $customers['birth_date'][$i] . '</b>' : '';
                                echo (!empty($customers['telephone'][$i])) ? ' Telephone : <b>' . $customers['telephone'][$i] . '</b>' : '';
                                echo (!empty($customers['nation_name'][$i])) ? ' Nationality : <b>' . $customers['nation_name'][$i] . '</b>' : '';
                                echo '<br>';
                            }
                        } ?>
                    </div>

                    <!-- PACKAGE -->
                    <!-- <h4 class="title">◎ PACKAGE :</h4>
                    <div style="margin-left: 15px; font-size: 15px;"><?php echo $product_name; ?> | <?php echo date("H:i", strtotime($playtime)); ?></div> -->

                    <!-- TRIP TABLE -->
                    <table class="table-box" style="margin-top: 15px;">
                        <tr>
                            <th>TRIP</th>
                            <th>DATE</th>
                            <th>AD</th>
                            <th>CHD</th>
                            <th>INF</th>
                            <th>FOC</th>
                            <th>Cancel</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td><b><?php echo $product_name; ?></b></td>
                            <td><b><?php echo date('j F Y', strtotime($travel_date)); ?></b></td>
                            <td><b><?php echo $booking['adult'] > 0 ? $booking['adult'] : '-'; ?></b></td>
                            <td><b><?php echo $booking['child'] > 0 ? $booking['child'] : '-'; ?></b></td>
                            <td><b><?php echo $booking['infant'] > 0 ? $booking['infant'] : '-'; ?></b></td>
                            <td><b><?php echo $booking['foc'] > 0 ? $booking['foc'] : '-'; ?></b></td>
                            <td><b><?php echo $chrage_total; ?></b></td>
                            <td><b><?php echo $all_tourist; ?></b></td>
                        </tr>
                    </table>

                    <!-- LOCATION -->
                    <table class="table-box">
                        <tr>
                            <th colspan="2" class="table-header">LOCATION</th>

                        </tr>
                        <tr>
                            <td>
                                <b>PICK UP :</b>
                                <?php
                                echo !empty($hotel_pickup_name) ? $hotel_pickup_name : '';
                                echo !empty($pickup_name) ? ' (' . $pickup_name . ')' : '';
                                ?>
                                <br>
                                <b>PICK UP TIME : </b> <?php echo date("H:i", strtotime($start_pickup)) . ' - ' . date("H:i", strtotime($end_pickup)); ?><br>
                                <b>ROOM NO. : </b> <?php echo !empty($room_no) ? $room_no : '-'; ?>
                            </td>
                            <td><b>DROP OFF :</b>
                                <?php
                                echo !empty($hotel_dropoff_name) ? $hotel_dropoff_name : '';
                                echo !empty($dropoff_name) ? ' (' . $dropoff_name . ')' : '';
                                ?>
                            </td>
                        </tr>
                    </table>

                    <!-- SPECIAL REQUEST + SERVICES + DISCOUNT -->
                    <div class="section">
                        <h4 class="title">◎ SPECIAL REQUEST</h4>
                        <div class="row" style="color: red; font-size: 15px; margin-left: 10px;">
                            <div class="col-6">
                                <?php echo !empty($note) ? nl2br(htmlspecialchars($note)) : '-'; ?>
                            </div>
                            <!-- <div class="col-6">
                                <?php if (!empty($discount_id)) {
                                    for ($i = 0; $i < count($discount_id); $i++) {
                                        echo ($i > 0) ? '</br>' : '';
                                        echo !empty($discount_detail[$i]) ? nl2br(htmlspecialchars($discount_detail[$i])) : '-';
                                    }
                                } ?>
                            </div> -->
                        </div>

                        <h4 class="title" style="margin-top: 20px;">◎ Extra Charge</h4>
                        <table class="table-box" style="margin-top: 15px;">
                            <tr>
                                <th>Extra Charge</th>
                                <th>AD</th>
                                <th>CHD</th>
                                <th>INF</th>
                                <th>Private</th>
                            </tr>
                            <?php if (!empty($extar)) {
                                for ($i = 0; $i < count($extar['bec_id']); $i++) {
                            ?>
                                    <tr>
                                        <td><b>
                                                <?php
                                                echo !empty($extar['extra_id'][$i]) ? $extar['extra_name'][$i] : $extar['bec_name'][$i];
                                                echo $extar['bec_type'][$i] == 1 ? ' (Join)' : ' (Private)';
                                                ?>
                                            </b>
                                        </td>
                                        <td><b><?php echo ($extar['bec_type'][$i] == 1 && $extar['bec_adult'][$i] > 0) ? !empty($extar['bec_rate_adult'][$i]) ? $extar['bec_adult'][$i] . ' X ' . $extar['bec_rate_adult'][$i] : $extar['bec_adult'][$i] : '-'; ?></b></td>
                                        <td><b><?php echo ($extar['bec_type'][$i] == 1 && $extar['bec_child'][$i] > 0) ? !empty($extar['bec_rate_child'][$i]) ? $extar['bec_child'][$i] . ' X ' . $extar['bec_rate_child'][$i] : $extar['bec_child'][$i] : '-'; ?></b></td>
                                        <td><b><?php echo ($extar['bec_type'][$i] == 1 && $extar['bec_infant'][$i] > 0) ? !empty($extar['bec_rate_infant'][$i]) ? $extar['bec_infant'][$i] . ' X ' . $extar['bec_rate_infant'][$i] : $extar['bec_infant'][$i] : '-'; ?></b></td>
                                        <td><b><?php echo ($extar['bec_type'][$i] == 2 && $extar['bec_privates'][$i] > 0) ? !empty($extar['bec_rate_private'][$i]) ? $extar['bec_privates'][$i] . ' X ' . $extar['bec_rate_private'][$i] : $extar['bec_privates'][$i] : '-'; ?></b></td>
                                    </tr>
                            <?php }
                            } ?>
                        </table>

                        <h4 class="title" style="margin-top: 20px;">◎ DISCOUNT</h4>
                        <table class="table-box" style="margin-top: 15px;">
                            <tr>
                                <th>Detail</th>
                                <th>Discount</th>
                            </tr>
                            <?php if (!empty($discount_id)) {
                                for ($i = 0; $i < count($discount_id); $i++) {
                            ?>
                                    <tr>
                                        <td><b><?php echo $discount_detail[$i]; ?></b></td>
                                        <td><b><?php echo number_format($discount_rates[$i], 2); ?></b></td>
                                    </tr>
                            <?php }
                            } ?>
                        </table>
                    </div>

                    <div class="payment-wrapper">

                        <!-- LEFT SIDE -->
                        <div class="payment-left">
                            <h4 class="title">◎ PAYMENT DETAILS</h4>
                            <table class="pay-table">
                                <tr>
                                    <td width="60%">PAYMENT TOTAL</td>
                                    <td class="text-info" style="text-align: right;"><b><?php echo !empty($rate_total) ? number_format(array_sum($rate_total), 2) : '-'; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Extra Charge</td>
                                    <td class="text-warning" style="text-align: right;"><b><?php echo !empty($extar_total) ? number_format($extar_total, 2) : '-'; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td class="text-danger" style="text-align: right;"><b><?php echo !empty($discount_id) ? number_format(array_sum($discount_rates), 2) : '-'; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Cash on tour</td>
                                    <td class="text-warning" style="text-align: right;"><b><?php echo !empty($cot) ? number_format($cot, 2) : '-'; ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>OUT STANDING BALANCE</b></td>
                                    <td class="text-success" style="text-align: right;"><b>
                                            <?php
                                            $amount = !empty($rate_total) ? array_sum($rate_total) : 0;
                                            $amount += !empty($extar_total) ? $extar_total : 0;
                                            $amount -= !empty($discount_id) ? array_sum($discount_rates) : 0;
                                            $amount -= !empty($cot) ? $cot : 0;
                                            echo number_format($amount, 2); ?>
                                        </b>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- RIGHT SIDE -->
                        <div class="payment-right">
                            <div class="payment-right-title">PAYMENT METHODS</div>
                            <div class="payment-method-box">Outstanding</div>

                            <div style="margin-top: 25px; font-size: 14px; text-align: left;">
                                <b>CREATED BY &nbsp;&nbsp; <?php echo $booker_name; ?></b><br>
                                <b>CONFIRM BY &nbsp;&nbsp; <?php echo $booker_name; ?></b><br>
                                <b><?php echo $created_at; ?></b>
                            </div>
                        </div>

                    </div>

                </div>

                <p class="text-center"><?php echo $booker_name . ' ' . $created_at; ?></p>
            </div>

        </div>
        <input type="hidden" id="booking_full" value="<?php echo $book_full; ?>">
    </div>

    <!-- <div id="voucher">
        <h3>Voucher No. 88459</h3>
        <p>Customer: John Doe</p>
        <p>Date: 25 Sep 2025</p>
    </div>

    <button id="btnCopy">📋 Copy Voucher</button> -->
<?php  } ?>