<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Selects extends CI_Model {

	public function GetUserID($userID, $table)
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'desc');
		$this->db->where('UserID', $userID);
		$result = $this->db->get($table);  
		return $result;
	}
	public function GetAllEmployees()
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'desc');
		$result = $this->db->get('employees');  
		return $result;
	}
	public function GetSubjects()
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'desc');
		$result = $this->db->get('subjects_list');  
		return $result;
	}
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
	public function GetEmployeeAttendanceInDate($userID, $date)
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'desc');
		$this->db->where('UserID', $userID);
		$this->db->where('Date', $date);
		$result = $this->db->get('employees_attendance');  
		return $result;
	}
}
