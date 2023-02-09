<?php 

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
                <div class="brand-title">
                    <a href="index.php"><img src="assets/logo_wega_final.png" alt="logo"></a>
                </div>
                <div class="navbar-links">
                    <?php
                        include_once 'includes/config.php';
                        $username = $_SESSION['username'];
                        $role = checkRole($username, $conn);
                        switch($role){
                            case "user":
                                echo "
                                    <ul>
                                        <li><a href='user.php'>User page</a></li>
                                        <li><a href='show_authorization.php'>Authorization</a></li>
                                        <li><a href='form.php'>Custom clearence</a></li>
                                        <li><a href='includes/logout.php'>Logout</a></li>
                                    </ul>    
                                ";
                            break;

                            case "admin":
                                echo "
                                    <ul>
                                        <li><a href='user.php'>User page</a></li>
                                        <li><a href='show_authorization.php'>Authorization</a></li>
                                        <li><a href='form.php'>Custom clearence</a></li>
                                        <li><a href='includes/logout.php'>Logout</a></li>
                                    </ul>    
                                ";
                            break;
                        }
                    ?>
                </div>
            </nav>
        </header>
        <!-- Language images -->
        <!--
        <div class="languages">
            <a href="index.php"><img src="assets/icon-pl.png" alt="Ikona PL"></a>
            <a href="index_eng.php"><img src="assets/icon-eng.png" alt="Ikona ENG"></a>
        </div>-->
        <!-- Separating line -->
        <div class="line"></div>
        <!-- Main text -->
        <div>
            
        </div>
        <div class="background_table">
            <div class="display_table">
                <?php
                    include_once 'includes/config.php';
                    $username = $_SESSION['username'];
                    showTicketAuth($username, $conn); ?>
                    
            </div>
        </div>
        <!-- Separating line -->
        <div class="line"></div>
    </body>
    <footer>
        <!-- Footer contact -->
        <div class="stopka">
            <h5>Copyright &copy; ACWEGA 2022</h5>
        </div>
        
    </footer>
</html>

