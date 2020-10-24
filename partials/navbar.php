
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: darkblue;">
        <a class="navbar-brand" href="index.php">Turnir u malom fudbalu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="post.view.php" class="nav-link" id="navLink1" style="color:white;">Vesti i rezultati</a></li>
                <li class="nav-item"><a href="pictures.view.php" class="nav-link" id="navLink2" style="color:white;">Fotografije</a></li>
                <?php if(isset($_SESSION['korisnik'])): ?>        
                    <li class="nav-item">
                        <a href="admin.view.php" class="nav-link" id="navLink3" style="color:white;">
                            <?php
                                echo $_SESSION['korisnik']->naziv_korisnika;
                            ?>
                        </a>
                    </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link" id="navLink4" style="color:white;">Izloguj se</a></li>
                <?php else: ?>
                    <li class="nav-item" ><a href="login.register.view.php" class="nav-link" id="navLink5" style="color:white;"><img src="images/login-icon.png" height="30px" width="30px"></img></a></li>    
                <?php endif; ?>
            </ul>
        </div>           
</nav>
<script>
    var navLink1 = document.getElementById('navLink1');
    navLink1.onmouseover = function(){
        navLink1.style.color = 'darkblue';
        navLink1.style.backgroundColor = 'white';
    }
    navLink1.onmouseleave = function(){
        navLink1.style.color = 'white';
        navLink1.style.backgroundColor = 'darkblue';
    }

    var navLink2 = document.getElementById('navLink2');
    navLink2.onmouseover = function(){
        navLink2.style.color = 'darkblue';
        navLink2.style.backgroundColor = 'white';
    }
    navLink2.onmouseleave = function(){
        navLink2.style.color = 'white';
        navLink2.style.backgroundColor = 'darkblue';
    }

    var navLink3 = document.getElementById('navLink3');
    navLink3.onmouseover = function(){
        navLink3.style.color = 'darkblue';
        navLink3.style.backgroundColor = 'white';
    }
    navLink3.onmouseleave = function(){
        navLink3.style.color = 'white';
        navLink3.style.backgroundColor = 'darkblue';
    }

    var navLink4 = document.getElementById('navLink4');
    navLink4.onmouseover = function(){
        navLink4.style.color = 'darkblue';
        navLink4.style.backgroundColor = 'white';
    }
    navLink4.onmouseleave = function(){
        navLink4.style.color = 'white';
        navLink4.style.backgroundColor = 'darkblue';
    }

    var navLink5 = document.getElementById('navLink5');
    navLink5.onmouseover = function(){
        navLink5.style.color = 'darkblue';
        navLink5.style.backgroundColor = 'white';
    }
    navLink5.onmouseleave = function(){
        navLink5.style.color = 'white';
        navLink5.style.backgroundColor = 'darkblue';
    }
</script>