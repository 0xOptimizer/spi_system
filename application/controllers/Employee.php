<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function index()
	{
		$this->load->view('employee/Attendance');
	}

	public function attendanceLog()
	{
		$this->load->view('employee/AttendanceLog');
	}
}
