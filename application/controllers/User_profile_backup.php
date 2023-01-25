<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_profile extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(! $this->session->userdata('user_id')){
			return redirect('Login');
		}
		$this->load->model('gen_model');
		$this->load->library('globalvar');
	}

	public function user_profile(){
		$user_mobile=$this->gen_model->get_single_data('user',array('id'=>$this->session->userdata('user_id')));
		$credit_amount=$this->gen_model->get_credit_amount('trans');
		$debit_amount=$this->gen_model->get_debit_amount('trans');
		$credit=$credit_amount[0]['credit']-$debit_amount[0]['debit'];
		if($_POST){
			$user_id=$this->gen_model->get_single_data('user',array('mobile_no'=>$_POST['mobile']));
			if($user_mobile->mobile_no==$this->input->post('mobile')){
				echo "false";
			}elseif($credit<$this->input->post('amount')){
				echo 3;			
			}else{	
				if(isset($user_id)){
					$arrayName = array(
												'amount' => $_POST['amount'],
												'to_user_id'=>$user_id->id,
												'from_user_id'=>$this->session->userdata('user_id'),
												'created_at'=>date('Y-m-d H:i:s')
											 );
					if($this->gen_model->add('trans', $arrayName)){
						echo 1;
					}else{
						echo 0;
					}
				}else{
					echo 2;
				}
			}
		}else{
			$this->load->view('user_profile.php');
		}
	}

	public function transaction_page(){
		$this->data['transaction']=$this->gen_model->get_all_date('trans');
		$user=$this->data['user']=$this->gen_model->get_all_date('user');
		$toname=array();
		$tophone=array();
		foreach($user as $val){
			$toname[$val->id]=$val->name;
			$tophone[$val->id]=$val->mobile_no;
		}
		$this->data['toname']=$toname;
		$this->data['tophone']=$tophone;
		$this->data['credit_amount']=$this->gen_model->get_credit_amount('trans');
		$this->data['debit_amount']=$this->gen_model->get_debit_amount('trans');
		$this->load->view('transaction_page.php',$this->data);
	}

	public function product_data(){
		$userID=$this->session->userdata('user_id');
		$golbal_var = $this->globalvar->global_var();
		$uploadata = array();
		if($_POST){
			if($_FILES["product_img"]['name'] !=""){
				$cpt = count($_FILES['product_img']['name']);
    		for($i=0; $i<$cpt; $i++){
    			$_FILES['file']['name']= $_FILES['product_img']['name'][$i];
          $_FILES['file']['type']= $_FILES['product_img']['type'][$i];
          $_FILES['file']['tmp_name']= $_FILES['product_img']['tmp_name'][$i];
          $_FILES['file']['error']= $_FILES['product_img']['error'][$i];
          $_FILES['file']['size']= $_FILES['product_img']['size'][$i]; 
          $new_file=$_FILES["product_img"]['name'][$i];
          if (!is_dir('uploads/product/'.$userID)) {
						  mkdir('./uploads/product/'.$userID, 0777, true);
					}
					$config['upload_path'] = "./uploads/product/".$userID.'/'; 
					$config['allowed_types'] = $golbal_var['allowed_types']; 
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if(!$this->upload->do_upload("file")) {
						//$arrayName = array('msg' => 'error', 'filename' => $this->upload->display_errors());
        		//echo json_encode($arrayName);
        		//$error_message = $this->upload->display_errors();
            //$this->session->set_flashdata('status', 'error');
            //$this->session->set_flashdata('message', "$error_message");
						echo "1";	
					} else {
						$uploadata[]=array(
													'product_name'=>$this->input->post('product_name'),
													'product_ID'=>$this->input->post('product_ID'),
													'create_time'=>date('Y-m-d H:i:s')
											 );
						$fileData = $this->upload->data();
						$uploadata[$i]['product_img']='uploads/product/'.$userID.'/'.$fileData['file_name'];
					}
					
				}
				if(count($uploadata)>0){
					if($this->gen_model->insert_data('product', $uploadata)){
						echo "success";
					}
				}
			}else{
				echo "2";
			}
		}else{
			$this->load->view('product_list.php');
		}
	}
	public function product_list(){
		$product=$this->data['product']=$this->gen_model->get_all_date('product');
		$this->load->view('product_data.php',$this->data);
	}

	public function delete_product(){
		if($_POST){
			$id=$this->input->post('id');
			if($this->gen_model->delete_data('product',array('id'=>$id))){
				echo '0';
			}else{
				echo "1";
			}
		}
	}
}