<!-- 
/*
    Purpose: This file is the manager page of the website. It is used to manage the orders of the customers.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<?php
if (!(isset($_COOKIE['admin']) && isset($_COOKIE['passadmin']))){
    echo "ERROR 403: YOU DO NOT HAVE ENOUGH AUTHORITY TO ACCESS THE MANAGEMENT PAGE. PLEASE LOG IN TO VERIFY YOUR AUTHORITY.";
	echo "<br> This site will automatically redirect to the login page within 5 seconds.";
	header("refresh:5;url=signin.php");
	exit();
}

// /* To prevent the browser from caching the page. */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Vuong Khang Minh" />
    <link rel="stylesheet" href="./styles/manager.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Babylonica&family=Caveat&family=Courgette&family=Dancing+Script&family=Indie+Flower&family=Julee&family=Kalam&family=Mynerve&family=Pacifico&family=Permanent+Marker&family=Sassy+Frass&family=Satisfy&family=Shadows+Into+Light&family=Zeyada&display=swap" rel="stylesheet" />
    <title>Intro</title>
    <?php

    function sanitise_input($data)
    {
        $data = trim($data);        //remove spaces
        $data = stripslashes($data);    //remove backslashes in front of quotes
        $data = htmlspecialchars($data);  //convert HTML special characters to HTML code
        return $data;
    }


    require_once("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db); // Connect to database
    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        // result when selecting search customer name
        if (isset($_POST['search_customer_name'])) { 
            $customer_name = sanitise_input($_POST["customer_name"]);
            $query = "SELECT order_id, order_time, order_cost, order_status, product_name, first_name, last_name FROM orders WHERE customer_name LIKE '%$customer_name%';";
         // result when selecting search all 
        } else if (isset($_POST['all'])) {
            $query = "SELECT order_id, order_time, order_cost, order_status, product_name, first_name, last_name FROM orders ;";
        // result when selecting advanced sort 
        } else if (isset($_POST['advanced'])) {
            $advanced_method = sanitise_input($_POST["advanced_method"]);
            if ($advanced_method == "most popular") {
                $query = "SELECT product_name, COUNT(*) AS total_orders
                FROM orders
                GROUP BY product_name
                ORDER BY total_orders DESC
                LIMIT 1";
            } else if ($advanced_method == "number orders") {
                $query = "SELECT DATE(order_time) AS date, COUNT(*) AS total_orders
                FROM orders
                GROUP BY DATE(order_time)
                ORDER BY date ASC";
            }
        // result when selecting search particular product 
        } else if (isset($_POST['search_product'])) {
            $product_name = sanitise_input($_POST["product_name"]);
            $query = "SELECT order_id, order_time, order_cost, order_status, product_name, first_name, last_name FROM orders WHERE product_name LIKE '%$product_name%';";
        } else if (isset($_GET['update'])) { // Refresh page for updating
            $query = $_GET['query'];
        } else if (isset($_POST['sort'])) {
            $sort_method = sanitise_input($_POST["sort_method"]);
            if ($sort_method == "pending") {
                $query = "SELECT order_id, order_time, order_cost, order_status, product_name, first_name, last_name FROM orders WHERE order_status LIKE '%$sort_method%';";
            } else if ($sort_method == "descending") {
                $query = "SELECT order_id, order_time, order_cost, order_status, product_name, first_name, last_name FROM orders ORDER BY order_cost DESC";
            } else if ($sort_method == "ascending") {
                $query = "SELECT order_id, order_time, order_cost, order_status, product_name, first_name, last_name FROM orders ORDER BY order_cost ASC";
            }
        } else if (isset($_GET['delete'])) { // Delete 
            $order_id = $_GET['order_id'];
            $query = "DELETE FROM orders WHERE order_id = $order_id;";
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$conn) {
                echo "<p>Database connection failure</p>";
            } else {
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                }
            }
            $query = $_GET['query'];
            // Update
        } else if (isset($_POST['update'])) { 
            $order_status = $_POST['order_status'];
            $order_id = $_GET['order_id'];
            $query = "UPDATE orders SET order_status = '$order_status' WHERE order_id = $order_id;";
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$conn) {
                echo "<p>Database connection failure</p>";
            } else {
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                }
            }
            $query = $_GET['query'];
        } else {
            $query = "SELECT order_id, order_time, order_cost, order_status, product_name, first_name, last_name FROM orders ;";
        }
    }
    ?>

</head>

