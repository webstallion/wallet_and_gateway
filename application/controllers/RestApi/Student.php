<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;
class Student extends RestController {
	function __construct() { 
		parent::__construct();
		$this->load->model('gen_model');
		$this->load->helper('security');
	}

	public function index_get(){
		$usersdata=$this->gen_model->get_all_date('users');
		if(count($usersdata)>0){
			$this->response(array("status"=>1,"message"=>"Students Found", "data"=>$usersdata),RestController::HTTP_OK);
		}else{
			$this->response(array("status"=>0,"message"=>"No Student Found", "data"=>$usersdata),RestController::HTTP_NOT_FOUND);
		}
		//$data_json=json_encode($data);
		//echo $data_json;
		//echo "Get method";
	}

	public function index_post(){
		// First insertion withour post
		// $data= json_decode(file_get_contents("php://input"));
		// $firstname=isset($data->firstname) ? $data->firstname : "";
		// $lastname=isset($data->lastname) ? $data->lastname : "";
		// $flag=isset($data->flag) ? $data->flag : "";

		// if(!empty($firstname) && !empty($lastname) && !empty($flag)){
		// 	$users=array(
		// 						"firstname"=>$firstname,
		// 						"lastname"=>$lastname,
		// 						"flag"=>$flag,
		// 				 );
		// 	if($this->gen_model->insert_api('users',$users)){
		// 		$this->response(array("status"=>0,"message"=>"Users has been created"),RestController::HTTP_OK);
		// 	}else{
		// 		$this->response(array("status"=>0,"message"=>"Failed to created users"),RestController::HTTP_INTERNAL_ERROR);
		// 	}
		// }else{
		// 	$this->response(array("status"=>0,"message"=>"All fields are needed"),RestController::HTTP_NOT_FOUND);
		// }

		// Second insertion with post
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$flag=$this->input->post('flag');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('flag', 'Flag', 'required');
		if($this->form_validation->run()){
			$users=array(
								"firstname"=>$firstname,
								"lastname"=>$lastname,
								"flag"=>$flag,
						 );
			if($this->gen_model->insert_api('users',$users)){
				$this->response(array("status"=>1,"message"=>"Users has been created"),RestController::HTTP_OK);
			}else{
				$this->response(array("status"=>0,"message"=>"Failed to created users"),RestController::HTTP_INTERNAL_ERROR);
			}
		}else{
			$this->response(array("status"=>0,"message"=>"All fields are needed"),RestController::HTTP_NOT_FOUND);
		}
	}

	// public function index_put(){
	// 	echo "Put method";
	// }

	public function index_delete(){
		$data= json_decode(file_get_contents("php://input"));
		$user_id=$this->security->xss_clean($data->user_id);
		if($this->gen_model->delete_user('users',$user_id)){
			$this->response(array("status"=>1,"message"=>"Users has been Deleted"),RestController::HTTP_OK);
		}else{
			$this->response(array("status"=>0,"message"=>"Delete Failed"),RestController::HTTP_INTERNAL_ERROR);
		}

	}

	// public function index_patch(){
	// 	echo "Patch method";
	// }
}