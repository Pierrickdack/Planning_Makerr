<?php
    session_start();
    
    if (isset($_SESSION['isqzADdCVfe94D5'])) {
    $_SESSION['isqzADdCVfe94D5'] = array();
    
    session_destroy();
    header("Location: ../accueil.php");
    }
    else {
        header("Location: ../insc_con.php");
    }
?>