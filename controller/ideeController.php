<?php
         
require_once '../model/db.php';
$conn = connect(); // Assurez-vous de définir la connexion avant de l'utiliser



      // Ajouter un idee

if (isset($_POST['ajouteIdee'])) {
    // Afficher la liste des categorie
 
      // Insert un idee

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $id_utilisateur = $_POST['id_utilisateur'];
    $id_categorie = $_POST['id_categorie'];

    $query = "INSERT INTO Idee (titre, description, id_utilisateur, id_categorie) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$titre, $description, $id_utilisateur, $id_categorie]);

    header('Location: ../view/idee');
    exit();
}


if (isset($_GET['id']) && isset($_POST['deleteIdee'])) {
    $id = intval($_GET['id']);

    // Suppression avec une requête préparée
    $query = "DELETE FROM Idee WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Exécution de la requête avec gestion des erreurs
    if ($stmt->execute([$id])) {
        // Redirection en cas de succès
        header('Location: index.php');
        exit();
    } else {
        // Gestion de l'erreur en cas d'échec
        echo "Erreur lors de la suppression de l'idée.";
    }
}


if (isset($_POST['updateStatutIdee'])) {
    // Valider et nettoyer les données
    $nouveauStatut = $_POST['nouveauStatut'];

    // Mise à jour du statut avec une requête préparée
    $query = "UPDATE Idee SET statut = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Exécution de la requête avec gestion des erreurs
    if ($stmt->execute([$nouveauStatut])) {
        // Redirection en cas de succès
        header('Location: ../view/idee');
        exit();
    } else {
        // Gestion de l'erreur en cas d'échec
        echo "Erreur lors de la mise à jour du statut de l'idée.";
    }
}



if (isset($_POST['updateIdee'])) {
// Récupérez l'identifiant de l'idée à mettre à jour depuis l'URL ou d'une autre manière appropriée
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Vous pouvez également récupérer les détails de l'idée à partir de la base de données pour remplir le formulaire
// Ceci est une approche simplifiée pour l'exemple
$idee = []; // Récupérez les détails de l'idée depuis la base de données en fonction de l'id
$sql = $conn->prepare("SELECT * FROM Idee WHERE id = :id");
$sql->execute(array(':id' => $id));
$idee = $sql->fetch(PDO::FETCH_ASSOC);
    // Valider et nettoyer les données
    $id = intval($_POST['id']);
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);


    // Mise à jour avec une requête préparée
    $query = "UPDATE Idee SET titre = ?, description = ?  WHERE id = ?";
    // $query = "UPDATE Idee SET titre = ?, description = ?, id_utilisateur = ?, id_categorie = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Exécution de la requête avec gestion des erreurs
    if ($stmt->execute([$titre, $description, $id_utilisateur, $id_categorie, $id])) {
        // Redirection en cas de succès
        header('Location: ../view/idee');
        exit();
    } else {
        // Gestion de l'erreur en cas d'échec
        echo "Erreur lors de la mise à jour de l'idée.";
    }
}
?>


    


