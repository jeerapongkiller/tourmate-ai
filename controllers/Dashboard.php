<?php
require_once __DIR__ . '/DB.php';

class Dashboard extends DB
{
    public $response = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function showlist(string $search_travel, $search_island)
    {
        $query = "SELECT BO.*,
                        BONO.bo_full as book_full,
                        BSTA.id as booksta_id, BSTA.name as booksta_name, BSTA.name_class as booksta_class, BSTA.button_class as booksta_button,
                        BTYE.name as booktye_name,
                        BOPA.id as bopa_id, BOPA.status_cot as status_cot, BOPA.total_paid as total_paid, BOPA.updated_at as bopa_updated,
                        BOPAY.id as bopay_id, BOPAY.name as bopay_name, BOPAY.name_class as bopay_name_class, BOPAY.created_at as bopay_created,
                        COMP.name as comp_name,
                        CUS.name as cus_name, CUS.head as cus_head,
                        BP.id as bp_id, BP.travel_date as travel_date, BP.overnight as overnight, BP.note as note,
                        PROD.id as product_id, PROD.name as product_name,
                        CATE.name as category_name,
                        BPR.id as bpr_id, BPR.category_id as category_id, BPR.adult as adult, BPR.child as child, BPR.infant as infant, BPR.foc as foc, 
                        BPR.rates_adult as rates_adult, BPR.rates_child as rates_child, BPR.rates_infant as rates_infant, BPR.rates_private as rates_private,   
                        BT.id as bt_id, BT.start_pickup as start_pickup, BT.end_pickup as end_pickup, BT.hotel_pickup as hotel_pickup, 
                        BT.hotel_dropoff as hotel_dropoff, BT.room_no as room_no, BT.pickup_type as pickup_type, BT.status as bt_status,
                        PICKUP.id as pickup_id, PICKUP.name_th as hotel_pickup_name,
                        DROPOFF.id as dropoff_id, DROPOFF.name_th as hotel_dropoff_name,
                        BEC.id as bec_id, BEC.name as bec_name, BEC.adult as bec_adult, BEC.child as bec_child, BEC.infant as bec_infant, BEC.privates as bec_privates, BEC.type as bec_type,
                        BEC.rate_adult as bec_rate_adult, BEC.rate_child as bec_rate_child, BEC.rate_infant as bec_rate_infant, BEC.rate_private as bec_rate_private, 
                        EXTRA.id as extra_id, EXTRA.name as extra_name,
                        BOOKER.firstname as booker_fname, BOOKER.lastname as booker_lname,
                        PICK.name as pickup_name, 
                        DROF.name as dropoff_name,
                        MTRAN.id as mtran_id,
                        MBOAT.id as mboat_id, BOB.id as bob_id, BOB.status as boat_status,
                        cars.name as car_name,
                        drivers.name as driver_name,
                        boats.id as boat_id, boats.name as boat_name, boats.color as boat_color, boats.background as boat_background,
                        check_in.id as check_in,
                        park.id as park_id,
                        chrage.id as chrage_id, chrage.adult as chrage_adult, chrage.child as chrage_child, chrage.infant as chrage_infant,
                        discount.id as discount_id, discount.detail as discount_detail, discount.rates as discount_rates
                    FROM bookings BO
                    LEFT JOIN bookings_no BONO
                        ON BO.id = BONO.booking_id
                    LEFT JOIN booking_status BSTA
                        ON BO.booking_status_id = BSTA.id
                    LEFT JOIN booking_type BTYE
                        ON BO.booking_type_id = BTYE.id
                    LEFT JOIN booking_paid BOPA
                        ON BO.id = BOPA.booking_id
                    LEFT JOIN booking_payment BOPAY
                        ON BOPA.booking_payment_id = BOPAY.id
                    LEFT JOIN companies COMP
                        ON BO.company_id = COMP.id
                    LEFT JOIN customers CUS
                        ON BO.id = CUS.booking_id
                    LEFT JOIN nationalitys NATION
                        ON CUS.nationality_id = NATION.id
                    LEFT JOIN booking_products BP
                        ON BO.id = BP.booking_id
                    LEFT JOIN products PROD
                        ON BP.product_id = PROD.id
                    LEFT JOIN park
                        ON PROD.park_id = park.id
                    LEFT JOIN booking_product_rates BPR
                        ON BP.id = BPR.booking_products_id
                    LEFT JOIN product_category CATE
                        ON BPR.category_id = CATE.id
                    LEFT JOIN booking_transfer BT
                        ON BP.id = BT.booking_products_id
                    LEFT JOIN hotel PICKUP
                        ON BT.hotel_pickup_id = PICKUP.id
                    LEFT JOIN hotel DROPOFF
                        ON BT.hotel_dropoff_id = DROPOFF.id
                    LEFT JOIN booking_extra_charge BEC
                        ON BO.id = BEC.booking_id
                    LEFT JOIN extra_charges EXTRA
                        ON BEC.extra_charge_id = EXTRA.id
                    LEFT JOIN zones PICK
                        ON BT.pickup_id = PICK.id
                    LEFT JOIN zones DROF
                        ON BT.dropoff_id = DROF.id
                    
                    LEFT JOIN booking_manage_transfer BOT
                        ON BT.id = BOT.booking_transfer_id
                    LEFT JOIN manage_transfer MTRAN 
                        ON BOT.manage_id = MTRAN.id
                    LEFT JOIN cars
                        ON MTRAN.car_id = cars.id
                    LEFT JOIN drivers
                        ON MTRAN.driver_id = drivers.id

                    LEFT JOIN booking_manage_boat BOB
                        ON BO.id = BOB.booking_id
                    LEFT JOIN manage_boat MBOAT 
                        ON BOB.manage_id = MBOAT.id
                    LEFT JOIN boats 
                        ON MBOAT.boat_id = boats.id

                    LEFT JOIN check_in 
                        ON BO.id = check_in.booking_id
                        AND check_in.type = 3

                    LEFT JOIN bookings_chrage chrage
                        ON BO.id = chrage.booking_id
                    LEFT JOIN bookings_discount discount
                        ON BO.id = discount.booking_id

                    LEFT JOIN users BOOKER 
                        ON BO.booker_id = BOOKER.id
                    WHERE BO.id > 0
        ";

        if ($_SESSION["supplier"]["id"] != 1) {
            $query .= " AND BO.is_deleted = 0 ";
        }

        if (!empty($search_travel) && $search_travel != '0000-00-00') {
            $query .= " AND BP.travel_date = '" . $search_travel . "'";
        }

        if (!empty($search_island) && $search_island != 'all') {
            $query .= " AND park.id = " . $search_island;
        }

        $query .= " ORDER BY PROD.id ASC, BO.id DESC, BP.travel_date ASC, BOPA.id ASC";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function get_values(string $select, string $from, string $where, int $type)
    {
        $query = "SELECT $select
                FROM $from
                WHERE $where
        ";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $type == 0 ? $result->fetch_assoc() : $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showpark()
    {
        $query = "SELECT id, name, is_approved
            FROM park 
            WHERE is_approved = 1
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function update_status(string $action, int $id, int $status)
    {
        if ($action == 'cot') {
            $query = "UPDATE `booking_paid` SET `status_cot` = ? WHERE `id` = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("ii", $status, $id);
        } elseif ($action == 'boat') {
            $query = "UPDATE `booking_manage_boat` SET `status` = ? WHERE `id` = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("ii", $status, $id);
        } elseif ($action == 'transfer') {
            $query = "UPDATE `booking_transfer` SET `status` = ? WHERE `id` = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("ii", $status, $id);
        } elseif ($action == 'confirm') {
            if ($status == 1) {

                $bind_types = "";
                $params = array();

                $query = "INSERT INTO `check_in`(`booking_id`, `type`, `login_id`, `created_at`) VALUES (?, ?, ?, ?) ";

                $bind_types .= "i";
                array_push($params, $id);

                $bind_types .= "i";
                array_push($params, 3);

                $bind_types .= "i";
                array_push($params, $_SESSION["supplier"]["id"]);

                $bind_types .= "s";
                array_push($params, "'" . date("Y-m-d H:i:s") . "'");

                $statement = $this->connection->prepare($query);
                !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';
            } elseif ($status == 0) {
                $query = "DELETE FROM `check_in` WHERE `booking_id` = ? AND `type` = 3";
                $statement = $this->connection->prepare($query);
                $statement->bind_param("i", $id);
            }
        }

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    function insert_extra(int $adult, int $child, int $infant, int $privates, string $rate_adult, string $rate_child, string $rate_infant, string $rate_private, int $booking_id, int $extra_charge_id, int $type)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO  `booking_extra_charge`(`adult`, `child`, `infant`, `privates`, `rate_adult`, `rate_child`, `rate_infant`, `rate_private`, `booking_id`, `extra_charge_id`, `type`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "') ";

        $bind_types .= "i";
        array_push($params, $adult);

        $bind_types .= "i";
        array_push($params, $child);

        $bind_types .= "i";
        array_push($params, $infant);

        $bind_types .= "i";
        array_push($params, $privates);

        $bind_types .= "d";
        array_push($params, $rate_adult);

        $bind_types .= "d";
        array_push($params, $rate_child);

        $bind_types .= "d";
        array_push($params, $rate_infant);

        $bind_types .= "d";
        array_push($params, $rate_private);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $bind_types .= "i";
        array_push($params, $extra_charge_id);

        $bind_types .= "i";
        array_push($params, $type);

        $bind_types .= "i";
        array_push($params, 1);

        $bind_types .= "i";
        array_push($params, 0);

        // $bind_types .= "s";
        // array_push($params, "'" . date("Y-m-d H:i:s") . "'");

        // $bind_types .= "s";
        // array_push($params, "'" . date("Y-m-d H:i:s") . "'");

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_extra(int $adult, int $child, int $infant, int $privates, string $rate_adult, string $rate_child, string $rate_infant, string $rate_private, int $boat_type, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE booking_extra_charge SET";

        $query .= " adult = ?,";
        $bind_types .= "i";
        array_push($params, $adult);

        $query .= " child = ?,";
        $bind_types .= "i";
        array_push($params, $child);

        $query .= " infant = ?,";
        $bind_types .= "i";
        array_push($params, $infant);

        $query .= " privates = ?,";
        $bind_types .= "i";
        array_push($params, $privates);

        $query .= " rate_adult = ?,";
        $bind_types .= "d";
        array_push($params, $rate_adult);

        $query .= " rate_child = ?,";
        $bind_types .= "d";
        array_push($params, $rate_child);

        $query .= " rate_infant = ?,";
        $bind_types .= "d";
        array_push($params, $rate_infant);

        $query .= " rate_private = ?,";
        $bind_types .= "d";
        array_push($params, $rate_private);

        $query .= " type = ?,";
        $bind_types .= "i";
        array_push($params, $boat_type);

        $query .= " updated_at = '" . date("Y-m-d H:i:s") . "'";

        $query .= " WHERE id = ?";
        $bind_types .= "i";
        array_push($params, $id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    function insert_chrage(int $adult, int $child, int $infant, int $booking_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `bookings_chrage`(`adult`, `child`, `infant`, `booking_id`, `updated_at`, `created_at`)
        VALUES (?, ?, ?, ?, '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "') ";

        $bind_types .= "i";
        array_push($params, $adult);

        $bind_types .= "i";
        array_push($params, $child);

        $bind_types .= "i";
        array_push($params, $infant);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_chrage(int $adult, int $child, int $infant, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `bookings_chrage` SET";

        $query .= " adult = ?,";
        $bind_types .= "i";
        array_push($params, $adult);

        $query .= " child = ?,";
        $bind_types .= "i";
        array_push($params, $child);

        $query .= " infant = ?,";
        $bind_types .= "i";
        array_push($params, $infant);

        $query .= " updated_at = '" . date("Y-m-d H:i:s") . "'";

        $query .= " WHERE id = ?";
        $bind_types .= "i";
        array_push($params, $id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    function insert_discount(string $detail, string $rates, int $booking_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `bookings_discount`(`detail`, `rates`, `booking_id`, `created_at`)
        VALUES (?, ?, ?, '" . date("Y-m-d H:i:s") . "') ";

        $bind_types .= "s";
        array_push($params, $detail);

        $bind_types .= "d";
        array_push($params, $rates);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_discount(string $detail, string $rates, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `bookings_discount` SET";

        $query .= " detail = ?,";
        $bind_types .= "s";
        array_push($params, $detail);

        $query .= " rates = ?";
        $bind_types .= "d";
        array_push($params, $rates);

        $query .= " WHERE id = ?";
        $bind_types .= "i";
        array_push($params, $id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_discount(int $id)
    {
        $query = "DELETE FROM `bookings_discount` WHERE id = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_note(string $note, int $bo_id)
    {
        $query = "UPDATE `booking_products` SET `note` = ? WHERE `booking_id` = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("si", $note, $bo_id);

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }
}
