<?php
include_once('_session.php');
function login($username, $password) {
  global $pg;
  if(empty($username)) return false;
  if(empty($password)) return false;

  $query = "SELECT user_id, user_email, user_password FROM users WHERE user_email = $1";

  $result = $pg->_pg_query($query, $username);
  $num = $pg->_pg_num_rows($result);
  // user doesnt exist.
  if($num == 0) return false;

  $row = pg_fetch_assoc($result);
  // check if the "plain-text" password is the same as the database
  // NEVER do this in a production environment...
  if(strcmp($row['user_password'],$password) == 0) {
    $_SESSION['user_id'] = $row['user_id'];
    return true;
  }
  return false;
}
?>
