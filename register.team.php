<?php 

    require 'bootstrap.php';

    $nazivEkipe = $_POST['nazivEkipe'];
    $turnirId = $_POST['turnirId'];

    $igrac1Ime = $_POST['igrac1Ime'];
    $igrac1Prezime = $_POST['igrac1Prezime'];

    $igrac2Ime = $_POST['igrac2Ime'];
    $igrac2Prezime = $_POST['igrac2Prezime'];

    $igrac3Ime = $_POST['igrac3Ime'];
    $igrac3Prezime = $_POST['igrac3Prezime'];

    $igrac4Ime = $_POST['igrac4Ime'];
    $igrac4Prezime = $_POST['igrac4Prezime'];

    $igrac5Ime = $_POST['igrac5Ime'];
    $igrac5Prezime = $_POST['igrac5Prezime'];

    $igrac6Ime = $_POST['igrac6Ime'];
    $igrac6Prezime = $_POST['igrac6Prezime'];

    $igrac7Ime = $_POST['igrac7Ime'];
    $igrac7Prezime = $_POST['igrac7Prezime'];

    $igrac8Ime = $_POST['igrac8Ime'];
    $igrac8Prezime = $_POST['igrac8Prezime'];

    $igrac9Ime = $_POST['igrac9Ime'];
    $igrac9Prezime = $_POST['igrac9Prezime'];

    $igrac10Ime = $_POST['igrac10Ime'];
    $igrac10Prezime = $_POST['igrac10Prezime'];

   //echo $_POST['nazivEkipe'];
   //echo $_POST['nazivTurnira'];

   $team = $team->checkTeamId($_POST['nazivEkipe'],$_POST['turnirId']);
    $ekipaId = $team->ekipa_id;

        if(isset($_POST['igrac1Ime']) and isset($_POST['igrac1Prezime'])){
            $player->insertPlayer($igrac1Ime,$igrac1Prezime,$ekipaId);
        } 

        //header("Location: register.team.view.php?insertTeamStatus={$team->insertTeamStatus}");


?>