<?php
include('_session.php');
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username)) return false;
if(empty($password)) return false;

$query = 'SELECT user_id, username, password FROM users WHERE username = $?';

$result = $pg->_pg_query($query, $username);
$num = $pg->_pg_num_result($result);
// user doesnt exist.
if($num == 0) return false;

$row = $pg->_pg_fetch_row($result);
if($row['password'] == $password) {
	session_start();
	$_SESSION['user_id'] = $row['user_id'];
}
else {
	return false;
}


// $_SESSION['user_id'];

// ... (owner_id) VALUE ($1)
// $pg->_pg_query($query, .. $_SESSION['user_id']);
// select ..  from trips where owner_id = $user_id;
// select * from image_groups where trip_id = $trip_id;
// select image_id,path from images where group_id = $image_group_id;
// row[1]['trip_id']
?>
