<?php
include_once('postgres.php');
$host = "23.102.176.176";
$username = "azureuser";
$password = "YJ7dMgOCPSsM1dI";
$database = "test";
$port = 5432;

$pg = new postgres();

$pg->_pg_connect($host, $username, $password, $database, $port);

$pg->_pg_query("INSERT INTO trips VALUES ('Italy', 'me and my friends go to italy!');");

$res = $pg->_pg_query("SELECT name, description FROM trips");

echo $res[0];

die;

?>
<!DOCTYPE html>
<html>
  <head>
    <title>View Trip #798552761 - TripTags</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="tripview.js"></script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>