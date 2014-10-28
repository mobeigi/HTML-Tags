<?php
include_once('_php/_session.php');
$tripID = htmlspecialchars($_GET["trip"]);
$query = 'select privacy, owner_id from trips where trip_id = $1';
$result = $pg->_pg_query($query, $trip_id);
$row = pg_fetch_assoc($result);


print($row['privacy']);
if(strcmp($row['privacy'], 'onlyme') == 0) {
    if(!isset($_SESSION['user_id']))
      header('location: http://triptags.azurewebsites.net/profile.php');
    else if(!($_SESSION['user_id'] == $row['owner_id']))
      header('location: http://triptags.azurewebsites.net/profile.php');
}

?>
