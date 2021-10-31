<?php
require "DBConnection.php";
class ShipPositions
{

    private $link ;
    public function __construct()
    {
        $this->link = DBConnection::getInstance()->connect();
    }

    public function search($mmsi = "" , $lat = 0 , $lon = 0)
    {

        $query = "SELECT * FROM ship_positions WHERE";
        if (strpos($mmsi , ",") !== FALSE)
        {
            $query .= " mmsi IN (".$mmsi.")";
        }
        else if ($mmsi !== "")
        {
            $query .= " mmsi = ". $mmsi;
        }

        if ($lon !== 0 && $lon !== "")
        {
            $query .= (($mmsi !== "") ? "OR" : "")." lon >= ". $lon;
        }

        if ($lat !== 0 && $lat !== "")
        {
            $query .= " AND lat <= ". $lat;
        }
        $data = $this->link->query($query);
        if ($data->num_rows > 0) {
            return $data;
        }
        return null;
    }
}