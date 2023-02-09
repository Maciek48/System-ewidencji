<?php
session_start();
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
    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <div class="brand-title"><a href="index.php"><img src="assets/logo_wega_final.png" alt="logo"></a></div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo "<li><a href='user.php'>Tickets</a></li>";
                        echo "<li><a href='form.php'>Custom clearence</a></li>";
                        echo "<li><a href='includes/logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href='index.php'>Log in</a></li>";
                        echo "<li><a href='register.php'>Register</a></li>";
                        echo "<li><a href='contact.php'>Contact</a></li>";
                    }
                    ?>

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
    <div class="form_export">
        <div class="display_form">
            <p class="login-text" style="font-size: 2rem; font-weight: 800; text-align: center;">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Fill in all fileds!</p><br>";
                        }else if($_GET["error"] == "none"){
                            echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>You're massage have been sent to us!</p><br>";
                        }else if($_GET["error"] == "invalidemail"){
                            echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Choos a proper email!</p><br>";
                        }
                    }
                ?>  
            </p>

        
            <form method="POST" enctype="multipart/form-data" class="login-email" action="includes/contact_includes.php">
                <p class="login-text" style="font-size: 2rem; font-weight: 800; text-align: center;">Contact form</p>
                <br>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800; text-align: flex-start;">We offer simplified customs clearance. It is also possible to represent unregistered entities in the European Union. To discuss an indirect representation, please complete the contact form:</p>
                
                <!-- Separating line -->
                <div class="line"></div>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Subject *</p>
                <input type="text" name="subject" class="register"  required>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter Subject</p>
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Company name *</p>
                <input type="text"  name="company_name" class="register"  required>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter company name</p>
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Eori number *</p>
                <input type="text"  name="eori_number" class="register"  required>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter eori</p>
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Contact email *</p>
                <input type="email"  name="contact_email" class="register"  required>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter email</p>
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Contact phone number</p>
                <input type="text"  name="contact_number" class="register">
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter phone number</p>
                <br>

                <p class="login-text" style="font-size: 1.3rem; font-weight: 600; text-align: flex-start;">Your message *</p>
                <textarea name="message"   cols="80" rows="8" style="resize:none;" required></textarea>
                <p class="login-text" style="font-size: 0.9rem; font-weight: 300; text-align: flex-start;">Enter message</p>
                <br>
                <br>
            
                <label>
                    <button type="submit" class="transport_submit" name="contact_submit">Submit</button>
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