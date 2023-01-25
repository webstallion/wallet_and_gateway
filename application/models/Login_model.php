<?php
class Login_model extends  CI_Model {
  // Work 23/06/22 
  public function isValidate($username,$password){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$username);
    $this->db->where('password', $password);
    $this->db->where('flag', 1);
    $query= $this->db->get();
    if($query->num_rows()){
      $userdata=$query->row();
      $arrayName = array( 
        'user_id'         => $userdata->id,
        'name'            => $userdata->name,
        'email'           => $userdata->email,
        'mobile_no'       => $userdata->mobile_no
      );
        $this->session->set_userdata($arrayName);
        return true;
    } else {
      return false;
    }
  }

  // Work 23/06/22
  public function loggedin() {
    return (bool) $this->session->userdata("loggedin");
  }
}
?>
