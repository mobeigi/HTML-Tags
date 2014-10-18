<?php
/*
* Processes forms based on 'source' input field
* 
*/

/*
* TODO: exit(1) replaced with an appropriate error returning function
*
*/

$errorMessage = "";

//Ensure source is not empty
if(!isset($_POST['source'])) {
  $errorMessage .= "<li>Example error.</li>";
  exit(1);
}

//Find source of form
$src = $_POST['source'];

//Switch through different valid sources
switch($src) {
case "create_trip":
  //Collect variables
  $tripName = $_POST['trip_name'];
  $tripDesc = $_POST['trip_desc'];
  $tripPrivacy = $_POST['trip_privacy'];
  
  //Validate data
  if(empty($tripName)) {
      $errorMessage .= "<li>You forgot to enter a trip name.</li>";
      exit(1);
   }
  if(empty($tripDesc)) {
    $errorMessage .= "<li>You forgot to enter a description.</li>";
    exit(1);
  }
  if(empty($tripPrivacy)) {
    $errorMessage .= "<li>You forgot to select a privacy level.</li>";
    exit(1);
  }
  
  //Test output
  echo $tripName . "\n";
  echo $tripDesc . "\n";
  echo $tripPrivacy . "\n";
  
  
  break;
  
//Source is not valid, error
default:
  $errorMessage .= "<li>Unknown form location.</li>";
}

?>