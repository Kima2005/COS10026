<!-- 
/*
    Purpose: This file is used to log out the user. It deletes all the cookies associated with the current domain.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<?php
	require('./_checkuser.php');
	require('./_checkadmin.php');
	/* This code is checking if the user is authorized to access the page. */
	if (!isset($_SERVER['HTTP_REFERER'])) {
		header("location: index.php");
		exit;
	}
	
	if (!((isset($_COOKIE['user']) && $_COOKIE['user'] == 'true' && idCorrectness()) || adCorrectness())){
		header("refresh:1;url=index.php");
		exit();
	}
	echo "Logging out...";
	echo "<br>";

	if (isset($_COOKIE['un'])) {
		echo "Goodbye, ".$_COOKIE['un']."!";
	} else if (isset($_COOKIE['admin'])) {
		echo "Goodbye, admin!";
	}
	/* This code is looping through all the cookies stored in the `` superglobal array and
	deleting them by setting their expiration time to a time in the past (3600 seconds ago). This
	effectively removes all cookies associated with the current domain. */
	foreach ($_COOKIE as $key => $value) {
		setcookie($key, "", time() - 3600);
	}
	header("refresh:1;url=index.php");
?>