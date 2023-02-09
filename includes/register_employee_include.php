<?php

if(isset($_POST['submit_register'])){
    
    $username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
    $role = "broker";

    require_once 'config.php';
    require_once 'functions.php';

    if(emptyInputSignupEmployee($username, $email, $password, $cpassword) !== false){
        header("location: ../add_employee.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($username) !== false){
        header("location: ../add_employee.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../add_employee.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password, $cpassword) !== false){
        header("location: ../add_employee.php?error=passwordnotmatch");
        exit();
    }
    if(passowrdLength($password)){
        header("location: ../add_employee.php?error=passwordtoshort");
        exit();
    }
    if(usernameExists($conn, $username, $email) !== false){
        header("location: ../add_employee.php?error=usernametaken");
        exit();
    }

    createEmployee($conn, $username, $email, $password, $role);


}else{
    header("location: ../add_employee.php");
}


?>