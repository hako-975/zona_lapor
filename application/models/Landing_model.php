<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_model extends CI_Model 
{
	public function daftar()
	{
		$data = [
			'nama'		=> ucwords(strtolower($this->input->post('nama', true))),
			'username'	=> $this->input->post('username', true),
			'password'	=> password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'no_telepon'=> $this->input->post('no_telepon', true),
			'alamat'	=> $this->input->post('alamat', true)
		];

		$this->db->insert('masyarakat', $data);

		$isi_log = 'Masyarakat ' . $data['username'] . ' berhasil ditambahkan';
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('landing/masuk');
	}

	public function masuk()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		// check username
		if ($dataUser = $this->db->get_where('masyarakat', ['username' => $username])->row_array()) 
		{
			// check password
			if (password_verify($password, $dataUser['password'])) 
			{
				$dataSession = [
					'id_masyarakat' => $dataUser['id_masyarakat']
				];

				$this->session->set_userdata($dataSession);
				redirect('pelapor');
			}
			else
			{
				$this->session->set_flashdata('message-failed', 'Gagal masuk, password yang anda masukkan salah');
				redirect('landing/masuk');
			}
		}
		else
		{
			$this->session->set_flashdata('message-failed', 'Gagal masuk, username yang anda masukkan salah');
			redirect('landing/masuk');
		}
	}

	public function saran()
	{
		$data = [
			'nama'		 => ucwords(strtolower($this->input->post('nama', true))),
			'no_telepon' => $this->input->post('no_telepon', true),
			'alamat'	 => $this->input->post('alamat', true),
			'saran'		 => $this->input->post('saran', true),
			'tgl_saran'	 => date('Y-m-d\TH:i:s')
		];

		$this->db->insert('saran', $data);

		$isi_log = 'Saran ' . $data['nama'] . ' berhasil ditambahkan';
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('landing');
	}
}