<?php

    require 'bootstrap.php';
    //Provera da li korisnik ima admin prava
    $korisnikId = $_SESSION['korisnik']->korisnik_id;
    $checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja kontrolise da li user ima admin pravo
    
    if(!$checkUserAdmin){
        header('Location: index.php');
    }
?>
    <?php require 'partials/header.php'; ?>
    <?php require 'partials/navbar.php'; ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Admin stranica</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-2">
            </div>

            <div class="col-8">
                <!-- <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><a class="btn btn-primary" href="create.tournament.view.php" role="button">Kreiraj turnir</a></li>
                    <li class="list-group-item"><a class="btn btn-primary" href="" role="button">Status turnira</a></li>
                    <li class="list-group-item"><a class="btn btn-primary" href="create.post.view.php" role="button">Kreiraj post</a></li>
                    <li class="list-group-item"><a class="btn btn-primary" href="" role="button">Status posta</a></li>
                </ul>-->
                <div class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary"><a href="create.tournament.view.php" style="color:white;">Kreiraj turnir</a></button>
                        <button type="button" class="btn btn-secondary"><a href="change.tournament.status.view.php" style="color:white;">Status turnira</a></button>
                        <button type="button" class="btn btn-secondary"><a href="create.post.view.php" style="color:white;">Kreiraj post</a></button>
                        <button type="button" class="btn btn-secondary"><a href="" style="color:white;">Status posta</a></button>
                        <button type="button" class="btn btn-secondary"><a href="" style="color:white;">Prava</a></button>
                    </div>
                </div>
            </div>

            <div class="col-2">
            </div>
        </div>
    </div>

    <?php require 'partials/footer.php'; ?>


