<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_acc_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function SearchShop($name)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select id, name, phonenum, addr from user where name like '%s%s%s' and permission = '2'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, '%', $connection->real_escape_string($name), '%');
			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){
				$arr = [];
				while($line = mysqli_fetch_array($result))
				{
				    $arr[] = $line;
				}
				
				$connection->close();
				return $arr;
			}
			
		}
	}

	public function ChangeInfo($name, $phone, $addr, $id)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "Update user Set name = '%s', phonenum = '%s', addr = '%s' Where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($name), $connection->real_escape_string($phone), $connection->real_escape_string($addr), $connection->real_escape_string($id));
			if(mysqli_query($connection, $sql)){
				return true;
			}
			
		}
		return false;
	}

	public function ChangePass($id, $newpass)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "Update user Set pass = '%s' Where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($newpass), $connection->real_escape_string($id));
			if(mysqli_query($connection, $sql)){
				return true;
			}	
		}
		return false;
	}

	public function GetInfoDetail($id)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select name, phonenum, addr, permission from user where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($id));
			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){
				$arr = [];
				while($line = mysqli_fetch_array($result))
				{
				    $arr[] = $line;
				}
				
				$connection->close();
				return $arr;
			}
			
		}
	}
}

/* End of file manage_acc_model.php */
/* Location: ./application/models/manage_acc_model.php */