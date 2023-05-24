<?php
/*
	Purpose: This file contains the function that checks if the username and password stored in cookies match the ones in the database.
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/

/**
 * The function checks if the username and password stored in cookies match the ones in the database.
 * 
 * return a boolean value (true or false) depending on whether the username and userpass cookies are
 * set and match a record in the assign2_users table in the database.
 */
function idCorrectness() {
	require_once "settings.php";

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	if (!$conn) { echo "<p>Database connection failure.</p>"; exit(); }

	$sql_table = "assign2_users";

	$username = $_COOKIE['name'] ?? null;
	$userpass = $_COOKIE['pass'] ?? null;

	if ($username == null || $userpass == null) {
		return false;
	}

	$sql_command = "SELECT username, user_pass FROM $sql_table WHERE username = '$username' AND user_pass = '$userpass'";
	$result = mysqli_query($conn, $sql_command);
	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}
?>