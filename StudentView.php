<?php
session_start();
//access control through session variables
if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome</title>

<link rel="stylesheet" type="text/css" href="css/StudentView.css" />
<script src="js/jquery-1.10.2.min.js"></script>

<!-- javascript for iframes and load -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#myTab li:eq(1) a").tab('show');
    });

    $(document).ready(function() {
        $('body iframe').load(function(){
             $(window).scrollTop(0);
        });
    });

    $('#iframediv').load('populateSample.php');
    </script>
    <style type="text/css">
            	.bs-example{
            		margin: 20px;
            	}

                iframe {display: block; width: 100%; border: none; overflow-y: auto; overflow-x: hidden;}
    </style>

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
            <li class="active"><a data-toggle="tab" href="#sectionA">View last session</a></li>
            <li><a data-toggle="tab" href="#sectionB">view All sessions</a></li>
            <li style="position: absolute;right: 104px;top: 28px;">
                <?php
                // Echo session variables that were set on previous page
                echo "<b>Welcome " . $_SESSION["username"] . "</b> <br>";
                ?>

            </li>
            <li style="position: absolute;right: 25px;" onclick="logout()"><button class="btn btn-red" name="approve" value="insert">Logout</button></li>
            </div>

        </ul>
        <div class="tab-content">
            <div id="sectionA" class="tab-pane fade in active">
                <div><h3 style="margin-left: 575px;">Previous Session Details</h3> </div>
                <div class="content">

                <iframe  src="lastStdSession.php" scrolling="auto" style="height:100vw;" sandbox="allow-forms allow-scripts">
                  <p>Your browser does not support iframes.</p>
                </iframe>
                </div>
            </div>
            <div id="sectionB" class="tab-pane fade">

                <div class="content">
                <iframe  src="populateSample.php" scrolling="auto" style="height:100vw;" sandbox="allow-forms allow-scripts">
                <!-- 1071px -->
                  <p>Your browser does not support iframes.</p>
                </iframe>
                </div>
            </div>

        </div>
    </div>
    </body>
    </html>
