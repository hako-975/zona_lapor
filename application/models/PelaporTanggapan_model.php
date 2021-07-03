<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelaporTanggapan_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelapor_model', 'pelmo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getTanggapan()
	{
		$this->db->join('user', 'tanggapan.id_user=user.id_user');
		$this->db->join('pengaduan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
		$this->db->order_by('id_tanggapan', 'asc');
		return $this->db->get('tanggapan')->result_array();
	}

	public function getTanggapanByIdPengaduan($id_pengaduan)
	{
		$this->db->join('user', 'tanggapan.id_user=user.id_user');
		$this->db->join('pengaduan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
		$this->db->order_by('id_tanggapan', 'asc');
		return $this->db->get_where('tanggapan', ['pengaduan.id_pengaduan' => $id_pengaduan])->result_array();
	}

	public function getTanggapanGroupByIdPengaduan($status_tanggapan = '')
	{
		if ($status_tanggapan != '') 
		{
			$this->db->where('status_tanggapan', $status_tanggapan);
		}

		$this->db->join('user', 'tanggapan.id_user=user.id_user');
		$this->db->join('pengaduan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
		$this->db->order_by('tanggapan.tgl_tanggapan', 'desc');
		return $this->db->get('tanggapan')->result_array();
	}

	public function getTanggapanById($id_tanggapan)
	{
		$this->db->join('user', 'tanggapan.id_user=user.id_user');
		$this->db->join('pengaduan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
		return $this->db->get_where('tanggapan', ['id_tanggapan' => $id_tanggapan])->row_array();	
	}
}
