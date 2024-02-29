<?php
include ("../head.php");
include ("../navbar.php");
?>
  <div class="limiter">
   
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../../public/images/pastas.png" alt="IMG">
        </div>
        <form class="login100-form validate-form" action="../../controller/categorieController.php" method="post">
          <span class="login100-form-titqle">
            Ajouter Un categorie </span>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="titre" placeholder="titre">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="description" placeholder="Description">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
       
          <div class="container-login100-form-btn">
            <input type="submit" name="ajouteCategorie" class="login100-form-btn">
          </div>
          
          <div class="text-center p-t-136">
            <a class="txt2" href="#">
              Create your Account
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