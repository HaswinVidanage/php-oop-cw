<?php
session_start();
//access control through session variables
if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"> -->

<link rel="stylesheet" type="text/css" href="css/lastSession.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<body>
<div class="container">
    <div class="" id="accordion">

		  <?php

      $studentId = $_SESSION['empId'];
      include_once("classes/Supervisee.php");
      $supervisee = new Supervisee();
      $result = $supervisee->getLastSession($studentId);


      echo'<div class="">';
      echo"<table class=' table-responsive table-bordered table-striped table-condensed ' width='400;'>";

      echo"<tr>
            <th></th>
            <th>Session Details</th>

           </tr>
           ";

      foreach ($result as $key => $res) {
        echo"<tr><td>Student's Full Name</td><td>".$res['Student_FullName']."</td></tr>";
        echo"<tr><td>Lecture's Full Name </td><td>".$res['Lecture_FullName']."</td></tr>";
        echo"<tr><td>Student ID </td><td>".$res['StudentId']."</td></tr>";
        echo"<tr><td>Session Date </td><td>".$res['sesDate']."</td></tr>";
        echo"<tr><td>Start Time </td><td>".$res['startTime']."</td></tr>";
        echo"<tr><td>End Time </td><td>".$res['endTime']."</td></tr>";

        echo"<tr><td>Session No. </td><td>".$res['sessionNo']."</td></tr>";
        echo"<tr><td>Meeting Notes </td><td>".$res['meetingNotes']."</td></tr>";
      }
      echo"</table>";
      echo "</div>";


		 ?>

	</div>

</div>
</body>
