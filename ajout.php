
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ajout.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="shortcut icon" href="Images/pm2.ico" />
    <title>PLANNING-MAKER</title>
</head>
<body>
    <!-- Barre de navigation -->
    <nav>
        <img src="Images/UY1.png">
        <div class="onglets">
            <a href="accueil.php"><p class="link">Home&nbsp;&nbsp;<i class="fas fa-home"></i></p></a>
            <a href="contact.php"><p class="link">Contact&nbsp;&nbsp;<i class="fas fa-envelope"></i></p></a>
            <a href="insc_con.php"><p class="link">Logout&nbsp;&nbsp;<i class="fas fa-arrow-right-from-bracket"></i></p></a>
        </div>
    </nav>
    <!-- Fin de la barre de navigation -->

    <div class="container">
        <div class="form">
            <div class="contact-info">
                <h3 class="title">ADD AN EDUCATIONAL UNIT</h3>
                <p class="text">Through this add window, you have the possibility to add a UE in the UE list for your planning.</p>
            </div>
            <?php
                $bol = true;
                //verifier que add a été cliqué
                if (isset($_POST['Button'])) {
                    //récupération des variables saisies à partir du formulaire des profs
                    extract($_POST);
                    //verifier le remplissage des champs
                    if (isset($branch)) {
                        //connexion à la bd
                        include_once "admin/connectAjout.php";
                        //requete d'ajout dans la bd
                        $reqfi = mysqli_query($con, "SELECT * FROM filiere");

                        $req = mysqli_fetch_all($reqfi);

                        if ($bol = true) {
                            try {
                                $req = mysqli_query($con, "INSERT INTO filiere VALUES ('$branch')");
                            } catch (mysqli_sql_exception $e) {
                                echo 'error';
                            }
                        }

                        if (isset($codeue) && isset($level)) {
                            //connexion à la bd
                            include_once "admin/connectAjout.php";
                            //requete d'ajout dans la bd
                            try {
                                $req = mysqli_query($con, "INSERT INTO `ue` (`Code_UE`, `id_niveau`, `filiere`) VALUES ('$codeue', '$level', '$branch')");
                            } catch (mysqli_sql_exception $e) {
                                echo 'error';
                            }

                            if ($req) {
                                header("Location: ajout.php");
                            } else {
                                $message = "Addition failure";
                            }
                        } else {
                            $message = "Please fill in all the fields !";
                        }

                        if ($req) {
                            header("Location: ajout.php");
                        } else {
                            $message = "Failure to add the die !";
                        }
                    } else {
                        $message = "Please fill in all the fields !";
                    }
                }
            ?>
            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
                <form action="ajout.php" method="POST">
                    <h3 class="title">Add informations</h3>
                    <div class="input-container ">
                        <input type="text" name="codeue" class="input" autocomplete="off" required>
                        <label for="">Unit code</label>
                        <span>Unit code</span>
                    </div>
                    <div class="input-container">
                        <input type="number" min="1" max="5" name="level" class="input" autocomplete="off" required>
                        <label for="">Level</label>
                        <span>Level</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="branch" class="input" autocomplete="off" required>
                        <label for="">Branch</label>
                        <span>Branch</span>
                    </div>
                    
                    <input type="submit" value="Add" class="btn" name="Button">
                </form>
            </div>
        </div>
        <!-- Fin ajout des UE -->

        <!-- Ajout des Profs -->
        <?php
            //verifier que add a été cliqué
            if (isset($_POST['Bouton'])) {
                //récupération des variables saisies à partir du formulaire des profs
                extract($_POST);
                //verifier le remplissage des champs
                if (isset($name) && isset($email) && $contact) {
                    //connexion à la bd
                    include_once "admin/connectAjout.php";
                    //requete d'ajout dans la bd
                    try {
                        $req = mysqli_query($con, "INSERT INTO professeur VALUES ('$name', '$email', '$contact')");
                    } catch (mysqli_sql_exception $req) {
                        echo "This teacher already exists in the database !";
                    }
                    
                    if ($req) {
                        header("Location: ajout.php");
                    } else {
                        $message = "Failed to add teacher !";
                    }
                } else {
                    $message = "Please fill in all the fields !";
                }
            }
        ?>

        <div class="form">
            <div class="contact-info">
                <h3 class="title">ADD A PROFESSOR</h3>
                <p class="text">Through this add window, you have the possibility to add a teacher to the list of teachers for your schedule.</p>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
                <form action="ajout.php" method="POST">
                    <h3 class="title">Add informations</h3>
                    <p class="erreur_message">
                        <?php
                            if (isset($message)) {
                                echo $message;
                            }
                        ?>
                    </p>
                    <div class="input-container ">
                        <input type="text" name="name" class="input" autocomplete="off" required>
                        <label for="">Name</label>
                        <span>Name</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" pattern=".+@facsciences-uy1.cm" autocomplete="off" required>
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="contact" class="input" autocomplete="off" required>
                        <label for="">Contact</label>
                        <span>Contact</span>
                    </div>
                    <input type="submit" value="Add" class="btn" name="Bouton">
                </form>
            </div>
        </div>
        <!-- Fin ajout des profs -->
    </div>

    
        
    <div class="tab">
        <!-- Tableau des UE -->
        <div class="ta">
            <h2>Table of teaching units</h2>
            <table class="tableau-style">
                <thead>
                    <tr>
                        <th>Id UE</th>
                        <th>Code UE</th>
                        <th>Level</th>
                        <th>Branch</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- page de connexion -->
                        <?php
                            include_once "admin/connectAjout.php";
                            // requete pour afficher la liste des Cours
                            $req = mysqli_query($con , "SELECT * FROM ue");
                            if (mysqli_num_rows($req) == 0) {
                                //if vide, afficher error mmessage
                                echo "There are no classes, add !";
                            }else {
                                $i=1;
                                while ($row = mysqli_fetch_assoc($req)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?=$i;
                                                $i=$i+1;
                                                ?>
                                            </td>
                                            <td class="tone">
                                                <?=$row['Code_UE']?>
                                            </td>
                                            <td class="tone">
                                                <?=$row['id_niveau']?>
                                            </td>
                                            <td class="tone">
                                                <?=$row['filiere']?>
                                            </td>

                                            <td class="tone">
                                                <a href="admin/suppAjoutt.php?Code_UE=<?=$row['Code_UE']?>">
                                                    <i class="fas fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Fin tableau des UE -->

        <!-- Tableau des Profs -->
        <div class="ta">
            <h2>Table of teachers</h2>
            <table class="tableau-style">
                <thead>
                    <tr>
                        <th>Id Professeur</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- page de connexion -->
                        <?php
                            include_once "admin/connectAjout.php";
                            // requete pour afficher la liste des Professeurs
                            $req = mysqli_query($con , "SELECT * FROM professeur");
                            if (mysqli_num_rows($req) == 0) {
                                //if vide, afficher error mmessage
                                echo "There is no teacher, add !";
                            }else {
                                $i=1;
                                while ($row = mysqli_fetch_assoc($req)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$i;
                                            $i=$i+1;
                                            ?>
                                        </td>
                                        <td class="tone"> <?=$row['Nom']?> </td>
                                        <td class="tone"> <?=$row['Email']?> </td>
                                        <td class="tone"> <?=$row['Contact']?> </td>
                                        <td class="tone">
                                            <a href="admin/suppAjout.php?Nom=<?=$row['Nom']?>">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Fin tableau des Profs -->
    </div>
    
    
    <div class="continue">
        <a href="emploi.php">
            <button type="submit" class="bttn">
                Continue &nbsp;
                <i class="fas fa-person-walking-arrow-right"></i>
            </button>
        </a>
    </div>
    

    <!--Pied de page-->
    <footer>
        <p>&copy; 2022-2023  ICT4D-Projects </p>
        <img src="Images/pm2.ico" alt="PM" style="width: 50px;">
    </footer>
    <!--Fin du pied de page-->

    <script src="js/ajout.js"></script>

</body>
</html>
