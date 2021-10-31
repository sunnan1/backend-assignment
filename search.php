<?php

    if (isset($_GET['submit']))
    {
        $mmsi = isset($_GET['mmsi']) ? $_GET['mmsi'] : '';
        $lat = isset($_GET['lat']) ? $_GET['lat'] : '';
        $lon = isset($_GET['lon']) ? $_GET['lon'] : '';

        $url = "https://localhost/marine/api.php?mmsi=".$mmsi."&lat=".$lat."&lon=".$lon;
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        session_write_close();
        $response = curl_exec($client);
        print_r($response);
    }
    else
    {
        header("Location: index.php");
    }
?>
