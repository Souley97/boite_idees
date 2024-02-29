<?php
require_once("db.php");
function listeIdee()
{
    try {
        $req = "SELECT Idee.*, users.username, Categorie.titre AS categorie 
                FROM Idee
                LEFT JOIN users ON Idee.id_utilisateur = users.id
                LEFT JOIN Categorie ON Idee.id_categorie = Categorie.id
                WHERE Idee.statut = 'publier'";
        return connect()->query($req);
    } catch (PDOException $error) {
        die("Erreur sur la récupération de la liste des Idées : " . $error->getMessage());
    }
}

    function listeIdeeMasque()
    {
        try {
            $req = "SELECT * FROM Idee c WHERE c.statut='Masque'";
            return connect()->query($req);
        } catch (PDOException $error) {
            die("Erreur sur la recupération de la liste des Categorie" . $error->getMessage());
        }
    }

function editIdee($idIdee, $titre, $description,  $statut)
    {
        
        try {
            $req = "UPDATE Idee i SET i.titre='$titre', i.description='$description' i.statut =  '$statut' WHERE i.id='$idIdee'";
            return connect()->exec($req);
        } catch (PDOException $error) {
            die("Une erreur s'est idee lors de la modification de la service d'identifiant " . $idIdee . ' ' . $error->getMessage());
        }
    }