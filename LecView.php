<?php
session_start();

//Checks access and redirects
if($_SESSION['logged_in'] == 2) {  } else { header("Location: login.php"); }

?>

<!-- This page is what the Supervisor sees first-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="css/LecView.css" />
<script src="js/jquery-1.10.2.min.js"></script>

<!-- This javascript code loads newSession.php file first on page load-->
<script type="text/javascript">
      $(document).ready(function(){
          $("#myTab li:eq(1) a").tab('show');
      });

      $(document).ready(function() {
          $('body iframe').load(function(){
               $(window).scrollTop(0);
          });
      });
      $('#iframediv').load('newSession.php');
</script>

<style type="text/css">
        	.bs-example{
        		margin: 20px;
        	}

          iframe {display: block; width: 100%; border: none; overflow-y: auto; overflow-x: hidden;}

          .not-active {
             pointer-events: none!important;
             cursor: default!important;
          }
</style>

<!-- This javascript sends data to logout.php-->
<script type ="text/javascript">
    function logout()
    {
        var xmlhttp;

        if(window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
            window.location.replace("login.php");
          }
        }

        xmlhttp.open("POST","logout.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();
    }
</script>

</head>
<body>
<div class="bs-example">
   <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#sectionA">new session</a></li>
        <li><a data-toggle="tab" href="#">select supervisor</a></li>
          <li><a data-toggle="tab" href="#">list of supervisees grouped by supervisor</a></li>
        <div class="contatiner">
        <li style="position: absolute;right: 104px;top: 28px;">
            <?php
            // Echo session variables : username
            echo "<b>Welcome " . $_SESSION["username"] . "</b> <br>";
            ?>

        </li>
        <li style="position: absolute;right: 25px;" onclick="logout()"><button class="btn btn-red" name="approve" value="insert">Logout</button></li>
        </div>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <h3>New Session</h3>
            <div class="content">

            <iframe  src="newSession.php" scrolling="auto" style="height:100vw;" sandbox="allow-modals allow-forms allow-popups allow-scripts allow-same-origin">
              <p>Your browser does not support iframes.</p>
            </iframe>
            </div>
        </div>

    </div>
</div>
</body>
</html>
