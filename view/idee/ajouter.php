<?php
include "../head.php";
include "../navbar.php";
?>

  <div class="limiter">
     
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../../public/images/idee.jpg" alt="IMG">
        </div>
        <form class="login100-form validate-form" action="../../controller/ideeController.php" method="post">
          <span class="login100-form-titqle">
            Ajouter un idee </span>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="titre" placeholder="titre">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="description" placeholder="description">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
           <!-- L'ID de l'utilisateur est récupéré à partir de la session -->
    <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['user_id']; ?>">
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
          <select name="id_categorie" class="input100" required>

    <?php
      require_once '../../model/db.php';
      $conn = connect(); // Assurez-vous de définir la connexion avant de l'utiliser

      $query_categories = "SELECT id, titre FROM Categorie";
      $result_categories = $conn->query($query_categories);
      $categories = $result_categories->fetchAll(PDO::FETCH_ASSOC);

foreach ($categories as $categorie): ?>
        <option value="<?=$categorie['id']?>"><?=$categorie['titre']?></option>

    <?php endforeach;?>
</select>
          <div class="container-login100-form-btn">
            <input type="submit" name="ajouteIdee" class="login100-form-btn">
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


</body>

<!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 13:06:31 GMT -->

</html>