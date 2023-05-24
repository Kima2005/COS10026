<!-- /*
	Purpose: This file is used to process the order and store the data in the database.
	Project: Kirito website
	Author: Vuong Khang Minh, Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/ -->

<?php
// Start the session
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
    exit;
}
session_start();
?>

<?php
function sanitise_input($data)
{
  $data = trim($data);        //remove spaces
  $data = stripslashes($data);    //remove backslashes in front of quotes
  $data = htmlspecialchars($data);  //convert HTML special characters to HTML code
  return $data;
}

function validateCreditCardNumber($cardNumber, $cardType)
{
  // remove any non-digits from the card number
  $cardNumber = preg_replace('/\D/', '', $cardNumber);

  // check the card number length and the starting digits based on the card type
  if ($cardType == 'visa' && preg_match('/^4\d{15}/', $cardNumber)) {
    return true;
  } elseif ($cardType == 'master' && preg_match('/^5[1-5]\d{14}/', $cardNumber)) {
    return true;
  } elseif ($cardType == 'amex' && preg_match('/^3[4-7]\d{13}/', $cardNumber)) {
    return true;
  }

  // if the card number doesn't match any of the rules, it's not valid
  return false;
}
require_once("settings.php"); //connection info

/* Connecting to the database. */
$conn = @mysqli_connect(
  $host,
  $user,
  $pwd,
  $sql_db
);

/* Checking if the table exists. */
$tableExists = false;
$result = mysqli_query($conn, "SHOW TABLES LIKE 'orders'");
$tableExists = (mysqli_num_rows($result) > 0);

