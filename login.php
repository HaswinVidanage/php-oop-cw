<?php header('Access-Control-Allow-Origin: *'); ?>

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<script>
    function verifyLogin()
    {
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

            // /console.log(xmlhttp.responseText);
            if(xmlhttp.responseText != null || xmlhttp.responseText!= ''){
              var returnVal = xmlhttp.responseText;
              returnVal = returnVal.replace(/\s/g, '');

              //console.log(returnVal);

              if(returnVal != null && returnVal.length > 0){
                if(returnVal == 'student'){
                  window.location = "StudentView.php";
                } else if(returnVal == 'lec'){
                  window.location = "LecView.php";
                } else {
                  alert("Sorry. Username and Password does not match.");
                }

              }
            } else {
              alert("Sorry. Username and Password does not match.");
            }


          }
        }

        var username    = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var taskOption = document.getElementById("taskOption").value;

        // action, location and sent to the server   -start
        xmlhttp.open("POST","loginVerify.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("username=" + username+" & password=" + password+" & taskOption=" + taskOption);
        //  - End
    }
</script>
</head>
<body>
  <div class="container">
    <div class="col-small"></div>
    <div class="col-small" style="margin-top: 30px">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title">Login</h1>
        </div>
        <div class="panel-body">
          <form name="form1" action="javascript:void(0);"  onSubmit="verifyLogin();">
            <fieldset>
              <div class="form-group">
                <select  class="form-control" name="taskOption" id="taskOption">
                  <option value="student">Student</option>
                  <option value="lecturer">Lecturer</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" name="username" id="username" placeholder="Enter your username" type="text" required="" autofocus/>
              </div>
              <div class="form-group">
                <input class="form-control" name="password" id="password" placeholder="Enter your password" type="password" required="" />
              </div>

              <button type="submit" class="btn btn-red" name="submit">Log in</button>
          </fieldset>
          </form>
            <div id="myDiv"></div>
        </div>
      </div>
    </div>
    <div class="col-small"></div>
  </div>
 </body>

</html>
