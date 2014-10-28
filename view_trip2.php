<?php
include_once('_php/_session.php');
$tripID = htmlspecialchars($_GET["trip"]);
$query = 'select privacy, owner_id from trips where trip_id = $1';
$result = $pg->_pg_query($query, $trip_id);
$row = pg_fetch_assoc($result);


print_r($row);
if(strcmp($row['privacy'], 'onlyme') == 0) {
    if(!isset($_SESSION['user_id']))
      print '!isset($_SESSION[\'user_id\'])';
    else if(!($_SESSION['user_id'] == $row['owner_id']))
    print '!($_SESSION[\'user_id\'] == $row[\'owner_id\']';
}

?>
