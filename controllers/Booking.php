<?php
require_once __DIR__ . '/DB.php';

class Booking extends DB
{
    public $response = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_age(string $date)
    {
        $then = strtotime($date);
        return (floor((time() - $then) / 31556926));
    }

    public function showlist($search_status, string $payment, string $search_agent, string $search_product, string $search_travel, string $voucher_no, string $refcode, string $name)
    {
        // $name = trim(preg_replace('/\s+/', ' ', $name));
        // $parts = explode(' ', $name);
        // $nameisThai = preg_match('/[\x{0E00}-\x{0E7F}]/u', $name);
        // $match_query = !empty($name) ? '+' . implode(' +', $parts) : '';

        $query = "SELECT BO.*,
                        BONO.bo_full as book_full,
                        BSTA.id as booksta_id, BSTA.name as booksta_name, BSTA.name_class as booksta_class, BSTA.button_class as booksta_button,
                        BTYE.name as booktye_name,
                        BOPA.id as bopa_id, BOPA.total_paid as total_paid, BOPA.updated_at as bopa_updated,
                        BOPAY.id as bopay_id, BOPAY.name as bopay_name, BOPAY.name_class as bopay_name_class, BOPAY.created_at as bopay_created,
                        COMP.name as comp_name,
                        CUS.name as cus_name, CUS.head as cus_head,
                        BP.id as bp_id, BP.travel_date as travel_date, BP.overnight as overnight, BP.note as note,
                        PROD.id as product_id, PROD.name as product_name,
                        CATE.name as category_name,
                        BPR.id as bpr_id, BPR.adult as adult, BPR.child as child, BPR.infant as infant, BPR.foc as foc, 
                        BPR.rates_adult as rates_adult, BPR.rates_child as rates_child, BPR.rates_infant as rates_infant, BPR.rates_private as rates_private,   
                        BT.start_pickup as start_pickup, BT.end_pickup as end_pickup, BT.hotel_pickup as hotel_pickup, BT.hotel_dropoff as hotel_dropoff, BT.room_no as room_no, BT.pickup_type as pickup_type,
                        PICKUP.id as pickup_id, PICKUP.name as hotel_pickup_name,
                        DROPOFF.id as dropoff_id, DROPOFF.name as hotel_dropoff_name,
                        BEC.id as bec_id, BEC.name as bec_name, BEC.adult as bec_adult, BEC.child as bec_child, BEC.infant as bec_infant, BEC.privates as bec_privates, BEC.type as bec_type,
                        BEC.rate_adult as bec_rate_adult, BEC.rate_child as bec_rate_child, BEC.rate_infant as bec_rate_infant, BEC.rate_private as bec_rate_private, 
                        EXTRA.name as extra_name,
                        BOOKER.firstname as booker_fname, BOOKER.lastname as booker_lname,
                        PICK.name as pickup_name, 
                        DROF.name as dropoff_name,
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
                    LEFT JOIN users BOOKER 
                        ON BO.booker_id = BOOKER.id

                    LEFT JOIN bookings_chrage chrage
                        ON BO.id = chrage.booking_id
                    LEFT JOIN bookings_discount discount
                        ON BO.id = discount.booking_id

                    WHERE BO.id > 0
        ";

        if ($_SESSION["supplier"]["id"] != 1) {
            $query .= " AND BO.is_deleted = 0 ";
        }

        if (!empty($search_status) && $search_status != 'all') {
            $query .= " AND BSTA.id = " . $search_status;
        }

        if (!empty($payment) && $payment != 'all') {
            $query .= " AND BOPAY.id = " . $payment;
        }

        if (!empty($search_agent) && $search_agent != 'all') {
            $query .= " AND BO.company_id = " . $search_agent;
        }

        if (!empty($search_product) && $search_product != 'all') {
            $query .= " AND BP.product_id = " . $search_product;
        }

        if (!empty($search_travel) && $search_travel != '0000-00-00') {
            $query .= " AND BP.travel_date = '" . $search_travel . "'";
        }

        $query .= (!empty($voucher_no)) ? " AND BO.voucher_no_agent LIKE '%" . $voucher_no . "%' " : "";
        $query .= (!empty($refcode)) ? " AND BONO.bo_full LIKE '%" . $refcode . "%' " : "";
        $query .= (!empty($name)) ? " AND CUS.name LIKE '%" . $name . "%' " : "";
        // $query .= (!empty($match_query)) ? (!empty($nameisThai)) ? " AND CUS.name LIKE '%" . $name . "%' " : " AND MATCH(CUS.name) AGAINST('$match_query' IN BOOLEAN MODE)" : '';

        $query .= " ORDER BY BO.id DESC, BP.travel_date ASC, BOPA.id ASC";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function get_data(int $id)
    {
        $query = "SELECT BO.*,
                        BONO.bo_full as book_full,
                        BSTA.id as booksta_id, BSTA.name as booksta_name, BSTA.name_class as booksta_class, BSTA.button_class as booksta_button,
                        BTYE.name as booktye_name,
                        BOPA.id as bopa_id, BOPA.total_paid as total_paid, BOPA.booking_payment_id as bopay_id, BOPA.updated_at as bopa_updated,
                        COMP.name as comp_name,
                        CUS.id as cus_id, CUS.name as cus_name, CUS.head as cus_head, CUS.telephone as telephone, CUS.age as cus_age,
                        BP.id as bp_id, BP.travel_date as travel_date, BP.overnight as overnight, BP.note as note,
                        PROD.id as product_id, PROD.name as product_name,
                        CATE.id as category_id, CATE.name as category_name,
                        BPR.id as bpr_id, BPR.adult as adult, BPR.child as child, BPR.infant as infant, BPR.foc as foc, 
                        BPR.rates_adult as rates_adult, BPR.rates_child as rates_child, BPR.rates_infant as rates_infant, BPR.rates_private as rates_private,   
                        BT.id as bt_id, BT.start_pickup as start_pickup, BT.end_pickup as end_pickup, BT.hotel_pickup as hotel_pickup, BT.hotel_dropoff as hotel_dropoff, BT.room_no as room_no,
                        BT.pickup_type as pickup_type, BT.transfer_type as transfer_type,
                        BEC.id as bec_id, BEC.name as bec_name, BEC.adult as bec_adult, BEC.child as bec_child, BEC.infant as bec_infant, BEC.privates as bec_privates, BEC.type as bec_type,
                        BEC.rate_adult as bec_rate_adult, BEC.rate_child as bec_rate_child, BEC.rate_infant as bec_rate_infant, BEC.rate_private as bec_rate_private, 
                        EXTRA.id as extra_id, EXTRA.name as extra_name,
                        BOOKER.firstname as booker_fname, BOOKER.lastname as booker_lname,
                        HOTELP.id as hotel_pickup_id, HOTELP.name as hotel_pickup_name, 
                        HOTELD.id as hotel_dropoff_id, HOTELD.name as hotel_dropoff_name,
                        PICKUP.id as pickup_id, PICKUP.name as pickup_name, 
                        DROPOFF.id as dropoff_id, DROPOFF.name as dropoff_name,
                        BMT.id as bmt_id,
                        MANGET.id as manget_id,
                        BMB.id as bmb_id, 
                        MANGEB.id as mangeb_id,
                        CONFIRM.id as confirm_id,
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
                    LEFT JOIN booking_product_rates BPR
                        ON BP.id = BPR.booking_products_id
                    LEFT JOIN product_category CATE
                        ON BPR.category_id = CATE.id
                    LEFT JOIN booking_transfer BT
                        ON BP.id = BT.booking_products_id
                    LEFT JOIN booking_extra_charge BEC
                        ON BO.id = BEC.booking_id
                    LEFT JOIN extra_charges EXTRA
                        ON BEC.extra_charge_id = EXTRA.id
                    LEFT JOIN zones PICKUP
                        ON BT.pickup_id = PICKUP.id
                    LEFT JOIN zones DROPOFF
                        ON BT.dropoff_id = DROPOFF.id
                    LEFT JOIN hotel HOTELP
                        ON BT.hotel_pickup_id = HOTELP.id
                    LEFT JOIN hotel HOTELD
                        ON BT.hotel_dropoff_id = HOTELD.id
                    LEFT JOIN users BOOKER 
                        ON BO.booker_id = BOOKER.id
                    LEFT JOIN booking_manage_transfer BMT
                        ON BT.id = BMT.booking_transfer_id
                    LEFT JOIN manage_transfer MANGET 
                        ON BMT.manage_id = MANGET.id
                    LEFT JOIN booking_manage_boat BMB
                        ON BO.id = BMB.booking_id
                    LEFT JOIN manage_boat MANGEB 
                        ON BMB.manage_id = MANGEB.id
                    LEFT JOIN confirm_agent CONFIRM
                        ON COMP.id = CONFIRM.agent_id
                        AND CONFIRM.travel_date = BP.travel_date

                    LEFT JOIN bookings_chrage chrage
                        ON BO.id = chrage.booking_id
                    LEFT JOIN bookings_discount discount
                        ON BO.id = discount.booking_id

                    WHERE BO.id = ?
        ";

        $query .= " ORDER BY CUS.id ASC, BOPA.id ASC";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = false;
        }

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

    public function get_value(string $select, string $from, int $id)
    {
        $query = "SELECT $select
            FROM $from 
            WHERE id = ?
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        } else {
            $data = false;
        }

        return $data;
    }

