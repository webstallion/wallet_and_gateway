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

		public function get_data($first){
	    $query=$this->db->query("Select * From users Where (firstname LIKE '$first%' OR lastname LIKE '$first%') AND (flag=1) GROUP BY id");
	    return $query->result();
	  }

		public function insert_api($tabel, $data){
			$this->db->insert($tabel, $data);
			return true;
		}

		public function get_all_data2(){
			$data=$this->db->query("SELECT SUM(`salary`) as Salary FROM `employee` GROUP BY `deptID`");
			return $data->result();
		}
		public function delete_user($table, $del_id){
			$this->db->where('id', $del_id);
    	$this->db->delete($table);
    	return true;
		}
		public function get_all_data3(){
			$data=$this->db->query("SELECT deptID, SUM(`salary`) FROM `employee` GROUP BY `deptID`");
			return $data->result();
		}

		public function get_all_data4(){
			$data=$this->db->query("SELECT deptID, SUM(`salary`) as Salary, Max(salary) as MaxSal, Min(salary) as MinSal FROM `employee` GROUP BY `deptID`");
			return $data->result();
		}

		public function get_all_data5(){
			$data=$this->db->query("SELECT deptID, count(`deptID`) as TotalEmp FROM `employee` GROUP BY `deptID`");
			return $data->result();
		}

		public function get_all_data6(){
			$data=$this->db->query("SELECT deptID, count(`deptID`) as TotalEmp, SUM(`salary`) as Salary, Max(salary) as MaxSal, Min(salary) as MinSal FROM `employee` GROUP BY `deptID`");
			return $data->result();
		}		
		public function get_all_data7(){
			$data=$this->db->query("SELECT deptID,joinYear, count(`deptID`) as TotalEmp FROM `employee` GROUP BY `joinYear`");
			return $data->result();
		}

		public function get_all_data8(){
			$data=$this->db->query("SELECT deptID, count(`deptID`) as TotalEmp, SUM(`salary`) as TotalSallary FROM `employee` WHERE deptID IN(1,3) GROUP BY `deptID` Having SUM(salary) >13000");
			return $data->result();
		}

		public function get_all_data9(){
			$data=$this->db->query("SELECT Max(`salary`) as maxsal FROM `employee`");
			return $data->result();
		}

		public function get_all_data10(){
			$data=$this->db->query("SELECT Max(`salary`) as maxsal FROM `employee` WHERE salary Not in(SELECT Max(`salary`) as maxsal FROM `employee`)");
			return $data->result();
		}
	}
?>