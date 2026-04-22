<?php
class DB
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'love.andaman';
    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }

            $this->connection->set_charset("utf8mb4");
        }

        return $this->connection;
    }

    public function close()
    {
        $this->connection->close();
    }
}