<!-- /*
	Purpose: This file is the user page of the website.
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/ -->

<?php
	require('./_checkuser.php');
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	/* This code block is checking if the user is authorized to access the user page. It checks if the
	'user' cookie is set to 'true' and if the user's ID is correct. If any of these conditions are not
	met, it displays an error message and redirects the user to the login page after 5 seconds. */
	if (!(isset($_COOKIE['user']) && $_COOKIE['user'] == 'true' && idCorrectness())){
		echo "ERROR 403: YOU DO NOT HAVE ENOUGH AUTHORITY TO ACCESS THE USER PAGE. PLEASE LOG IN TO VERIFY YOUR AUTHORITY.";
		echo "<br> This site will automatically redirect to the login page within 5 seconds.";
		header("refresh:5;url=signin.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en" id="en_html">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Full HD, Nguyen Dang Duc Anh" />
    <title>User panel</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/user.css" />
</head>

<body id="en_body">
    <?php
    include './header.inc';
    ?>
    <h1>Hello <?php
	echo $_COOKIE['un'];
	?>!</h1>
	<a id="tobyebye" href="./logout.php">Log out</a>
	<?php
		require "settings.php";
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) { echo "<p>Database connection failure.</p>"; exit(); }
		$sql_table = "orders_hashed";
		$sql_table2 = "orders";
		$email = $_COOKIE['email']; // email is already hashed
		$query = "SELECT order_id FROM $sql_table WHERE hash_email = '$email'";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			echo "<p>Something is wrong with ", $query, "</p>";
		} else {
			// display the orders
			echo "<table border=\"1\" id=\"user_table\">\n";
			echo "<tr id=\"row_user_table\">\n"
				. "<th scope=\"col\">Order ID</th>\n"
				. "<th scope=\"col\">Product name</th>\n"
				. "<th scope=\"col\">Order status</th>\n"
				. "<th scope=\"col\">Order time</th>\n"
				. "<th scope=\"col\">Order cost</th>\n"
				. "<th scope=\"col\">Features</th>\n"
				. "<th scope=\"col\">Contact</th>\n"
				. "</tr>\n";
			// retrieve current record pointed by the result pointer
			while ($row = mysqli_fetch_assoc($result)) {
				// display the orders
				$order_id = $row['order_id'];
				$query2 = "SELECT product_name, order_status, order_time, order_cost, features, contact FROM $sql_table2 WHERE order_id = '$order_id'";
				$result2 = mysqli_query($conn, $query2);
				if (!$result2) {
					echo "<p>Something is wrong with ", $query2, "</p>";
				} else {
					$row2 = mysqli_fetch_assoc($result2);
					echo "<tr>\n";
					echo "<td>", $order_id, "</td>\n";
					echo "<td>", $row2['product_name'], "</td>\n";
					echo "<td>", $row2['order_status'], "</td>\n";
					echo "<td>", $row2['order_time'], "</td>\n";
					echo "<td>", $row2['order_cost'], "</td>\n";
					echo "<td>", $row2['features'], "</td>\n";
					echo "<td>", $row2['contact'], "</td>\n";
					echo "</tr>\n";
				}
			}
			echo "</table>\n";
			// free the memory associated with the result
			mysqli_free_result($result);
		}
	?>
	<?php
    include './footer.inc';
    ?>
</body>

</html>