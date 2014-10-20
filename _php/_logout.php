//This script logs off the user
<?php
    print($_SESSION['user_id']);
    unset($_SESSION['user_id']);
    session_destroy();
?>