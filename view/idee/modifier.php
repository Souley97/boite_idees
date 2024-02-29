<?php
require_once '../../model/db.php';
$conn = connect(); // Assurez-vous de définir la connexion avant de l'utiliser

if (isset($_POST['updateIdee'])) {
    // Valider et nettoyer les données
    $id = intval($_POST['id']);
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    // $id_utilisateur = intval($_POST['id_utilisateur']);
    // $id_categorie = intval($_POST['id_categorie']);

    // Mise à jour avec une requête préparée
    $query = "UPDATE Idee SET titre = ?, description = ? WHERE id = ?";
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
<?php
include "../head.php";
include "../navbar.php";
?>

  <div class="limiter">
  <?php
// Récupérez l'identifiant de l'idée à mettre à jour depuis l'URL ou d'une autre manière appropriée
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Vous pouvez également récupérer les détails de l'idée à partir de la base de données pour remplir le formulaire
// Ceci est une approche simplifiée pour l'exemple
$idee = []; // Récupérez les détails de l'idée depuis la base de données en fonction de l'id
$sql = $conn->prepare("SELECT * FROM Idee WHERE id = :id");
$sql->execute(array(':id' => $id));
$idee = $sql->fetch(PDO::FETCH_ASSOC);
?>
     
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../../public/images/idee.jpg" alt="IMG">
        </div>
        <form class="login100-form validate-form" action="modifier.php" method="post">
          <span class="login100-form-titqle">
            Modifier un idee </span>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="titre" placeholder="titre"  value="<?php echo isset($idee['titre']) ? htmlspecialchars($idee['titre']) : ''; ?>" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="description" placeholder="description"  value="<?php echo isset($idee['description']) ? htmlspecialchars($idee['description']) : ''; ?>" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
           <!-- L'ID de l'utilisateur est récupéré à partir de la session -->
           <input type="hidden" name="id" value="<?php echo $id; ?>">
          <!-- <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="id_categorie" placeholder="id_categorie">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div> -->

          <div class="wrap-input100 validate-input">
               <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
        
          <div class="container-login100-form-btn">
            <input type="submit" name="updateIdee" class="login100-form-btn">
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="index.php">
              listes des Idees

              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>



<!-- Ajout des scripts Bootstrap -->


    <!-- Ajout de Bootstrap JS et Popper.js (nécessaires pour certaines fonctionnalités de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
