<!-- 
/*
    Purpose: This file is the main page of the website
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
        <meta name="author" content="Nghiem Tuan Linh" />
        <link rel="stylesheet" href="./styles/style.css" />
        <link rel="stylesheet" href="./styles/index.css" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Babylonica&family=Caveat&family=Courgette&family=Dancing+Script&family=Indie+Flower&family=Julee&family=Kalam&family=Mynerve&family=Pacifico&family=Permanent+Marker&family=Sassy+Frass&family=Satisfy&family=Shadows+Into+Light&family=Zeyada&display=swap"
            rel="stylesheet"
        />
        <title>Intro</title>
    </head>
    <body class="indexbody">
        <?php
            include './header.inc';
        ?>
        <div class="contain">
            <div class="slogan">
                <h2 class="in_slogan">
                    <span>
                        <span class="dancing_text_frfr dcf1">
                            <span class="in_slo_gethigh_txt_nohigh isgt1"
                                >E</span
                            >
                            <span class="in_slo_gethigh_txt isgt2">m</span>
                            <span class="in_slo_gethigh_txt isgt3">b</span>
                            <span class="in_slo_gethigh_txt isgt4">a</span>
                            <span class="in_slo_gethigh_txt isgt5">r</span>
                            <span class="in_slo_gethigh_txt isgt6">k</span>
                        </span>
                        upon countless
                        <br />
                        <span class="dancing_text_frfr dcf2">
                            <span class="in_slo_gethigh_txt_nohigh isgt1"
                                >a</span
                            >
                            <span class="in_slo_gethigh_txt isgt2">d</span>
                            <span class="in_slo_gethigh_txt isgt3">v</span>
                            <span class="in_slo_gethigh_txt isgt4">e</span>
                            <span class="in_slo_gethigh_txt isgt5">n</span>
                            <span class="in_slo_gethigh_txt isgt6">t</span>
                            <span class="in_slo_gethigh_txt isgt2">u</span>
                            <span class="in_slo_gethigh_txt isgt3">r</span>
                            <span class="in_slo_gethigh_txt isgt4">e</span>
                            <span class="in_slo_gethigh_txt isgt5"
                                >s</span
                            > </span
                        >.
                    </span>
                    <span>
                        <span class="dancing_text_frfr dcf3">
                            <span class="in_slo_gethigh_txt_nohigh isgt1"
                                >W</span
                            >
                            <span class="in_slo_gethigh_txt isgt2">r</span>
                            <span class="in_slo_gethigh_txt isgt3">i</span>
                            <span class="in_slo_gethigh_txt isgt4">t</span>
                            <span class="in_slo_gethigh_txt isgt5">e</span>
                        </span>
                        your own story.
                    </span>
                    <span>
                        All at
                        <span class="dancing_text_frfr dcf4">
                            <span class="in_slo_gethigh_txt_nohigh isgt1"
                                >K</span
                            >
                            <span class="in_slo_gethigh_txt isgt2">I</span>
                            <span class="in_slo_gethigh_txt isgt3">R</span>
                            <span class="in_slo_gethigh_txt isgt4">I</span>
                            <span class="in_slo_gethigh_txt isgt6">T</span>
                            <span class="in_slo_gethigh_txt isgt4">O</span>
                        </span>
                    </span>
                </h2>
                <iframe
            id="showcase_video_in"
            
            src="https://www.youtube-nocookie.com/embed/wOmdVz6vouM"
            title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen
        ></iframe>
                <!-- <h4></h4> -->
                <button title="Go to product.html" class="raise">
                    <a href="product.php">Get started</a>
                </button>
            </div>
        </div>
        
        <!-- <button title="Go to product.html" class="raise">
            <a href="product.php">Get started</a>
        </button> -->
        <?php
            include './footer.inc';
        ?>
    </body>
</html>
