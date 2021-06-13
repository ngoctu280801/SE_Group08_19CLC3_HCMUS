<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function isProduct($id)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from product where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($id));
			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){
				$connection->close();
				return true;
			}
			$connection->close();
			return false;
		}
	}

	public function SearchProduct($name)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from product where name like '%s%s%s'";
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

	public function AddProduct($name, $price, $userid, $description, $img, $instock)
	{
		$img_arr = array();
		$img_arr = $img;
		//INSERT INTO `product` (`id`, `name`, `price`, `userid`, `description`) VALUES (NULL, 'ten', 'gia', 'userid', 'des');

		//INSERT INTO `img` (`id`, `name`, `id_product`) VALUES (NULL, 'ten', 'userid');
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "insert into product (id, name, price, userid, description, instock) values (NULL, '%s', '%s', '%s', '%s', '%s')";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($name), $connection->real_escape_string($price), $connection->real_escape_string($userid), $connection->real_escape_string($description), $connection->real_escape_string($instock));

			if($connection->query($sql)){
				$id_product = $connection->insert_id;
				foreach ($img_arr as $img_name) {
					$sql2 = "insert into img (id, name, id_product) values (NULL, '%s', '%s')";
					$sql2 = sprintf($sql2, $connection->real_escape_string($img_name), $connection->real_escape_string($id_product));
					$connection->query($sql2);
				}
				$avt = $connection->insert_id;
				$this->UpdateProductAvt($id_product, $avt);
				$connection->close();
				return true;
			}
			$connection->close();
		}
		return false;
	}

	public function UpdateProductInfo($id, $name, $price, $description, $instock)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "Update product Set name = '%s', price = '%s', description = '%s', instock = '%s' Where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($name), $connection->real_escape_string($price), $connection->real_escape_string($description), $connection->real_escape_string($instock), $connection->real_escape_string($id));
			if(mysqli_query($connection, $sql)){
				return true;
			}
			
		}
		return false;
	}

	public function DelProduct($id)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "Delete from product where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($id));
			if(mysqli_query($connection, $sql)){
				return true;
			}
			
		}
		return false;
	}

	public function AddProductImg($idproduct, $img)
	{
		$img_arr = array();
		$img_arr = $img;
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			foreach ($img_arr as $img_name) {
				$sql = "insert into img (id, name, id_product) values (NULL, '%s', '%s')";
				$sql = sprintf($sql, $connection->real_escape_string($img_name), $connection->real_escape_string($idproduct));
				$connection->query($sql);
			}
			$connection->close();
			return true;
		}
		return false;
	}

	public function DelProductImg($img)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "Delete from img where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($img));
			if(mysqli_query($connection, $sql)){
				return true;
			}
			
		}
		return false;
	}

	public function UpdateProductAvt($id, $avt)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "Update product Set avt = '%s' Where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($avt), $connection->real_escape_string($id));
			if(mysqli_query($connection, $sql)){
				return true;
			}
			
		}
		return false;
	}

	public function GetAllProduct($user)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from product where userid = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($user));
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

	public function GetImgProduct($avt)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select name from img where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($avt));
			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){
				$temp = mysqli_fetch_assoc($result);
				$result_string = $temp['name'];
				$connection->close();
				return $result_string;
			}
			
		}
	}

	public function GetAllIDImg($idproduct)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from img where id_product = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($idproduct));
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

	public function GetSeller($idproduct)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select userid from product where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($idproduct));
			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){
				$temp = mysqli_fetch_assoc($result);
				$result_string = $temp['userid'];
				$connection->close();
				return $result_string;
			}
			
		}
	}

	public function GetProductInfo($idproduct)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select * from product where id = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($idproduct));
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

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */