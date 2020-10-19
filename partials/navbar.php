
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: darkblue;">
        <a class="navbar-brand" href="index.php">Turnir u malom fudbalu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="post.view.php" class="nav-link" style="color:white;">Vesti i rezultati</a></li>
                <li class="nav-item"><a href="pictures.view.php" class="nav-link" style="color:white;">Fotografije</a></li>
                <?php if(isset($_SESSION['korisnik'])): ?>        
                    <li class="nav-item">
                        <a href="admin.view.php" class="nav-link" style="color:white;">
                            <?php
                                echo $_SESSION['korisnik']->naziv_korisnika;
                            ?>
                        </a>
                    </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link" style="color:white;">Izloguj se</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="login.register.view.php" class="nav-link" style="color:white;"><img src="images/login-icon.png" height="30px" width="30px"></img></a></li>    
                <?php endif; ?>
            </ul>
        </div>           
</nav>