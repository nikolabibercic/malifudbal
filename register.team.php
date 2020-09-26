<?php 

    require 'bootstrap.php';

    $nazivEkipe = $_POST['nazivEkipe'];
    $mesto = $_POST['mesto'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $nazivTurnira = $_POST['nazivTurnira'];

    $team->insertTeam($nazivEkipe,$mesto,$telefon,$email,$nazivTurnira);

    if($team->insertTeamStatus){
        header("Location: register.team.view.php?insertTeamStatus={$team->insertTeamStatus}");
    }else{
        header("Location: register.team.view.php");
    }



?>