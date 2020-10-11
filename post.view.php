
<?php require 'bootstrap.php'; ?>
    
<?php require 'partials/header.php'; ?>
<?php require 'partials/navbar.php'; ?>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Vesti i rezultati sa turnira</h1>
        </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-2">
        </div>

        <div class="col-8">
            <?php $result = $post->selectPosts(); foreach($result as $x): ?>

                <div class="card">
                    <div class="card-header text-center">
                        <?php echo $x->naslov; ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br($x->tekst); 
                        //funkcija nl2br() postavlja line break kod svakog novog reda koji vucem iz sql-a ?>
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo 'Datum objave: '.$x->datum_poruke; ?>
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
<?php require 'partials/footer.php'; ?>
