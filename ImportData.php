<?php
require "DBConnection.php";
/**
 *  Uploads the Data in Datasource
 */
class ImportData
{

    /**
     * @var null
     */
    private static $instance = null;

    private static $link = null;


    /**
     * @return ImportData|null
     */
    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        self::$link = DBConnection::getInstance()->connect();

        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function upload($data)
    {
        foreach ($data as $obj)
        {
            $sql = "INSERT INTO ship_positions (mmsi, status, stationId, speed , lon, lat, course, heading, rot, timestamps) VALUES ('".$obj->mmsi."', '".$obj->status."', ".$obj->stationId." , ".$obj->speed." , ".$obj->lon." , ".$obj->lat." , ".$obj->course." , ".$obj->heading.",'".$obj->rot."' , ".$obj->timestamp.")";
            mysqli_query(self::$link, $sql);
        }
    }
}