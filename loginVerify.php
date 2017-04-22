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




 // $servername = "localhost";
 // $username   = "root";
 // $password   = "";
 // $dbname     = "quotations";
 //
 //
 // // Create connection
 // $conn = mysqli_connect($servername, $username, $password, $dbname);
 // // Check connection
 // if (!$conn) {
 //     die("Connection failed: " . mysqli_connect_error());
 //     echo "oops! something went wrong. Please Contact Technical Department.";
 // }

//$sql = "SELECT * FROM login WHERE uName= '$uName' and pWord= '$pWord' and access= '$selectOption' ";

//$result = mysqli_query($conn, $sql) or die(mysqli_error());
$LoginClass = new LoginClass();
$result = $LoginClass->verifyLogin($uName,$pWord,$selectOption);

$count = mysqli_num_rows($result);



//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){

    //echo "count is 1";
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
      //header("Location: StudentMenu.php");

    }
    else if ($access=="lecturer"){
       $_SESSION['logged_in'] = 2;
       echo "lec";
      //header("Location: LectureMenu.php");
    }
    else {
      echo "Sorry. Username and Password does not match.";
    }

}
else {
  echo "Sorry. Username and Password does not match.";
}










/////////////////////////////////////////////////////////////////////////
 // INSERT DATA
 // $sql = "INSERT INTO login (fname,lname,uname,pword,access)
 // VALUES ('$fname','$lname','$uname','$pass','$title')";
 //
 //
 // if (mysqli_query($conn, $sql)) {
 //   echo "student";
 //
 //
 // } else {
 //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 //
 // }

 //mysqli_close($conn);


?>
