<?php

/**
 * Singleton Pattern
 * returns the same object evey time when this class is initiated
 */
class DBConnection
{
    private $conn = null;

    /**
     * @var null
     */
    private static $instance = null;


    /**
     * @return DBConnection|null
     */
    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connect()
    {
        if ($this->conn !== null)
        {
            return $this->conn;
        }

        return $this->makeConnection();
    }

    private function makeConnection()
    {
//      establish connection

        $this->conn = new mysqli('127.0.0.1', 'root' , '' , 'marine');

//      Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

}