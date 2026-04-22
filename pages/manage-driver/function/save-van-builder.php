<?php
// header('Content-Type: application/json; charset=utf-8');
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['action']) && $data['action'] == "assign_van") {
    $travel_date = $data['travel_date'];
    $car_id = $data['car_id'];
    $driver_id = $data['driver_id'];
    $manage_id = $data['manage_id']; // 0 = เปิดรถใหม่
    $bookings = $data['bookings'];

    $passed_list = [];
    $failed_list = [];

    // 1. ด่านตรวจคนแย่งจัดรถ (Concurrency Validation)
    foreach ($bookings as $b) {
        $verify = $manageObj->verify_booking_for_assignment($b['bt_id'], $b['updated_at']);
        if ($verify['status'] === true) {
            $passed_list[] = $b;
        } else {
            $failed_list[] = ['vc' => $verify['vc'], 'reason' => $verify['reason']];
        }
    }

    // 2. บันทึกข้อมูลที่ผ่านการตรวจสอบ
    if (count($passed_list) > 0) {

        // ถ้าไม่เคยสร้างรถ ให้สร้างขึ้นมา 1 คัน
        if ($manage_id == 0) {
            $seat = 12; // หรือรับค่า Max Seat จาก Frontend มาใส่ก็ได้
            $note = "จัดรถผ่าน Logistics Center";
            $manage_id = $manageObj->create_new_manage_transfer($travel_date, $note, $seat, $driver_id, $car_id);
        }

        if ($manage_id > 0) {
            $arrange = 1;

            foreach ($passed_list as $b) {
                // คำนวณ PAX สุทธิ (เอาค่าที่ส่งมาจาก JS ซึ่งรองรับการถูก Split แล้ว)
                $total_pax = $b['adult'] + $b['child'] + $b['infant'] + $b['foc'];

                // 🌟 แยกบันทึกลงตารางตามประเภทอย่างถูกต้อง!
                if ($b['transfer_type'] == 'pickup') {
                    $manageObj->insert_new_booking_manage_transfer($arrange, $total_pax, $manage_id, $b['bt_id']);
                    $arrange++;
                } elseif ($b['transfer_type'] == 'dropoff') {
                    $manageObj->insert_new_dropoff_transfer($total_pax, $manage_id, $b['bt_id']);
                } elseif ($b['transfer_type'] == 'overnight') {
                    $manageObj->insert_new_overnight_transfer($total_pax, $manage_id, $b['bt_id']);
                }
            }
        }
    }

    echo json_encode([
        'status' => 'success',
        'passed_count' => count($passed_list),
        'failed_count' => count($failed_list),
        'failed_details' => $failed_list
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
}
