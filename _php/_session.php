<?php
//
// Website Session Handler
//
include_once('_postgres.php');

$pg = new postgres();

$result = $pg->_pg_connect('23.102.176.176', 'azureuser', 'RLSfTv3Ewx', 'test', 5432);
if(!$result) exit(1);

session_start();

$_SESSION['session_start_time'] = time();

?>
