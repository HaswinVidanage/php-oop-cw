<?php
session_start();

if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>

<!DOCTYPE html>
<!-- saved from url=(0054)https://dinuka25.wufoo.com/forms/customer-information/ -->
<html class="safari"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>
Customer Information
</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="robots" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<meta name="viewport" content="width=device-width, initial-scale=1">
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

<body id="public" class="noI" onorientationchange="window.scrollTo(0, 1)">

<?php
// Echo session variables that were set on previous page
echo "Logged in as  " . $_SESSION["username"] . ".<br>";
?>


<form id="form2" name="form2" class="wufoo topLabel page1" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post"  action="final_order.php">


<?php $width 	=$_POST['Field15']; ?>
<?php $height 	=$_POST['Field16']; ?>
<?php $guides 	=$_POST['Field19']; ?>
<?php $side  	=$_POST['Field20']; ?>
<?php $hand1 	=$_POST['Field21']; ?>
<?php $hand2 	=$_POST['Field22']; ?>
<?php $color 	=$_POST['Field23']; ?>
<?php $position =$_POST['Field24']; ?>
<?php $total = 150000; ?> 
<!-- total is kept a fixed value till three sinha indutries give us the pricing scheme -->

<div class="container">
<?php $row_stat ="danger";?>

<?php echo '
<div class="container table-responsive">
  <h2>Quotation</h2>
             
  <table class="table table-bordered table-striped table-condensed">
    <thead>
      <tr class= '.$row_stat.'>
        <th style="text-align:center;">Property</th>
        <th style="text-align:center;">Value</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td>Width</td>
         <td >'.$width.'<input type="hidden" name="width"  value="'.$width.'"></td>


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

<div id="container" class="ltr">
	<h1 id="logo">
				<a href="" title="Powered by Team Alpha">Team Alpha</a>
			</h1>
  
<header id="header" class="info">
	<h2>Customer Information</h2>
	<div></div>
</header>

<ul>
	
	
<li id="fo2li115" class="name notranslate focused">
	<label class="desc" id="title115" for="Field115">Name</label>
	<span>
		<input id="Field115" name="Field115" type="text" class="field text" required="" value="Mr" size="2" tabindex="1" onkeyup="handleInput(this);" onchange="handleInput(this);">
		<label for="Field115">Title</label>
	</span>
	<span>
		<input id="Field116" name="Field116" type="text" class="field text fn" required="" value="" size="8" tabindex="2" onkeyup="handleInput(this);" onchange="handleInput(this);">
		<label for="Field116">First</label>
	</span>
	<span>
		<input id="Field117" name="Field117" type="text" class="field text ln" required="" value="" size="12" tabindex="3" onkeyup="handleInput(this);" onchange="handleInput(this);">
		<label for="Field117">Last</label>
	</span>

	</li>



