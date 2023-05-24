<!-- 
/*
    Purpose: This file is used to fix the order if the user has made any mistake in the previous page.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<?php
/* The above code is retrieving session variables and assigning them to corresponding variables.
  These session variables are likely set in a previous page or form submission. The variables are
  used to display user input or error messages on a confirmation or summary page. */
session_start();
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$streetAddress = $_SESSION['streetaddress'];
$suburbOrTown = $_SESSION['s_o_t'];
$postcode = $_SESSION['postcode'];
$phone = $_SESSION['phone'];
$contact = $_SESSION['contact'];
$product_name = $_SESSION['product_name'];
$state = $_SESSION['state'];
$comment = $_SESSION['comment'];
$quantity = $_SESSION['quantity'];
$features = $_SESSION['features'];
$cardType = $_SESSION['card_type'];
$first_name_errMsg = $_SESSION['err_msg'][0];
$last_name_errMsg = $_SESSION['err_msg'][1];
$email_errMsg = $_SESSION['err_msg'][2];
$street_address_errMsg = $_SESSION['err_msg'][3];
$suburbortown_errMsg = $_SESSION['err_msg'][4];
$postcode_errMsg = $_SESSION['err_msg'][5];
$phone_errMsg = $_SESSION['err_msg'][6];
$quantity_errMsg = $_SESSION['err_msg'][7];
$card_number_errMsg = $_SESSION['err_msg'][8];
$card_name_errMsg = $_SESSION['err_msg'][11];
$expiry_date_errMsg = $_SESSION['err_msg'][9];
$cvv_errMsg = $_SESSION['err_msg'][10];
?>

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
            <h1 id="enquiry_form_h1">Personal Details</h1>
            <div class="enquiry_form_all">
                <div class="enquiry_form_div" id="enquiry_form_left">
                    <p class="enquiry_form_p"> Personal Information</p>
                    <!-- change the input border to red and label to red to highlight invalid -->
                    <div class="text_holder" <?php if ($first_name_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <!-- automatic re-enter -->
                        <input type="text" placeholder="Please enter your first name" id="firstname" name="first_name" title="maximum of 25 letters, alphabetical only" maxlength="25" pattern="[A-Za-z]{1,25}" <?php echo ("value = '$firstname'") ?> required />
                        <label for="firstname">First Name |</label>
                        <!--display error message-->
                        <p class="errormessage"><?php if ($first_name_errMsg != ' ') echo $first_name_errMsg; ?></p>
                    </div>
                    <!-- change the input border to red and label to red to highlight invalid -->
                    <div class="text_holder" <?php if ($last_name_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <!-- automatic re-enter -->
                        <input type="text" placeholder="Please enter your last name" id="lastname" name="last_name" autocomplete="off" title="maximum of 25 letters, alphabetical only" maxlength="25" pattern="[A-Za-z]{1,25}" <?php echo ("value = '$lastname'") ?> required />
                        <label for="lastname">Last Name |</label>
                        <!--display error message-->
                        <p class="errormessage"><?php if ($last_name_errMsg != ' ') echo $last_name_errMsg; ?></p>
                    </div>
                    <!-- change the input border to red and label to red to highlight invalid -->
                    <div class="text_holder" <?php if ($email_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <!-- automatic re-enter -->
                        <input type="email" placeholder="myemail@example.com" id="email" autocomplete="off" name="email" <?php echo ("value = '$email'") ?> required />
                        <label for="email">Email Address |</label>
                        <!--display error message-->
                        <p class="errormessage"><?php if ($email_errMsg != ' ') echo $email_errMsg; ?></p>
                    </div>


                    <!-- change the input border to red and label to red to highlight invalid-->
                    <div class="text_holder" <?php if ($phone_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <input id="phonenumber" name="phone" placeholder="XXXXXXXXXX" autocomplete="off" title="maximum of 10 digit" maxlength="10" pattern="\d{1,10}" <?php echo ("value = '$phone'") ?> required />
                        <label for="phonenumber">Phone Number |</label>
                        <p class="errormessage"><?php if ($phone_errMsg != ' ') echo $phone_errMsg; ?></p>
                    </div>
                    <p class="enquiry_form_p">PREFERRED CONTACT</p>
                    <div class="radio">
                        <!-- check which type of contact is checked in the session => automatic re-enter -->
                        <input type="radio" id="emailcontact" name="contact" value="email" <?php echo ($contact == "email") ? "checked" : "" ?> />
                        <label for="emailcontact">
                            <p>Email</p>
                        </label>
                        <!-- check which type of contact is checked in the session => automatic re-enter -->
                        <input type="radio" id="post" name="contact" value="post" <?php echo ($contact == "post") ? "checked" : "" ?> />
                        <label for="post">
                            <p>Post</p>
                        </label>
                        <!-- check which type of contact is checked in the session => automatic re-enter -->
                        <input type="radio" id="phone" name="contact" value="phone" <?php echo ($contact == "phone") ? "checked" : "" ?> />
                        <label for="phone">
                            <p>Phone</p>
                        </label>
                    </div>
                </div>

                <div class="enquiry_form_div" id="enquiry_form_right">
                    <fieldset class="enquiry_fieldset">
                        <legend>Address</legend>
                        <!-- change the input border to red and label to red to highlight invalid -->
                        <div class="text_holder" <?php if ($street_address_errMsg != ' ') echo "id = 'error_input'"; ?>>
                            <!-- automatic re-enter -->
                            <input type="text" placeholder="Please enter your street address" id="streetaddress" name="streetaddress" autocomplete="off" title="maximum of 40 characters" maxlength="40" <?php echo ("value ='$streetAddress'") ?> required />
                            <label for="streetaddress">Street Address |</label>
                            <!--display error message-->
                            <p class="errormessage"><?php if ($street_address_errMsg != ' ') echo $street_address_errMsg; ?></p>
                        </div>
                        <!-- change the input border to red and label to red to highlight invalid -->
                        <div class="text_holder" <?php if ($suburbortown_errMsg != ' ') echo "id = 'error_input'"; ?>>
                            <!-- automatic re-enter -->
                            <input type="text" placeholder="Please enter your suburb or town" id="suburbortown" name="suburb_or_town" autocomplete="off" title="maximum of 20 characters" maxlength="20" <?php echo ("value ='$suburbOrTown'") ?> required />
                            <label for="suburbortown">Suburb/Town |</label>
                            <!--display error message-->
                            <p class="errormessage"><?php if ($suburbortown_errMsg != ' ') echo $suburbortown_errMsg; ?></p>
                        </div>

                        <!-- change the input border to red and label to red to highlight invalid -->
                        <div class="text_holder" <?php if ($postcode_errMsg != ' ') echo "id = 'error_input'"; ?>>
                            <!-- automatic re-enter -->
                            <input type="text" placeholder="4-digit postcode" id="postcode" name="postcode" autocomplete="off" title="4 digits" maxlength="4" pattern="\d{4}" <?php echo ("value = '$postcode'") ?> required />
                            <label for="postcode">Postcode |</label>
                            <!--display error message-->
                            <p class="errormessage"><?php if ($postcode_errMsg != ' ') echo $postcode_errMsg; ?></p>
                        </div>
                        <div class="enquiry_form_select" id="enquiry_form_states">
                            <label for="state">STATES |</label>
                            <select id="state" name="state">
                                <!--check which state have been selected and then automatic re-enter-->
                                <option value="VIC" <?php echo ($state == "VIC") ? "selected" : "" ?>>VIC</option>
                                <option value="NSW" <?php echo ($state == "NSW") ? "selected" : "" ?>>NSW</option>
                                <option value="QLD" <?php echo ($state == "QLD") ? "selected" : "" ?>>QLD</option>
                                <option value="NT" <?php echo ($state == "NT") ? "selected" : "" ?>>NT</option>
                                <option value="WA" <?php echo ($state == "WA") ? "selected" : "" ?>>WA</option>
                                <option value="SA" <?php echo ($state == "SA") ? "selected" : "" ?>>SA</option>
                                <option value="TAS" <?php echo ($state == "TAS") ? "selected" : "" ?>>TAS</option>
                                <option value="ACT" <?php echo ($state == "ACT") ? "selected" : "" ?>>ACT</option>
                            </select>
                        </div>
                    </fieldset>

                    <p class="enquiry_form_p">
                        <label for="comment">Special requirements</label>
                    </p>
                    <!-- automatic re-enter-->
                    <textarea id="comment" name="comment" rows="3" cols="35" placeholder="Comment..."><?php echo ($comment) ?></textarea>


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
                                <!--check which state have been selected and then automatic re-enter-->
                                <option value="Hi-Fi RUSH" <?php echo ($product_name == "Hi-Fi RUSH") ? "selected" : "" ?>>Hi-Fi RUSH</option>
                                <option value="Dead Space" <?php echo ($product_name == "Dead Space") ? "selected" : "" ?>>
                                    Dead Space
                                </option>
                                <option value="Hogwarts Legacy" <?php echo ($product_name == "Hogwarts Legacy") ? "selected" : "" ?>>
                                    Hogwarts Legacy
                                </option>
                                <option value="The Last Of Us" <?php echo ($product_name == "The Last Of Us") ? "selected" : "" ?>>The Last of Us</option>
                                <option value="Genshin Impact" <?php echo ($product_name == "Genshin Impact") ? "selected" : "" ?>>Genshin Impact</option>
                                <option value="Cyberpunk 2077" <?php echo ($product_name == "Cyberpunk 2077") ? "selected" : "" ?>>Cyberpunk 2077</option>
                                <option value="Fall Guys" <?php echo ($product_name == "Fall Guys") ? "selected" : "" ?>>Fall Guys</option>
                                <option value="Rocket League" <?php echo ($product_name == "Rocket League") ? "selected" : "" ?>>Rocket League</option>
                            </select>
                        </div>

                        <div class="text_holder" id="enquiry_form_quantity">
                            <!-- change the input border to red and label to red to highlight invalid -->
                            <div <?php if ($quantity_errMsg != ' ') echo "id = 'error_input'"; ?>>
                                <!-- automatic re-enter -->
                                <input id="quantity" name="quantity" placeholder="Number" autocomplete="off" maxlength="3" pattern="\d{1,10}" <?php echo ("value = '$quantity'") ?> required />
                                <label for="Quantity">Quantity |</label>
                                <!--display error message-->
                                <p class="errormessage"><?php if ($quantity_errMsg != ' ') echo $quantity_errMsg; ?></p>
                            </div>
                        </div>

                        <p class="enquiry_form_p">FEATURES</p>
                        <div class="enquiry_form_checkbox">
                            <!--check each index of array to see which features checked => automatic re-enter-->
                            <label for="premium">Premium Edition (+$10)</label>
                            <input type="checkbox" id="premium" name="features[]" value="premium" <?php if ($features != null) {
                                                                                                        foreach ($features as $f) {
                                                                                                            echo ($f == "premium") ? "checked" : "";
                                                                                                        }
                                                                                                    } ?> />
                        </div>
                        <div class="enquiry_form_checkbox">
                            <label for="deluxe">Deluxe Edition (+$20)</label>
                            <input type="checkbox" id="deluxe" name="features[]" value="deluxe" <?php if ($features != null) {
                                                                                                    foreach ($features as $f) {
                                                                                                        echo ($f == "deluxe") ? "checked" : "";
                                                                                                    }
                                                                                                } ?> />
                        </div>

                        <div class="enquiry_form_checkbox">
                            <label for="VIP">VIP Edition (+$30)</label>
                            <input type="checkbox" id="vip" name="features[]" value="vip" <?php if ($features != null) {
                                                                                                foreach ($features as $f) {
                                                                                                    echo ($f == "vip") ? "checked" : "";
                                                                                                }
                                                                                            } ?> />
                        </div>


                    </fieldset>
                </div>

                <div class="enquiry_form_div" id="enquiry_form_right">
                    <h2>Payment methods</h2>
                    <div id="input_card_radio">
                        <div class="radio_card_container">
                            <!--check which type of credit card has been selected in the session => automatic re-enter-->
                            <input type="radio" name="card_type" id="visa" value="visa" class="pay_btn" <?php echo ($cardType == "visa") ? "checked" : "" ?>>
                            <label for="visa" class="radio_label_card" id="label_visa"><img class="pay_img" src="./image/card/visa.jpg" alt=""></label>
                        </div>
                        <div class="radio_card_container">
                            <input type="radio" name="card_type" id="master" value="master" class="pay_btn" <?php echo ($cardType == "master") ? "checked" : "" ?>>
                            <label for="master" class="radio_label_card" id="label_master"><img class="pay_img" src="./image/card/mastercard.jpg" alt=""></label>
                        </div>
                        <div class="radio_card_container">
                            <input type="radio" name="card_type" id="amex" value="amex" class="pay_btn" <?php echo ($cardType == "amex") ? "checked" : "" ?>>
                            <label for="amex" class="radio_label_card" id="label_amex"><img class="pay_img" src="./image/card/american-express-logo-.png" alt=""></label>
                        </div>
                    </div>
                    <!-- change the input border to red and label to red to highlight invalid -->
                    <div class="text_holder" <?php if ($card_number_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <input type="text" name="card_number" id="card" maxlength="16">
                        <label for="card">Card number</label>
                        <!--display error message-->
                        <p class="errormessage"><?php if ($card_number_errMsg != ' ') echo $card_number_errMsg; ?></p>
                    </div>
                    <!-- change the input border to red and label to red to highlight invalid -->
                    <div class="text_holder" <?php if ($card_name_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <input type="text" name="card_name" id="name">
                        <label for="name">Name on card</label>
                        <!--display error message-->
                        <p class="errormessage"><?php if ($card_name_errMsg != ' ') echo $card_name_errMsg; ?></p>
                    </div>
                    <!-- change the input border to red and label to red to highlight invalid -->
                    <div class="text_holder" <?php if ($expiry_date_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <input type="text" name="expiry_date" id="exp">
                        <label for="exp">Expiry date</label>
                        <!--display error message-->
                        <p class="errormessage"><?php if ($expiry_date_errMsg != ' ') echo $expiry_date_errMsg; ?></p>
                    </div>
                    <!-- change the input border to red and label to red to highlight invalid -->
                    <div class="text_holder" <?php if ($cvv_errMsg != ' ') echo "id = 'error_input'"; ?>>
                        <input type="text" name="cvv" id="cvv">
                        <label for="cvv">CVV</label>
                        <!--display error message-->
                        <p class="errormessage"><?php if ($cvv_errMsg != ' ') echo $cvv_errMsg; ?></p>
                    </div>



                </div>
            </div>


            <div class="enquiry_form_submit">
                <input type="submit" value="CHECK OUT" />
            </div>
        </form>

    </main>
    <?php
    include './footer.inc';
    ?>
</body>

</html>