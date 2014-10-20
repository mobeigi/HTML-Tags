<?php
if (isset($_POST['submitbtn'])) {
    $j = 0; //Variable for indexing uploaded image 
    
	$upload_path = "uploads/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['imagefile']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['imagefile']['name'][$i]));//explode imagefile name from dot(.) 
        $imagefile_extension = end($ext); //store extensions in the variable
        
		$target_path = $upload_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the imagefiles in array       
      
	  if (in_array($imagefile_extension, $validextensions)) {
            if (move_uploaded_imagefile($_FILES['imagefile']['tmp_name'][$i], $target_path)) {//if imagefile moved to uploads folder
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if imagefile was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if imagefile size and imagefile type was incorrect.
            echo $j. ').<span id="error">***Invalid imagefile Size or Type***</span><br/><br/>';
        }
    }
}
?>