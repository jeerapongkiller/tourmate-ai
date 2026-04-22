<?php
require_once '../../../config/env.php';
require_once '../../../controllers/Booking.php';

$bookObj = new Booking();
$times = date("H:i:s");
$today = date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime(" +1 day"));
// $today = '2024-09-29';
// $tomorrow = '2024-09-30';

if (isset($_POST['action']) && $_POST['action'] == "search" && !empty($_POST['type_date']) && !empty($_POST['type'])) {
    switch ($_POST['type_date']) {
        case 'today':
            $travel_date = $today;
            break;
        case 'tomorrow':
            $travel_date = $tomorrow;
            break;
        default:
            $travel_date = !empty($_POST['date']) ? $_POST['date'] : '0000-00-00';
            break;
    }

    $first_boat = array();
    $first_driver = array();
    $first_book = array();
    $first_bpr = array();
    $bookings = $bookObj->showlist('all', 'all', 'all', 'all', $travel_date, '', '', '');
    if (!empty($bookings)) {
        foreach ($bookings as $booking) {
            if ($booking['booksta_id'] != 3) {
                # --- get value booking --- #
                if (in_array($booking['id'], $first_book) == false) {
                    $first_book[] = $booking['id'];
                    $bo_id[] = !empty($booking['id']) ? $booking['id'] : 0;
                    $mange_product[$booking['product_id']]['bo_id'][] = !empty($booking['id']) ? $booking['id'] : 0;

                    $chrage_id[] = !empty($booking['chrage_id']) ? $booking['chrage_id'] : 0;
                    $chrage_adult[] = !empty($booking['chrage_adult']) ? $booking['chrage_adult'] : 0;
                    $chrage_child[] = !empty($booking['chrage_child']) ? $booking['chrage_child'] : 0;
                    $chrage_infant[] = !empty($booking['chrage_infant']) ? $booking['chrage_infant'] : 0;
                }
                # --- get value booking --- #
                if (in_array($booking['bpr_id'], $first_bpr) == false) {
                    $first_bpr[] = $booking['bpr_id'];
                    $adult[] = !empty($booking['adult']) ? $booking['adult'] : 0;
                    $child[] = !empty($booking['child']) ? $booking['child'] : 0;
                    $infant[] = !empty($booking['infant']) ? $booking['infant'] : 0;
                    $foc[] = !empty($booking['foc']) ? $booking['foc'] : 0;
                    $total[] = $booking['booking_type_id'] == 1 ? $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'] : 0;
                    $private[] = $booking['booking_type_id'] == 2 ?  $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'] : 0;

                    $mange_product[$booking['product_id']]['totalrist'][] = $booking['adult'] + $booking['child'] + $booking['infant'] + $booking['foc'];
                }
            }
        }
    }
?>

    <?php if ($_POST['type'] == 'boat') { ?>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center p-1 ">
                <h5 class="card-title"><?php echo $_POST['type_date'] == 'today' ? 'Today' : 'Tomorrow'; ?></h5>
                <h5 class="card-title"><?php echo date('j F Y', strtotime($travel_date)); ?></h5>
            </div>
            <div class="card-body p-0">
                <?php if (!empty($mange_boat['id'])) {
                    for ($i = 0; $i < count($mange_boat['id']); $i++) {
                        $id = $mange_boat['id'][$i]; ?>
                        <div class="row text-center mx-0">
                            <div class="col-4 border-top border-right text-left py-50 pb-1">
                                <h5 class="card-text text-warning mb-0"><?php echo $mange_boat['guide'][$i]; ?></h5>
                                <h4 class="font-weight-bolder mb-0" style="color: <?php echo $mange_boat['color_hex'][$i]; ?>;">
                                    <?php echo $mange_boat['name'][$i]; ?>
                                </h4>
                            </div>
                            <div class="col-2 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">Booking</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_boat[$id]['bo_id']) ? count($mange_boat[$id]['bo_id']) : 0; ?></h4>
                            </div>
                            <div class="col-2 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">Total</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_boat[$id]['adult']) ? array_sum($mange_boat[$id]['adult']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">AD</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_boat[$id]['total']) ? array_sum($mange_boat[$id]['total']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">CHD</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_boat[$id]['child']) ? array_sum($mange_boat[$id]['child']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">INF</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_boat[$id]['infant']) ? array_sum($mange_boat[$id]['infant']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top py-50 pb-1">
                                <small class="card-text text-muted mb-0">FOC</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_boat[$id]['foc']) ? array_sum($mange_boat[$id]['foc']) : 0; ?></h4>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    <?php } elseif ($_POST['type'] == 'driver') { ?>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center p-1 ">
                <h5 class="card-title"><?php echo $_POST['type_date'] == 'today' ? 'Today' : 'Tomorrow'; ?></h5>
                <h5 class="card-title"><?php echo date('j F Y', strtotime($travel_date)); ?></h5>
            </div>
            <div class="card-body p-0">
                <?php if (!empty($mange_trans['id'])) {
                    for ($i = 0; $i < count($mange_trans['id']); $i++) {
                        $id = $mange_trans['id'][$i]; ?>
                        <div class="row text-center mx-0">
                            <div class="col-4 border-top border-right text-left py-50 pb-1">
                                <h5 class="card-text text-warning mb-0"><?php echo $mange_trans['license'][$i]; ?></h5>
                                <h4 class="font-weight-bolder text-danger mb-0">
                                    <?php echo $mange_trans['name'][$i]; ?>
                                </h4>
                            </div>
                            <div class="col-2 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">Booking</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_trans[$id]['bo_id']) ? count($mange_trans[$id]['bo_id']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">Total</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_trans[$id]['total']) ? array_sum($mange_trans[$id]['total']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">Total</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_trans[$id]['total']) ? array_sum($mange_trans[$id]['total']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">AD</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_trans[$id]['adult']) ? array_sum($mange_trans[$id]['adult']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">CHD</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_trans[$id]['child']) ? array_sum($mange_trans[$id]['child']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top border-right py-50 pb-1">
                                <small class="card-text text-muted mb-0">INF</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_trans[$id]['infant']) ? array_sum($mange_trans[$id]['infant']) : 0; ?></h4>
                            </div>
                            <div class="col-1 border-top py-50 pb-1">
                                <small class="card-text text-muted mb-0">FOC</small>
                                <h4 class="font-weight-bolder mb-0"><?php echo !empty($mange_trans[$id]['foc']) ? array_sum($mange_trans[$id]['foc']) : 0; ?></h4>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    <?php } elseif ($_POST['type'] == 'booking') { ?>
        <div class="text-center">
            <h5 class="card-title text-danger"><?php echo date('j F Y', strtotime($travel_date)); ?></h5>
        </div>
        <div class="row text-center mx-0">
            <div class="col-2 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">Booking</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($bo_id) ? count($bo_id) : 0; ?></h1>
            </div>
            <div class="col-2 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">Total</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($total) ? array_sum($total) : 0; ?></h1>
            </div>
            <div class="col-2 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">Private</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($private) ? array_sum($private) : 0; ?></h1>
            </div>
            <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">AD</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($adult) ? ($chrage_adult) ? (array_sum($adult) - array_sum($chrage_adult)) : array_sum($adult)  : 0; ?></h1>
            </div>
            <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">CHD</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($child) ? ($chrage_child) ? (array_sum($child) - array_sum($chrage_child)) : array_sum($child) : 0; ?></h1>
            </div>
            <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">INF</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($infant) ? ($chrage_infant) ? (array_sum($infant) - array_sum($chrage_infant)) : array_sum($infant) : 0; ?></h1>
            </div>
            <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">FOC</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($foc) ? array_sum($foc) : 0; ?></h1>
            </div>
             <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">ไม่มา</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($chrage_id) ? array_sum($chrage_adult) + array_sum($chrage_child) + array_sum($chrage_infant) : 0; ?></h1>
            </div>
            <!-- <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">Form Phuket</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($mange_product[12]['totalrist']) ? array_sum($mange_product[12]['totalrist']) : 0; ?></h1>
            </div>
            <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">Form Khaolak</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($mange_product[13]['totalrist']) ? array_sum($mange_product[13]['totalrist']) : 0; ?></h1>
            </div>
            <div class="col-1 border-top border-right py-50 pb-1">
                <small class="card-text text-muted mb-0">From Karbi</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($mange_product[14]['totalrist']) ? array_sum($mange_product[14]['totalrist']) : 0; ?></h1>
            </div>
            <div class="col-1 border-top py-50 pb-1">
                <small class="card-text text-muted mb-0">No Transfer</small>
                <h1 class="font-weight-bolder text-primary mb-0"><?php echo !empty($mange_product[15]['totalrist']) ? array_sum($mange_product[15]['totalrist']) : 0; ?></h1>
            </div> -->
        </div>
    <?php } ?>
<?php
} else {
    echo false;
}
