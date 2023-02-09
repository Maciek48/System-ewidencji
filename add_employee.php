<?php 

include 'includes/config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
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
                        <li><a href="user.php">User page</a></li>
                        <li><a href='form.php'>Custom clearence</a></li>
                        <li><a href='includes/logout.php'>Logout</a></li>

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
                        echo "<p>Fill in all fileds!</p>";
                    }
                    else if($_GET["error"] == "invalidusername"){
                        echo "<p>Use only letters or numbers in Username!</p>";
                    }
                    else if($_GET["error"] == "invalidemail"){
                        echo "<p>Choos a proper email!</p>";
                    }
                    else if($_GET["error"] == "passwordnotmatch"){
                        echo "<p>Passwords doesn't match!</p>";
                    }
                    else if($_GET["error"] == "passwordtoshort"){
                        echo "<p>Password too short, at least 7 characters!</p>";
                    }
                    else if($_GET["error"] == "usernametaken"){
                        echo "<p>Username already taken. Take another one!</p>";
                    }
                    else if($_GET["error"] == "stmtfailed"){
                        echo "<p>Something went wrong, try agian!</p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p>You have signed up a new employee!</p>";
                    }
                    
                }
            ?>  
            </section>
            <section>
                <!-- Form to register the user -->
                <form action="includes/register_employee_include.php" method="POST" class="login-email">
                    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register employee</p>
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

