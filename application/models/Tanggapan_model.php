<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getTanggapan()
	{
		$this->db->join('user', 'tanggapan.id_user=user.id_user');
		$this->db->join('pengaduan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
		$this->db->order_by('id_tanggapan', 'asc');
		return $this->db->get('tanggapan')->result_array();
	}

	public function getTanggapanById($id_tanggapan)
	{
		$this->db->join('user', 'tanggapan.id_user=user.id_user');
		$this->db->join('pengaduan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
		return $this->db->get_where('tanggapan', ['id_tanggapan' => $id_tanggapan])->row_array();	
	}

	public function addTanggapan($id_pengaduan)
	{
		$dataUser = $this->admo->getDataUserAdmin();

		$data = [
			'isi_tanggapan'		=> $this->input->post('isi_tanggapan', true),
			'tgl_tanggapan'		=> $this->input->post('tgl_tanggapan', true),
			'status_tanggapan'	=> strtolower($this->input->post('status_tanggapan', true)),
			'id_pengaduan'		=> $id_pengaduan,
			'id_user' 			=> $dataUser['id_user']
		];

		$this->db->insert('tanggapan', $data);

		$isi_log = 'Tanggapan ' . $data['isi_tanggapan'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('tanggapan/index/' . $id_pengaduan);
	}

	public function editTanggapan($id_pengaduan, $id_tanggapan)
	{
		$dataUser = $this->admo->getDataUserAdmin();

		$data_tanggapan = $this->getTanggapanById($id_tanggapan);
		$data = [
			'isi_tanggapan'		=> $this->input->post('isi_tanggapan', true),
			'tgl_tanggapan'		=> $this->input->post('tgl_tanggapan', true),
			'status_tanggapan'	=> strtolower($this->input->post('status_tanggapan', true)),
			'id_user' 			=> $dataUser['id_user']
		];

		$this->db->update('tanggapan', $data, ['id_tanggapan' => $id_tanggapan]);

		if ($data_tanggapan['status_tanggapan'] != $data['status_tanggapan']) 
		{
			$status = explode('_', $data['status_tanggapan']);
			$status = implode(' ', $status);
			$status = ucwords(strtolower($status));
			$isi_log = 'Tanggapan ' . $data['isi_tanggapan'] . ' dengan status ' . $status . ' berhasil diubah';
		}
		else
		{
			$isi_log = 'Tanggapan ' . $data['isi_tanggapan'] . ' berhasil diubah';
		}
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('tanggapan/index/' . $id_pengaduan);
	}

	public function removeTanggapan($id_pengaduan, $id_tanggapan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus tanggapan ber id ' . $id_tanggapan;
		$this->admo->userPrivilege('tanggapan', $isi_log_2);

		$data_tanggapan = $this->getTanggapanById($id_tanggapan);
		$status = explode('_', $data_tanggapan['status_tanggapan']);
		$status = implode(' ', $status);
		$status = ucwords(strtolower($status));
		$tanggapan  = $data_tanggapan['isi_tanggapan'] . ' dengan status ' . $status;
		
		$this->db->delete('tanggapan', ['id_tanggapan' => $id_tanggapan]);
		$isi_log = 'Tanggapan ' . $tanggapan . ' berhasil dihapus';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('tanggapan/index/' . $id_pengaduan);
	}
}
