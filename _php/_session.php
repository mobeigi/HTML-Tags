<?php
include('_postgres.php');
$pg = new postgres();

$result = $pg->_pg_connect('23.102.176.176', 'azureuser', 'RLSfTv3Ewx', 'test', 5432);
if(!$result) return false;

session_start();
?>
