<!-- 
/*
    Purpose: This file is the first enhancements page of the website. It contains the css style enhancements of the website.
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
    <meta name="description" content="A Game Store - Enhancements. COS10026. This is a website for a game store. It has 5 pages: Home, Product, Enquire, About, Enhancements. It has 2 enhancements: Customized title using ::before and ::after and Customized text using ::before and ::after." />
    <meta name="keywords" content="Game, Enhancements, COS10026, Project, CSS, before after" />
    <meta name="author" content="Full HD, Nguyen Dang Duc Anh" />
    <title>A Game Store - Enhancements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Babylonica&family=Caveat&family=Courgette&family=Dancing+Script&family=Indie+Flower&family=Julee&family=Kalam&family=Mynerve&family=Pacifico&family=Permanent+Marker&family=Sassy+Frass&family=Satisfy&family=Shadows+Into+Light&family=Zeyada&display=swap" rel="stylesheet" />
</head>

<body id="en_body">
    <?php
    include './header.inc';
    // include './footer.inc';
    ?>
    <article id="en_art">
        <h1 title="Enhancements">Enhancements</h1>
    </article>
    <footer id="en_foo">
        <div id="en_foo_ab">
            <div class="en_page en_herotext" id="ab_page1">
                <h2 title="Inspired by our lovely portal website." class="en_yo_magictext">
                    Customized title using ::before and ::after
                </h2>
                <p class="en_page_bottom">Scroll down...</p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_heroimg" id="ab_page2">
                <p>
                    This is an example. It is way more beautiful comparing
                    to original title attribute.
                </p>
                <a href="./about.html#enhancement1" title="Click here to go to the place where we apply this enhancement.">
                    <img src="./image/enhancements/e1.png" alt="Customized title using ::before and ::after" />
                </a>
                <p>
                    I'm about to recreate it. I'm too lazy to look at its
                    source code, so I guess I have to remake it with my
                    *super secret weapons*, which are my 🧠 and 🫀.
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code" id="ab_page3">
                <p>Hmm let's make a box shall we?</p>
                <div class="en_playground">
                    <div class="box_lmao"></div>
                </div>
                <p>100x100 box</p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code" id="ab_page4">
                <p>Now make ::before and ::after of that box</p>
                <div class="en_playground" id="pl2">
                    <div class="box_lmao2"></div>
                </div>
                <p>I use position: absolute, yeah it's just that simple</p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code" id="ab_page5">
                <p>
                    Change the ::before (or ::after) into triangle using
                    clip-path
                </p>
                <div class="en_playground" id="pl3">
                    <div class="box_lmao2"></div>
                </div>
                <p>
                    Yes I know that I can use zero size + transparent
                    border, but it would be unnecessarily complicated.
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code" id="ab_page6">
                <p>
                    Change the other into a rectangle, design it and you are
                    done.
                </p>
                <div class="en_playground" id="pl4">
                    <div class="box_lmao2"></div>
                </div>
                <p>
                    Voila! Oh maybe by default you should add display: none
                    to "before and after" and only display: block (or
                    depending on your needs) when you hover on the box.
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_herotext" id="ab_page7">
                <h2>Thank you.</h2>
                <p class="en_page_bottom">...Scroll up, this is the end</p>
            </div>
        </div>
        <div id="en_foo_ah">
            <div class="en_page en_herotext" id="ah_page1">
                <h2 title="Actually the magic in here is still after and before. They are amazing, I love them.">
                    Customized text-decoration using *🪄*
                </h2>
                <p class="en_page_bottom">Scroll down...</p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>
                    Here's an example. That is far more appealing than the
                    original CSS text-decoration. Please hover the link
                    below. Just hover...
                </p>
                <div class="en_playground en_playground_center" id="en_yeet_a_attr">
                    <a href="./index.html#enhancement2" title="Click here to go to the place where we apply this enhancement.">Don't you want to leave this page?</a>
                </div>
                <p>Let's break it down...</p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>
                    First, let's just add an a tag with a link to website.
                </p>
                <div class="en_playground en_playground_center" id="en_yeet_a_attr_1">
                    <a href="http://google.com">not-bing.com</a>
                </div>
                <p>
                    In this case, I will go with google.com, sorry bing.com
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>
                    Slap the a tag you just created with a bunch of css that
                    you think will make the tag looks better...
                </p>
                <div class="en_playground en_playground_center en_yeet_a_attr_cus" id="en_yeet_a_attr_2">
                    <a href="http://google.com">not-bing.com</a>
                </div>
                <p>
                    ...It doesn't. By the way, you have to ensure that the
                    "default underline" is hidden as we are about to
                    recreate a better one.
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>Now, please add ::before and ::after in the a tag.</p>
                <div class="en_playground en_playground_center en_yeet_a_attr_cus" id="en_yeet_a_attr_3">
                    <a href="http://google.com">not-bing.com</a>
                </div>
                <p>
                    We will style them one by one. To distinguish between
                    after and before, we will use colors: after is red,
                    while before is blue
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>
                    Let's hide them by modifying their width to 0. Also make
                    them in the same y-axis (bottom: -6px for example)
                </p>
                <div class="en_playground en_playground_center en_yeet_a_attr_cus" id="en_yeet_a_attr_4">
                    <a href="http://google.com">not-bing.com</a>
                </div>
                <p>
                    But in this showcase, I will reduce their width to 10px,
                    and their y-axis in different values (after is -6px,
                    before is -10px) to show the logic behind it...
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>
                    Here is the logic: when user hovers a tag, after will go
                    from left to right, before waits for after to finish,
                    then goes from right to left.
                </p>
                <div class="en_playground en_playground_center en_yeet_a_attr_cus" id="en_yeet_a_attr_5">
                    <a href="http://google.com">not-bing.com, hover me please</a>
                </div>
                <p>
                    When before finishes, after will go back to 0 width.
                    When user stops hovering, before will go back to 0
                    width, which creates a simple yet beautiful animation.
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>
                    Maybe you still don't understand. Alright let's reduce
                    original width to 0.
                </p>
                <div class="en_playground en_playground_center en_yeet_a_attr_cus" id="en_yeet_a_attr_6">
                    <a href="http://google.com">not-bing.com, hover me please</a>
                </div>
                <p>It's clearer now, right? Right? 😢</p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>
                    Haizz now I will change the bottom of both before and
                    after to -6px.
                </p>
                <div class="en_playground en_playground_center en_yeet_a_attr_cus" id="en_yeet_a_attr_7">
                    <a href="http://google.com">not-bing.com, hover me please</a>
                </div>
                <p>You now can see the effect. (I beg you 🥺)</p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_page_code">
                <p>Changing the color of both before and after to red.</p>
                <div class="en_playground en_playground_center en_yeet_a_attr_cus" id="en_yeet_a_attr_8">
                    <a href="http://google.com">not-bing.com, hover me please</a>
                </div>
                <p>
                    And we made it! You can use this little css code to flex
                    your boyfriend or girlfriend, though sadly I couldn't
                    verify this point.
                </p>
            </div>
            <hr class="en_hr" />
            <div class="en_page en_herotext" id="ah_page7">
                <h2>Thank you.</h2>
                <p class="en_page_bottom">...Scroll up, this is the end</p>
            </div>
        </div>
    </footer>
</body>

</html>