<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addToCart($id_buyer, $id_product, $quantity, $price)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "insert into cart (stt, id_buyer, id_product, quantity, price) values (NULL, '%s', '%s', '%s', '%s')";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($id_buyer), $connection->real_escape_string($id_product), $connection->real_escape_string($quantity), $connection->real_escape_string($price));
			if(mysqli_query($connection, $sql)){
				return true;
			}	
		}
		return false;
	}

	public function delFromCart($stt, $id_buyer, $id_product)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "delete from cart where stt = '%s' and id_buyer = '%s' and id_product = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($stt), $connection->real_escape_string($id_buyer), $connection->real_escape_string($id_product));
			if(mysqli_query($connection, $sql)){
				return true;
			}	
		}
		return false;
	}

	public function del_DeletedProduct($id_product)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$sql = "delete from cart where id_product = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$sql = sprintf($sql, $connection->real_escape_string($id_product));
			if(mysqli_query($connection, $sql)){
				return true;
			}	
		}
		return false;
	}

	public function getProducts($id_buyer)
	{
		// Ket noi database
		$connection = mysqli_connect("localhost", "root", "", "qlbh");
		// Neu ket noi thanh cong
		if (!$connection->connect_error) {
			$query = "select cart.id_product, product.name, product.avt, cart.stt, cart.id_buyer, cart.quantity, cart.price from product join cart on (cart.id_product = product.id) where cart.id_buyer = '%s'";
			// Xy ly cau truy van de tranh van de SQL Injection
			$query = sprintf($query, $connection->real_escape_string($id_buyer));
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

/* End of file cart_model.php */
/* Location: ./application/models/cart_model.php */