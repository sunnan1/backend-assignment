<?php
require "ShipPositions.php";
require "Log.php";
require "ApiThrottle.php";
header("Content-Type:application/json");

    $ip = (getenv('HTTP_CLIENT_IP')?:
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
            getenv('HTTP_FORWARDED_FOR')?:
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR'));

// check if valid to make request

    ApiThrottle::getInstance()->isValid($ip);

// log queries here
    Log::getInstance()->create(['query' => json_encode($_GET) , 'ip' => $ip , 'host' => gethostname()]);


    $obj = new ShipPositions();
    $data = $obj->search($_GET['mmsi'] , $_GET['lat'] , $_GET['lon']);
    if ($data)
    {
        while($row = $data->fetch_assoc()) {
            echo "MMSI: " . $row["mmsi"]. " - status: " . $row["status"]. " - stationId " . $row["stationId"]. " - speed ". $row['speed'] . " - lon ". $row['lon'] . " - lat " . $row['lat'] . PHP_EOL;
        }
        die();
    }
    die("Record Not Found");
?>