<?php

class Signup_model extends  CI_Model {
 
  public function add($data){
    $this->db->insert('user',$data);
    return true;

  }

  public function uniq_value($array){

   $query=$this->db->select()

     ->from('user')

     ->where($array)

     ->get();

     return $query->result();

  }

}
