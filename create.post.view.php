
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
            <h1>Kreiraj post:</h1><br>
            <form action="create.post.php" method="POST">
                <div class="form-group">
                    <input type="text" name="naslov" placeholder="Naslov posta" class="form-control" required><br>
                    <textarea class="form-control" name="tekst" placeholder="Tekst posta" rows="20"></textarea><br>
                </div>
                <button type="submit" name="kreirajPost">Kreiraj post</button>
            </form><br>
            <?php if(isset($_GET['postInserted']) && $_GET['postInserted']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si napravio post</div>
            <?php endif; ?>

            <?php if(isset($_GET['postInserted']) && $_GET['postInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje posta nije uspelo!</div>
            <?php endif; ?>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>

<?php   require 'partials/footer.php';?>
