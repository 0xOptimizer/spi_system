<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AJAX extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Selects');
		$this->load->model('Model_Inserts');
	}
	public function AJAX_setAttendance()
	{
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		$day = $this->input->post('day');
		$logType = $this->input->post('logType');
		$userID = 'N/A';
		if ($this->session->userdata('UserID')) {
			$userID = $this->session->userdata('UserID');
		}
		if ($date != NULL && $time != NULL && $day != NULL && $logType != NULL) {
			$data = array(
				'UserID' => $userID,
				'Date' => $date,
				'Time' => $time,
				'Day' => $day,
				'LogType' => $logType,
				'DateAdded' => date('Y-m-d h:i:s A'),
			);
			$insertAttendance = $this->Model_Inserts->InsertAttendance($data);
			if ($insertAttendance) {

			};
		}
	}
	public function AJAX_setAttendanceComment()
	{
		$id = $this->input->post('id');
		$id = filter_var($id, FILTER_SANITIZE_STRING);
		$value = $this->input->post('value');
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		$userID = 'N/A';
		if ($this->session->userdata('UserID')) {
			$userID = $this->session->userdata('UserID');
		}
		echo $id . '<br>' . $value . '<br>' . $userID;
		if ($id != NULL && $value != NULL && $userID != NULL) {
			$updateAttendanceComment = $this->Model_Inserts->UpdateAttendanceComment($userID, $id, $value);
			if ($updateAttendanceComment) {

			};
		}
	}
	public function AJAX_fetchEmployeesForSubject()
	{
		$getAllEmployees = $this->Model_Selects->GetAllEmployeesForSubject();
		if ($getAllEmployees->num_rows() > 0) {
			foreach($getAllEmployees->result_array() as $row) {
				$userID = $row['UserID'];
				$lastName = $row['LastName'];
				$firstName = $row['FirstName'];
				$middleName = $row['MiddleName'];
				$nameExtension = $row['NameExtension'];
				$image = $row['Image'];
				// Info Handler
				// ~ name
				$fullName = '';
				$fullNameHover = '';
				$isFullNameHoverable = false;
				if ($lastName) {
					$fullName = $fullName . $lastName . ', ';
					$fullNameHover = $fullNameHover . $lastName . ', ';
				} else {
					$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
					$isFullNameHoverable = true;
				}
				if ($firstName) {
					$fullName = $fullName . $firstName . ' ';
					$fullNameHover = $fullNameHover . $firstName . ' ';
				} else {
					$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
					$isFullNameHoverable = true;
				}
				if ($middleName) {
					$fullName = $fullName . $middleName[0] . '.';
					$fullNameHover = $fullNameHover . $middleName[0] . '.';
				} else {
					$fullNameHover = $fullNameHover . '[<i>No MI</i>].';
					$isFullNameHoverable = true;
				}
				if ($nameExtension) {
					$fullName = $fullName . ', ' . $nameExtension;
					$fullNameHover = $fullNameHover . ', ' . $nameExtension;
				}
				if (strlen($fullName) > 90) {
					$fullName = substr($fullName, 0, 90);
					$fullName = $fullName . '...';
					$isFullNameHoverable = true;
				}
				echo '<div class="col-sm-12">';
					echo '<div class="choose-employee" data-userid="' . $userID . '">';
						echo '<img class="rounded-circle" src="' . base_url() . $image . '" width="64" height="64">';
						echo '<span>' . $fullName . '</span>';
					echo '</div>';
				echo '</div>';
			}
		}
	}
}
