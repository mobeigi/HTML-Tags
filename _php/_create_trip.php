<?php
include ('_session.php');

if(!isset($_SESSION['user_id'])) header('location: http://triptags.azurewebsites.net/');
if(empty($_POST['trip_name'])) return false;
$trip_name = $_POST['trip_name'];
$trip_description = $_POST['trip_desc'];
$trip_privacy = $_POST['trip_privacy'];

$query = 'INSERT INTO trips (name, description, privacy) VALUES ($1, $2, $3)';
$pg->_pg_transaction('begin');
$result = $pg->_pg_query($query, $trip_name, $trip_description, $trip_privacy);
if(!$result) $pg->transaction('rollback');
$pg->_pg_transaction('commit');

?>
