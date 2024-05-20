<?php
// database for sign up page
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
    $confirmpass = $_POST["confirmpass"];
    // $exist=false;
    $errshow=false;
    // cheaking if user exist ...
    $existsql= "Select * from signupinfo WHERE username='$username'";
    $result = mysqli_query($conn,$existsql);
    $rowexist = mysqli_num_rows($result);
    if($rowexist>0)
    {
      // $exists=true;
      echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Failed!</strong> Username Alredy Exist! 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
    }
    else
    {
      // $errshow=false;
     if(($password==$confirmpass)&& $errshow==false) {
      $sql = "INSERT INTO `signupinfo` (`username`, `pasword`, `date`) VALUES ( '$username', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
       if($result)
          {
            $errshow=true;
            if($errshow){
                echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your data has been successfully sanded to the database
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
          }
      }
     else{
        if(!$errshow)
            {
                echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> Password is not matching to confirm password<br><strong>input carefully!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'; 
            }
     }
    }
}








?>