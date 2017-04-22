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
  if (isset($_POST['username']) and isset($_POST['password']) ){

      // Assigning posted values to variables.
      $username = $_POST['username'];
      $password = $_POST['password'];
      //$role 	= $_POST['role'];
      $selectOption = $_POST['taskOption'];

      error_log(print_r($selectOption, TRUE));
      //Checking the values are existing in the database or not

      $sql = "SELECT * FROM login WHERE uName= '$username' and pWord= '$password' and access= '$selectOption' ";

      $result = mysqli_query($conn, $sql) or die(mysqli_error());

      $count = mysqli_num_rows($result);



      //If the posted values are equal to the database values, then session will be created for the user.
      if ($count == 1){

          $_SESSION['username'] = $username;
          $row = mysqli_fetch_assoc($result);

          // checking access level of user
          $access = trim($row['access']);

          //sets UserId
          $userId = trim($row['empId']);
          $_SESSION['empId'] = $userId;



          if ($access=="student"){
            $_SESSION['logged_in'] = 1;
            header("Location: StudentView.php");
            //header("Location: StudentMenu.php");

          }
          else if ($access=="lecturer"){
            //lecture ==sales
             $_SESSION['logged_in'] = 2;
             header("Location: LecView.php");
            //header("Location: LectureMenu.php");
          }

      }
  }else{
    error_log(print_r("In else", TRUE));
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

  <title>Login</title>
</head>

<body>
<div class="container">
  <!-- a row has 12 columns so we divide into 3 - 4 columns ex: col-sm-4 make sure the total adds up to being 12 per row -->
  <div class="col-sm-4"> </div>
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Login</h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post">
          <fieldset>
          <div class="form-group">
            <select  class="form-control" name="taskOption">
              <option value="student">Student</option>
              <option value="lecturer">Lecturer</option>
            </select>
          </div>
          <div class="form-group">
            <input class="form-control" name="username" placeholder="Enter your username" type="text" required="" autofocus/>
          </div>
          <div class="form-group">
            <input class="form-control" name="password" placeholder="Enter your password" type="password" required="" />
          </div>

          <button type="submit" class="btn btn-danger" name="submit">Log in</button>
        </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-4"> </div>
</div>


  </form>
</body>
</html>
