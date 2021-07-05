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

	public function addTanggapan($id_pengaduan)
	{
		$dataUser = $this->admo->getDataUserAdmin();

		// cek status tanggapan
		$isi_tanggapan = $this->input->post('isi_tanggapan', true);

		$status_tanggapan = strtolower($this->input->post('status_tanggapan', true));
		
		if ($status_tanggapan == null) 
		{
			$isi_log = 'Tanggapan ' . $isi_tanggapan . ' gagal ditambahkan';
			$this->lomo->addLog($isi_log, $dataUser['id_user']);
			$this->session->set_flashdata('message-failed', $isi_log);
			redirect('tanggapan/index/' . $id_pengaduan);
			exit;
		}

		$foto_tanggapan = $_FILES['foto_tanggapan']['name'];
		if ($foto_tanggapan) {
			$config['upload_path'] = './assets/img/img_tanggapan/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('foto_tanggapan')) {
				$new_foto_tanggapan = $this->upload->data('file_name');
				$this->db->set('foto_tanggapan', $new_foto_tanggapan);
			} else {
				echo $this->upload->display_errors();
			}
		}
		

		$data = [
			'isi_tanggapan'		=> $isi_tanggapan,
			'tgl_tanggapan'		=> date('Y-m-d\TH:i:s'),
			'status_tanggapan'	=> $status_tanggapan,
			'id_pengaduan'		=> $id_pengaduan,
			'id_user' 			=> $dataUser['id_user']
		];

		$this->db->insert('tanggapan', $data);
		$this->db->update('pengaduan', ['status_pengaduan' => $status_tanggapan], ['id_pengaduan' => $id_pengaduan]);

		$isi_log = 'Tanggapan ' . $data['isi_tanggapan'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('tanggapan/index/' . $id_pengaduan);
	}

	public function editTanggapan($id_pengaduan, $id_tanggapan)
	{
		$dataUser = $this->admo->getDataUserAdmin();

		$data_tanggapan = $this->getTanggapanById($id_tanggapan);

		$foto_tanggapan = $_FILES['foto_tanggapan']['name'];
		if ($foto_tanggapan) 
		{
			$config['upload_path'] = './assets/img/img_tanggapan/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('foto_tanggapan')) 
			{
				$old_foto = $data_tanggapan['foto_tanggapan'];
				if ($old_foto != 'default.png') 
				{
					unlink(FCPATH . 'assets/img/img_tanggapan/' . $data_tanggapan['foto_tanggapan']);
				}
				$new_foto = $this->upload->data('file_name');
				$this->db->set('foto_tanggapan', $new_foto);
			}
			else 
			{
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'isi_tanggapan'		=> $this->input->post('isi_tanggapan', true),
			'tgl_tanggapan'		=> date('Y-m-d\TH:i:s'),
			'id_user' 			=> $dataUser['id_user']
		];

		$this->db->update('tanggapan', $data, ['id_tanggapan' => $id_tanggapan]);

		$isi_log = 'Tanggapan ' . $data['isi_tanggapan'] . ' berhasil diubah';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('tanggapan/index/' . $id_pengaduan);
	}

	public function removeTanggapan($id_pengaduan, $id_tanggapan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus tanggapan ber id ' . $id_tanggapan;
		$this->admo->userPrivilege('tanggapan/index/' . $id_pengaduan, $isi_log_2);
		
		// cek apakah tanggapan yang dihapus itu baris terakhir
		$last_row = $this->db->select('*')->limit(1)->order_by('id_tanggapan','DESC')->get_where('tanggapan', ['id_pengaduan' => $id_pengaduan])->row_array()['id_tanggapan'];

		if ($id_tanggapan != $last_row) 
		{
			$this->lomo->addLog($isi_log_2, $dataUser['id_user']);
			redirect('tanggapan/index/' . $id_pengaduan);
			exit;
		}

		$data_tanggapan = $this->getTanggapanById($id_tanggapan);
		$status = explode('_', $data_tanggapan['status_tanggapan']);
		$status = implode(' ', $status);
		$status = ucwords(strtolower($status));

		if ($data_tanggapan['status_tanggapan'] == 'proses') 
		{
			$status_pengaduan = 'belum_ditanggapi';
		}
		elseif ($data_tanggapan['status_tanggapan'] == 'valid') 
		{
			$status_pengaduan = 'proses';
		}
		elseif ($data_tanggapan['status_tanggapan'] == 'pengerjaan') 
		{
			$status_pengaduan = 'valid';
		}
		elseif ($data_tanggapan['status_tanggapan'] == 'selesai') 
		{
			$status_pengaduan = 'pengerjaan';
		}
		elseif ($data_tanggapan['status_tanggapan'] == 'tidak_valid') 
		{
			$status_pengaduan = 'proses';
		} 
		else
		{
			$status_pengaduan = 'belum_ditanggapi';
		}
		
		$this->db->update('pengaduan', ['status_pengaduan' => $status_pengaduan], ['id_pengaduan' => $id_pengaduan]);

		$tanggapan  = $data_tanggapan['isi_tanggapan'] . ' dengan status ' . $status;
		$this->db->delete('tanggapan', ['id_tanggapan' => $id_tanggapan]);
		$isi_log = 'Tanggapan ' . $tanggapan . ' berhasil dihapus';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('tanggapan/index/' . $id_pengaduan);
	}
}
