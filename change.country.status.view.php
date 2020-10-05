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
<br>
<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <h1>Promena statusa države:</h1><br>
            <form action="change.country.status.php" method="POST">
                <div class="form-group">
                    Lista država i trenutni statusi:<br>
                    <select name="drzavaId" id="">
                        <?php  $result = $country->selectAllCountries(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->drzava_id; ?> class="form-control"><?php echo $x->naziv_drzave.' - '.$x->status_drzave; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Novi status:<br>
                    <select name="statusDrzaveId" id="">
                        <?php  $result = $country->countryStatuses(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->status_drzave_id; ?> class="form-control"><?php echo $x->status_drzave; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>
                <button type="submit" name="promeniStatusDrzave">Promeni status države</button>
            </form><br>
            <?php if(isset($_GET['statusCountryChanged']) && $_GET['statusCountryChanged']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si promenio status</div>
            <?php endif; ?>

            <?php if(isset($_GET['statusCountryChanged']) && $_GET['statusCountryChanged']==false): ?>
                <div class="alert alert-danger" role="alert">Promena statusa nije uspela!</div>
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