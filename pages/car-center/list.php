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
                            <div class="col-md-8">
                                <div class="d-none">
                                    <select id="waiting-programs" multiple></select>
                                    <select id="waiting-zones" multiple></select>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-50">
                                        <span class="font-weight-bold text-muted small mr-1">โปรแกรม:</span>
                                        <div id="program-labels-container" class="d-inline-flex flex-wrap align-items-center">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="font-weight-bold text-muted small mr-1">โซน:</span>
                                        <div id="zone-labels-container" class="d-inline-flex flex-wrap align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                                <input type="hidden" id="builder-manage-id" value="0">
                                <input type="hidden" id="builder-base-pax" value="0">

                                <div id="append-mode-alert" class="alert alert-warning d-none p-1 mb-1" style="border: 1px solid #ff9f43;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark"><i data-feather="info" class="text-warning"></i> <b>โหมดเติมคน:</b> <span id="append-van-name">รถ V02</span></span>
                                        <i data-feather="x" class="cursor-pointer text-danger" id="btn-cancel-append" title="ยกเลิกการเติม"></i>
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

                                <hr class="w-100 my-1">

                                <div class="flex-grow-1 overflow-auto mb-2 pr-50" id="builder-booking-list" style="max-height: 250px;">
                                </div>

                                <div class="mt-auto">
                                    <button type="button" class="btn btn-success btn-block btn-lg mb-1 font-weight-bold shadow-sm" id="btn-assign-van">
                                        <i data-feather="check"></i> ASSIGN CAR
                                    </button>
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
                                    <button type="button" class="btn btn-warning btn-block mb-1 font-weight-bold" id="btn-save-arrange" style="display: none;">
                                        <i data-feather="shuffle"></i> บันทึกการสลับคิว
                                    </button>

                                    <button type="button" class="btn btn-danger btn-block mb-1 font-weight-bold" id="btn-remove-van">
                                        <i data-feather="user-minus"></i> ดีดออกทั้งคัน (Remove Van)
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