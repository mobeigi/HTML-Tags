<?php
//print_r($_POST);
$image_array_size = sizeof($_POST['image_group_name']);
for($i = 0; $i != $image_array_size; $i++) {
    print $_POST['image_group_name'][$i];
}
?>
