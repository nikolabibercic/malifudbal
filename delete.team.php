<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava

$check = false;

foreach($checkUserAdmin as $x):
    if($x->pravo_id == 1): 
        
        $ekipakId = $_POST['ekipaId'];

        $team->deleteTeam($ekipakId);

        header("Location: delete.team.view.php?teamDeleteChanged={$team->teamDeleteChanged}");
 
        $check = true; break; 

    else: 

        $check == false; 

    endif; 

    endforeach; 

    if(!$check){
        header('Location: index.php'); 
    }
?>