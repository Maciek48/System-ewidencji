<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(isset($_POST['authorization_ENG_submit'])){
    include_once 'includes/config.php';

    $username = $_SESSION['username'];

    //dodanie daty
    date_default_timezone_set('Europe/Warsaw');
    $ticket_date = date("Y-m-d H:i:s");

    //$invoice = $_FILES['invoice']['name'];
    $translation = $_SESSION['username'] . date("dmy") .$_FILES['translation']['name'];
    $translation_type = $_FILES['translation']['type'];
    $translation_size = $_FILES['translation']['size'];
    $translation_tem_loc = $_FILES['translation']['tmp_name'];

    $transfer = $_SESSION['username'] . date("dmy") .$_FILES['transfer_confirmation']['name'];
    $transfer_type = $_FILES['transfer_confirmation']['type'];
    $transfer_size = $_FILES['transfer_confirmation']['size'];
    $transfer_tem_loc = $_FILES['transfer_confirmation']['tmp_name'];

    $authorization = $_SESSION['username'] . date("dmy") .$_FILES['authorization']['name'];
    $authorization_type = $_FILES['authorization']['type'];
    $authorization_size = $_FILES['authorization']['size'];
    $authorization_tem_loc = $_FILES['authorization']['tmp_name'];

    $folder_name = $_SESSION['username'] . date("dmy");
    mkdir("upload/authorization/$folder_name", 0777, true);

    $location1 = "./upload/authorization/$folder_name/".$translation;
    $location2 = "./upload/authorization/$folder_name/".$transfer;
    $location3 = "./upload/authorization/$folder_name/".$authorization;

    if ($invoice_size > 5242880 || $awb_cmr_size > 5242880 || $add_doc_size > 5242880) { // Check file size 5mb or not
		echo "<script>alert('Woops! Files are too big. Maximum each file size allowed for upload 5 MB.')</script>";
	} else {

        move_uploaded_file($translation_tem_loc, $location1);
        move_uploaded_file($transfer_tem_loc, $location2);
        move_uploaded_file($authorization_tem_loc, $location3);

        $sql = "INSERT INTO `authorization`(`id`, `Username`, `TicketDate`, `FileTranslationName`, `FileTransferName`, `Authorization`, `FolderName`) VALUES ('[value-1]','$username','$ticket_date','$translation','$transfer','$authorization','$folder_name')";

        $result = mysqli_query($conn, $sql);

        if($result && isset($_POST['authorization_ENG_submit'])){
            header("Location: user.php");
            echo '<script>alert("Udalo sie dodac zgłoszenie do bazy danych")</script>';
            exit();
        }else{
            echo '<script>alert("Nie udalo sie dodac zgłoszenie do bazy danych")</script>';
            header("Location: user.php");
            exit();
        }
        
	}

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
                    <a href="#" class="toggle-button">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                <div class="navbar-links">
                    <ul>
                        <li><a href="user.php">User page</a></li>
                        <li><a href="form.php">Custom clearence</a></li>
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

        <div class="form_export">
            <div class="display_form">
                <!-- First form for client to choos what type of transport he/she want to make -->
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <h1>Here you can choose the proper file to download</h1><br>
                        <table class="export_form">
                            <thead>
                                <tr>
                                    <td><label style="font-size: 1.2rem; font-weight: 600; text-align: flex-start; margin-left: 0; padding-left: 0;">Direct one-time authorization</label></td>
                                    <td><label style="font-size: 1.2rem; font-weight: 600; text-align: flex-start; margin-left: 0; padding-left: 0;">Direct permament authorization</label></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="assets/Upowaznienia/direct_Authorisation_ENG_PL_WEGA-A_one-time.pdf" download>Download File</a></td>
                                    <td><a href="assets/Upowaznienia/direct_Authorisation_ENG_PL_WEGA-A_permanent.pdf" download>Download File</a></td>
                                </tr>
                                <tr>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td colspan="4"><label style="font-size: 1.2rem; font-weight: 600; text-align: flex-start; margin-left: 0; padding-left: 0;">For each authorization, a stamp duty in the amount of PLN 17 must be made, giving the name of the company in the transfer title.<br>
                                        Bank transfer details:<br>
                                        Name of acceptance: Urząd Miasta Poznania<br>
                                        Account number: 94 1020 4027 0000 1602 1262 0763</label>  
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td colspan="4"><label style="font-size: 1.2rem; font-weight: 600; text-align: flex-start; margin-left: 0; padding-left: 0;">The authorization must be signed by the person / persons indicated in the National Court Register / Central Register and Information on Economic Activity.</label></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><label style="font-size: 1.2rem; font-weight: 600; text-align: flex-start; margin-left: 0; padding-left: 0;">In the case of an entity not registered in Poland, a sworn translation of the registration documents must be additionally attached,
                                        in order to verify that the authorizations have been signed by an authorized person.  <input type="file" name="translation"></label></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><label style="font-size: 1.2rem; font-weight: 600; text-align: flex-start; margin-left: 0; padding-left: 0;">Please attach a scan of the confirmation of the stamp duty transfer. <input type="file" name="transfer_confirmation" required></label></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><label style="font-size: 1.2rem; font-weight: 600; text-align: flex-start; margin-left: 0; padding-left: 0;">Here, attach the previously downloaded file with the given authorization.  <input type="file" name="authorization" required></label></td>
                                </tr>
                                <tr>
                                     <td> </td>
                                </tr>
                            </tbody>
                        </table><br>

                        <label>
                                <button type="submit" class="transport_submit" name="authorization_ENG_submit">Submit</button>
                        </label>
                    </div>
                </form>
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

