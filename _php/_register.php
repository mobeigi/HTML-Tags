<?php
include('_session.php');
include('_functions.php')
$username = $_POST['userEmail'];
$password = $_POST['userPassword'];
 if(!empty($username) || !empty($password)) {
	$query = 'insert into users (user_email,user_password) values ($1,$2)';
	$pg->_pg_query($query,$username,$password);
}
// auto-login new user...
if(!login($username, $password)) {
    header("location: http://triptags.azurewebsites.net/");
} else {
    header("location: http://triptags.azurewebsites/profile.php");
}

?>
