<?php
    //Function to take input from the first form (form.php) and redirect to the right form
    if(isset($_POST['transport_type'])){
        $value = $_POST['transport_type'];
        switch($value){
            case 'export':
                header("location: ../form_export.php");
                exit();
                break;
            case 'import':
                header("location: ../form_import.php");
                exit();
                break;
            case 'custom':
                header("location: ../form_special.php");
                exit();
                break;
            case 'authorization_ENG':
                header("location: ../form_authorization_ENG.php");
                exit();
                break;
            case 'authorization_PL':
                header("location: ../form_authorization_PL.php");
                exit();
                break;
            case 'export_uproszczony':
                header("location: ../form_export_uproszczony.php");
                exit();
                break;
            case 'default':
                header("location: ../form.php");
                exit();
                break;
        }
    }else{
        header("location: ../form.php");
        exit();
    }
?>