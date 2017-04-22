<?php
header("Access-Control-Allow-Origin: *");
?>

<?PHP



 // Assigning posted values to variables.
 $username = $_POST['username'];
 $password = $_POST['password'];
 $selectOption = $_POST['taskOption'];

 $servername = "localhost";
 $username   = "root";
 $password   = "";
 $dbname     = "quotations";


 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
     echo "oops! something went wrong. Please Contact Technical Department.";
 }

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

} else {

    echo "Sorry!. Username and Password does not match.";
}


 // if (mysqli_query($conn, $sql)) {
 //   echo "New $title Employee Added successfully ";
 //
 // } else {
 //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 //
 // }

 mysqli_close($conn);


?>
