<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAdm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('loginAdm_view');
	}

	public function LoginAdmin()
	{
		// Lay du lieu tu login_view
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		// Truyen du lieu qua loginAdm_model xu li
		$this->load->model('loginAdm_model');
		
		if($this->loginAdm_model->ValidateLogin($user, $pass)){
			$sessionAdmin = array(
				'username' => 'admin',
				'id_user' => 'admin',
				'permission_user' => '1'
			);
		
			$this->session->set_userdata( $sessionAdmin );
			redirect('Home/','refresh');
		}
		else{
			redirect('/loginAdm','refresh');
		}
		
	}

	public function SignOut()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('permission_user');
		redirect('/loginAdm','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/login.php */