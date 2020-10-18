
<?php
    require 'bootstrap.php';

    $nazivEkipe = $_POST['nazivEkipe'];
    $mesto = $_POST['mesto'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $turnirId = $_POST['turnirId'];
    $drzava = $_POST['drzava'];

    //echo $nazivEkipe;
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
                    
                    <?php for($i=1;$i<=10;$i++): //pravi 10 polja za unos imena i prezimena ?>
                        <?php if($i<=6): //prvih sest polja je obavezno ?>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name='<?php echo 'igrac'.$i.'Ime' ?>' placeholder='<?php echo 'Igrač '.$i.' - ime' ?>' required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name='<?php echo 'igrac'.$i.'Prezime' ?>' placeholder='<?php echo 'Igrač '.$i.' - prezime' ?>' required>
                                </div>
                            </div>
                            <br>
                        <?php endif; ?>
                        <?php if($i>6): //posle sestog polja nije obavezan unos imena i prezimena ?>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name='<?php echo 'igrac'.$i.'Ime' ?>' placeholder='<?php echo 'Igrač '.$i.' - ime' ?>' >
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name='<?php echo 'igrac'.$i.'Prezime' ?>' placeholder='<?php echo 'Igrač '.$i.' - prezime' ?>' >
                                </div>
                            </div>
                            <br>
                        <?php endif; ?>
                    <?php endfor; ?>

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