<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Login page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <?php
include("login naviagtionbar php.php");
?>

        <?php
// <!-- Database of the loginpage -->
$servername = "localhost";
$username = "root";
$password = "";
$database = "loginpage";


$conn = mysqli_connect( $servername, $username, $password ,$database);

if(!$conn)
{
    die ("Not yet connected to the database");
}


if($_SERVER['REQUEST_METHOD']=='POST')
{

    $username = $_POST["usernm"];
    $password = $_POST["pass"];
    // $confirmpass = $_POST["confirmpass"];
    // $exist=false;
    $Login=false;
    $showErr=false;
    
      $sql = "Select * from signupinfo where username='$username' AND pasword='$password'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
if($num == 1)
{
   $Login=true;
            if($Login){
                echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You are logged in!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        session_start();
        $_SESSION['loggedin'] = true ;
        $_SESSION['username'] = $username ;
    // Redirect function that redirect the session to the corressponding location...
        header('location: login home page.php');
  }
  else{
    echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed!</strong> Invalid Credentials! <br> Sign up if u didnt before.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}

?>









            <div class="container my-4">
                <center>
                    <h2>Login to our website</h2>
                </center>


                <form action="/debphp/login loginpage php.php" method="post">
                    <div class="mb-3">
                        <label for="usernm" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="usernm" name="usernm" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                    <!-- <div class="mb-3">
        <label for="confirmpass" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmpass" name="confirmpass">
        <div id="emailHelp" class="form-text">Enter the same psssword as before to continue</div>
      </div> -->

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>


</body>

</html>