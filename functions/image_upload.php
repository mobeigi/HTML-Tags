<?php
if (isset($_POST['submitbtn'])) {
    $j = 0; //Variable for indexing uploaded image 
    
    $upload_dir = "D:\\home\\site\\wwwroot\\uploads\\"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $upload_dir . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (in_array($file_extension, $validextensions)) {
            echo $_FILES['file']['tmp_name'][$i] . " => " . $target_path;
            
    
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
    
    exit();
}
?>