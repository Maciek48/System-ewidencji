<?php

if(isset($_POST['submit_register'])){
    $role = "user";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $company_name = $_POST['company_name'];
    $company_address1 = $_POST['company_address1'];
    $company_address2 = $_POST['company_address2'];
    $city = $_POST['city'];
    $postal_code= $_POST['postal_code'];
    $country = $_POST['country'];
    $email_company = $_POST['email_company'];
    $phone = $_POST['phone'];
    $vat_accounting = $_POST['vat_accounting'];
    $eori_number = $_POST['eori_number'];
    $company_reg_no = $_POST['company_reg_no'];
    $duty_deferment_account_no = $_POST['duty_deferment_account_no'];
    $currency = $_POST['currency'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $position_in_company = $_POST['position_in_company'];
    $email = $_POST['email'];
    $consent = $_POST['consent'];
    


    /*
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
    $role = "user";*/

//$username, $email, $password, $cpassword, $company_name, $company_address1,$company_address2, $city, $country, $phone ,$vat_accounting , $eori_number , $company_reg_no, $duty_deferment_account_no, $currency , $first_name , $last_name, $position_in_company , $email_company,$consent

    require_once 'config.php';
    require_once 'functions.php';

    if(emptyInputSignup($username, $email, $password, $cpassword, $company_name, $company_address1,$company_address2, $city, $country, $phone ,$vat_accounting , $eori_number , $currency , $first_name , $last_name, $position_in_company , $email_company,$consent) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($username) !== false){
        header("location: ../register.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password, $cpassword) !== false){
        header("location: ../register.php?error=passwordnotmatch");
        exit();
    }
    if(passowrdLength($password)){
        header("location: ../register.php?error=passwordtoshort");
        exit();
    }
    if(usernameExists($conn, $username, $email) !== false){
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $email, $password, $role, $company_name, $company_address1,$company_address2, $city, $country, $email_company, $phone ,$vat_accounting , $eori_number , $company_reg_no, $duty_deferment_account_no, $currency , $first_name , $last_name, $position_in_company ,$consent);


}else{
    header("location: ../register.php");
}


?>