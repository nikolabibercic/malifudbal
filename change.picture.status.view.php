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
            <h1 class="display-4">Promena statusa fotografije</h1>
        </div>
</div>

<br>


<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="change.picture.status.php" method="POST">
                <div class="form-group">
                    Lista fotografija i trenutni statusi:<br>
                    <select name="fotografijaId" id="">
                        <?php  $result = $picture->selectAllPictures(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->fotografija_id; ?> class="form-control"><?php echo $x->naziv_fotografije.' - '.$x->status_fotografije; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Novi status:<br>
                    <select name="statusFotografijeId" id="">
                        <?php  $result = $picture->selectPictureStatuses(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->status_fotografije_id; ?> class="form-control"><?php echo $x->status_fotografije; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>
                <button type="submit" id="promeniStatusFotografije" name="promeniStatusFotografije">Promeni status</button>
            </form><br>
            <?php if(isset($_GET['statusChanged']) && $_GET['statusChanged']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si promenio status</div>
            <?php endif; ?>

            <?php if(isset($_GET['statusChanged']) && $_GET['statusChanged']==false): ?>
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

<script>
    var pictureUpload = document.getElementById('promeniStatusFotografije');

    addEventListener('keydown',enter);

    function enter(e){
        if(e.which == 13){
            promeniStatusFotografije.click();
        };
    }
</script>