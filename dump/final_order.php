<?php
session_start();

if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>

<html>
<head>
<!-- CSS -->
<title>Invoice</title>

<!-- Meta Tags -->
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
<?php
// Echo session variables that were set on previous page
echo "Logged in as  " . $_SESSION["username"] . ".<br>";
?>
<div class="container">
<form id="form3" name="form3" class="wufoo topLabel page1" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate="" action="db_invoice.php">




<!-- from index1 -->

<?php $width 	=$_POST['width']; ?>
<?php $height =$_POST['height']; ?>
<?php $guides =$_POST['guides']; ?>
<?php $side  	=$_POST['side']; ?>
<?php $hand1 	=$_POST['hand1']; ?>
<?php $hand2 	=$_POST['hand2']; ?>
<?php $color 	=$_POST['color']; ?>
<?php $position =$_POST['position']; ?>


<!-- from index2 -->

<?php $title 					=$_POST["Field115"]; ?>
<?php $first 					=$_POST["Field116"]; ?>
<?php $last 					=$_POST["Field117"]; ?>
<?php $streetadd			=$_POST["Field3"];   ?>
<?php $address				=$_POST["Field4"]; 	?>
<?php $city						=$_POST["Field5"]; 	?>
<?php $state			    =$_POST["Field6"]; 	?>
<?php $postal					=$_POST["Field7"]; 	?>
<?php $country				=$_POST["Field8"]; 	?>
<?php $email					=$_POST["Field9"]; 	?>
<?php $mobilepart1		=$_POST["Field10"];	?>
<?php $mobilepart2		=$_POST["Field10-1"];?>
<?php $mobilepart3		=$_POST["Field10-2"];?>
<?php $comments				=$_POST["Field111"]; ?>
<?php $total					=$_POST["total"]; 	?>



<div class="container">
<?php $row_stat ="danger";?>

<!-- roller door info table -->
<?php echo '
<div class="container table-responsive">
  <h2>Quotation:Final</h2>
             
  <table class="table table-bordered table-striped table-condensed">
    <thead>
      <tr class= '.$row_stat.'">
        <th style="text-align:center;">Property</th>
        <th style="text-align:center;">Value</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td>Width</td>
        <td >'.$width.'<input type="hidden" name="width" value="'.$width.'"></td>        
      </tr>
      
 	  <tr>
      	<td>Height</td>
        <td >'.$height.'<input type="hidden" name="height" value="'.$height.'"></td>        
      </tr>

 	  <tr>
      	<td>90mm Optional Guides</td>
        <td >'.$guides.'<input type="hidden" name="guides" value="'.$guides.'"></td>        
      </tr>

 	  <tr>
      	<td>Side for motor</td>
        <td >'.$side.'<input type="hidden" name="side" value="'.$side.'"></td>        
      </tr>

 	  <tr>
      	<td>Choose 1st Hand Transmitter</td>
        <td >'.$hand1.'<input type="hidden" name="hand1" value="'.$hand1.'"></td>        
      </tr>

 	  <tr>
      	<td>Choose 2nd Hand Transmitter</td>
        <td >'.$hand2.'<input type="hidden" name="hand2" value="'.$hand2.'"></td>        
      </tr>

 	  <tr>
      	<td>Colour Required</td>
        <td >'.$color.'<input type="hidden" name="color" value="'.$color.'"></td>        
      </tr>

 	  <tr>
      	<td>Door installation position</td>
        <td >'.$position.'<input type="hidden" name="position" value="'.$position.'"></td>        
      </tr>

      <tr class= '.$row_stat.'>
      	<td><b>Total</b></td>
        <td ><b>LKR '.$total.'</b><input type="hidden" name="total" value="'.$total.'"></td>        
      </tr>

    </tbody>
  </table>

</div>


';

?>

<!-- customer table -->


