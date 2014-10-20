<?php
include('_session.php');
$username = $_POST['userEmail'];
$password = $_POST['userPassword'];

if(empty($username)) return false;
if(empty($password)) return false;

$query = 'SELECT user_id, user_email, user_password FROM users WHERE user_email = $1';

$result = $pg->_pg_query($query, $username);
$num = $pg->_pg_num_rows($result);
// user doesnt exist.
if($num == 0) return false;

$row = pg_fetch_assoc($result);
print "row[]: " . $row['user_password'];
print "user[]: " .$password;
if(strcmp($row['user_password'],$password) == 0) {
	print $row['user_id'];
	$_SESSION['user_id'] = $row['user_id'];
	header("location: http://triptags.azurewebsites.net/profile.php");
}
else {
	header("location: http://triptags.azurewebsites.net/");
}
?>
