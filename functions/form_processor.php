<?php

// replace all the return (false|true) with error messages (and redirection?).
// need to run triptags.azurewebsites.net/_php/_install.php again before using this script.
include('/../_php/_session.php');

// check if trip.name has a name...
if(empty($_POST['trip_name'])) return false;
// we need the user to be logged in...
if(!isset($_SESSION['user_id'])) return false;

$pg->_pg_transaction('begin');
// make a new trip
$query = "insert into trips (name, description, privacy, owner_id) values ($1, $2, $3, $4)";
$result = $pg->_pg_query($query, $_POST['trip_name'], $_POST['trip_desc'], $_POST['privacy'], $_SESSION['user_id']);
if(!$result) {
  $pg->_pg_transaction('rollback');
  return false;
}

// get the trip_id (we are going to need it)
$query = "select trip_id from trips where name = $1";
$result = $pg->_pg_query($query, $_POST[trip_name]);
$row = $pg->_pg_fetch_row($result);
$trip_id = $row['trip_id'];

// how many image groups do we have?
$image_group_num = sizeof($_POST[image_group_name]);
// insert all the image groups into the database
for($i = 0; $i != $image_group_num; $i++) {
  $query = "insert into image_groups (trip_id, name, location) values ($1, $2, $3)";
  $result = $pg->_pg_query($query, $trip_id, $_POST['image_group_name'][$i], $_POST['image_group_location'][$i]);
  if(!$result) {
    $pg->transaction('rollback');
    return false;
  }
  // get the image group id (we are going to need it)
  $query = "select group_id from image_groups where name = $1 and trip_id = $2";
  $result = $pg->_pg_query($query, $_POST['image_group_name'][$i], $trip_id);
  $row = $pg->_pg_fetch_row($result);
  $image_group_id = $row['group_id'];
  // insert all of the uploaded images into the database
  $query = "insert into images (group_id, path) values ($1, $2)";
  for($n = 0; $n != sizeof($_POST['image_group_links_'.$i]); $n++) {
      $pg->_pg_query($query, $image_group_id, $_POST['image_group_links_'$i][$n]);
      if(!$result) {
          $pg->_pg_transaction('rollback');
          return false;
      }
  }
}
// commit all inserts into the database
$pg->_pg_transaction('commit');
return true;
?>
