<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin ili bloger prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin ili bloger prava

$check = false;

foreach($checkUserAdmin as $x):
?>
    <?php if($x->pravo_id == 1 or $x->pravo_id == 2): ?>

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
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="create.tournament.view.php" style="color:white;">Kreiraj turnir</a></button>             

                            <button type="button" class="btn btn-secondary"><a href="change.tournament.status.view.php" style="color:white;">Status turnira</a></button><br><br>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
        
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1 or $x->pravo_id == 2): ?>
                            <button type="button" class="btn btn-secondary"><a href="create.post.view.php" style="color:white;">Kreiraj post</a></button>

                            <button type="button" class="btn btn-secondary"><a href="change.post.status.view.php" style="color:white;">Status posta</a></button><br><br>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>

        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="change.user.role.view.php" style="color:white;">Promena prava</a></button>

                            <button type="button" class="btn btn-secondary"><a href="add.user.role.view.php" style="color:white;">Dodela prava</a></button>

                            <button type="button" class="btn btn-secondary"><a href="delete.user.role.view.php" style="color:white;">Brisanje prava</a></button><br><br>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>

        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="delete.user.view.php" style="color:white;">Brisanje korisnika</a></button><br><br>           

                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>

        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="delete.team.view.php" style="color:white;">Brisanje ekipe</a></button><br><br>             

                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>

        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1 or $x->pravo_id == 2): ?>
                            <button type="button" class="btn btn-secondary"><a href="add.country.view.php" style="color:white;">Dodaj državu</a></button>

                            <button type="button" class="btn btn-secondary"><a href="change.country.status.view.php" style="color:white;">Status države</a></button><br><br>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>

        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="change.team.payment.view.php" style="color:white;">Evidentiraj uplatu</a></button><br><br>

                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>

        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="text-center">

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1 or $x->pravo_id == 2): ?>
                            <button type="button" class="btn btn-secondary"><a href="upload.picture.view.php" style="color:white;">Postavi fotografiju</a></button>

                        <?php break; endif; ?>
                        <?php endforeach; ?>

                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>

<?php   
            require 'partials/footer.php';
            $check = true; break; 

            else: 

            $check == false; 

            endif; 

            endforeach; 

            if(!$check){
                header('Location: index.php'); 
            }
        ?>


