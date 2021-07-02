<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran_model extends CI_Model 
{
	public function getSaran()
	{
		$this->db->order_by('tgl_saran', 'desc');
		return $this->db->get('saran')->result_array();
	}
}