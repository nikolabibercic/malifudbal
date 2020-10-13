<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin prava

$check = false;

foreach($checkUserAdmin as $x):
?>
    <?php if($x->pravo_id == 1 or $x->pravo_id == 2): ?>
    
<?php  require 'partials/header.php';?>
<?php require 'partials/navbar.php';?>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Dodavanje države</h1>
        </div>
</div>

<br>


<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="add.country.php" method="POST">
                <div class="form-group">
                    <input type="text" name="drzava" placeholder="Država" class="form-control" required><br>
                </div>
                <button type="submit" name="dodajDrzavu">Dodaj državu</button>
            </form><br>
            <?php if(isset($_GET['countryAddChanged']) && $_GET['countryAddChanged']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si dodao državu</div>
            <?php endif; ?>

            <?php if(isset($_GET['countryAddChanged']) && $_GET['countryAddChanged']==false): ?>
                <div class="alert alert-danger" role="alert">Dodavanje države nije uspelo!</div>
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