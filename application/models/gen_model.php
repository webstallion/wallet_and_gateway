<?php
	//individual_p1
	class Gen_model extends  CI_Model {
		public function get_stored_procedure(){
			$stored_procedure = "CALL getemployee_proc()";
			$data=	$this->db->query($stored_procedure);
			return $data->result(); 
		}
		public function get_stored_procedure2(){
			$stored_procedure = "CALL spDepartlist()";
			$data=	$this->db->query($stored_procedure);
			return $data->result(); 
		}
		public function get_stored_procedure3(){
			$stored_procedure = "CALL getProc(2)";
			$data=	$this->db->query($stored_procedure);
			return $data->result(); 
		}
		public function get_stored_procedure4(){
			$stored_procedure = "CALL getProc1(1,@ename)";
			$data=	$this->db->query($stored_procedure);
			$data1=	$this->db->query('SELECT @ename');
			return $data1->row(); 
		}
		public function insert_data_stored_procedure(){
			$stored_procedure = "CALL Insert_Data('rahul',5,90000,2023)";
			$this->db->query($stored_procedure);
			return true; 
		}
		public function get_all_date($tabel){
			$data=$this->db->select()
			   ->get($tabel);
			return $data->result();
		}

		public function get_all_data($tabel,$condition){
			$data=$this->db->select()
			->where($condition)
			   ->get($tabel);
			return $data->result();
		}
		public function get_single_data($tabel,$condition){
			$data=$this->db->select()
			->where($condition)
			   ->get($tabel);
			return $data->row();
		}

		public function add($table,$data){
		    $this->db->insert($table,$data);
		    return true;

		}
		public function insertID($table,$data){
		   $this->db->insert($tabel, $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;

		}
		public function insert_data($table,$data){
		    $this->db->insert_batch($table,$data);
		    return true;

		}
		public function get_credit_amount($table){
			$user_id=$this->session->userdata('user_id');
			$data=$this->db->query("SELECT SUM(`amount`) as credit FROM `$table` WHERE `to_user_id`=$user_id");
			return $data->result_array();
		}

		public function get_debit_amount($table){
			$user_id=$this->session->userdata('user_id');
			$data=$this->db->query("SELECT SUM(`amount`) as debit FROM `$table` WHERE `from_user_id`=$user_id");
			return $data->result_array();
		}
		public function get_data($first){
	    $query=$this->db->query("Select * From users Where (firstname LIKE '$first%' OR lastname LIKE '$first%') AND (flag=1) GROUP BY id");
	    return $query->result();
	  }

		public function insert_api($tabel, $data){
			$this->db->insert($tabel, $data);
			return true;
		}

		public function delete_data($table, $array_condition){
			$this->db->where($array_condition);
    		$this->db->delete($table);
		}		

	}
?>