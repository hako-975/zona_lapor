<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model 
{
	public function getLog()
	{
		$this->db->join('user', 'user.id_user=log.id_user');
		$this->db->order_by('tgl_log', 'desc');
		return $this->db->get('log')->result_array();
	}

	public function addLog($isi_log, $id_user = 0)
	{
		$data = [
			'isi_log' => htmlspecialchars($isi_log),
			'tgl_log' => date("Y-m-d H:i:s"),
			'id_user' => $id_user
		];

		return $this->db->insert('log', $data);
	}
}