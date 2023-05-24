<!-- 
/*
    Purpose: This file is used to check if the username or email already exists in the database.
            If it does, the user will be redirected back to the signup page.
            If it doesn't, the user will be inserted into the database and redirected to
            the signin page.
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

$username = hash("sha512", $_POST["user_name"]);
// Why hash, why sha512? We apply things called "zero trust".
// Which mean we don't trust users
// We don't trust manager either. Absolute zero trust
// You are the one who have to remember username and password
// No one can get your private infomation
// - Kirito -
$email = hash("sha512", $_POST["email"]);
$user_pass = hash("sha512", $_POST["password"]);

// Check if the username or email already exists
$sql_check_username_email = "SELECT username FROM $sql_table WHERE username = '$username' OR email = '$email'";
$result = mysqli_query($conn, $sql_check_username_email);

if (mysqli_num_rows($result) > 0) {
    // The username already exists
    header("refresh:3;url=signup.php");
    echo "<p>Username or email already exists. This website will redirect you back to signup page, thank you.</p>";
} else {
    // The username doesn't exist, so insert the new user
    $sql_insert_user = "INSERT INTO $sql_table (username, user_pass, email) VALUES ('$username', '$user_pass', '$email')";
    if (mysqli_query($conn, $sql_insert_user)) {
        // The user was successfully inserted
        header("refresh:1;url=signin.php");
        echo "<p>User created successfully</p>";
    } else {
        // An error occurred while inserting the user
        header("refresh:3;url=signup.php");
        echo "<p>Error creating user: " . mysqli_error($conn) . ". This website will redirect you back to signup page, thank you.</p>";
    }
}

mysqli_close($conn);
?>