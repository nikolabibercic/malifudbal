<?php
    if(isset($_SESSION['korisnik'])){
            header('Location: index.php');
        }
?>

<?php require 'bootstrap.php'; ?>

<?php require 'partials/header.php'; ?>
<?php require 'partials/navbar.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Logovanje / Registracija</h1>
    </div>
</div>

<br>

<div class="container">


    <div class="row">
        <div class="col-6">
            <p>Logovanje:</p>
            <form action="login.register.php" method="POST">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control" required><br>
                    <input type="password" name="password" placeholder="Password" class="form-control" required><br>
                </div>
                <button type="submit" name="uloguj_se">Uloguj se</button>
            </form>
        </div>

        <div class="col-6">
            <p>Registracija:</p>
            <form action="login.register.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nazivKorisnika" placeholder="Naziv korisnika" class="form-control" required><br>
                    <input type="text" name="email" placeholder="Email" class="form-control" required><br>
                    <input type="password" name="password" placeholder="Password" class="form-control" required><br>
                </div>
                <button type="submit" name="registruj_se">Registruj se</button>
            </form>
            <br>
            <?php if(isset($_GET['registerUserStatus']) && $_GET['registerUserStatus']==true): ?>
                <div class="alert alert-success" role="alert">Registracija uspešna.</div>
            <?php endif; ?>

            <?php if(isset($_GET['registerUserStatus']) && $_GET['registerUserStatus']==false): ?>
                <div class="alert alert-danger" role="alert">Registracija nije uspela!</div>
            <?php endif; ?>
        </div>       
    </div>
</div>


<?php require 'partials/footer.php'; ?>


