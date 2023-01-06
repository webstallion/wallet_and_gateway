<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class API extends CI_Controller {
	function __construct() { 
		parent::__construct();
		$this->load->model('gen_model');
	}

	public function index(){
		$data=$this->gen_model->get_all_data('users',array('flag'=>1));
		echo json_encode($data);
	}

	public function index2(){
		$data=$this->gen_model->get_data('ra');
		echo json_encode($data);
	}

	public function insert(){
		if($_POST){
			//$this->form_validation->set_rules('first_name', 'First Name', 'required');
			//$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			//if($this->form_validation->run()){
				$data=array(
				'firstname'=>$this->input->post('first_name'),
				'lastname'=>$this->input->post('last_name'),
				);
				$this->gen_model->insert_api('users',$data);
				$array=array('success' => true);
			}else{
				$array= array(
					'error'=> true,
					'first_name_error'=>form_error('first_name'),
					'last_name_error'=>form_error('last_name'),
				);
			}
			//echo json_encode($array);
		
	}

}