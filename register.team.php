<?php 

    require 'bootstrap.php';

    $nazivEkipe = $_POST['nazivEkipe'];
    $mesto = $_POST['mesto'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $nazivTurnira = $_POST['nazivTurnira'];
    $drzava = $_POST['drzava'];

    //Pozivam funckiju koja provera da li naziv ekipe vec postoji za izabrani turnir
    $proveraDuplikata = $team->checkDuplicateTeam($nazivEkipe, $nazivTurnira);

    if($proveraDuplikata){
        header("Location: register.team.view.php?duplicateTeamStatus={$team->duplicateTeamStatus}");
    }else{
        $team->insertTeam($nazivEkipe,$mesto,$telefon,$email,$nazivTurnira,$drzava);

        if($team->insertTeamStatus){
            header("Location: register.team.view.php?insertTeamStatus={$team->insertTeamStatus}");
        }else{
            header("Location: register.team.view.php");
        }
    }

?>