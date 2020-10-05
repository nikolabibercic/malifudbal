<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava ili bloger prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava ili bloger prava

$check = false;

foreach($checkUserAdmin as $x):
    if($x->pravo_id == 1 or $x->pravo_id == 2): 

$drzavaId = $_POST['drzavaId'];
$statusDrzaveId = $_POST['statusDrzaveId'];

$country->updateCountryStatus($drzavaId,$statusDrzaveId);

header("Location: change.country.status.view.php?statusCountryChanged={$country->statusCountryChanged}");

$check = true; break; 

else: 

    $check == false; 

endif; 

endforeach; 

if(!$check){
    header('Location: index.php'); 
}
?>