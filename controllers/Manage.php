<?php
require_once __DIR__ . '/DB.php';

class Manage extends DB
{
    public $response = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function showproducts()
    {
        $query = "SELECT *
            FROM products
            WHERE is_approved = 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showparks()
    {
        $query = "SELECT *
            FROM park
            WHERE is_approved = 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showliststatus()
    {
        $query = "SELECT id, name, button_class
            FROM booking_status 
            WHERE id > 0
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showlistagent()
    {
        $query = "SELECT companies.*, companies_type.id as comptypeId, companies_type.name as comptypeName
            FROM companies 
            LEFT JOIN companies_type
                ON companies.company_type_id = companies_type.id
            WHERE companies.is_deleted = 0 AND companies.company_type_id = 2
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showlistproduct()
    {
        $query = "SELECT *
            FROM products 
            WHERE is_deleted = 0
        ";
        $query .= " ORDER BY id ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showcars()
    {
        $query = "SELECT *
            FROM cars
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showdrivers()
    {
        $query = "SELECT *
            FROM drivers
            WHERE is_approved = 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showguides()
    {
        $query = "SELECT *
            FROM guides
            WHERE is_approved = 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showcolor()
    {
        $query = "SELECT *
            FROM colors
            WHERE is_approved = 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showboats()
    {
        $query = "SELECT *
            FROM boats
            WHERE is_approved = 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function showzones()
    {
        $query = "SELECT *
            FROM zones
            WHERE is_approved = 1
        ";
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
        // echo $query . '<br>';
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $type == 0 ? $result->fetch_assoc() : $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    // Start Get Data Management Transfer
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function showlisttransfers($type, string $travel_date, $car, $driver, $status, $agent, $product, $voucher_no, $refcode, $name, $hotel)
    {
        $bind_types = "";
        $params = array();

        $query = "SELECT BO.*,
                    BONO.bo_full as book_full,
                    BSTA.name as booksta_name, BSTA.name_class as booksta_class, BSTA.button_class as booksta_button,
                    BTYE.name as booktye_name,
                    COMP.id as comp_id, COMP.name as comp_name,
                    BOPA.total_paid as total_paid,
                    BOPAY.name as bopay_name,
                    CUS.id as cus_id, CUS.name as cus_name, CUS.birth_date as birth_date, CUS.id_card as id_card, CUS.telephone as telephone, CUS.head as cus_head, CUS.nationality_id as nationality_id,
                    NATION.name as nation_name,
                    BP.id as bp_id, BP.travel_date as travel_date, BP.overnight as overnight, BP.note as note,
                    PROD.id as product_id, PROD.name as product_name,
                    CATE.id as category_id, CATE.name as category_name, CATE.transfer as category_transfer,
                    BPR.id as bpr_id, BPR.adult as adult, BPR.child as child, BPR.infant as infant, BPR.foc as foc, 
                    BPR.rates_adult as rates_adult, BPR.rates_child as rates_child, BPR.rates_infant as rates_infant, BPR.rates_private as rates_private,   
                    BT.id as bt_id, BT.start_pickup as start_pickup, BT.end_pickup as end_pickup, BT.pickup_type as pickup_type,
                    BT.room_no as room_no, BT.note as bt_note, BT.hotel_pickup as outside, BT.hotel_dropoff as outside_dropoff,
                    PICKUP.id as pickup_id, PICKUP.name as pickup_name,
                    HDROPOFF.id as hdropoff_id, HDROPOFF.name as dropoff_name,
                    ZONE_P.id as zonep_id, ZONE_P.name_th as zonep_name, ZONE_P.provinces as province_id, 
                    ZONE_D.id as zoned_id, ZONE_D.name_th as zoned_name,
                    BEC.id as bec_id, BEC.name as bec_name, BEC.adult as bec_adult, BEC.child as bec_child, BEC.infant as bec_infant, BEC.privates as bec_privates, BEC.type as bec_type,
                    BEC.rate_adult as bec_rate_adult, BEC.rate_child as bec_rate_child, BEC.rate_infant as bec_rate_infant, BEC.rate_private as bec_rate_private, 
                    EXTRA.id as extra_id, EXTRA.name as extra_name, EXTRA.unit as extra_unit,
                    BOMANGE.id as bomange_id, BOMANGE.arrange as arrange,
                    MANGE.id as mange_id, MANGE.note as mange_note, 
                    MANGE.license as license, MANGE.seat as seat, MANGE.telephone as manage_telephone,
                    CAR.id as car_id, CAR.name as car_name,
                    DRIVER.id as driver_id, DRIVER.name as driver_name,
                    MANGEB.id as mangeb_id,
                    BOAT.id as boat_id, BOAT.name as boat_name, BOAT.refcode as boat_refcode,
                    ONIGHT.id as over_id, ONIGHT.manage_id as over_manage,
                    DROPOFF.id as dropoff_id, DROPOFF.manage_id as dropoff_manage,
                    chrage.id as chrage_id, chrage.adult as chrage_adult, chrage.child as chrage_child, chrage.infant as chrage_infant
                FROM bookings BO
                LEFT JOIN bookings_no BONO
                    ON BO.id = BONO.booking_id
                LEFT JOIN booking_status BSTA
                    ON BO.booking_status_id = BSTA.id
                LEFT JOIN booking_type BTYE
                    ON BO.booking_type_id = BTYE.id
                LEFT JOIN companies COMP
                    ON BO.company_id = COMP.id
                LEFT JOIN booking_paid BOPA
                    ON BO.id = BOPA.booking_id
                    AND BOPA.booking_payment_id = 4
                LEFT JOIN booking_payment BOPAY
                    ON BOPA.booking_payment_id = BOPAY.id
                LEFT JOIN customers CUS
                    ON BO.id = CUS.booking_id
                LEFT JOIN nationalitys NATION
                    ON CUS.nationality_id = NATION.id
                LEFT JOIN booking_products BP
                    ON BO.id = BP.booking_id
                LEFT JOIN booking_product_rates BPR
                    ON BP.id = BPR.booking_products_id
                LEFT JOIN products PROD
                    ON BP.product_id = PROD.id
                LEFT JOIN product_category CATE
                    ON BPR.category_id = CATE.id
                LEFT JOIN booking_transfer BT
                    ON BP.id = BT.booking_products_id
                LEFT JOIN hotel PICKUP
                    ON BT.hotel_pickup_id = PICKUP.id
                LEFT JOIN hotel HDROPOFF
                    ON BT.hotel_dropoff_id = HDROPOFF.id
                LEFT JOIN zones ZONE_P
                    ON BT.pickup_id = ZONE_P.id
                LEFT JOIN zones ZONE_D
                    ON BT.dropoff_id = ZONE_D.id
                LEFT JOIN booking_extra_charge BEC
                    ON BO.id = BEC.booking_id
                LEFT JOIN extra_charges EXTRA
                    ON BEC.extra_charge_id = EXTRA.id
                LEFT JOIN booking_manage_transfer BOMANGE
                    ON BT.id = BOMANGE.booking_transfer_id
                LEFT JOIN manage_transfer MANGE 
                    ON BOMANGE.manage_id = MANGE.id
                LEFT JOIN cars CAR
                    ON MANGE.car_id = CAR.id
                LEFT JOIN drivers DRIVER
                    ON MANGE.driver_id = DRIVER.id
                LEFT JOIN booking_manage_boat BORDB
                    ON BO.id = BORDB.booking_id
                LEFT JOIN manage_boat MANGEB 
                    ON BORDB.manage_id = MANGEB.id
                LEFT JOIN boats BOAT
                    ON MANGEB.boat_id = BOAT.id
                LEFT JOIN overnight_transfers ONIGHT 
                    ON ONIGHT.booking_transfer_id = BT.id
                LEFT JOIN dropoff_transfers DROPOFF 
                    ON DROPOFF.booking_transfer_id = BT.id
                LEFT JOIN bookings_chrage chrage
                    ON BO.id = chrage.booking_id
                WHERE BO.id > 0
                AND BO.booking_status_id != 3
                AND BO.booking_status_id != 4
                AND CATE.transfer > 0
                AND (BT.pickup_type = 1 OR BT.pickup_type = 3)
        ";

        $query .= (!empty($status) && $status != 'all') ? " AND BSTA.id = " . $status : "";
        $query .= (!empty($agent) && $agent != 'all') ? " AND COMP.id = " . $agent : "";
        $query .= (!empty($product) && $product != 'all') ? " AND PROD.id = " . $product : "";
        $query .= (!empty($voucher_no)) ? " AND BO.voucher_no_agent LIKE '%" . $voucher_no . "%' " : "";
        $query .= (!empty($refcode)) ? " AND BONO.bo_full LIKE '%" . $refcode . "%' " : "";
        $query .= (!empty($name)) ? " AND CUS.name LIKE '%" . $name . "%' " : "";
        $query .= (!empty($hotel)) ? " AND BT.hotel_pickup LIKE '%" . $hotel . "%' " : "";

        if (!empty($type) && $type == 'manage') {

            $query .= " AND BP.is_deleted = 0 ";

            if (isset($travel_date) && $travel_date != '0000-00-00') {
                $query .= " AND BP.travel_date  = ?";
                $bind_types .= "s";
                array_push($params, $travel_date);
            }

            $query .= " ORDER BY PROD.id DESC, BOMANGE.arrange ASC, BT.start_pickup ASC, CATE.id ASC, BT.hotel_pickup ASC ";
        }

        if (!empty($type) && $type == 'list') {
            if (isset($travel_date) && $travel_date != '0000-00-00') {
                $query .= " AND BP.travel_date  = ?";
                $bind_types .= "s";
                array_push($params, $travel_date);
            }
        }

        if (!empty($type) && $type == 'all') {

            $query .= " AND BP.is_deleted = 0 ";

            // if (isset($travel_date) && $travel_date != '0000-00-00') {
            //     $query .= " AND BP.travel_date  = ?";
            //     $bind_types .= "s";
            //     array_push($params, $travel_date);
            // }

            $query .=
                (!empty($travel_date) && $travel_date != '0000-00-00') ?
                " AND (BP.travel_date = '" . $travel_date . "'" . " OR BP.overnight = '" . $travel_date . "')" :
                "";

            // if (isset($car) && $car != 'all') {
            //     $query .= " AND MANGE.car_id  = ?";
            //     $bind_types .= "i";
            //     array_push($params, $car);
            // }

            // if (isset($driver) && $driver != 'all') {
            //     $query .= " AND DRIVER.id  = ?";
            //     $bind_types .= "i";
            //     array_push($params, $driver);
            // }

            $query .= " ORDER BY PROD.id ASC, BOMANGE.arrange ASC, CATE.id ASC ";
        }

        if (!empty($type) && $type == 'report') {

            $query .= " AND BP.is_deleted = 0 ";

            $query .=
                (!empty($travel_date) && $travel_date != '0000-00-00') ?
                " AND (BP.travel_date = '" . $travel_date . "'" . " OR BP.overnight = '" . $travel_date . "')" :
                "";
        }

        // echo $query;
        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_manage_transfer(string $travel_date, $car, $driver, $product)
    {
        $query = "SELECT manage.*,
                BOMAN.arrange as arrange, BOMAN.booking_transfer_id as boman_bt,
                CAR.id as car_id, CAR.name as car_name, CAR.car_registration as registration,
                DRIVER.id as driver_id, DRIVER.name as driver_name,
                products.id as product_id, products.name as product_name
            FROM manage_transfer manage
            LEFT JOIN booking_manage_transfer BOMAN
                ON manage.id = BOMAN.manage_id
            LEFT JOIN cars CAR
                ON manage.car_id = CAR.id
            LEFT JOIN drivers DRIVER
                ON manage.driver_id = DRIVER.id
            LEFT JOIN products
                ON manage.product_id = products.id
            WHERE manage.id > 0
            AND manage.travel_date = ?
        ";

        $query .= (isset($car) && $car != 'all') ? " AND CAR.id = " . $car : "";
        $query .= (isset($driver) && $driver != 'all') ? " AND DRIVER.id = " . $driver : "";
        $query .= (isset($product) && $product != 'all') ? " AND products.id = " . $product : "";

        $query .= " ORDER BY products.id ASC, manage.id ASC";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $travel_date);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function insert_car(string $name)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `cars`(`name`, `is_approved`, `is_deleted`, `created_at`, `updated_at`)
        VALUES (?, 1, 0, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $name);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function insert_driver(string $name, string $telephone, string $license, int $seat)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `drivers`(`name`, `telephone`, `number_plate`, `seat`, `is_approved`, `is_deleted`, `created_at`, `updated_at`)
        VALUES (?, ?, ?, ?, 1, 0, NOW(), NOW())";

        $bind_types .= "sssi";
        array_push($params, $name, $telephone, $license, $seat);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function insert_manage_transfer(string $outside_car, string $outside_driver, string $license, string $telephone, string $travel_date, string $note, int $seat, int $driver_id, int $car_id, int $product_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `manage_transfer`(`outside_car`, `outside_driver`, `license`, `telephone`, `travel_date`, `note`, `seat`, `driver_id`, `car_id`, `product_id`, `created_at`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $bind_types .= "s";
        array_push($params, $outside_car);

        $bind_types .= "s";
        array_push($params, $outside_driver);

        $bind_types .= "s";
        array_push($params, $license);

        $bind_types .= "s";
        array_push($params, $telephone);

        $bind_types .= "s";
        array_push($params, $travel_date);

        $bind_types .= "s";
        array_push($params, $note);

        $bind_types .= "i";
        array_push($params, $seat);

        $bind_types .= "i";
        array_push($params, $driver_id);

        $bind_types .= "i";
        array_push($params, $car_id);

        $bind_types .= "i";
        array_push($params, $product_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_manage_transfer(string $outside_car, string $outside_driver, string $license, string $telephone, string $note, int $seat, int $driver_id, int $car_id, int $product_id, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `manage_transfer` SET";

        $query .= " outside_car = ?, ";
        $bind_types .= "s";
        array_push($params, $outside_car);

        $query .= " outside_driver = ?, ";
        $bind_types .= "s";
        array_push($params, $outside_driver);

        $query .= " license = ?, ";
        $bind_types .= "s";
        array_push($params, $license);

        $query .= " telephone = ?, ";
        $bind_types .= "s";
        array_push($params, $telephone);

        $query .= " note = ?, ";
        $bind_types .= "s";
        array_push($params, $note);

        $query .= " seat = ?,";
        $bind_types .= "i";
        array_push($params, $seat);

        $query .= " driver_id = ?, ";
        $bind_types .= "i";
        array_push($params, $driver_id);

        $query .= " car_id = ?, ";
        $bind_types .= "i";
        array_push($params, $car_id);

        $query .= " product_id = ? ";
        $bind_types .= "i";
        array_push($params, $product_id);

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

    public function delete_manage_transfer(int $manage_id)
    {
        $query = "DELETE FROM `manage_transfer` WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $manage_id);
        $statement->execute();

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function insert_manage_booking(int $arrange, int $adult, int $child, int $infant, int $foc, int $manage_id, int $booking_transfer_id)
    {
        # --- ดึง travel_date และ island_id จาก booking_transfer --- #
        $query = "
            SELECT booking_products.travel_date, products.id as product_id
            FROM booking_transfer
            LEFT JOIN booking_products ON booking_transfer.booking_products_id = booking_products.id
            LEFT JOIN products ON booking_products.product_id = products.id
            WHERE booking_transfer.id = ?
        ";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $booking_transfer_id);
        $statement->execute();
        $booking = $statement->get_result()->fetch_assoc();

        # --- ดึง travel_date และ product_id จาก manage_transfer --- #
        $query = "SELECT travel_date, product_id FROM manage_transfer WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $manage_id);
        $statement->execute();
        $car = $statement->get_result()->fetch_assoc();

        # --- เช็ควันที่ + island --- #
        $booking_date = isset($booking['travel_date']) ? substr($booking['travel_date'], 0, 10) : null;
        $car_date     = isset($car['travel_date']) ? substr($car['travel_date'], 0, 10) : null;

        if ($booking_date !== $car_date || $booking['product_id'] != $car['product_id']) {
            return false; // ไม่ตรง return false
        }

        $query = "
            SELECT id 
            FROM booking_manage_transfer 
            WHERE booking_transfer_id = ?
            LIMIT 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $booking_transfer_id);
        $statement->execute();
        $exists = $statement->get_result()->num_rows;

        if ($exists > 0) {
            return false; // booking นี้ถูกจัดรถแล้ว
        }

        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `booking_manage_transfer`(`arrange`, `adult`, `child`, `infant`, `foc`, `manage_id`, `booking_transfer_id`, `created_at`)
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

        $bind_types .= "i";
        array_push($params, $arrange);

        $bind_types .= "i";
        array_push($params, $adult);

        $bind_types .= "i";
        array_push($params, $child);

        $bind_types .= "i";
        array_push($params, $infant);

        $bind_types .= "i";
        array_push($params, $foc);

        $bind_types .= "i";
        array_push($params, $manage_id);

        $bind_types .= "i";
        array_push($params, $booking_transfer_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_manage_booking(int $brfore_manage_id, int $arrange, int $manage_id, int $bt_id)
    {
        # --- ดึงข้อมูล booking --- #
        $query = "
            SELECT booking_products.travel_date, products.id as product_id
            FROM booking_transfer
            LEFT JOIN booking_products ON booking_transfer.booking_products_id = booking_products.id
            LEFT JOIN products ON booking_products.product_id = products.id
            WHERE booking_transfer.id = ?
        ";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $bt_id);
        $stmt->execute();
        $booking = $stmt->get_result()->fetch_assoc();

        # --- ดึงข้อมูลรถ (manage_transfer) --- #
        $query = "SELECT travel_date, product_id FROM manage_transfer WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $manage_id);
        $stmt->execute();
        $car = $stmt->get_result()->fetch_assoc();

        # --- เช็ควันที่ + island --- #
        $booking_date = isset($booking['travel_date']) ? substr($booking['travel_date'], 0, 10) : null;
        $car_date     = isset($car['travel_date']) ? substr($car['travel_date'], 0, 10) : null;

        if ($booking_date !== $car_date || $booking['product_id'] != $car['product_id']) {
            return false; // ไม่ตรง return false
        }

        $query = "
            SELECT id 
            FROM booking_manage_transfer 
            WHERE booking_transfer_id = ?
            AND manage_id != ?
            LIMIT 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("ii", $bt_id, $manage_id);
        $statement->execute();

        if ($statement->get_result()->num_rows > 0) {
            return false;
        }

        $bind_types = "";
        $params = array();

        $query = "UPDATE `booking_manage_transfer` SET";

        if ($brfore_manage_id > 0) {

            if ($manage_id > 0) {
                $query .= " manage_id = ?";
                $bind_types .= "i";
                array_push($params, $manage_id);
            }

            $query .= " WHERE booking_transfer_id = ?";
            $bind_types .= "i";
            array_push($params, $bt_id);

            $query .= " AND manage_id = ?";
            $bind_types .= "i";
            array_push($params, $brfore_manage_id);
        } else {

            if ($arrange > 0) {
                $query .= " arrange = ?";
                $bind_types .= "i";
                array_push($params, $arrange);
            }

            $query .= " WHERE booking_transfer_id = ?";
            $bind_types .= "i";
            array_push($params, $bt_id);

            $query .= " AND manage_id = ?";
            $bind_types .= "i";
            array_push($params, $manage_id);
        }

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_manage_booking(int $manage_id, int $bt_id)
    {
        $query = "DELETE FROM `booking_manage_transfer` ";
        $query .= ($manage_id > 0) ? ' WHERE manage_id = ' . $manage_id : '';
        $query .= ($bt_id > 0) ? ($manage_id > 0) ? ' AND booking_transfer_id = ' . $bt_id : ' WHERE booking_transfer_id = ' . $bt_id : '';

        // echo $query;
        $statement = $this->connection->prepare($query);
        $statement->execute();

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function insert_overnight_transfer(int $bt_id, int $manage_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `overnight_transfers`(`manage_id`, `booking_transfer_id`, `created_at`)
        VALUES (?, ?, NOW())";

        $bind_types .= "ii";
        array_push($params, $manage_id, $bt_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_overnight_transfer(int $manage_id, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `overnight_transfers` SET";

        $query .= " manage_id = ?";
        $bind_types .= "i";
        array_push($params, $manage_id);

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

    public function delete_overnight_transfer(int $manage_id, int $id)
    {
        $query = "DELETE FROM `overnight_transfers` ";
        $query .= ($manage_id > 0) ? ' WHERE manage_id = ' . $manage_id : '';
        $query .= ($id > 0) ? ' WHERE id = ' . $id : '';

        $statement = $this->connection->prepare($query);
        // $statement->bind_param("i", $id);
        $statement->execute();

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function insert_dropoff_transfers(int $bt_id, int $manage_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `dropoff_transfers`(`manage_id`, `booking_transfer_id`, `created_at`)
        VALUES (?, ?, NOW())";

        $bind_types .= "ii";
        array_push($params, $manage_id, $bt_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_dropoff_transfers(int $manage_id, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `dropoff_transfers` SET";

        $query .= " manage_id = ?";
        $bind_types .= "i";
        array_push($params, $manage_id);

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

    public function delete_dropoff_transfers(int $manage_id, int $id)
    {
        $query = "DELETE FROM `dropoff_transfers` ";
        $query .= ($manage_id > 0) ? ' WHERE manage_id = ' . $manage_id : '';
        $query .= ($id > 0) ? ' WHERE id = ' . $id : '';

        $statement = $this->connection->prepare($query);
        // $statement->bind_param("i", $id);
        $statement->execute();

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }



    // ฟังก์ชันนับยอดสรุปรถที่จัดแล้ว (Assigned Summary)
    public function get_assigned_van_summary($travel_date)
    {
        $query = "
            SELECT 
                COUNT(DISTINCT MT.id) as total_vans,
                IFNULL((SELECT SUM(pax) FROM booking_manage_transfer WHERE manage_id IN (SELECT id FROM manage_transfer WHERE travel_date = ?)), 0) +
                IFNULL((SELECT SUM(pax) FROM dropoff_transfers WHERE manage_id IN (SELECT id FROM manage_transfer WHERE travel_date = ?)), 0) +
                IFNULL((SELECT SUM(pax) FROM overnight_transfers WHERE manage_id IN (SELECT id FROM manage_transfer WHERE travel_date = ?)), 0) as total_pax
            FROM manage_transfer MT
            WHERE MT.travel_date = ?
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssss", $travel_date, $travel_date, $travel_date, $travel_date);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return $res ? $res : ['total_vans' => 0, 'total_pax' => 0];
    }

    // ดึงตัวกรอง (Filter) เฉพาะรายการที่มี Booking ในวันที่เลือก
    public function get_active_booking_filters(string $travel_date)
    {
        // 1. ดึง Program ที่มีลูกค้าจอง
        $q_prod = "SELECT DISTINCT PROD.id, PROD.name, PROD.park_id 
                   FROM booking_products BP
                   JOIN bookings BO ON BP.booking_id = BO.id
                   JOIN products PROD ON BP.product_id = PROD.id
                   WHERE (BP.travel_date = '$travel_date' OR BP.overnight = '$travel_date') 
                     AND BO.booking_status_id NOT IN (3, 4) AND BP.is_deleted = 0
                     AND PROD.name NOT LIKE '%NO TRANSFER%'";
        $prods = $this->connection->query($q_prod)->fetch_all(MYSQLI_ASSOC);

        // 2. ดึง Zone (ขาไปและกลับ) ที่มีลูกค้าพักอยู่
        $q_zone = "SELECT DISTINCT Z.id, Z.name_th as name, Z.color_hex
                   FROM booking_transfer BT
                   JOIN booking_products BP ON BT.booking_products_id = BP.id
                   JOIN bookings BO ON BP.booking_id = BO.id
                   JOIN zones Z ON (BT.pickup_id = Z.id OR BT.dropoff_id = Z.id)
                   WHERE (BP.travel_date = '$travel_date' OR BP.overnight = '$travel_date') 
                     AND BO.booking_status_id NOT IN (3, 4) AND BP.is_deleted = 0";
        $zones = $this->connection->query($q_zone)->fetch_all(MYSQLI_ASSOC);

        // 3. ดึง Park เฉพาะของ Program ที่หาเจอ
        $park_ids = array_unique(array_column($prods, 'park_id'));
        $parks = [];
        if (!empty($park_ids)) {
            $in_parks = implode(',', $park_ids);
            $q_park = "SELECT id, name FROM park WHERE id IN ($in_parks)";
            $parks = $this->connection->query($q_park)->fetch_all(MYSQLI_ASSOC);
        }

        return ['programs' => $prods, 'zones' => $zones, 'parks' => $parks];
    }

    // ดึงข้อมูลรถที่จัดแล้ว พร้อมรายชื่อลูกค้าข้างใน (Assigned Vans & Bookings)
    public function get_assigned_vans_with_bookings(string $travel_date)
    {
        // 1. ดึงข้อมูลรถทั้งหมดในวันนั้น
        $q_vans = "SELECT MT.id, MT.car_id, MT.driver_id, MT.seat, MT.note, MT.travel_date,
                          C.name as car_name, D.name as driver_name, D.number_plate, D.telephone
                   FROM manage_transfer MT
                   LEFT JOIN cars C ON MT.car_id = C.id
                   LEFT JOIN drivers D ON MT.driver_id = D.id
                   WHERE MT.travel_date = ?";
        $stmt_vans = $this->connection->prepare($q_vans);
        $stmt_vans->bind_param("s", $travel_date);
        $stmt_vans->execute();
        $vans = $stmt_vans->get_result()->fetch_all(MYSQLI_ASSOC);

        // 2. ดึง Booking ยัดใส่รถแต่ละคัน
        foreach ($vans as &$van) {
            $manage_id = $van['id'];

            // Query ดึง Booking ที่ผูกกับรถคันนี้ (รวม 3 ตารางด้วย UNION ALL)
            $q_bookings = "
                SELECT BMT.arrange, BMT.pax as assigned_pax, 'pickup' as transfer_type,
                       BT.id as bt_id, ZONE_P.name_th as zone_name, BT.start_pickup as action_time,
                       HOTELP.name as hotel_name, BT.room_no,
                       CUS.name as guest_name, CUS.telephone as guest_phone, NATION.name as nationality,
                       PROD.name as product_name -- 🌟 เพิ่มดึงชื่อโปรแกรม
                FROM booking_manage_transfer BMT
                JOIN booking_transfer BT ON BMT.booking_transfer_id = BT.id
                JOIN booking_products BP ON BT.booking_products_id = BP.id
                LEFT JOIN products PROD ON BP.product_id = PROD.id -- 🌟 Join ตารางโปรแกรม
                JOIN bookings BO ON BP.booking_id = BO.id
                LEFT JOIN customers CUS ON BO.id = CUS.booking_id AND CUS.head = 1
                LEFT JOIN nationalitys NATION ON CUS.nationality_id = NATION.id
                LEFT JOIN zones ZONE_P ON BT.pickup_id = ZONE_P.id
                LEFT JOIN hotel HOTELP ON BT.hotel_pickup_id = HOTELP.id
                WHERE BMT.manage_id = $manage_id AND BP.is_deleted = 0
                
                UNION ALL
                
                SELECT DT.arrange, DT.pax as assigned_pax, 'dropoff' as transfer_type,
                       BT.id as bt_id, ZONE_D.name_th as zone_name, BT.end_pickup as action_time,
                       HOTELD.name as hotel_name, BT.room_no,
                       CUS.name as guest_name, CUS.telephone as guest_phone, NATION.name as nationality,
                       PROD.name as product_name -- 🌟 เพิ่มดึงชื่อโปรแกรม
                FROM dropoff_transfers DT
                JOIN booking_transfer BT ON DT.booking_transfer_id = BT.id
                JOIN booking_products BP ON BT.booking_products_id = BP.id
                LEFT JOIN products PROD ON BP.product_id = PROD.id -- 🌟 Join ตารางโปรแกรม
                JOIN bookings BO ON BP.booking_id = BO.id
                LEFT JOIN customers CUS ON BO.id = CUS.booking_id AND CUS.head = 1
                LEFT JOIN nationalitys NATION ON CUS.nationality_id = NATION.id
                LEFT JOIN zones ZONE_D ON BT.dropoff_id = ZONE_D.id
                LEFT JOIN hotel HOTELD ON BT.hotel_dropoff_id = HOTELD.id
                WHERE DT.manage_id = $manage_id AND BP.is_deleted = 0
                
                UNION ALL
                
                SELECT OT.arrange, OT.pax as assigned_pax, 'overnight' as transfer_type,
                       BT.id as bt_id, ZONE_D.name_th as zone_name, BT.end_pickup as action_time,
                       HOTELD.name as hotel_name, BT.room_no,
                       CUS.name as guest_name, CUS.telephone as guest_phone, NATION.name as nationality,
                       PROD.name as product_name -- 🌟 เพิ่มดึงชื่อโปรแกรม
                FROM overnight_transfers OT
                JOIN booking_transfer BT ON OT.booking_transfer_id = BT.id
                JOIN booking_products BP ON BT.booking_products_id = BP.id
                LEFT JOIN products PROD ON BP.product_id = PROD.id -- 🌟 Join ตารางโปรแกรม
                JOIN bookings BO ON BP.booking_id = BO.id
                LEFT JOIN customers CUS ON BO.id = CUS.booking_id AND CUS.head = 1
                LEFT JOIN nationalitys NATION ON CUS.nationality_id = NATION.id
                LEFT JOIN zones ZONE_D ON BT.dropoff_id = ZONE_D.id
                LEFT JOIN hotel HOTELD ON BT.hotel_dropoff_id = HOTELD.id
                WHERE OT.manage_id = $manage_id AND BP.is_deleted = 0
                
                ORDER BY arrange ASC, action_time ASC
            ";

            $van['bookings'] = $this->connection->query($q_bookings)->fetch_all(MYSQLI_ASSOC);

            // คำนวณยอดคนรวม และสรุปโซน
            $total_pax = 0;
            $zones = [];
            foreach ($van['bookings'] as &$b) {
                $total_pax += $b['assigned_pax'];
                if (!empty($b['zone_name']) && !in_array($b['zone_name'], $zones)) {
                    $zones[] = $b['zone_name'];
                }
                $b['action_time'] = ($b['action_time'] != '00:00:00' && !empty($b['action_time'])) ? date('H:i', strtotime($b['action_time'])) : '-';
            }
            $van['total_pax'] = $total_pax;
            $van['zones_summary'] = implode(', ', $zones);
            $van['programs_summary'] = implode(', ', array_unique(array_filter(array_column($van['bookings'], 'product_name'))));
        }
        return $vans;
    }

    // 🌟 ยกเลิกรถ 1 คัน และดีดลูกค้าทั้งหมดกลับไปหน้า "รอจัดรถ"
    public function cancel_single_manage_transfer(int $manage_id)
    {
        if ($manage_id <= 0) return false;

        // 1. ลบ Booking ที่ผูกติดกับรถคันนี้ (คิวลูกค้าจะกลับไปสถานะรอจัดรถอัตโนมัติ เพราะไม่มี manage_id ผูกแล้ว)
        $this->connection->query("DELETE FROM booking_manage_transfer WHERE manage_id = $manage_id");
        $this->connection->query("DELETE FROM dropoff_transfers WHERE manage_id = $manage_id");
        $this->connection->query("DELETE FROM overnight_transfers WHERE manage_id = $manage_id");

        // 2. ลบตัวรถทิ้ง
        $stmt = $this->connection->prepare("DELETE FROM manage_transfer WHERE id = ?");
        $stmt->bind_param("i", $manage_id);

        return $stmt->execute();
    }

    // อัปเดตลำดับการรับ-ส่ง (Arrange) รองรับทั้ง 3 ตาราง
    public function update_van_arrange(int $manage_id, int $bt_id, int $arrange, string $transfer_type)
    {
        $table = "";
        // เลือกตารางเป้าหมายตามประเภทของ Booking
        if ($transfer_type == 'pickup') {
            $table = "booking_manage_transfer";
        } elseif ($transfer_type == 'dropoff') {
            $table = "dropoff_transfers";
        } elseif ($transfer_type == 'overnight') {
            $table = "overnight_transfers";
        } else {
            return false;
        }

        $query = "UPDATE {$table} SET arrange = ? WHERE manage_id = ? AND booking_transfer_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iii", $arrange, $manage_id, $bt_id);
        return $stmt->execute();
    }

    // 1. ดึงข้อมูล Booking ทั้งหมด (ทั้งจัดรถแล้ว และ ยังไม่จัดรถ)
    public function get_all_transfer_bookings_for_auto(string $travel_date)
    {
        $query = "SELECT BO.id as bo_id, BT.id as bt_id, BP.product_id, 
                         BT.pickup_id as zone_id, ZONE_P.name_th as zone_name, BT.start_pickup as action_time, 
                         HOTELP.name_th as hotel_name, HOTELP.lat as latitude, HOTELP.lng as longitude,
                         'pickup' as transfer_type,
                         BMT.manage_id, MT.seat as max_seats,
                         (SELECT SUM(adult) FROM booking_product_rates WHERE booking_products_id = BP.id) as adult,
                         (SELECT SUM(child) FROM booking_product_rates WHERE booking_products_id = BP.id) as child,
                         (SELECT SUM(infant) FROM booking_product_rates WHERE booking_products_id = BP.id) as infant,
                         (SELECT SUM(foc) FROM booking_product_rates WHERE booking_products_id = BP.id) as foc
                  FROM bookings BO
                  JOIN booking_products BP ON BO.id = BP.booking_id
                  JOIN booking_transfer BT ON BP.id = BT.booking_products_id
                  LEFT JOIN zones ZONE_P ON BT.pickup_id = ZONE_P.id
                  LEFT JOIN hotel HOTELP ON BT.hotel_pickup_id = HOTELP.id
                  LEFT JOIN booking_manage_transfer BMT ON BT.id = BMT.booking_transfer_id
                  LEFT JOIN manage_transfer MT ON BMT.manage_id = MT.id
                  WHERE BP.travel_date = ? 
                    AND BO.booking_status_id NOT IN (3, 4)
                    AND BT.pickup_type IN (1, 3)
                    AND BP.is_deleted = 0

                  UNION ALL

                  SELECT BO.id as bo_id, BT.id as bt_id, BP.product_id, 
                         BT.dropoff_id as zone_id, ZONE_D.name_th as zone_name, BT.end_pickup as action_time, 
                         HOTELD.name_th as hotel_name, HOTELD.lat as latitude, HOTELD.lng as longitude,
                         'dropoff' as transfer_type,
                         DT.manage_id, MT.seat as max_seats,
                         (SELECT SUM(adult) FROM booking_product_rates WHERE booking_products_id = BP.id) as adult,
                         (SELECT SUM(child) FROM booking_product_rates WHERE booking_products_id = BP.id) as child,
                         (SELECT SUM(infant) FROM booking_product_rates WHERE booking_products_id = BP.id) as infant,
                         (SELECT SUM(foc) FROM booking_product_rates WHERE booking_products_id = BP.id) as foc
                  FROM bookings BO
                  JOIN booking_products BP ON BO.id = BP.booking_id
                  JOIN booking_transfer BT ON BP.id = BT.booking_products_id
                  LEFT JOIN zones ZONE_D ON BT.dropoff_id = ZONE_D.id
                  LEFT JOIN hotel HOTELD ON BT.hotel_dropoff_id = HOTELD.id
                  LEFT JOIN dropoff_transfers DT ON BT.id = DT.booking_transfer_id
                  LEFT JOIN manage_transfer MT ON DT.manage_id = MT.id
                  WHERE BP.travel_date = ? 
                    AND BO.booking_status_id NOT IN (3, 4)
                    AND (BT.pickup_id != BT.dropoff_id OR BT.hotel_pickup_id != BT.hotel_dropoff_id OR BT.pickup_type = 3)
                    AND (BP.overnight IS NULL OR BP.overnight = '0000-00-00')
                    AND BP.is_deleted = 0

                  UNION ALL

                  SELECT BO.id as bo_id, BT.id as bt_id, BP.product_id, 
                         BT.dropoff_id as zone_id, ZONE_D.name_th as zone_name, BT.end_pickup as action_time, 
                         HOTELD.name_th as hotel_name, HOTELD.lat as latitude, HOTELD.lng as longitude,
                         'overnight' as transfer_type,
                         OT.manage_id, MT.seat as max_seats,
                         (SELECT SUM(adult) FROM booking_product_rates WHERE booking_products_id = BP.id) as adult,
                         (SELECT SUM(child) FROM booking_product_rates WHERE booking_products_id = BP.id) as child,
                         (SELECT SUM(infant) FROM booking_product_rates WHERE booking_products_id = BP.id) as infant,
                         (SELECT SUM(foc) FROM booking_product_rates WHERE booking_products_id = BP.id) as foc
                  FROM bookings BO
                  JOIN booking_products BP ON BO.id = BP.booking_id
                  JOIN booking_transfer BT ON BP.id = BT.booking_products_id
                  LEFT JOIN zones ZONE_D ON BT.dropoff_id = ZONE_D.id
                  LEFT JOIN hotel HOTELD ON BT.hotel_dropoff_id = HOTELD.id
                  LEFT JOIN overnight_transfers OT ON BT.id = OT.booking_transfer_id
                  LEFT JOIN manage_transfer MT ON OT.manage_id = MT.id
                  WHERE BP.overnight = ? 
                    AND BO.booking_status_id NOT IN (3, 4)
                    AND BP.is_deleted = 0";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("sss", $travel_date, $travel_date, $travel_date);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // 2. ฟังก์ชันสำหรับอัปเดตการเรียงคิว (Arrange) ในรถ
    public function update_bmt_arrange(int $manage_id, int $bt_id, int $arrange)
    {
        $query = "UPDATE booking_manage_transfer SET arrange = ? WHERE manage_id = ? AND booking_transfer_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iii", $arrange, $manage_id, $bt_id);
        return $stmt->execute();
    }

    // ฟังก์ชันสำหรับล้างไพ่ (ยกเลิกรถทั้งหมดในวันที่เลือก)
    public function cancel_all_manage_transfer(string $travel_date)
    {
        // 1. ค้นหา ID รถทั้งหมดที่ถูกสร้างในวันนี้
        $query = "SELECT id FROM manage_transfer WHERE travel_date = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $travel_date);
        $stmt->execute();
        $result = $stmt->get_result();

        $manage_ids = [];
        while ($row = $result->fetch_assoc()) {
            $manage_ids[] = $row['id'];
        }

        // ถ้าไม่มีรถเลย ให้ตอบกลับไปว่าลบสำเร็จแล้ว (ไม่ต้องทำอะไรต่อ)
        if (empty($manage_ids)) return true;

        $ids_str = implode(',', $manage_ids);

        // 2. ลบ Booking ที่ผูกติดกับรถเหล่านี้ (ขาไป, ขากลับ, ค้างคืน)
        $this->connection->query("DELETE FROM booking_manage_transfer WHERE manage_id IN ($ids_str)");
        $this->connection->query("DELETE FROM dropoff_transfers WHERE manage_id IN ($ids_str)");
        $this->connection->query("DELETE FROM overnight_transfers WHERE manage_id IN ($ids_str)");

        // 3. ลบตัวรถทิ้ง
        $stmt_del = $this->connection->prepare("DELETE FROM manage_transfer WHERE travel_date = ?");
        $stmt_del->bind_param("s", $travel_date);

        if ($stmt_del->execute()) {
            return true;
        }
        return false;
    }

    // ดึงข้อมูล Waiting Pool สำหรับหน้า Van Builder (พ่นออกเป็น JSON)
    public function get_waiting_pool_bookings(string $travel_date, array $product_ids, array $zone_ids)
    {
        $in_clause = implode(',', array_map('intval', $product_ids));
        if (empty($in_clause)) return [];

        $in_zone = implode(',', array_map('intval', $zone_ids));

        $query = "SELECT BO.id as bo_id, BO.voucher_no_agent as voucher_no, BT.id as bt_id, BP.product_id, COMP.name as company_name,
                    BT.pickup_id as zone_id, ZONE_P.name_th as zone_name, ZONE_P.color_hex, BT.start_pickup as action_time, PROD.name as product_name,
                    ZONE_P.route_order as zone_route_order,
                    HOTELP.name as hotel_name, HOTELP.lat as latitude, HOTELP.lng as longitude,
                    'pickup' as transfer_type_tag,
                    BTYE.name as booking_type_name, CATE.transfer as category_transfer,
                    BT.room_no, BT.transfer_type as bt_type, BT.hotel_pickup, 
                    CUS.name as guest_name, CUS.telephone as guest_phone, 
                    NATION.name as nationality, NATION.iso2 as country_code, BP.note as special_request, BO.updated_at, 
                    BPR_SUM.sum_adult, BPR_SUM.sum_child, BPR_SUM.sum_infant, BPR_SUM.sum_foc,
                    ((IFNULL(BPR_SUM.sum_adult,0) + IFNULL(BPR_SUM.sum_child,0) + IFNULL(BPR_SUM.sum_infant,0) + IFNULL(BPR_SUM.sum_foc,0)) - IFNULL(BMT_SUM.assigned_pax, 0)) as remaining_pax
                FROM bookings BO
                JOIN booking_products BP ON BO.id = BP.booking_id
                JOIN booking_transfer BT ON BP.id = BT.booking_products_id
                LEFT JOIN booking_type BTYE ON BO.booking_type_id = BTYE.id
                LEFT JOIN companies COMP ON BO.company_id = COMP.id
                LEFT JOIN products PROD ON BP.product_id = PROD.id
                -- ดึง Pax รวมผ่าน Join ครั้งเดียว
                LEFT JOIN (
                    SELECT booking_products_id, category_id,
                        SUM(adult) as sum_adult, SUM(child) as sum_child, 
                        SUM(infant) as sum_infant, SUM(foc) as sum_foc
                    FROM booking_product_rates GROUP BY booking_products_id
                ) BPR_SUM ON BP.id = BPR_SUM.booking_products_id
                LEFT JOIN product_category CATE ON BPR_SUM.category_id = CATE.id
                LEFT JOIN customers CUS ON BO.id = CUS.booking_id AND CUS.head = 1
                LEFT JOIN nationalitys NATION ON CUS.nationality_id = NATION.id
                LEFT JOIN zones ZONE_P ON BT.pickup_id = ZONE_P.id
                LEFT JOIN hotel HOTELP ON BT.hotel_pickup_id = HOTELP.id
                -- 🌟 หาผลรวมคนที่ถูกจัดรถไปแล้ว (Pickup)
                LEFT JOIN (
                    SELECT booking_transfer_id, SUM(pax) as assigned_pax 
                    FROM booking_manage_transfer GROUP BY booking_transfer_id
                ) BMT_SUM ON BT.id = BMT_SUM.booking_transfer_id
                WHERE BP.travel_date = '$travel_date' 
                AND BP.product_id IN ($in_clause) 
                AND BO.booking_status_id NOT IN (3, 4) 
                AND BT.pickup_type IN (1, 3) 

                AND BP.is_deleted = 0
                -- 🌟 กรองเอาเฉพาะคนที่ยังเหลืออยู่ (ยังไม่ถูกจัด หรือจัดไปยังไม่ครบ)
                AND ((IFNULL(BPR_SUM.sum_adult,0) + IFNULL(BPR_SUM.sum_child,0) + IFNULL(BPR_SUM.sum_infant,0) + IFNULL(BPR_SUM.sum_foc,0)) - IFNULL(BMT_SUM.assigned_pax, 0)) > 0 " .
            ((!empty($in_zone)) ? " AND ZONE_P.id IN ($in_zone) " : "") . "
                GROUP BY BT.id

                UNION ALL

                -- 2. Dropoff
                SELECT BO.id, BO.voucher_no_agent, BT.id, BP.product_id, COMP.name,
                    BT.dropoff_id, ZONE_D.name_th, ZONE_D.color_hex, BT.end_pickup, PROD.name,
                    ZONE_D.route_order as zone_route_order,
                    HOTELD.name, HOTELD.lat, HOTELD.lng,
                    'dropoff' as transfer_type_tag,
                    BTYE.name, CATE.transfer,
                    BT.room_no, BT.transfer_type, BT.hotel_pickup, 
                    CUS.name, CUS.telephone, NATION.name, NATION.iso2 as country_code, BP.note, BO.updated_at,
                    BPR_SUM.sum_adult, BPR_SUM.sum_child, BPR_SUM.sum_infant, BPR_SUM.sum_foc,
                    ((IFNULL(BPR_SUM.sum_adult,0) + IFNULL(BPR_SUM.sum_child,0) + IFNULL(BPR_SUM.sum_infant,0) + IFNULL(BPR_SUM.sum_foc,0)) - IFNULL(DT_SUM.assigned_pax, 0)) as remaining_pax
                FROM bookings BO
                JOIN booking_products BP ON BO.id = BP.booking_id
                JOIN booking_transfer BT ON BP.id = BT.booking_products_id
                LEFT JOIN booking_type BTYE ON BO.booking_type_id = BTYE.id
                LEFT JOIN companies COMP ON BO.company_id = COMP.id
                LEFT JOIN products PROD ON BP.product_id = PROD.id
                LEFT JOIN (
                    SELECT booking_products_id, category_id,
                        SUM(adult) as sum_adult, SUM(child) as sum_child, 
                        SUM(infant) as sum_infant, SUM(foc) as sum_foc
                    FROM booking_product_rates GROUP BY booking_products_id
                ) BPR_SUM ON BP.id = BPR_SUM.booking_products_id
                LEFT JOIN product_category CATE ON BPR_SUM.category_id = CATE.id
                LEFT JOIN customers CUS ON BO.id = CUS.booking_id AND CUS.head = 1
                LEFT JOIN nationalitys NATION ON CUS.nationality_id = NATION.id
                LEFT JOIN zones ZONE_D ON BT.dropoff_id = ZONE_D.id
                LEFT JOIN hotel HOTELD ON BT.hotel_dropoff_id = HOTELD.id
                LEFT JOIN (
                    SELECT booking_transfer_id, SUM(pax) as assigned_pax 
                    FROM dropoff_transfers GROUP BY booking_transfer_id
                ) DT_SUM ON BT.id = DT_SUM.booking_transfer_id
                WHERE BP.travel_date = '$travel_date' 
                AND BP.product_id IN ($in_clause) 
                AND BO.booking_status_id NOT IN (3, 4) 
                AND (BT.pickup_id != BT.dropoff_id OR BT.hotel_pickup_id != BT.hotel_dropoff_id OR BT.pickup_type = 3)
                AND (BP.overnight IS NULL OR BP.overnight = '0000-00-00')

                AND BP.is_deleted = 0 
                AND ((IFNULL(BPR_SUM.sum_adult,0) + IFNULL(BPR_SUM.sum_child,0) + IFNULL(BPR_SUM.sum_infant,0) + IFNULL(BPR_SUM.sum_foc,0)) - IFNULL(DT_SUM.assigned_pax, 0)) > 0 " .
            ((!empty($in_zone)) ? " AND ZONE_D.id IN ($in_zone) " : "") . "
                GROUP BY BT.id

                UNION ALL

                -- 3. Overnight
                SELECT BO.id, BO.voucher_no_agent, BT.id, BP.product_id, COMP.name,
                    BT.dropoff_id, ZONE_D.name_th, ZONE_D.color_hex, BT.end_pickup, PROD.name,
                    ZONE_D.route_order as zone_route_order,
                    HOTELD.name, HOTELD.lat, HOTELD.lng,
                    'overnight' as transfer_type_tag,
                    BTYE.name, CATE.transfer,
                    BT.room_no, BT.transfer_type, BT.hotel_pickup, 
                    CUS.name, CUS.telephone, NATION.name, NATION.iso2 as country_code, BP.note, BO.updated_at, 
                    BPR_SUM.sum_adult, BPR_SUM.sum_child, BPR_SUM.sum_infant, BPR_SUM.sum_foc,
                    ((IFNULL(BPR_SUM.sum_adult,0) + IFNULL(BPR_SUM.sum_child,0) + IFNULL(BPR_SUM.sum_infant,0) + IFNULL(BPR_SUM.sum_foc,0)) - IFNULL(OT_SUM.assigned_pax, 0)) as remaining_pax
                FROM bookings BO
                JOIN booking_products BP ON BO.id = BP.booking_id
                JOIN booking_transfer BT ON BP.id = BT.booking_products_id
                LEFT JOIN booking_type BTYE ON BO.booking_type_id = BTYE.id
                LEFT JOIN companies COMP ON BO.company_id = COMP.id
                LEFT JOIN products PROD ON BP.product_id = PROD.id
                LEFT JOIN (
                    SELECT booking_products_id, category_id,
                        SUM(adult) as sum_adult, SUM(child) as sum_child, 
                        SUM(infant) as sum_infant, SUM(foc) as sum_foc
                    FROM booking_product_rates GROUP BY booking_products_id
                ) BPR_SUM ON BP.id = BPR_SUM.booking_products_id
                LEFT JOIN product_category CATE ON BPR_SUM.category_id = CATE.id
                LEFT JOIN customers CUS ON BO.id = CUS.booking_id AND CUS.head = 1
                LEFT JOIN nationalitys NATION ON CUS.nationality_id = NATION.id
                LEFT JOIN zones ZONE_D ON BT.dropoff_id = ZONE_D.id
                LEFT JOIN hotel HOTELD ON BT.hotel_dropoff_id = HOTELD.id
                LEFT JOIN (
                    SELECT booking_transfer_id, SUM(pax) as assigned_pax 
                    FROM overnight_transfers GROUP BY booking_transfer_id
                ) OT_SUM ON BT.id = OT_SUM.booking_transfer_id
                WHERE BP.overnight = '$travel_date' 
                AND BP.product_id IN ($in_clause) 
                AND BO.booking_status_id NOT IN (3, 4) 

                AND BP.is_deleted = 0
                AND ((IFNULL(BPR_SUM.sum_adult,0) + IFNULL(BPR_SUM.sum_child,0) + IFNULL(BPR_SUM.sum_infant,0) + IFNULL(BPR_SUM.sum_foc,0)) - IFNULL(OT_SUM.assigned_pax, 0)) > 0 " .
            ((!empty($in_zone)) ? " AND ZONE_D.id IN ($in_zone) " : "") . "
                GROUP BY BT.id
            ";

        // echo $query;
        $result = $this->connection->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    // 💡 ฟังก์ชันตรวจสอบความถูกต้องก่อนจัดรถ (Concurrency Control)
    public function verify_booking_for_assignment(int $bt_id, string $frontend_updated_at, string $transfer_type, int $requested_pax, int $exclude_manage_id = 0)
    {
        $query = "SELECT BO.id as bo_id, BO.updated_at, BO.voucher_no_agent, BONO.bo_full
                  FROM booking_transfer BT
                  JOIN booking_products BP ON BT.booking_products_id = BP.id
                  JOIN bookings BO ON BP.booking_id = BO.id
                  LEFT JOIN bookings_no BONO ON BO.id = BONO.booking_id
                  WHERE BT.id = ?";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $bt_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if (!$result) return ['status' => false, 'reason' => 'ไม่พบข้อมูลในระบบ', 'vc' => 'Unknown'];

        $vc_name = !empty($result['voucher_no_agent']) ? $result['voucher_no_agent'] : $result['bo_full'];

        // ตรวจสอบว่าข้อมูลในหน้าจอตรงกับใน DB ไหม (ป้องกันคนแก้ข้อมูลพร้อมกัน)
        if ($result['updated_at'] !== $frontend_updated_at) {
            return ['status' => false, 'reason' => 'ข้อมูล Booking มีการเปลี่ยนแปลง', 'vc' => $vc_name];
        }

        // 🌟 ปลดล็อก: ไม่เช็คที่นั่งเต็มแล้ว เพื่อให้บันทึกได้ทุกกรณีตามที่พนักงานตัดสินใจ
        return ['status' => true];
    }

    // 🌟 ดึงเวลา updated_at ล่าสุดของ Booking
    public function get_booking_updated_at(int $bt_id)
    {
        $query = "SELECT BO.updated_at FROM bookings BO 
                  JOIN booking_products BP ON BO.id = BP.booking_id 
                  JOIN booking_transfer BT ON BP.id = BT.booking_products_id 
                  WHERE BT.id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $bt_id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return $res['updated_at'] ?? '';
    }

    // สร้างรถใหม่
    public function create_new_manage_transfer($travel_date, $note, $seat, $driver_id, $car_id)
    {
        $query = "INSERT INTO manage_transfer (travel_date, note, seat, driver_id, car_id, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssiii", $travel_date, $note, $seat, $driver_id, $car_id);
        $stmt->execute();
        return $this->connection->insert_id;
    }

    // บันทึกคิว Pickup
    public function insert_new_booking_manage_transfer($arrange, $pax, $manage_id, $bt_id)
    {
        $query = "INSERT INTO booking_manage_transfer (arrange, pax, manage_id, booking_transfer_id, created_at) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iiii", $arrange, $pax, $manage_id, $bt_id);
        return $stmt->execute();
    }

    // บันทึกคิว Dropoff
    public function insert_new_dropoff_transfer($pax, $manage_id, $bt_id)
    {
        $query = "INSERT INTO dropoff_transfers (pax, manage_id, booking_transfer_id, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iii", $pax, $manage_id, $bt_id);
        return $stmt->execute();
    }

    // บันทึกคิว Overnight
    public function insert_new_overnight_transfer($pax, $manage_id, $bt_id)
    {
        $query = "INSERT INTO overnight_transfers (pax, manage_id, booking_transfer_id, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iii", $pax, $manage_id, $bt_id);
        return $stmt->execute();
    }

    // 🌟 ฟังก์ชันอัปเดตข้อมูลรถ/คนขับ (Edit Van Info)
    public function update_manage_transfer_info(int $manage_id, int $car_id, int $driver_id, int $seat)
    {
        $query = "UPDATE manage_transfer SET car_id = ?, driver_id = ?, seat = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iiii", $car_id, $driver_id, $seat, $manage_id);
        return $stmt->execute();
    }

    // 🗑️ ฟังก์ชันเอาลูกค้าออกเฉพาะบางราย (Partial Remove)
    public function remove_booking_from_van(int $manage_id, int $bt_id, string $transfer_type)
    {
        $table = "";
        if ($transfer_type == 'pickup') {
            $table = "booking_manage_transfer";
        } elseif ($transfer_type == 'dropoff') {
            $table = "dropoff_transfers";
        } elseif ($transfer_type == 'overnight') {
            $table = "overnight_transfers";
        } else {
            return false;
        }

        $query = "DELETE FROM {$table} WHERE manage_id = ? AND booking_transfer_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ii", $manage_id, $bt_id);
        return $stmt->execute();
    }

    // 🌟 ฟังก์ชันหาค่า Arrange (คิว) ล่าสุดของรถคันนั้น เพื่อใช้สำหรับโหมด "เติมคน"
    public function get_max_arrange(int $manage_id)
    {
        $query = "SELECT MAX(a) as max_arr FROM (
                    SELECT MAX(arrange) as a FROM booking_manage_transfer WHERE manage_id = ?
                    UNION SELECT MAX(arrange) as a FROM dropoff_transfers WHERE manage_id = ?
                    UNION SELECT MAX(arrange) as a FROM overnight_transfers WHERE manage_id = ?
                  ) as max_table";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iii", $manage_id, $manage_id, $manage_id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();

        return (int)$res['max_arr'];
    }

    // 🌟 ฟังก์ชันอัปเดตข้อมูลรถ/คนขับ ในโหมดแก้ไข
    public function update_manage_info(int $manage_id, int $car_id, int $driver_id, int $seat)
    {
        $query = "UPDATE manage_transfer SET car_id = ?, driver_id = ?, seat = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iiii", $car_id, $driver_id, $seat, $manage_id);
        return $stmt->execute();
    }

    // 🌟 ฟังก์ชันล้างคิวเก่าให้สะอาดก่อนเขียนใหม่ (Wipe Data)
    public function clear_manage_transfer_bookings(int $manage_id)
    {
        $this->connection->query("DELETE FROM booking_manage_transfer WHERE manage_id = $manage_id");
        $this->connection->query("DELETE FROM dropoff_transfers WHERE manage_id = $manage_id");
        $this->connection->query("DELETE FROM overnight_transfers WHERE manage_id = $manage_id");
        return true;
    }
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // End Get Data Management Transfer


    // Start Get Data Management Boat
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function showlistboats($type, int $id, string $travel_date, $boat, $guide, $status, $agent, $product, $voucher_no, $refcode, $name, $hotel)
    {
        $bind_types = "";
        $params = array();

        $query = "SELECT BO.*,
                    BONO.bo_full as book_full,
                    BSTA.id as booksta_id, BSTA.name as booksta_name, BSTA.name_class as booksta_class, BSTA.button_class as booksta_button,
                    BTYE.id as booktye_id, BTYE.name as booktye_name,
                    COMP.id as comp_id, COMP.name as comp_name,
                    BOPA.id as bopa_id, BOPA.total_paid as total_paid, BOPA.updated_at as bopa_updated,
                    BOPAY.id as bopay_id, BOPAY.name as bopay_name, BOPAY.name_class as bopay_name_class, BOPAY.created_at as bopay_created,
                    CUS.id as cus_id, CUS.name as cus_name, CUS.birth_date as birth_date, CUS.id_card as id_card, CUS.telephone as telephone, CUS.head as cus_head, CUS.nationality_id as nationality_id,
                    NATION.id as nation_id, NATION.name as nation_name,
                    BP.id as bp_id, BP.travel_date as travel_date, BP.overnight as overnight, BP.note as bp_note,
                    BPR.id as bpr_id, BPR.adult as adult, BPR.child as child, BPR.infant as infant, BPR.foc as foc, 
                    BPR.rates_adult as rates_adult, BPR.rates_child as rates_child, BPR.rates_infant as rates_infant, BPR.rates_private as rates_private,   
                    PROD.id as product_id, PROD.name as product_name,
                    CATE.id as category_id, CATE.name as category_name, CATE.transfer as category_transfer, 
                    BT.id as bt_id, BT.start_pickup as start_pickup, BT.end_pickup as end_pickup,
                    BT.pickup_type, pickup_type, BT.room_no as room_no, BT.note as bt_note, BT.hotel_pickup as outside, BT.hotel_dropoff as outside_dropoff,
                    PICKUP.id as pickup_id, PICKUP.name_th as pickup_name,
                    DROPOFF.id as dropoff_id, DROPOFF.name_th as dropoff_name,
                    ZONE_P.id as zonep_id, ZONE_P.name_th as zonep_name,
                    ZONE_D.id as zoned_id, ZONE_D.name_th as zoned_name,
                    BEC.id as bec_id, BEC.name as bec_name, BEC.adult as bec_adult, BEC.child as bec_child, BEC.infant as bec_infant, BEC.privates as bec_privates, BEC.type as bec_type,
                    BEC.rate_adult as bec_rate_adult, BEC.rate_child as bec_rate_child, BEC.rate_infant as bec_rate_infant, BEC.rate_private as bec_rate_private, 
                    EXTRA.id as extra_id, EXTRA.name as extra_name, EXTRA.unit as extra_unit,
                    BOMANGE.id as bomanage_id,
                    MANGET.id as manget_id,
                    CAR.id as car_id, CAR.name as car_name,
                    DRIVER.id as driver_id, DRIVER.name as driver_name,
                    BOOKER.id as booker_id, BOOKER.firstname as booker_fname, BOOKER.lastname as booker_lname,
                    BORDB.id as boman_id, BORDB.arrange as boman_arrange, 
                    MANGE.id as mange_id, MANGE.time as manage_time, MANGE.counter as manage_counter,
                    COLOR.id as color_id, COLOR.name as color_name, COLOR.name_th as color_name_th, COLOR.hex_code as color_hex, COLOR.text_color as text_color, 
                    GUIDE.id as guide_id, GUIDE.name as guide_name,
                    BOAT.id as boat_id, BOAT.name as boat_name, BOAT.refcode as boat_refcode, BOAT.color as boat_color,
                    CHECKIN.id as check_id,
                    CONFIRM.id as confirm_id,
                    ONIGHT.id as over_id, ONIGHT.manage_id as over_manage,
                    chrage.id as chrage_id, chrage.adult as chrage_adult, chrage.child as chrage_child, chrage.infant as chrage_infant
                FROM bookings BO
                LEFT JOIN bookings_no BONO
                    ON BO.id = BONO.booking_id
                LEFT JOIN booking_status BSTA
                    ON BO.booking_status_id = BSTA.id
                LEFT JOIN booking_type BTYE
                    ON BO.booking_type_id = BTYE.id
                LEFT JOIN companies COMP
                    ON BO.company_id = COMP.id
                LEFT JOIN booking_paid BOPA
                    ON BO.id = BOPA.booking_id
                    AND BOPA.booking_payment_id = 4
                LEFT JOIN booking_payment BOPAY
                    ON BOPA.booking_payment_id = BOPAY.id
                LEFT JOIN customers CUS
                    ON BO.id = CUS.booking_id
                LEFT JOIN nationalitys NATION
                    ON CUS.nationality_id = NATION.id
                LEFT JOIN booking_products BP
                    ON BO.id = BP.booking_id
                LEFT JOIN booking_product_rates BPR
                    ON BP.id = BPR.booking_products_id
                LEFT JOIN products PROD
                    ON BP.product_id = PROD.id
                LEFT JOIN product_periods PROP
                    ON BPR.category_id = PROP.product_category_id
                    AND PROP.period_from <= BP.travel_date
                    AND PROP.period_to >= BP.travel_date
                LEFT JOIN product_category CATE
                    ON BPR.category_id = CATE.id
                LEFT JOIN booking_transfer BT
                    ON BP.id = BT.booking_products_id
                LEFT JOIN hotel PICKUP
                    ON BT.hotel_pickup_id = PICKUP.id
                LEFT JOIN hotel DROPOFF
                    ON BT.hotel_dropoff_id = DROPOFF.id
                LEFT JOIN zones ZONE_P
                    ON BT.pickup_id = ZONE_P.id
                LEFT JOIN zones ZONE_D
                    ON BT.dropoff_id = ZONE_D.id
                LEFT JOIN booking_extra_charge BEC
                    ON BO.id = BEC.booking_id
                LEFT JOIN extra_charges EXTRA
                    ON BEC.extra_charge_id = EXTRA.id
                LEFT JOIN booking_manage_transfer BOMANGE
                    ON BT.id = BOMANGE.booking_transfer_id
                LEFT JOIN manage_transfer MANGET 
                    ON BOMANGE.manage_id = MANGET.id
                LEFT JOIN cars CAR 
                    ON MANGET.car_id = CAR.id
                LEFT JOIN drivers DRIVER
                    ON MANGET.driver_id = DRIVER.id
                LEFT JOIN users BOOKER 
                    ON BO.booker_id = BOOKER.id
                LEFT JOIN booking_manage_boat BORDB
                    ON BO.id = BORDB.booking_id
                LEFT JOIN manage_boat MANGE 
                    ON BORDB.manage_id = MANGE.id
                LEFT JOIN colors COLOR 
                    ON MANGE.color_id = COLOR.id
                LEFT JOIN guides GUIDE
                    ON MANGE.guide_id = GUIDE.id
                LEFT JOIN boats BOAT
                    ON MANGE.boat_id = BOAT.id
                LEFT JOIN overnight_boat ONIGHT 
                    ON ONIGHT.booking_id = BO.id
                LEFT JOIN bookings_chrage chrage
                    ON BO.id = chrage.booking_id
                LEFT JOIN check_in CHECKIN
                    ON BO.id = CHECKIN.booking_id
        ";

        $query .= ($type == 'job') ? " AND CHECKIN.type = 1" : "";
        $query .= ($type == 'guide') ? " AND CHECKIN.type = 2" : "";

        $query .= " LEFT JOIN confirm_agent CONFIRM
                        ON COMP.id = CONFIRM.agent_id ";

        $query .= ($type == 'agent' && (isset($travel_date) && $travel_date != '0000-00-00')) ? " AND CONFIRM.travel_date = '$travel_date'" : "";

        $query .= " WHERE BO.id > 0
                        AND BO.booking_status_id != 3
                        AND BO.booking_status_id != 4
                        AND BP.is_deleted = 0 ";

        // $query .= (!empty($manage_id)) ? " AND MANGE.id = " . $manage_id : "";
        $query .= (!empty($status) && $status != 'all') ? " AND BSTA.id = " . $status : "";
        $query .= (!empty($agent) && $agent != 'all') ? " AND COMP.id = " . $agent : "";
        $query .= (!empty($product) && $product != 'all') ? " AND PROD.id = " . $product : "";
        $query .= (!empty($voucher_no)) ? " AND BO.voucher_no_agent LIKE '%" . $voucher_no . "%' " : "";
        $query .= (!empty($refcode)) ? " AND BONO.bo_full LIKE '%" . $refcode . "%' " : "";
        $query .= (!empty($name)) ? " AND CUS.name LIKE '%" . $name . "%' " : "";
        $query .= (!empty($hotel)) ? " AND BT.hotel_pickup LIKE '%" . $hotel . "%' " : "";

        if (!empty($type) && ($type == 'list' || $type == 'job' || $type == 'guide')) {
            $query .=
                (!empty($travel_date) && $travel_date != '0000-00-00') ?
                " AND (BP.travel_date = '" . $travel_date . "'" . " OR BP.overnight = '" . $travel_date . "')" :
                "";

            if (isset($guide) && $guide != 'all') {
                $query .= " AND GUIDE.id  = ?";
                $bind_types .= "i";
                array_push($params, $guide);
            }

            if (isset($boat) && $boat != 'all') {
                $query .= " AND BOAT.id  = ?";
                $bind_types .= "i";
                array_push($params, $boat);
            }

            // $query .= " ORDER BY BT.pickup_type DESC, BORDB.arrange ASC, CATE.name DESC"; // , CHECKIN.id ASC
            $query .= " ORDER BY BORDB.arrange ASC, CATE.name DESC, COMP.name ASC, BO.voucher_no_agent ASC";
        }

        if (!empty($type) && $type == 'manage') {

            if (isset($travel_date) && $travel_date != '0000-00-00') {
                $query .= " AND BP.travel_date  = ?";
                $bind_types .= "s";
                array_push($params, $travel_date);
            }

            if (isset($boat) && $boat != 'all') {
                $query .= " AND BOAT.id  = ?";
                $bind_types .= "i";
                array_push($params, $boat);
            }

            if (isset($guide) && $guide != 'all') {
                $query .= " AND GUIDE.id  = ?";
                $bind_types .= "i";
                array_push($params, $guide);
            }

            // $query .= " ORDER BY BT.pickup_type DESC, BORDB.arrange ASC, CATE.name DESC, COMP.name ASC, BO.voucher_no_agent ASC";
            $query .= " ORDER BY BORDB.arrange ASC, PROD.id ASC, CATE.name DESC, COMP.name ASC, BO.voucher_no_agent ASC";
        }

        if (!empty($type) && $type == 'agent') {
            if (isset($travel_date) && $travel_date != '0000-00-00') {
                $query .= !empty(substr($travel_date, 11, 20)) ? " AND BP.travel_date BETWEEN '" . substr($travel_date, 0, 10) . "' AND '" . substr($travel_date, 11, 20) . "'" : " AND BP.travel_date = '" . $travel_date . "' ";
            }

            if (isset($id) && $id > 0) {
                $query .= " AND COMP.id  = ?";
                $bind_types .= "i";
                array_push($params, $id);
            }

            $query .= " ORDER BY COMP.name ASC, BT.pickup_type DESC, BORDB.arrange ASC, CATE.name DESC";
        }

        // echo $query . ', ' . $travel_date;
        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_manage_boat(string $date_travel, $boat, $manage_id)
    {
        $query = "SELECT manage.*,
                bo_manage.id as bomanage_id,
                boat.id as boat_id, boat.name as boat_name, boat.refcode as boat_refcode, boat.color as boat_color, boat.background as boat_background,
                color.id as color_id, color.name as color_name, color.name_th as color_name_th, color.hex_code as color_hex, color.text_color as text_color,
                guide.id as guide_id, guide.name as guide_name
            FROM manage_boat manage
            LEFT JOIN booking_manage_boat bo_manage
                ON manage.id = bo_manage.manage_id
            LEFT JOIN boats boat
                ON manage.boat_id = boat.id
            LEFT JOIN colors color 
                ON manage.color_id = color.id
            LEFT JOIN guides guide
                ON manage.guide_id = guide.id
            WHERE manage.id > 0
        ";

        if (isset($boat) && $boat != 'all') {
            $query .= " AND boat.id = " . $boat;
        }

        $query .= (!empty($manage_id)) ? " AND manage.id = " . $manage_id : "";

        $query .= " AND manage.travel_date = ?";

        $query .= " ORDER BY manage.id ASC";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $date_travel);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_manage_programe(string $date_travel)
    {
        $query = "SELECT programe.*
            FROM products programe
            LEFT JOIN booking_products
                ON programe.id = booking_products.product_id
            LEFT JOIN bookings
                ON bookings.id = booking_products.booking_id
            LEFT JOIN booking_status 
                ON bookings.booking_status_id = booking_status.id
            WHERE programe.id > 0
            AND booking_products.travel_date = ?
            AND booking_status.id != 3
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $date_travel);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function insert_boat(string $name)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `boats`(`name`, `is_approved`, `is_deleted`, `created_at`, `updated_at`)
        VALUES (?, 1, 0, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $name);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function insert_guide(string $name)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO guides (name, is_approved, is_deleted, created_at, updated_at)
        VALUES (?, 1, 0, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $name);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function insert_manage_boat(string $travel_date, string $time, string $counter, string $note, int $boat_id, int $guide_id, int $color_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `manage_boat`(`travel_date`, `time`, `counter`, `note`, `boat_id`, `guide_id`, `color_id`, `created_at`)
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

        $bind_types .= "s";
        array_push($params, $travel_date);

        $bind_types .= "s";
        array_push($params, $time);

        $bind_types .= "s";
        array_push($params, $counter);

        $bind_types .= "s";
        array_push($params, $note);

        $bind_types .= "i";
        array_push($params, $boat_id);

        $bind_types .= "i";
        array_push($params, $guide_id);

        $bind_types .= "s";
        array_push($params, $color_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_manage_boat(string $time, string $counter, string $note, int $boat_id, int $guide_id, int $color_id, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `manage_boat` SET";

        $query .= " time = ? ,";
        $bind_types .= "s";
        array_push($params, $time);

        $query .= " counter = ? ,";
        $bind_types .= "s";
        array_push($params, $counter);

        $query .= " note = ? ,";
        $bind_types .= "s";
        array_push($params, $note);

        $query .= " boat_id = ? ,";
        $bind_types .= "i";
        array_push($params, $boat_id);

        $query .= " guide_id = ? ,";
        $bind_types .= "i";
        array_push($params, $guide_id);

        $query .= " color_id = ? ";
        $bind_types .= "i";
        array_push($params, $color_id);

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

    public function insert_booking_manage_boat(int $arrange, int $booking_id, int $manage_id)
    {
        $query = "SELECT travel_date FROM booking_products WHERE booking_id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $booking_id);
        $statement->execute();
        $booking = $statement->get_result()->fetch_assoc();

        $query = "SELECT travel_date FROM manage_boat WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $manage_id);
        $statement->execute();
        $boat = $statement->get_result()->fetch_assoc();

        if (empty($booking) || empty($boat)) {
            return false;
        }

        // ตัดเวลา เหลือเฉพาะวันที่
        $booking_date = substr($booking['travel_date'], 0, 10);
        $boat_date    = substr($boat['travel_date'], 0, 10);

        if ($booking_date !== $boat_date) {
            return false;
        }

        $query = "
            SELECT id 
            FROM booking_manage_boat 
            WHERE booking_id = ?
            LIMIT 1
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $booking_id);
        $statement->execute();
        $exists = $statement->get_result()->num_rows;

        if ($exists > 0) {
            return false; // booking นี้ถูกจัดเรือแล้ว
        }

        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `booking_manage_boat` (`arrange`, `booking_id`, `manage_id`, `created_at`)
        VALUES (?, ?, ?, NOW())";

        $bind_types .= "i";
        array_push($params, $arrange);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $bind_types .= "i";
        array_push($params, $manage_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_booking_manage_boat(int $arrange, int $booking_id, int $manage_id, int $id)
    {
        $query = "SELECT travel_date FROM booking_products WHERE booking_id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $booking_id);
        $statement->execute();
        $booking = $statement->get_result()->fetch_assoc();

        $query = "SELECT travel_date FROM manage_boat WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $manage_id);
        $statement->execute();
        $boat = $statement->get_result()->fetch_assoc();

        $booking_date = isset($booking['travel_date']) ? substr($booking['travel_date'], 0, 10) : null;
        $boat_date   = isset($boat['travel_date']) ? substr($boat['travel_date'], 0, 10) : null;

        if ($booking_date !== $boat_date) {
            return false; // วันที่ไม่ตรงกัน ไม่อัปเดต
        }

        $query = "
            SELECT id
            FROM booking_manage_boat
            WHERE booking_id = ?
            AND manage_id != ?
            LIMIT 1
        ";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ii", $booking_id, $manage_id);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            return false; // booking นี้ถูกผูกกับเรือลำอื่นแล้ว
        }

        $bind_types = "";
        $params = array();

        $query = "UPDATE `booking_manage_boat` SET";

        if ($id > 0) {
            $query .= " arrange = ?,";
            $bind_types .= "i";
            array_push($params, $arrange);

            $query .= " booking_id = ?,";
            $bind_types .= "i";
            array_push($params, $booking_id);

            $query .= " manage_id = ?";
            $bind_types .= "i";
            array_push($params, $manage_id);

            $query .= " WHERE id = ?";
            $bind_types .= "i";
            array_push($params, $id);
        } elseif ($id == 0) {
            $query .= " arrange = ?";
            $bind_types .= "i";
            array_push($params, $arrange);

            $query .= " WHERE booking_id = ?";
            $bind_types .= "i";
            array_push($params, $booking_id);

            $query .= " AND manage_id = ?";
            $bind_types .= "i";
            array_push($params, $manage_id);
        }

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_manage_boat(int $manage_id)
    {
        $query = "DELETE FROM `manage_boat` WHERE id = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $manage_id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_booking_manage_boat(int $id, int $bo_id, int $manage_id)
    {
        if ($id > 0) {
            $query = "DELETE FROM `booking_manage_boat` WHERE id = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $id);
        } elseif ($id == 0 && $bo_id == 0 && $manage_id > 0) {
            $query = "DELETE FROM `booking_manage_boat` WHERE manage_id = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $manage_id);
        } elseif ($id == 0 && $bo_id > 0 && $manage_id > 0) {
            $query = "DELETE FROM `booking_manage_boat` WHERE booking_id = ? AND manage_id = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("ii", $bo_id, $manage_id);
        }

        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function insert_overnight_boat(int $bo_id, int $manage_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `overnight_boat`(`manage_id`, `booking_id`, `created_at`)
        VALUES (?, ?, NOW())";

        $bind_types .= "ii";
        array_push($params, $manage_id, $bo_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_overnight_boat(int $booking_id, int $manage_id, int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `overnight_boat` SET";

        if ($id > 0) {
            $query .= " booking_id = ?,";
            $bind_types .= "i";
            array_push($params, $booking_id);

            $query .= " manage_id = ?";
            $bind_types .= "i";
            array_push($params, $manage_id);

            $query .= " WHERE id = ?";
            $bind_types .= "i";
            array_push($params, $id);
        } elseif ($id == 0) {
            $query .= " WHERE booking_id = ?";
            $bind_types .= "i";
            array_push($params, $booking_id);

            $query .= " AND manage_id = ?";
            $bind_types .= "i";
            array_push($params, $manage_id);
        }

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_overnight_boat(int $id, int $bo_id, int $manage_id)
    {
        if ($id > 0) {
            $query = "DELETE FROM `overnight_boat` WHERE id = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $id);
        } elseif ($id == 0 && $bo_id == 0 && $manage_id > 0) {
            $query = "DELETE FROM `overnight_boat` WHERE manage_id = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $manage_id);
        } elseif ($id == 0 && $bo_id > 0 && $manage_id > 0) {
            $query = "DELETE FROM `overnight_boat` WHERE booking_id = ? AND manage_id = ? ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("ii", $bo_id, $manage_id);
        }

        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // End Get Data Management Boat


    // Start Get Data Guide And jobs
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function insert_check(int $bo_id, int $type)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `check_in`(`booking_id`, `type`, `login_id`, `created_at`) 
        VALUES (?, ?, ?, NOW())";

        $bind_types .= "i";
        array_push($params, $bo_id);

        $bind_types .= "i";
        array_push($params, $type);

        $bind_types .= "i";
        array_push($params, $_SESSION["supplier"]["id"]);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function delete_check(int $bo_id, int $type)
    {
        $query = "DELETE FROM `check_in` WHERE `booking_id` = ? AND `type` = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("ii", $bo_id, $type);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // End Get Data Guide And jobs

    // Start Get Data Agent
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function fetch_all_bookingagent(int $agent_id, string $travel_date)
    {
        $query = "SELECT BO.*,
                    BONO.bo_full as book_full,
                    BOPA.total_paid as cot,
                    COMP.id as agent_id, COMP.name as agent_name,
                    PROD.id as product_id, PROD.name as product_name,
                    CATE.id as category_id, CATE.name as category_name,
                    CUS.name as cus_name, CUS.telephone as telephone,
                    BP.id as bp_id, BP.note as bp_note,
                    BPRS.bpr_id, BPRS.adult, BPRS.child, BPRS.infant, BPRS.foc, BPRS.max_tourist,
                    BT.id as bt_id, BT.start_pickup as start_pickup, BT.end_pickup as end_pickup,
                    BT.room_no as room_no, BT.note as bt_note, BT.hotel_pickup as outside_pickup, 
                    BT.hotel_dropoff as outside_dropoff, BT.pickup_type as pickup_type,
                    HOTELP.name_th as hotelp_name,
                    HOTELD.name_th as hoteld_name,
                    ZONE_P.name_th as zonep_name,
                    ZONE_D.name_th as zoned_name
                FROM bookings BO
                LEFT JOIN bookings_no BONO
                    ON BO.id = BONO.booking_id
                LEFT JOIN booking_status BSTA
                    ON BO.booking_status_id = BSTA.id
                LEFT JOIN booking_paid BOPA
                    ON BO.id = BOPA.booking_id
                    AND BOPA.booking_payment_id = 4
                LEFT JOIN companies COMP
                    ON BO.company_id = COMP.id
                LEFT JOIN customers CUS
                    ON BO.id = CUS.booking_id
                LEFT JOIN booking_products BP
                    ON BO.id = BP.booking_id
                LEFT JOIN products PROD
                    ON BP.product_id = PROD.id
                LEFT JOIN (
                    SELECT BP.booking_id, BPR.category_id, BPR.id as bpr_id,
                        SUM(BPR.adult) AS adult,
                        SUM(BPR.child) AS child,
                        SUM(BPR.infant) AS infant,
                        SUM(BPR.foc) AS foc,
                        SUM(BPR.adult) + SUM(BPR.child) + SUM(BPR.infant) + SUM(BPR.foc) AS max_tourist
                    FROM booking_products BP
                    JOIN booking_product_rates BPR 
                        ON BP.id = BPR.booking_products_id
                    GROUP BY BP.booking_id, BPR.category_id
                ) BPRS 
                    ON BPRS.booking_id = BO.id
                LEFT JOIN product_category CATE 
                    ON BPRS.category_id = CATE.id
                LEFT JOIN booking_transfer BT
                    ON BP.id = BT.booking_products_id
                LEFT JOIN hotel HOTELP
                    ON BT.hotel_pickup_id = HOTELP.id
                LEFT JOIN hotel HOTELD
                    ON BT.hotel_dropoff_id = HOTELD.id
                LEFT JOIN zones ZONE_P
                    ON BT.pickup_id = ZONE_P.id
                LEFT JOIN zones ZONE_D
                    ON BT.dropoff_id = ZONE_D.id
                LEFT JOIN booking_manage_boat BOMANGE
                    ON BO.id = BOMANGE.booking_id
                LEFT JOIN manage_boat MANGE 
                    ON BOMANGE.manage_id = MANGE.id
                WHERE BO.id > 0
                AND BO.booking_status_id != 3
                AND BO.booking_status_id != 4
        ";

        $query .= (!empty($travel_date) && $travel_date != '') ? !empty(substr($travel_date, 14, 24)) ? " AND BP.travel_date BETWEEN '" . substr($travel_date, 0, 10) . "' AND '" . substr($travel_date, 14, 24) . "'" : " AND BP.travel_date = '" . $travel_date . "'" : "";

        $query .= (!empty($agent_id) && $agent_id > 0) ? " AND COMP.id = " . $agent_id : "";

        $query .= " ORDER BY BO.voucher_no_agent ASC ";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function fetch_all_agent(string $travel_date)
    {
        $query = "SELECT BO.*,
                    BONO.bo_full as book_full,
                    BSTA.name_class as booksta_class, BSTA.name as status_name,
                    BOPA.total_paid as cot,
                    COMP.id as agent_id, COMP.name as agent_name,
                    BPRS.adult, BPRS.child, BPRS.infant, BPRS.foc, BPRS.max_tourist, BOPA.total_paid as cot, 
                    confirm_agent.id as confirm
                FROM bookings BO
                LEFT JOIN bookings_no BONO
                    ON BO.id = BONO.booking_id
                LEFT JOIN booking_status BSTA
                    ON BO.booking_status_id = BSTA.id
                LEFT JOIN booking_paid BOPA
                    ON BO.id = BOPA.booking_id
                    AND BOPA.booking_payment_id = 4
                LEFT JOIN companies COMP
                    ON BO.company_id = COMP.id
                LEFT JOIN booking_products BP
                    ON BO.id = BP.booking_id
                LEFT JOIN (
                    SELECT BP.booking_id,
                        SUM(BPR.adult) AS adult,
                        SUM(BPR.child) AS child,
                        SUM(BPR.infant) AS infant,
                        SUM(BPR.foc) AS foc,
                        SUM(BPR.adult) + SUM(BPR.child) + SUM(BPR.infant) + SUM(BPR.foc) AS max_tourist
                    FROM booking_products BP
                    JOIN booking_product_rates BPR 
                        ON BP.id = BPR.booking_products_id
                    GROUP BY BP.booking_id, BPR.category_id
                ) BPRS 
                    ON BPRS.booking_id = BO.id
                LEFT JOIN confirm_agent
                    ON confirm_agent.agent_id = COMP.id
                    ";

        $query .= (!empty($travel_date) && $travel_date != '') ? !empty(substr($travel_date, 14, 24)) ? " AND confirm_agent.travel_date BETWEEN '" . substr($travel_date, 0, 10) . "' AND '" . substr($travel_date, 14, 24) . "'" : " AND confirm_agent.travel_date = '" . $travel_date . "'" : "";

        $query .= " WHERE BO.id > 0
                AND BO.booking_status_id != 3
                AND BO.booking_status_id != 4
        ";

        $query .= (!empty($travel_date) && $travel_date != '') ? !empty(substr($travel_date, 14, 24)) ? " AND BP.travel_date BETWEEN '" . substr($travel_date, 0, 10) . "' AND '" . substr($travel_date, 14, 24) . "'" : " AND BP.travel_date = '" . $travel_date . "'" : "";
        // $query .= (!empty($travel_date) && $travel_date != '') ? " AND BP.travel_date = '" . $travel_date . "'" : "";

        $query .= " ORDER BY COMP.name ASC";
        // echo $query;
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function get_extra_charge(int $bo_id)
    {
        $query = "SELECT booking_extra_charge.*,
                    extra_charges.name as extra_name
                FROM booking_extra_charge 
                LEFT JOIN extra_charges
                    ON booking_extra_charge.extra_charge_id = extra_charges.id
                WHERE booking_extra_charge.id > 0
                AND booking_extra_charge.booking_id = $bo_id
        ";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function insert_confirm(int $agent_id, string $travel_date)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `confirm_agent`(`travel_date`, `agent_id`, `login_id`, `created_at`) 
        VALUES (?, ?, ?, NOW())";

        $bind_types .= "s";
        array_push($params, $travel_date);

        $bind_types .= "i";
        array_push($params, $agent_id);

        $bind_types .= "i";
        array_push($params, $_SESSION["supplier"]["id"]);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function delete_confirm(int $agent_id, string $travel_date)
    {
        $query = "DELETE FROM `confirm_agent` WHERE `agent_id` = ? AND `travel_date` = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("is", $agent_id, $travel_date);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // End Get Data Agent


    // Start Get Data Cars Center
    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // End Get Data Cars Center
}
