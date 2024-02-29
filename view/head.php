<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

?>



<!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 13:06:14 GMT -->

<head>
  <title>Ajouter Idee</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="../../public/images/icons/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="pblic/fonts/font-awesome-4.7.0/css/font-awesome.min.css">



  <link rel="stylesheet" type="text/css" href="../../public/css/util.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/main.css">

  <meta name="robots" content="noindex, follow">

<body>