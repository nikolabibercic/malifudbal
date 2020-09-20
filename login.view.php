<?php
    if(isset($_SESSION['korisnik'])){
            header('Location: index.php');
        }
?>

<?php require 'bootstrap.php'; ?>

<?php require 'partials/header.php'; ?>
<?php require 'partials/navbar.php'; ?>
<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control" required><br>
                    <input type="password" name="password" placeholder="Password" class="form-control" required><br>
                </div>
                <button type="submit" name="uloguj_se">Uloguj se</button>
            </form>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>


<?php require 'partials/footer.php'; ?>


