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
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="create.tournament.view.php" style="color:white;">Kreiraj turnir</a></button>             
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                        <?php foreach($checkUserAdmin as $x): if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="change.tournament.status.view.php" style="color:white;">Status turnira</a></button>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1 or $x->pravo_id == 2): ?>
                            <button type="button" class="btn btn-secondary"><a href="create.post.view.php" style="color:white;">Kreiraj post</a></button>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1 or $x->pravo_id == 2): ?>
                            <button type="button" class="btn btn-secondary"><a href="change.post.status.view.php" style="color:white;">Status posta</a></button>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="change.user.role.view.php" style="color:white;">Promena prava</a></button>
                        <?php break; endif; ?>
                        <?php endforeach; ?>

                        <?php foreach($checkUserAdmin as $x):  if($x->pravo_id == 1): ?>
                            <button type="button" class="btn btn-secondary"><a href="add.user.role.view.php" style="color:white;">Dodela prava</a></button>
                        <?php break; endif; ?>
                        <?php endforeach; ?>
                    </div>
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


