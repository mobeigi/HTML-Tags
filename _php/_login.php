<?php
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username)) return false;
if(empty($password)) return false;

$query = 'SELECT username, password FROM users WHERE username = $?';


?>
