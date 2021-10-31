<?php

class CSVFormat
{
    private $data = [];

    /**
     * @var null
     */
    private static $instance = null;


    /**
     * @return CSVFormat|null
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
        $data = [];

        $file = fopen($raw,"r");

        fgets($file); // skipping the header here

        while(! feof($file))
        {
            $arr = fgetcsv($file);
            if (isset($arr[0]))
            {
                $data[] = [
                    'mmsi' => $arr[0],
                    'status' => $arr[1],
                    'stationId' => $arr[2],
                    'speed' => $arr[3],
                    'lon' => $arr[4],
                    'lat' => $arr[5],
                    'course' => $arr[6],
                    'heading' => $arr[7],
                    'rot' => $arr[8],
                    'timestamp' => $arr[9],
                ];
            }
        }
        $data = json_decode(json_encode($data));
        ImportData::getInstance()->upload($data);
    }
}