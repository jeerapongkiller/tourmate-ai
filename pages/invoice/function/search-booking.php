<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Invoice.php';

$invObj = new Invoice();

if (isset($_POST['action']) && $_POST['action'] == "search" && isset($_POST['page']) && isset($_POST['search_agent']) && $_POST['search_agent'] > 0) {
    // get value from ajax
    $search_travel = $_POST['search_travel'] != "" ? $_POST['search_travel'] : '0000-00-00';
    $search_agent = $_POST['search_agent'] != "" ? $_POST['search_agent'] : 0;
    $page = $_POST['page'] != "" ? $_POST['page'] : '';
    $bo_id = !empty($_POST['bo_id']) ? json_decode($_POST['bo_id'], true) : 0;

    $first_book = array();
    $first_bpr = array();
    $first_disc = array();
    $first_ext = array();
    $bookings = $invObj->showlistbookings($page, $search_agent, $search_travel);
    # --- Check products --- #
    if (!empty($bookings)) {
        foreach ($bookings as $booking) {
            # --- get value booking --- #
            if (in_array($booking['id'], $first_book) == false) {
                $first_book[] = $booking['id'];
                $array['bo_id'][] = !empty($booking['id']) ? $booking['id'] : 0;
                $array['travel_date'][] = !empty($booking['travel_date']) ? date('j F Y', strtotime($booking['travel_date'])) : '0000-00-00';
                $array['product_name'][] = !empty($booking['product_name']) ? $booking['product_name'] : '';
                $array['product_type'][] = !empty($booking['pg_type_name']) ? $booking['pg_type_name'] : '';
                $array['cus_name'][] = !empty($booking['cus_name']) ? $booking['cus_name'] : '';
                $array['voucher_no'][] = !empty($booking['voucher_no_agent']) ? $booking['voucher_no_agent'] : $booking['book_full'];
                $array['category_name'][] = !empty($booking['category_name']) ? $booking['category_name'] : '';
                $array['note'][] = !empty($booking['bp_note']) ? $booking['bp_note'] : '';
                $array['hotel_name'][] = !empty($booking['hotel_name']) ? $booking['hotel_name'] : $booking['outside'];
                $array['cot'][] = !empty($booking['cot']) ? $booking['cot'] : 0;

                $array['chrage_id'][] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
                $array['chrage_adult'][] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
                $array['chrage_child'][] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
                $array['chrage_infant'][] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
            }

            # --- get value discount --- #
            if (in_array($booking['discount_id'], $first_disc) == false && !empty($booking['discount_id'])) {
                $first_disc[] = $booking['discount_id'];
                $arr_discount[$booking['id']]['id'][] = !empty($booking['discount_id']) ? $booking['discount_id'] : 0;
                $arr_discount[$booking['id']]['detail'][] = !empty($booking['discount_detail']) ? $booking['discount_detail'] : '';
                $arr_discount[$booking['id']]['rates'][] = !empty($booking['discount_rates']) ? $booking['discount_rates'] : 0;
            }

            # --- get value rates --- #
            if ((in_array($booking['bpr_id'], $first_bpr) == false) && !empty($booking['bpr_id'])) {
                $first_bpr[] = $booking['bpr_id'];
                $bpr_id[$booking['id']][] = !empty($booking['bpr_id']) ? $booking['bpr_id'] : 0;
                $category_id[$booking['id']][] = !empty($booking['category_id']) ? $booking['category_id'] : 0;
                $category_name[$booking['id']][] = !empty($booking['category_name']) ? $booking['category_name'] : 0;
                $category_cus[$booking['id']][] = !empty($booking['category_cus']) ? $booking['category_cus'] : 0;
                $adult[$booking['id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
                $child[$booking['id']][] = !empty($booking['child']) ? $booking['child'] : 0;
                $infant[$booking['id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
                $foc[$booking['id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;

                $arr_rates[$booking['id']]['id'][] = !empty($booking['bpr_id']) ? $booking['bpr_id'] : 0;
                $arr_rates[$booking['id']]['customer'][] = !empty($booking['category_cus']) ? $booking['category_cus'] : 0;
                $arr_rates[$booking['id']]['category_name'][] = !empty($booking['category_name']) ? $booking['category_name'] : 0;
                $arr_rates[$booking['id']]['adult'][] = !empty($booking['adult']) ? $booking['adult'] : 0;
                $arr_rates[$booking['id']]['child'][] = !empty($booking['child']) ? $booking['child'] : 0;
                $arr_rates[$booking['id']]['infant'][] = !empty($booking['infant']) ? $booking['infant'] : 0;
                $arr_rates[$booking['id']]['foc'][] = !empty($booking['foc']) ? $booking['foc'] : 0;
                $arr_rates[$booking['id']]['rate_adult'][] = !empty($booking['rates_adult']) && $booking['adult'] > 0 ? $booking['rates_adult'] : 0;
                $arr_rates[$booking['id']]['rate_child'][] = !empty($booking['rates_child']) && $booking['child'] > 0 ? $booking['rates_child'] : 0;
                $arr_rates[$booking['id']]['total'][] = ($booking['booktye_id'] == 1) ? ($booking['adult'] * $booking['rates_adult']) + ($booking['child'] * $booking['rates_child']) : $booking['rates_private'];
            }

            # --- get value booking Extra charge --- #
            if ((in_array($booking['bec_id'], $first_ext) == false) && !empty($booking['bec_id'])) {
                $first_ext[] = $booking['bec_id'];
                $arr_extar[$booking['id']]['id'][] = !empty($booking['bec_id']) ? $booking['bec_id'] : 0;
                $arr_extar[$booking['id']]['name'][] = !empty($booking['bec_name']) ? $booking['bec_name'] : '';
                $arr_extar[$booking['id']]['extra_id'][] = !empty($booking['extra_id']) ? $booking['extra_id'] : 0;
                $arr_extar[$booking['id']]['extra_name'][] = !empty($booking['extra_name']) ? $booking['extra_name'] : '';
                $arr_extar[$booking['id']]['type'][] = !empty($booking['bec_type']) ? $booking['bec_type'] : 0;
                $arr_extar[$booking['id']]['adult'][] = !empty($booking['bec_adult']) ? $booking['bec_adult'] : 0;
                $arr_extar[$booking['id']]['child'][] = !empty($booking['bec_child']) ? $booking['bec_child'] : 0;
                $arr_extar[$booking['id']]['infant'][] = !empty($booking['bec_infant']) ? $booking['bec_infant'] : 0;
                $arr_extar[$booking['id']]['privates'][] = !empty($booking['bec_privates']) ? $booking['bec_privates'] : 0;
                $arr_extar[$booking['id']]['rate_adult'][] = !empty($booking['bec_rate_adult']) ? $booking['bec_rate_adult'] : 0;
                $arr_extar[$booking['id']]['rate_child'][] = !empty($booking['bec_rate_child']) ? $booking['bec_rate_child'] : 0;
                $arr_extar[$booking['id']]['rate_infant'][] = !empty($booking['bec_rate_infant']) ? $booking['bec_rate_infant'] : 0;
                $arr_extar[$booking['id']]['rate_private'][] = !empty($booking['bec_rate_private']) ? $booking['bec_rate_private'] : 0;
                $arr_extar[$booking['id']]['rate_total'][] = $booking['bec_type'] > 0 ?
                    $booking['bec_type'] == 1 ?
                    (($booking['bec_adult'] * $booking['bec_rate_adult']) + ($booking['bec_child'] * $booking['bec_rate_child']) + ($booking['bec_infant'] * $booking['bec_rate_infant'])) : ($booking['bec_privates'] * $booking['bec_rate_private']) :
                    0;
            }

            $company['id'] = !empty($booking['comp_id']) ? $booking['comp_id'] : 0;
            $company['name'] = !empty($booking['comp_name']) ? $booking['comp_name'] : '-';
            $company['name_account'] = !empty($booking['name_account']) ? $booking['name_account'] : '-';
            $company['comp_telephone'] = !empty($booking['comp_telephone']) ? $booking['comp_telephone'] : '-';
            $company['tat_license'] = !empty($booking['tat_license']) ? $booking['tat_license'] : '-';
            $company['address_account'] = !empty($booking['address_account']) ? $booking['address_account'] : '-';
        }
    }
    // echo !empty($array) ? json_encode($array) : false;

    if (!empty($array['bo_id'])) {
        echo "<textarea id='array_company' name='array_company' hidden>" . json_encode($company, true) . "</textarea>";
        echo "<textarea id='array_booking' name='array_booking' hidden>" . json_encode($array, true) . "</textarea>";
        echo "<textarea id='array_rates' name='array_rates' hidden>" . json_encode($arr_rates, true) . "</textarea>";
        echo (!empty($arr_extar)) ? "<textarea id='array_extar' name='array_extar' hidden>" . json_encode($arr_extar, true) . "</textarea>" : "<textarea id='array_extar' name='array_extar' hidden></textarea>";
        echo (!empty($arr_discount)) ? "<textarea id='array_discount' name='array_discount' hidden>" . json_encode($arr_discount, true) . "</textarea>" : "<textarea id='array_discount' name='array_discount' hidden></textarea>";
        for ($i = 0; $i < count($array['bo_id']); $i++) {
            $id = $array['bo_id'][$i];
            $checked = (!empty($bo_id) && in_array($array['bo_id'][$i], $bo_id) == true) ? 'checked' : '';
?>
            <tr>
                <td class="cell-fit">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input dt-checkboxes" type="checkbox" id="checkbox<?php echo $array['bo_id'][$i]; ?>" name="booking[]" value="<?php echo $array['bo_id'][$i]; ?>" <?php echo $checked; ?> />
                        <label class="custom-control-label" for="checkbox<?php echo $array['bo_id'][$i]; ?>"></label>
                    </div>
                </td>
                <td class="text-nowrap cell-fit"><?php echo $array['travel_date'][$i]; ?></td>
                <td><?php echo $array['cus_name'][$i]; ?></td>
                <td class="text-nowrap"><?php echo $array['product_name'][$i]; ?></td>
                <td><?php echo $array['voucher_no'][$i]; ?></td>
                <td><?php echo $array['hotel_name'][$i]; ?></td>
                <td><?php echo $array['category_name'][$i]; ?></td>
                <td class="cell-fit"><?php echo !empty($adult[$id]) ? ($array['chrage_adult'][$i]) ? array_sum($adult[$id]) - $array['chrage_adult'][$i] : array_sum($adult[$id]) : 0; ?></td>
                <td class="cell-fit"><?php echo !empty($child[$id]) ? ($array['chrage_child'][$i]) ? array_sum($child[$id]) - $array['chrage_child'][$i] : array_sum($child[$id]) : 0; ?></td>
                <td class="cell-fit"><?php echo !empty($infant[$id]) ? ($array['chrage_infant'][$i]) ? array_sum($infant[$id]) - $array['chrage_infant'][$i] : array_sum($infant[$id]) : 0; ?></td>
                <td class="cell-fit"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></td>
                <td><?php echo $array['note'][$i]; ?></td>
            </tr>
<?php
        }
    }
} else {
    echo $response = false;
}
