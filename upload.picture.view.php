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
            <h1 class="display-4">Postavljanje fotografije</h1>
        </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6 text-center">
            <form action="upload.picture.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="pictureUpload" placeholder="Postavi fotografiju" class="form-control" ><br>
                </div>
                <button type="submit" name="pictureUpload">Postavi fotografiju</button>
            </form><br>

            <!-- srediti ova dva upita -->
            <?php if(isset($_GET['uploadPictureStatus']) && $_GET['uploadPictureStatus']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si postavio fotografiju</div>
            <?php endif; ?>

            <?php if(isset($_GET['uploadPictureStatus']) && $_GET['uploadPictureStatus']==false): ?>
                <div class="alert alert-danger" role="alert">Upload fotografije nije uspeo!</div>
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