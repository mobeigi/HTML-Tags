//This script logs off the user
<?php
    unset($_SESSION['user_id']);
    session_destroy();
?>