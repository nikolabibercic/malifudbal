<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja kontrolise da li user ima admin pravo

if(!$checkUserAdmin){
    header('Location: index.php');
}

$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];

$post->insertPost($naslov,$tekst,$korisnikId);

if($post->postInserted){
    header("Location: create.post.view.php?postInserted={$post->postInserted}");
}else{
    header("Location: create.post.view.php");
}

?>
    
