<!-- /*
	Purpose: This file is used to sign up for a new account.
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/ -->

<!DOCTYPE html>
<html lang="en" id="en_html">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Full HD, Nguyen Dang Duc Anh" />
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/sign.css" />
    <link rel="stylesheet" href="./styles/signup.css" />
</head>

<body id="sign" class="share_body">
    <?php
    include './header.inc';
    include './footer.inc';
    ?>
	<form action="./checksignup.php" method="post">
        <label for="user_name">User Name:</label><br>
        <input type="text" id="user_name" name="user_name" required pattern="^[a-zA-Z0-9_]+$"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input id="signupbtn" type="submit" value="Sign up">
    </form>
    <a class="sign" href="./signin.php">Already our member?</a>
    <br>
        <?php
    include './footer.inc';
    ?>
</body>

</html>