<?php

include_once('_session.php');

$trip_id = $_GET['trip'];

$longitude = array();
$latitude = array();
$group_id = array();
$images = array();

$query = "select group_id, longitude, latitude from image_groups where trip_id = $1";
$result = $pg->_pg_query($query, $trip_id);

$row = pg_fetch_all($result);
$row_nums = $pg->_pg_num_rows($row);
print($row_nums);

print_r($row);

for($i = 0; $i != $row_nums; $i++) {
  print_r($row[$i]);
}

?>
