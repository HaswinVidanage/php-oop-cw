<?php

include_once("classes/Crud.php");

class Supervisor
{
	private $lecturer_name = '';
	private $lecturer_surname = '';
	private $lecturer_office = '';

	public function __construct()
	{
    parent::__construct();
	}

  public function getSuperName($sessionId)
  {
    $sessionId = $crud->escape_string($sessionId);

    $query = "SELECT * FROM login where empId = $sessionId ORDER BY id DESC";
    $result = $crud->getData($query);
  }
}
?>
