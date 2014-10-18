<?php
/*
* Processes forms based on 'source' input field
* 
*/

//Find source of form
$src = $_POST['source'];
$errorMessage = "";

//Ensure source is not empty
if(isset(src) == false) {
  $errorMessage .= "<li>Example error.</li>";
}

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