<li id="fo2li3" class="complex notranslate      ">
	<label class="desc" id="title3" for="Field3">
		Address
			</label>
	<div>
			<span class="full addr1">
			<input id="Field3" name="Field3" type="text" class="field text addr" required="" value="" tabindex="5" onkeyup="handleInput(this);" onchange="handleInput(this);">
			<label for="Field3">Street Address</label>
			</span>
			<span class="full addr2">
			<input id="Field4" name="Field4" type="text" class="field text addr" required="" value="" tabindex="6" onkeyup="handleInput(this);" onchange="handleInput(this);">
			<label for="Field4">Address Line 2</label>
			</span>
			<span class="left city">
			<input id="Field5" name="Field5" type="text" class="field text addr" required="" value="" tabindex="7" onkeyup="handleInput(this);" onchange="handleInput(this);">
			<label for="Field5">City</label>
			</span>
			<span class="right state">
			<input id="Field6" name="Field6" type="text" class="field text addr" required="" value="" tabindex="8" onkeyup="handleInput(this);" onchange="handleInput(this);">
			<label for="Field6">State / Province / Region</label>
			</span>
			<span class="left zip">
			<input id="Field7" name="Field7" type="text" class="field text addr" required="" value="" maxlength="15" tabindex="9" onkeyup="handleInput(this);" onchange="handleInput(this);">
			<label for="Field7">Postal / Zip Code</label>
			</span>
			<span class="right country">
			<select id="Field8" name="Field8" class="field select addr"  tabindex="10" onclick="handleInput(this);" onkeyup="handleInput(this);">
									<option value=""></option>
									<option value="United States">United States</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="Australia">Australia</option>
									<option value="Canada">Canada</option>
									<option value="France">France</option>
									<option value="New Zealand">New Zealand</option>
									<option value="India">India</option>
									<option value="Brazil">Brazil</option>
									<option value="----">----</option>
									<option value="Afghanistan">Afghanistan</option>
									<option value="Åland Islands">Åland Islands</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Aruba">Aruba</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
									<option value="Botswana">Botswana</option>
									<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
									<option value="Brunei Darussalam">Brunei Darussalam</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
									<option value="Republic of the Congo">Republic of the Congo</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Côte d&#39;Ivoire">Côte d'Ivoire</option>
									<option value="Croatia">Croatia</option>
									<option value="Cuba">Cuba</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="East Timor">East Timor</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Greece">Greece</option>
									<option value="Grenada">Grenada</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-Bissau">Guinea-Bissau</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran">Iran</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="North Korea">North Korea</option>
									<option value="South Korea">South Korea</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Laos">Laos</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libya">Libya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macedonia">Macedonia</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mexico">Mexico</option>
									<option value="Micronesia">Micronesia</option>
									<option value="Moldova">Moldova</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montenegro">Montenegro</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Namibia">Namibia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="Netherlands Antilles">Netherlands Antilles</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau">Palau</option>
									<option value="Palestine">Palestine</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Romania">Romania</option>
									<option value="Russia">Russia</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
									<option value="Saint Lucia">Saint Lucia</option>
									<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
									<option value="Samoa">Samoa</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Serbia">Serbia</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia">Slovakia</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka" selected="selected">Sri Lanka</option>
									<option value="Sudan">Sudan</option>
									<option value="Suriname">Suriname</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Syria">Syria</option>
									<option value="Taiwan">Taiwan</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania">Tanzania</option>
									<option value="Thailand">Thailand</option>
									<option value="Togo">Togo</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Vatican City">Vatican City</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Virgin Islands, British">Virgin Islands, British</option>
									<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
									<option value="Yemen">Yemen</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
							</select>
			<label for="Field8">Country</label>
			</span>
			</div>
	</li>



<li id="fo2li9" class="notranslate">
	<label class="desc" id="title9" for="Field9">
		Email
			</label>
	<div>
		<input id="Field9" name="Field9" type="email" spellcheck="false" class="field text medium" required="" value="" maxlength="255" tabindex="11" onkeyup="handleInput(this);" onchange="handleInput(this);">
	</div>
	</li>



<li id="fo2li10" class="phone notranslate">
	<label class="desc" id="title10" for="Field10">Mobile Number</label>
	<span>
		<input id="Field10" name="Field10" type="tel" class="field text" required="" value="07" size="3" maxlength="3" tabindex="12" onkeyup="handleInput(this);" onchange="handleInput(this);">
		<label for="Field10">07#</label>
	</span>
	<span class="symbol">-</span>
	<span>
		<input id="Field10-1" name="Field10-1" type="tel" class="field text" required="" value="" size="3" maxlength="3" tabindex="13" onkeyup="handleInput(this);" onchange="handleInput(this);">
		<label for="Field10-1">###</label>
	</span>
	<span class="symbol">-</span>
	<span>
	 	<input id="Field10-2" name="Field10-2" type="tel" class="field text" required="" value="" size="4" maxlength="4" tabindex="14" onkeyup="handleInput(this);" onchange="handleInput(this);">
		<label for="Field10-2">####</label>
	</span>
	</li>



	<li id="fo2li111" class="notranslate">

	
		<label class="desc" id="title111" for="Field111">Please let us know any comments or questions that you might have.
		</label>

		<div>
			<textarea id="Field111" name="Field111" class="field textarea medium" required="" spellcheck="true" rows="10" cols="50" tabindex="15" onkeyup="handleInput(this); " onchange="handleInput(this);"></textarea>
		</div>

	
	
	</li>


 

	
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
	

 

</div><!--container-->

</div> <!-- new div wrapper -->
<style type="text/css">
@import url(/stylesheets/ads/css/power.0164.css);
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
</body><button id="javascript-popup-blocker-notify" style="display: none;"></button></html>