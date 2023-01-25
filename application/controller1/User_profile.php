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
		if($_POST){
			$user_id=$this->gen_model->get_single_data('user',array('mobile_no'=>$_POST['mobile']));
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
		if($_POST){
			if($_FILES["product_img"]['name'] !=""){
				$file_name_photo = $_FILES["product_img"]['name'];
				$explodePH = explode('.', $file_name_photo);
				$fileext = end($explodePH);	
				if(count($explodePH) >= 2) {
					$new_file = 'product_img'.uniqid().'.'.$fileext;
					if (!is_dir('uploads/product/'.$userID)) {
					  mkdir('./uploads/product/'.$userID, 0777, true);
					}
					$config['upload_path'] = "./uploads/product/".$userID.'/';
					$config['allowed_types'] = $golbal_var['allowed_types'];
					$config['file_name'] = $new_file;
					$config['max_size'] = $golbal_var['max_size'];
					$config['max_width'] = $golbal_var['max_width'];
					$config['max_height'] = $golbal_var['max_height'];   
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload("product_img")) {
						echo "1";
					} else {
						$uploadata=array(
													'product_name'=>$this->input->post('product_name'),
													'product_ID'=>$this->input->post('product_ID'),
													'create_time'=>date('Y-m-d H:i:s')
											 );
						$uploadata['product_img'] = 'uploads/product/'.$userID.'/'.$new_file;
						$this->gen_model->add('product', $uploadata);
						echo "Upload Successfully";
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