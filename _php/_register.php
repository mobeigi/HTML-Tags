<?php
include_once('_session.php');
include_once('_functions.php');

$username = $_POST['userEmail'];
$password = $_POST['userPassword'];
$query = 'select user_email from users where user_email = $1';
$result = $pg->_pg_query($query, $username);
if($pg->_pg_num_rows($result) > 0) {
	header("location: http://triptags.azurewebsites.net/");
}
 if(!empty($username) || !empty($password)) {
	$query = 'insert into users (user_email,user_password) values ($1,$2)';
	$pg->_pg_query($query,$username,$password);
}
// auto-login new user...
if(!login($username, $password)) {
    header("location: http://triptags.azurewebsites.net/");
} else {
    header("location: http://triptags.azurewebsites.net/profile.php");
}

?>