<?php echo '
<div class="container table-responsive">
  <h2>Quotation:Customer Details</h2>
             
  <table class="table table-bordered table-striped table-condensed">
    <thead>
      <tr class= '.$row_stat.'>
        <th style="text-align:center;"></th>
        <th style="text-align:center;"></th>        
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td>Customer Name</td>
        <td >'.$title.' '.$first.' '.$last.'
        <input type="hidden" name="title" value="'.$title.'">
        <input type="hidden" name="fname" value="'.$first.'">
        <input type="hidden" name="lname" value="'.$last.'">
       </tr>
      
 	  <tr>
      	<td>Street Address</td>
        <td >'.$streetadd.'<input type="hidden" name="streetadd" value="'.$streetadd.'"></td>        
      </tr>

 	  <tr>
      	<td>Address Line 2</td>
        <td >'.$address.'<input type="hidden" name="address" value="'.$address.'"></td>        
      </tr>

 	  <tr>
      	<td>City</td>
        <td >'.$city.'<input type="hidden" name="city" value="'.$city.'"></td>        
      </tr>

 	  <tr>
      	<td>State/Province/Region</td>
        <td >'.$state.'<input type="hidden" name="state" value="'.$state.'"></td>        
      </tr>

 	  <tr>
      	<td>Postal/Zip Code/td>
        <td >'.$postal.'<input type="hidden" name="postal" value="'.$postal.'"></td>        
      </tr>

 	  <tr>
      	<td>Country</td>
        <td >'.$country.'<input type="hidden" name="country" value="'.$country.'"></td>        
      </tr>

 	  <tr>
      	<td>Email</td>
        <td >'.$email.'<input type="hidden" name="email" value="'.$email.'"></td>        
      </tr>

      <tr>
      	<td>Mobile Number</td>
        <td >'.$mobilepart1.$mobilepart2.$mobilepart3.'<input type="hidden" name="mobile" value="'.$mobilepart1.$mobilepart2.$mobilepart3.'"></td>        
      </tr>

 	  <tr>
      	<td>Comments</td>
        <td >'.$comments.'<input type="hidden" name="comments" value="'.$comments.'"></td>        
      </tr>


    </tbody>
  </table>

</div>


';

?>
<!-- submit button wrapper -->
<div>

		<div>
			<li class="buttons ">
		<div>
				<input type="hidden" name="currentPage" id="currentPage" value="hLtGoaO9Db30PD3RvUAHAUYzywuBe9eG3FN0KtRxEytI9o=">
			  <input id="saveForm" name="saveForm" class="btTxt submit active" type="submit" value="Submit" onmousedown="doSubmitEvents();" >
		</div>
	</li>

		<li class="hide">
		<label for="comment">Do Not Fill This Out</label>
		<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
		<input type="hidden" id="idstamp" name="idstamp" value="IMX/JF3SF54iA3zSwNVTLZPFFakgp6jhOGXIVT3g+WY=">
				<input type="hidden" id="stats" name="stats" value="{&quot;errors&quot;:0,&quot;startTime&quot;:0,&quot;endTime&quot;:0,&quot;referer&quot;:&quot;https:\/\/dinuka25.wufoo.com\/admin\/&quot;}">
				<input type="hidden" id="clickOrEnter" name="clickOrEnter" value="">
			</li>
	
					
		
		</div>

</div><!-- submit button wrapper end -->
</div>
<style type="text/css">
@import url(/stylesheets/ads/css/power.0163.css);
</style>

<a class="powertiny" href="http://www.twcwebs.com/" title="Powered by TWC" style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">
<span style="background:url(/images/powerlogo.png) no-repeat center 7px;margin:0 auto;display:inline-block !important;visibility:visible !important;text-indent:-9000px !important;position:static !important;overflow: auto !important;width:62px !important;height:30px !important">TWC</span>
<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">Powered by TWC</b>
</a>


<!-- JavaScript -->
<script src="js/dynamic.0163.js"></script>

<script>
	__RULES = [];
	__ENTRY = [];
	__PRICES = null;

	</script>



</form>
</div>
</body><button id="javascript-popup-blocker-notify" style="display: none;"></button>
</html> 