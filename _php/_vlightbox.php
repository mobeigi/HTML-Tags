<?php
include_once('_session.php');
if(empty($_GET['group_id'])) header('location: http://triptags.azurewebsites.net/');
$group_id = $_GET['group_id'];
$images = array();
$query = 'select path from images where group_id = $1';
$result = $pg->_pg_query($query, $group_id);

$rows = pg_fetch_all($result);
$row_nums = sizeof($rows);
for($i = 0; $i != $row_nums; $i++) {
  array_push($images,$rows[$i]['path']);
}
?>
