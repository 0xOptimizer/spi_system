<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Inserts extends CI_Model {

	public function InsertNewEmployee($data)
	{
		$result = $this->db->insert('employees', $data);
		return $result;
	}
	public function InsertAttendance($data)
	{
		$result = $this->db->insert('employees_attendance', $data);
		return $result;
	}
	public function UpdateAttendanceComment($userID, $id, $comment)
	{
		$data = array(
			'Comment' => $comment,
		);
		$this->db->where('UserID', $userID);
		$this->db->where('ID', $id);
		$result = $this->db->update('employees_attendance', $data);
		return $result;
	}
	public function InsertNewSubject($data)
	{
		$result = $this->db->insert('subjects_list', $data);
		return $result;
	}
	public function InsertLoginHistory($data)
	{
		$result = $this->db->insert('employees_login_history', $data);
		return $result;
	}
}
