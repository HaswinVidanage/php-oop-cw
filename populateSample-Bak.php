<?php

namespace Forms;
session_start();

if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="robots" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" /> -->
<link rel="stylesheet" type="text/css" href="css/populateSample.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



<style>
  .custom {
    .panel-heading: {
        background-color: red !important;
     }
</style>
</head>

<body>


<!-- This method gets a count of all the records
of database despite of the approval status -->
<?php
function getFullCount(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "quotations";


		$link = mysqli_connect($servername, $username, $password, $dbname);

		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}

		if ($result = mysqli_query($link, "SELECT orderNo FROM dbquot")) {

		    /* determine number of rows result set */
		    $rowFullCount = mysqli_num_rows($result);

		    /* close result set */
		    mysqli_free_result($result);
		}

		/* close connection */
		mysqli_close($link);

	return $rowFullCount;

}
?>

<!-- This method selects the records
where approved = no from the
database quotations in table dbquot -->

<?php
function dbManager($row_id){

	static $prevrow_id;
	if($row_id==$prevrow_id)
	{

		$row_id++;
	}

	while ($row_id <= getFullCount()) {

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "quotations";


				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				// selecting query

				 $sql = "SELECT *
				 FROM sessions where sessionNo=" . (int) $row_id ;


					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0)
					{

						getQuotes($row_id);

						$prevrow_id=$row_id;

						return $row_id;
						break;

					}
					else
					{
						$row_id++;
						$prevrow_id=$row_id;

						dbManager($row_id);
						break;
					}
					mysqli_close($conn);

	}
}

?>

<!-- This method populates with
the existing values in database  -->
<?php
function getQuotes($row_id) {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "quotations";


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// selecting query

		static $count =1;
		$result =-1;

		//$quotCount=getCount();

		//  $sql = "SELECT *
		//  FROM sessions where sessionNo=" . (int) $row_id;

     $sql = "SELECT SES.*,
      CONCAT(std.fName, ' ',std.lName) as Student_FullName,
      CONCAT(lec.fName, ' ',lec.lName) as Lecture_FullName,
      std.access
      FROM sessions SES
      INNER JOIN LOGIN std
      ON SES.StudentId = std.empId
      INNER join login lec
      ON SES.lecId = lec.empId
      WHERE std.access = 'student'
      ORDER BY SES.sessionNo DESC
      LIMIT 1";

		//full count and approve =no

		 $result = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($result) > 0) {
			    // output data of each row

			    echo'<div class="col-md-6">';
	    		echo"<table class=' table-responsive table-bordered table-striped table-condensed ' width='400'>";

				echo"<tr>
							<th>Property</th>
							<th>Value</th>

						 </tr>
						 ";
			    while($row = mysqli_fetch_assoc($result)) {

				echo"<tr><td>Session Number </td><td>".$row['sessionNo']."</td></tr>";
        echo"<tr><td>Student's Full Name</td><td>".$row['Student_FullName']."</td></tr>";
        echo"<tr><td>Lecture's Full Name </td><td>".$row['Lecture_FullName']."</td></tr>";
        echo"<tr><td>Student ID </td><td>".$row['StudentId']."</td></tr>";
        echo"<tr><td>Session Date </td><td>".$row['sesDate']."</td></tr>";
        echo"<tr><td>Start Time </td><td>".$row['startTime']."</td></tr>";
        echo"<tr><td>End Time </td><td>".$row['endTime']."</td></tr>";
        echo"<tr><td>Session No. </td><td>".$row['sessionNo']."</td></tr>";
        echo"<tr><td>Meeting Notes </td><td>".$row['meetingNotes']."</td></tr>";


				echo"</table>";
				echo "</div>";


			    }



			}
			else {
			    echo "0 results";
			}

		mysqli_close($conn);


	}
?>


<div class="container">
     <!--  <h2>Pending Approvals</h2> -->
    <div class="panel-group" id="accordion">


		  <?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "quotations";


			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			// selecting query

			$sql = "SELECT sessionNo  FROM sessions ";
			// change here done to get non checked quotations only
			$result = mysqli_query($conn, $sql);



				if (mysqli_num_rows($result) > 0) {
				    // output data of each row

				    while($row = mysqli_fetch_assoc($result)) {

				    $sessionNo=$row['sessionNo'];
				    echo'   <div class="panel panel-default">';
				    echo'      <div class="panel-heading">';
				    echo'        <h4 class="panel-title">';
				    echo'			<a data-toggle="collapse" data-parent="#accordion" href="#'.$sessionNo.'">Order ID : '.$sessionNo.'</a>';
				    echo'		 </h4>';
				    echo'	   </div>';

				    echo' <div id="'.$sessionNo.'" class="panel-collapse collapse">';
				    echo'	<div class="panel-body">';

				    echo"<div>";
		            dbManager($sessionNo);
		            echo"</div>";
		            echo'</div>';
		          	echo'</div>';
		        	echo'</div>';

				    }


				}
				else {
				    echo "0 pending quotations";
				}




			mysqli_close($conn);


		        ?>

	</div>

</div>

</body>
</html>
