<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['action']) && $data['action'] == "assign_van") {
    $travel_date = $data['travel_date'];
    $car_id = $data['car_id'];
    $driver_id = $data['driver_id'];
    $manage_id = (int)$data['manage_id']; // ถ้าเป็น 0 คือสร้างใหม่, ถ้า > 0 คือแก้ไข
    $bookings = $data['bookings'];

    $passed_list = [];
    $failed_list = [];

    // 1. ด่านตรวจคนแย่งจัดรถ
    foreach ($bookings as $b) {
        $total_pax = $b['adult'] + $b['child'] + $b['infant'] + $b['foc'];
        $frontend_updated_at = $b['updated_at'];

        // 🌟 ย้ายมาเรียกใช้ฟังก์ชันจาก Manage.php แทน SQL เพียวๆ
        if (empty($frontend_updated_at)) {
            $frontend_updated_at = $manageObj->get_booking_updated_at((int)$b['bt_id']);
        }

        $verify = $manageObj->verify_booking_for_assignment($b['bt_id'], $frontend_updated_at, $b['transfer_type'], $total_pax, $manage_id);

        if ($verify['status'] === true) {
            $passed_list[] = $b;
        } else {
            $failed_list[] = ['vc' => $verify['vc'], 'reason' => $verify['reason']];
        }
    }

    // 2. บันทึกข้อมูลที่ผ่านการตรวจสอบ
    if (count($passed_list) > 0) {

        // 2.1 แยกโหมดสร้างใหม่ กับ โหมดแก้ไข
        if ($manage_id == 0) {
            // โหมดสร้างรถใหม่
            $manage_id = $manageObj->create_new_manage_transfer($travel_date, "", $data['seat'], $driver_id, $car_id);
        } else {
            // 🌟 โหมดแก้ไข: อัปเดตข้อมูลรถ/คนขับ และ ล้างคิวเก่าทิ้งให้หมดเกลี้ยง!
            $manageObj->update_manage_info($manage_id, $car_id, $driver_id, $data['seat']);
            $manageObj->clear_manage_transfer_bookings($manage_id);
        }

        // 2.2 บันทึกคิวลูกค้าลงรถ (ใช้รัน Arrange 1, 2, 3... ใหม่จากบนลงล่างเลย)
        if ($manage_id > 0) {
            $arrange = 1;
            foreach ($passed_list as $b) {
                $total_pax = $b['adult'] + $b['child'] + $b['infant'] + $b['foc'];

                if ($b['transfer_type'] == 'pickup') {
                    $manageObj->insert_new_booking_manage_transfer($arrange, $total_pax, $manage_id, $b['bt_id']);
                } elseif ($b['transfer_type'] == 'dropoff') {
                    // ของ Dropoff เราก็เขียน Arrange ลงไปด้วย เพราะเราเพิ่มคอลัมน์ไว้รอแล้ว!
                    $manageObj->insert_new_dropoff_transfer($total_pax, $manage_id, $b['bt_id']);
                    // ถ้าคุณเขียน insert_new_dropoff_transfer ให้รองรับการ Insert arrange แล้ว ก็สามารถแกะส่ง $arrange เข้าไปได้เลย
                    // แต่ถ้าใน Manage.php ยังไม่ได้รับค่า arrange ของ dropoff ก็ปล่อยไว้แบบนี้ก่อนได้ครับ
                } elseif ($b['transfer_type'] == 'overnight') {
                    $manageObj->insert_new_overnight_transfer($total_pax, $manage_id, $b['bt_id']);
                }

                $arrange++; // รันลำดับคิวต่อไป
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
