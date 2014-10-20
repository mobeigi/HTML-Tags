<?php
$output_dir = "uploads/";
move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. "test.jpg");

 
?>