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
}
