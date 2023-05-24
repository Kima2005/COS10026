<!-- 
/*
    Purpose: This file demonstrates the use of Fetch API to fetch anime quotes from an external data source.
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
        <title>Enhancement 2: Fetching API</title>
        <link rel="stylesheet" href="./styles/enhancement2_cookie.css" />
	<link rel="stylesheet" href="./styles/footer_en.css">
    </head>
    <body>
        <header>
            <a class="back1" href="./enhancements2.php"> Back to main enhancement page.</a>
        </header>
        <article class="intro">
            <h1>3rd Enhancement: Fetch API</h1>
            <p>Scroll down for more info</p>
        </article>
        <hr />
        <section class="page">
            <h2>I. Definition and purpose</h2>
            <p>
                Fetching API for (in this case, anime quotes) is an interface
                that allows users to access and manipulate a collection of
                memorable lines from various anime series. The purpose of this
                API is to enhance the user experience of game store's
                applications that involve anime-related content or features. By
                fetching anime quotes from an external data source, users can
                enjoy a diverse and dynamic selection of quotes that reflect
                their preferences, moods, or contexts. Fetching API for anime
                quotes can also be used for fun and entertainment purposes, such
                as generating random quotes, creating quizzes, or sharing quotes
                with friends.
            </p>
            <p class="page_tldr">
                TL;DR: The purpose of using a fetching API is to enhance the
                user experience of applications that involve Japan-originated
                animation-related content or features. It can also be used for
                fun and entertainment purposes.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Let's take the snippets code from files "more.php":</p>
            <div class="code">
                <div class="line">$ch = curl_init();</div>
                <div class="line">
                    curl_setopt($ch, CURLOPT_URL,
                    'https://animechan.vercel.app/api/random');
                </div>
                <div class="line">
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                </div>
                <div class="line">$response = curl_exec($ch);</div>
                <div class="line">curl_close($ch);</div>
                <div class="line">$quote = json_decode($response);</div>
                <div class="line">
                    echo '&lt;h3 class="anime">' . $quote->anime . '&lt;/h3>';
                </div>
                <div class="line">
                    echo '&lt;p class="quote">"' . $quote->quote . '"&lt;/p>';
                </div>
                <div class="line">
                    echo '&lt;h4 class="character">-' . $quote->character .
                    '-&lt;/h4>';
                </div>
            </div>
            <p>
                Because this snippet involves a library called "cURL" - a hard
                and not-everyone-knows library, we'll explain it line by line so
                you can understand.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Here is first line:</p>
            <div class="code">
                <div class="line">$ch = curl_init();</div>
            </div>
            <p>
                So it initializes a new cURL session and returns a cURL handle
                that can be used with other cURL functions.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Here is second line:</p>
            <div class="code">
                <div class="line">
                    curl_setopt($ch, CURLOPT_URL,
                    'https://animechan.vercel.app/api/random');
                </div>
            </div>
            <p>It sets the URL to which the request is to be sent.</p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Here is third line:</p>
            <div class="code">
                <div class="line">
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                </div>
            </div>
            <p>
                It sets the option to return the transfer as a string instead of
                outputting it directly.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Here is fourth line:</p>
            <div class="code">
                <div class="line">$response = curl_exec($ch);</div>
            </div>
            <p>
                It executes the cURL session and stores the response in the
                $response variable.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Here is fifth line:</p>
            <div class="code">
                <div class="line">curl_close($ch);</div>
            </div>
            <p>
                It closes the cURL session and frees all resources associated
                with it.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Here is sixth line:</p>
            <div class="code">
                <div class="line">$quote = json_decode($response);</div>
            </div>
            <p>
                To decode the JSON response and stores it in the $quote variable
                as an object. This is an important step to show values of the
                object.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>Here is the seventh through ninth line:</p>
            <div class="code">
                <div class="line">
                    echo '&lt;h3 class="anime">' . $quote->anime . '&lt;/h3>';
                </div>
                <div class="line">
                    echo '&lt;p class="quote">"' . $quote->quote . '"&lt;/p>';
                </div>
                <div class="line">
                    echo '&lt;h4 class="character">-' . $quote->character .
                    '-&lt;/h4>';
                </div>
            </div>
            <p>
                It shows the values of the object. The first line shows the
                anime's name, the second line shows the quote, and the third
                line shows the character's name.
            </p>
            <p class="page_tldr">
                Tldr: Fetch https://animechan.vercel.app/api/random -> JSON ->
                Object -> Split and enter predefined html tags.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>III. Testing / How to test</h2>
            <p>
                As this operation involves an external server responsible for
                storing and delivering content via JSON and API, it is
                imperative to periodically verify the structure of the received
                files from the server and ascertain its availability. Prior to
                implementation on the web, specifically before utilizing PHP for
                cURL, pre-API test products such as Postman are employed. In
                future endeavors involving REST API or APIs in general, tools
                like Postman will be utilized to verify the returned API and
                dispatch to ensure integrity and stability for both developers
                and customers.
            </p>
            <p>
                Outcome: The API exhibits exceptional stability and generates
                results that fulfill the group's criteria. This novel feature
                has garnered considerable interest among team members and there
                is expectation for its integration into the product to enhance
                user experience.
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
