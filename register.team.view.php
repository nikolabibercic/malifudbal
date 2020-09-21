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
                    <input type="text" name="nazivEkipe" placeholder="Naziv ekipe" class="form-control" required><br>
                    <input type="text" name="mesto" placeholder="Mesto" class="form-control" required><br>
                    <input type="text" name="telefon" placeholder="Kontakt telefon" class="form-control" required><br>
                    <input type="email" name="email" placeholder="Kontakt email" class="form-control"><br>
                    <input type="text" name="nazivTurnira" placeholder="Turnir" class="form-control" disabled><br>
                </div>
                <button type="submit" name="prijaviEkipu">Prijavi ekipu</button>
            </form>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>


<?php require 'partials/footer.php'; ?>