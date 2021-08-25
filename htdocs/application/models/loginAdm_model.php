<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class loginAdm_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function ValidateLogin($user, $pass)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from admin where id = '%s' and password = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($user), $connection->real_escape_string($pass));
			$result = mysqli_query($connection, $query);
			if($result && mysqli_num_rows($result) > 0){
				$connection->close();
				return true;
			}
			
		}
		return false;
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */