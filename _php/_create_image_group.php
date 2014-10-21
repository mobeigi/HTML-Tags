<?php
include('_session.php');

$trip_id = $_POST['trip_id'];
if(empty($trip_id)) return false;
$image_group_name = $_POST['image_group_name'];
$image_group_location = $_POST['image_group_location'];
$query = 'SELECT trip_id FROM trips WHERE trip_id = $1';
$result = $pg->_pg_query($query, $trip_id);
$num_rows = $pg->_pg_now_rows($result);
if($num_rows == 0) return false;
// assume it is a comma separated list of locations at the moment?
$query = 'INSERT INTO image_groups (trip_id, name, longitude, latitude) VALUES ($1, $2, $3, $4)';
$pg->_pg_query($query, $trip_id, $image_group_name, $image_group_long, $image_group_lati);

?>
