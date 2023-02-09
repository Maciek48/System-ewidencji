<?php 

include 'includes/config.php';

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
        <!-- Navigation Bar -->
        <header>
            <nav class="navbar">
                <div class="brand-title">
                    <a href="index.php">
                        <img src="assets/logo_wega_final.png" alt="logo"></a></div>
                    <a href="#" class="toggle-button">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                <div class="navbar-links">
                    <ul>
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
        <div class="container">
            <section class="error_msg">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>Fill in all fileds!</p>";
                        }
                        else if($_GET["error"] == "wronglogin"){
                            echo "<p class='login-text' style='font-size: 2rem; font-weight: 800; text-align: center;'>incorrect login information!</p>";
                        }
                    }
                ?>  
            </section>
            <section>
                <!-- From to log in user -->
                <form action="includes/login_include.php" method="POST" class="login-email">
                    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                    <div class="input-group">
                        <input type="text" placeholder="Username/Email" name="username"  required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password"  required>
                    </div>
                    <div class="input-group">
                        <button name="submit_login" class="btn">Login</button>
                    </div>
                    <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		        </form>  
            </section>
	    </div>
    </body>
    <footer>
        <!-- Footer contact -->
        <div class="stopka">
            <h5>Copyright &copy; ACWEGA 2022</h5>
        </div>
        
    </footer>
</html>

