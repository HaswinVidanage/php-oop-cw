<?php
header("Access-Control-Allow-Origin: *");
session_start();
?>

<?PHP

 $uName 	=$_POST['username'];
 $pWord  =$_POST['password'];
 $selectOption 	=$_POST['taskOption'];


 //including the database connection file
 include_once("classes/Crud.php");
 include_once("classes/LoginClass.php");

  $LoginClass = new LoginClass();
  $result = $LoginClass->verifyLogin($uName,$pWord,$selectOption);

  $count = mysqli_num_rows($result);


//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){

    $_SESSION['username'] = $uName;
    $row = mysqli_fetch_assoc($result);

    // checking access level of user
    $access = trim($row['access']);

    //sets UserId
    $userId = trim($row['empId']);
    $_SESSION['empId'] = $userId;


    if ($access=="student"){
      $_SESSION['logged_in'] = 1;
       echo "student";

    }
    else if ($access=="lecturer"){
       $_SESSION['logged_in'] = 2;
       echo "lec";
    }
    else {
      echo "Sorry. Username and Password does not match.";
    }

}
else {
  echo "Sorry. Username and Password does not match.";
}

?>
