<?php
include_once('../../../config/env.php');
include_once('../../../controllers/Booking.php');

$q = isset($_GET['q']) ? $_GET['q'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
$apiKey = "AIzaSyAv5rK30TR1q4_KRpArIITSsEl6H0s9YlY"; // **เปลี่ยนเป็น Key จริงของคุณ**

if (empty($q)) {
    exit;
}

// เรียกใช้งาน Controller
$bookObj = new Booking();
$hotels = $bookObj->search_hotel_by_keyword($q);

$found_addresses = [];

// ========================================================
// 1. นำผลลัพธ์จาก DB มาแสดง
// ========================================================
if (!empty($hotels)) {
    foreach ($hotels as $row) {
        $name = htmlspecialchars($row['name']);
        $address = htmlspecialchars($row['address']);
        $lat = htmlspecialchars($row['lat']);
        $lng = htmlspecialchars($row['lng']);
        $zone_name = htmlspecialchars($row['zone_name']);

        $full_display = $name;
        if (!empty($address)) {
            $full_display .= ", " . $address;
        }

        echo "<div class='suggest-item' style='cursor:pointer; padding:10px; border-bottom:1px solid #eee;' 
              onclick=\"selectAddress('$full_display', '$lat', '$lng', '$type', '$zone_name')\">
                📍 <strong>$name ,</strong> <small class='text-muted'>$address</small> 
                <span class='badge badge-light text-success ml-1'>มีในระบบ</span>
              </div>";

        $found_addresses[] = $name; // เก็บชื่อไว้กรองข้อมูลจาก Google
    }
}

// ========================================================
// 2. ค้นหาจาก Google Maps (เมื่อข้อมูลใน DB ไม่พอ)
// ========================================================
if (count($found_addresses) < 5) {
    $google_url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?input=" . urlencode($q) . "&key=$apiKey&language=th&components=country:th";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $google_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['status']) && $data['status'] == 'OK') {
        foreach ($data['predictions'] as $place) {

            // 💡 1. ดึงชื่อและที่อยู่แยกกันจาก structured_formatting ที่ Google เตรียมไว้ให้
            $main_text = htmlspecialchars($place['structured_formatting']['main_text']); // ได้ 'Kata Sea Breeze Resort'
            $secondary_text = isset($place['structured_formatting']['secondary_text']) ? htmlspecialchars($place['structured_formatting']['secondary_text']) : ''; // ได้ 'ถนน กะตะ...'

            // 💡 2. บังคับใส่ลูกน้ำ (,) เพื่อให้ระบบ edit/create.php ของเราตัดคำได้ชัวร์ 100%
            $description = $main_text;
            if (!empty($secondary_text)) {
                $description .= ", " . $secondary_text;
            }

            $place_id = $place['place_id'];

            $is_duplicate = false;
            foreach ($found_addresses as $saved_name) {
                // เช็คซ้ำโดยใช้ main_text เป็นหลัก เพื่อความแม่นยำ
                if (strpos($description, $saved_name) !== false || strpos($main_text, $saved_name) !== false) {
                    $is_duplicate = true;
                    break;
                }
            }

            if (!$is_duplicate) {
                // 💡 3. ปรับ UI ให้เน้นชื่อสถานที่ตัวหนา (main_text) และที่อยู่ตัวบาง (secondary_text) ดูสวยงามขึ้น
                echo "<div class='suggest-item google-item' style='cursor:pointer; padding:10px; border-bottom:1px solid #eee; color: #007bff;' 
                      onclick=\"getGoogleDetail('$place_id', '$type', '$description')\">
                        🔍 <strong>$main_text</strong> <small class='text-secondary'>$secondary_text (Google Maps)</small>
                      </div>";
            }
        }
    }
}
