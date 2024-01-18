<?php
    function getAdmin($email, $password){
        if (require("connectAjout.php")){

            $req = $access->prepare("SELECT * FROM administrateur WHERE email = ? AND motdepasse = ?");

            $req->execute(array($email, $password));

            if($req->rowCount() == 1){
                $data = $req->fetch();

                return $data;
            }
            else {
                return false;
            }

            $req->closeCursor();
        }
    }
?>