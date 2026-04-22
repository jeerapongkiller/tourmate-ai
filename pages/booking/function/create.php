<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Booking.php');

$bookObj = new Booking();
$response = FALSE;

if (isset($_POST['action']) && $_POST['action'] == "create") {
    # --- get value booking form --- #
    $quick = !empty($_POST['quick']) ? $_POST['quick'] : 0;
    $book_status = !empty($_POST['book_status']) ? $_POST['book_status'] : 0;
    $book_type = !empty($_POST['booking_type']) ? $_POST['booking_type'] : 0;
    $book_date = $_POST['book_date'] != "" ? $_POST['book_date'] : '0000-00-00';
    $book_time = $_POST['book_time'] != "" ? $_POST['book_time'] : '00:00:00';
    $agent = !empty($_POST['agent']) ? $_POST['agent'] : 0;
    $voucher_no = !empty($_POST['voucher_no']) ? $_POST['voucher_no'] : '';
    $sender = !empty($_POST['sender']) ? $_POST['sender'] : '';
    $discount = !empty($_POST['discount']) ? preg_replace('(,)', '', $_POST['discount']) : 0;
    $cot = !empty($_POST['cot']) ? preg_replace('(,)', '', $_POST['cot']) : 0;
    # --- get value booking no. --- #
    if (!empty($book_date)) {
        $book_no = $bookObj->create_booking_no($book_date);
        $bo_title = $book_no['bo_title'] != "" ? $book_no['bo_title'] : '';
        $bo_date = $book_no['bo_date'] != "" ? $book_no['bo_date'] : '';
        $bo_year = $book_no['bo_year'] != "" ? $book_no['bo_year'] : 0;
        $bo_year_th = $book_no['bo_year_th'] != "" ? $book_no['bo_year_th'] : 0;
        $bo_month = $book_no['bo_month'] != "" ? $book_no['bo_month'] : 0;
        $bo_no = $book_no['bo_no'] != "" ? $book_no['bo_no'] : 0;
        $bo_full = $book_no['bo_full'] != "" ? $book_no['bo_full'] : '';
    }
    # --- get value booking product form --- #
    $travel_date = !empty($_POST['travel_date']) ? $_POST['travel_date'] : '0000-00-00';
    $overnight = !empty($_POST['overnight']) ? $_POST['overnight'] : '0000-00-00';
    $product_id = !empty($_POST['product_id']) ? $_POST['product_id'] : 0;
    $category_id = !empty($_POST['category_id']) ? $_POST['category_id'] : [];
    $adult = !empty($_POST['adult']) ? $_POST['adult'] : [];
    $child = !empty($_POST['child']) ? $_POST['child'] : [];
    $infant = !empty($_POST['infant']) ? $_POST['infant'] : [];
    $foc = !empty($_POST['foc']) ? $_POST['foc'] : [];
    $bp_note = !empty($_POST['bp_note']) ? $_POST['bp_note'] : '';
    # --- get value booking product rate form --- #
    $prodrid = !empty($_POST['prodrid']) ? $_POST['prodrid'] : [];
    $rates_adult = !empty($_POST['rates_adult']) && $book_type == 1 ? $_POST['rates_adult'] : [];
    $rates_child = !empty($_POST['rates_child']) && $book_type == 1 ? $_POST['rates_child'] : [];
    $rates_infant = !empty($_POST['rates_infant']) && $book_type == 1 ? $_POST['rates_infant'] : [];
    $rates_private = !empty($_POST['rates_private']) && $book_type == 2 ? $_POST['rates_private'] : [];
    # --- get value customer form --- #
    $cus_name = !empty($_POST['cus_name']) ? $_POST['cus_name'] : '';

    # --- get value Transfer from --- #
    $pickup_type = !empty($_POST['pickup_type']) ? $_POST['pickup_type'] : 0;
    $transfer_type = !empty($_POST['transfer_type']) ? $_POST['transfer_type'] : 0;
    $start_pickup = !empty($_POST['start_pickup']) ? $_POST['start_pickup'] : '00:00:00';
    $end_pickup = !empty($_POST['end_pickup']) ? $_POST['end_pickup'] : '00:00:00';
    $hotel_pickup = !empty($_POST['hotel_pickup']) ? $_POST['hotel_pickup'] : 0; // Dropdown เดิม
    // $zone_pickup = !empty($_POST['zone_pickup']) ? $_POST['zone_pickup'] : 0;

    // =========================================================
    // 💡 ฟังก์ชันสร้าง Zone ใหม่เข้าระบบอัตโนมัติ
    // =========================================================
    function resolveZone($zone_raw, $bookObj)
    {
        if (strpos($zone_raw, 'NEW|') === 0) {
            // ตัดคำว่า NEW| ออก เหลือแค่ชื่อ Zone
            $new_zone_name = substr($zone_raw, 4);
            // ตรวจสอบใน DB อีกรอบเพื่อความชัวร์ว่าไม่ซ้ำ
            $existing_zone = $bookObj->get_values('id', 'zones', 'name = "' . addslashes($new_zone_name) . '"', 0);
            if ($existing_zone && $existing_zone['id'] > 0) {
                return $existing_zone['id'];
            }
            // ถ้าไม่มีให้ Insert ใหม่ (ต้องไปสร้างฟังก์ชัน insert_zone ใน Booking.php)
            $new_zone_id = $bookObj->insert_zone($new_zone_name);
            return $new_zone_id ? $new_zone_id : 0;
        }
        return (int)$zone_raw;
    }

    $zone_pickup_raw = !empty($_POST['zone_pickup']) ? $_POST['zone_pickup'] : 0;
    $zone_pickup = resolveZone($zone_pickup_raw, $bookObj); // ได้ ID กลับมาเสมอ

    $zone_dropoff_raw = !empty($_POST['zone_dropoff']) ? $_POST['zone_dropoff'] : 0;
    $zone_dropoff = resolveZone($zone_dropoff_raw, $bookObj); // ได้ ID กลับมาเสมอ
    // =========================================================

    $pickup = !empty($_POST['pickup']) ? $_POST['pickup'] : 0;

    // 💡 สิ่งที่เพิ่มใหม่: รับค่าจาก Textarea และ พิกัด ที่ระบบ Suggestion ส่งมา
    $hotel_outside = !empty($_POST['pickup_address']) ? $_POST['pickup_address'] : (!empty($_POST['hotel_outside']) ? $_POST['hotel_outside'] : '');
    $pickup_latitude = !empty($_POST['pickup_latitude']) ? $_POST['pickup_latitude'] : ''; // มาแบบ URL http://...0Lat,Lng

    // $zone_dropoff = !empty($_POST['zone_dropoff']) ? $_POST['zone_dropoff'] : 0;
    $hotel_dropoff = empty($_POST['hotel_dropoff']) ? (!empty($_POST['hotel_pickup']) ? $_POST['hotel_pickup'] : 0) : $_POST['hotel_dropoff'];
    $dropoff = empty($_POST['dropoff']) ? (!empty($_POST['pickup']) ? $_POST['pickup'] : 0) : $_POST['dropoff'];

    // 💡 สิ่งที่เพิ่มใหม่: รับค่า Dropoff
    $dropoff_outside = !empty($_POST['dropoff_address']) ? $_POST['dropoff_address'] : (!empty($_POST['dropoff_outside']) ? $_POST['dropoff_outside'] : '');
    $dropoff_latitude = !empty($_POST['dropoff_latitude']) ? $_POST['dropoff_latitude'] : '';

    $room_no = !empty($_POST['room_no']) ? $_POST['room_no'] : '';
    $trans_note = !empty($_POST['trans_note']) ? $_POST['trans_note'] : '';
    $include = !empty($_POST['include']) ? $_POST['include'] : 0;

    # --- get value extra chang from --- #
    $extra_charge = !empty($_POST['extra-charge']) ? $_POST['extra-charge'] : '';

    # --- check confirm agent --- #
    if (($agent != 'outside' && $agent > 0) && ($travel_date != '0000-00-00')) {
        $confirm_id = $bookObj->get_values('id', 'confirm_agent', 'agent_id = ' . $agent . ' AND travel_date	= "' . $travel_date . '"', 0);
        if ($confirm_id != false && $confirm_id['id'] > 0) {
            $response = $bookObj->delete_confirm($confirm_id['id']);
        }
    }

    # --- chack insert agent --- #
    if ($agent == 'outside' && !empty($_POST['agent_outside'])) {
        $agent_out_id = $bookObj->insert_agent($_POST['agent_outside']);
    }

    $bo_id = $bookObj->insert_data($book_status, $book_type, $book_date, $book_time, ($agent == 'outside' && !empty($_POST['agent_outside'])) ? $agent_out_id : $agent, $voucher_no, $sender, $discount); // insert bookings

    $response = ($bo_id != FALSE && $bo_id > 0) ? $bookObj->insert_booking_no($bo_id, $bo_date, $bo_year, $bo_year_th, $bo_month, $bo_no, $bo_full) : FALSE; // insert bookings no

    $response = ($bo_id != FALSE && $bo_id > 0) ? $bookObj->insert_log('สร้าง Booking', 'หมายเลข booking no. ' . $bo_full, $bo_id, 1, date("Y-m-d H:i:s")) : FALSE; // insert log booking

    $bp_id = ($response != FALSE && $response > 0) ? $bookObj->insert_booking_product($travel_date, $overnight, $bp_note, $bo_id, $product_id) : FALSE; // insert booking products

    for ($i = 0; $i < count($category_id); $i++) {
        $response = ($bp_id > 0 && $bp_id != FALSE) ? $bookObj->insert_booking_rate(
            !empty($adult[$i]) ? $adult[$i] : 0,
            !empty($child[$i]) ? $child[$i] : 0,
            !empty($infant[$i]) ? $infant[$i] : 0,
            !empty($foc[$i]) ? $foc[$i] : 0,
            !empty($rates_adult[$i]) ? preg_replace('(,)', '', $rates_adult[$i]) : 0,
            !empty($rates_child[$i]) ? preg_replace('(,)', '', $rates_child[$i]) : 0,
            !empty($rates_infant[$i]) ? preg_replace('(,)', '', $rates_infant[$i]) : 0,
            !empty($rates_private[$i]) ? preg_replace('(,)', '', $rates_private[$i]) : 0,
            $category_id[$i],
            $bp_id,
            !empty($prodrid[$i]) ? $prodrid[$i] : 0,
        ) : $response; // insert booking products rate
    }

    if (!empty($_POST['customers']['cus_age'])) {
        for ($i = 0; $i < count($_POST['customers']['cus_age']); $i++) {
            $response = ($response > 0 && $response != false) && (!empty($_POST['customers']['cus_name'][$i])) ?
                $bookObj->insert_customer(
                    $_POST['customers']['cus_name'][$i],
                    $_POST['customers']['cus_birth_date'][$i],
                    $_POST['customers']['id_card'][$i],
                    $i == 0 ? $_POST['telephone'] : '',
                    $address = '',
                    !empty($_POST['customers']['cus_age'][$i]) ? $_POST['customers']['cus_age'][$i] : 0,
                    0,
                    $email = '',
                    $i == 0 ? 1 : 0,
                    $bo_id,
                    !empty($_POST['customers']['cus_nationality_id'][$i]) ? $_POST['customers']['cus_nationality_id'][$i] : 0
                ) : $response;
        }
    }

    // =========================================================
    // 💡 ระบบเรียนรู้สถานที่อัตโนมัติ (แยกชื่อและที่อยู่)
    // =========================================================
    $final_pickup_id = $hotel_pickup;
    $final_dropoff_id = $hotel_dropoff;

    function extractLatLng($url)
    {
        if (empty($url)) return ['lat' => '', 'lng' => ''];
        $parts = explode('/0', $url);
        if (isset($parts[1])) {
            $coords = explode(',', $parts[1]);
            if (count($coords) == 2) {
                return ['lat' => trim($coords[0]), 'lng' => trim($coords[1])];
            }
        }
        return ['lat' => '', 'lng' => ''];
    }

    // 1. จัดการ Pickup
    $pickup_name_only = $hotel_outside; // ตั้งค่าเริ่มต้นเป็นข้อความเต็มเผื่อไว้
    if ($hotel_pickup == 'outside' || $hotel_pickup == 0) {
        if (!empty($hotel_outside)) {
            // ✂️ ตัดแบ่งข้อความด้วยลูกน้ำ (,) ตัวแรก
            $parts = explode(',', $hotel_outside, 2);
            $pickup_name_only = trim($parts[0]); // ชื่อสถานที่ (Thap Lamu Pier)
            $pickup_address_only = isset($parts[1]) ? trim($parts[1]) : ''; // ที่อยู่ (ท้ายเหมือง...)

            $existing_hotel = $bookObj->get_values('id', 'hotel', 'name = "' . addslashes($pickup_name_only) . '"', 0);

            if ($existing_hotel && $existing_hotel['id'] > 0) {
                $final_pickup_id = $existing_hotel['id'];
            } else {
                $coords = extractLatLng($pickup_latitude);
                $lat = $coords['lat'];
                $lng = $coords['lng'];

                // 💡 ส่ง $pickup_address_only ไปบันทึกด้วย
                $new_hotel_id = $bookObj->insert_hotel_with_latlng($pickup_name_only, $pickup_address_only, $zone_pickup, $lat, $lng);
                if ($new_hotel_id) {
                    $final_pickup_id = $new_hotel_id;
                }
            }
        }
    }

    // 2. จัดการ Dropoff
    $dropoff_name_only = $dropoff_outside;
    if ($hotel_dropoff == 'outside' || $hotel_dropoff == 0) {
        if (!empty($dropoff_outside)) {
            // ✂️ ตัดแบ่งข้อความ Dropoff
            $parts_drop = explode(',', $dropoff_outside, 2);
            $dropoff_name_only = trim($parts_drop[0]);
            $dropoff_address_only = isset($parts_drop[1]) ? trim($parts_drop[1]) : '';

            $existing_hotel = $bookObj->get_values('id', 'hotel', 'name = "' . addslashes($dropoff_name_only) . '"', 0);
            if ($existing_hotel && $existing_hotel['id'] > 0) {
                $final_dropoff_id = $existing_hotel['id'];
            } else {
                $coords = extractLatLng($dropoff_latitude);
                $lat = $coords['lat'];
                $lng = $coords['lng'];

                // 💡 ส่งที่อยู่ไปบันทึกด้วย
                $new_hotel_id = $bookObj->insert_hotel_with_latlng($dropoff_name_only, $dropoff_address_only, $zone_dropoff, $lat, $lng);
                if ($new_hotel_id) {
                    $final_dropoff_id = $new_hotel_id;
                }
            }
        }
    }
    // =========================================================

    $response = ($response > 0 && $response != false) ? $bookObj->insert_booking_transfer(
        $start_pickup,
        $end_pickup,
        '', // 💡 $pickup_name_only บันทึกลง transfer เฉพาะชื่อสั้นๆ
        '', // 💡 (!empty($dropoff_name_only)) ? $dropoff_name_only : $pickup_name_only บันทึกลง transfer เฉพาะชื่อสั้นๆ
        $room_no,
        '',
        $zone_pickup,
        ($zone_dropoff > 0) ? $zone_dropoff : $zone_pickup,
        $final_pickup_id,
        $final_dropoff_id,
        $transfer_type,
        $pickup_type,
        $bp_id
    ) : $response;

    $response = $bookObj->insert_booking_paid($cot, $cot > 0 ? 4 : 2, $bo_id); // insert booking payment (paid)

    if (!empty($extra_charge) && count($extra_charge) > 0 && $bo_id > 0) {
        for ($i = 0; $i < count($extra_charge); $i++) {
            $extra = !empty($extra_charge[$i]['extra_charge']) ? $extra_charge[$i]['extra_charge'] : 0;
            $extra_name = !empty($extra_charge[$i]['extc_name']) ? $extra_charge[$i]['extc_name'] : '';
            $extra_type = !empty($extra_charge[$i]['extra_type']) ? $extra_charge[$i]['extra_type'] : 0;
            $extra_adult = !empty($extra_charge[$i]['extra_adult']) ? $extra_charge[$i]['extra_adult'] : 0;
            $extra_rate_adult = !empty($extra_charge[$i]['extra_rate_adult']) ? preg_replace('(,)', '', $extra_charge[$i]['extra_rate_adult']) : 0;
            $extra_child = !empty($extra_charge[$i]['extra_child']) ? $extra_charge[$i]['extra_child'] : 0;
            $extra_rate_child = !empty($extra_charge[$i]['extra_rate_child']) ? preg_replace('(,)', '', $extra_charge[$i]['extra_rate_child']) : 0;
            $extra_infant = !empty($extra_charge[$i]['extra_infant']) ? $extra_charge[$i]['extra_infant'] : 0;
            $extra_rate_infant = !empty($extra_charge[$i]['extra_rate_infant']) ? preg_replace('(,)', '', $extra_charge[$i]['extra_rate_infant']) : 0;
            $extra_num_private = !empty($extra_charge[$i]['extra_num_private']) ? $extra_charge[$i]['extra_num_private'] : 0;
            $extra_rate_private = !empty($extra_charge[$i]['extra_rate_private']) ? preg_replace('(,)', '', $extra_charge[$i]['extra_rate_private']) : 0;

            $response = ($response > 0 && $response != false) && ($extra > 0 || !empty($extra_name)) && ($extra_type > 0) ? $bookObj->insert_booking_extra($bo_id, $extra, $extra_name, $extra_type, $extra_adult, $extra_rate_adult, $extra_child, $extra_rate_child, $extra_infant, $extra_rate_infant, $extra_num_private, $extra_rate_private) : $response;
        }
    }

    echo $response != FALSE && $response > 0 ? $bo_id : FALSE;
} else {
    echo $response = FALSE;
}
