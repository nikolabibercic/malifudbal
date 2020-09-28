
<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja kontrolise da li user ima admin pravo

if(!$checkUserAdmin){
    header('Location: index.php');
}
?>
    
<?php  require 'partials/header.php';?>
<?php require 'partials/navbar.php';?>
<br>
<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <h1>Kreiraj turnir:</h1><br>
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
        </div>

        <div class="col-3">
        </div>
    </div>
</div>

<?php   require 'partials/footer.php';?>
