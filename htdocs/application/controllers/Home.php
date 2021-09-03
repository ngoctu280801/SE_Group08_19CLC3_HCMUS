<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$this->load->view('home_view');
		$this->load->view('BestGear_view');
	}

	function aboutUs()
	{
		$this->load->view('AboutUs_view');
	}

	function setConfigUpload()
	{
		$config = array();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '2048';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		$config['overwrite']     = FALSE;
		return $config;
	}

	function uploadFile()
	{
		$this->load->library('upload');
	    $dataInfo = array();
	    $str_name = array();
	    $files = $_FILES;
	    $total = count($_FILES['userfile']['name']);
	    for($i=0; $i < $total; $i++)
	    {           
	        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

	        $this->upload->initialize($this->setConfigUpload());
	        if( ! $this->upload->do_upload('userfile')){
	        	return $str_name;
	        }
	        $dataInfo[] = $this->upload->data();
	        $str_name[] = $dataInfo[$i]['file_name'];

	        // Create Resized image
	        $configResize = $this->setConfigResize($dataInfo[$i]['file_name']);
	    	$this->load->library('image_lib', $configResize);
	    	$this->image_lib->initialize($configResize);
			$this->image_lib->resize();
	    }
	    
	    
	    return $str_name;
	}

	public function setConfigResize($image_name)
	{
		$config = array();
		$config = array();
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$image_name;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 150;
		$config['height']       = 94;
		return $config;
	}

	public function toLogin()
	{
		redirect('/Login_register','refresh');
	}

	public function SignOut()
	{
		$this->session->unset_userdata('permission_user');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		redirect('/login_register','refresh');
	}

	public function Search()
	{
		$name = $this->input->post('name');
		$ticked = $this->input->post('ticked');
		if( ! $ticked || $name == ''){
			echo "<script type='text/javascript'>alert('Fail to Search');</script>";
			redirect('/Home','refresh');
			return;
		}
		$product = array();
		$shop = array();
		$img_thumb = array();
		foreach ($ticked as $value) {
			if($value == 'product'){
				$this->load->model('product_model');
				$product = $this->product_model->SearchProduct($name);

				if($product){
					foreach ($product as $value) {
						$filename = $this->product_model->GetImgProduct($value['avt']);
						$path = pathinfo('uploads/'.$filename);
						$img_thumb[] = $path['filename'].'_thumb.'.$path['extension'];
					}
				}
				
			}
			else if($value == 'shop'){
				$this->load->model('shop_model');
				$shop = $this->shop_model->SearchShop($name);
				
			}
		}
		
		$data = array('product' => $product, 'shop' => $shop, 'img' => $img_thumb, 'name' => $name);
		$this->load->view('search_view', $data, FALSE);
	}

	public function Product($id)
	{
		$this->load->model('product_model');
		if( ! $this->product_model->isProduct($id)){
			$this->load->view('not_found_view');
		}
		
		$info = $this->product_model->GetProductInfo($id);

		$img = array();
		$img = $this->product_model->GetAllIDImg($info[0]['id']);
		$img_thumb = array();
		$total = count($img);
		if($img){
			for ($i = 0; $i < $total; $i++) {
			 	$filename = $img[$i]['name'];
				$path = pathinfo('uploads/'.$filename);
				$img_thumb[] = $path['filename'].'_thumb.'.$path['extension'];
			}
		}
		$data = array('info' => $info, 'img' => $img, 'img_thumb' => $img_thumb);
		
		$this->load->view('product_view', $data, FALSE);
	}

	public function Shop($id)
	{
		$this->load->model('manage_acc_model');
		$info = $this->manage_acc_model->GetInfoDetail($id);
		if( (! $info) || $info[0]['permission'] != '2'){
			$this->load->view('not_found_view');
			return;
		}
		$this->load->model('product_model');
		$info_product = array();
		$info_product = $this->product_model->GetAllProduct($id);
		$img_thumb = array();
		if ($info_product){
			foreach ($info_product as $value) {
				$filename = $this->product_model->GetImgProduct($value['avt']);
				$path = pathinfo('uploads/'.$filename);
				$img_thumb[] = $path['filename'].'_thumb.'.$path['extension'];
			}
		}

		
		$data = array('info' => $info, 'info_product' => $info_product, 'img' => $img_thumb);
		$this->load->view('shop_view', $data, FALSE);
	}

	public function ManageAccount()
	{
		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else{
			$this->load->model('manage_acc_model');
			$info = $this->manage_acc_model->GetInfoDetail($this->session->userdata('id_user'));
			$info = array('attribute' => $info);
			$this->load->view('manage_acc_view', $info, FALSE);
		}
	}

	public function ChangeInfo()
	{
		$name = $this->input->post('name');
		$phone = $this->input->post('phonenum');
		$addr = $this->input->post('addr');
		if($name == '' || $phone ==  '' || $addr == ''){
			echo "<script type='text/javascript'>alert('All of fields CAN NOT BE BLANK');</script>";
			redirect('/Home','refresh');
			return;
		}
		$this->load->model('manage_acc_model');
		if($this->manage_acc_model->ChangeInfo($name, $phone, $addr, $this->session->userdata('id_user'))){
			echo "<script type='text/javascript'>alert('Change Information Successfully');</script>";
			redirect('/Home','refresh');
			return;
		}
		echo "<script type='text/javascript'>alert('Fail to change Information');</script>";
		redirect('/Home','refresh');
	}

	public function ChangePassword()
	{
		$oldpass = $this->input->post('oldpass');
		$newpass = $this->input->post('newpass');
		$newpass1 = $this->input->post('newpass1');
		if($oldpass == '' || $newpass == '' || $newpass1 == ''){
			echo "<script type='text/javascript'>alert('All of fields CAN NOT BE BLANK');</script>";
			redirect('/Home','refresh');
			return;
		}
		$this->load->model('login_model');
		$pass = $this->login_model->GetInfo('pass', $this->session->userdata('username'));
		if($pass != $oldpass){
			echo "<script type='text/javascript'>alert('Your old password is incorrect');</script>";
			redirect('/Home','refresh');
			return;
		}
		$this->load->model('manage_acc_model');
		if($this->manage_acc_model->ChangePass($this->session->userdata('id_user'), $newpass)){
			echo "<script type='text/javascript'>alert('Password has just changed');</script>";
			redirect('/Home','refresh');
			return;
		}
		echo "<script type='text/javascript'>alert('Fail to change password');</script>";
		redirect('/Home','refresh');
	}

	public function ManageProduct()
	{
		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else if($this->session->userdata('permission_user') != '2'){
			$this->load->view('not_found_view');
		}
		else{
			$this->load->model('product_model');
			$info = array();
			$info = $this->product_model->GetAllProduct($this->session->userdata('id_user'));
			$img = array();
			if($info){
				foreach ($info as $value) {
					$filename = $this->product_model->GetImgProduct($value['avt']);
					$path = pathinfo('uploads/'.$filename);
					$img[] = $path['filename'].'_thumb.'.$path['extension'];
				}
			}
			$data = array('info' => $info, 'img' => $img);
			$this->load->view('manage_product_view', $data, FALSE);
		}
	}

	public function toAddProduct()
	{
		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else if($this->session->userdata('permission_user') != '2'){
			$this->load->view('not_found_view');
		}
		else{
			
			$this->load->view('add_product_view');
		}
	}

	public function AddProduct()
	{
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$des = $this->input->post('des');
		$instock = $this->input->post('instock');
		if($name == '' || $price == '' || $des == '' || $instock == ''){
			echo "<script type='text/javascript'>alert('All of fields CAN NOT BE BLANK');</script>";
			redirect('/Home','refresh');
			return;
		}

		$str_name[] = array();
		$str_name = $this->uploadFile();
	   	if( ! $str_name){
	   		echo "<script type='text/javascript'>alert('Upload images unsuccessfully');</script>";
			redirect('/Home','refresh');
			return;
	   	}

	   	$this->load->model('product_model');
		if( ! $this->product_model->AddProduct($name, $price, $this->session->userdata('id_user'), $des, $str_name, $instock)){
			echo "<script type='text/javascript'>alert('Error to add this product');</script>";
			redirect('/Home','refresh');
			return;
		}
		echo "<script type='text/javascript'>alert('Added a Product');</script>";
		redirect('/Home','refresh');
	}

	public function ChangeProductInfo($id)
	{
		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else if($this->session->userdata('permission_user') != '2'){
			$this->load->view('not_found_view');
		}
		else{
			$this->load->model('product_model');
			$userid_product = $this->product_model->GetSeller($id);
			if( ! $userid_product == $this->session->userdata('id_user')){
				echo "<script type='text/javascript'>alert('You do not have permission');</script>";
				redirect('/Home','refresh');
				return;
			}
			
			$info = $this->product_model->GetProductInfo($id);
			$img = array();

			$img = $this->product_model->GetAllIDImg($info[0]['id']);
			$img_thumb = array();
			$total = count($img);
			if($img){
				for ($i = 0; $i < $total; $i++) {
				 	$filename = $img[$i]['name'];
					$path = pathinfo('uploads/'.$filename);
					$img_thumb[] = $path['filename'].'_thumb.'.$path['extension'];
				}
			}
			
			$data = array('info' => $info, 'img' => $img, 'img_thumb' => $img_thumb);
			$this->load->view('edit_product_view', $data, FALSE);
		}	
	}

	public function EditProductInfo()
	{
		$idproduct = $this->input->post('idproduct');
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$des = $this->input->post('des');
		$instock = $this->input->post('instock');
		if($name == '' || $price == '' || $des == '' || $instock == ''){
			echo "<script type='text/javascript'>alert('All of fields CAN NOT BE BLANK');</script>";
			redirect('/Home','refresh');
			return;
		}
		$this->load->model('product_model');
		if($this->product_model->UpdateProductInfo($idproduct, $name, $price, $des, $instock)){
			echo "<script type='text/javascript'>alert('Update Successfully');</script>";
			redirect('/Home','refresh');
			return;
		}
		echo "<script type='text/javascript'>alert('Update Unsuccessfully');</script>";
		redirect('/Home','refresh');
	}

	function unlinkIMG($pathStr)
	{
		$path = pathinfo($pathStr);
		# unlink original img
		unlink("uploads/".$path['basename']);
		# unlink resized img
		unlink("uploads/".$path['filename'].'_thumb.'.$path['extension']);
	}

	public function DelProductImg()
	{
		$idproduct = $this->input->post('idproduct');
		$ticked = $this->input->post('ticked');
		if( ! $ticked){
			echo "<script type='text/javascript'>alert('Select at least 1 field');</script>";
			redirect('/Home','refresh');
			return;
		}
		$this->load->model('product_model');

		foreach ($ticked as $value) {
			$filename = $this->product_model->GetImgProduct($value);
			$pathStr = 'uploads/'.$filename;
			$this->unlinkIMG($pathStr);
			if( ! $this->product_model->DelProductImg($value)){
				echo "<script type='text/javascript'>alert('Delete Unsuccessfully');</script>";
				redirect('/Home','refresh');
				return;
			}

		}
		echo "<script type='text/javascript'>alert('Delete Successfully');</script>";
		redirect('/Home','refresh');
	}

	public function AddProductImg()
	{
		$idproduct = $this->input->post('idproduct');
		$str_name[] = array();
		$str_name = $this->uploadFile();
	   	if( ! $str_name){
	   		echo "<script type='text/javascript'>alert('Upload images unsuccessfully');</script>";
			redirect('/Home','refresh');
			return;
	   	}
	   	$this->load->model('product_model');
	   	if($this->product_model->AddProductImg($idproduct, $str_name)){
	   		echo "<script type='text/javascript'>alert('Upload images Successfully');</script>";
			redirect('/Home','refresh');
			return;
	   	}
	   	echo "<script type='text/javascript'>alert('Upload images unsuccessfully');</script>";
		redirect('/Home','refresh');
	}

	public function SetProductAvt()
	{
		$idproduct = $this->input->post('idproduct');
		$avt = $this->input->post('avt');
		$avt = (int)$avt;
		$this->load->model('product_model');
		if($this->product_model->UpdateProductAvt($idproduct, $avt)){
			echo "<script type='text/javascript'>alert('Change image Successfully');</script>";
			redirect('/Home','refresh');
			return;
		}
		echo "<script type='text/javascript'>alert('Change images unsuccessfully');</script>";
		redirect('/Home','refresh');
	}

	public function DeleteProduct($id)
	{

		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else if($this->session->userdata('permission_user') != '2'){
			$this->load->view('not_found_view');
		}
		else{
			$this->load->model('product_model');
			$this->load->model('cart_model');
			$userid_product = $this->product_model->GetSeller($id);
			if( ! $userid_product == $this->session->userdata('id_user')){
				echo "<script type='text/javascript'>alert('You do not have permission');</script>";
				redirect('/Home','refresh');
				return;
			}
			$img = $this->product_model->GetAllIDImg($id);
			foreach ($img as $value) {
				$filename = $this->product_model->GetImgProduct($value['id']);
				$pathStr = 'uploads/'.$filename;
				$this->unlinkIMG($pathStr);
				$this->product_model->DelProductImg($value['id']);
			}
			if ($this->cart_model->del_DeletedProduct($id)){
				if($this->product_model->DelProduct($id)){
					echo "<script type='text/javascript'>alert('Delete Successfully');</script>";
					redirect('/Home','refresh');
					return;
				}
			}
			
			echo "<script type='text/javascript'>alert('Delete Unsuccessfully');</script>";
			redirect('/Home','refresh');
		}
	}

	public function cart()
	{
		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else if($this->session->userdata('permission_user') != '1'){
			$this->load->view('not_found_view');
		}
		else{
			$product = array();
			$img_thumb = array();
			$this->load->model('cart_model');
			$product = $this->cart_model->getProducts($this->session->userdata('id_user'));
			$this->load->model('product_model');
			if(!$product){
				echo "<script type='text/javascript'>alert('No product in cart');</script>";
				redirect('/Home','refresh');
				return;
			}
			foreach ($product as $value) {
				$filename = $this->product_model->GetImgProduct($value['avt']);
				$path = pathinfo('uploads/'.$filename);
				$img_thumb[] = $path['filename'].'_thumb.'.$path['extension'];
			}
			$data = array('product' => $product, 'img' => $img_thumb);
			
			$this->load->view('cart_view', $data, FALSE);
		}
	}

	function isCartParemeterValid($id_buyer, $id_product, $price)
	{
		$this->load->model('product_model');
		$info = array();
		$info = $this->product_model->GetProductInfo($id_product);
		if($price != (int)$info[0]['price']){
			echo "<script type='text/javascript'>alert('Error to check price of product. Please try again');</script>";
			redirect('/Home','refresh');
			return false;
		}
		else if( ! $this->product_model->isProduct($id_product)){
			echo "<script type='text/javascript'>alert('Error to check product information. Please try again');</script>";
			redirect('/Home','refresh');
			return false;
		}
		else if($this->session->userdata('id_user') != $id_buyer){
			echo "<script type='text/javascript'>alert('Error to check your identity. Please try again');</script>";
			redirect('/Home','refresh');
			return false;
		}
		return true;
	}

	public function AddToCart()
	{
		$id_buyer = $this->input->post('id_buyer');
		$id_product = $this->input->post('id_product');
		$quantity = $this->input->post('quantity');
		$quantity = (int)$quantity;
		$price = $this->input->post('price');
		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else if($this->session->userdata('permission_user') != '1'){
			$this->load->view('not_found_view');
			return;
		}
		if($this->isCartParemeterValid($id_buyer, $id_product, $price)){
			$this->load->model('cart_model');
			if($this->cart_model->addToCart($id_buyer, $id_product, $quantity, $price)){
				echo "<script type='text/javascript'>alert('Add product to cart Successfully');</script>";
				redirect('/Home/Product/'.$id_product,'refresh');
			}
			else{
				echo "<script type='text/javascript'>alert('Failed to Add product to cart');</script>";
				redirect('/Home/Product/'.$id_product,'refresh');
			}
		}
	}

	public function DeleteFromCart()
	{
		if(isset($_SESSION['id_user']) == false){
			redirect('/login_register','refresh');
		}
		else if($this->session->userdata('permission_user') != '1'){
			$this->load->view('not_found_view');
		}
		$id_buyer = $this->input->post('id_buyer');
		$id_product = $this->input->post('id_product');
		$stt = $this->input->post('stt');
		$quantity = $this->input->post('quantity');
		$quantity = (int)$quantity;
		$price = $this->input->post('price');
		if($this->isCartParemeterValid($id_buyer, $id_product, $price)){
			$this->load->model('cart_model');
			if($this->cart_model->delFromCart($stt, $id_buyer, $id_product)){
				echo "<script type='text/javascript'>alert('Delete Successfully');</script>";
				redirect('/Home/cart','refresh');
			}
			else{
				echo "<script type='text/javascript'>alert('Error to delete product from cart. Please try again');</script>";
				redirect('/Home/cart','refresh');
			}
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */