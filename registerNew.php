 <?php
 header("Access-Control-Allow-Origin: *");
 ?>

<?PHP

	$title 	=$_POST['title'];
	$fname  =$_POST['fname'];
	$lname 	=$_POST['lname'];
	$uname  =$_POST['uname'];
	$pass  =$_POST['Test'];

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

	// INSERT DATA
	$sql = "INSERT INTO login (fname,lname,uname,pword,access)
	VALUES ('$fname','$lname','$uname','$pass','$title')";


	if (mysqli_query($conn, $sql)) {
		echo "New $title Employee Added successfully ";

	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

	}

	mysqli_close($conn);


?>
