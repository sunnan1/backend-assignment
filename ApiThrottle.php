<?php

class ApiThrottle
{
    private $requests = 10;

    /**
     * @var null
     */
    private static $instance = null;


    /**
     * @return ApiThrottle|null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function isValid($ip)
    {
        $query = DBConnection::getInstance()->connect()->query("select count(*) as req from api_throttle  where request_ip = '".$ip."' AND created_at >= DATE_SUB(NOW(),INTERVAL 1 HOUR)");

        if ($query->num_rows > $this->requests)
        {
            die ("You have already made 10 requests in an hour");
        }
    }
}