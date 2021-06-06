<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Security extends CI_Model {

	public function CheckPrivilegeLevel()
	{
		// ~ essentials ~
		$userID = $this->session->userdata('UserID');
		if ($userID) {
			$getUserID = $this->Model_Selects->GetUserID($userID, 'employees');
			if ($getUserID->num_rows() > 0) {
				$privilegeLevel = 0;
				foreach($getUserID->result_array() as $row) {
					$privilegeLevel = $row['Privilege'];
				}
				return $privilegeLevel;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}
}
