<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava

$check = false;

foreach($checkUserAdmin as $x):
    if($x->pravo_id == 1): 

$turnirId = $_POST['turnirId'];
$statusTurnira = $_POST['statusTurnira'];

$tournament->updateTournamentStatus($turnirId,$statusTurnira);

header("Location: change.tournament.status.view.php?statusChanged={$tournament->statusChanged}");

$check = true; break; 

else: 

    $check == false; 

endif; 

endforeach; 

if(!$check){
    header('Location: index.php'); 
}
?>