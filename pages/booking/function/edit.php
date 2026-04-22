<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Booking.php');

$bookObj = new Booking();

if (isset($_POST['action']) && $_POST['action'] == "edit" && isset($_POST['bo_id']) && $_POST['bo_id'] > 0) {
    $bo_id = !empty($_POST['bo_id']) ? $_POST['bo_id'] : 0;

    // =========================================================
    // 💡 1. โหลดข้อมูล 3 แกน สำหรับเปรียบเทียบ (Concurrency Check)
    // =========================================================
    $original_data = json_decode($_POST['original_data'], true); // สิ่งที่ User เห็นตอนเปิดหน้าเว็บ
    $current_data = $bookObj->get_data($bo_id); // ข้อมูลล่าสุดจริงๆ ในฐานข้อมูล ณ วินาทีนี้
    $log_details = []; // Array สำหรับเก็บประวัติการแก้ไข

    // ฟังก์ชันพระเอก: เปรียบเทียบและเลือกค่าที่ถูกต้อง
    function getActualValue($field_post, $original_val, $current_db_val, $field_name, &$log_details, $is_time = false)
    {
        // ปรับ Format เวลาให้ตรงกันก่อนเทียบ (เช่นจาก DB มาเป็น 08:00:00 แต่ Form ส่ง 08:00)
        if ($is_time && !empty($original_val)) $original_val = date('H:i', strtotime($original_val));
        if ($is_time && !empty($current_db_val)) $current_db_val = date('H:i', strtotime($current_db_val));

        if ((string)$field_post !== (string)$original_val) {
            // 🟢 ผู้ใช้นี้แก้ไขฟิลด์นี้! -> ให้ยึดค่าจาก Form (Post) และจด Log
            if (!empty($field_post) || !empty($original_val)) {
                $log_details[] = "{$field_name}: '{$original_val}' ➡️ '{$field_post}'";
            }
            return $field_post;
        } else {
            // 🔴 ผู้ใช้นี้ไม่ได้แตะฟิลด์นี้ -> ยึดค่าล่าสุดจาก DB (เผื่อมีคนอื่นแก้ไปแล้ว จะได้ไม่ไปทับเขา)
            return $current_db_val;
        }
    }

    // =========================================================
    // 💡 2. รับค่าและคัดกรองข้อมูล Booking Main
    // =========================================================
    $book_status = getActualValue($_POST['book_status'], $original_data[0]['booking_status_id'], $current_data[0]['booking_status_id'], "สถานะ Booking", $log_details);
    $book_type = getActualValue($_POST['booking_type_id'], $original_data[0]['booking_type_id'], $current_data[0]['booking_type_id'], "ประเภท Booking", $log_details);
    $voucher_no = getActualValue($_POST['voucher_no_agent'], $original_data[0]['voucher_no_agent'], $current_data[0]['voucher_no_agent'], "Voucher No.", $log_details);
    $sender = getActualValue($_POST['sender'], $original_data[0]['sender'], $current_data[0]['sender'], "Sender", $log_details);

    $post_agent = ($_POST['agent'] == 'outside' && !empty($_POST['agent_outside'])) ? $bookObj->insert_agent($_POST['agent_outside']) : $_POST['agent'];
    $agent_id = getActualValue($post_agent, $original_data[0]['company_id'], $current_data[0]['company_id'], "Agent", $log_details);

    $cot_id = !empty($_POST['cot_id']) ? $_POST['cot_id'] : 0;
    $cot = !empty($_POST['cot']) ? preg_replace('(,)', '', $_POST['cot']) : 0;
    $cot = getActualValue($cot, $original_data[0]['total_paid'], $current_data[0]['total_paid'], "ยอด COT", $log_details);

    $confirm_id = !empty($_POST['confirm_id']) ? $_POST['confirm_id'] : 0;
    $mange_transfer_id = !empty($_POST['mange_transfer_id']) ? $_POST['mange_transfer_id'] : 0;
    $mange_transfer = !empty($_POST['mange_transfer']) ? $_POST['mange_transfer'] : 0;
    $mange_boat_id = !empty($_POST['mange_boat_id']) ? $_POST['mange_boat_id'] : 0;
    $mange_boat = !empty($_POST['mange_boat']) ? $_POST['mange_boat'] : 0;

    // =========================================================
    // 💡 3. รับค่าและคัดกรองข้อมูล Product (Program)
    // =========================================================
    $bp_id = !empty($_POST['bp_id']) ? $_POST['bp_id'] : 0;
    $travel_date = getActualValue($_POST['travel_date'], $original_data[0]['travel_date'], $current_data[0]['travel_date'], "วันที่เดินทาง", $log_details);
    $before_travel = !empty($_POST['travel']) ? $_POST['travel'] : '0000-00-00';
    $overnight = getActualValue($_POST['overnight'], $original_data[0]['overnight'], $current_data[0]['overnight'], "Overnight", $log_details);
    $product_id = getActualValue($_POST['product_id'], $original_data[0]['product_id'], $current_data[0]['product_id'], "Program", $log_details);
    $prod_id = !empty($_POST['prod_id']) ? $_POST['prod_id'] : 0;
    $bp_note = getActualValue($_POST['bp_note'], $original_data[0]['note'], $current_data[0]['note'], "Program Note", $log_details);

    // [ตัวแปร Array ต่างๆ ของ Rate ยังคงรับค่าตามปกติ เพราะต้องวนลูป Save]
    $category_id = !empty($_POST['category_id']) ? $_POST['category_id'] : 0;
    $adult = !empty($_POST['adult']) ? $_POST['adult'] : [];
    $child = !empty($_POST['child']) ? $_POST['child'] : [];
    $infant = !empty($_POST['infant']) ? $_POST['infant'] : [];
    $foc = !empty($_POST['foc']) ? $_POST['foc'] : [];
    $before_bpr = !empty($_POST['before_bpr']) ? $_POST['before_bpr'] : [];
    $bpr_id = !empty($_POST['bpr_id']) ? $_POST['bpr_id'] : [];
    $prodrid = !empty($_POST['prodrid']) ? $_POST['prodrid'] : [];
    $rates_adult = !empty($_POST['rates_adult']) && $book_type == 1 ? $_POST['rates_adult'] : [];
    $rates_child = !empty($_POST['rates_child']) && $book_type == 1 ? $_POST['rates_child'] : [];
    $rates_infant = !empty($_POST['rates_infant']) && $book_type == 1 ? $_POST['rates_infant'] : [];
    $rates_private = !empty($_POST['rates_private']) && $book_type == 2 ? $_POST['rates_private'] : [];

    // =========================================================
    // 💡 4. รับค่าและคัดกรองข้อมูล Transfer (รับ-ส่ง)
    // =========================================================
    $bt_id = !empty($_POST['bt_id']) ? $_POST['bt_id'] : 0;
    $pickup_type = getActualValue($_POST['pickup_type'], $original_data[0]['pickup_type'], $current_data[0]['pickup_type'], "ประเภทรถรับส่ง", $log_details);
    $transfer_type = getActualValue($_POST['transfer_type'], $original_data[0]['transfer_type'], $current_data[0]['transfer_type'], "ประเภท Transfer", $log_details);
    $start_pickup = getActualValue($_POST['start_pickup'], $original_data[0]['start_pickup'], $current_data[0]['start_pickup'], "เวลารับ", $log_details, true);
    $end_pickup = getActualValue($_POST['end_pickup'], $original_data[0]['end_pickup'], $current_data[0]['end_pickup'], "เวลาสิ้นสุดการรับ", $log_details, true);

    // 🚨 1. แก้ไขให้รับค่าจาก Textarea ให้ตรงกับ HTML
    $post_pickup_address = !empty($_POST['pickup_address']) ? trim($_POST['pickup_address']) : '';
    $post_dropoff_address = !empty($_POST['dropoff_address']) ? trim($_POST['dropoff_address']) : '';

    $pickup_latitude = !empty($_POST['pickup_latitude']) ? $_POST['pickup_latitude'] : '';
    $dropoff_latitude = !empty($_POST['dropoff_latitude']) ? $_POST['dropoff_latitude'] : '';

    // นำชื่อโรงแรมมาเปรียบเทียบว่ามีการเปลี่ยนหรือไม่
    $hotel_pickup_outside = getActualValue($post_pickup_address, $original_data[0]['hotel_pickup_name'], $current_data[0]['hotel_pickup_name'], "โรงแรมที่รับ", $log_details);
    $hotel_dropoff_outside = getActualValue($post_dropoff_address, $original_data[0]['hotel_dropoff_name'], $current_data[0]['hotel_dropoff_name'], "โรงแรมที่ส่ง", $log_details);

    // 🚨 2. ทริคสำคัญ: ดักจับการเปลี่ยนสถานที่
    // ถ้าชื่อโรงแรมที่รับจาก Form "ไม่ตรง" กับของเดิมตอนโหลดหน้าเว็บ = แปลว่า User พิมพ์ใหม่หรือเลือกใหม่!
    // ต้องเซ็ต ID ให้เป็น 0 เพื่อบังคับให้ระบบวิ่งเข้าไปในลูปสร้าง/ค้นหา Hotel ID ใหม่
    $hotel_pickup = 0;
    if ($post_pickup_address == $original_data[0]['hotel_pickup_name']) {
        $hotel_pickup = $current_data[0]['hotel_pickup_id']; // ถ้าไม่ได้พิมพ์ใหม่ ให้ดึง ID ล่าสุดจาก DB เลย
    }

    $hotel_dropoff = 0;
    if ($post_dropoff_address == $original_data[0]['hotel_dropoff_name']) {
        $hotel_dropoff = $current_data[0]['hotel_dropoff_id'];
    }

    $room_no = getActualValue($_POST['room_no'], $original_data[0]['room_no'], $current_data[0]['room_no'], "ห้องพัก", $log_details);
    $trans_note = '';

    // =========================================================
    // 💡 จัดการข้อมูลโซน (ดักจับการเซฟชนกัน)
    // =========================================================
    if (!function_exists('resolveZone')) {
        function resolveZone($zone_raw, $bookObj)
        {
            if (strpos($zone_raw, 'NEW|') === 0) {
                $new_zone_name = substr($zone_raw, 4);
                $existing_zone = $bookObj->get_values('id', 'zones', 'name = "' . addslashes($new_zone_name) . '"', 0);
                if ($existing_zone && $existing_zone['id'] > 0) return $existing_zone['id'];

                $new_zone_id = $bookObj->insert_zone($new_zone_name);
                return $new_zone_id ? $new_zone_id : 0;
            }
            return (int)$zone_raw;
        }
    }

    if (!function_exists('extractLatLng')) {
        function extractLatLng($url)
        {
            if (empty($url)) return ['lat' => '', 'lng' => ''];

            // 1. ลองดึงจากรูปแบบ ?q=8.08,98.28 (รูปแบบที่คุณเจอตอนนี้)
            if (strpos($url, 'q=') !== false) {
                $queryString = parse_url($url, PHP_URL_QUERY);
                parse_str($queryString, $params);
                if (isset($params['q'])) {
                    $coords = explode(',', $params['q']);
                    if (count($coords) >= 2) {
                        return [
                            'lat' => trim($coords[0]),
                            'lng' => trim($coords[1])
                        ];
                    }
                }
            }

            // 2. ลองดึงจากรูปแบบเก่าที่มี /0 (เผื่อบางเคสยังมาแบบเดิม)
            $parts = explode('/0', $url);
            if (isset($parts[1])) {
                $coords = explode(',', $parts[1]);
                if (count($coords) >= 2) {
                    return [
                        'lat' => trim($coords[0]),
                        'lng' => trim($coords[1])
                    ];
                }
            }

            // 3. กรณีส่งมาแค่พิกัดตรงๆ "8.08,98.28" (ไม่มี URL)
            if (strpos($url, ',') !== false && strpos($url, 'http') === false) {
                $coords = explode(',', $url);
                if (count($coords) >= 2) {
                    return [
                        'lat' => trim($coords[0]),
                        'lng' => trim($coords[1])
                    ];
                }
            }

            return ['lat' => '', 'lng' => ''];
        }
    }

    $zone_pickup_post = !empty($_POST['zone_pickup']) ? $_POST['zone_pickup'] : 0;
    $zone_pickup_raw = getActualValue($zone_pickup_post, $original_data[0]['pickup_id'], $current_data[0]['pickup_id'], "โซนที่รับ", $log_details);
    $zone_pickup = resolveZone($zone_pickup_raw, $bookObj);

    $zone_dropoff_post = !empty($_POST['zone_dropoff']) ? $_POST['zone_dropoff'] : (!empty($_POST['zone_pickup']) ? $_POST['zone_pickup'] : 0);
    $zone_dropoff_raw = getActualValue($zone_dropoff_post, $original_data[0]['dropoff_id'], $current_data[0]['dropoff_id'], "โซนที่ส่ง", $log_details);
    $zone_dropoff = resolveZone($zone_dropoff_raw, $bookObj);

    // =========================================================
    // 💡 ระบบเรียนรู้สถานที่และตัดแบ่งข้อความ (สำหรับหน้า Edit)
    // =========================================================
    // 1. จัดการ Pickup Hotel
    $pickup_name_only = $hotel_pickup_outside;
    if ($hotel_pickup == 0) {
        if (!empty($hotel_pickup_outside)) {
            $parts = explode(',', $hotel_pickup_outside, 2);
            $pickup_name_only = trim($parts[0]);
            $pickup_address_only = isset($parts[1]) ? trim($parts[1]) : '';

            $existing_hotel = $bookObj->get_values('id', 'hotel', 'name = "' . addslashes($pickup_name_only) . '"', 0);
            if ($existing_hotel && $existing_hotel['id'] > 0) {
                $hotel_pickup = $existing_hotel['id'];
            } else {
                $coords = extractLatLng($pickup_latitude);
                $new_hotel_id = $bookObj->insert_hotel_with_latlng($pickup_name_only, $pickup_address_only, $zone_pickup, $coords['lat'], $coords['lng']);
                if ($new_hotel_id) {
                    $hotel_pickup = $new_hotel_id;
                }
            }
        }
    }

    // 2. จัดการ Dropoff Hotel
    $dropoff_name_only = $hotel_dropoff_outside;
    if ($hotel_dropoff == 0) {
        if (!empty($hotel_dropoff_outside)) {
            $parts_drop = explode(',', $hotel_dropoff_outside, 2);
            $dropoff_name_only = trim($parts_drop[0]);
            $dropoff_address_only = isset($parts_drop[1]) ? trim($parts_drop[1]) : '';

            $existing_hotel = $bookObj->get_values('id', 'hotel', 'name = "' . addslashes($dropoff_name_only) . '"', 0);
            if ($existing_hotel && $existing_hotel['id'] > 0) {
                $hotel_dropoff = $existing_hotel['id'];
            } else {
                $coords = extractLatLng($dropoff_latitude);
                $new_hotel_id = $bookObj->insert_hotel_with_latlng($dropoff_name_only, $dropoff_address_only, $zone_dropoff, $coords['lat'], $coords['lng']);
                if ($new_hotel_id) {
                    $hotel_dropoff = $new_hotel_id;
                }
            }
        }
    }

    // ส่งค่ากลับเพื่ออัปเดตลงตาราง transfer
    $hotel_pickup_outside = $pickup_name_only;
    $hotel_dropoff_outside = (!empty($dropoff_name_only)) ? $dropoff_name_only : $pickup_name_only;

    // ตั้งค่าราคา (ดึงจาก Post หรือ 0)
    $pickup = !empty($_POST['pickup']) ? $_POST['pickup'] : 0;
    $dropoff = empty($_POST['dropoff']) ? (!empty($_POST['pickup']) ? $_POST['pickup'] : 0) : $_POST['dropoff'];
    // =========================================================

    # --- get value booking form --- #
    $chrage_id = $_POST['chrage_id'];
    $chrage_adult = !empty($_POST['chrage_adult']) ? $_POST['chrage_adult'] : 0;
    $chrage_child = !empty($_POST['chrage_child']) ? $_POST['chrage_child'] : 0;
    $chrage_infant = !empty($_POST['chrage_infant']) ? $_POST['chrage_infant'] : 0;
    $discount = !empty($_POST['discount']) ? $_POST['discount'] : [];
    $before_discount = !empty($_POST['before_discount']) ? $_POST['before_discount'] : [];

    $customers = !empty($_POST['itinerary']) ? $_POST['itinerary'] : '';
    $before_cus_id = !empty($_POST['before_cus_id']) ? $_POST['before_cus_id'] : '';
    $cus_id = array();
    if ($customers) {
        for ($i = 0; $i < count($customers); $i++) {
            $cus_id[] = !empty($customers[$i]['cus_id']) ? $customers[$i]['cus_id'] : 0;
        }
    }
    # --- get value extra chang from --- #
    $extra_charge = !empty($_POST['extra-charge']) ? $_POST['extra-charge'] : '';
    $bec_id = array();
    if ($extra_charge) {
        for ($i = 0; $i < count($extra_charge); $i++) {
            $bec_id[] = !empty($extra_charge[$i]['bec_id']) ? $extra_charge[$i]['bec_id'] : 0;
        }
    }
    $before_bec_id = !empty($_POST['before_bec_id']) ? $_POST['before_bec_id'] : '';

    // =========================================================
    // เริ่มกระบวนการ UPDATE ข้อมูลลง Database
    // =========================================================
    $response = $bookObj->update_data($bo_id, $book_status, $voucher_no, $sender, $agent_id, $book_type, 0);
    $response = ($response > 0 && $response != false) ? $bookObj->update_booking_product($bp_id, $travel_date, $overnight, $bp_note, $product_id) : $response;

    // 💡 บันทึก Log การเปลี่ยนแปลงอย่างละเอียด!
    if (!empty($log_details)) {
        $log_message = implode("<br>", $log_details); // เอาประวัติมารวมกันขึ้นบรรทัดใหม่
        $bookObj->insert_log('แก้ไข Booking', $log_message, $bo_id, 2, date("Y-m-d H:i:s"));
    } else {
        // ถ้าไม่มีอะไรเปลี่ยนเลย ก็บันทึกแค่ว่ากดอัปเดตเฉยๆ
        $bookObj->insert_log('แก้ไข Booking', 'ไม่มีการเปลี่ยนแปลงข้อมูลหลัก', $bo_id, 2, date("Y-m-d H:i:s"));
    }

    for ($i = 0; $i < count($before_bpr); $i++) {
        if (in_array($before_bpr[$i], $bpr_id) == false) {
            $response = $bookObj->delete_booking_rate($before_bpr[$i]);
        }
    }

    for ($i = 0; $i < count($bpr_id); $i++) {
        if (in_array($bpr_id[$i], $before_bpr) == true && $bpr_id[$i] > 0) {
            $response = $bookObj->update_booking_rate(
                $bpr_id[$i],
                !empty($adult[$i]) ? $adult[$i] : 0,
                !empty($child[$i]) ? $child[$i] : 0,
                !empty($infant[$i]) ? $infant[$i] : 0,
                !empty($foc[$i]) ? $foc[$i] : 0,
                !empty($rates_adult[$i]) ? preg_replace('(,)', '', $rates_adult[$i]) : 0,
                !empty($rates_child[$i]) ? preg_replace('(,)', '', $rates_child[$i]) : 0,
                !empty($rates_infant[$i]) ? preg_replace('(,)', '', $rates_infant[$i]) : 0,
                !empty($rates_private[$i]) ? preg_replace('(,)', '', $rates_private[$i]) : 0,
                $category_id[$i],
                !empty($prodrid[$i]) ? $prodrid[$i] : 0,
            );
        } else {
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
            ) : $response;
        }
    }

    # ---- update customer ---- #
    if ($customers) {
        for ($i = 0; $i < count($customers); $i++) {
            if (empty($customers[$i]['cus_id'])) {
                $response = ($response > 0 && $response != false && !empty($customers[$i]['cus_name'])) ?
                    $bookObj->insert_customer(
                        $customers[$i]['cus_name'],
                        $customers[$i]['cus_birth_date'],
                        $customers[$i]['id_card'],
                        $customers[$i]['cus_telephone'],
                        $address = '',
                        !empty($customers[$i]['cus_age']) ? $customers[$i]['cus_age'] : 0,
                        0,
                        $email = '',
                        !empty($customers[$i]['head']) ? $customers[$i]['head'] : 0,
                        $bo_id,
                        !empty($customers[$i]['cus_nationality_id']) ? $customers[$i]['cus_nationality_id'] : 0
                    ) : $response; // insert data customers 
            } elseif ($customers[$i]['cus_id'] > 0 && !empty($customers[$i]['cus_name'])) {
                $response = ($response > 0 && $response != false) ?
                    $bookObj->update_customer(
                        $customers[$i]['cus_id'],
                        $customers[$i]['cus_name'],
                        $customers[$i]['cus_birth_date'],
                        $customers[$i]['id_card'],
                        $customers[$i]['cus_telephone'],
                        !empty($customers[$i]['cus_age']) ? $customers[$i]['cus_age'] : 0,
                        $customers[$i]['head'],
                        !empty($customers[$i]['cus_nationality_id']) ? $customers[$i]['cus_nationality_id'] : 0
                    ) : $response; // update data customers
            }
        }
        if (!empty($before_cus_id)) {
            for ($i = 0; $i < count($before_cus_id); $i++) {
                if (in_array($before_cus_id[$i], $cus_id) == false) {
                    $response = ($response > 0 && $response != false) ? $bookObj->delete_customer($before_cus_id[$i]) : $response; // delete data customers 
                }
            }
        }
    }

    // echo $hotel_pickup . ' | ' . $hotel_dropoff;
    if ($bt_id > 0) {
        $response = ($response != false && $response > 0) ? $bookObj->update_booking_transfer($bt_id, $start_pickup, $end_pickup, $hotel_pickup_outside = '', $hotel_dropoff_outside = '', $room_no, $trans_note, $zone_pickup, $zone_dropoff, $hotel_pickup, !empty($hotel_dropoff) ? $hotel_dropoff : $hotel_pickup, $transfer_type, $pickup_type) : false; // update booking transfer
    } elseif ($bt_id == 0) {
        $response = ($response > 0 && $response != false) ? $bookObj->insert_booking_transfer($start_pickup, $end_pickup, $hotel_pickup_outside = '', $hotel_dropoff_outside = '', $room_no, $trans_note, $zone_pickup, $zone_dropoff, $hotel_pickup, !empty($hotel_dropoff) ? $hotel_dropoff : $hotel_pickup, $transfer_type, $pickup_type, $bp_id) : false; // insert booking transfer
    }

    if ($cot_id == 0 && $cot > 0) {
        $response = ($response > 0 && $response != false) ? $bookObj->insert_booking_paid($cot, $cot > 0 ? 4 : 2, $bo_id) : $response; // insert booking payment (paid)
    } else {
        $response = ($response > 0 && $response != false) ? $bookObj->update_booking_paid($cot_id, $cot, $cot > 0 ? 4 : 2) : $response; // update booking extra charge
    }

    if ($before_bec_id) {
        for ($i = 0; $i < count($before_bec_id); $i++) {
            if (!in_array($before_bec_id[$i], $bec_id)) {
                $response = ($response > 0 && $response != false) ? $bookObj->delete_booking_extra($before_bec_id[$i]) : false; // delete data customers 
            }
        }
    }

    if ($extra_charge) {
        for ($i = 0; $i < count($extra_charge); $i++) {
            $bec_id = !empty($extra_charge[$i]['bec_id']) ? $extra_charge[$i]['bec_id'] : 0;
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

            if ($extra_charge[$i]['bec_id'] == '') {
                $response = ($response > 0 && $response != false) && ($extra > 0 || !empty($extra_name)) && ($extra_type > 0) ? $bookObj->insert_booking_extra($bo_id, $extra, $extra_name, $extra_type, $extra_adult, $extra_rate_adult, $extra_child, $extra_rate_child, $extra_infant, $extra_rate_infant, $extra_num_private, $extra_rate_private) : $response; // insert booking extra charge
            } else {
                $response = ($response > 0 && $response != false) ? $bookObj->update_booking_extra($bec_id, $extra, $extra_name, $extra_type, $extra_adult, $extra_rate_adult, $extra_child, $extra_rate_child, $extra_infant, $extra_rate_infant, $extra_num_private, $extra_rate_private) : $response; // update booking extra charge
            }
        }
    }

    if (($chrage_adult + $chrage_child + $chrage_infant > 0) && $chrage_id == 0 && !empty($bo_id)) {
        $response = $bookObj->insert_chrage($chrage_adult, $chrage_child, $chrage_infant, $bo_id);
    }

    if ($chrage_id > 0) {
        $response = $bookObj->update_chrage($chrage_adult, $chrage_child, $chrage_infant, $chrage_id);
    }

    if (!empty($discount)) {
        for ($i = 0; $i < count($discount); $i++) {
            if (empty($discount[$i]['id'])) {
                $response = $bookObj->insert_discount($discount[$i]['detail'], preg_replace('(,)', '', $discount[$i]['rates']), $bo_id);
            } elseif ($discount[$i]['id'] > 0) {
                $discoun_id[] = $discount[$i]['id'];
                $response = $bookObj->update_discount($discount[$i]['detail'],  preg_replace('(,)', '', $discount[$i]['rates']), $discount[$i]['id']);
            }
        }
        if (!empty($before_discount) && !empty($discoun_id)) {
            for ($i = 0; $i < count($before_discount); $i++) {
                if (in_array($before_discount[$i], $discoun_id) == false) {
                    $response = $bookObj->delete_discount($before_discount[$i]);
                }
            }
        }
    }

    if (($travel_date != $before_travel) || ($product_id != $prod_id)) {
        $response = $bookObj->delete_booking_manage_transfer($mange_transfer, $bt_id, $mange_transfer_id);
        $response = $bookObj->delete_booking_manage_boat($mange_boat, $bo_id, $mange_boat_id);
    }

    $response = ($confirm_id > 0) ? $bookObj->delete_confirm($confirm_id) : $response;

    echo $response != FALSE && $response > 0 ? $response : FALSE;
} else {
    echo $response = FALSE;
}
