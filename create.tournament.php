<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja kontrolise da li user ima admin pravo

if(!$checkUserAdmin){
    header('Location: index.php');
}

$naziv = $_POST['naziv'];
$datum = $_POST['datum'];
$napomena = $_POST['napomena'];

$tournament->insertTournament($naziv,$datum,$napomena);

if($tournament->tournamentInserted){
    header("Location: create.tournament.view.php?tournamentInserted={$tournament->tournamentInserted}");
}else{
    header("Location: create.tournament.view.php");
}

?>
    
