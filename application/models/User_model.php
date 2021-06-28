<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getUser()
	{
		$this->db->order_by('jabatan', 'asc');
		return $this->db->get('user')->result_array();	
	}

	public function getUserById($id_user)
	{
		return $this->db->get_where('user', ['id_user' => $id_user])->row_array();	
	}

	public function addUser()
	{
		$dataUser = $this->admo->getDataUserAdmin();

		$data = [
			'nama' 			=> ucwords(strtolower($this->input->post('nama', true))),
			'username' 		=> $this->input->post('username', true),
			'password'		=> password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'no_telepon'	=> $this->input->post('no_telepon', true),
			'jabatan'		=> strtolower($this->input->post('jabatan', true))
		];

		$this->db->insert('user', $data);

		$isi_log = 'Pengguna ' . $data['username'] . ' berhasil ditambahkan!';
		
		$this->lomo->addLog($isi_log, $dataUser['id_user']);

		redirect('user');
	}

	public function editUser($id_user)
	{
		$dataUser = $this->admo->getDataUserAdmin();

		$data = [
			'nama' 			=> ucwords(strtolower($this->input->post('nama', true))),
			'no_telepon'	=> $this->input->post('no_telepon', true),
			'jabatan'		=> strtolower($this->input->post('jabatan', true))
		];

		$this->db->update('user', $data, ['id_user' => $id_user]);

		$isi_log = 'Pengguna ' . $data['username'] . ' berhasil diubah!';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);

		redirect('user');
	}

	public function removeUser($id_user)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		
		$data_user = $this->getUserById($id_user);
		$username  = $data_user['username'];
		
		$this->db->delete('user', ['id_user' => $id_user]);
		
		$isi_log = 'Pengguna ' . $username . ' berhasil dihapus!';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);

		redirect('user'); 
	}
}