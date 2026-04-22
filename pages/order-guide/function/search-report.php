<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();
$times = date("H:i:s");

if (isset($_POST['action']) && $_POST['action'] == "search" && !empty($_POST['type']) && !empty($_POST['date'])) {

    $manages_arr = array();
    $bomange_arr = array();
    $bpr_arr = array();
    $bomange_booking = array();
    $bookings = $manageObj->showlistboats('guide', 0, $_POST['date'], $boat = 'all', $guide = 'all', $status = 'all', $agent = 'all', $product = 'all', $voucher_no = '', $refcode = '', $name = '', $hotel = '');
    foreach ($bookings as $booking) {
        if (in_array($booking['mange_id'], $manages_arr) == false && !empty($booking['mange_id'])) {
            $manages_arr[] = $booking['mange_id'];
            $manage_id[] = $booking['mange_id'];
            $boat_name[] = $booking['boat_name'];
            $guide_name[] = $booking['guide_name'];
            $color_hex[] = $booking['color_hex'];
        }

        if (in_array($booking['bpr_id'], $bpr_arr) == false) {
            $bpr_arr[] = $booking['bpr_id'];
            $adult[$booking['mange_id']][] = $booking['adult'];
            $child[$booking['mange_id']][] = $booking['child'];
            $infant[$booking['mange_id']][] = $booking['infant'];
            $foc[$booking['mange_id']][] = $booking['foc'];
            $tourist[$booking['mange_id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];
            if (!empty($booking['check_id'])) {
                $check_total[$booking['mange_id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];
            }
        }

        if (in_array($booking['boman_id'], $bomange_arr) == false) {
            $bomange_arr[] = $booking['boman_id'];
            if (!empty($booking['check_id'])) {
                $check_in[$booking['mange_id']][] = $booking['check_id'];
            }
        }

        if (in_array($booking['id'], $bomange_booking) == false) {
            $bomange_booking[] = $booking['id'];
            $bo_id[$booking['mange_id']][] = $booking['id'];
        }
    }
?>
    <div class="text-center">
        <h5 class="card-title text-danger"><?php echo date('j F Y', strtotime($_POST['date'])); ?></h5>
    </div>
    <div class="card-body p-0">
        <?php if (!empty($manage_id)) {
            for ($i = 0; $i < count($manage_id); $i++) {
        ?>
                <div class="row text-center mx-0">
                    <div class="col-4 border-top border-right text-left py-50 pb-1">
                        <a data-manage="<?php echo $manage_id[$i]; ?>" onclick="trigger_search(this);">
                            <h5 class="card-text text-warning mb-0"><?php echo $guide_name[$i]; ?></h5>
                            <h4 class="font-weight-bolder mb-0" style="color: <?php echo $color_hex[$i]; ?>;">
                                <?php echo $boat_name[$i]; ?>
                            </h4>
                        </a>
                    </div>
                    <div class="col-2 border-top border-right py-50 pb-1">
                        <small class="card-text text-muted mb-0">Booking</small>
                        <h4 class="font-weight-bolder text-success mb-0">
                            <?php echo !empty($check_in[$manage_id[$i]]) ? count($check_in[$manage_id[$i]]) : 0; ?>/<?php echo !empty($bo_id[$manage_id[$i]]) ? count($bo_id[$manage_id[$i]]) : 0; ?>
                        </h4>
                    </div>
                    <div class="col-2 border-top border-right py-50 pb-1">
                        <small class="card-text text-muted mb-0">Total</small>
                        <h4 class="font-weight-bolder text-warning mb-0">
                            <?php echo !empty($check_total[$manage_id[$i]]) ? array_sum($check_total[$manage_id[$i]]) : 0; ?>/<?php echo !empty($tourist[$manage_id[$i]]) ? array_sum($tourist[$manage_id[$i]]) : 0; ?>
                        </h4>
                    </div>
                    <div class="col-1 border-top border-right py-50 pb-1">
                        <small class="card-text text-muted mb-0">AD</small>
                        <h4 class="font-weight-bolder mb-0"><?php echo !empty($adult[$manage_id[$i]]) ? array_sum($adult[$manage_id[$i]]) : 0; ?></h4>
                    </div>
                    <div class="col-1 border-top border-right py-50 pb-1">
                        <small class="card-text text-muted mb-0">CHD</small>
                        <h4 class="font-weight-bolder mb-0"><?php echo !empty($child[$manage_id[$i]]) ? array_sum($child[$manage_id[$i]]) : 0; ?></h4>
                    </div>
                    <div class="col-1 border-top border-right py-50 pb-1">
                        <small class="card-text text-muted mb-0">INF</small>
                        <h4 class="font-weight-bolder mb-0"><?php echo !empty($infant[$manage_id[$i]]) ? array_sum($infant[$manage_id[$i]]) : 0; ?></h4>
                    </div>
                    <div class="col-1 border-top py-50 pb-1">
                        <small class="card-text text-muted mb-0">FOC</small>
                        <h4 class="font-weight-bolder mb-0"><?php echo !empty($foc[$manage_id[$i]]) ? array_sum($foc[$manage_id[$i]]) : 0; ?></h4>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
<?php
} else {
    echo false;
}
