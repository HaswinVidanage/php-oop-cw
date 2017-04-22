<?php
session_start();

if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>

<?php $orderId 	=$_POST['orderID']; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="robots" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link href="css/style2.css" rel="stylesheet">

<style>
  .custom {
    .panel-heading: {
        background-color: red !important;
     }
</style>
</head>

<body onload="javascript:window.print()">

<?php
function getCount(){
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

		if ($result = mysqli_query($link, "SELECT orderNo FROM dbquot where approved ='yes'")) {

		    /* determine number of rows result set */
		    $rowCount = mysqli_num_rows($result);

		   

		    /* close result set */
		    mysqli_free_result($result);
		}

		/* close connection */
		mysqli_close($link);


	return $rowCount;
		
}
?>


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

		$quotCount=getCount(); 

		


		    $sql = "SELECT orderNo,width,height,guides,side,hand1,hand2,color,position,title,fname,lname,streetadd,address,city,state,postal,country,email,mobile,comment,total,agentID,salesComments
		 FROM dbquot where orderNo=" . (int) $row_id. " and approved ='yes' " ;
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

				echo"<tr><td>Order Number </td><td>".$row['orderNo']."</td></tr>";
				echo"<tr><td>Width </td><td>".$row['width']."</td></tr>";
				echo"<tr><td>Height </td><td>".$row['height']."</td></tr>";
				echo"<tr><td>Guides </td><td>".$row['guides']."</td></tr>";
				echo"<tr><td>Side </td><td>".$row['side']."</td></tr>";
				echo"<tr><td>Hand1 </td><td>".$row['hand1']."</td></tr>";
				echo"<tr><td>Hand2 </td><td>".$row['hand2']."</td></tr>";
				echo"<tr><td>Color </td><td>".$row['color']."</td></tr>";
				echo"<tr><td>Position </td><td>".$row['position']."</td></tr>";
				echo"<tr><td>Title </td><td>".$row['title']." ".$row['fname']." ".$row['lname']."</td></tr>";
				echo"<tr><td>mobile </td><td>".$row['mobile']."</td></tr>";
				echo"<tr><td>comment </td><td>".$row['comment']."</td></tr>";
				echo"<tr><td>total </td><td>".$row['total']."</td></tr>";
				echo"<tr><td>Agent Id</td><td>".$row['agentID']."</td></tr>";
				

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
     <h2>Invoice</h2>
    
	  
	
		  <?php
		  	getQuotes($orderId);

		 ?>
		<div class="container" style="padding-top: 282px;">
			
			<p>................................<br/></p>
			<p>Sales Head<br/></p>
			<p>Three Sinha Industries<br/></p>
		    
		</div>
	</div>

</div>

</body>
</html>