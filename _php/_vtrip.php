<?php

include_once('_session.php');
if(empty($_GET['trip'])) header('location: http://triptags.azurewebsites.net/');
$trip_id = $_GET['trip'];

$longitude = array();
$latitude = array();
$group_id = array();
$images = array(array());

$query = 'select name from trips where trip_id = $1';
$result = $pg->_pg_query($query, $trip_id);
$row = pg_fetch_assoc($result);
$trip_name = $row['name'];

$query = 'select group_id, longitude, latitude from image_groups where trip_id = $1';
$result = $pg->_pg_query($query, $trip_id);

$rows = pg_fetch_all($result);
$row_nums = sizeof($rows);

for($i = 0; $i != $row_nums; $i++) {
  array_push($group_id, $rows[$i]['group_id']);
  array_push($longitude, $rows[$i]['longitude']);
  array_push($latitude, $rows[$i]['latitude']);
  //
  $query = 'select path from images where group_id = $1';
  $result = $pg->_pg_query($query, $group_id[$i]);
  $row = pg_fetch_all($result);
  for($m = 0; $m != sizeof($row); $m++) {
    array_push($images[$i], $row[$m]['path']);
  }
}

print_r($group_id);
print_r($latitude);
print_r($longitude);
print_r($images);

?>
