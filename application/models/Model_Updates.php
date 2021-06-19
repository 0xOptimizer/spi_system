<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Updates extends CI_Model {

	public function UpdateEmployee($data, $userID)
	{
		$this->db->where('UserID', $userID);
		$result = $this->db->update('employees', $data);
		return $result;
	}
	public function UpdateEmployeeLogin($data, $userID)
	{
		$checkIfUserIDExists = $this->Model_Selects->GetUserID($userID, 'employees_login');
		if ($checkIfUserIDExists->num_rows() > 0) {
			$this->db->where('UserID', $userID);
			$result = $this->db->update('employees_login', $data);
			return $result;
		} else {
			$data['UserID'] = $userID;
			$result = $this->db->insert('employees_login', $data);
			return $result;
		}
	}
}
