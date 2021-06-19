<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $globalData = [];
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Selects');
		$this->load->model('Model_Security');
		if($this->Model_Security->CheckPrivilegeLevel() >= 2) {
			$this->load->model('Model_Inserts');
			$this->load->model('Model_Updates');
			$this->globalData['userID'] = 'N/A';
			if ($this->session->userdata('UserID')) {
				$this->globalData['userID'] = $this->session->userdata('UserID');
			}
			$this->globalData['fullName'] = 'N/A';
			if ($this->session->userdata('FullName')) {
				$this->globalData['fullName'] = $this->session->userdata('FullName');
			}
			$this->globalData['fisrtName'] = 'N/A';
			if ($this->session->userdata('FirstName')) {
				$this->globalData['firstName'] = $this->session->userdata('FirstName');
			}
			$this->globalData['middleName'] = 'N/A';
			if ($this->session->userdata('MiddleName')) {
				$this->globalData['middleName'] = $this->session->userdata('MiddleName');
			}
			$this->globalData['lastName'] = 'N/A';
			if ($this->session->userdata('LastName')) {
				$this->globalData['lastName'] = $this->session->userdata('LastName');
			}
			$this->globalData['nameExtension'] = 'N/A';
			if ($this->session->userdata('NameExtension')) {
				$this->globalData['nameExtension'] = $this->session->userdata('NameExtension');
			}
			$this->globalData['image'] = 'N/A';
			if ($this->session->userdata('Image')) {
				$this->globalData['image'] = $this->session->userdata('Image');
			}
		} else {
			redirect('login');
		}
		// $this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$data = [];
		$data = array_merge($data, $this->globalData);
		$header['pageTitle'] = 'Employees - SPI';
		$data['globalHeader'] = $this->load->view('main/globals/header', $header);
		$this->load->view('admin/Employees', $data);
	}
	public function subjects()
	{
		$data = [];
		$data = array_merge($data, $this->globalData);
		$header['pageTitle'] = 'Subjects List - SPI';
		$data['globalHeader'] = $this->load->view('main/globals/header', $header);
		$this->load->view('admin/Subjects', $data);
	}
	public function attendance()
	{
		$data = [];
		$data = array_merge($data, $this->globalData);
		$header['pageTitle'] = 'Attendance List - SPI';
		$data['globalHeader'] = $this->load->view('main/globals/header', $header);
		$this->load->view('admin/AttendanceList', $data);
	}
	// Form inputs
	public function FORM_addNewEmployee()
	{	
		# PERSONAL INFORMATION
		$firstName = $this->input->post('firstName');
		$middleName = $this->input->post('middleName');
		$lastName = $this->input->post('lastName');
		$nameExtension = $this->input->post('nameExtension');
		$dateOfBirth = $this->input->post('birthDate');
		$contactNumber = $this->input->post('contactNumber');
		$address = $this->input->post('locationAddress');
		$comment = $this->input->post('adminComment');

		$pImageChecker = $this->input->post('pImageChecker');
		$userID = uniqid();
		
		$config['upload_path'] = './uploads/'.$userID;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 4000;
		$config['max_width'] = 4000;
		$config['max_height'] = 4000;
		$this->load->library('upload', $config);
		if (!is_dir('uploads'))
		{
			mkdir('./uploads', 0777, true);
		}
		if (!is_dir('uploads/' . $userID))
		{
			mkdir('./uploads/' . $userID, 0777, true);
			$dir_exist = false;
		}
		if ($pImageChecker != NULL) {
			// Reminder: enctype="multipart/form-data" in the form tag;
			if ( ! $this->upload->do_upload('pImage'))
			{
				echo $this->upload->display_errors();
				exit();
				redirect('NewEmployee');
			}
			else
			{
				$pImage = 'uploads/'.$userID.'/'.$this->upload->data('file_name');
				// Create thumbnail
				$this->load->library('image_lib');
				$tconfig['image_library'] = 'gd2';
				$tconfig['source_image'] = './uploads/'.$userID.'/'.$this->upload->data('file_name');
				$tconfig['create_thumb'] = TRUE;
				$tconfig['maintain_ratio'] = TRUE;
				$tconfig['width'] = 70;
				$tconfig['height'] = 70;
				$tconfig['new_image'] = './uploads/'.$userID.'/';

				$this->load->library('image_lib', $tconfig);
				$this->image_lib->initialize($tconfig);

				$this->image_lib->resize();
				if ( ! $this->image_lib->resize())
				{
				        $this->Model_Logbook->SetPrompts('error', 'error', $this->image_lib->display_errors() . $tconfig['source_image']);
				}
				$this->image_lib->clear();
			}
		} else {
			$pImage = 'assets/images/faces/1.jpg';
		}
		// INSERT EMPLOYEE
		$data = array(
			'UserID' => $userID,
			'Image' => $pImage,
			'FirstName' => $firstName,
			'MiddleName' => $middleName,
			'LastName' => $lastName,
			'NameExtension' => $nameExtension,
			'DateOfBirth' => $dateOfBirth,
			'ContactNumber' => $contactNumber,
			'Address' => $address,
			'Comment' => $comment,
			'DateAdded' => date('Y-m-d h:i:s A'),
		);
		$insertNewEmployee = $this->Model_Inserts->InsertNewEmployee($data);
		if ($insertNewEmployee == TRUE) {
			$this->session->set_flashdata('isApplicantAdded', 'true');
			// $this->Model_Logbook->SetPrompts('success', 'success', 'New employee added.');
			// LOGBOOK
			// $this->Model_Logbook->LogbookEntry('Green', 'Applicant', ' added a new applicant: <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
			// $this->Model_Logbook->LogbookExtendedEntry(0, 'Applicant ID: <b>' . $ApplicantID . '</b>');
			// $this->Model_Logbook->LogbookExtendedEntry(0, 'Referral: <b>' . $Referral . '</b>');
			redirect('admin');
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect('admin');
		}
	}
	public function FORM_updateEmployee()
	{	
		# PERSONAL INFORMATION
		$defaultImage = $this->input->post('defaultImage');
		$firstName = $this->input->post('firstName');
		$middleName = $this->input->post('middleName');
		$lastName = $this->input->post('lastName');
		$nameExtension = $this->input->post('nameExtension');
		$dateOfBirth = $this->input->post('birthDate');
		$contactNumber = $this->input->post('contactNumber');
		$address = $this->input->post('locationAddress');
		$comment = $this->input->post('adminComment');

		$pImageChecker = $this->input->post('pImageChecker');
		$userID = $this->input->post('userID');

		$loginEmail = $this->input->post('loginEmail');
		$loginPassword = $this->input->post('loginPassword');
		
		$config['upload_path'] = './uploads/'.$userID;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 4000;
		$config['max_width'] = 4000;
		$config['max_height'] = 4000;
		$this->load->library('upload', $config);
		if (!is_dir('uploads'))
		{
			mkdir('./uploads', 0777, true);
		}
		if (!is_dir('uploads/' . $userID))
		{
			mkdir('./uploads/' . $userID, 0777, true);
			$dir_exist = false;
		}
		if ($pImageChecker != NULL) {
			// Reminder: enctype="multipart/form-data" in the form tag;
			if ( ! $this->upload->do_upload('pImage'))
			{
				echo $this->upload->display_errors();
				exit();
				redirect('NewEmployee');
			}
			else
			{
				$pImage = 'uploads/'.$userID.'/'.$this->upload->data('file_name');
				// Create thumbnail
				$this->load->library('image_lib');
				$tconfig['image_library'] = 'gd2';
				$tconfig['source_image'] = './uploads/'.$userID.'/'.$this->upload->data('file_name');
				$tconfig['create_thumb'] = TRUE;
				$tconfig['maintain_ratio'] = TRUE;
				$tconfig['width'] = 70;
				$tconfig['height'] = 70;
				$tconfig['new_image'] = './uploads/'.$userID.'/';

				$this->load->library('image_lib', $tconfig);
				$this->image_lib->initialize($tconfig);

				$this->image_lib->resize();
				if ( ! $this->image_lib->resize())
				{
				        $this->Model_Logbook->SetPrompts('error', 'error', $this->image_lib->display_errors() . $tconfig['source_image']);
				}
				$this->image_lib->clear();
			}
		} else {
			$pImage = $defaultImage;
		}
		// UPDATE EMPLOYEE
		$data = array(
			'Image' => $pImage,
			'FirstName' => $firstName,
			'MiddleName' => $middleName,
			'LastName' => $lastName,
			'NameExtension' => $nameExtension,
			'DateOfBirth' => $dateOfBirth,
			'ContactNumber' => $contactNumber,
			'Address' => $address,
			'Comment' => $comment,
			'DateAdded' => date('Y-m-d h:i:s A'),
		);
		$updateEmployee = $this->Model_Updates->UpdateEmployee($data, $userID);
		if ($updateEmployee == TRUE) {
			if ($loginEmail != NULL && $loginPassword != NULL) {
				$loginData = array(
					'LoginEmail' => $loginEmail,
					'LoginPassword' => password_hash($loginPassword, PASSWORD_BCRYPT),
				);
				$updateEmployeeLogin = $this->Model_Updates->UpdateEmployeeLogin($loginData, $userID);
				if ($updateEmployeeLogin) {
					redirect('admin');
				} else {
					redirect('admin');
				}
			} else {
				redirect('admin');
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect('admin');
		}
	}
	public function FORM_addNewSubject()
	{	
		# PERSONAL INFORMATION
		$subjectCode = $this->input->post('subjectCode');
		$subjectDescription = $this->input->post('subjectDescription');
		$schedule = $this->input->post('schedule');
		$course = $this->input->post('course');
		$section = $this->input->post('section');
		// INSERT EMPLOYEE
		$data = array(
			'SubjectCode' => $subjectCode,
			'Description' => $subjectDescription,
			'Schedule' => $schedule,
			'Course' => $course,
			'Section' => $section,
			'DateAdded' => date('Y-m-d h:i:s A'),
		);
		$insertNewSubject = $this->Model_Inserts->InsertNewSubject($data);
		if ($insertNewSubject == TRUE) {
			// $this->Model_Logbook->SetPrompts('success', 'success', 'New employee added.');
			// LOGBOOK
			// $this->Model_Logbook->LogbookEntry('Green', 'Applicant', ' added a new applicant: <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
			// $this->Model_Logbook->LogbookExtendedEntry(0, 'Applicant ID: <b>' . $ApplicantID . '</b>');
			// $this->Model_Logbook->LogbookExtendedEntry(0, 'Referral: <b>' . $Referral . '</b>');
			redirect('admin/subjects');
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect('admin/subjects');
		}
	}
}
