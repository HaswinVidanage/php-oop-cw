<?php

      //Start the Session
      session_start();


      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "quotations";



      //Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      //If the form is submitted
      if (isset($_POST['username']) and isset($_POST['password'])){

          // Assigning posted values to variables.
          $username = $_POST['username'];
          $password = $_POST['password'];
          //Checking the values are existing in the database or not

          $sql = "SELECT * FROM login WHERE uname= '$username' and pword= '$password'";

          $result = mysqli_query($conn, $sql) or die(mysqli_error());

          $count = mysqli_num_rows($result);



          //If the posted values are equal to the database values, then session will be created for the user.
          if ($count == 1){
              $_SESSION['username'] = $username;
              $row = mysqli_fetch_assoc($result);

              // checking access level of user
              $access = trim($row['access']);

              if ($access=="agent"){
                $_SESSION['logged_in'] = 1;
                header("Location: agentView.php");

              }
              else if ($access=="sales"){
                 $_SESSION['logged_in'] = 2;
                header("Location: salesView.php");
              }
              else{
                echo("Oops Something went Wrong! Please Contact Technical Department. Access :$access");
              }

          }else{



          }
      }

      // if the user is logged in Greets the user with message
      if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
      }else{

      }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="margin-top: 30px">
    <div class="login-panel panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Sign In</h1>
      </div>
      <div class="panel-body">
        <form id="loginform"  action="" method="post">
          <fieldset>
            <div class="form-group">
              <input class="form-control" placeholder="Type your username" name="username" type="text" required="" autofocus/>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Password" name="password" type="password" value="" required="" />
            </div>

            <button  type="submit" name="submit" class="btn btn-sm btn-danger">Log in</button>

          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-4"></div>
</div>
</body>
</html>
