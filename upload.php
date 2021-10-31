<?php
require "JSONFormat.php";
require "CSVFormat.php";

    if (isset($_FILES["file"]))
    {
        $type = $_FILES["file"]['type'];
        if ($type === "application/json")
            JSONFormat::getInstance()->format(file_get_contents($_FILES['file']['tmp_name']));
        if ($type === "text/csv")
            CSVFormat::getInstance()->format($_FILES['file']['tmp_name']);
    }

?>