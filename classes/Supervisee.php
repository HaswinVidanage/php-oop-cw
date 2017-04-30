<?php

include_once("classes/Crud.php");

class Supervisee extends Crud
{
	private $student_id = '';
	private $lecturer_id = '';
	private $student_name = '';
	private $student_surname = '';

	public function __construct()
	{
    parent::__construct();
	}

  public function selectSupervisor()
  {

  }

  public function getStudentName($sessionId)
  {
		$crud = new Crud();
    $sessionId = $crud->escape_string($sessionId);


		//$sql="SELECT * FROM login WHERE empId = '".$q."'";
    $query = "SELECT CONCAT(fName, ' ', lName) as FullName FROM login where empId = $sessionId ORDER BY empId DESC";
    $result = $crud->getData($query);
		return $result;
  }

	public function getAllStudents()
  {
		$crud = new Crud();
    $query = 'SELECT empId FROM login WHERE access = "student" ';
    $result = $crud->getData($query);
		return $result;
  }

	public function getLastSession($studentId)
	{
		$crud = new Crud();
		$query = "SELECT SES.*,CONCAT(std.fName,' ',std.lName) as Student_FullName,CONCAT(lec.fName,' ',lec.lName) as Lecture_FullName,std.access FROM sessions SES INNER JOIN LOGIN std ON SES.StudentId = std.empId INNER join login lec ON SES.lecId = lec.empId WHERE std.access = 'student' AND std.empId = $studentId ORDER BY SES.sessionNo DESC LIMIT 1";

    $result = $crud->getData($query);
		return $result;
	}

	public function getAllSessions($studentId,$lecturer_id)
	{
		$crud = new Crud();
		$query = "SELECT SES.*,CONCAT(std.fName,' ',std.lName) as Student_FullName,CONCAT(lec.fName,' ',lec.lName) as Lecture_FullName,std.access FROM sessions SES INNER JOIN LOGIN std ON SES.StudentId = std.empId INNER join login lec ON SES.lecId = lec.empId WHERE std.access = 'student' AND std.empId = $studentId AND lecId = $lecturer_id ORDER BY SES.sessionNo DESC";

    $result = $crud->getData($query);
		return $result;
	}
	public function getBasicSessionDetails($studentId)
	{
		$crud = new Crud();
		$query = "SELECT DISTINCT lecId as LecID,SES.StudentId,CONCAT(std.fName,' ',std.lName) as Student_FullName,CONCAT(lec.fName,' ',lec.lName) as Lecture_FullName FROM sessions SES INNER JOIN LOGIN std ON SES.StudentId = std.empId INNER join login lec ON SES.lecId = lec.empId WHERE std.access = 'student' AND std.empId = $studentId ORDER BY lecId DESC";

		//lec.id as Lecture_Id,
    $result = $crud->getData($query);
		return $result;
	}

}
?>
