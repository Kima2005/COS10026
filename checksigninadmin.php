<!-- 
/*
    Purpose: This file is used to check if the user is an admin or not after signing in.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<?php
require_once "settings.php";

if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
    exit;
}

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) { echo "<p>Database connection failure.</p>"; exit(); }

$sql_table = "assign2_users";

$email = hash("sha512", $_POST["email"]);
$secret_password = hash("sha512", $_POST["secret_password"]);

// Check if the username already exists
$sql_check_username = "SELECT email FROM $sql_table WHERE second_pw = '$secret_password'";
$result = mysqli_query($conn, $sql_check_username);

if (mysqli_num_rows($result) > 0) {
	foreach ($result as $row) {
		if ($row['email'] == $email) {
			$day = 7;
			/* This line of code is setting a cookie named "admin" with a value of "true" and an expiration time
			of 7 days (86400 seconds per day multiplied by 7 days) from the current time. The cookie is also
			set to be accessible to the entire website ("/"). */
			setcookie("admin", "true", time() + (86400 * $day), "/");
			header("refresh:1;url=manager.php");
		} else {
			header("refresh:3;url=signin.php");
			echo "Redirecting to signin page in 3 seconds due to wrong password 😑.";
		}
	}
} else {
    header("refresh:3;url=signin.php");
	echo "Redirecting to signin page in 3 seconds due to wrong password 😑.";
}

mysqli_close($conn);
?>