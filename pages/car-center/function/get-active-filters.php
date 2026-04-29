<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();

if (isset($_POST['travel_date'])) {
    $travel_date = $_POST['travel_date'];

    // ดึงข้อมูลดิบจาก Database
    $filters = $manageObj->get_active_booking_filters($travel_date);

    // 1. สร้าง HTML สำหรับ Park
    $html_parks = "<option value='all'>-- เลือกอุทยาน --</option>";
    foreach ($filters['parks'] as $p) {
        $html_parks .= "<option value='{$p['id']}'>{$p['name']}</option>";
    }

    // 2. สร้าง HTML สำหรับ Program
    $html_programs = "";
    foreach ($filters['programs'] as $p) {
        // 🌟 เตรียมรับค่าสีโปรแกรมไว้ล่วงหน้า (ถ้าใน DB ยังไม่มี/ยังไม่ได้ตั้งค่า ให้ใช้สีเทา #475569 ไปก่อน)
        $color = !empty($p['color_hex']) ? $p['color_hex'] : '#475569';

        $html_programs .= "<option value='{$p['id']}' data-park='{$p['park_id']}' data-color='{$color}'>{$p['name']}</option>";
    }

    // 3. สร้าง HTML สำหรับ Zone (จัดกลุ่มตาม Route ที่คุณต้องการ)
    $zoneGroups = [
        '1. โซนตอนเหนือ (Northern Route)' => ['ไม้ขาว', 'ไนยาง', 'ในทอน', 'Mai Khao', 'Nai Yang', 'Naithon'],
        '2. โซนกลาง-เหนือ (Mid-North Route)' => ['บางเทา', 'ลากูน่า', 'สุรินทร์', 'กมลา', 'Bang Tao', 'Laguna', 'Surin', 'Kamala'],
        '3. โซนศูนย์กลาง (Central Route)' => ['ป่าตอง', 'กะหลิม', 'ตรัยตรัง', 'Patong', 'Kalim', 'Tri Trang'],
        '4. โซนกลาง-ใต้ (Mid-South Route)' => ['กะตะ', 'กะรน', 'Kata', 'Karon'],
        '5. โซนตอนใต้สุด (Deep South Route)' => ['ในหาน', 'ราไวย์', 'ฉลอง', 'Nai Harn', 'Rawai', 'Chalong'],
        '6. โซนเมืองและตะวันออก (East & City)' => ['เมือง', 'ภูเก็ต', 'เกาะสิเหร่', 'แหลมพันวา', 'อ่าวมะขาม', 'Phuket Town', 'Sirey', 'Panwa', 'Makham']
    ];

    // 🌟 สร้าง Array รองรับไว้ก่อน เพื่อบังคับให้ลำดับกลุ่ม (1-6) คงที่เสมอ
    $categorizedZones = [];
    foreach (array_keys($zoneGroups) as $groupName) {
        $categorizedZones[$groupName] = [];
    }
    $otherZones = [];

    // วนลูปคัดแยกโซนลงตะกร้า Group
    foreach ($filters['zones'] as $zone) {
        $found = false;
        $zoneName = strtolower($zone['name']);

        foreach ($zoneGroups as $groupName => $keywords) {
            foreach ($keywords as $keyword) {
                if (stripos($zoneName, strtolower($keyword)) !== false) {
                    $categorizedZones[$groupName][] = $zone;
                    $found = true;
                    break;
                }
            }
            if ($found) break;
        }
        if (!$found) $otherZones[] = $zone;
    }

    // ประกอบร่าง HTML Optgroup (แนบ data-color ไปด้วย)
    $html_zones = "";
    foreach ($categorizedZones as $groupName => $groupZones) {
        if (empty($groupZones)) continue; // ถ้ากลุ่มไหนไม่มีลูกค้า ให้ข้ามไป ไม่ต้องโชว์หัวข้อ
        $html_zones .= "<optgroup label='{$groupName}'>";
        foreach ($groupZones as $z) {
            $color = !empty($z['color_hex']) ? $z['color_hex'] : '#cccccc';
            $html_zones .= "<option value='{$z['id']}' data-color='{$color}'>{$z['name']}</option>";
        }
        $html_zones .= "</optgroup>";
    }
    if (!empty($otherZones)) {
        $html_zones .= "<optgroup label='7. โซนอื่นๆ (Other Routes)'>";
        foreach ($otherZones as $z) {
            $color = !empty($z['color_hex']) ? $z['color_hex'] : '#cccccc';
            $html_zones .= "<option value='{$z['id']}' data-color='{$color}'>{$z['name']}</option>";
        }
        $html_zones .= "</optgroup>";
    }

    // 4. ส่งกลับไปให้ JavaScript
    echo json_encode([
        'status' => 'success',
        'html_parks' => $html_parks,
        'html_programs' => $html_programs,
        'html_zones' => $html_zones
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No date provided']);
}
