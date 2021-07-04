<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getKelurahan()
	{
		$this->db->join('kecamatan', 'kelurahan.id_kecamatan=kecamatan.id_kecamatan');
		$this->db->order_by('kelurahan', 'asc');
		return $this->db->get('kelurahan')->result_array();
	}

	public function getKelurahanById($id_kelurahan)
	{
		$this->db->join('kecamatan', 'kelurahan.id_kecamatan=kecamatan.id_kecamatan');
		return $this->db->get_where('kelurahan', ['id_kelurahan' => $id_kelurahan])->row_array();	
	}

	public function addKelurahan()
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan kelurahan';
		$this->admo->userPrivilege('kelurahan', $isi_log_2);

		$data = [
			'kelurahan'		=> ucwords(strtolower($this->input->post('kelurahan', true))),
			'id_kecamatan'	=> $this->input->post('id_kecamatan', true)
		];

		$this->db->insert('kelurahan', $data);

		$isi_log = 'Kelurahan ' . $data['kelurahan'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kelurahan');
	}

	public function editKelurahan($id_kelurahan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah kelurahan ber id ' . $id_kelurahan;
		$this->admo->userPrivilege('kelurahan', $isi_log_2);

		$data_kelurahan = $this->getKelurahanById($id_kelurahan);
		$data = [
			'kelurahan'		=> ucwords(strtolower($this->input->post('kelurahan', true))),
			'id_kecamatan'	=> $this->input->post('id_kecamatan', true)
		];

		$this->db->update('kelurahan', $data, ['id_kelurahan' => $id_kelurahan]);

		$isi_log = 'Kelurahan ' . $data['kelurahan'] . ' berhasil diubah';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kelurahan');
	}

	public function removeKelurahan($id_kelurahan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus kelurahan ber id ' . $id_kelurahan;
		$this->admo->userPrivilege('kelurahan', $isi_log_2);

		$data_kelurahan = $this->getKelurahanById($id_kelurahan);
		$kelurahan  = $data_kelurahan['kelurahan'];
		
		$this->db->delete('pengaduan', ['id_kelurahan' => $id_kelurahan]);
		$this->db->delete('kelurahan', ['id_kelurahan' => $id_kelurahan]);
		$isi_log = 'Kelurahan ' . $kelurahan . ' berhasil dihapus';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kelurahan'); 
	}
}
