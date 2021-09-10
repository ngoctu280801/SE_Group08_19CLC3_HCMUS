<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllShopID()
	{
		$result = $this->db->query("select id from user where permission = '2'");
		return $result->result_array();
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

}

/* End of file shop_model.php */
/* Location: ./application/models/shop_model.php */