<?php
$output_dir = "uploads/";

if ($_POST['submitbtn']=="Submit")
{
	$ret = array();
  
	$error =$_FILES["imagefile"]["error"];
  
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
  
	if(!is_array($_FILES["imagefile"]["name"])) //single file
	{
 	 	$fileName = $_FILES["imagefile"]["name"];
 		move_uploaded_file($_FILES["imagefile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["imagefile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["imagefile"]["name"][$i];
		move_uploaded_file($_FILES["imagefile"]["tmp_name"][$i],$output_dir.$fileName);
	  	$ret[]= $fileName;
	  }
	
	}
    echo json_encode($ret);
 }
 
 exit();
 
?>