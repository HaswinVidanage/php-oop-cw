<?php

session_start();

if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="robots" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/populateSample.css" />
<script src="js/jquery-1.10.2.min.js"></script>


<style>
  .custom {
    .panel-heading: {
        background-color: red !important;
     }
</style>
</head>

<body>

<div class="container">
    <div class="panel-group" id="accordion">


<?php

      $studentId = $_SESSION['empId'];
      include_once("classes/Supervisee.php");
      $supervisee = new Supervisee();

      $resultMain = $supervisee->getBasicSessionDetails($studentId);
      foreach ($resultMain as $key => $res) {
          echo"<p style='margin-left:200px;'>Student Name :".$res['Student_FullName']."</br>Student ID: ".$res['StudentId']."</br>Supervisor Name :".$res['Lecture_FullName']."</p>";

          $result = $supervisee->getAllSessions($studentId,$res['LecID']);
          foreach ($result as $key => $res) {
              $sessionNo= $res['sessionNo'];

              echo'   <div class="panel panel-default" style="margin-left:200px; width:1000px;">  ';
              echo'      <div class="panel-heading">';
              echo'        <h4 class="panel-title">';
              echo'			<a data-toggle="collapse" data-parent="#accordion" href="#'.$sessionNo.'">Session ID : '.$sessionNo.'</a>';
              echo'		 </h4>';
              echo'	   </div>';

              echo' <div id="'.$sessionNo.'" class="panel-collapse collapse">';
              echo'	<div class="panel-body">';

              echo"<div>";
              //populating the jquery accordion
              echo'<div class="">';
              echo"<table class=' table-responsive table-bordered table-striped table-condensed ' width='400' style='margin-left:250px;' >";

              echo"<tr>
                  <th>Property</th>
                  <th>Value</th>

                 </tr>
                 ";
                 
                //  echo"<tr><td>Student's Full Name</td><td>".$res['Student_FullName']."</td></tr>";
                //  echo"<tr><td>Lecture's Full Name </td><td>".$res['Lecture_FullName']."</td></tr>";
                //  echo"<tr><td>Student ID </td><td>".$res['StudentId']."</td></tr>";
                 echo"<tr><td>Session Date </td><td>".$res['sesDate']."</td></tr>";
                 echo"<tr><td>Start Time </td><td>".$res['startTime']."</td></tr>";
                 echo"<tr><td>End Time </td><td>".$res['endTime']."</td></tr>";

                 echo"<tr><td>Session No. </td><td>".$res['sessionNo']."</td></tr>";
                 echo"<tr><td>Meeting Notes </td><td>".$res['meetingNotes']."</td></tr>";


              echo"</table>";
              echo "</div>";


              //

              echo"</div>";
              echo'</div>';
              echo'</div>';
              echo'</div>';
          }

      }




	?>

	</div>

</div>

</body>
</html>
