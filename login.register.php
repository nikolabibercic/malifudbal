<?php 

    require 'bootstrap.php';

    //Ako je kliknuo na uloguj_se radi logovanje
    if(isset($_POST['uloguj_se'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        //Ako korisnik vec ulogovan salje ga na index stranicu
        if(isset($_SESSION['korisnik'])){
            header('Location: index.php');
        }else{
            $user->loginUser($email,$password);
        }
    }

    //Ako je kliknuo na registruj_se radi registraciju
    if(isset($_POST['registruj_se'])){
        $nazivKorisnika = $_POST['nazivKorisnika'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Ako korisnik vec ulogovan salje ga na index stranicu
        if(isset($_SESSION['korisnik'])){
            header('Location: index.php');
        }else{
            $user->registerUser($nazivKorisnika,$email,$password);
            header("Location: login.register.view.php?registerUserStatus={$user->registerUserStatus}");
        }
    }


?>