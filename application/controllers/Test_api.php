<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;
class Test_api extends RestController {
	function __construct() { 
		parent::__construct();
		$this->load->model('gen_model');
	}

	public function index(){
		echo "i am restfull api";
		die();
		$this->load->view('api_view');
	}


	public function index2_get(){
		$api_url='http://localhost/codiegniter3/API/index2';
		$api_key="pawan@123";
		$username="admin";
		$password="12345";
		$client=curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($client, CURLOPT_HTTPHEADER, array("X-API-KEY:" . $api_key));
		//curl_setopt($client, CURLOPT_USERPWD, "$username:$password");
		//curl_setopt($client, CURLOPT_POST, 1);
		$response=curl_exec($client);
		curl_close($client);
		$result=json_decode($response);
		echo $response; die();
		$this->data['output']=$result;
		$this->load->view('api_view2', $this->data);
	}

	public function action(){
		if($_POST['data_action']){
			$data_action=$this->input->post('data_action');
			//insert data
			// if($data_action=='Insert'){
			// 	$api_url='http://localhost/codiegniter3/API/insert';
			// 	$formdata= array(
			// 		'firstname' => $this->input->post('first_name'),
			// 		'lastname' => $this->input->post('last_name')
			// 	);
			// 	$client=curl_init($api_url);
			// 	curl_setopt($client, CURLOPT_POST, true);
			// 	curl_setopt($client, CURLOPT_POSTFIELDS, $formdata);
			// 	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
			// 	$response=curl_exec($client);
			// 	curl_close($client);
			// }

			if($data_action=='fetch_all'){
				$api_url='http://localhost/codiegniter3/API';
				$client=curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response=curl_exec($client);
				curl_close($client);
				$result=json_decode($response);
				$output='';
				if(count($result)>0){
					foreach($result as  $row){
						$output .='
						<tr>
							<td>'.$row->firstname.'</td>
							<td>'.$row->lastname.'</td>
							<td><button type="button" name="edit" class="btn btn-xs btn-warning edit" id="'.$row->id.'">Edit</button></td>
							<td><button type="button" name="delete" class="btn btn-xs btn-warning delete" id="'.$row->id.'">Delete</button></td>
							</tr>';
					}
				}else{
					$output .='
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>';
				}
				echo $output;
			}
		}
	}
}
