<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getKecamatan()
	{
		$this->db->order_by('kecamatan', 'asc');
		return $this->db->get('kecamatan')->result_array();	
	}

	public function getKecamatanById($id_kecamatan)
	{
		return $this->db->get_where('kecamatan', ['id_kecamatan' => $id_kecamatan])->row_array();	
	}

	public function addKecamatan()
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan kecamatan';
		$this->admo->userPrivilege('kecamatan', $isi_log_2);

		$data = [
			'kecamatan'		=> ucwords(strtolower($this->input->post('kecamatan', true)))
		];

		$this->db->insert('kecamatan', $data);

		$isi_log = 'Kecamatan ' . $data['kecamatan'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kecamatan');
	}

	public function editKecamatan($id_kecamatan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah kecamatan ber id ' . $id_kecamatan;
		$this->admo->userPrivilege('kecamatan', $isi_log_2);

		$data_kecamatan = $this->getKecamatanById($id_kecamatan);
		$kecamatan  = $data_kecamatan['kecamatan'];
		$data = [
			'kecamatan'		=> ucwords(strtolower($this->input->post('kecamatan', true)))
		];

		$this->db->update('kecamatan', $data, ['id_kecamatan' => $id_kecamatan]);

		$isi_log = 'Kecamatan ' . $data['kecamatan'] . ' berhasil diubah';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kecamatan');
	}

	public function removeKecamatan($id_kecamatan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus kecamatan ber id ' . $id_kecamatan;
		$this->admo->userPrivilege('kecamatan', $isi_log_2);

		$data_kecamatan = $this->getKecamatanById($id_kecamatan);
		$kecamatan  = $data_kecamatan['kecamatan'];
		
		$this->db->delete('kelurahan', ['id_kecamatan' => $id_kecamatan]);
		$this->db->delete('kecamatan', ['id_kecamatan' => $id_kecamatan]);
		$isi_log = 'Kecamatan ' . $kecamatan . ' berhasil dihapus';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kecamatan'); 
	}
}