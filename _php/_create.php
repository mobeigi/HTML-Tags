<?php
include ('_session.php');
$trip_name = $_POST['trip_name'];
$trip_description = $_POST['trip_desc'];
$trip_privacy = $_POST['trip_privacy'];

print $trip_name;
print $trip_description;
print $trip_privacy;

if(empty($trip_name)) {
	print 'variable $trip_name is empty';
	return false;
}
$query = 'INSERT INTO trips (name, description, privacy) VALUES ($1, $2, $3)';
$pg->_pg_transaction('begin');
$result = $pg->_pg_query($query, $trip_name, $trip_description, $trip_privacy);
if(!$result) $pg->transaction('rollback');
$pg->_pg_transaction('commit');

?>
