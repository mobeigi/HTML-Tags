//This script logs off the user
<?php
    include("/_session.php");
    unset($_SESSION['user_id']);
    session_destroy();
    header("location:http://triptags.azurewebsites.net/");
?>
