<?php
include('_session.php');
$page = $_POST['page']
$username = $_POST['userEmail'];
$password = $_POST['userPassword'];
 if(!empty($username) || !empty($password)) {
$query = 'insert into users (user_email,user_password) values ($1,$2)';
$pg->_pg_query($query,$username,$password);
}
header("location: http://triptags.azurewebsites.net/$page");
?>
