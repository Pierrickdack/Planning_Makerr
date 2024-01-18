<?php
    //connexion à la bd
    include_once "connectAjout.php";
    // recupération de l'id dans le lien
    $id  = $_GET['Nom'];
    // requete de suppression
    $req = mysqli_query($con, "DELETE FROM professeur WHERE Nom = '$id'");
    //redirection vers la page ajout.php
    header("Location:../ajout.php");
?>