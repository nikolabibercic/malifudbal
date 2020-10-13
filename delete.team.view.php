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
            <h1 class="display-4">Brisanje ekipe</h1>
        </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6 text-center">
            <form action="delete.team.php" method="POST">
                <div class="form-group">
                    Lista svih ekipa:
                    <select name="ekipaId" id="">
                        <?php  $result = $team->selectAllTeams(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->ekipa_id; ?> class="form-control"><?php echo $x->naziv_ekipe.' - '.$x->naziv_turnira; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>
                <button type="submit" name="obrisiEkipu">Obriši ekipu</button>
            </form><br>
            <?php if(isset($_GET['teamDeleteChanged']) && $_GET['teamDeleteChanged']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si obrisao ekipu</div>
            <?php endif; ?>

            <?php if(isset($_GET['teamDeleteChanged']) && $_GET['teamDeleteChanged']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje ekipe nije uspelo!</div>
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