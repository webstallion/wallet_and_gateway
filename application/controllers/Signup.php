<?php
class Signup extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('gen_model');
    $this->load->model('signup_model');
  }

  public function uniq_email(){
    $id=$this->uri->segment(3);
    if((int)$id) {
      $count=$this->signup_model->uniq_value(array('email'=>$this->input->post('email'),'user_id !=' =>$id));
      if(count($count)>0){
        $this->form_validation->set_message('uniq_email','Email is already exist!');
        return false;
      }
      else{
        return true;
      }
    }
    else{
      $count=$this->signup_model->uniq_value(array('email'=>$this->input->post('email')));
      if(count($count)>0){
        $this->form_validation->set_message('uniq_email','Email is already exist!');
        return false;
      }
      else{
        return true;
      }
    }
  }

  public function uniq_user(){
    $id=$this->uri->segment(3);
    if((int)$id) {
      $count=$this->signup_model->uniq_value(array('username'=>$this->input->post('username'),'user_id !=' =>$id));
      if(count($count)>0){
        $this->form_validation->set_message('uniq_user','Username is already exist!');
        return false;
      }
      else{
        return true;
      }
    }
    else{
      $count=$this->signup_model->uniq_value(array('username'=>$this->input->post('username')));
      if(count($count)>0){
        $this->form_validation->set_message('uniq_user','Username is already exist!');
        return false;
      }
      else{
        return true;
      }
    }
  }

  public function signup(){
    $input_Array=$this->data['inputarray'] = array( 
        'name' => '',
        'username' => '',
        'email' => '',
        'password' => '',
        'confirm_pswd' => ''
      );
    if($_POST){
      $input_Array=$this->data['inputarray'] = array( 
        'name' => $this->input->post('name'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'confirm_pswd' => $this->input->post('confirm_pswd'),
        'create_date' =>date('Y-m-d H:i:s'),
        'flag' =>1
      );
      $this->form_validation->set_rules('name', 'Name','trim|required');
      $this->form_validation->set_rules('email', 'Email','trim|required|callback_uniq_email');
      $this->form_validation->set_rules('username', 'Username','trim|required|callback_uniq_user');
      $this->form_validation->set_rules('password', 'Password','trim|required');
      $this->form_validation->set_rules('confirm_pswd', 'Confirm Password','trim|required|matches[password]');
      $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
      if($this->form_validation->run()){        
        $this->signup_model->add($input_Array);      
        redirect(base_url('Signup/Login'));
      } else {
        $this->data['inputarray']=$input_Array;
        $this->load->view('signup.php',$this->data);
      } 
    } else {
      $this->load->view('signup.php',$this->data);
    }
    
  }
}