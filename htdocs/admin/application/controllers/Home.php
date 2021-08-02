<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->load->view('home_view');
		$this->load->view('BestGear_view');
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
	    }
	    return $str_name;
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
		$img = array();
		foreach ($ticked as $value) {
			if($value == 'product'){
				$this->load->model('product_model');
				$product = $this->product_model->SearchProduct($name);

				if($product){
					foreach ($product as $value) {
						$img[] = $this->product_model->GetImgProduct($value['avt']);
					}
				}
				
			}
			else if($value == 'shop'){
				$this->load->model('manage_acc_model');
				$shop = $this->manage_acc_model->SearchShop($name);
				
			}
		}
		$data = array('product' => $product, 'shop' => $shop, 'img' => $img, 'name' => $name);
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
		$data = array('info' => $info, 'img' => $img);
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
		$img = array();
		foreach ($info_product as $value) {
			$img[] = $this->product_model->GetImgProduct($value['avt']);
		}


		
		$data = array('info' => $info, 'info_product' => $info_product, 'img' => $img);
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
			foreach ($info as $value) {
				$img[] = $this->product_model->GetImgProduct($value['avt']);
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

			
			$data = array('info' => $info, 'img' => $img);
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
			unlink("uploads/".$filename);
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
			$userid_product = $this->product_model->GetSeller($id);
			if( ! $userid_product == $this->session->userdata('id_user')){
				echo "<script type='text/javascript'>alert('You do not have permission');</script>";
				redirect('/Home','refresh');
				return;
			}
			$img = $this->product_model->GetAllIDImg($id);
			foreach ($img as $value) {
				$filename = $this->product_model->GetImgProduct($value['id']);
				unlink("uploads/".$filename);
				$this->product_model->DelProductImg($value['id']);
			}
			if($this->product_model->DelProduct($id)){
					echo "<script type='text/javascript'>alert('Delete Successfully');</script>";
					redirect('/Home','refresh');
					return;
			}
			echo "<script type='text/javascript'>alert('Delete Unsuccessfully');</script>";
			redirect('/Home','refresh');
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */