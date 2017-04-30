<?php
session_start();
$q = intval($_GET['q']);
$lecName = $_SESSION['username'];

//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Supervisee.php");
include_once("classes/ProjectSession.php");

$supervisee = new Supervisee();
$result = $supervisee->getStudentName($q);

echo '<div class="col-small">';
echo '  <label class="form-control" style="border: none;"> Supervisee Name </label>';
echo '</div>';

foreach ($result as $key => $res) {
  echo'<div class="form-group col-sm-7">';
  echo'<input class="form-control" readonly  name="studentName" id="studentName"  value="'.$res['FullName'].'">';
  echo'</div>';
}

echo '<div class="col-small">';
echo '  <label class="form-control" style="border: none;"> Supervisor Name </label>';
echo '</div>';
echo'<div class="form-group col-sm-7">';
echo'<input class="form-control" readonly name="supervisorName" id="supervisorName" value="'.$lecName.'">';
echo'</div>';


echo '<div class="col-small">';
echo '  <label class="form-control" style="border: none;"> Session No. </label>';
echo '</div>';

$projectSession = new ProjectSession();
$result = $projectSession->getNewSessionId();

foreach ($result as $key => $res) {
  echo'<div class="form-group col-sm-7">';
  echo'<input class="form-control" readonly  name="sessionNo" id="sessionNo" type="integer" value="'.$res['MaxSessionId'].'">';
  echo'</div>';
}

echo '<div class="col-small">';
echo '  <label class="form-control" style="border: none;"> Session Date </label>';
echo '</div>';
$result = $projectSession->getNewSessionDate();
echo'<div class="form-group ">';
echo'<input class="form-control"   name="date" id="text" type="date" value="'.$result.'">';
echo'</div>';

echo '<div class="col-small">';
echo '  <label class="form-control" style="border: none;"> Start Time </label>';
echo '</div>';
$result = $projectSession->getNewSessionStartTime();
echo'<div class="form-group ">';
echo'<input class="form-control"  name="startTime" id="startTime" type="time" value="'.$result.'">';
echo'</div>';

echo '<div class="col-small">';
echo '  <label class="form-control" style="border: none;"> End Time </label>';
echo '</div>';
$result = $projectSession->getNewSessionEndTime();
echo'<div class="form-group ">';
echo'<input class="form-control"  name="endTime" id="endTime" type="time" value="'.$result.'">';
echo'</div>';

echo '<div class="col-small">';
echo '  <label class="form-control" style="border: none;"> Meeting Notes </label>';
echo '</div>';

echo '<div class="form-group">';
echo '  <textarea class="form-control" rows="8" name="txtMeetingNotes" >';
echo '  </textarea>';
echo '</div>';



?>
