
<?PHP
  //Start the Session
  session_start();
  if (isset($_POST['StudentID']) and isset($_POST['StudentID']) ){

    $stdId 	=$_POST['StudentID'];
    $stuname  =$_POST['studentName'];
    $lecname	= $_SESSION['empId'];
    $sessionNo  =$_POST['sessionNo'];
    $date  =$_POST['date'];
    $start  =$_POST['startTime'];
    $end  =$_POST['endTime'];
    $meeting  =$_POST['txtMeetingNotes'];


    //including the database connection file
    include_once("classes/Crud.php");
    include_once("classes/ProjectSession.php");

    $sql = "INSERT INTO sessions (StudentId,lecId,sessionNo,sesDate,startTime,endTime,meetingNotes)
    VALUES ('$stdId','$lecname','$sessionNo','$date','$start','$end','$meeting')";

    $newProject = new ProjectSession();
    $result = $newProject->addTask($sql);

    if ($result == true) {
      echo "Session with $stuname was added successfully ";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <title>newSession</title>

    <script>
    $(document).ready(function(){

      showUser(1);

    });
    </script>

    <script>
    function showUser(str) {

      if (str=="") {
        document.getElementById("results").innerHTML="";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("results").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","populateNewSession.php?q="+str,true);
      xmlhttp.send();
}
</script>
  </head>

  <body>
  <div class="container">
    <div class="col-sm-3"> </div>
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">new session</h3>
        </div>
        <div class="panel-body">
          <form class="" action="" method="post">
            <fieldset>
            <div class="form-group">
            </div>
            <div class="form-group">

              <div class="col-sm-5">
                <label class='form-control' style="border: none;">
                  Select Student ID
                </label>
              </div>

              <?php
               include_once("classes/Supervisee.php");
               $Supervisee = new Supervisee();
               $result = $Supervisee->getAllStudents();

               echo"<div class='form-group col-sm-7'>";
               echo"<select id='StudentID'  name='StudentID' class='form-control' placeholder='Position'  required='' autofocus onchange='showUser(this.value)' />";

               foreach ($result as $key => $res) {
                  echo"<option  value=".$res['empId'].">".$res['empId']."</option>";
                }
                echo "</select>";
                echo "</div>";
                ?>
             </div>
             <div id="results"><b>Select the Student Id.</b></div>


            <div class="col-sm-10"> </div>
            <div class="col-sm-2"><button type="submit"  class="btn btn-danger btn-md" name="submit">save</button></div>
          </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-3"> </div>
  </div>
    </form>
  </body>
  </html>
