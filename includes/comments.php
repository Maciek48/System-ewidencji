<?php
include_once 'config.php';

if(isset($_POST['submit_comment'])){
    $id_zgloszenia = $_POST['id_zgloszenia'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $message = $_POST['message'];
   
    $sql = "INSERT INTO `comments`(`id`, `idZgloszenia`, `data`, `nazwaUzytkownika`, `tresc`) VALUES ('[value-1]','$id_zgloszenia','$date','$author','$message')";
    $result = mysqli_query($conn, $sql); 

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }else{
        header("location: ../");
        exit();
    }

}


?>