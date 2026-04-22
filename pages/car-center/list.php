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
                        <i data-feather='shopping-cart'></i> รอจัดรถ (Waiting for Car) <span class="badge badge-pill badge-light-primary ml-50" id="badge-join">(45 คน)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bolder text-warning" id="private-tab" data-toggle="tab" href="#assigned-tab" role="tab">
                        <i data-feather='truck'></i> จัดรถแล้ว (Car Assigned) <span class="badge badge-pill badge-light-warning ml-50" id="badge-private">(8 คัน/24 คน)</span>
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
                                        foreach ($zones as $zone) {
                                            echo "<option value='{$zone['id']}'>{$zone['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 pt-1">
                                <button type="button" class="btn btn-primary btn-block" id="btn-fetch-pool">
                                    <i data-feather="search"></i> ค้นหา
                                </button>
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
                                        <table class="table table-hover table-bordered table-sm" id="table-join">
                                            <thead class="thead-light text-center">
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="checkAllJoin"><label class="custom-control-label" for="checkAllJoin"></label></div>
                                                    </th>
                                                    <th>ETD</th>
                                                    <th>Hotel (Zone)</th>
                                                    <th>Room#</th>
                                                    <th>Guest Name</th>
                                                    <th>Pax</th>
                                                    <th>V/C</th>
                                                    <th>Programe</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-join">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="private-pool" role="tabpanel">
                                    <div class="table-responsive table-waiting-pool">
                                        <table class="table table-hover table-bordered table-sm" id="table-private">
                                            <thead class="thead-light text-center">
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="checkAllPrivate"><label class="custom-control-label" for="checkAllPrivate"></label></div>
                                                    </th>
                                                    <th>ETD</th>
                                                    <th>Hotel (Zone)</th>
                                                    <th>Room#</th>
                                                    <th>Guest Name</th>
                                                    <th>Pax</th>
                                                    <th>V/C</th>
                                                    <th>Programe</th>
                                                    <th>Action</th>
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
                                    <select class="form-control" id="van-logistics" name="van_logistics">
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
                                    <select class="form-control" id="driver-logistics" name="driver_logistics">
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

                                <div class="flex-grow-1 overflow-auto mb-2" style="max-height: 250px;">
                                </div>

                                <div class="mt-auto">
                                    <button type="button" class="btn btn-success btn-block btn-lg mb-1 font-weight-bold shadow-sm" id="btn-assign-van">
                                        <i data-feather="check"></i> CLOSE VAN V01 & ASSIGN
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-block font-weight-bold">
                                        <i data-feather="x"></i> CLEAR SELECTION
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- END WAITING CAR POOL -->

                <!-- START ASSIGNED CAR -->
                <div class="card tab-pane fade show active" id="assigned-tab" role="tabpanel">

                </div>
                <!-- END ASSIGNED CAR -->
            </div>

        </section>
        <!-- list end -->
    </div>
    <!-- END: Content-->

</div>