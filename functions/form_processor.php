<?php
//print_r($_POST);
$image_array_size = sizeof($_POST['image_group_name']);

print "<p>$image_array_size</p>";
for($i = 0; $i != $image_array_size; $i++) {
    print "<p>".$_POST['image_group_name'][$i]."</p>";
}
?>