    public function search_time(int $zone_id, int $product_id)
    {
        $query = "SELECT start_pickup, end_pickup
                FROM time_zone
                WHERE zone_id = $zone_id
                AND product_id = $product_id
        ";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_agent()
    {
        $query = "SELECT id, name, company_type_id, is_approved
            FROM companies 
            WHERE is_approved = 1 AND company_type_id != 1
            AND is_approved = 1 AND is_deleted = 0
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function shownation()
    {
        $query = "SELECT id, name, is_approved
            FROM nationalitys 
            WHERE is_approved = 1
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_booking_type()
    {
        $query = "SELECT id, name
            FROM booking_type 
            WHERE id > 0
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_extra_charge()
    {
        $query = "SELECT *
            FROM extra_charges 
            WHERE is_approved = 1
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_booking_status()
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

    public function show_cars_category()
    {
        $query = "SELECT * FROM cars_category
            WHERE id > 0 
        ";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_hotel()
    {
        $query = "SELECT hotel.*,
                zones.id as zone_id, zones.start_pickup as start_pickup, zones.end_pickup as end_pickup
                FROM hotel
                LEFT JOIN zones
                    ON hotel.zone_id = zones.id
                WHERE hotel.is_deleted = 0
        ";
        $query .= " ORDER BY hotel.name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_zone()
    {
        $query = "SELECT *
            FROM zones
            WHERE is_deleted = 0
        ";

        $query .= " ORDER BY                 
            CASE
                WHEN id = 17 THEN 1
                WHEN id = 13 THEN 2
                WHEN id = 14 THEN 3
                WHEN id = 2 THEN 4
                ELSE 5
            END,
            id ASC";

        // $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_products_type()
    {
        $query = "SELECT id, name, slug
            FROM products_type 
            WHERE id > 0
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_payments_type(int $num)
    {
        $query = "SELECT id, name, type
            FROM payments_type 
            WHERE id > 0
        ";
        $query .= $num > 0 ? " AND type = " . $num : "";
        $query .= " ORDER BY id ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_booking_payment()
    {
        $query = "SELECT *
            FROM booking_payment 
            WHERE id > 0
            AND type != 2
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function search_hotel(int $zone_id)
    {
        $query = "SELECT *
                FROM hotel
                WHERE is_deleted = 0
                AND zone_id = $zone_id
                OR zone_id = 0
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function search_program(int $agent_id, string $travel_date, int $bp_id, int $book_type)
    {
        $query = "SELECT PROD.*,
                PRODC.id as categoryid, PRODC.name as categoryname,
                PRODP.id as periodid,
                PRODR.id as prodrid, PRODR.rate_adult as rate_adult, PRODR.rate_child as rate_child, PRODR.rate_infant as rate_infant, PRODR.rate_private as rate_private
                FROM products PROD
                LEFT JOIN product_category PRODC
                    ON PROD.id = PRODC.product_id
                LEFT JOIN product_periods PRODP
                    ON PRODC.id = PRODP.product_category_id
                LEFT JOIN company_rate COMR
                    ON PRODP.id = COMR.product_period_id
                LEFT JOIN product_rates PRODR
                    ON COMR.product_rate_id = PRODR.id
                WHERE PROD.is_approved = 1 
                AND PROD.is_deleted = 0
                AND PRODC.is_approved = 1
                AND PRODC.is_deleted = 0
                AND PRODP.is_approved = 1
                AND PRODP.is_deleted = 0
                AND COMR.company_id = ?
                ";

        if ($book_type == 1) {
            $query .= " AND PRODP.period_from <= '" . $travel_date . "'";
            $query .= " AND PRODP.period_to >= '" . $travel_date . "'";
        }

        $query .= " ORDER BY PROD.name DESC";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $agent_id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_customer(int $id)
    {
        $query = "SELECT CUS.*,
            NATI.id as natiID, NATI.name as natiName
            FROM customers CUS
            LEFT JOIN nationalitys NATI
                ON CUS.nationality_id = NATI.id
            WHERE CUS.booking_id = ?
        ";
        $query .= " ORDER BY CUS.head DESC";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = false;
        }

        return $data;
    }

    public function search_hotel_by_keyword(string $keyword)
    {
        // เติม % หน้าหลังเพื่อใช้กับ LIKE
        $search_term = "%{$keyword}%";

        $query = "SELECT h.name, h.address, h.lat, h.lng, z.name as zone_name 
                  FROM hotel h 
                  LEFT JOIN zones z ON h.zone_id = z.id 
                  WHERE (h.name LIKE ? OR h.address LIKE ?) 
                  AND h.is_deleted = 0 
                  LIMIT 5";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("ss", $search_term, $search_term);
        $statement->execute();
        $result = $statement->get_result();

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function check_doubly_agent(int $bo_id, int $agent, string $voucher_no_agent)
    {
        $query = "SELECT id 
              FROM bookings 
              WHERE company_id = ?
              AND voucher_no_agent = ?
              AND booking_status_id != 3
              AND id != ?";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("isi", $agent, $voucher_no_agent, $bo_id);
        $statement->execute();
        $result = $statement->get_result();

        return $result->num_rows == 0 ? "true" : "false";
    }

    public function show_booking_extra(int $booking_id)
    {
        $query = "SELECT BEC.*,
            EC.id as ecID, EC.name as ecName
            FROM booking_extra_charge BEC 
            LEFT JOIN extra_charges EC
                ON BEC.extra_charge_id = EC.id
            WHERE BEC.booking_id = ? AND BEC.is_deleted = 0
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $booking_id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_booking_products(int $id)
    {
        $query = "SELECT BPRO.*,
            PROD.id as prodID, PROD.name as prodName,
            PROCA.id as procaID, PROCA.name as procaName, PROCA.transfer as procaTransfer,
            DROF.id as drofID, DROF.name as drofName 
            FROM booking_products BPRO
            LEFT JOIN products PROD
                ON BPRO.product_id = PROD.id
            LEFT JOIN product_category PROCA
                ON BPRO.category_id = PROCA.id
            LEFT JOIN place DROF
                ON PROD.dropoff_id = DROF.id
            WHERE booking_id = ? AND BPRO.is_deleted = 0
        ";
        $query .= " ORDER BY id DESC";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_booking_products_rate(int $id)
    {
        $query = "SELECT booking_products.*,
            products.id as prodID, products.name as prodName,
            booking_product_rates.id as bookingProdRateID, booking_product_rates.rate_adult as bookingProdRateAdult,
            booking_product_rates.rate_child as bookingProdRateChild, booking_product_rates.rate_infant as bookingProdRateInfant
            FROM booking_products 
            LEFT JOIN products
                    ON booking_products.product_id = products.id
            LEFT JOIN booking_product_rates
                    ON booking_products.id = booking_product_rates.booking_products_id
            WHERE booking_id = ?
        ";
        // $query .= " ORDER BY head DESC, firstname ASC";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_product()
    {
        $query = "SELECT * FROM products WHERE id > 0
            AND is_approved = 1
            AND is_deleted = 0
        ";
        $query .= " ORDER BY id ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_product_category(int $prod_id)
    {
        $query = "SELECT * FROM product_category 
            WHERE id > 0
            AND product_id = ?
            AND is_approved = 1
            AND is_deleted = 0
        ";
        $query .= " ORDER BY name ASC";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $prod_id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_category_rate($agent_id, string $travel_date, array $category_id)
    {
        $sanitized_ids = array_map('intval', $category_id);
        $in_clause_values = implode(',', $sanitized_ids);

        $query = "SELECT PRODC.id as id, PRODC.name as name, PRODC.transfer as transfer,
                PRODP.id as periodid,
                PRODR.id as prodrid, PRODR.rate_adult as rate_adult, PRODR.rate_child as rate_child, PRODR.rate_infant as rate_infant, PRODR.rate_private as rate_private
                FROM product_category PRODC
                LEFT JOIN product_periods PRODP
                    ON PRODC.id = PRODP.product_category_id
                LEFT JOIN company_rate COMR
                    ON PRODP.id = COMR.product_period_id
                LEFT JOIN product_rates PRODR
                    ON COMR.product_rate_id = PRODR.id
                WHERE PRODP.is_approved = 1
                AND PRODP.is_deleted = 0
                ";

        $query .= " AND PRODP.period_from <= '" . $travel_date . "'";
        $query .= " AND PRODP.period_to >= '" . $travel_date . "'";
        $query .= " AND COMR.company_id = " . $agent_id;
        $query .= " AND PRODC.id IN (" . $in_clause_values . ") ";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_booking_transfer(int $bp_id)
    {
        $query = "SELECT BTR.*,
                BT.id as btID, BT.adult as btAdult, BT.child as btChild, BT.infant as btInfant, BT.start_pickup as btStartPickup, BT.end_pickup as btEndPickup, BT.hotel_name as btHotelName,
                BT.room_no as btRoomNo, BT.note as btNote, BT.pickup_id as btPickupID, BT.private_type as btPrivateType,
                CARS.id as carsID, CARS.name as carsName,
                PLAC.id as placID, PLAC.name as placName
                FROM booking_transfer_rates BTR
                LEFT JOIN booking_transfer BT
                    ON BTR.booking_transfer_id = BT.id
                LEFT JOIN cars_category CARS
                    ON BTR.cars_category_id = CARS.id
                LEFT JOIN place PLAC
                    ON BT.pickup_id = PLAC.id
                WHERE BT.booking_products_id = ?
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $bp_id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function show_products_detail(int $bp_id, int $bpr_id, int $products_id, int $category_id, int $period_id, int $agent_id)
    {
        if ($bp_id > 0) {
            $query = "SELECT BPR.*
                FROM booking_product_rates BPR
                WHERE BPR.id = ?
            ";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $bpr_id);
            $statement->execute();
            $result = $statement->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            if ($agent_id > 0) {
                $query = "SELECT COMR.*,
                    PROP.id as propID,
                    PROCA.id as procaID, PROCA.name as procaName,
                    PROD.id as prodID, PROD.name as prodName,
                    PROR.id as prorID, PROR.rate_adult as prorRateAdult, PROR.rate_child as prorRateChild, PROR.rate_infant as prorRateInfant 
                    FROM company_rate COMR
                    LEFT JOIN product_periods PROP
                        ON COMR.product_period_id = PROP.id
                    LEFT JOIN product_category PROCA
                        ON PROP.product_category_id = PROCA.id
                    LEFT JOIN products PROD
                        ON PROCA.product_id = PROD.id
                    LEFT JOIN product_rates PROR
                        ON COMR.product_rate_id = PROR.id
                    WHERE PROR.is_approved = 1
                    AND PROR.is_deleted = 0
                    AND COMR.company_id = ?
                    AND COMR.product_period_id = ?
                ";
                $statement = $this->connection->prepare($query);
                $statement->bind_param("ii", $agent_id, $period_id);
                $statement->execute();
                $result = $statement->get_result();
                $data = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $query = "SELECT PROR.*,
                    COMR.id as comrID
                    FROM product_rates PROR
                    LEFT JOIN product_periods PROP
                        ON PROR.product_period_id = PROP.id
                    LEFT JOIN company_rate COMR
                        ON PROR.id = COMR.product_rate_id
                    WHERE PROR.is_approved = 1
                    AND PROR.is_deleted = 0
                    AND PROP.id = ?
                ";
                $query .= " ORDER BY PROR.id ASC";
                $statement = $this->connection->prepare($query);
                $statement->bind_param("i", $period_id);
                $statement->execute();
                $result = $statement->get_result();
                $data = $result->fetch_all(MYSQLI_ASSOC);
            }
        }

        return $data;
    }

    public function show_period(int $products_id, string $travel_date)
    {
        $query = "SELECT *
        FROM product_periods 
        WHERE id > 0 
        AND product_id = ? 
        AND period_from <= ? 
        AND period_to >= ?
        ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("iss", $products_id, $travel_date, $travel_date);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function insert_booking_paid(string $total_paid, int $booking_payment_id, int $bo_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `booking_paid`(`total_paid`, `booking_payment_id`, `booking_id`, `user_id`, `updated_at`, `created_at`)
        VALUES (?, ?, ?, ?, now(), now())";

        $bind_types .= "d";
        array_push($params, $total_paid);

        $bind_types .= "i";
        array_push($params, $booking_payment_id);

        $bind_types .= "i";
        array_push($params, $bo_id);

        $bind_types .= "i";
        array_push($params, $_SESSION["supplier"]["id"]);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_booking_paid(int $id, string $total_paid, int $booking_payment_id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE booking_paid SET";

        $query .= " total_paid = ?,";
        $bind_types .= "d";
        array_push($params, $total_paid);

        $query .= " booking_payment_id = ?,";
        $bind_types .= "i";
        array_push($params, $booking_payment_id);

        $query .= " user_id = ?,";
        $bind_types .= "i";
        array_push($params, $_SESSION["supplier"]["id"]);

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

    public function insert_data(int $booking_status_id, int $booking_type_id, string $booking_date, string $booking_time, int $company_id, string $voucher_no_agent, string $sender, string $discount)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO bookings (booking_date, booking_time, voucher_no_agent, discount_type, discount, sender, booker_id, company_id, booking_status_id, booking_type_id, is_deleted, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?, ?)";

        $bind_types .= "s";
        array_push($params, $booking_date);

        $bind_types .= "s";
        array_push($params, $booking_time);

        $bind_types .= "s";
        array_push($params, $voucher_no_agent);

        // discount_type
        $bind_types .= "i";
        array_push($params, 1);

        $bind_types .= "d";
        array_push($params, $discount);

        $bind_types .= "s";
        array_push($params, $sender);

        $bind_types .= "i";
        array_push($params, $_SESSION["supplier"]["id"]);

        $bind_types .= "i";
        array_push($params, $company_id);

        $bind_types .= "i";
        array_push($params, $booking_status_id);

        $bind_types .= "i";
        array_push($params, $booking_type_id);

        $bind_types .= "s";
        array_push($params, date("Y-m-d H:i:s"));

        $bind_types .= "s";
        array_push($params, date("Y-m-d H:i:s"));


        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_data(int $id, int  $book_status, string $voucher_no_agent, string $sender, int $company_id, int $booking_type_id, string $discount)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE bookings SET";

        $query .= " voucher_no_agent = ?,";
        $bind_types .= "s";
        array_push($params, $voucher_no_agent);

        $query .= " sender = ?,";
        $bind_types .= "s";
        array_push($params, $sender);

        $query .= " booking_status_id = ?,";
        $bind_types .= "i";
        array_push($params, $book_status);

        $query .= " booking_type_id = ?,";
        $bind_types .= "i";
        array_push($params, $booking_type_id);

        $query .= " company_id = ?,";
        $bind_types .= "i";
        array_push($params, $company_id);

        $query .= " discount = ?,";
        $bind_types .= "d";
        array_push($params, $discount);

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

    public function delete_data(int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE bookings SET";

        $query .= " is_deleted = ?,";
        $bind_types .= "i";
        array_push($params, 1);

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

    public function showlog(int $booking_id)
    {
        $query = "SELECT log_booking.*,
            users.firstname as firstname, users.lastname as lastname
            FROM log_booking 
            LEFT JOIN users
                ON log_booking.user_id = users.id
            WHERE log_booking.id > 0
            AND log_booking.booking_id = $booking_id
        ";
        $query .= " ORDER BY log_booking.id ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function insert_log(string $name, string $detail, int $booking_id, int $type_id, string $created_at)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `log_booking`(`name`, `detail`, `booking_id`, `user_id`, `type_id`, `created_at`)
        VALUES (?, ?, ?, ?, ?, ?)";

        $bind_types .= "s";
        array_push($params, $name);

        $bind_types .= "s";
        array_push($params, $detail);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $bind_types .= "i";
        array_push($params, $_SESSION["supplier"]["id"]);

        $bind_types .= "i";
        array_push($params, $type_id);

        $bind_types .= "s";
        array_push($params, $created_at);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_booking_payment(int $id, int $book_payment, string $payment_paid)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE bookings SET";

        $query .= " payment_paid = ?,";
        $bind_types .= "d";
        array_push($params, $payment_paid);

        $query .= " payment_id = ?,";
        $bind_types .= "i";
        array_push($params, $book_payment);

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

    public function insert_customer(string $name, string $birth_date, string $id_card, string $telephone, string $address, int $age, int $type, string $email, int $head, int $booking_id, int $nationality_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO customers (name, birth_date, id_card, telephone, address, age, type, email, head, booking_id, nationality_id, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $name);

        $bind_types .= "s";
        array_push($params, $birth_date);

        $bind_types .= "s";
        array_push($params, $id_card);

        $bind_types .= "s";
        array_push($params, $telephone);

        $bind_types .= "s";
        array_push($params, $address);

        $bind_types .= "i";
        array_push($params, $age);

        $bind_types .= "i";
        array_push($params, $type);

        $bind_types .= "s";
        array_push($params, $email);

        $bind_types .= "i";
        array_push($params, $head);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $bind_types .= "i";
        array_push($params, $nationality_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_customer(int $id, string $name, string $birth_date, string $id_card, string $telephone, int $age, int $type, int $nationality_id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE customers SET";

        $query .= " name = ?,";
        $bind_types .= "s";
        array_push($params, $name);

        $query .= " birth_date = ?,";
        $bind_types .= "s";
        array_push($params, $birth_date);

        $query .= " id_card = ?,";
        $bind_types .= "s";
        array_push($params, $id_card);

        $query .= " telephone = ?,";
        $bind_types .= "s";
        array_push($params, $telephone);

        $query .= " age = ?,";
        $bind_types .= "i";
        array_push($params, $age);

        $query .= " type = ?,";
        $bind_types .= "i";
        array_push($params, $type);

        $query .= " nationality_id = ?,";
        $bind_types .= "i";
        array_push($params, $nationality_id);

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

    public function delete_customer(int $id)
    {
        $query = "DELETE FROM customers 
                WHERE id = ?
                ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function insert_booking_product(string $travel_date, string $overnight, string $note, int $booking_id, int $product_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `booking_products`(`travel_date`, `overnight`, `note`, `booking_id`, `product_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`)
        VALUES (?, ?, ?, ?, ?, 1, 0, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $travel_date);

        $bind_types .= "s";
        array_push($params, $overnight);

        $bind_types .= "s";
        array_push($params, $note);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $bind_types .= "i";
        array_push($params, $product_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_booking_product(int $id, string $travel_date, string $overnight, string $note, int $product_id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `booking_products` SET";

        $query .= " travel_date = ?,";
        $bind_types .= "s";
        array_push($params, $travel_date);

        $query .= " overnight = ?,";
        $bind_types .= "s";
        array_push($params, $overnight);

        $query .= " note = ?,";
        $bind_types .= "s";
        array_push($params, $note);

        $query .= " product_id = ?,";
        $bind_types .= "i";
        array_push($params, $product_id);

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

    public function insert_booking_rate(int $adult, int $child, int $infant, int $foc, string $rates_adult, string $rates_child, string $rates_infant, string $rates_private, int $category_id, int $booking_products_id, int $product_rates_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `booking_product_rates`(`adult`, `child`, `infant`, `foc`, `rates_adult`, `rates_child`, `rates_infant`, `rates_private`, `category_id`, `booking_products_id`, `product_rates_id`, `created_at`, `updated_at`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $bind_types .= "i";
        array_push($params, $adult);

        $bind_types .= "i";
        array_push($params, $child);

        $bind_types .= "i";
        array_push($params, $infant);

        $bind_types .= "i";
        array_push($params, $foc);

        $bind_types .= "d";
        array_push($params, $rates_adult);

        $bind_types .= "d";
        array_push($params, $rates_child);

        $bind_types .= "d";
        array_push($params, $rates_infant);

        $bind_types .= "d";
        array_push($params, $rates_private);

        $bind_types .= "i";
        array_push($params, $category_id);

        $bind_types .= "i";
        array_push($params, $booking_products_id);

        $bind_types .= "i";
        array_push($params, $product_rates_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_booking_rate(int $id, int $adult, int $child, int $infant, int $foc, string $rates_adult, string $rates_child, string $rates_infant, string $rates_private, int $category_id, int $product_rates_id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE `booking_product_rates` SET";

        $query .= " adult = ?,";
        $bind_types .= "i";
        array_push($params, $adult);

        $query .= " child = ?,";
        $bind_types .= "i";
        array_push($params, $child);

        $query .= " infant = ?,";
        $bind_types .= "i";
        array_push($params, $infant);

        $query .= " foc = ?,";
        $bind_types .= "i";
        array_push($params, $foc);

        $query .= " rates_adult = ?,";
        $bind_types .= "d";
        array_push($params, $rates_adult);

        $query .= " rates_child = ?,";
        $bind_types .= "d";
        array_push($params, $rates_child);

        $query .= " rates_infant = ?,";
        $bind_types .= "d";
        array_push($params, $rates_infant);

        $query .= " rates_private = ?,";
        $bind_types .= "d";
        array_push($params, $rates_private);

        $query .= " category_id = ?,";
        $bind_types .= "i";
        array_push($params, $category_id);

        $query .= " product_rates_id = ?,";
        $bind_types .= "i";
        array_push($params, $product_rates_id);

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

    public function delete_booking_rate(int $id)
    {
        $query = "DELETE FROM `booking_product_rates` WHERE `id` = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function insert_booking_transfer(string $start_pickup, string $end_pickup, string $hotel_pickup, string $hotel_dropoff, string $room_no, string $note, int $pickup_id, int $dropoff_id, int $hotel_pickup_id, int $hotel_dropoff_id, int $transfer_type, int $pickup_type, int $booking_products_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `booking_transfer`(`start_pickup`, `end_pickup`, `hotel_pickup`, `hotel_dropoff`, `room_no`, `note`, `pickup_id`, `dropoff_id`, `hotel_pickup_id`, `hotel_dropoff_id`, `transfer_type`, `pickup_type`, `booking_products_id`, `created_at`, `updated_at`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $start_pickup);

        $bind_types .= "s";
        array_push($params, $end_pickup);

        $bind_types .= "s";
        array_push($params, $hotel_pickup);

        $bind_types .= "s";
        array_push($params, $hotel_dropoff);

        $bind_types .= "s";
        array_push($params, $room_no);

        $bind_types .= "s";
        array_push($params, $note);

        $bind_types .= "i";
        array_push($params, $pickup_id);

        $bind_types .= "i";
        array_push($params, $dropoff_id);

        $bind_types .= "i";
        array_push($params, $hotel_pickup_id);

        $bind_types .= "i";
        array_push($params, $hotel_dropoff_id);

        $bind_types .= "i";
        array_push($params, $transfer_type);

        $bind_types .= "i";
        array_push($params, $pickup_type);

        $bind_types .= "i";
        array_push($params, $booking_products_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function update_booking_transfer(int $id, string $start_pickup, string $end_pickup, string $hotel_pickup_outside, string $hotel_dropoff_outside, string $room_no, string $note, int $pickup, int $dropoff, int $hotel_pickup, int $hotel_dropoff, int $transfer_type, int $pickup_type)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE booking_transfer SET";

        $query .= " start_pickup = ?,";
        $bind_types .= "s";
        array_push($params, $start_pickup);

        $query .= " end_pickup = ?,";
        $bind_types .= "s";
        array_push($params, $end_pickup);

        $query .= " hotel_pickup = ?,";
        $bind_types .= "s";
        array_push($params, $hotel_pickup_outside);

        $query .= " hotel_dropoff = ?,";
        $bind_types .= "s";
        array_push($params, $hotel_dropoff_outside);

        $query .= " room_no = ?,";
        $bind_types .= "s";
        array_push($params, $room_no);

        $query .= " note = ?,";
        $bind_types .= "s";
        array_push($params, $note);

        $query .= " pickup_id = ?,";
        $bind_types .= "i";
        array_push($params, $pickup);

        $query .= " dropoff_id = ?,";
        $bind_types .= "i";
        array_push($params, $dropoff);

        $query .= " hotel_pickup_id = ?,";
        $bind_types .= "i";
        array_push($params, $hotel_pickup);

        $query .= " hotel_dropoff_id = ?,";
        $bind_types .= "i";
        array_push($params, $hotel_dropoff);

        $query .= " transfer_type = ?,";
        $bind_types .= "i";
        array_push($params, $transfer_type);

        $query .= " pickup_type = ?,";
        $bind_types .= "i";
        array_push($params, $pickup_type);

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

    public function insert_transfer_rate(string $rate_adult, string $rate_child, string $rate_infant, string $rate_private, int $booking_transfer_id, int $cars_category_id)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO booking_transfer_rates (`rate_adult`, `rate_child`, `rate_infant`, `rate_private`, `booking_transfer_id`, `cars_category_id`, `created_at`, `updated_at`)
        VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $bind_types .= "d";
        array_push($params, $rate_adult);

        $bind_types .= "d";
        array_push($params, $rate_child);

        $bind_types .= "d";
        array_push($params, $rate_infant);

        $bind_types .= "d";
        array_push($params, $rate_private);

        $bind_types .= "i";
        array_push($params, $booking_transfer_id);

        $bind_types .= "i";
        array_push($params, $cars_category_id);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_transfer_rate(int $id, int $rate_adult, int $rate_child, int $rate_infant, string $rate_private, int $cars_category)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE booking_transfer_rates SET";

        $query .= " rate_adult = ?,";
        $bind_types .= "i";
        array_push($params, $rate_adult);

        $query .= " rate_child = ?,";
        $bind_types .= "i";
        array_push($params, $rate_child);

        $query .= " rate_infant = ?,";
        $bind_types .= "i";
        array_push($params, $rate_infant);

        $query .= " rate_private = ?,";
        $bind_types .= "d";
        array_push($params, $rate_private);

        $query .= " cars_category_id = ?,";
        $bind_types .= "i";
        array_push($params, $cars_category);

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

    public function delete_transfer_rate(int $id)
    {
        $query = "DELETE FROM booking_transfer_rates 
                WHERE id = ?
                ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function insert_zone(string $name)
    {
        $date = date("Y-m-d H:i:s");
        // is_approved = 1 เพื่อให้พร้อมใช้งานทันที
        $query = "INSERT INTO zones (name, name_th, is_approved, is_deleted, created_at, updated_at) 
                  VALUES (?, ?, 1, 0, ?, ?)";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("ssss", $name, $name, $date, $date);

        if ($statement->execute()) {
            return $statement->insert_id;
        }
        return false;
    }

    public function insert_hotel_with_latlng(string $name, string $address, int $zone_id, string $lat, string $lng)
    {
        $date = date("Y-m-d H:i:s");

        // เพิ่มฟิลด์ address เข้าไปในคำสั่ง SQL
        $query = "INSERT INTO hotel (name, address, zone_id, lat, lng, is_from_google, is_approved, is_deleted, created_at, updated_at) 
                  VALUES (?, ?, ?, ?, ?, 1, 1, 0, ?, ?)";

        $statement = $this->connection->prepare($query);
        // สังเกต ssissss = string, string, int, string, string, string, string
        $statement->bind_param("ssissss", $name, $address, $zone_id, $lat, $lng, $date, $date);

        if ($statement->execute()) {
            return $statement->insert_id;
        }
        return false;
    }

    public function insert_booking_no(int $booking_id, string $bo_date, int $bo_year, int $bo_year_th, int $bo_month, int $bo_no, string $bo_full)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO bookings_no (bo_date, bo_year, bo_year_th, bo_month, bo_no, bo_full, booking_id, created_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $bind_types .= "s";
        array_push($params, $bo_date);

        $bind_types .= "i";
        array_push($params, $bo_year);

        $bind_types .= "i";
        array_push($params, $bo_year_th);

        $bind_types .= "i";
        array_push($params, $bo_month);

        $bind_types .= "i";
        array_push($params, $bo_no);

        $bind_types .= "s";
        array_push($params, $bo_full);

        $bind_types .= "i";
        array_push($params, $booking_id);

        $bind_types .= "s";
        array_push($params, date("Y-m-d H:i:s"));

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function insert_booking_extra(int $bo_id, int $extra, string $extra_name, int $extra_type, int $extra_adult, string $extra_rate_adult, int $extra_child, string $extra_rate_child, int $extra_infant, string $extra_rate_infant, int $extra_num_private, string $extra_rate_private)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO booking_extra_charge (name, adult, child, infant, privates, rate_adult, rate_child, rate_infant, rate_private, booking_id, extra_charge_id, type, is_approved, is_deleted, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 0, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $extra_name);

        $bind_types .= "i";
        array_push($params, $extra_adult);

        $bind_types .= "i";
        array_push($params, $extra_child);

        $bind_types .= "i";
        array_push($params, $extra_infant);

        $bind_types .= "i";
        array_push($params, $extra_num_private);

        $bind_types .= "d";
        array_push($params, $extra_rate_adult);

        $bind_types .= "d";
        array_push($params, $extra_rate_child);

        $bind_types .= "d";
        array_push($params, $extra_rate_infant);

        $bind_types .= "d";
        array_push($params, $extra_rate_private);

        $bind_types .= "i";
        array_push($params, $bo_id);

        $bind_types .= "i";
        array_push($params, $extra);

        $bind_types .= "i";
        array_push($params, $extra_type);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function update_booking_extra(int $id, int $extra, string $extra_name, int $extra_type, int $extra_adult, string $extra_rate_adult, int $extra_child, string $extra_rate_child, int $extra_infant, string $extra_rate_infant, int $extra_num_private, string $extra_rate_private)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE booking_extra_charge SET";

        $query .= " extra_charge_id = ?,";
        $bind_types .= "i";
        array_push($params, $extra);

        $query .= " name = ?,";
        $bind_types .= "s";
        array_push($params, $extra_name);

        $query .= " adult = ?,";
        $bind_types .= "i";
        array_push($params, $extra_adult);

        $query .= " child = ?,";
        $bind_types .= "i";
        array_push($params, $extra_child);

        $query .= " infant = ?,";
        $bind_types .= "i";
        array_push($params, $extra_infant);

        $query .= " privates = ?,";
        $bind_types .= "i";
        array_push($params, $extra_num_private);

        $query .= " rate_adult = ?,";
        $bind_types .= "d";
        array_push($params, $extra_rate_adult);

        $query .= " rate_child = ?,";
        $bind_types .= "d";
        array_push($params, $extra_rate_child);

        $query .= " rate_infant = ?,";
        $bind_types .= "d";
        array_push($params, $extra_rate_infant);

        $query .= " rate_private = ?,";
        $bind_types .= "d";
        array_push($params, $extra_rate_private);

        $query .= " type = ?,";
        $bind_types .= "i";
        array_push($params, $extra_type);

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

    public function create_booking_no(string $today)
    {
        function setNumberLength($num, $length)
        {
            $sumstr = strlen($num);
            $zero = str_repeat("0", $length - $sumstr);
            $results = $zero . $num;

            return $results;
        }

        // #--- GET VALUE ---#
        $booing_arr = array();
        $bo_title = "BO";
        $today_str = explode("-", $today);
        $bo_year = $today_str[0];
        $bo_year_th_full = $today_str[0] + 543;
        $bo_year_th = substr($bo_year_th_full, -2);
        $bo_month = $today_str[1];
        $bo_no = 0;

        #--- CHECK TB : booking ---#
        $query = "SELECT *
            FROM bookings_no 
            WHERE id > 0
        ";
        $query .= " ORDER BY bo_date DESC, bo_no DESC LIMIT 0,1";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            $data_bo = $result->fetch_assoc();
            $bo_month_sql = setNumberLength($data_bo["bo_month"], 2);
            if ($bo_month_sql == $bo_month) {
                if ($data_bo["bo_year"] != $bo_year) {
                    $bo_no = 1;
                } else {
                    $bo_no = $data_bo["bo_no"] + 1;
                }
            } else {
                $bo_no = 1;
            }
        } else {
            $bo_no = 1;
        }

        $bo_full = $bo_title . $bo_year_th . $bo_month . setNumberLength($bo_no, 4);

        $booing_arr['bo_title'] = $bo_title;
        $booing_arr['bo_date'] = $today;
        $booing_arr['bo_year'] = $bo_year;
        $booing_arr['bo_year_th'] = $bo_year_th;
        $booing_arr['bo_month'] = $bo_month;
        $booing_arr['bo_no'] = $bo_no;
        $booing_arr['bo_full'] = $bo_full;

        return $booing_arr;
    }

    public function delete_booking_extra(int $booking_extra_id)
    {
        $query = "DELETE FROM booking_extra_charge WHERE id = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $booking_extra_id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    function insert_agent(string $name)
    {
        $bind_types = "";
        $params = array();

        $query = "INSERT INTO `companies`(`name`, `company_type_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`)
            VALUES (?, 2, 1, 0, NOW(), NOW())";

        $bind_types .= "s";
        array_push($params, $name);

        $statement = $this->connection->prepare($query);
        !empty($bind_types) ? $statement->bind_param($bind_types, ...$params) : '';

        if ($statement->execute()) {
            $this->response = $this->connection->insert_id;
        }

        return $this->response;
    }

    public function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function delete_data_cus(int $id)
    {
        $query = "DELETE FROM customers WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_data_extra(int $id)
    {
        $bind_types = "";
        $params = array();

        $query = "UPDATE booking_extra_charge SET";

        $query .= " is_approved = ?,";
        $bind_types .= "i";
        array_push($params, 0);

        $query .= " is_deleted = ?,";
        $bind_types .= "i";
        array_push($params, 1);

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

    public function delete_booking_manage_transfer(int $id)
    {
        $query = "DELETE FROM booking_manage_transfer WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_booking_manage_boat(int $id)
    {
        $query = "DELETE FROM booking_manage_boat WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        if ($statement->execute()) {
            $this->response = true;
        }

        return $this->response;
    }

    public function delete_confirm(int $id)
    {
        $query = "DELETE FROM `confirm_agent` WHERE `id` = ? ";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
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

    public function uploadFile(array $fileArray)
    {
        $responseFilename = array();
        $countfiles = count($fileArray);
        for ($i = 0; $i < $countfiles; $i++) {
            $fileTmpPath = !empty($fileArray['fileTmpPath'][$i]) ? $fileArray['fileTmpPath'][$i] : '';
            $fileName = !empty($fileArray['fileName'][$i]) ? $fileArray['fileName'][$i] : '';
            $fileSize = !empty($fileArray['fileSize'][$i]) ? $fileArray['fileSize'][$i] : '';
            $fileBefore = !empty($fileArray['fileBefore'][$i]) ? $fileArray['fileBefore'][$i] : '';
            $fileDelete = !empty($fileArray['fileDelete'][$i]) ? $fileArray['fileDelete'][$i] : '';
            $uploadFileDir = !empty($fileArray['fileDir'][$i]) ? $fileArray['fileDir'][$i] : '../../../storage/uploads/companies/logo/';

            if (!empty($fileName)) {
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedfileExtensions = array('jpg', 'jpeg', 'png');
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                    // directory in which the uploaded file will be moved
                    $targetPath = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $targetPath)) {
                        $responseFilename['filename'][$i] = $newFileName;
                        !empty($fileBefore) ? unlink($uploadFileDir . $fileBefore) : '';
                    }
                }
            } elseif ($fileDelete == 1) {
                !empty($fileBefore) ? unlink($uploadFileDir . $fileBefore) : '';
                $responseFilename['filename'][$i] = "";
            } else {
                $responseFilename['filename'][$i] = $fileBefore;
            }
        }

        return $responseFilename;
    }
}
