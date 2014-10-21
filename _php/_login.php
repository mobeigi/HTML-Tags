<?php
include('_functions.php');
$username = $_POST['userEmail'];
$password = $_POST['userPassword'];

if(!login($username, $password)) {
		header("location: http://triptags.azurewebsites.net/");
} else {
		header("location: http://triptags.azurewebsites/profile.php");
}
?>
