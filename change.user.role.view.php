
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
                    <h1>Promena prava korisnika:</h1><br>
                    <form action="change.user.role.php" method="POST">
                        <div class="form-group">
                            Lista korisnika koji imaju prava:<br>
                            <select name="korisnikPravoId" id="">
                                <?php  $result = $role->selectUserRole(); foreach($result as $x):  ?>
                                    <option value=<?php echo $x->korisnik_pravo_id; ?> class="form-control"><?php echo $x->naziv_korisnika.' - '.$x->naziv_prava; ?></option>
                                <?php endforeach; ?>
                            </select><br><br>

                            Prava:<br>
                            <select name="pravoId" id="">
                                <?php  $result = $role->selectRoles(); foreach($result as $x):  ?>
                                    <option value=<?php echo $x->pravo_id; ?> class="form-control"><?php echo $x->naziv_prava; ?></option>
                                <?php endforeach; ?>
                            </select><br><br>
                        </div>
                        <button type="submit" name="promeniPravo">Promeni pravo</button>
                    </form><br>
                    <?php if(isset($_GET['roleUpdateChanged']) && $_GET['roleUpdateChanged']==true): ?>
                        <div class="alert alert-success" role="alert">Uspešno si promenio pravo</div>
                    <?php endif; ?>

                    <?php if(isset($_GET['roleUpdateChanged']) && $_GET['roleUpdateChanged']==false): ?>
                        <div class="alert alert-danger" role="alert">Promena prava nije uspela!</div>
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
    

