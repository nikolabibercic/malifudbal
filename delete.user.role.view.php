
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
                <h1 class="display-4">Obriši prava korisnika</h1>
            </div>
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-3">
                </div>

                <div class="col-6">
                    <form action="delete.user.role.php" method="POST">
                        <div class="form-group">
                            Lista korisnika koji imaju prava:<br>
                            <select name="korisnikPravoId" id="">
                                <?php  $result = $role->selectUserRole(); foreach($result as $x):  ?>
                                    <option value=<?php echo $x->korisnik_pravo_id; ?> class="form-control"><?php echo $x->naziv_korisnika.' - '.$x->naziv_prava; ?></option>
                                <?php endforeach; ?>
                            </select><br><br>
                        </div>
                        <button type="submit" name="obrisiPravo">Obriši pravo</button>
                    </form><br>
                    <?php if(isset($_GET['roleDeleteChanged']) && $_GET['roleDeleteChanged']==true): ?>
                        <div class="alert alert-success" role="alert">Uspešno si obrisao pravo</div>
                    <?php endif; ?>

                    <?php if(isset($_GET['roleDeleteChanged']) && $_GET['roleDeleteChanged']==false): ?>
                        <div class="alert alert-danger" role="alert">Brisanje prava nije uspelo!</div>
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
    

