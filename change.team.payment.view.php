<?php

require 'bootstrap.php';
//Provera da li korisnik ima admin ili bloger prava
$korisnikId = $_SESSION['korisnik']->korisnik_id;
$checkUserAdmin = $user->checkUserAdmin($korisnikId); //pozivam funkciju koja izbacuje sva prava korisnika

//Provera da li korisnik ima admin ili bloger prava

$check = false;

foreach($checkUserAdmin as $x):
?>
    <?php if($x->pravo_id == 1): ?>
    
<?php  require 'partials/header.php';?>
<?php require 'partials/navbar.php';?>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Evidentiraj uplatu</h1>
        </div>
</div>

<br>


<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="change.team.payment.php" method="POST">
                <div class="form-group">
                    Lista ekipa i statusi uplata:<br>
                    <select name="ekipaId" id="">
                        <?php  $result = $payment->selectTeamPaymentStatus(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->ekipa_id; ?> class="form-control"><?php echo $x->naziv_turnira.' - '.$x->status_uplate.' - '.$x->naziv_ekipe; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Novi status:<br>
                    <select name="statusUplateId" id="">
                        <?php  $result = $payment->selectPaymentStatuses(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->status_uplate_id; ?> class="form-control"><?php echo $x->status_uplate; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>
                <button type="submit" id="promeniStatusUplate" name="promeniStatusUplate">Promeni status uplate</button>
            </form><br>
            <?php if(isset($_GET['paymentStatusChanged']) && $_GET['paymentStatusChanged']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno si promenio status uplate</div>
            <?php endif; ?>

            <?php if(isset($_GET['paymentStatusChanged']) && $_GET['paymentStatusChanged']==false): ?>
                <div class="alert alert-danger" role="alert">Promena statusa uplate nije uspela!</div>
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

<script>
    var pictureUpload = document.getElementById('promeniStatusUplate');

    addEventListener('keydown',enter);

    function enter(e){
        if(e.which == 13){
            promeniStatusUplate.click();
        };
    }
</script>