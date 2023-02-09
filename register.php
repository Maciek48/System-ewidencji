<?php

include 'includes/config.php';
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: user.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Name of the page -->
    <title>Agencja Celna Wega</title>

    <!-- Icon in the browser-->
    <link rel="icon" type="image/x-icon" href="assets/icon-truck.png" />

    <!-- Font from fonts.google.com-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- inculde CSS file-->
    <style>
        <?php include 'css/styles.css'; ?>
    </style>
</head>

<body>
    <header>
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="brand-title"><a href="index.php"><img src="assets/logo_wega_final.png" alt="logo"></a></div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <li><a href="index.php">Log in</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Language images -->
    <!--
        <div class="languages">
            <a href="index.php"><img src="assets/icon-pl.png" alt="Ikona PL"></a>
            <a href="index_eng.php"><img src="assets/icon-eng.png" alt="Ikona ENG"></a>
        </div>-->
    <!--
        <div class="container">
-->

    <!--
            <section>
                <!-- Form to register the user -->
    <!--
                <form action="includes/register_include.php" method="POST" class="login-email">
                    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                    <div class="input-group">
                        <input type="text" placeholder="Username" name="username"   required>
                    </div>
                    <div class="input-group">
                        <input type="email" placeholder="Email" name="email"  required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password"  required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Confirm Password" name="cpassword"  required>
                    </div>
                    <div class="input-group">
                        <button name="submit_register" class="btn">Register</button>
                    </div>
                    <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
                </form>  
            </section>
	    </div> -->

    <div class="form_export">
        <div class="display_form">
            <section class="error_msg">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Fill in all fileds!</p>";
                    } else if ($_GET["error"] == "invalidusername") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Use only letters or numbers in Username!</p>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Choos a proper email!</p>";
                    } else if ($_GET["error"] == "passwordnotmatch") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Passwords doesn't match!</p>";
                    } else if ($_GET["error"] == "passwordtoshort") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Password too short, at least 7 characters!</p>";
                    } else if ($_GET["error"] == "usernametaken") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Username already taken. Take another one!</p>";
                    } else if ($_GET["error"] == "stmtfailed") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Something went wrong, try agian!</p>";
                    } else if ($_GET["error"] == "none") {
                        echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>You have signed up!</p>";
                    }
                }
                ?>
            </section>
            
            <?php include 'includes/register_include.php'; ?>

            <form action="includes/register_include.php" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800; text-align: center;">Customer registration</p>
                <br>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800; text-align: flex-start;">Your Login Setup</p>

                <!-- Separating line -->
                <div class="line"></div>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Username *</p>
                <input type="text" name="username" class="register" required value="<?php echo " $username"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter Username</p>
                <br>
                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Password *</p>
                <input type="password" name="password" class="register" required>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter Password</p>
                <input type="password" name="cpassword" class="register" required>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Confirm Password</p>
                <br>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">You password should contain min. 7 characters.</p>


                <br>
                <br>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800; text-align: flex-start;">Your Company</p>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Please fill in all details correctly and in full. This information will be used to pre-populate number of documents that we may raise on your behalf (eg. Customs Declarations, Insurance Claims, etc).</p>


                <!-- Separating line -->
                <div class="line"></div>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Company Name *</p>
                <input type="text" name="company_name" class="register" required value="<?php echo " $company_name"; ?>">
                <br>
                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Company Address *</p>
                <input type="text" name="company_address1" class="register" required value="<?php echo " $company_address1"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Street Address*</p>

                <input type="text" name="company_address2" class="register" required value="<?php echo " $company_address2"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Street Number*</p>

                <input type="text" name="city" class="register" required value="<?php echo " $city"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">City*</p>

                <input type="text" name="postal_code" class="register" required value="<?php echo " $postal_code"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Postal Code*</p>

                <br>
                <select name="country" id="countrys" size="3" class="register" style="width: 40%;font-size: 24px;">
                    <option value="Poland" selected required>Poland</option>
                    <option value="England">Great Britain</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Norway">Norway</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Finland">Finland</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Russia">Russia</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Czech_Republic">Czech Republic</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Austria">Austria</option>
                    <option value="Belgium">Belgium</option>
                    <option value="France">France</option>
                </select>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Country*</p>
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Company email *</p>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">This email will be used for documents, confirmations and other official queries related to this account.</p>
                <input type="email" name="email_company" class="register" required value="<?php echo " $email_company"; ?>">

                <br>
                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Phone *</p>
                <select name="prefiks_phone" id="prefiks_phone" size="3" class="register" style="width: 40%;font-size: 24px;">
                    <option value="Poland" selected required>+48</option>
                    <option value="England">+44</option>
                    <option value="Germany">+49</option>
                </select>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Choose the prefiks to you're country*</p>
                <br>
                <input type="text" name="phone" class="register" required value="<?php echo " $phone"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Phone Number*</p>

                <br>
                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Tax id. *</p>
                <input type="text" name="vat_number" class="register" required value="<?php echo " $vat_accounting"; ?>">

                <br>
                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Do you use postponed VAT accounting (PVA) in the UK? *</p>
                <div class="radio_flex">
                    <input type="radio" name="vat_accounting" value="Yes" checked><label style="display: inline; margin-left: 0px; padding: 0 5px;font-size: 18px;">Yes</label><br>
                    <input type="radio" name="vat_accounting" value="No"><label style="display: inline; margin-left: 0px; padding: 0 5px;font-size: 18px;">No</label>

                </div><br>

                <br>
                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">EORI No. *</p>
                <input type="text" name="eori_number" class="register" required value="<?php echo " $eori_number"; ?>">
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Company Reg. No.</p>
                <input type="text" name="company_reg_no" class="register" value="<?php echo " $company_reg_no"; ?>">
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Duty Deferment Account No. </p>
                <input type="text" name="duty_deferment_account_no" class="register" value="<?php echo " $duty_deferment_account_no"; ?>">
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Your currency?</p>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Which currency would you like to be invoiced in for AcWega services?</p>

                <div class="radio_flex">
                    <input type="radio" name="currency" value="zl" checked><label style="display: inline; margin-left: 0px; padding: 0 5px;font-size: 18px;">Złoty(zł)</label>
                    <input type="radio" name="currency" value="euro"><label style="display: inline; margin-left: 0px; padding: 0 5px;font-size: 18px;">Euro(€)</label>
                    <input type="radio" name="currency" value="dolar"><label style="display: inline; margin-left: 0px; padding: 0 5px;font-size: 18px;">Dolar($)</label>
                    <input type="radio" name="currency" value="funt"><label style="display: inline; margin-left: 0px; padding: 0 5px;font-size: 18px;">Funt(£)</label>
                </div><br>


                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Email for customs communications* </p>
                <input type="text" name="email_custom_comunication" class="register">

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Email for invoices* </p>
                <input type="text" name="email_custom_invoices" class="register">

                <br><br>

                <p class="login-text" style="font-size: 1.5rem; font-weight: 800; text-align: flex-start;">About you</p>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Please fill in your details. You must have an authority to represent your company (ie. director or company secretary).</p>


                <!-- Separating line -->
                <div class="line"></div>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Your Name *</p>
                <input type="text" name="first_name" class="register" value="<?php echo " $first_name"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">First*</p>

                <input type="text" name="last_name" class="register" value="<?php echo " $last_name"; ?>">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Last*</p>
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Position in the company *</p>
                <input type="text" name="position_in_company" class="register" value="<?php echo " $position_in_company"; ?>">
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Your Email *</p>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">This email will be used for account management (such as password reset, etc) It can be the same as the company email inputed above.</p>
                <input type="email" name="email" class="register" value="<?php echo " $email"; ?>">

                <br><br>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800; text-align: flex-start;">Customs Direct Representation</p>


                <!-- Separating line -->
                <div class="line"></div>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Consent *</p>
                <div class="radio_flex">
                    <input type="radio" name="consent" value="Accepted" required><label style="display: inline; margin-left: 0px; padding: 0 5px;font-size: 18px;">I declare that I have the legal authority to represent the above company and the above information is true and complete. By signing this form I appoint AcWega to act as direct representative for customs as per below agreement..</label>
                </div>

                <br>
                <br>
                <a href="assets/Upowaznienia/direct_Authorisation_ENG_PL_WEGA-A_one-time.pdf" download>Download File</a>
                <label style="font-size: 1.2rem; font-weight: 400; text-align: flex-start; margin-left: 0; padding-left: 0;">Here you can attach a file. <input type="file" name="transfer_confirmation" required></label>

                <label>
                    <button type="submit" class="transport_submit" name="submit_register">Submit</button>
                </label>
            </form>
        </div>
    </div>
</body>
<footer>
    <!-- Footer contact -->
    <div class="stopka">
        <h5>Copyright &copy; ACWEGA 2022</h5>
    </div>

</footer>

</html>