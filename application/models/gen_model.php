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
	}
?>