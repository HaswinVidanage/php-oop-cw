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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<body>
<div class="container">
     <!--  <h2>Pending Approvals</h2> -->
    <div class="panel-group" id="accordion">

		  <?php

      $studentId = $_SESSION['empId'];
      include_once("classes/Supervisee.php");
      $supervisee = new Supervisee();
      $result = $supervisee->getLastSession($studentId);


      echo'<div class="col-md-6">';
      echo"<table class=' table-responsive table-bordered table-striped table-condensed ' width='400'>";

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

      // $sql = "SELECT * FROM `sessions` where StudentId =".$_SESSION['empId']."";
      //
  		//  $result = mysqli_query($conn, $sql);
      //
  		//  if (mysqli_num_rows($result) > 0) {
  		// 	    // output data of each row
      //
      //
  		// 	    while($row = mysqli_fetch_assoc($result)) {
      //
      //     				echo"<tr><td>Student ID </td><td>".$row['StudentId']."</td></tr>";
      //     				// echo"<tr><td>Student Name </td><td>".$row['stuName']."</td></tr>";
      //             echo"<tr><td>lecturer Name </td><td>".$row['lecId']."</td></tr>";
      //             echo"<tr><td>Session Number </td><td>".$row['sessionNo']."</td></tr>";
      //             echo"<tr><td>Session date </td><td>".$row['sesDate']."</td></tr>";
      //             echo"<tr><td>Start Time </td><td>".$row['startTime']."</td></tr>";
      //             echo"<tr><td>End Time </td><td>".$row['endTime']."</td></tr>";
      //             echo"<tr><td>Meeting Notes </td><td>".$row['meetingNotes']."</td></tr>";
      //
      //
      //     				echo"</table>";
      //     				echo "</div>";
      //
  		// 	    }
      //
      //
      //
  		// 	}
  		// 	else {
  		// 	    echo "No session has been set so far. Contact your Lecturer.  Your User Id : ".$_SESSION['empId']."";
  		// 	}




		 ?>

	</div>

</div>
</body>
