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
<br>
<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <h1>Brisanje korisnika:</h1><br>
            <form action="delete.user.php" method="POST">
                <div class="form-group">
                    Lista svih korisnika:<br>
                    <select name="korisnikId" id="">
                        <?php  $result = $role->selectAllUsers(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->korisnik_id; ?> class="form-control"><?php echo $x->naziv_korisnika; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>
                <button type="submit" name="obrisiKorisnika">Obriši korisnika</button>
            </form><br>
            <?php if(isset($_GET['userDeleteChanged']) && $_GET['userDeleteChanged']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si obrisao korisnika</div>
            <?php endif; ?>

            <?php if(isset($_GET['userDeleteChanged']) && $_GET['userDeleteChanged']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje korisnika nije uspelo!</div>
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