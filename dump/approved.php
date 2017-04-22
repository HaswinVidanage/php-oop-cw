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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- css -->
<link href="css/style2.css" rel="stylesheet">
<style>
  .custom {
    .panel-heading: {
        background-color: red !important;
     }
</style>

<script>

	function loadXMLDoc()
	{

	var xmlhttp;
	$('#mailresult').append('<img src="loader.gif" id="loader1">');
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {

	    $('#loader1').remove();
	    document.getElementById("mailresult").innerHTML= xmlhttp.responseText;

	    }
	  }

	    // 2. Define what to do when XHR feed you the response from the server - Start
	    var button = document.getElementById('my_button');
	    var orderId = button.getAttribute('data-value');

	    // alert(orderId);
	    // 3. Specify your action, location and Send to the server - Start 
	    xmlhttp.open("POST","printApproved.php",true);
	    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	    xmlhttp.send("orderId=" + orderId);
	    
	    // 3. Specify your action, location and Send to the server - End
	}
</script>
</head>

<body>


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

<?php
function dbManager($row_id){

	static $prevrow_id;
	if($row_id==$prevrow_id)
	{
		echo "previous ID equals new Id :".$prevrow_id;
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

				    $sql = "SELECT orderNo,width,height,guides,side,hand1,hand2,color,position,title,fname,lname,streetadd,address,city,state,postal,country,email,mobile,comment,total,agentID
				 FROM dbquot where orderNo=" . (int) $row_id. " and approved ='yes' " ;
				

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

					if($row['salesComments'] >"")
					{
						echo'<div class="col-md-6">


						
							   <div class="form-group">

								<form method="post" action="printApproved.php " > 
								  <div  style="color:#33CC33">
								  <h3>Comments</h3>
								  <br>
								  <h2>'.$row['salesComments'].'</h2>
								  </div>
								  <input type="hidden" name="orderID"  value="'.$row['orderNo'].'">
								  <input type="submit"  value="Print Invoice">
								</form>

								</div>	


							</div>';
					}
					else
					{
						echo'<div class="col-md-6">


						
							   <div class="form-group">

								<form method="post" action="printApproved.php " > 
								  <br>
								  <div  style="color:#33CC33">
								  <h2> Order has been fully approved!</h2>
								  <h5> Contact your Regional agent and proceed.</h5>
								  </div>
								  <input type="hidden" name="orderID"  value="'.$row['orderNo'].'">

								  <input type="submit" value="Print Invoice">

								   
								</form>

								</div>	


							</div>';
					}
				


				
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

			$sql = "SELECT orderNo  FROM dbquot where approved = 'yes'";
			// >>change here done to get Dissaproved quotations only
			$result = mysqli_query($conn, $sql);

			
			
				if (mysqli_num_rows($result) > 0) {
				    
				    while($row = mysqli_fetch_assoc($result)) {

				    $orderNo=$row['orderNo'];
				    echo'   <div class="panel panel-default">';
				    echo'      <div class="panel-heading">';
				    echo'        <h3 class="panel-title">'; 
				    echo'			<a data-toggle="collapse" data-parent="#accordion" href="#'.$orderNo.'">Order ID : '.$orderNo.'</a>';
				    echo'		 </h3>';
				    echo'	   </div>';

				    echo' <div id="'.$orderNo.'" class="panel-collapse collapse">';
				    echo'	<div class="panel-body">';

				    echo"<div>";
		            dbManager($orderNo);
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