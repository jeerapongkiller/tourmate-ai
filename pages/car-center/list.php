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
        </div>
    </div>

    <div class="content-body">
        <section class="app-booking-list">

            <div class="card mb-1 shadow-sm border-top-primary">
                <div class="card-body p-1">
                    <form id="master-filter-form">
                        <div class="row d-flex align-items-center">

                            <div class="col-md-2 border-right">
                                <label class="font-weight-bold mb-50">วันที่เดินทาง (Travel Date)</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control date-picker" id="waiting-date" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="d-none">
                                    <select id="waiting-programs" multiple></select>
                                    <select id="waiting-zones" multiple></select>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-25">
                                        <span class="font-weight-bold text-muted small mr-1">โปรแกรม:</span>
                                        <div id="program-labels-container" class="d-inline-flex flex-wrap align-items-center"></div>
                                    </div>
                                    <div class="col-12">
                                        <span class="font-weight-bold text-muted small mr-1">โซน:</span>
                                        <div id="zone-labels-container" class="d-inline-flex flex-wrap align-items-center"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <ul class="nav nav-tabs" id="mainTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active font-weight-bolder text-primary" id="main-waiting-tab" data-toggle="tab" href="#waiting-tab" role="tab">
                        <i data-feather='shopping-cart'></i> รอจัดรถ (Waiting for Car) <span class="badge badge-pill badge-light-primary ml-50">(0 คน)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bolder text-warning" id="main-assigned-tab" data-toggle="tab" href="#assigned-tab" role="tab">
                        <i data-feather='truck'></i> จัดรถแล้ว (Car Assigned) <span class="badge badge-pill badge-light-warning ml-50">(0 คัน/0 คน)</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="card tab-pane fade show active" id="waiting-tab" role="tabpanel">
                    <div class="row p-2">
                        <div class="col-md-8 border-right">
                            <ul class="nav nav-tabs nav-justified" id="poolTypeTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active font-weight-bolder text-primary" id="sub-join-tab" data-toggle="tab" href="#join-pool" role="tab">
                                        <i data-feather="users"></i> รับ-ส่ง แบบจอย (JOIN TRANSFERS) <span class="badge badge-pill badge-light-primary ml-50" id="badge-join">0</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bolder text-warning" id="sub-private-tab" data-toggle="tab" href="#private-pool" role="tab">
                                        <i data-feather="user-check"></i> รับ-ส่ง แบบส่วนตัว (PRIVATE TRANSFERS) <span class="badge badge-pill badge-light-warning ml-50" id="badge-private">0</span>
                                    </a>
                                </li>
                            </ul>

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
                                            <tbody id="tbody-join"></tbody>
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
                                            <tbody id="tbody-private"></tbody>
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
                                            echo '<option value="' . $car['id'] . '" data-name="' . $car['name'] . '" data-seat="' . $car['capacity'] . '">' . $car['name'] . '</option>';
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
                                            echo '<option value="' . $driver['id'] . '" data-name="' . $driver['name'] . '" data-seat="' . $driver['seat'] . '" data-license="' . $driver['number_plate'] . '" data-telephone="' . $driver['telephone'] . '">' . $driver['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <hr class="w-100 my-1">

                                <div class="flex-grow-1 overflow-auto mb-2 pr-50" id="builder-booking-list" style="max-height: 250px;"></div>

                                <div class="mt-auto">
                                    <button type="button" class="btn btn-success btn-block btn-lg mb-1 font-weight-bold shadow-sm" id="btn-assign-van">
                                        <i data-feather="check"></i> ASSIGN CAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card tab-pane fade" id="assigned-tab" role="tabpanel">
                    <div class="row p-2">
                        <div class="col-md-8 border-right">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div>
                                    <h4 class="mb-0 font-weight-bolder text-primary"><i data-feather="grid"></i> ภาพรวมรถที่จัดแล้ว</h4>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary btn-sm"><i data-feather="printer"></i> พิมพ์ใบงานทั้งหมด</button>
                                </div>
                            </div>
                            <div class="row mt-2" id="assigned-van-grid"></div>
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
                                    </div>
                                </div>

                                <div class="mb-1 font-weight-bold text-muted small">
                                    <i data-feather="list"></i> เส้นทางรับลูกค้า (Drag to reorder)
                                </div>

                                <div class="flex-grow-1 overflow-auto mb-2 pr-50" id="assigned-booking-list" style="max-height: 400px;"></div>

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
            </div>

        </section>
    </div>

    <div class="modal fade text-left" id="modal-split-booking" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content border-primary">
                <div class="modal-header bg-light-primary">
                    <h5 class="modal-title text-primary"><i data-feather="scissors"></i> แบ่งกลุ่มลูกค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning mb-2" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <i data-feather="info" class="mr-50"></i>
                            <span>ลูกค้ากลุ่มนี้มี <b><span id="split-total-pax">0</span> คน</b></span>
                        </div>
                    </div>
                    <input type="hidden" id="split-booking-id" value="">
                    <div class="form-group">
                        <label>กลุ่มที่ 1</label>
                        <input type="number" class="form-control" id="split-group-1" min="1">
                    </div>
                    <div class="form-group">
                        <label>กลุ่มที่ 2</label>
                        <input type="number" class="form-control" id="split-group-2" readonly style="background-color: #f8f8f8;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-primary" id="btn-confirm-split">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
</div>