/* Creating a table called orders if it does not exist. */
if (!$tableExists) {
  $sql = "CREATE TABLE `orders` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `last_name` char(25) DEFAULT NULL,
    `first_name` char(25) DEFAULT NULL,
    `postcode` int(4) NOT NULL,
    `order_cost` float NOT NULL,
    `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `order_status` enum('PENDING','FULLFILLED','PAID','ARCHIVED') DEFAULT 'PENDING',
    `email` char(200) NOT NULL,
    `address` char(40) NOT NULL,
    `town` char(20) NOT NULL,
    `card_type` enum('visa','master','amex') DEFAULT NULL,
    `card_number` char(40) DEFAULT NULL,
    `cvv` char(40) NOT NULL,
    `expiry_date` char(40) NOT NULL,
    `card_name` char(40) NOT NULL,
    `state` char(5) NOT NULL,
    `product_name` char(40) DEFAULT NULL,
    `features` char(60) DEFAULT NULL,
    `username` char(255) NOT NULL,
    `contact` char(40) DEFAULT NULL,
    `quantity` int(10) unsigned DEFAULT NULL,
    `phone` int(10) unsigned DEFAULT NULL,
    `customer_name` varchar(255) AS (CONCAT(first_name, ' ', last_name)) VIRTUAL,
    PRIMARY KEY (`order_id`)
  )";
  $result = mysqli_query($conn, $sql);
  }
$check = 0; 
$errorMsg = array();
for ($x=0; $x<12; $x++) {
  $errorMsg[$x] = " "; 
}

/* Getting the data from the form. */
if (isset($_POST["first_name"])) {
  $firstname = sanitise_input($_POST["first_name"]);
  $lastname = sanitise_input($_POST["last_name"]);
  $email = sanitise_input($_POST["email"]);
  $address = sanitise_input($_POST["streetaddress"]);
  $s_o_t = sanitise_input($_POST["suburb_or_town"]);
  $postcode = sanitise_input($_POST["postcode"]);
  $state = sanitise_input($_POST["state"]);
  $cardNumber = sanitise_input($_POST["card_number"]);
  $cardType = $_POST["card_type"];
  $cardName = sanitise_input($_POST["card_name"]);
  $expiryDate = sanitise_input($_POST["expiry_date"]);
  $CVV = sanitise_input($_POST["cvv"]);
  $product_name = sanitise_input($_POST["product_name"]);
  $quantity = sanitise_input($_POST["quantity"]);
  $phone = sanitise_input($_POST["phone"]);
  $contact = $_POST["contact"];
  $features = $_POST["features"];
  $comment = sanitise_input($_POST["comment"]);
}

if (!validateCreditCardNumber($cardNumber, $cardType)) {
  $errorMsg[8] = 'Invalid credit card number ';
  $check +=1;
}

/* Checking if the email is valid. */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorMsg[2] = "The email address $email is invalid ";
  $check += 1;
} 

/* Checking if the first name and last name only contain letters and spaces. */
if (!preg_match("/^[a-zA-Z ]{0,24}[A-Za-z]$/", $firstname)) {
  $errorMsg[0] = "Invalid first name";
  $check += 1;
} 

if (!preg_match("/^[a-zA-Z ]{0,24}[A-Za-z]$/", $lastname)) {
  $errorMsg[1] = "Invalid last name ";
  $check += 1;
} 

// validate address 
if (!preg_match("/\w{1,40}/", $address)) {
  $errorMsg[3] = "Invalid street address ";
  $check += 1;
} 

// validate suburb or town
if (!preg_match("/\w{1,20}/", $s_o_t)) {
  $errorMsg[4] = "Invalid suburb or town ";
  $check += 1;
} 

// validate postcode
function validatePostcode($state, $postcode) {
  switch ($state) {
    case "VIC":
      $regex = '/^(3|8)\d{3}$/';
      break;
    case "NSW":
      $regex = '/^(1|2)\d{3}$/';
      break;
    case "QLD":
      $regex = '/^(4|9)\d{3}$/';
      break;
    case "NT":
      $regex = '/^(08|09)\d{2}$/';
      break;
    case "WA":
      $regex = '/^(6)\d{3}$/';
      break;
    case "SA":
      $regex = '/^(5)\d{3}$/';
      break;
    case "TAS":
      $regex = '/^(7)\d{3}$/';
      break;
    case "ACT":
      $regex = '/^(02)\d{2}$/';
      break;
    default:
      return false;
  }

  return preg_match($regex, $postcode);
}

if (!preg_match("/[0-9]{4}/", $postcode)) {
  $errorMsg[5] = "Invalid postcode";
  $check += 1;
} elseif (!validatePostcode($state, $postcode)){
  $errorMsg[5] = "Postcode does not match states";
  $check += 1;
}

// validate phone number
if (!preg_match("/[0-9]{1,10}/", $phone)) {
  $errorMsg[6] = "Invalid phone number";
  $check += 1;
} 

// validate quantity
if (!preg_match("/[0-9]{1,10}/", $quantity)) {
  $errorMsg[7] = "Please enter a quantity number";
  $check += 1;
} 

// validate card name
if(empty($cardName)) {
  // Card name is empty
  $errorMsg[11] = "Please enter the card name";
} elseif 
  // Card name is not empty
  (!preg_match("/^[a-zA-Z ]{0,40}[a-zA-Z ]$/", $cardName)) {
    // Card name contains invalid characters
  $errorMsg[11] = "Invalid card name";
  }


// Validate the expiry date format
if (!preg_match('/^\d{2}\/\d{2}$/', $expiryDate)) {
  // Invalid format
  $errorMsg[9] = "Invalid expiry date format";
  $check += 1;
} 

// Validate the CVV format
if (!preg_match('/^\d{3,4}$/', $CVV)) {
  // Invalid format
  $errorMsg[10] = "Invalid CVV format";
  $check += 1;
} 

// if no errors => insert data into database 
if ($check == 0) {
  require_once("settings.php");  //database information
  $conn = @mysqli_connect($host, $user, $pwd, $sql_db);  //connect to database
  $sql_table = "orders";  //table's name
  $sql_table_2 = "games";

  /* Getting the price of the product from the database. */
  $sql = "select game_price from games where game_name='{$product_name}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $product_price = $row['game_price'];

  /* Getting the price of the feature from the database. */
  $features_cost = 0;
  foreach ($features as $feature) {
    $sql = "select game_price from games where game_name='{$feature}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $features_cost += $row['game_price'];
  }
  $total_cost = $product_price * $quantity + $features_cost; /*calculate the total cost*/
  $features_list = implode(",", $features);
  $mysqli = $conn;

  $query = "SELECT order_id, order_status FROM `orders` ORDER BY `orders`.`order_time` DESC";
  
  $result = $mysqli -> query($query);
  
  $getorder = $result -> fetch_assoc();
 
  $order_id = $getorder['order_id'];
  $order_status = $getorder['order_status'];
  
  $receipt = array( 
    'first_name' => $firstname,
    'last_name' => $lastname,
    'email' => $email,
    'address' => $address,
    'postcode' => $postcode,
    'product_name' => $product_name,
    'quantity' => $quantity,
    'features' => $features_list,
    'order_cost' => $total_cost,
    'game_price' => $product_price,
    'order_status' => $order_status,
    'order_id' => $order_id+1,
  );
  $_SESSION['receipt'] = $receipt;




  /* Inserting the data into the database. */
  $query = "insert into $sql_table (first_name, last_name, email, address, postcode, card_type, card_number, order_cost, product_name, town, state, contact, quantity, phone, features, card_name, expiry_date, cvv) 
      values ('$firstname', '$lastname', '$email', '$address', '$postcode', '$cardType', '$cardNumber', '$total_cost', '$product_name', '$s_o_t', '$state', '$contact', '$quantity', '$phone', '$features_list', '$cardName', '$expiryDate', '$CVV');";
  $result = mysqli_query($conn, $query);  //execute the query
  if (!$result) {    //if execution fails
    echo "<p>Something is wrong with ", $query, "</p>";
  } else {    //if execution works
    /* This query inserts data into the orders_hashed table and updates or deletes records as 
    needed. It is used for security purposes to store a hashed version of the email address 
    associated with each order. */
    $query = "INSERT INTO orders_hashed (order_id, hash_email)
            SELECT order_id, SHA2(email, 512) FROM orders
            ON DUPLICATE KEY UPDATE hash_email = VALUES(hash_email);
            DELETE FROM orders_hashed
            WHERE order_id NOT IN (SELECT order_id FROM orders);
            ";
    // Note: mysqli_query only runs a single query at a time.
    mysqli_multi_query($conn, $query);
    header("location: receipt.php");
    // echo "update data sucess!";
  }
  mysqli_close($conn);    //close connection

  

  /*Get order ID */
  //get id

      //create an an array for receipt.php
    
    

  mysqli_close($conn);
} else {
 /* This code is starting a session and storing various form data in session variables. These session
 variables can be accessed and used on other pages of the website. The purpose of this is to
 preserve the form data and error messages if there are any validation errors and the user needs to
 fix their input before resubmitting the form. */
  session_start();
  $_SESSION['firstname'] = $firstname;
  $_SESSION['lastname'] = $lastname;
  $_SESSION['email'] = $email;
  $_SESSION['streetaddress'] = $address;
  $_SESSION['s_o_t'] = $s_o_t;
  $_SESSION['postcode'] = $postcode;
  $_SESSION['phone'] = $phone;
  $_SESSION['contact'] = $contact;
  $_SESSION['comment'] = $comment;
  $_SESSION['product_name'] = $product_name;
  $_SESSION['state'] = $state;
  $_SESSION['quantity'] = $quantity;
  $_SESSION['features'] = $features;
  $_SESSION['cardName'] = $cardName;
  $_SESSION['cardNumber'] = $cardNumber;
  $_SESSION['card_type'] = $cardType;
  $_SESSION['err_msg'] = $errorMsg;
  $_SESSION['expiryDate'] = $expiryDate;
  $_SESSION['CVV'] = $CVV;
  /* `header("location: fix_order.php");` is redirecting the user to the `fix_order.php` page if there
  are validation errors in the form data. This allows the user to fix their input before
  resubmitting the form. */
  header("location: fix_order.php");
}
