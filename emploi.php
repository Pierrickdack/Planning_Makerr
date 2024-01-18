<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="Images/pm2.ico"/>
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="css/emploi.css">
    <script src="js/emploi.js"></script>
    <title>Planning Conception</title>
</head>
<body>
    <!-- Début du menu de Navigation -->
    <nav>
        <img src="Images/UY1.png">
        <div class="onglets">
            <a href="accueil.php"><p class="link">Home&nbsp;&nbsp;<i class="fas fa-home"></i></p></a>
            <a href="contact.php"><p class="link">Contact&nbsp;&nbsp;<i class="fas fa-envelope"></i></p></a>
            <a href="insc_con.php"><p class="link">Logout&nbsp;&nbsp;<i class="fas fa-arrow-right-from-bracket"></i></p></a>

            <form method="POST" action="URL">
                <input type="search" placeholder="Search...">
            </form>
        </div>
    </nav>
    <!-- Fin du menu de Navigation -->

    
        <!-- Début du second navbar -->
    <div class="navdeux">
        
        <h2><img src="./fontawesome-free-6.1.1-web/svgs/solid/calendar-days.svg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>SCHOOL TIME</span> TABLE <img src="./fontawesome-free-6.1.1-web/svgs/regular/pen-to-square.svg"></h2>

        <div class="plann">
            <div class="ico">
                <div onclick="window.print();" class="p">
                    Print &nbsp;<i class="fa-solid fa-print"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="c">
        <form action="" method="POST">
            <div class="ch">
                <div>
                    <label for="choix">Branch </label>
                    <select name="choix" required>
                        <option value=""></option>
                        <?php
                            include_once "admin/connectAjout.php";
                            // requete pour afficher la liste des filiere
                            $req = mysqli_query($con , "SELECT * FROM filiere");
                            
                            if (mysqli_num_rows($req) == 0) {
                                //if vide, afficher error mmessage
                                echo "Il n'y a pas de filiere, ajouter !";
                            }else {
                                while ($row = mysqli_fetch_assoc($req)) {
                                    ?>
                                    <option>
                                        <?=$row['nom_filiere']?>
                                    </option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div>
                    <label for="level">Level </label>
                    <select name="level" required>
                        <option value=""></option>
                        <?php
                            include_once "admin/connectAjout.php";
                            // requete pour afficher la liste des filiere
                            $req = mysqli_query($con , "SELECT * FROM niveau");
                            
                            if (mysqli_num_rows($req) == 0) {
                                //if vide, afficher error mmessage
                                echo "Il n'y a pas de niveau, ajouter !";
                            }else {
                                while ($row = mysqli_fetch_assoc($req)) {
                                    ?>
                                    <option>
                                        <?=$row['nom_niveau']?>
                                    </option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" name="apply" class="bttn">Apply</button>
        </form>
    </div>
    <!-- Fin du second navbar -->

    <section id="my-section">
        <!-- Début du main -->
        <div class="planning" >
            <table class="tableau-style">
                <thead>
                    <tr>
                        <th>Hours</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option value='".$row['Code_UE']."'>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start">Start : </label>
                            <input type="time">
                            <label for="end">End : </label>
                            <input type="time">
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                        <td class="tone">
                            <?php
                                if (isset($_POST['apply'])) {
                                    $a = $_POST['choix'];
                                    $b = $_POST['level'];

                                    echo "<select>";
                                        include_once "admin/connectAjout.php";
                                        $post = 
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Code_UE FROM ue WHERE filiere = '$a' and id_niveau='$b'");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de filiere, ajouter !";
                                        }else {
                                            $i=1;
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Code_UE']."</option>";
                                            }
                                        }
                                    echo "</select>
                                    <select>";
                                        // include_once "connectAjout.php";
                                        // requete pour afficher la liste des filiere
                                        $req = mysqli_query($con , "SELECT Nom FROM professeur ");
                                        
                                        if (mysqli_num_rows($req) == 0) {
                                            //if vide, afficher error mmessage
                                            echo "Il n'y a pas de professeur, ajouter !";
                                        }else {
                                            echo "<option value=''></option>";
                                            while ($row = mysqli_fetch_assoc($req)) {
                                                echo "<option>".$row['Nom']."</option>";
                                            }
                                        }
                                    echo "</select>";
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>   
            </table>
        </div>
        <!-- Fin du main -->
    </section>
    
    <div class="continue">
        <a href="ajout.php">
            <button type="submit" class="bttn">
                Back &nbsp;
                <i class="fas fa-person-walking-arrow-loop-left"></i>
            </button>
        </a>
    </div>
    <!--Pied de page-->
    <footer>
        <p>&copy; 2022 - 2023 &nbsp;&nbsp; ICT4D - Projects</p>
        <img src="Images/pm2.ico">
    </footer>
    <!--Fin du pied de page-->

    

</body>
</html>