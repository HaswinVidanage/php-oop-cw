<?php
include_once 'DbConfig.php';

class LoginClass extends DbConfig
{
	public function __construct()
	{
		parent::__construct();
	}

  // this method verifies a given login
  public function verifyLogin($uName,$pWord,$uRole)
  {
    $query = "SELECT * FROM login WHERE uName= '$uName' and pWord= '$pWord' and access= '$uRole' " ;  
    $result = $this->connection->query($query);

		return $result;

  }

}
?>
