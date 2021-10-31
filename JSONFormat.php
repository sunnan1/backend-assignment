<?php

require "ImportData.php";

class JSONFormat
{

    private $data = [];

    /**
     * @var null
     */
    private static $instance = null;


    /**
     * @return JSONFormat|null
     */
    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function format($raw)
    {
        ImportData::getInstance()->upload(json_decode($raw));
    }
}