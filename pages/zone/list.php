<?php

require_once 'controllers/Zone.php';

$zoneObj = new Zone();
$zones = $zoneObj->showlist();
?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- place list start -->
            <section class="app-supplier-list">
                <!-- place filter start -->
                <div class="card">
                    <h5 class="card-header">Search Filter</h5>
                    <form id="place-search-form" name="place-search-form" method="post" enctype="multipart/form-data">
                        <div class="d-flex align-items-center mx-50 row pt-0 pb-2">
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label for="is_approved">Status</label>
                                    <select class="form-control select2" id="is_approved" name="is_approved">
                                        <option value="all">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" />
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- place filter end -->
                <!-- list section start -->

                <div class="card">
                    <div class="card-datatable pt-0" id="place-search-table">
                        <table class="place-list-table table table-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Province</th>
                                    <th class="cell-fit"></th>
                                </tr>
                            </thead>
                            <?php if ($zones) { ?>
                                <tbody>
                                    <?php
                                    foreach ($zones as $zone) {
                                        $is_approved = $zone['is_approved'] == 1 ? 'Active' : 'Inactive';
                                        $is_approved_class = $zone['is_approved'] == 1 ? 'badge-light-success' : 'badge-light-secondary';
                                        $href = 'href="./?pages=zone/edit&id=' . $zone['id'] . '" style="color:#6E6B7B"';
                                    ?>
                                        <tr>
                                            <td><a <?php echo $href; ?>><span class="badge badge-pill <?php echo $is_approved_class; ?> text-capitalized"><?php echo $is_approved; ?></span></a></td>
                                            <td><a <?php echo $href; ?>><?php echo !empty($zone['name']) ? !empty($zone['name_th']) ? $zone['name'] . ' (' . $zone['name_th'] . ')' : $zone['name'] : ''; ?></a></td>
                                            <td><a <?php echo $href; ?>><?php echo !empty($zone['pov_nameen']) ? !empty($zone['pov_nameth']) ? $zone['pov_nameen'] . ' (' . $zone['pov_nameth'] . ')' : $zone['pov_nameen'] : ''; ?></a></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <!-- list section end -->
            </section>
            <!-- place assistant list ends -->

            <div class="modal fade text-left" id="modal-reorder-zones" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title text-white"><i data-feather="move"></i> จัดเรียงลำดับโซนรถวิ่ง</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="p-1 bg-light text-muted small border-bottom">
                                <i data-feather="info"></i> ลากขึ้น-ลง เพื่อจัดลำดับเส้นทาง (โซนบนสุดคือจุดแรกที่รถวิ่งไปรับ)
                            </div>
                            <ul class="list-group list-group-flush" id="zone-sortable-list" style="max-height: 60vh; overflow-y: auto;">
                                <?php
                                // กรองเอาเฉพาะโซนที่เปิดใช้งานมาจัดเรียง
                                $activeZones = array_filter($zones, function ($z) {
                                    return $z['is_approved'] == 1;
                                });

                                foreach ($activeZones as $z) {
                                    echo '<li class="list-group-item d-flex align-items-center p-1 border-bottom" data-id="' . $z['id'] . '">';
                                    echo '<i data-feather="move" class="mr-1 text-muted cursor-move" style="cursor:grab;"></i>';
                                    echo '<span class="font-weight-bold">' . $z['name'] . '</span>';
                                    if (!empty($z['name_th'])) echo '<span class="small text-muted ml-50">(' . $z['name_th'] . ')</span>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-warning" id="btn-save-zone-order">บันทึกลำดับ</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>