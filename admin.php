<?php

    require 'bootstrap.php';

    $korisnikId = $_SESSION['korisnik']->korisnik_id;
    $checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja kontrolise da li user ima admin pravo
    

    if($checkUserAdmin){
        header('Location: admin.view.php');
    }else{
        header('Location: index.php');
    }

?>
