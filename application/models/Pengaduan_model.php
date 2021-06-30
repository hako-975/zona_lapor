<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getPengaduan()
	{
		$this->db->join('masyarakat', 'pengaduan.id_masyarakat=masyarakat.id_masyarakat');
		$this->db->join('kelurahan', 'pengaduan.id_kelurahan=kelurahan.id_kelurahan');
		$this->db->order_by('pengaduan', 'asc');
		return $this->db->get('pengaduan')->result_array();
	}

	public function getPengaduanById($id_pengaduan)
	{
		$this->db->join('masyarakat', 'pengaduan.id_masyarakat=masyarakat.id_masyarakat');
		$this->db->join('kelurahan', 'pengaduan.id_kelurahan=kelurahan.id_kelurahan');
		return $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row_array();	
	}

	public function addPengaduan()
	{
		$dataUser = $this->admo->getDataUserAdmin();

		$data = [
			'isi_laporan'	=> $this->input->post('isi_laporan', true),
			'id_masyarakat'	=> $this->input->post('id_masyarakat', true),
			'id_kelurahan'	=> $this->input->post('id_kelurahan', true)
		];

		$this->db->insert('pengaduan', $data);

		$isi_log = 'Pengaduan ' . $data['isi_laporan'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('pengaduan');
	}

	public function editPengaduan($id_pengaduan)
	{
		$dataUser = $this->admo->getDataUserAdmin();

		$data_pengaduan = $this->getPengaduanById($id_pengaduan);
		$data = [
			'isi_laporan'	=> $this->input->post('isi_laporan', true),
			'id_masyarakat'	=> $this->input->post('id_masyarakat', true),
			'id_kelurahan'	=> $this->input->post('id_kelurahan', true)
		];

		$this->db->update('pengaduan', $data, ['id_pengaduan' => $id_pengaduan]);

		$isi_log = 'Pengaduan ' . $data['pengaduan'] . ' berhasil diubah';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('pengaduan');
	}

	public function removePengaduan($id_pengaduan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'Pengaduan ' . $dataUser['username'] . ' mencoba menghapus pengaduan ber id ' . $id_pengaduan;
		$this->admo->userPrivilege('pengaduan', $isi_log_2);

		$data_pengaduan = $this->getPengaduanById($id_pengaduan);
		$pengaduan  = $data_pengaduan['isi_laporan'];
		
		$this->db->delete('pengaduan', ['id_pengaduan' => $id_pengaduan]);
		$this->db->delete('pengaduan', ['id_pengaduan' => $id_pengaduan]);
		$isi_log = 'Pengaduan ' . $pengaduan . ' berhasil dihapus';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('pengaduan'); 
	}
}
