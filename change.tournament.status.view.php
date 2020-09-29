
<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja kontrolise da li user ima admin pravo

if(!$checkUserAdmin){
    header('Location: index.php');
}
?>
    
<?php  require 'partials/header.php';?>
<?php require 'partials/navbar.php';?>
<br>
<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <h1>Promena statusa turnira:</h1><br>
            <form action="change.tournament.status.php" method="POST">
                <div class="form-group">
                    Lista turnira i trenutni statusi:<br>
                    <select name="turnirId" id="">
                        <?php  $result = $tournament->selectAllTournaments(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->turnir_id; ?> class="form-control"><?php echo $x->naziv_turnira.' - '.$x->status_turnira; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Novi status:<br>
                    <select name="statusTurnira" id="">
                        <?php  $result = $tournament->selectTournamentStatuses(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->status_turnira_id; ?> class="form-control"><?php echo $x->status_turnira; ?></option>
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

<?php   require 'partials/footer.php';?>