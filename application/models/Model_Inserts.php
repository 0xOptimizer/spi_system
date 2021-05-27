<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Inserts extends CI_Model {

	public function InsertAttendance($data)
	{
		$result = $this->db->insert('employees_attendance', $data);
		return $result;
	}
}
