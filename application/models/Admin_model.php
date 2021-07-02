<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'lomo');
	}

	public function checkLoginAdmin()
	{
		if (!$this->session->userdata('id_user')) 
		{
			redirect('auth');
		}
	}

	public function getDataUserAdmin()
	{
		$id_user = $this->session->userdata('id_user');
		return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
	}

	public function getDataUserAdminByUsername($username)
	{
		return $this->db->get_where('user', ['username' => $username])->row_array();
	}

	public function userPrivilege($redirect = 'admin', $isi2 = '')
	{
		$dataUser = $this->getDataUserAdmin();
		if ($dataUser['jabatan'] != 'administrator') {
			$isi = 'Akses ditolak! Karena jabatan anda sebagai ' . $dataUser['jabatan'] . '! Hubungi Administrator untuk melakukan perubahan! ';
			$isi .= ucfirst($isi2);

			$this->session->set_flashdata('message-failed', $isi);
			
			$id_user = $dataUser['id_user'];
			$this->lomo->addLog($isi, $id_user);
			redirect($redirect);
			exit();
		}
	}

	public function changePassword()
	{
		$dataUser 	= $this->getDataUserAdmin();
		$id_user 	= $dataUser['id_user'];

		// check old password
		$old_password = $this->input->post('old_password', true);

		if (password_verify($old_password, $dataUser['password'])) 
		{
			$new_password = password_hash($this->input->post('new_password', true), PASSWORD_DEFAULT);

			$data = [
				'password' => $new_password
			];

			$this->db->update('user', $data, ['id_user' => $id_user]);

			$isi_log = "Password berhasil diubah!";
			$this->lomo->addLog($isi_log, $id_user);
			$this->session->set_flashdata('message-success', $isi_log);
			redirect('admin/profile');
		}
		else
		{
			$isi_log = "Password gagal diubah, password lama tidak sesuai";
			$this->lomo->addLog($isi_log, $id_user);
			$this->session->set_flashdata('message-failed', $isi_log);
			redirect('admin/profile');
		}
	}

	public function editProfile()
	{
		$dataUser 	= $this->getDataUserAdmin();
		$id_user 	= $dataUser['id_user'];

		$data = [
			'nama' => ucwords(strtolower($this->input->post('nama', true))),
			'no_telepon' => $this->input->post('no_telepon')
		];

		$this->db->update('user', $data, ['id_user' => $id_user]);

		$isi_log = "Profil berhasil diubah!";
		$this->lomo->addLog($isi_log, $id_user);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('admin/profile');
	}
}