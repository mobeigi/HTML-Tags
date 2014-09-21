<?php
$con = pg_connect("host=23.102.176.176 port=5432 dbname=mary user=azureuser password=YJ7dMgOCPSsM1dI") or die('connection failed');


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