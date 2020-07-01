<?php

class Database
{


    public $dbservername = 'localhost';

    public $dbusername = 'root';

    public $dbpassword = 'password';

    public $dbname = 'cashcontest';

    public $conn;

    public $sql;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
    }

    public function setQuery($query)
    {
        $this->sql = $query;
        $result = mysqli_query($this->conn, $this->sql);
        return $result;
    }
}

$db = new Database();
