<?php
header('Content-Type: application/json; charset=utf-8');

// ใส่ API Key ของคุณที่นี่
$api_key = 'AIzaSyChsX0_8CzEyOGSXshVx8OiYfZibkuQK1g';
$url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . $api_key;

$prompt_text = 'คุณคือผู้เชี่ยวชาญด้านระบบ Booking ทัวร์ หน้าที่ของคุณคือวิเคราะห์ข้อมูลจาก Voucher หรือข้อความอย่างละเอียด ดึงข้อมูลออกมาตอบกลับเป็น JSON Format เท่านั้น โดยใช้โครงสร้างนี้:
{
    "data": {
        "customerReference": "เลขที่ Voucher, Booking No, หรือ Reference No",
        "agent_name_text": "ชื่อเอเจนซี่ บริษัททัวร์",
        "sender_name": "ชื่อผู้ส่ง, Sales, Admin หรือ Issued by ที่ปรากฏใน Voucher",
        "program_name": "ชื่อทัวร์หรือโปรแกรม บังคับแปลงเป็นภาษาอังกฤษและตัดคำว่า Tour ออก",
        "passengers": [
            {
                "category": "Thai หรือ Foreign",
                "adult": 0,
                "rate_adult": 0,
                "child": 0,
                "rate_child": 0,
                "infant": 0,
                "rate_infant": 0
            }
        ],
        "passenger_names": ["ชื่อลูกค้า"],
        "passenger_telephone_number": "เบอร์โทรศัพท์",
        "travel_date": "YYYY-MM-DD",
        "start_pickup": "HH:MM",
        "end_pickup": "HH:MM",
        "pickup_address": "ชื่อสถานที่รับ",
        "pickup_zone": "โซนสถานที่รับ",
        "dropoff_address": "ชื่อสถานที่ส่ง",
        "room_no": "หมายเลขห้องพัก",
        "price_cot": 0,
        "extra_charges": [
            {
                "item_name": "ชื่อรายการ (เช่น dinner, ค่ากระเป๋า) ห้ามแปลภาษา",
                "type": "1=Per Pax, 2=Total",
                "adult": 0,
                "rate_adult": 0,
                "child": 0,
                "rate_child": 0,
                "infant": 0,
                "rate_infant": 0,
                "privates": 0,
                "rate_private": 0
            }
        ],
        "additional_comments": "หมายเหตุเพิ่มเติม"
    }
}
**ห้ามตอบข้อความอื่นนอกเหนือจาก JSON เด็ดขาด**';
// $prompt_text = 'คุณคือผู้เชี่ยวชาญด้านระบบ Booking ทัวร์ หน้าที่ของคุณคือวิเคราะห์ข้อมูลจาก Voucher หรือข้อความอย่างละเอียด ดึงข้อมูลออกมาตอบกลับเป็น JSON Format เท่านั้น โดยใช้โครงสร้างนี้:
// {
//     "data": {
//         "customerReference": "เลขที่ Voucher, Booking No, หรือ Reference No",
//         "agent_name_text": "ชื่อเอเจนซี่ บริษัททัวร์",
//         "sender_name": "ชื่อผู้ส่ง, Sales, Admin หรือ Issued by ที่ปรากฏใน Voucher (เช่น Admin Cream)",
//         "program_name": "ชื่อทัวร์หรือโปรแกรม บังคับแปลงเป็นภาษาอังกฤษและตัดคำว่า Tour ออก",
//         "passengers": [
//             {
//                 "category": "Thai หรือ Foreign",
//                 "adult": 0,
//                 "rate_adult": 0,
//                 "child": 0,
//                 "rate_child": 0,
//                 "infant": 0,
//                 "rate_infant": 0
//             }
//         ],
//         "passenger_names": ["ชื่อลูกค้า"],
//         "passenger_telephone_number": "เบอร์โทรศัพท์",
//         "travel_date": "YYYY-MM-DD",
//         "start_pickup": "HH:MM",
//         "end_pickup": "HH:MM",
//         "pickup_address": "ชื่อสถานที่รับ",
//         "pickup_zone": "โซนสถานที่รับ",
//         "dropoff_address": "ชื่อสถานที่ส่ง",
//         "room_no": "หมายเลขห้องพัก",
//         "price_cot": 0,
//         "extra_charges": [
//             {
//                 "item_name": "ชื่อรายการค่าใช้จ่ายเพิ่มเติม (เช่น ค่ากระเป๋า, Extra Charge)",
//                 "type": "1=Per Pax (มีตัวคูณจำนวนคน), 2=Total (ยอดเหมา)",
//                 "quantity": 1,
//                 "rate": 0,
//                 "total": 0
//             }
//         ],
//         "additional_comments": "หมายเหตุเพิ่มเติม"
//     }
// }
// **ห้ามตอบข้อความอื่นนอกเหนือจาก JSON เด็ดขาด**';


$contents = [];

// ตรวจสอบว่ามีการแนบไฟล์รูปภาพมาหรือไม่
if (isset($_FILES['voucher_image']) && $_FILES['voucher_image']['error'] == UPLOAD_ERR_OK) {
    $image_data = file_get_contents($_FILES['voucher_image']['tmp_name']);
    $base64_image = base64_encode($image_data);
    $mime_type = $_FILES['voucher_image']['type'];

    $contents[] = [
        "parts" => [
            ["text" => $prompt_text],
            [
                "inline_data" => [
                    "mime_type" => $mime_type,
                    "data" => $base64_image
                ]
            ]
        ]
    ];
}
// หรือถ้าเป็นการ Copy ข้อความมาวาง
else if (isset($_POST['voucher_text']) && !empty($_POST['voucher_text'])) {
    $contents[] = [
        "parts" => [
            ["text" => $prompt_text . "\n\nข้อมูลข้อความ:\n" . $_POST['voucher_text']]
        ]
    ];
} else {
    echo json_encode(['status' => 'error', 'message' => 'No image or text provided.']);
    exit;
}

$data = [
    "contents" => $contents,
    "generationConfig" => [
        "temperature" => 0.1, // ตั้งค่าให้ต่ำเพื่อให้ข้อมูลมีความเป็น Fact มากที่สุด
        "response_mime_type" => "application/json" // บังคับโครงสร้าง JSON 100% (ฟีเจอร์เด่นของตระกูล Flash)
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // เปิดใช้งานบรรทัดนี้หากรันบน Localhost แล้วติดปัญหา SSL

$response = curl_exec($ch);
curl_close($ch);

// คืนค่ากลับไปให้ Javascript
echo $response;
