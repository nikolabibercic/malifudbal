<?php 

    require 'bootstrap.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_SESSION['korisnik'])){
        header('Location: index.php');
    }else{
        $user->loginUser($email,$password);
    }


?>