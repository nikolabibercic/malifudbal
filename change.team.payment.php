<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava ili bloger prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava ili bloger prava

$check = false;

foreach($checkUserAdmin as $x):
    if($x->pravo_id == 1): 

$ekipaId = $_POST['ekipaId'];
$statusUplateId = $_POST['statusUplateId'];

$payment->updateTeamPaymentStatus($ekipaId,$statusUplateId);

header("Location: change.team.payment.view.php?paymentStatusChanged={$payment->paymentStatusChanged}");

$check = true; break; 

else: 

    $check == false; 

endif; 

endforeach; 

if(!$check){
    header('Location: index.php'); 
}
?>