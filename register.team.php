<?php 

    require 'bootstrap.php';

    $mesto = $_POST['mesto'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $drzava = $_POST['drzava'];
    $nazivEkipe = $_POST['nazivEkipe'];
    $turnirId = $_POST['turnirId'];

    $proveraDuplikata = $team->checkDuplicateTeam($nazivEkipe, $turnirId);

    //Pozivam funckiju koja provera da li naziv ekipe vec postoji za izabrani turnir
    if($proveraDuplikata){
        header("Location: register.team.view.php?duplicateTeamStatus={$team->duplicateTeamStatus}");
    }

    $team->insertTeam($nazivEkipe,$mesto,$telefon,$email,$turnirId,$drzava);

    //Pozivam funckiju koja vraca ID ekipa koja je importovana
    $team1 = $team->checkTeamId($_POST['nazivEkipe'],$_POST['turnirId']);
    $ekipaId = $team1->ekipa_id;

    var_dump($_POST['igrac10Ime']);

    for($i=1;$i<=10;$i++){
        if( strlen($_POST['igrac'.$i.'Ime'])>0 and strlen($_POST['igrac'.$i.'Prezime'])>0 ){
            $player->insertPlayer($_POST['igrac'.$i.'Ime'],$_POST['igrac'.$i.'Prezime'],$ekipaId);
        }else{
            continue;
        }
    }

    header("Location: register.team.view.php?insertTeamStatus=true");

?>