<body class="manager_body">
    <?php
    include './header.inc';
    ?>





    <h1>Attempt table manager</h1>
    <a id="tobyebye" href="logout.php">Logout</a>
    <h2>Order search</h2>
    <form class="mana_form" method="post">
        <label class="customer_name" for="customer_name">-Quick search-</label><br>
        <input placeholder="Search for customer name..." type="text" id="customer_name" name="customer_name"><br>
        <input type="submit" name="search_customer_name" value="Search" />
        <h2>Quick options</h2>
        <select id="product_name" name="product_name">
            <option value="hi-fi rush">Hi-Fi RUSH</option>
            <option value="dead space">
                Dead Space
            </option>
            <option value="hogwarts legacy">
                Hogwarts Legacy
            </option>
            <option value="the last of us">The Last of Us</option>
            <option value="genshin impact">Genshin Impact</option>
            <option value="cyberpunk 2077">Cyberpunk 2077</option>
            <option value="fall guys">Fall Guys</option>
            <option value="rocket league">Rocket League</option>
        </select><br>
        <input type="submit" name="search_product" value="Search Product" /><br>
        <input type="submit" name="all" value="List all orders" /><br>
        <h2>Sort</h2>
        <select id="sort_method" name="sort_method">
            <option value="pending">Pending Orders</option>
            <option value="descending">Order Cost - Descending</option>
            <option value="ascending">Order Cost - Ascending</option>
        </select><br>
        <input type="submit" name="sort" value="Search" />
        <h2>Advanced sort</h2>
        <select id="advanced_method" name="advanced_method">
            <option value="most popular">Most Popular product</option>
            <option value="number orders">The average number of orders per day</option>
        </select><br>
        <input type="submit" name="advanced" value="Search" />


    </form>
    <?php                                
    $result = mysqli_query($conn, $query); // Run query 
    if (!$result) {
        echo "<p>Something is wrong with ", $query, "</p>";
    } else if (isset($_POST['advanced'])) {
        $row = mysqli_fetch_assoc($result);
        if ($advanced_method == "most popular") {
            echo "<table>\n"
            ."<tr>\n"
            . "<th>The most popular product</th>\n"
            . "</tr>\n"
            ."<tr>\n"
            . "<td>", $row['product_name'], "</td>\n"
            . "</tr>\n";
        } else if ($advanced_method == "number orders") {
            echo  "<table>\n"
            . "<tr>\n"
            . "<th>Order Date</th>\n"
            . "<th>Average orders</th>\n"
            ."<tr>\n";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n"
                    . "<td>", $row['date'], "</td>\n"
                    . "<td>", $row['total_orders'], "</td>\n"
                    . "</tr>\n";
                }
            }
        }
        echo "</table>\n";
    } else {
        echo "<table>\n"
            . "<tr>\n"
            . "<th>Order ID</th>\n"
            . "<th>Time</th>\n"
            . "<th>Cost</th>\n"
            . "<th>Product</th>\n"
            . "<th>Customer Name</th>\n"
            . "<th>Status</th>\n"
            . "<th>Update</th>\n"
            . "<th>Delete</th>\n"
            . "</tr>\n";
        if ((!isset($_GET['update'])) && (!isset($_POST['advanced']))) { // Regular display
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n"
                    . "<td>", $row['order_id'], "</td>\n"
                    . "<td>", $row['order_time'], "</td>\n"
                    . "<td>", $row['order_cost'], "</td>\n"
                    . "<td>", $row['product_name'], "</td>\n"
                    . "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>\n"
                    . "<td>", $row['order_status'], "</td>\n"
                    . "<td><a class=\"info_update\" href=\"manager.php?update=true&order_id=", $row['order_id'], "&query=", $query, "\">Update</a></td>\n";
                    if ($row['order_status'] == "PENDING") {
                        echo "<td><a class=\"warning_delete\" href=\"manager.php?delete=true&order_id=", $row['order_id'], "&query=", $query, "\">Delete</a></td>\n";
                    }
                    else {
                        echo  "<td></td>\n";
                    }
                    echo "</tr>\n";
            }        
        } else { // If page is in update mode then find row to edit and select status
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['order_id'] == $_GET['order_id']) {
                    echo "<tr>\n"
                        . "<td>", $row['order_id'], "</td>\n"
                        . "<td>", $row['order_time'], "</td>\n"
                        . "<td>", $row['order_cost'], "</td>\n"
                        . "<td>", $row['product_name'], "</td>\n"
                        . "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>\n"
                        . "<td>"
                        . "<form method=\"post\" action=\"manager.php?order_id=", $row['order_id'], "&query=", $query, "\">"
                        . "<select id=\"order_status\" name=\"order_status\" required>"
                        . "<option value=\"PENDING\" ", ($row['order_status'] == 'PENDING') ? 'selected' : '', ">PENDING</option>"
                        . "<option value=\"PAID\" ", ($row['order_status'] == 'PAID') ? 'selected' : '', ">PAID</option>"
                        . "<option value=\"FULLFILLED\" ", ($row['order_status'] == 'FULLFILLED') ? 'selected' : '', ">FULLFILLED</option>"
                        . "<option value=\"ARCHIVED\" ", ($row['order_status'] == 'ARCHIVED') ? 'selected' : '', ">ARCHIVED</option>"
                        . "</select>"
                        . "<button type=\"submit\" name=\"update\" >Edit</button></form>"
                        . "</td>\n"
                        . "<td><a class=\"info_update\" href=\"manager.php?update=true&order_id=", $row['order_id'], "&query=", $query, "\">Update</a></td>\n";
                        if ($row['order_status'] == "PENDING") {
                            echo "<td><a class=\"warning_delete\" href=\"manager.php?delete=true&order_id=", $row['order_id'], "&query=", $query, "\">Delete</a></td>\n";
                        }
                        else {
                            echo  "<td></td>\n";
                        }
                        echo "</tr>\n";
                } else {
                    echo "<tr>\n"
                        . "<td>", $row['order_id'], "</td>\n"
                        . "<td>", $row['order_time'], "</td>\n"
                        . "<td>", $row['order_cost'], "</td>\n"
                        . "<td>", $row['product_name'], "</td>\n"
                        . "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>\n"
                        . "<td>", $row['order_status'], "</td>\n"
                        . "<td><a class=\"info_update\" href=\"manager.php?update=true&order_id=", $row['order_id'], "&query=", $query, "\">Update</a></td>\n";
                        if ($row['order_status'] == "PENDING") {
                            echo "<td><a class=\"warning_delete\" href=\"manager.php?delete=true&order_id=", $row['order_id'], "&query=", $query, "\">Delete</a></td>\n";
                        }
                        else {
                            echo  "<td></td>\n";
                        }
                        echo "</tr>\n";
                }
            }
        }
        echo "</table>\n";
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>
    <?php
    include './footer.inc';
    ?>
</body>

</html>