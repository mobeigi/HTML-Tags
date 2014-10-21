<?php
include('_session.php');
$username = $_POST['userEmail'];
$password = $_POST['userPassword'];

function login($username, $password) {
	if(empty($username)) return false;
	if(empty($password)) return false;

	$query = 'SELECT user_id, user_email, user_password FROM users WHERE user_email = $1';

	$result = $pg->_pg_query($query, $username);
	$num = $pg->_pg_num_rows($result);
	// user doesnt exist.
	if($num == 0) return false;

	$row = pg_fetch_assoc($result);
	// check if the "plain-text" password is the same as the database
	// NEVER do this in a production environment...
	if(strcmp($row['user_password'],$password) == 0) {
		print $row['user_id'];
		$_SESSION['user_id'] = $row['user_id'];
		return true;
	}
	else {
		return false;
	}
}

function generate_salt() {

}
function hash_plaintext($plain_text) {
		if(func_num_args() == 1) {

		} else {
				$args = func_get_args();
				$params = array_splice($args, 1);
				// hash(sha512, $plain_text . $salt);
		}
}

if(!login($username, $password)) {
		header("location: http://triptags.azurewebsites.net/");
} else {
		header("location: http://triptags.azurewebsites/profile.php");
}
?>
