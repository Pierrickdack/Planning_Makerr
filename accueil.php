<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="shortcut icon" href="Images/pm2.ico" />
    <title>PLANNING-MAKER</title>
</head>
<body>
    <!-- Barre de navigation -->
    <nav>
        <img src="Images/UY1.png">
        <div class="onglets">
            <a href="accueil.php">
                <p class="link">
                    <input type="submit" value="Sign up" class="su">
                    <i class="fas fa-user"></i>
                </p>
            </a>
            <a href="insc_con.php">
                <p class="link">
                    <input type="submit" value="Sign in" class="si">
                    <i class="fas fa-arrow-right-to-bracket"></i>
                </p>
            </a>
        </div>
    </nav>
    <!-- Fin de la barre de navigation -->
    <!--Header-->
    <header>
        <h1>
            Welcome on PLANNING MAKER, your planning design software. <br>
            <div class="start">
                <a href="insc_con.php">
                    <button type="submit" class="bttn">
                        Start now 
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </a>
            </div>
        </h1>
        <img src="Images/undraw_scrum_board_re_wk7v.svg" style="padding-right: 40px">
    </header>
    
    <!--Fin Header-->

    <!--Section principale-->
    <h2 class="section-heading">Our Services</h2>
    <section>
        <div id="services" class="row">
            <div class="row">
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa fa-comments"></i>
                        </div>
                        <h3>Register</h3>
                        <p>
                            In this menu, you have the possibility to add a teacher, or a course that you will use to design your schedule.
                        </p>
                    </div>
                </div>
      
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa fa-comments"></i>
                        </div>
                        <h3>Conception</h3>
                        <p>
                            In this menu, you have the possibility to design a planning. Either for personal study of for teachings.
                        </p>
                    </div>
                </div>
      
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa fa-comments"></i>
                        </div>
                        <h3>Consultation</h3>
                        <p>
                            In this menu, you have the possibility to consult an already designed schedule and then contact its designer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fin section principale-->

    <!--Pied de page-->
    <footer>
        <p>Copyright &copy; 2022-2023  ICT4D-Projects - All Rights Reserved</p>
    </footer>
    <!--Fin du pied de page-->    

</body>
</html>