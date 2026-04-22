<?php
header('Content-Type: application/json');

$place_id = $_GET['place_id'] ?? '';
$apiKey = "AIzaSyAv5rK30TR1q4_KRpArIITSsEl6H0s9YlY"; // ใส่ API Key ของคุณที่นี่

if (empty($place_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing Place ID']);
    exit;
}

// เรียกใช้ Google Geocoding API หรือ Places Details API
$url = "https://maps.googleapis.com/maps/api/geocode/json?place_id=" . urlencode($place_id) . "&key=" . $apiKey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// ส่งผลลัพธ์กลับไปยัง JavaScript
echo $response;
