<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function FindUsername($user)
	{
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from user where username = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($user));
			$result = mysqli_query($connection, $query);
			if($result && mysqli_num_rows($result) > 0){
				$connection->close();
				return true;
			}
			
		}
		return false;
	}

	public function ValidateLogin($user, $pass)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from user where username = '%s' and pass = '%s'";
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

	public function GetInfo($attribute, $user)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select %s from user where username = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($attribute), $connection->real_escape_string($user));
			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){
				$temp = mysqli_fetch_assoc($result);
				$result_string = $temp[$attribute];
				$connection->close();
				return $result_string;
			}
			
		}
		return '-1';
	}

	public function GetPermission($user)
	{
		return $this->GetInfo('permission', $user);
	}

	public function GetId($user)
	{
		return $this->GetInfo('id', $user);
	}

	public function Register($user, $pass, $name, $addr, $permission, $phonenum)
	{
		//INSERT INTO `user` (`id`, `name`, `phonenum`, `addr`, `permission`, `username`, `pass`) VALUES (NULL, 'ten', 'phone', 'addr', 'per', 'user', 'pass');

		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "insert into user (id, name, phonenum, addr, permission, username, pass) values (NULL, '%s', '%s', '%s', '%s', '%s', '%s')";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($name), $connection->real_escape_string($phonenum), $connection->real_escape_string($addr), $connection->real_escape_string($permission), $connection->real_escape_string($user), $connection->real_escape_string($pass));
			if($connection->query($sql)){
				$connection->close();
				return true;
			}
			$connection->close();
		}
		return false;
	}
	
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */