<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava ili bloger prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava ili bloger prava

$check = false;

foreach($checkUserAdmin as $x):
    if($x->pravo_id == 1 or $x->pravo_id == 2): 

$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];

$post->insertPost($naslov,$tekst,$korisnikId);

header("Location: create.post.view.php?postInserted={$post->postInserted}");

$check = true; break; 

else: 

    $check == false; 

endif; 

endforeach; 

if(!$check){
    header('Location: index.php'); 
}
?>
    
