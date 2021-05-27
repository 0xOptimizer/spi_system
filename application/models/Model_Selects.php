<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Selects extends CI_Model {

	public function GetLatestSiteVersion()
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'desc');
		$this->db->limit(1);
		$result = $this->db->get('site_versions');  
		return $result;
	}
}
