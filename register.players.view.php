
<?php
    require 'bootstrap.php';

    $nazivEkipe = $_POST['nazivEkipe'];
    $mesto = $_POST['mesto'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $turnirId = $_POST['turnirId'];
    $drzava = $_POST['drzava'];

    echo $nazivEkipe;
    //Pozivam funckiju koja provera da li naziv ekipe vec postoji za izabrani turnir
    $proveraDuplikata = $team->checkDuplicateTeam($nazivEkipe, $turnirId);

    if($proveraDuplikata){
        header("Location: register.team.view.php?duplicateTeamStatus={$team->duplicateTeamStatus}");
    }
    /*else{
        $team->insertTeam($nazivEkipe,$mesto,$telefon,$email,$turnirId,$drzava);
    }*/

?>

<?php require 'partials/header.php'; ?>
<?php require 'partials/navbar.php'; ?>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Prijava igrača</h1>
        </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
       
        </div>
        <div class="col-3">
            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <h3 class="display-7">Obavezno je prijaviti najmanje 6 igrača</h3>
            <form action="register.team.php" method="POST">
                <div class="form-group">

                    <input type="hidden" value=<?php echo $_POST['nazivEkipe']; ?> name="nazivEkipe" placeholder="Naziv ekipe" class="form-control"><br>
                    
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac1Ime" placeholder="Igrač 1 - ime" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac1Prezime" placeholder="Igrač 1 - prezime" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac2Ime" placeholder="Igrač 2 - ime" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac2Prezime" placeholder="Igrač 2 - prezime" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac3Ime" placeholder="Igrač 3 - ime" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac3Prezime" placeholder="Igrač 3 - prezime" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac4Ime" placeholder="Igrač 4 - ime" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac4Prezime" placeholder="Igrač 4 - prezime" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac5Ime" placeholder="Igrač 5 - ime" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac5Prezime" placeholder="Igrač 5 - prezime" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac6Ime" placeholder="Igrač 6 - ime" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac6Prezime" placeholder="Igrač 6 - prezime" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac7Ime" placeholder="Igrač 7 - ime" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac7Prezime" placeholder="Igrač 7 - prezime" >
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac8Ime" placeholder="Igrač 8 - ime" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac8Prezime" placeholder="Igrač 8 - prezime" >
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac9Ime" placeholder="Igrač 9 - ime" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac9Prezime" placeholder="Igrač 9 - prezime" >
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="igrac10Ime" placeholder="Igrač 10 - ime" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="igrac10Prezime" placeholder="Igrač 10 - prezime" >
                        </div>
                    </div>
                <input type="hidden" class="form-control" name="turnirId" value=<?php echo $_POST['turnirId']; ?> >
                
                <input type="hidden" class="form-control" name="nazivEkipe" value='<?php echo $_POST['nazivEkipe']; ?>' >
                <input type="hidden" class="form-control" name="mesto" value='<?php echo $_POST['mesto']; ?>' >
                <input type="hidden" class="form-control" name="telefon" value='<?php echo $_POST['telefon']; ?>' >
                <input type="hidden" class="form-control" name="email" value=<?php echo $_POST['email']; ?> >
                <input type="hidden" class="form-control" name="drzava" value=<?php echo $_POST['drzava']; ?> >

                </div>
                <button type="submit" name="prijaviEkipu">Prijavi ekipu!</button>
            </form>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>


<?php require 'partials/footer.php'; ?>