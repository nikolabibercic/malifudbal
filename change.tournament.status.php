<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja kontrolise da li user ima admin pravo

if(!$checkUserAdmin){
    header('Location: index.php');
}

$turnirId = $_POST['turnirId'];
$statusTurnira = $_POST['statusTurnira'];

$tournament->updateTournamentStatus($turnirId,$statusTurnira);

header("Location: change.tournament.status.view.php?statusChanged={$tournament->statusChanged}");

?>