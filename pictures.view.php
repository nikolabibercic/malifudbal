<?php require 'bootstrap.php'; ?>
    
<?php  require 'partials/header.php'; ?>
<?php  require 'partials/navbar.php'; ?>
    
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Fotografije</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-2">
        </div>

        <div class="col-8">
            <?php $result = $picture->selectPictures(); foreach($result as $x): ?>

                <div class="card">
                    <img src='<?php echo $x->naziv_fotografije ?>' class="card-img-top" alt="...">
                    <div class="card-footer text-muted">
                        <?php echo 'Datum objave: '.$x->datum_inserta; ?>
                    </div>
                </div><br><br>

            <?php endforeach; ?>
        </div>

        <div class="col-2">
        </div>
    </div>
</div>
<br>
<br>

<?php   require 'partials/footer.php'; ?>



