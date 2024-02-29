<?php
require_once("db.php");
function listeCategorie()
    {
        try {
            $req = "SELECT * FROM Categorie c WHERE c.etat=1";
            return connect()->query($req);
        } catch (PDOException $error) {
            die("Erreur sur la recupération de la liste des Categorie" . $error->getMessage());
        }
    }