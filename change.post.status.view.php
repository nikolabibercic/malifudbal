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
            <h1 class="display-4">Promena statusa posta</h1>
        </div>
</div>

<br>


<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="change.post.status.php" method="POST">
                <div class="form-group">
                    Lista postova i trenutni statusi:<br>
                    <select name="porukaId" id="">
                        <?php  $result = $post->selectAllPosts(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->poruka_id; ?> class="form-control"><?php echo $x->naslov.' - '.$x->status_poruke; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Novi status:<br>
                    <select name="statusPoruke" id="">
                        <?php  $result = $post->selectPostStatuses(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->status_poruke_id; ?> class="form-control"><?php echo $x->status_poruke; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>
                <button type="submit" name="promeniStatusTurnira">Promeni status</button>
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