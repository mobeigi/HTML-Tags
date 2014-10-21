<?php

print_r($_POST);
// replace all the return (false|true) with error messages (and redirection?).
// need to run triptags.azurewebsites.net/_php/_install.php again before using this script.
include_once('/../_php/_session.php');

// check if trip.name has a name...
if(empty($_POST['trip_name'])) //header('location: http://triptags.azurewebsites.net/create_trip.php');
// we need the user to be logged in...
if(!isset($_SESSION['user_id'])) //header('location: http://triptags.azurewebsites.net/');

$pg->_pg_transaction('begin');
// make a new trip
$trip_hash = sha1($_SESSION['user_id'] + time());
$query = "insert into trips (name, description, privacy, owner_id, trip_hash) values ($1, $2, $3, $4, $5)";
$result = $pg->_pg_query($query, $_POST['trip_name'], $_POST['trip_desc'], $_POST['trip_privacy'], $_SESSION['user_id'], $trip_hash);
if(!$result) {
  $pg->_pg_transaction('rollback');
  //header('location: http://triptags.azurewebsites.net/create_trip.php');
}

// get the trip_id (we are going to need it)
$query = "select trip_id from trips where trip_hash = $1";
$result = $pg->_pg_query($query, $trip_hash);
$row = pg_fetch_assoc($result);
$trip_id = $row['trip_id'];

// how many image groups do we have?
if(isset($_POST['image_group_name'])) {
$image_group_num = sizeof($_POST['image_group_name']);
// insert all the image groups into the database
for($i = 0; $i != $image_group_num; $i++) {
  $query = "insert into image_groups (trip_id, name, longitude, latitude, description) values ($1, $2, $3, $4, $5)";
  // split up the location into an array in format (longitude, latitude)
  $location = explode(",", $_POST['image_group_location'][$i]);
  $result = $pg->_pg_query($query, $trip_id, $_POST['image_group_name'][$i], $location[0], $location[1], $_POST['image_group_desc'][$i]);
  if(!$result) {
    $pg->_pg_transaction('rollback');
    //header('location: http://triptags.azurewebsites.net/create_trip.php');
  }
  // get the image group id (we are going to need it)
  $query = "select group_id from image_groups where name = $1 and trip_id = $2";
  $result = $pg->_pg_query($query, $_POST['image_group_name'][$i], $trip_id);
  $row = pg_fetch_assoc($result);
  $image_group_id = $row['group_id'];
  // insert all of the uploaded images into the database
  $query = "insert into images (group_id, path) values ($1, $2)";
  for($n = 0; $n != sizeof($_POST['image_group_links_'.$i]); $n++) {
      $pg->_pg_query($query, $image_group_id, $_POST['image_group_links_'.$i][$n]);
      if(!$result) {
          $pg->_pg_transaction('rollback');
          //header('location: http://triptags.azurewebsites.net/create_trip.php');
      }
  }
  // if the cover_image has been set, we update the trip record to reflect it
  if(isset($_POST['coverPhoto'])) {
    $query = 'update trips set cover_image = $1 where trip_hash = $2';
    $result = $pg->_pg_query($query, $_POST['coverPhoto'], $trip_hash);
    if(!$result) {
        $pg->_pg_transaction('rollback');
        //header('location: http://triptags.azurewebsites.net/create_trip.php');
    }
  }
}
}
// commit all inserts into the database
$pg->_pg_transaction('commit');
// redirect user to their profile page
////header('location: http://triptags.azurewebsites.net/profile.php');
?>
