<?php
session_start();

if (isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marine Traffic</title>
</head>
<body>
      <center><h1>Vessels Tracks</h1></center>

        <fieldset>
            <form action="upload.php" target="_blank" method="post" enctype="multipart/form-data">
                <label for="">Import Data From JSON</label>
                <input type="file" value="Select File" name="file">
                <input type="submit" name="import" value="Upload">
            </form>
        </fieldset>


      <fieldset>
          <legend>Filters</legend>
          <form action="search.php" method="get">
              <label for="">MMSI</label>
              <input type="text" name="mmsi" placeholder="For multiple use comma to separate them">
              <label for="">Longitude</label>
              <input type="text" name="lon">
              <label for="">Latitude</label>
              <input type="text" name="lat">
              <input type="submit" name="submit" value="Search">
          </form>
      </fieldset>
</body>
</html>

