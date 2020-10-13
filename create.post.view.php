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
    
<?php  require 'partials/header.php';?>
<?php require 'partials/navbar.php';?>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Kreiraj post</h1>
        </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6 text-center">
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