<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava ili bloger prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava ili bloger prava

$check = false;

foreach($checkUserAdmin as $x):
    if($x->pravo_id == 1 or $x->pravo_id == 2): 

$porukaId = $_POST['porukaId'];
$statusPoruke = $_POST['statusPoruke'];

$post->updatePostStatus($porukaId,$statusPoruke);

header("Location: change.post.status.view.php?statusChanged={$post->statusChanged}");

$check = true; break; 

else: 

    $check == false; 

endif; 

endforeach; 

if(!$check){
    header('Location: index.php'); 
}
?>