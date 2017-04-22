<?php

include_once("classes/Crud.php");

class ProjectSession extends Crud
{
	private $session_no = '';
	private $session_date = '';
	private $start_time = '';
  private $end_time = '';
  private $task_to_do = '';

	public function __construct()
	{
    parent::__construct();
	}

	//addTask  : adds new session/ task
  public function addTask($query)
  {
		//insert data to database
		$crud = new Crud();
		$result = $crud->execute($query);
		return $result;
  }

  public function editTime()
  {

  }

  public function getNewSessionId()
  {
		$crud = new Crud();
    $query = "SELECT (MAX(sessionNo) + 1)  as MaxSessionId FROM sessions";
    $result = $crud->getData($query);
		return $result;
  }

  public function getPrevSessions($supervisorId)
  {
    $sessionId = $crud->escape_string($supervisorId);
    $query = "SELECT * FROM SESSIONS WHERE LecId = $sessionId ORDER BY SessionId DESC";
    $result = $crud->getData($query);
		return $result;
  }


	public function getNewSessionDate()
  {
		$sessionDate =date("Y-m-d");
    $result = $sessionDate;
		return $result;
  }

	public function getNewSessionStartTime()
  {
		//returns current time
		$sessionStartTime =date('H:i');
    $result = $sessionStartTime;
		return $result;
  }

	public function getNewSessionEndTime()
  {
		//adds one hour to current time
		$result = date('H:i', strtotime('+1 hour'));
		return $result;
  }

}
?>
