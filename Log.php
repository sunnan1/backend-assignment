<?php
class Log
{

    /**
     * @var null
     */
    private static $instance = null;


    /**
     * @return Log|null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function create($data)
    {
        DBConnection::getInstance()->connect()->query("INSERT INTO audit_log(request_query , request_ip , hostname) VALUES ('".$data['query']."' , '".$data['ip']."' , '".$data['host']."')");
        DBConnection::getInstance()->connect()->query("INSERT INTO api_throttle(request_ip , created_at) VALUES ('".$data['ip']."' , NOW() )");
    }
}