<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Selects extends CI_Model {

	public function GetLatestAttendance($userID)
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'desc');
		$this->db->where('UserID', $userID);
		$this->db->limit(1);
		$result = $this->db->get('employees_attendance');  
		return $result;
	}
	public function GetEmployeeAttendance($userID)
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'desc');
		$this->db->where('UserID', $userID);
		$result = $this->db->get('employees_attendance');  
		return $result;
	}
}
