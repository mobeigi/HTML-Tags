<?php
include('_session.php');
$username = $_POST['userEmail'];
$password = $_POST['userPassword'];

$query = 'insert into users (user_email,user_password) values ($1,$2)'
$pg->_pg_query($query,$username,$password);
?>
