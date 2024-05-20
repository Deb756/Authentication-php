<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true)
{
  header("location: login loginpage php.php");
}
// else{
  
// }
// exit;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Home page </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

<?php
require("login naviagtionbar php.php");
?>    
<div class="container my-3">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Wlcome Mr <?php echo $_SESSION['username'] ?> </h4>
  <p> <strong>Hallo <?php echo $_SESSION['username'] ?></strong> Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">If u wan here by clicking this u can logut urself <a href="login logout php.php">Logout here</a> </p>
</div>
</div>
</body>
</html>

