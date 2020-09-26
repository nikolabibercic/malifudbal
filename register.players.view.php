<?php require 'bootstrap.php'; ?>

<?php require 'partials/header.php'; ?>
<?php require 'partials/navbar.php'; ?>
<br>

<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <div class="text-center"><h1>Prijavi najmanje 6 igraca</h1></div>    
        </div>
        <div class="col-3">
            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="register.players.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nazivEkipe" placeholder="Naziv ekipe" class="form-control" disabled><br>
                    <input type="text" name="igrac1" placeholder="Igrac 1" class="form-control" required><br>
                    <input type="date" name="igrac1DatumRodjenja" placeholder="Igrac 1 Datum rodjenja" class="form-control" required><br>
                    <input type="text" name="igrac2" placeholder="Igrac 2" class="form-control" required><br>
                    <input type="date" name="igrac2DatumRodjenja" placeholder="Igrac 2 Datum rodjenja" class="form-control" required><br>
                    <input type="text" name="igrac3" placeholder="Igrac 3" class="form-control" required><br>
                    <input type="date" name="igrac3DatumRodjenja" placeholder="Igrac 3 Datum rodjenja" class="form-control" required><br>
                    <input type="text" name="igrac4" placeholder="Igrac 4" class="form-control" required><br>
                    <input type="date" name="igrac4DatumRodjenja" placeholder="Igrac 4 Datum rodjenja" class="form-control" required><br>
                    <input type="text" name="igrac5" placeholder="Igrac 5" class="form-control" required><br>
                    <input type="date" name="igrac5DatumRodjenja" placeholder="Igrac 5 Datum rodjenja" class="form-control" required><br>
                    <input type="text" name="igrac6" placeholder="Igrac 6" class="form-control" required><br>
                    <input type="date" name="igrac6DatumRodjenja" placeholder="Igrac 6 Datum rodjenja" class="form-control" required><br>
                    <input type="text" name="igrac7" placeholder="Igrac 7" class="form-control"><br>
                    <input type="date" name="igrac7DatumRodjenja" placeholder="Igrac 7 Datum rodjenja" class="form-control" ><br>
                    <input type="text" name="igrac8" placeholder="Igrac 8" class="form-control"><br>
                    <input type="date" name="igrac8DatumRodjenja" placeholder="Igrac 8 Datum rodjenja" class="form-control" ><br>
                    <input type="text" name="igrac9" placeholder="Igrac 9" class="form-control"><br>
                    <input type="date" name="igrac9DatumRodjenja" placeholder="Igrac 9 Datum rodjenja" class="form-control" ><br>
                    <input type="text" name="igrac10" placeholder="Igrac 10" class="form-control"><br>
                    <input type="date" name="igrac10DatumRodjenja" placeholder="Igrac 10 Datum rodjenja" class="form-control" ><br>
                </div>
                <button type="submit" name="prijaviIgrace">Prijavi igrace</button>
            </form>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>


<?php require 'partials/footer.php'; ?>