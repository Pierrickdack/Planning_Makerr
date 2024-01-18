<?php
    session_start();
    include 'admin/connectAjout.php';

    if(isset($_POST['connexion'])){
        $email=$_POST['email'];
        $mdp = $_POST['mdp'];

        if($email && $mdp){

            $email = htmlspecialchars($_POST['email']);
            $mdp = sha1($_POST['mdp']);

            $select = mysqli_query($con,"SELECT  `email`, `mdp` FROM `administrateur` WHERE email='$email' AND mdp='$mdp' ");
            
            if(mysqli_num_rows($select) == 1){
                header("Location: ajout.php");
            }else{
                $erreur1="Incorrect email or password !";
            }
        }else{
            $erreur1="Please fill out all fields !";
        }

        /* $admin = getAdmin($email, $mdp);
        if($admin){
            $_SESSION['isqzADdCVfe94D5'] = $admin;

            header("Location: ajout.php");
        }
        else {
            echo "Erreur de connexion !";
        } */
    }

    if(isset($_POST['inscrire'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['mdp']);
        $cmdp = sha1($_POST['cmdp']);

        if($nom && $prenom && $email && $mdp && $cmdp){
            if($mdp == $cmdp){
                $select = mysqli_query($con,"INSERT INTO `administrateur`( `nom`, `prenom`, `email`, `mdp`) VALUES ('$nom','$prenom','$email','$mdp')");
                $erreur2 = "Your account has been created !";
            }else{
                $erreur2 = "Both passwords must be identical";
            } 
        }else{
            $erreur2 = "Please fill out all fields !";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  
    <link rel="stylesheet" href="css/insc_con.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="shortcut icon" href="Images/pm2.ico" />
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="post" class="sign-in-form">
                    <img style="width: 30%" src="Images/UY1.png" alt="UY1">
                    <h2 class="title">SIGN IN</h2>
                        <?php
                            if(isset($erreur1)){
                                echo '<span class="error-msg">' .$erreur1. '</span>';
                            }
                        ?>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" autocomplete>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="mdp" placeholder="Password">
                    </div>
                    <input type="submit" name="connexion" value="sign in"  class="btn solid">
                    <div class="mot"><a href="#">Forgot password ?</a></div>
                </form>

                <form action="" method="post" class="sign-up-form">
                    <img style="width: 15%" src="Images/UY1.png" alt = "UY1">
                    <h2 class="title">SIGN UP</h2>
                        <?php
                            if(isset($erreur2)){
                                echo '<span class="error-msg">' .$erreur2. '</span>';
                            }
                        ?>

                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" name="nom" placeholder="Name">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" name="prenom" placeholder="Surname">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="mdp" placeholder="Password">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="cmdp" placeholder="Confirm password">
                    </div>
                    <div class="aver">
                        <p>
                            En vous inscrivant sur PM, vous vous engagez à respecter les conditions générales d'utilisation liées à notre logiciel ainsi que notre politique de confidentialité.
                        </p>
                    </div>
                    <input type="submit" name="inscrire" value="Sign up"  class="btn solid">
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>WELCOME ON <strong> PLANNING MAKER</strong></h3>
                    <p>Don't have a PM account ?</p>
                    <button class="btn transparent" id="sign-up-btn">SIGN UP</button>
                </div>
                <img  src="Images/pm2.ico" class="image" alt="UY1" style="border-radius: 50%;">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>WELCOME ON <strong> PLANNING MAKER</strong></h3>
                    <p>Do you already have a PM account ?</p>
                    <button class="btn transparent" id="sign-in-btn">SIGN IN</button>
                </div>
                <img  src="Images/undraw_booking_re_gw4j.svg" class="image">
            </div>
        </div>
    </div>
    <script src="js/page.js"></script>
</body>
</html>

<?php
    if(isset($_POST['connexion'])){
        if (!empty($_POST['email']) AND !empty($_POST['mdp'])) {
            $email = htmlspecialchars($_POST['email']);
            $motdepasse = htmlspecialchars($_POST['mdp']);

            $admin = getAdmin($email, $motdepasse);

            if($admin){
                $_SESSION['isqzADdCVfe94D5'] = $admin;

                header("Location: ajout.php");
            }
            else {
                echo "Erreur de connexion !";
            }
        }
    }
?>