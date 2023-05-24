<!-- /*
	Purpose: This file is the product page of the website. It contains the product range of the website.
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Product" />
    <meta name="keyword" content="Kirito" />
    <meta name="author" content="Vuong Khang Minh" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product range page</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gajraj+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./styles/product.css">
</head>

<body id="product">
    <?php
    include './header.inc';
    // include './footer.inc';
    ?>
    <main>
        <h1>Product range</h1>
        <div id="test">
            <hr />
        </div>

        <article class="scale_article">
            <div class="book_mark">
                <p class="book_marks"><a href="#action">Action Games</a></p>
                <p class="book_marks">
                    <a href="#adventure">Adventure Games</a>
                </p>
                <p class="book_marks">
                    <a href="#open_world">Open World Games</a>
                </p>
                <p class="book_marks"><a href="#sport">Sport Games</a></p>
            </div>
            <section>
                <h3 id="action">Action Games</h3>
                <div class="row">
                    <div class="column">
                        <div class="brightness">
                            
                        <img src="image/hifi_rush.jpg" alt="hifi_rush" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">
                                Hi-Fi RUSH - Now Available
                            </p>
                            <p class="text_highlight">$49.99</p>
                        </div>

                        <p class="text_description">
                            Feel the beat in Hi-Fi RUSH, a new rhythm-action
                            game where everything syncs to the music.
                        </p>

                        <ul class="text_description">
                            <li>CHAI VERSUS THE WORLD</li>
                            <li>OPEN UP THE MOSH PIT!</li>
                        </ul>
                    </div>
                    <div class="column">
                        <div class="brightness">
                            
                        <img src="image/dead_space.jpg" alt="dead_space" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">Dead Space</p>
                            <p class="text_highlight">$49.99</p>
                        </div>

                        <p class="text_description">
                            The sci-fi survival horror classic returns,
                            completely rebuilt to offer an even more
                            immersive experience - including visual, audio,
                            and gameplay improvements.
                        </p>
                    </div>
                </div>
            </section>
            <section>
                <h3 id="adventure">Adventure Games</h3>
                <div class="row">
                    <div class="column">
                        <div class="brightness">
                          
                        <img src="image/hogwarts.jpg" alt="hogwarts" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">Hogwarts Legacy</p>
                            <p class="text_highlight">$69.99</p>
                        </div>

                        <p class="text_description">
                            Hogwarts Legacy is an immersive, open-world
                            action RPG set in the world first introduced in
                            the Harry Potter books. Now you can take control
                            of the action and be at the center of your own
                            adventure in the wizarding world. Your legacy is
                            what you make of it. Live the Unwritten.
                        </p>
                    </div>
                    <div class="column">
                        <div class="brightness">
                           
                        <img src="image/last_of_us.jpg" alt="last_of_us" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">
                                The Last of Us<sup>TM</sup> Part I
                            </p>
                            <p class="text_highlight">$69.99</p>
                        </div>

                        <p class="text_description">
                            In a ravaged civilization, where infected and
                            hardened survivors run rampant, Joel, a weary
                            protagonist, is hired to smuggle 14-year-old
                            Ellie out of a military quarantine zone.
                            However, what starts as a small job soon
                            transforms into a brutal cross-country journey.
                        </p>
                    </div>
                </div>
            </section>
            <section>
                <h3 id="open_world">Open World Games</h3>
                <div class="row">
                    <div class="column">
                        <div class="brightness">
                            
                        <img src="image/genshin_impact.jpg" alt="genshin_impact" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">
                                Genshin Impact - Lantern Rite
                            </p>
                            <p class="text_highlight">$69.99</p>
                        </div>
                        <p class="text_description">
                            Embark on a journey across Teyvat to find your
                            lost sibling and seek answers from The Seven —
                            the gods of each element. Explore this wondrous
                            world, join forces with a diverse range of
                            characters, and unravel the countless mysteries
                            that Teyvat holds...
                        </p>
                    </div>
                    <div class="column">
                        <div class="brightness">
                          
                        <img src="image/cyperpunk2077.jpg" alt="cyperpunk2077" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">Cyberpunk 2077</p>
                            <p class="text_highlight">$69.99</p>
                        </div>

                        <p class="text_description">
                            Cyberpunk 2077 is an open-world,
                            action-adventure RPG set in the dark future of
                            Night City — a dangerous megalopolis obsessed
                            with power, glamor, and ceaseless body
                            modification.
                        </p>
                    </div>
                </div>
            </section>
            <section>
                <h3 id="sport">Sport Games</h3>
                <div class="row">
                    <div class="column">
                        <div class="brightness">
                           
                        <img src="image/fall_guys.jpg" alt="fall_guys" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">Fall Guys</p>
                            <p class="text_highlight">$49.99</p>
                        </div>
                        <p class="text_description">
                            Get yourself some extra Kudos by completing
                            challenges in our Kudos Carnival.
                        </p>
                    </div>
                    <div class="column">
                        <div class="brightness">
                           
                        <img src="image/rocket.jpg" alt="rocket" />
                        
                            <!-- source of image url:https://store.epicgames.com/en-US/ -->
                        </div>
                        <div class="price">
                            <p class="text_highlight">
                                Rocket League - Ferrari 296 GTB
                            </p>
                            <p class="text_highlight">$69.99</p>
                        </div>

                        <p class="text_description">
                            Ferrari is back for another lap in Rocket League
                            with the Ferrari 296 GTB Bundle.
                        </p>
                    </div>
                </div>
            </section>
        </article>
        <aside>
            <div class="aside_style">
                <h3>Top Upcoming</h3>
                <hr />
                <div class="aside_game">
                    <img src="image/children.jpg" alt="children" />
                    <!-- source of image url:https://store.epicgames.com/en-US/ -->
                    <div class="aside_game_text">
                        <p>CHILDREN SILENCE TOWN</p>
                        <div class="sale_list">
                            <p><span class="sale">-50%</span></p>
                            <ol>
                                <li>
                                    <span class="sale_price">$999</span>
                                </li>
                                <li>$49.9</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="aside_game">
                    <img src="image/neon.jpg" alt="neon" />
                    <!-- source of image url:https://store.epicgames.com/en-US/ -->
                    <div class="aside_game_text">
                        <p>NEON BLIGHT</p>
                        <p>$69.9</p>
                    </div>
                </div>
                <hr />
                <div class="aside_game">
                    <img src="image/loop.jpg" alt="loop" />
                    <!-- source of image url:https://store.epicgames.com/en-US/ -->
                    <div class="aside_game_text">
                        <p>LOOPMANCER</p>
                        <p>$99.9</p>
                    </div>
                </div>
                <hr />
                <div class="aside_game">
                    <img src="image/dark_light.png" alt="dark_light" />
                    <!-- source of image url:https://store.epicgames.com/en-US/ -->
                    <div class="aside_game_text">
                        <p>DARK LIGHT</p>
                        <p>$49.9</p>
                    </div>
                </div>
                <hr />
                <div class="aside_game">
                    <img src="image/naraka.png" alt="naraka" />
                    <!-- source of image url:https://store.epicgames.com/en-US/ -->
                    <div class="aside_game_text">
                        <p>NARAKA: END POINT</p>
                        <p>$99.9</p>
                    </div>
                </div>
                <hr />
                <div class="aside_game">
                    <img src="image/season.png" alt="season" />
                    <!-- source of image url:https://store.epicgames.com/en-US/ -->
                    <div class="aside_game_text">
                        <p>SEASON: FUTURE</p>
                        <p>$49.9</p>
                    </div>
                </div>
            </div>

            <div class="aside_table">
                <h2>Specifications</h2>
                <hr />
                <table class="table_style">
                    <tr class="tr_style">
                        <th id="hidden"></th>
                        <th>WINDOWS</th>
                        <th>MAC OS</th>
                    </tr>
                    <tr>
                        <td class="td_style">Minimum</td>

                        <td class="td_style">
                            <div class="sale_list">
                                <ol>
                                    <li>Memory</li>
                                    <li>6 GB</li>
                                </ol>
                            </div>
                        </td>
                        <td class="td_style">
                            <div class="sale_list">
                                <ol>
                                    <li>Memory</li>
                                    <li>TBD</li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_style">Recommended</td>
                        <td class="td_style">
                            <div class="sale_list">
                                <ol>
                                    <li>Memory</li>
                                    <li>8 GB</li>
                                </ol>
                            </div>
                        </td>
                        <td class="td_style">
                            <div class="sale_list">
                                <ol>
                                    <li>Memory</li>
                                    <li>TBD</li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </aside>
    </main>
    <!-- <iframe src="./footer.html" frameborder="0"></iframe> -->
    <?php
        require_once('./footer.inc')
    ?>
</body>

</html>