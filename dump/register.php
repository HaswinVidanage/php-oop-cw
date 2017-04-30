<?php header('Access-Control-Allow-Origin: *'); ?>

<?php
session_start();

if($_SESSION['logged_in'] == 1) {  } else { header("Location: login.php"); }
 //prevents redirected page from loading without access from salesView
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<script>

    function sendMe()
    {
        if (form1.pass1.value != form1.pass2.value)
        {
            alert("Password does not match");
            form1.pass2.value = "";
            form1.pass1.focus();
            return false;
        }
        else
        {
          if(confirm("Are You Sure ?"))
          {
            loadXMLDoc();
          }

        }
    }
</script>
<script>
    function loadXMLDoc()
    {

      $('#response').append('<img src="loader.gif" id="loader1">');

      var xmlhttp;
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
          document.getElementById("response").innerHTML= xmlhttp.responseText;

          }
        }

        // 2. when XHR feed  the response from the server

        var Title    = document.getElementById("title").value;
        var FirsName = document.getElementById("fname").value;
        var LastName = document.getElementById("lname").value;
        var Uname    = document.getElementById("uname").value;
        var test    = document.getElementById("pass1").value;
        var Pword    = document.getElementById("pass1").value;


        // action, location and sent to the server   -start
        xmlhttp.open("POST","registerNew.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("title=" + Title+" & fname=" + FirsName+" & lname=" + LastName + "  & Test=" + test +" & uname=" + Uname );
        //  - End
    }
</script>
</head>
<body>
<div class="container">
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="margin-top: 30px">
    <div class="login-panel panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Register</h1>
      </div>
      <div class="panel-body">
        <form name="form1" action="javascript:void(0);"  onSubmit="sendMe();">
          <fieldset>

            <div class="form-group">
                <select id="title" class="form-control" placeholder="Position"  required="" autofocus />
                  <option value="agent">Agent</option>
                  <option value="sales">Sales</option>
              </select>
            </div>
            <div class="form-group">
              <input class="form-control" id="fname" placeholder="First Name" name="fname" type="username" required autofocus/>
            </div>
            <div class="form-group">
              <input class="form-control" id="lname" placeholder="Surname" name="lname" type="username" required autofocus/>
            </div>
            <div class="form-group">
              <input class="form-control" id="uname" placeholder="Username" name="uname" type="username" required autofocus/>
            </div>

            <div class="form-group">
              <input class="form-control" id="pass1" placeholder="Password" name="pass1" type="password"  required autofocus/>
            </div>

            <div class="form-group">
              <input class="form-control" id="pass2" placeholder="Re Enter Password" name="pass2" type="password"  required autofocus />
            </div>

            <div class="form-group">
            <span id="response" style="color:green"></span>
          </div>
            <button type="submit" class="btn btn-sm btn-danger" >Resgiter</button>


          </fieldset>
        </form>

          <div id="myDiv"></div>
      </div>
    </div>
  </div>
  <div class="col-sm-4"></div>
</div>




 </body>

</html>
