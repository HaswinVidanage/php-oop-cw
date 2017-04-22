<?php
session_start();

if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="robots" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- CSS -->
<link href="css/style.css" rel="stylesheet">
<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<style type="text/css"></style>

</head>

<body>



<!-- from index1 -->
<?php $width 	=$_POST['width']; ?>
<?php $height 	=$_POST['height']; ?>
<?php $guides 	=$_POST['guides']; ?>
<?php $side  	=$_POST['side']; ?>
<?php $hand1 	=$_POST['hand1']; ?>
<?php $hand2 	=$_POST['hand2']; ?>
<?php $color 	=$_POST['color']; ?>
<?php $position =$_POST['position']; ?>

<!-- from index2 -->
<?php $title					=$_POST["title"];		?>
<?php $fname					=$_POST["fname"]; 		?>
<?php $lname					=$_POST["lname"]; 		?>
<?php $streetadd				=$_POST["streetadd"];   ?>
<?php $address					=$_POST["address"]; 	?>
<?php $city						=$_POST["city"]; 		?>
<?php $state			        =$_POST["state"]; 		?>
<?php $postal					=$_POST["postal"]; 		?>
<?php $country					=$_POST["country"]; 	?>
<?php $email					=$_POST["email"]; 		?>
<?php $mobile					=$_POST["mobile"];		?>
<?php $comment					=$_POST["comments"]; 	?>
<?php $total					=$_POST["total"]; 		?>

<!-- from agents login table -->
<!-- to be added after login form -->
<?php $agentID=100;		?>

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

	// INSERT DATA
	

// (width,height,guides,side,hand1,hand2,color,position,title,fname,lname,streetadd,address,city,state,postal,country,email,mobile,comment,total,agentID)
	$sql = "INSERT INTO dbquot (width,height,guides,side,hand1,hand2,color,position,title,fname,lname,streetadd,address,city,state,postal,country,email,mobile,comment,total,agentID,orderDate)
	VALUES ($width,$height,'$guides','$side','$hand1','$hand2','$color','$position','$title','$fname','$lname','$streetadd','$address','$city','$state','$postal','$country','$email','$mobile','$comment',$total,$agentID,CURDATE())";

	if (mysqli_query($conn, $sql)) {
		// echo "New record created successfully";
		echo '<div class="alert alert-success">';
		echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
		echo '<strong>Done!</strong> New Quotation is sent for approval successfully.';
		echo '</div>';

	} else {
	    
	    echo '<div class="alert alert-danger">';
		echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
		echo '<strong>Error!</strong>';
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		echo '</div>';
	}

	mysqli_close($conn);	

?>

</body>
</html>