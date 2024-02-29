<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once 'model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Valider les données du formulaire (ne pas oublier de le faire !)
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = connect();
    $query = "SELECT id, username FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: view/idee');
        exit();
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
  <!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 13:06:14 GMT -->
  <head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="public/images/icons/favicon.ico" />


    <link rel="stylesheet" type="text/css"
      href="pblic/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    

    <link rel="stylesheet" type="text/css" href="public/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">

    <meta name="robots" content="noindex, follow">
     <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="public/images/img-01.png" alt="IMG">
          </div>
          <form class="login100-form validate-form"  action="login.php" method="post" >
            <span class="login100-form-title">
              Member Login
            </span>
            <div class="wrap-input100 validate-input"
              data-validate="Valid email is required: ex@abc.xyz">
              <input class="input100" type="text" name="username"
                placeholder="Username">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>
            <div class="wrap-input100 validate-input"
              data-validate="Password is required">
              <input class="input100" type="password" name="password"
                placeholder="Password">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>
            <div class="container-login100-form-btn">
              <input type="submit" class="login100-form-btn">
                Login
            </div>
            <div class="text-center p-t-12">
              <span class="txt1">
                Forgot
              </span>
              <a class="txt2" href="#">
                Username / Password?
              </a>
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
