<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava

$check = false;

foreach($checkUserAdmin as $x):
?>
    <?php if($x->pravo_id == 1): ?>
    
<?php  require 'partials/header.php';?>
<?php require 'partials/navbar.php';?>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Kreiraj turnir</h1>
        </div>
</div>

<br>
<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="create.tournament.php" method="POST">
                <div class="form-group">
                    <input type="text" name="naziv" placeholder="Naziv turnira" class="form-control" required><br>
                    <input type="date" name="datum" placeholder="Datum početka" class="form-control" required><br>
                    <input type="text" name="napomena" placeholder="Napomena" class="form-control"><br>
                </div>
                <button type="submit" name="kreirajTurnir">Kreiraj turnir</button>
            </form><br>
            <?php if(isset($_GET['tournamentInserted']) && $_GET['tournamentInserted']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si napravio turnir</div>
            <?php endif; ?>

            <?php if(isset($_GET['tournamentInserted']) && $_GET['tournamentInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje turnira nije uspelo!</div>
            <?php endif; ?>
        </div>

        <div class="col-3">
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
