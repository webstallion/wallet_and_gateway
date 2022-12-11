<?php 
 	class Procedure extends CI_Controller{
 	 	public function __construct(){
    	parent::__construct();
     	$this->load->model('gen_model');
  	}

  	public function index(){
  		//$a="pawan";
  		//var_dump($a[0]);
  		// $a="10";
  		// $b=true;
  		// $c=$a+$b;
  		// echo $c;
  		// echo "<pre>";
  		// echo $a;
  		$this->data['employees']=$this->gen_model->get_stored_procedure();
  		//$this->data['employees2']=$this->gen_model->get_stored_procedure2();
  		//$this->data['employees3']=$this->gen_model->get_stored_procedure3();
  		//$this->data['employees4']=$this->gen_model->get_stored_procedure4();
  		//dump($this->data['employees4']);
  		// if($this->gen_model->insert_data_stored_procedure()){
  		// 	echo "success";
  		// }else{
  		// 	echo "not success";
  		// }
  		dump($this->data['employees']);die();
  		//echo "<pre>";
  		//dump($this->data['employees3']);die();
  		//$this->load->view('procedure', $this->data);
  	}
 	}