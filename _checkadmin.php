<?php
/*
	Purpose: This file contains the function to check if the 'admin' cookie is set and has a value of 'true'.
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/

/**
 * The function checks if the 'admin' cookie is set and has a value of 'true'.
 * 
 * @return a boolean value (true or false) depending on whether the 'admin' cookie is set and has a
 * value of 'true'.
 */
function adCorrectness() {
	if (isset($_COOKIE['admin']) && $_COOKIE['admin'] == 'true') {
		return true;
	} else {
		return false;
	}
}
?>