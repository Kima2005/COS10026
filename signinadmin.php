<!-- /*
	Purpose: This file is the sign in page for admin. It is used to verify the authority of the admin.
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/ -->

<?php
if (!(isset($_COOKIE['passadmin']) && $_COOKIE['passadmin'] == 'true')) {
  echo "ERROR 403: YOU DO NOT HAVE ENOUGH AUTHORITY TO ACCESS THIS PAGE. PLEASE LOG IN TO VERIFY YOUR AUTHORITY.";
	echo "<br> This site will automatically redirect to the login page within 3 seconds.";
	header("refresh:3;url=signin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en" id="en_html">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="A Game Store - Enhancements. COS10026. This is a website for a game store. It has 5 pages: Home, Product, Enquire, About, Enhancements. It has 2 enhancements: Customized title using ::before and ::after and Customized text using ::before and ::after." />
    <meta name="keywords" content="Game, Enhancements, COS10026, Project, CSS, before after" />
    <meta name="author" content="Full HD, Nguyen Dang Duc Anh" />
    <title>A Game Store - Enhancements</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="./styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Babylonica&family=Caveat&family=Courgette&family=Dancing+Script&family=Indie+Flower&family=Julee&family=Kalam&family=Mynerve&family=Pacifico&family=Permanent+Marker&family=Sassy+Frass&family=Satisfy&family=Shadows+Into+Light&family=Zeyada&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./styles/signup.css" />
    <link rel="stylesheet" href="./styles/sign.css" />
</head>

<body id="en_body">
    <?php
    include './header.inc';
    ?>
    <br>
    <form action="./checksigninadmin.php" method="post">
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="secret_password">Secret Password:</label><br>
      <input type="password" id="secret_password" name="secret_password" required><br>

      <input class="second_gateway" id="signupbtn" type="submit" value="Let's go">
    </form>
        <?php
    include './footer.inc';
    ?>
</body>

</html>