<!-- 
/*
    Purpose: This file demonstrates the advanced sort (SQL) enhancement.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Enhancement 2: Advanced Sort (SQL)</title>
        <link rel="stylesheet" href="./styles/enhancement2_cookie.css" />
	<link rel="stylesheet" href="./styles/footer_en.css">
    </head>
    <body>
        <header>
            <a class="back1" href="./enhancements2.php"> Back to main enhancement page.</a>
        </header>
        <article class="intro">
            <h1>2nd Enhancement: Advanced Sort (SQL)</h1>
            <p>Scroll down for more info</p>
        </article>
        <hr />
        <section class="page">
            <h2>I. Definition and purpose</h2>
            <p class="page_tldr">
                List the most popular product
            </p>
            <p class="page_tldr">
                and the average number of orders per day.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>
                Let's take the snippets code from files "manager.php" as an example (line ~52):
            </p>
            <div class="code">
                <div class="line">} else if (isset($_POST['advanced'])) {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;$advanced_method = sanitise_input($_POST["advanced_method"]);
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;if ($advanced_method == "most popular") {</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$query = "SELECT product_name, COUNT(*) AS total_orders</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;FROM orders</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;GROUP BY product_name</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ORDER BY total_orders DESC</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;LIMIT 1"</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;} else if ($advanced_method == "number orders") {</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$query = "SELECT DATE(order_time) AS date, COUNT(*) AS total_orders&emsp;</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;FROM orders</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;GROUP BY DATE(order_time)</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ORDER BY date ASC";</div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;}</div>
                <div class="line">}</div>
                
            </div>
            <p>
                This PHP code checks if the <strong class="var">$_POST</strong> variable has an index called <strong class="var">advanced</strong> and assigns the value of <strong class="var">$_POST["advanced_method"]</strong> to the <strong class="var">$advanced_method</strong> variable. The code then checks if <strong class="var">$advanced_method</strong> is equal to "<strong class="var">most popular</strong>" or "<strong class="var">number orders</strong>". If it is equal to "<strong class="var">most popular</strong>", it sets <strong class="var">$query</strong> to a SQL statement that selects the most popular product. If <strong class="var">$advanced_method</strong> is equal to "<strong class="var">number orders</strong>", it sets <strong class="var">$query</strong> to a SQL statement that selects the average number of orders per day. This code is used for advanced sorting of products based on their popularity or number of orders per day.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>III. Testing / How to test</h2>
            <p>
                Sign in as admin and then go to manager.php to test it out. Good luck!
            </p>
            <a class="go_back_enhancement" href="./enhancements2.php">[Go back to main enhancement page]</a>
        </section>
        <hr />
        <footer>
            <div class="col">
                <div class="headr">Kirito</div>
                <div class="body">
                    <p>A full service branding games for gamers</p>
                    <p>Term of Service</p>
                    <p>Privacy Policy</p>
                    <p>© 2021 Kirito. All rights reserved.</p>
                </div>
            </div>
            <div class="col">
                <div class="headr">Get in touch</div>
                <div class="body">
                    <p>Monday - Friday</p>
                    <p>9:00 AM - 5:00 PM</p>
                    <p>Contact</p>
                    <p>Facebook</p>
                    <p>Instagram</p>
                </div>
            </div>
            <div class="col">
                <div class="headr">Join our Mailing List</div>
                <div class="body">
                    <form class="bodyform" action="./enquire.php">
                        <input type="text" name="first_name" placeholder="First Name">
                        <input type="email" name="email" placeholder="Email">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="headr">Explore</div>
                <div class="body">
                    <a href="./index.php">Home</a>
                    <a href="./product.php">Product</a>
                    <a href="./payment.php">Enquire / Payment</a>
                    <a href="./about.php">About</a>
                    <a href="./enhancements.php">Enhancements</a>
                    <a href="./enhancements2.php">(New!!) Enhancements 2</a>
                </div>
            </div>
        </footer>
    </body>
</html>
