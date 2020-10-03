<?php require 'bootstrap.php'; ?>

<?php require 'partials/header.php'; ?>
<?php require 'partials/navbar.php'; ?>
<br>

<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <div class="text-center"><h1>Prijava ekipe</h1></div>    
        </div>
        <div class="col-3">
            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="register.team.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nazivEkipe" placeholder="Naziv ekipe *" class="form-control" required><br>
                    Država:<br>
                    <select name="drzava" id="">
                        <?php  $result = $country->selectActiveCountries(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->drzava_id; ?> class="form-control"><?php echo $x->naziv_drzave ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <input type="text" name="mesto" placeholder="Mesto *" class="form-control" required><br>
                    <input type="text" name="telefon" placeholder="Kontakt telefon *" class="form-control" required><br>
                    <input type="email" name="email" placeholder="Kontakt email" class="form-control"><br>
                    Turnir:<br>
                    <select name="nazivTurnira" id="">
                        <?php  $result = $tournament->selectActiveTournaments(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->turnir_id; ?> class="form-control"><?php echo $x->naziv_turnira; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>
                <button type="submit" name="prijaviEkipu">Prijavi ekipu</button>
            </form>
            <br>
            <!-- Ako je status inserta ekipe TRUE bice poslato preko GET metode i kreirace se poruka za uspesnu registraciju -->
            <?php if(isset($_GET['insertTeamStatus']) && $_GET['insertTeamStatus']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si registrovao ekipu!</div>
            <?php endif; ?>

            <?php if(isset($_GET['insertTeamStatus']) && $_GET['insertTeamStatus']==false): ?>
                <div class="alert alert-danger" role="alert">Registracija nije uspela!</div>
            <?php endif; ?>
            
            <!-- Ako vec postoji ekipa sa istim nazivom izlazi poruka da se promeni naziv ekipe -->
            <?php if(isset($_GET['duplicateTeamStatus']) && $_GET['duplicateTeamStatus']==true): ?>
                <div class="alert alert-danger" role="alert">Uneti naziv ekipe već postoji! Promeni naziv ekipe.</div>
            <?php endif; ?>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>


<?php require 'partials/footer.php'; ?>