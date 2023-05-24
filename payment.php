<!-- /*
	Purpose: This file is used to display the payment page for the user to enter their personal details and payment details
	Project: Kirito website
	Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
	Last Updated: 2023-4-7
*/ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Enquire" />
    <meta name="keyword" content="Kirito" />
    <meta name="author" content="Quang_Phan" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enquire</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="share_body">
    <?php
    include './header.inc';
    ?>
    <main>



        <form method="post" action="./process_order.php" novalidate>
        <h1 id = "enquiry_form_h1">Personal Details</h1>
            <div class="enquiry_form_all">
                
                <div class="enquiry_form_div" id="enquiry_form_left">
                    <p class="enquiry_form_p"> Personal Information</p>
                    <div class="text_holder">
                        <input type="text" placeholder="Please enter your first name" id="firstname" name="first_name" autocomplete="off" title="maximum of 25 letters, alphabetical only" maxlength="25" pattern="[A-Za-z]{1,25}" required />
                        <label for="firstname">First Name |</label>
                        <p class="error_message"></p>
                    </div>

                    <div class="text_holder">
                        <input type="text" placeholder="Please enter your last name" id="lastname" name="last_name" autocomplete="off" title="maximum of 25 letters, alphabetical only" maxlength="25" pattern="[A-Za-z]{1,25}" required />
                        <label for="lastname">Last Name |</label>
                        <p class="error_message"></p>
                    </div>

                    <div class="text_holder">
                        <input type="email" placeholder="myemail@example.com" id="email" autocomplete="off" name="email" required />
                        <label for="email">Email Address |</label>
                        <p class="error_message"></p>
                    </div>



                    <div class="text_holder">
                        <input id="phonenumber" name="phone" placeholder="XXXXXXXXXX" autocomplete="off" title="maximum of 10 digit" maxlength="10" pattern="\d{1,10}" required />
                        <label for="phonenumber">Phone Number |</label>
                        <p class="error_message"></p>
                    </div>
                    <p class="enquiry_form_p">PREFERRED CONTACT</p>
                    <div class="radio">
                        <input type="radio" id="emailcontact" name="contact" value="email" checked />
                        <label for="emailcontact">
                            <p>Email</p>
                        </label>

                        <input type="radio" id="post" name="contact" value="post" />
                        <label for="post">
                            <p>Post</p>
                        </label>

                        <input type="radio" id="phone" name="contact" value="phone" />
                        <label for="phone">
                            <p>Phone</p>
                        </label>
                    </div>
                </div>

                <div class="enquiry_form_div" id="enquiry_form_right">


                    <fieldset class="enquiry_fieldset">

                        <legend>Address</legend>

                        <div class="text_holder">
                            <input type="text" placeholder="Please enter your street address" id="streetaddress" name="streetaddress" autocomplete="off" title="maximum of 40 characters" maxlength="40" required />
                            <label for="streetaddress">Street Address |</label>
                            <p class="error_message"></p>
                        </div>

                        <div class="text_holder">
                            <input type="text" placeholder="Please enter your suburb or town" id="suburbortown" name="suburb_or_town" autocomplete="off" title="maximum of 20 characters" maxlength="20" required />
                            <label for="suburbortown">Suburb/Town |</label>
                            <p class="error_message"></p>
                        </div>

                        <div class="text_holder">
                            <input type="text" placeholder="4-digit postcode" id="postcode" name="postcode" autocomplete="off" title="4 digits" maxlength="4" pattern="\d{4}" required />
                            <label for="postcode">Postcode |</label>
                            <p class="error_message"></p>
                        </div>
                        <div class="enquiry_form_select" id="enquiry_form_states">
                            <label for="states">STATES |</label>
                            <select id="states" name="state">
                                <option value="VIC">VIC</option>
                                <option value="NSW" selected>NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>
                            </select>
                        </div>
                    </fieldset>


                    <p class="enquiry_form_p">
                        <label for="comment">Special requirements</label>
                    </p>
                    <textarea id="comment" name="comment" rows="3" cols="35" placeholder="Comment..."></textarea>


                </div>

            </div>
            <h1>Payment details</h1>
            <div class="enquiry_form_all">

                <div class="enquiry_form_div" id="enquiry_form_left">
                    <fieldset class="enquiry_fieldset">
                        <legend>Product Selection</legend>
                        <div class="enquiry_form_select" id="enquiry_form_categories">
                            <label for="product_name">Product name |</label>
                            <select id="product_name" name="product_name">
                                <option value="Hi-Fi RUSH">Hi-Fi RUSH</option>
                                <option value="Dead Space">
                                    Dead Space
                                </option>
                                <option value="Hogwarts Legacy">
                                    Hogwarts Legacy
                                </option>
                                <option value="The Last Of Us">The Last of Us</option>
                                <option value="Genshin Impact">Genshin Impact</option>
                                <option value="Cyberpunk 2077">Cyberpunk 2077</option>
                                <option value="Fall Guys">Fall Guys</option>
                                <option value="Rocket League">Rocket League</option>
                            </select>
                        </div>

                        <div class="text_holder" id="enquiry_form_quantity">
                            <input id="quantity" name="quantity" placeholder="Number" autocomplete="off" maxlength="3" pattern="\d{1,10}" required />
                            <label for="Quantity">Quantity |</label>
                        </div>
                        <p class="enquiry_form_p">FEATURES</p>


                        <div class="enquiry_form_checkbox">
                            <label for="premium">Premium Edition (+$10)</label>
                            <input type="checkbox" id="premium" name="features[]" value="premium" />
                        </div>
                        <div class="enquiry_form_checkbox">
                            <label for="deluxe">Deluxe Edition (+$20)</label>
                            <input type="checkbox" id="deluxe" name="features[]" value="deluxe" />
                        </div>

                        <div class="enquiry_form_checkbox">
                            <label for="VIP">VIP Edition (+$30)</label>
                            <input type="checkbox" id="vip" name="features[]" value="vip" />
                        </div>


                    </fieldset>
                </div>

                <div class="enquiry_form_div" id="enquiry_form_right">
                <h2>Payment methods</h2>
                    <div id="input_card_radio">
                        <div class="radio_card_container">
                            <input type="radio" name="card_type" id="visa" value="visa" class="pay_btn" checked>
                            <label for="visa" class="radio_label_card" id="label_visa"><img class="pay_img" src="./image/card/visa.jpg" alt=""></label>
                        </div>
                        <div class="radio_card_container">
                            <input type="radio" name="card_type" id="master" value="master" class="pay_btn">
                            <label for="master" class="radio_label_card" id="label_master"><img class="pay_img" src="./image/card/mastercard.jpg" alt=""></label>
                        </div>
                        <div class="radio_card_container">
                            <input type="radio" name="card_type" id="amex" value="amex" class="pay_btn">
                            <label for="amex" class="radio_label_card" id="label_amex"><img class="pay_img" src="./image/card/american-express-logo-.png" alt=""></label>
                        </div>
                    </div>

                    <div class="text_holder">
                        <input type="text" name="card_number" id="card" maxlength="16">
                        <label for="card">Card number</label>
                        <p class="errormessage"></p>
                    </div>
                    <div class="text_holder">
                        <input type="text" name="card_name" id="name">
                        <label for="name">Name on card</label>
                        <p class="errormessage"></p>
                    </div>
                    <div class="text_holder">
                        <input type="text" name="expiry_date" id="exp">
                        <label for="exp">Expiry date</label>
                        <p class="errormessage"></p>
                    </div>
                    <div class="text_holder">
                        <input type="text" name="cvv" id="cvv">
                        <label for="cvv">CVV</label>
                        <p class="errormessage"></p>
                    </div>
                </div>
            </div>


            <div class="enquiry_form_submit">
                <input type="submit" value="Check out" />
            </div>
        </form>

    </main>
    <?php
    include './footer.inc';
    ?>
</body>

</html>