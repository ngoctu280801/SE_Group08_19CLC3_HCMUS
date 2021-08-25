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
				'admin' => '1',
				'permission' => '1'
			);
		
			$this->session->set_userdata( $sessionAdmin );
			redirect('../','refresh');
		}
		else{
			redirect('/loginAdm','refresh');
		}
		
	}

	public function SignOut()
	{
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('permission');
		redirect('/loginAdm','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/login.php */