<!-- /*
	Purpose: This file is used to display the receipt of the order.
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/ -->

<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
    exit;
}
session_start()
?>
<?php
    // require_once("settings.php"); //connection info
    // $conn = @mysqli_connect(
    //     $host,
    //     $user,
    //     $pwd,
    //     $sql_db
    //   );
    //   if (!$conn) {
    //     // Displays an error message
    //     echo "<p>Database connection failure</p>"; // not in production script
    //   } 
    // $mysqli = $conn;

    // $sql_table = "orders";
    // $query = "SELECT order_id, last_name, first_name, postcode, order_cost, email, address, product_name, card_type, order_time, quantity, features  FROM `orders` ORDER BY `orders`.`order_id` DESC";
    
    // $result = $mysqli -> query($query);
    
    // $receipt = $result -> fetch_assoc();

    // $mysqli = $conn;
    // $game_name =$receipt['product_name'];
    // $query2 = "SELECT game_price FROM `games` WHERE game_name = '{$game_name}' ";
    // $result2 = $mysqli -> query($query2);
    // $receipt2 = $result2 -> fetch_assoc();

    // mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="description" content="receipt" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Nghiem Tuan" />
    <link rel="stylesheet" href="./styles/receipt.css">

    <title>Receipt</title>

</head>

<body class="share_body" id="receiptBG">
    <?php include 'header.inc'; ?>

    <section id="receiptContainer">
        <h2 class="title">Thanks for your order ! You are our order number <?= $_SESSION['receipt']['order_id']?> ! </h2>

        <section id="receiptContent">
            <div id="customerinfo">
            <h3 class="secthead">Customer information</h3>
            <p>Full Name: <?= $_SESSION['receipt']['first_name'], " ", $_SESSION['receipt']['last_name']; ?></p>
            <p>Address: <?= $_SESSION['receipt']['address'], "  ", $_SESSION['receipt']['postcode'] ?></p>
            <p>Email: <?= $_SESSION['receipt']['email'] ?></p>
            <p>CC Number: ***************</p>
            <p>CC Expiry date:  **/**</p>
            <p>CVV: ***</p>
            </div>
            <table id="receiptItems">
                <tbody>
                    <tr>
                        <th>Product</th>
                        <td><?= $_SESSION['receipt']['product_name']; ?></td>
                        
                    </tr>
                    <tr>
                        <th>Product price</th>
                        <td><?= $_SESSION['receipt']['game_price']; ?></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><?= $_SESSION['receipt']['quantity']; ?></td>
                    </tr>
                    <tr>
                        <th>Features</th>
                        <td><?= $_SESSION['receipt']['features']; ?> Edition</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td><?= $_SESSION['receipt']['order_cost']; ?></td>
                    </tr>
                    <tr>
                        <th>Order status</th>
                        <td><?= $_SESSION['receipt']['order_status']; ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include 'footer.inc'; ?>
</body> 

</html>