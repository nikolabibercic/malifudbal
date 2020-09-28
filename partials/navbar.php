
<nav class="navbar navbar-expand navbar-dark" style="background-color: darkblue;">
        <a class="navbar-brand" href="index.php">Turnir u malom fudbalu</a>
        <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['korisnik'])): ?>        
                <li class="nav-item">
                    <a href="admin.php" class="nav-link" style="color:white;">
                        <?php
                            echo $_SESSION['korisnik']->naziv_korisnika;
                        ?>
                    </a>
                </li> 
                <li class="nav-item"><a href="logout.php" class="nav-link" style="color:white;">Izloguj se</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="login.view.php" class="nav-link" style="color:white;">Uloguj se</a></li>    
            <?php endif; ?>
            <li class="nav-item"><a href="contact.view.php" class="nav-link" style="color:white;">Kontakt</a></li>
        </ul>

</nav>

