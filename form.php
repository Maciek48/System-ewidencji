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
                    <div class="welcome_text">
                        <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
                    </div>
                </div>
                    <a href="#" class="toggle-button">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                <div class="navbar-links">
                    <ul>
                        <li><a href="user.php">User page</a></li>
                        <li><a href="includes/logout.php">Logout</a></li>
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
        <!-- Separating line -->
        <div class="line"></div>
        <!-- Main text -->
        <div class="form">
            <?php
                include_once 'includes/config.php';
                $username = $_SESSION['username'];
                $role = checkRole($username, $conn);
                switch ($role) {
                    case "user":
            ?>

                <!-- First form for client to choos what type of transport he/she want to make -->
                <form action="includes/form_choice.php" method="POST">
                    <div>
                        <h1>Make custom declaration</h1>
                        <h2>What transport you need?</h2>
                        <label>
                            <h3>Make export declaration</h2><input type="radio" name="transport_type" value="export">
                            <span></span>
                        </label>
                        <label>
                            <h3>Make import declaration</h3><input type="radio" name="transport_type" value="import">
                            <span></span>
                        </label>
                        <!--
                        <label>
                            <h3>Make declaration in special customs procedures</h3><input type="radio" name="transport_type" value="custom"> 
                                <span></span>
                        </label>
                        -->
                        <!-- 4 opcja -->
                        <label>
                            <h3>Authorization PL</h3><input type="radio" name="transport_type" value="authorization_PL">
                                <span></span>
                        </label>
                        <label>
                            <h3>Authorization ENG</h3><input type="radio" name="transport_type" value="authorization_ENG"></br>
                                <span></span>
                        </label>
                        <label>
                            <button type="submit" class="transport_submit" name="transport_submit">Submit</button>
                        </label>
                        
                    </div>
                </form>
            <?php
                break;

                case "broker":
            ?>
                <form action="includes/form_choice.php" method="POST">
                    <div>
                        <h1>Make custom declaration</h1>
                        <h2>What transport you need?</h2>
                        <label>
                            <h3>Make export declaration</h2><input type="radio" name="transport_type" value="export_uproszczony" required>
                            <span></span>
                        </label>
                        <!--
                        <label>
                            <h3>Make import declaration</h3><input type="radio" name="transport_type" value="import">
                            <span></span>
                        </label>
                        <!--
                        <label>
                            <h3>Make declaration in special customs procedures</h3><input type="radio" name="transport_type" value="custom"> 
                                <span></span>
                        </label>
                        -->
                        <!-- 4 opcja -->
                        <!--
                        <label>
                            <h3>Authorization PL</h3><input type="radio" name="transport_type" value="authorization_PL">
                                <span></span>
                        </label>
                        <label>
                            <h3>Authorization ENG</h3><input type="radio" name="transport_type" value="authorization_ENG"></br>
                                <span></span>
                        </label>
                        <label>
                            <button type="submit" class="transport_submit" name="transport_submit">Submit</button>
                        </label>-->
                        
                    </div>
                </form>
            <?php
                break;
                }
            ?>
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

