<?php
    //connexion à la bd
    include_once "connectAjout.php";
    // recupération de l'id dans le lien
    $id  = $_GET['Code_UE'];
    // requete de suppression
    $req = mysqli_query($con, "DELETE FROM ue WHERE Code_UE = '$id'");
    //redirection vers la page ajout.php
    header("Location:../ajout.php");
?>