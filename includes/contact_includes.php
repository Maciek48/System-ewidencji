<?php

if(isset($_POST['contact_submit'])){
    
    //dodanie daty
    date_default_timezone_set('Europe/Warsaw');
    //$username = $_SESSION["username"];
    
    $date = date("Y-m-d H:i:s");

    $subject = $_POST['subject'];
    $company_name = $_POST['company_name'];
    $eori = $_POST['eori_number'];
    $contact_email = $_POST['contact_email'];
    $contact_number = $_POST['contact_number'];
    $message = $_POST['message'];

    require_once 'config.php';
    require_once 'functions.php';

    if(emptyInputContact($subject, $company_name, $eori, $contact_email ,$message) !== false){
        header("location: ../contact.php?error=emptyinput");
        exit();
    }
    if(invalidEmail($contact_email) !== false){
        header("location: ../contact.php?error=invalidemail");
        exit();
    }
    
    createContact($conn, $date, $subject, $company_name, $eori, $contact_email,$contact_number ,$message);

}else{
    header("location: ../contact.php");
}


?>