<?php
/*
* Processes forms based on 'source' input field
* 
*/

//Ensure source is not empty
if(!isset($src)) {
  $errorMessage .= "<li>Example error.</li>";
  exit(1);
}

//Find source of form
$src = $_POST['source'];
$errorMessage = "";

//Switch through different valid sources
switch($src) {
case "create_trip":
  echo "test1";
  break;
  
//Source is not valid, error
default:
  $errorMessage .= "<li>Unknown form location.</li>";
}

?>