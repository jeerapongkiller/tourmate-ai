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
    // if ($manage_id > 0) {
    //     // ==========================================
    //     // ✏️ โหมดแก้ไข (EDIT MODE)
    //     // ==========================================
    //     // 1. อัปเดตข้อมูลรถ และ ล้างคิวเก่าทิ้ง "เสมอ" (แม้ว่าจะลบคนออกจนหมดเกลี้ยงก็ตาม)
    //     $manageObj->update_manage_info($manage_id, $car_id, $driver_id, $data['seat']);
    //     $manageObj->clear_manage_transfer_bookings($manage_id);

    //     // 2. ถ้ามีคนเหลืออยู่ ค่อยเขียนคิวใหม่ลงไป
    //     if (count($passed_list) > 0) {
    //         $arrange = 1;
    //         foreach ($passed_list as $b) {
    //             $total_pax = $b['adult'] + $b['child'] + $b['infant'] + $b['foc'];

    //             if ($b['transfer_type'] == 'pickup') {
    //                 $manageObj->insert_new_booking_manage_transfer($arrange, $total_pax, $manage_id, $b['bt_id']);
    //             } elseif ($b['transfer_type'] == 'dropoff') {
    //                 $manageObj->insert_new_dropoff_transfer($total_pax, $manage_id, $b['bt_id']);
    //             } elseif ($b['transfer_type'] == 'overnight') {
    //                 $manageObj->insert_new_overnight_transfer($total_pax, $manage_id, $b['bt_id']);
    //             }
    //             $arrange++;
    //         }
    //     }
    // } else {
    //     // ==========================================
    //     // 🆕 โหมดสร้างรถใหม่ (CREATE MODE)
    //     // ==========================================
    //     // สร้างใหม่ต้องมีลูกค้าผ่านด่านอย่างน้อย 1 รายการ
    //     if (count($passed_list) > 0) {
    //         $manage_id = $manageObj->create_new_manage_transfer($travel_date, "", $data['seat'], $driver_id, $car_id);
    //         $arrange = 1;
    //         foreach ($passed_list as $b) {
    //             $total_pax = $b['adult'] + $b['child'] + $b['infant'] + $b['foc'];

    //             if ($b['transfer_type'] == 'pickup') {
    //                 $manageObj->insert_new_booking_manage_transfer($arrange, $total_pax, $manage_id, $b['bt_id']);
    //             } elseif ($b['transfer_type'] == 'dropoff') {
    //                 $manageObj->insert_new_dropoff_transfer($total_pax, $manage_id, $b['bt_id']);
    //             } elseif ($b['transfer_type'] == 'overnight') {
    //                 $manageObj->insert_new_overnight_transfer($total_pax, $manage_id, $b['bt_id']);
    //             }
    //             $arrange++;
    //         }
    //     }
    // }

    // 2. บันทึกข้อมูล
    // 🌟 ปรับใหม่: ยอมให้สร้าง/แก้ไขรถได้เสมอ แม้จะไม่มีรายชื่อลูกค้า (Empty Van)

    if ($manage_id == 0) {
        // ==========================================
        // 🆕 โหมดสร้างรถใหม่ (CREATE MODE)
        // ==========================================
        // สั่งสร้างหัวกระดาษ (manage_transfer) ทันที
        $manage_id = $manageObj->create_new_manage_transfer($travel_date, "", $data['seat'], $driver_id, $car_id);
    } else {
        // ==========================================
        // ✏️ โหมดแก้ไข (EDIT MODE)
        // ==========================================
        // อัปเดตข้อมูลรถ และ ล้างคิวเก่าทิ้ง "เสมอ" เพื่อเตรียมเขียนใหม่ (หรือปล่อยว่าง)
        $manageObj->update_manage_info($manage_id, $car_id, $driver_id, $data['seat']);
        $manageObj->clear_manage_transfer_bookings($manage_id);
    }

    // 3. ถ้ามีรายชื่อลูกค้าส่งมาด้วย ค่อยวนลูปบันทึกคิว (ถ้าไม่มีก็ข้ามไป รถจะกลายเป็นรถเปล่า)
    if ($manage_id > 0 && count($passed_list) > 0) {
        $arrange = 1;
        foreach ($passed_list as $b) {
            $total_pax = $b['adult'] + $b['child'] + $b['infant'] + $b['foc'];

            if ($b['transfer_type'] == 'pickup') {
                $manageObj->insert_new_booking_manage_transfer($arrange, $total_pax, $manage_id, $b['bt_id']);
            } elseif ($b['transfer_type'] == 'dropoff') {
                $manageObj->insert_new_dropoff_transfer($total_pax, $manage_id, $b['bt_id']);
            } elseif ($b['transfer_type'] == 'overnight') {
                $manageObj->insert_new_overnight_transfer($total_pax, $manage_id, $b['bt_id']);
            }
            $arrange++;
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
