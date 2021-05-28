<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public $userData = [];
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Selects');
		$this->userData['userName'] = 'test';
		if ($this->session->userdata('name')) {
			$this->userData['userName'] = $this->session->userdata('name');
		}
	}
	public function index()
	{
		$data = [];
		$data = array_merge($data, $this->userData);
		$header['pageTitle'] = 'Your Attendance - SPI';
		$data['globalHeader'] = $this->load->view('main/globals/header', $header);
		$this->load->view('employee/Attendance', $data);
	}
	public function attendanceLog()
	{
		$header['pageTitle'] = 'Your Attendance Log - SPI';
		$data['globalHeader'] = $this->load->view('main/globals/header', $header);
		$this->load->view('employee/AttendanceLog', $data);
	}
}
