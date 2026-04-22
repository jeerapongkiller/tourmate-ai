<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Manage.php';

$manageObj = new Manage();
$times = date("H:i:s");

if (isset($_POST['action']) && $_POST['action'] == "search" && !empty($_POST['type']) && !empty($_POST['date'])) {

    $first_bpr = array();
    $first_boat = array();
    $first_book = array();
    $frist_over = array();
    $bookings = $manageObj->showlistboats('list', 0, $_POST['date'], 'all', 'all', 'all', 'all', 'all', '', '', '', '');
    if (!empty($bookings)) {
        foreach ($bookings as $booking) {
            # --- get value booking --- #
            if (in_array($booking['id'], $first_book) == false) {
                $first_book[] = $booking['id'];
                $bo_id[$booking['mange_id']][] = !empty($booking['id']) ? $booking['id'] : 0;

                # --- chrage --- #
                $chrage_id[$booking['mange_id']][] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
                $chrage_adult[$booking['mange_id']][] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
                $chrage_child[$booking['mange_id']][] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
                $chrage_infant[$booking['mange_id']][] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
                $chrage_tourist[$booking['mange_id']][] = $booking['chrage_adult'] + $booking['chrage_child'] + $booking['chrage_infant'];
            }

            if (in_array($booking['id'], $frist_over) == false) {
                $frist_over[] = $booking['id'];
                $bo_id[$booking['over_manage']][] = !empty($booking['id']) ? $booking['id'] : 0;
            }

            if (in_array($booking['bpr_id'], $first_bpr) == false) {
                $first_bpr[] = $booking['bpr_id'];
                $adult[$booking['mange_id']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
                $child[$booking['mange_id']][] = !empty($booking['child']) ? $booking['child'] : 0;
                $infant[$booking['mange_id']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
                $foc[$booking['mange_id']][] = !empty($booking['foc']) ? $booking['foc'] : 0;
                $total[$booking['mange_id']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];

                if ($booking['over_id'] > 0) {
                    $adult[$booking['over_manage']][] = !empty($booking['adult']) ? $booking['adult'] : 0;
                    $child[$booking['over_manage']][] = !empty($booking['child']) ? $booking['child'] : 0;
                    $infant[$booking['over_manage']][] = !empty($booking['infant']) ? $booking['infant'] : 0;
                    $foc[$booking['over_manage']][] = !empty($booking['foc']) ? $booking['foc'] : 0;
                    $total[$booking['over_manage']][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];
                }
            }
        }
    }

    $first_manage = array();
    $manages = $manageObj->show_manage_boat($_POST['date'], 'all', 0);
    if (!empty($manages)) {
        foreach ($manages as $manage) {
            if (in_array($manage['id'], $first_manage) == false) {
                $first_manage[] = $manage['id'];
                $mange_id[] = !empty($manage['id']) ? $manage['id'] : 0;
                $boat_name[$manage['id']] = !empty($manage['boat_name']) ? $manage['boat_name'] : '';
                $guide_name[$manage['id']] = !empty($manage['guide_name']) ? $manage['guide_name'] : '';
                $color_hex[$manage['id']] = !empty($manage['color_hex']) ? $manage['color_hex'] : '';
            }
        }
    }
?>
    <div class="text-center">
        <h5 class="card-title text-danger"><?php echo date('j F Y', strtotime($_POST['date'])); ?></h5>
    </div>
    <div class="card-body p-0">
        <?php if (!empty($mange_id)) {
            for ($i = 0; $i < count($mange_id); $i++) {
                $id = $mange_id[$i];
                if (!empty($bo_id[$id])) { ?>
                    <div class="row text-center mx-0">
                        <div class="col-4 border-top border-right text-left py-50 pb-1">
                            <h5 class="card-text text-warning mb-0"><?php echo $guide_name[$id]; ?></h5>
                            <h4 class="font-weight-bolder mb-0" style="color: <?php echo $color_hex[$id]; ?>;">
                                <?php echo $boat_name[$id]; ?>
                            </h4>
                        </div>
                        <div class="col-2 border-top border-right py-50 pb-1">
                            <small class="card-text text-muted mb-0">Booking</small>
                            <h4 class="font-weight-bolder mb-0"><?php echo !empty($bo_id[$id]) ? count($bo_id[$id]) : 0; ?></h4>
                        </div>
                        <div class="col-2 border-top border-right py-50 pb-1">
                            <small class="card-text text-muted mb-0">Total</small>
                            <h4 class="font-weight-bolder mb-0"><?php echo !empty($total[$id]) ? !empty($chrage_tourist[$id]) ? array_sum($total[$id]) - array_sum($chrage_tourist[$id]) : array_sum($total[$id]) : 0; ?></h4>
                        </div>
                        <div class="col-1 border-top border-right py-50 pb-1">
                            <small class="card-text text-muted mb-0">AD</small>
                            <h4 class="font-weight-bolder mb-0"><?php echo !empty($adult[$id]) ? !empty($chrage_adult[$id]) ? array_sum($adult[$id]) - array_sum($chrage_adult[$id]) : array_sum($adult[$id]) : 0; ?></h4>
                        </div>
                        <div class="col-1 border-top border-right py-50 pb-1">
                            <small class="card-text text-muted mb-0">CHD</small>
                            <h4 class="font-weight-bolder mb-0"><?php echo !empty($child[$id]) ? !empty($chrage_child[$id]) ? array_sum($child[$id]) - array_sum($chrage_child[$id]) : array_sum($child[$id]) : 0; ?></h4>
                        </div>
                        <div class="col-1 border-top border-right py-50 pb-1">
                            <small class="card-text text-muted mb-0">INF</small>
                            <h4 class="font-weight-bolder mb-0"><?php echo !empty($infant[$id]) ? !empty($chrage_infant[$id]) ? array_sum($infant[$id]) - array_sum($chrage_infant[$id]) : array_sum($infant[$id]) : 0; ?></h4>
                        </div>
                        <div class="col-1 border-top py-50 pb-1">
                            <small class="card-text text-muted mb-0">FOC</small>
                            <h4 class="font-weight-bolder mb-0"><?php echo !empty($foc[$id]) ? array_sum($foc[$id]) : 0; ?></h4>
                        </div>
                    </div>
        <?php }
            }
        } ?>
    </div>
<?php
} else {
    echo false;
}
