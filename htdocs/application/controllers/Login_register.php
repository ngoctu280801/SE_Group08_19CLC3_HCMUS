<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login_register_view');	
	}

	public function Register()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$pass1 = $this->input->post('password1');
		$name = $this->input->post('name');
		$addr = $this->input->post('addr');
		$phonenum = $this->input->post('phonenum');
		$permission = $this->input->post('plan');
		$permission = (int)$permission;
		if($user == '' || $pass == '' || $pass1 == '' || $phonenum == '' ||
			$name == '' || $addr == ''){
			
			echo "<script type='text/javascript'>alert('All of fields CAN NOT BE BLANK');</script>";
			redirect('/Login_register','refresh');
			return;
		}
		if($pass != $pass1){
			echo "<script type='text/javascript'>alert('Your password does not match');</script>";
			redirect('/Login_register','refresh');
			return;
		}
		$this->load->model('login_model');
		if($this->login_model->FindUsername($user)){
			echo "<script type='text/javascript'>alert('The username has already existed');</script>";
			redirect('/Login_register','refresh');
			return;
		}
		if($this->login_model->Register($user, $pass, $name, $addr, $permission, $phonenum)){
			echo "<script type='text/javascript'>alert('Register Successfully. Login NOW');</script>";
			redirect('/home','refresh');
			return;
		}
		echo "<script type='text/javascript'>alert('Register Failure');</script>";
			redirect('/Login_register','refresh');
	}

	public function Login()
	{
		// Lay du lieu tu login_register_view
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		if($user == '' || $pass == ''){
			echo "<script type='text/javascript'>alert('Username or password CAN NOT be blank');</script>";
			redirect('/Login_register','refresh');
			return;
		}
		// Truyen du lieu qua login_model xu li
		$this->load->model('login_model');
		if($this->login_model->ValidateLogin($user, $pass)){
			$this->load->model('login_model');
			$permission = $this->login_model->GetPermission($user);
			$id = $this->login_model->GetId($user);

			$sessionUser = array(
				'username' => $user,
				'permission_user' => $permission,
				'id_user' => $id
			);
		
			$this->session->set_userdata( $sessionUser );
			redirect('/home','refresh');
		}
		else{
			echo "<script type='text/javascript'>alert('Username or password is incorrect');</script>";
			redirect('/Login_register','refresh');
		}
	}



}

/* End of file Login_register.php */
/* Location: ./application/controllers/Login_register.php */