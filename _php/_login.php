<?php
include_once('_session.php');
include_once('_functions.php');
$username = $_POST['userEmail'];
$password = $_POST['userPassword'];

if(!login($username, $password)) {
		header("location: http://triptags.azurewebsites.net/?error=2");
} else {
		header("location: http://triptags.azurewebsites.net/profile.php");
}
?>
