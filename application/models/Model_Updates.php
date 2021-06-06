<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Updates extends CI_Model {

	public function UpdateEmployee($data, $userID)
	{
		$this->db->where('UserID', $userID);
		$result = $this->db->update('employees', $data);
		return $result;
	}
}
