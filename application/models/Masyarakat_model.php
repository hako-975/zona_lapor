<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getMasyarakat()
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get('masyarakat')->result_array();	
	}

	public function getMasyarakatById($id_masyarakat)
	{
		return $this->db->get_where('masyarakat', ['id_masyarakat' => $id_masyarakat])->row_array();	
	}

	public function addMasyarakat()
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan masyarakat';
		$this->admo->userPrivilege('masyarakat', $isi_log_2);

		$data = [
			'nama'		=> ucwords(strtolower($this->input->post('nama', true))),
			'username'	=> $this->input->post('username', true),
			'password'	=> password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'no_telepon'=> $this->input->post('no_telepon', true),
			'alamat'	=> $this->input->post('alamat', true)
		];

		$this->db->insert('masyarakat', $data);

		$isi_log = 'Masyarakat ' . $data['username'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('masyarakat');
	}

	public function editMasyarakat($id_masyarakat)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah masyarakat ber id ' . $id_masyarakat;
		$this->admo->userPrivilege('masyarakat', $isi_log_2);

		$data_masyarakat = $this->getMasyarakatById($id_masyarakat);
		$masyarakat  = $data_masyarakat['username'];
		$data = [
			'nama'		=> ucwords(strtolower($this->input->post('nama', true))),
			'no_telepon'=> $this->input->post('no_telepon', true),
			'alamat'	=> $this->input->post('alamat', true)
		];

		$this->db->update('masyarakat', $data, ['id_masyarakat' => $id_masyarakat]);

		$isi_log = 'Masyarakat ' . $masyarakat . ' berhasil diubah';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('masyarakat');
	}

	public function removeMasyarakat($id_masyarakat)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus masyarakat ber id ' . $id_masyarakat;
		$this->admo->userPrivilege('masyarakat', $isi_log_2);

		$data_masyarakat = $this->getMasyarakatById($id_masyarakat);
		$masyarakat  = $data_masyarakat['username'];
		
		$this->db->delete('pengaduan', ['id_masyarakat' => $id_masyarakat]);
		$this->db->delete('masyarakat', ['id_masyarakat' => $id_masyarakat]);
		$isi_log = 'Masyarakat ' . $masyarakat . ' berhasil dihapus';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('masyarakat'); 
	}
}
