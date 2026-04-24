<?php
require_once 'controllers/Manage.php';

$manageObj = new Manage();
$today = date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime(" +1 day"));
?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">ศูนย์จัดรถ</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">

            </div>
        </div>
    </div>

    <!-- BEGIN: Content-->
    <div class="content-body">
        <!-- list start -->
        <section class="app-booking-list">

            <ul class="nav nav-tabs" id="bookingTypeTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active font-weight-bolder text-primary" id="join-tab" data-toggle="tab" href="#waiting-tab" role="tab">
                        <i data-feather='shopping-cart'></i> รอจัดรถ (Waiting for Car) <span class="badge badge-pill badge-light-primary ml-50" id="">(0 คน)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bolder text-warning" id="private-tab" data-toggle="tab" href="#assigned-tab" role="tab">
                        <i data-feather='truck'></i> จัดรถแล้ว (Car Assigned) <span class="badge badge-pill badge-light-warning ml-50" id="">(0 คัน/0 คน)</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- START WAITING CAR POOL -->
                <div class="card tab-pane fade show active" id="waiting-tab" role="tabpanel">
                    <h5 class="card-header">Search Filter</h5>
                    <form id="waiting-filter-form" class="border-bottom mb-1">
                        <div class="row d-flex align-items-center mx-50 pb-1">
                            <div class="col-md-4">
                                <div class="form-group mb-0">
                                    <label class="font-weight-bold">วันที่เดินทาง (Travel Date)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control date-picker" id="waiting-date" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-0">
                                    <label class="font-weight-bold">อุทยาน (Park)</label>
                                    <select class="form-control select2" id="waiting-park">
                                        <option value="all">-- เลือกอุทยาน --</option>
                                        <?php
                                        $parks = $manageObj->showparks();
                                        foreach ($parks as $park) {
                                            echo "<option value='{$park['id']}'>{$park['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-0">
                                    <label class="font-weight-bold">โปรแกรม (Program)</label>
                                    <select class="form-control select2" id="waiting-programs" multiple>
                                        <?php
                                        $products = $manageObj->showproducts();
                                        foreach ($products as $product) {
                                            if (str_contains($product['name'], 'NO TRANSFER')) continue; // ข้ามโปรแกรมที่มีคำว่า NO TRANSFER ในชื่อ เพราะไม่ต้องจัดรถให้
                                            echo "<option value='{$product['id']}' data-park='{$product['park_id']}'>{$product['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-0">
                                    <label class="font-weight-bold">โซน (Zone)</label>
                                    <select class="form-control select2" id="waiting-zones" multiple>
                                        <?php
                                        $zones = $manageObj->showzones();

                                        // 1. ตั้งค่า Keyword สำหรับดักจับคำในชื่อโซน
                                        $zoneGroups = [
                                            '1. โซนตอนเหนือ (Northern Route)' => ['ไม้ขาว', 'ไนยาง', 'ในทอน', 'Mai Khao', 'Nai Yang', 'Naithon'],
                                            '2. โซนกลาง-เหนือ (Mid-North Route)' => ['บางเทา', 'ลากูน่า', 'สุรินทร์', 'กมลา', 'Bang Tao', 'Laguna', 'Surin', 'Kamala'],
                                            '3. โซนศูนย์กลาง (Central Route)' => ['ป่าตอง', 'กะหลิม', 'ตรัยตรัง', 'Patong', 'Kalim', 'Tri Trang'],
                                            '4. โซนกลาง-ใต้ (Mid-South Route)' => ['กะตะ', 'กะรน', 'Kata', 'Karon'],
                                            '5. โซนตอนใต้สุด (Deep South Route)' => ['ในหาน', 'ราไวย์', 'ฉลอง', 'Nai Harn', 'Rawai', 'Chalong'],
                                            '6. โซนเมืองและตะวันออก (East & City)' => ['เมือง', 'ภูเก็ต', 'เกาะสิเหร่', 'แหลมพันวา', 'อ่าวมะขาม', 'Phuket Town', 'Sirey', 'Panwa', 'Makham']
                                        ];

                                        $categorizedZones = [];
                                        $otherZones = [];

                                        // 2. วนลูปแยกโซนเข้าตะกร้า
                                        foreach ($zones as $zone) {
                                            $found = false;
                                            $zoneName = strtolower($zone['name']); // สมมติว่าดึงชื่อจาก ['name'] หรือ ['name_th']

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
                                            if (!$found) $otherZones[] = $zone; // ถ้าไม่ตรงกับกลุ่มไหนเลย
                                        }

                                        // 3. วาด HTML Optgroup
                                        foreach ($categorizedZones as $groupName => $groupZones) {
                                            echo "<optgroup label='{$groupName}'>";
                                            foreach ($groupZones as $z) {
                                                echo "<option value='{$z['id']}'>{$z['name']}</option>";
                                            }
                                            echo "</optgroup>";
                                        }

                                        if (!empty($otherZones)) {
                                            echo "<optgroup label='7. โซนอื่นๆ (Other Routes)'>";
                                            foreach ($otherZones as $z) {
                                                echo "<option value='{$z['id']}'>{$z['name']}</option>";
                                            }
                                            echo "</optgroup>";
                                        }
                                        ?>
                                    </select>
                                    <!-- <select class="form-control select2" id="waiting-zones" multiple>
                                        <?php
                                        $zones = $manageObj->showzones();
                                        foreach ($zones as $zone) {
                                            echo "<option value='{$zone['id']}'>{$zone['name']}</option>";
                                        }
                                        ?>
                                    </select> -->
                                </div>
                            </div>
                            <!-- <div class="col-md-1 pt-1">
                                <button type="button" class="btn btn-primary btn-block" id="btn-fetch-waiting">
                                    <i data-feather="search"></i> ค้นหา
                                </button>
                            </div> -->
                        </div>
                    </form>
                    <!-- filter end -->

                    <div class="row">

                        <div class="col-md-8 border-right">
                            <ul class="nav nav-tabs nav-justified" id="bookingTypeTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active font-weight-bolder text-primary" id="join-tab" data-toggle="tab" href="#join-pool" role="tab">
                                        <i data-feather="users"></i> รับ-ส่ง แบบจอย (JOIN TRANSFERS) <span class="badge badge-pill badge-light-primary ml-50" id="badge-join">0</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bolder text-warning" id="private-tab" data-toggle="tab" href="#private-pool" role="tab">
                                        <i data-feather="user-check"></i> รับ-ส่ง แบบส่วนตัว (PRIVATE TRANSFERS) <span class="badge badge-pill badge-light-warning ml-50" id="badge-private">0</span>
                                    </a>
                                </li>
                            </ul>

                            <p class="text-muted small mb-1 mt-50">Master list of all unassigned bookings sorted logically by AI according to pickup route</p>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="join-pool" role="tabpanel">
                                    <div class="table-responsive table-waiting-pool">
                                        <table class="table table-hover table-bordered table-sm" id="table-join" style="color:black !important;">
                                            <thead class="thead-light text-center">
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="checkAllJoin"><label class="custom-control-label" for="checkAllJoin"></label></div>
                                                    </th>
                                                    <th>โซน (เวลารับ)</th>
                                                    <th>โรงแรม (ห้อง)</th>
                                                    <th>ชื่อ (สัญชาติ/โทร)</th>
                                                    <th>VC / เอเยนต์</th>
                                                    <th>โปรแกรม</th>
                                                    <th>PAX</th>
                                                    <th>หมายเหตุ</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-join">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="private-pool" role="tabpanel">
                                    <div class="table-responsive table-waiting-pool">
                                        <table class="table table-hover table-bordered table-sm" id="table-private" style="color:black !important;">
                                            <thead class="thead-light text-center">
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="checkAllPrivate"><label class="custom-control-label" for="checkAllPrivate"></label></div>
                                                    </th>
                                                    <th>โซน (เวลารับ)</th>
                                                    <th>โรงแรม (ห้อง)</th>
                                                    <th>ชื่อ (สัญชาติ/โทร)</th>
                                                    <th>VC / เอเยนต์</th>
                                                    <th>โปรแกรม</th>
                                                    <th>PAX</th>
                                                    <th>หมายเหตุ</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-private">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="van-builder-panel p-2 h-100 d-flex flex-column">

                                <div class="row text-center mb-2">
                                    <div class="col-6 border-right">
                                        <span class="d-block text-muted small font-weight-bold">PAX COUNTER</span>
                                        <span class="pax-counter-text text-primary"><span style="font-size:1.5rem;" class="text-secondary">/</span></span>
                                    </div>
                                    <div class="col-6">
                                        <span class="d-block text-muted small font-weight-bold">Remaining</span>
                                        <span class="pax-counter-text text-success"> Seats</span>
                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <select class="form-control" id="van-waiting" name="van_waiting">
                                        <option>Select Cars ...</option>
                                        <?php
                                        $cars = $manageObj->showcars();
                                        foreach ($cars as $car) {
                                        ?>
                                            <option value="<?php echo $car['id']; ?>" data-name="<?php echo $car['name']; ?>" data-seat="<?php echo $car['capacity']; ?>"><?php echo $car['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <select class="form-control" id="driver-waiting" name="driver_waiting">
                                        <option>Select Driver ...</option>
                                        <?php
                                        $drivers = $manageObj->showdrivers();
                                        foreach ($drivers as $driver) {
                                        ?>
                                            <option value="<?php echo $driver['id']; ?>" data-name="<?php echo $driver['name']; ?>" data-seat="<?php echo $driver['seat']; ?>" data-license="<?php echo $driver['number_plate']; ?>" data-telephone="<?php echo $driver['telephone']; ?>"><?php echo $driver['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <hr class="w-100 my-1">

                                <div class="flex-grow-1 overflow-auto mb-2 pr-50" id="builder-booking-list" style="max-height: 250px;">
                                </div>

                                <div class="mt-auto">
                                    <button type="button" class="btn btn-success btn-block btn-lg mb-1 font-weight-bold shadow-sm" id="btn-assign-van">
                                        <i data-feather="check"></i> ASSIGN CAR
                                    </button>
                                    <!-- <button type="button" class="btn btn-outline-secondary btn-block font-weight-bold">
                                        <i data-feather="x"></i> CLEAR SELECTION
                                    </button> -->
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- END WAITING CAR POOL -->

                <!-- START ASSIGNED CAR -->
                <div class="card tab-pane fade" id="assigned-tab" role="tabpanel">
                    <div class="row p-2">

                        <div class="col-md-8 border-right">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div>
                                    <h4 class="mb-0 font-weight-bolder text-primary"><i data-feather="grid"></i> ภาพรวมรถที่จัดแล้ว</h4>
                                    <p class="text-muted small mb-0 mt-25">คลิกที่การ์ดรถเพื่อดูรายละเอียดรายชื่อลูกค้า แก้ไข หรือจัดเรียงคิว</p>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary btn-sm"><i data-feather="printer"></i> พิมพ์ใบงานทั้งหมด</button>
                                </div>
                            </div>

                            <div class="row mt-2" id="assigned-van-grid">

                                <!-- <div class="col-xl-4 col-sm-6 mb-2">
                                    <div class="card van-card active shadow-sm h-100">
                                        <div class="card-body p-1 d-flex flex-column">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar bg-light-primary p-50 mr-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="truck" class="font-medium-5"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5 class="mb-0 font-weight-bolder">รถ V02 <span class="text-warning">[10/12]</span></h5>
                                                    <small class="text-muted">ว่าง 2 ที่นั่ง</small>
                                                </div>
                                            </div>
                                            <div class="mb-1 small">
                                                <div><i data-feather="user" width="12"></i> ผู้ขับ: <b>นายสมชาย</b></div>
                                                <div><i data-feather="map-pin" width="12"></i> โซน: <b>กะตะ, กะรน</b></div>
                                            </div>
                                            <div class="progress progress-bar-primary van-progress mb-1">
                                                <div class="progress-bar" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="mt-auto row mx-0 text-center">
                                                <div class="col-6 px-25">
                                                    <button class="btn btn-sm btn-outline-secondary btn-block">แก้ไข</button>
                                                </div>
                                                <div class="col-6 px-25">
                                                    <button class="btn btn-sm btn-primary btn-block">พิมพ์</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-sm-6 mb-2">
                                    <div class="card van-card shadow-sm h-100">
                                        <div class="card-body p-1 d-flex flex-column">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar bg-light-danger p-50 mr-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="truck" class="font-medium-5"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5 class="mb-0 font-weight-bolder">รถ V01 <span class="text-danger">[12/12]</span></h5>
                                                    <small class="text-danger font-weight-bold">เต็มแล้ว</small>
                                                </div>
                                            </div>
                                            <div class="mb-1 small">
                                                <div><i data-feather="user" width="12"></i> ผู้ขับ: <b>นายชาก</b></div>
                                                <div><i data-feather="map-pin" width="12"></i> โซน: <b>ป่าตอง</b></div>
                                            </div>
                                            <div class="progress progress-bar-danger van-progress mb-1">
                                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="mt-auto row mx-0 text-center">
                                                <div class="col-6 px-25">
                                                    <button class="btn btn-sm btn-outline-secondary btn-block">แก้ไข</button>
                                                </div>
                                                <div class="col-6 px-25">
                                                    <button class="btn btn-sm btn-primary btn-block">พิมพ์</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="assigned-panel-right p-2 h-100 d-flex flex-column">

                                <div class="border-bottom pb-1 mb-1">
                                    <h4 class="font-weight-bolder text-primary d-flex justify-content-between align-items-center">
                                        <span>ข้อมูลสรุป รถ V02</span>
                                        <span class="badge badge-light-primary text-right" style="font-size:1rem;">10/12</span>
                                    </h4>
                                    <div class="small">
                                        <div><b>ผู้ขับ:</b> นายสมชาย (089-123-4567)</div>
                                        <div><b>โซนหลัก:</b> กะตะ, กะรน</div>
                                        <div><b>เวลาออก (แนะนำ):</b> 08:30</div>
                                    </div>
                                </div>

                                <div class="mb-1 font-weight-bold text-muted small">
                                    <i data-feather="list"></i> เส้นทางรับลูกค้า (Drag to reorder)
                                </div>

                                <div class="flex-grow-1 overflow-auto mb-2 pr-50" id="assigned-booking-list" style="max-height: 400px;">

                                    <div class="assigned-booking-item mb-1 cursor-move">
                                        <div class="d-flex align-items-start">
                                            <i data-feather="more-vertical" class="text-muted mr-50 mt-25"></i>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <b class="text-dark">1. Kata Palm Resort</b>
                                                    <span class="badge badge-light-secondary">3/0 Pax</span>
                                                </div>
                                                <div class="small text-muted">Naomalia (TH) • Rm: B54-C</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="assigned-booking-item mb-1 cursor-move">
                                        <div class="d-flex align-items-start">
                                            <i data-feather="more-vertical" class="text-muted mr-50 mt-25"></i>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <b class="text-dark">2. Karon Beach Hotel</b>
                                                    <span class="badge badge-light-secondary">4/1 Pax</span>
                                                </div>
                                                <div class="small text-muted">Parent B51 (UK) • Rm: A12</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="assigned-booking-item mb-1 border-warning cursor-move" style="background-color: #fff9e6;">
                                        <div class="d-flex align-items-start">
                                            <i data-feather="more-vertical" class="text-muted mr-50 mt-25"></i>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <b class="text-dark">3. Patong Resort</b>
                                                    <span class="badge badge-light-secondary">2/0 Pax</span>
                                                </div>
                                                <div class="small text-muted">John Doe (US) • Rm: 112</div>
                                                <div class="small text-warning font-weight-bold mt-25"><i data-feather="alert-triangle" width="12"></i> อยู่นอกโซน (ป่าตอง)</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-auto">
                                    <button type="button" class="btn btn-outline-primary btn-block mb-1 font-weight-bold" id="btn-save-arrange">
                                        <i data-feather="shuffle"></i> บันทึกการสลับคิว
                                    </button>
                                    <button type="button" class="btn btn-danger btn-block mb-1 font-weight-bold" id="btn-remove-van">
                                        <i data-feather="user-minus"></i> ดีดออก (Remove from Van)
                                    </button>
                                    <button type="button" class="btn btn-info btn-block mb-1 font-weight-bold">
                                        <i data-feather="printer"></i> พิมพ์ใบงานคันนี้
                                    </button>
                                    <button type="button" class="btn btn-success btn-block font-weight-bold shadow-sm">
                                        <i data-feather="send"></i> ส่งงานให้คนขับ (Send to Driver)
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- END ASSIGNED CAR -->
            </div>

        </section>
        <!-- list end -->
    </div>
    <!-- END: Content-->

    <!------------------------------------------------------------------>
    <!-- End Form Modal -->
    <div class="modal fade text-left" id="modal-split-booking" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content border-primary">
                <div class="modal-header bg-light-primary">
                    <h5 class="modal-title text-primary"><i data-feather="scissors"></i> แบ่งกลุ่มลูกค้า (Split Booking)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning mb-2" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <i data-feather="info" class="mr-50"></i>
                            <span>ลูกค้ากลุ่มนี้มี <b><span id="split-total-pax">18</span> คน</b> คุณต้องการแบ่งกลุ่มอย่างไร?</span>
                        </div>
                    </div>

                    <input type="hidden" id="split-booking-id" value="">

                    <div class="form-group">
                        <label>กลุ่มที่ 1 (จำนวนคน)</label>
                        <input type="number" class="form-control" id="split-group-1" min="1" placeholder="เช่น 9">
                    </div>
                    <div class="form-group">
                        <label>กลุ่มที่ 2 (จำนวนคนที่เหลือ)</label>
                        <input type="number" class="form-control" id="split-group-2" readonly style="background-color: #f8f8f8;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-primary" id="btn-confirm-split">ยืนยันการแบ่ง</button>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <!-- End Form Modal -->

</div>