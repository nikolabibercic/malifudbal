<?php 

    require 'bootstrap.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->loginUser($email,$password);

?>