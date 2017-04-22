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

<!-- CSS -->
<link href="css/style2.css" rel="stylesheet">
<style>
  .custom {
    .panel-heading: {
        background-color: red !important;
     }
</style>
</head>

<body>

<?php
if($_GET){
    if(isset($_GET['approve'])){
        approve();
        setComments();
    }elseif(isset($_GET['decline'])){
        decline();
        setComments();
    }
}
	function setComments()
    {

    	 if(isset($_GET['salesComments'])){
		        $sales_Comments = $_GET['salesComments'];
		        echo "Comment : " . $sales_Comments;

		        $order_ID =$_GET['orderID'];
		        echo "ID : " . $order_ID ;

		  		
		       
		        // sql set Comment from Sales Exec
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

				else {

					
				 $sql = "update dbquot set salesComments = '$sales_Comments'  where orderNo=". (int) $order_ID." ";
				 echo "Comment Added";
		       	 $result = mysqli_query($conn, $sql);
		       	}

		       	mysqli_close($conn);


    		}
    	else
    		{	echo("comments empty");}
   
       // redirect
        echo "<script>window.location = 'http://localhost/backup3/phpDB/Forms/populateSample.php'</script>";

	}
       	 
    

    function approve()
    {
       echo "The approve function is called.";
       echo $_GET['orderID'];

       $order_ID =$_GET['orderID'];
       // sql set approve=yes
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

		else {
			

		 $sql = "update dbquot set approved = 'yes' where orderNo=". (int) $order_ID." ";


       	 $result = mysqli_query($conn, $sql);
       	}

       	mysqli_close($conn);
       	echo "Order Number ".$order_ID." was successfully approved.";
       
       	 
    }
    function decline()
    {
       echo "The decline function is called.";
       echo $_GET['orderID'];
       // sql set approve=no
       
       $order_ID =$_GET['orderID'];
       // sql set approve=yes
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

		else {
			

		 $sql = "update dbquot set approved = 'no' where orderNo=". (int) $order_ID." ";


       	 $result = mysqli_query($conn, $sql);
       	}
       	mysqli_close($conn);
        echo "Order Number ".$order_ID." was successfully Declined.";
        
       
    }

?>



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

		if ($result = mysqli_query($link, "SELECT orderNo FROM dbquot where approved ='no'")) {

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
				 FROM dbquot where orderNo=" . (int) $row_id. " and approved ='no' " ;
				

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
		 FROM dbquot where orderNo=" . (int) $row_id. " and approved ='no' " ;
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

				echo'<div class="col-md-6">


					
						   <div class="form-group">
							<div  style="color:#FF5050">
							<form>
							  <h3>Comments</h3>
							  <br>
							  <h2>'.$row['salesComments'].'</h2>

							</form>
							</div>
							</div>	


						</div>';

				
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

			$sql = "SELECT orderNo  FROM dbquot where approved = 'no' and salesComments >'' ";
			// >>change here done to get Dissaproved quotations only
			$result = mysqli_query($conn, $sql);

			
			
				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    
				    //accordion shit
				    //

				    
				    while($row = mysqli_fetch_assoc($result)) {

				    $orderNo=$row['orderNo'];
				    echo'   <div class="panel panel-default">';
				    echo'      <div class="panel-heading">';
				    echo'        <h4 class="panel-title">'; 
				    echo'			<a data-toggle="collapse" data-parent="#accordion" href="#'.$orderNo.'">Order ID : '.$orderNo.'</a>';
				    echo'		 </h4>';
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