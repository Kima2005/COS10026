<!-- 
/*
    Purpose: This file contains the menu behind, which is the intermediate link between the old page with old features and the new page with new features.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<!DOCTYPE html>
<html lang="en" id="en_html">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Full HD, Nguyen Dang Duc Anh" />
    <title>More</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/more.css" />
</head>

<body id="en_body">
    <?php
    include './header.inc';
    // debug
    // echo (hash("sha512", "admin") == "c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec" ? "true" : "false");
    // echo (hash("sha512", "password") == "b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86"? "true" : "false");
    // password2
    // 92a891f888e79d1c2e8b82663c0f37cc6d61466c508ec62b8132588afe354712b20bb75429aa20aa3ab7cfcc58836c734306b43efd368080a2250831bf7f363f
    // admin@kirito.com
    // f7e520e52ada214ffc0eb5ac610edb2d12bbe3593a91596d53f169ff13c997aa314f582b6daaebf76bba010b89442ff757f5cf8a064a0391072abef0fe0aa32f
    ?>
    <p class="whitetext">Hello<?php
    if (isset($_COOKIE['un'])) {
		echo " ". $_COOKIE['un']. "!";
	} else if (isset($_COOKIE['admin'])) {
		echo " admin!";
	} else {
        echo ", welcome to our game store!!1";
    }
    ?></p>
    <a class="listlink whitetext" href="./manager.php">Manager</a>;
    <a class="listlink whitetext" href="./signup.php">Sign up<?php
    if (isset($_COOKIE['un'])) {
		echo(" -> I don't want this login session under the name ".$_COOKIE['un']." 😤");
	}
    ?></a>
    <a class="listlink whitetext" href="./signin.php">Sign in<?php
    if (isset($_COOKIE['un'])) {
		echo "...But wait, you've already logged in, why bother logging back in?";
	}
    ?></a>
    <?php
    if (isset($_COOKIE['admin'])) {
		echo '<a class="listlink whitetext" href="./manager.php">Manager</a>';
	}
    if (isset($_COOKIE['un'])) {
		echo '<a class="listlink whitetext" href="./user.php">User</a>';
	}
    ?>
    <!-- <a id="tobyebye" href="logout.php">Logout</a> -->
    <?php
    if (isset($_COOKIE['un']) || (isset($_COOKIE['admin']))) {
		echo '<a class="listlink whitetext warning" href="logout.php">Logout</a>';
	}
    ?>
    <br>
    <br>
    <br>
    <br>
    <a title="Super new, super fresh and super unique. Must check out now !!!" class="listlink whitetext" href="./enhancements2.php">Enhancements2</a>
    <div class="funquote">
        <h3>Quote of the day (refresh this page if you are interested)</h3>
        <?php
            /* This code is using the cURL library in PHP to make a request to the API endpoint at
            https://animechan.vercel.app/api/random and retrieve a random quote from an anime. The
            retrieved data is then decoded from JSON format using the `json_decode()` function and
            displayed on the webpage using HTML tags. */
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://animechan.vercel.app/api/random');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
            $quote = json_decode($response);
            echo '<h3 class="anime">' . $quote->anime . '</h3>';
            echo '<p class="quote">"' . $quote->quote . '"</p>';
            echo '<h4 class="character">-' . $quote->character . '-</h4>';
        ?>
    </div>
    <?php
        include './footer.inc';
    ?>
</body>

</html>