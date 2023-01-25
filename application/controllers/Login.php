<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		// if(! $this->session->userdata('user_id')){
		// 	return redirect('Login');
		// }
		$this->load->model('login_model');
		$this->load->helper('captcha');
	}
	public function index() {
		$input_Array=$this->data['inputarray'] = array( 
        'username' => '',
        'password' => '',
    );
		if($_POST){
			$this->form_validation->set_rules('username', 'User Name','trim|required');
			$this->form_validation->set_rules('password', 'Password','trim|required');
			$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
			if($this->form_validation->run()){
				$username=$this->input->post('username');
		    $password=$this->input->post('password');
				$login=$this->login_model->isValidate($username,$password);
				if($login == true){
					if($this->input->post('remember_me')){
						set_cookie('username', $username, 2 * 60);
						set_cookie('password', $password, 2 * 60);
					}
					return redirect('User_profile/user_profile');	
				} else {
					$this->data['error']='Invalid Username/Password';
					$this->load->view('login.php', $this->data);
				}
			}else{
				$this->data["inputarray"] = $input_Array;
				$this->load->view('login.php', $this->data);
			}
		}else{
			$this->data['inputarray']=$input_Array;
			$this->load->view('login.php', $this->data);
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		delete_cookie('username');
		delete_cookie('password');
		return redirect('login');
	}
}