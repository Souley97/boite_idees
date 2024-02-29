<?php


require_once('../model/db.php');
$conn = connect(); // Assurez-vous de définir la connexion avant de l'utiliser

// AJOUTER UN CATEGORIE
if (isset($_POST['ajouteCategorie'])) {
  
    $titre = $_POST['titre'];
    $description = $_POST['description'];
   

    $query = "INSERT INTO Categorie (titre, description) VALUES ( ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$titre, $description]);

    header('Location: ../view/categorie/');
}



// MODEFIER UN CATEGORIE

if (isset($_POST['updateCategorie'])) {
    // Valider et nettoyer les données
    $id = intval($_POST['id']);
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    // $id_utilisateur = intval($_POST['id_utilisateur']);

    // Mise à jour avec une requête préparée
    $query = "UPDATE Categorie SET titre = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Exécution de la requête avec gestion des erreurs
    if ($stmt->execute([$titre, $description, $id])) {
        // Redirection en cas de succès
        header('Location: index.php');
        exit();
    } else {
        // Gestion de l'erreur en cas d'échec
        echo "Erreur lors de la mise à jour de l'idée.";
    }
}
?>