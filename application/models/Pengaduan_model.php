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
		$this->db->order_by('id_pengaduan', 'desc');
		return $this->db->get('pengaduan')->result_array();
	}

	public function getPengaduanFilter($dari_tgl, $sampai_tgl, $status_pengaduan)
	{
		$dari_tgl = date("Y-m-d\T00:00:01", strtotime($dari_tgl));
		$sampai_tgl = date("Y-m-d\T23:59:59", strtotime($sampai_tgl));
		$this->db->join('masyarakat', 'pengaduan.id_masyarakat=masyarakat.id_masyarakat');
		$this->db->join('kelurahan', 'pengaduan.id_kelurahan=kelurahan.id_kelurahan');
		$this->db->order_by('id_pengaduan', 'desc');
		if ($status_pengaduan == 'semua')
		{
			return $this->db->get_where('pengaduan', ['tgl_pengaduan >=' => $dari_tgl, 'tgl_pengaduan <=' => $sampai_tgl])->result_array();
		}
		else
		{
			return $this->db->get_where('pengaduan', ['tgl_pengaduan >=' => $dari_tgl, 'tgl_pengaduan <=' => $sampai_tgl, 'status_pengaduan' => $status_pengaduan])->result_array();
		}
	}

	public function getPengaduanByStatusPengaduan($status_pengaduan = '')
	{
		$this->db->join('masyarakat', 'pengaduan.id_masyarakat=masyarakat.id_masyarakat');
		$this->db->join('kelurahan', 'pengaduan.id_kelurahan=kelurahan.id_kelurahan');
		$this->db->order_by('id_pengaduan', 'desc');
		if ($status_pengaduan) 
		{
			return $this->db->get_where('pengaduan', ['pengaduan.status_pengaduan' => $status_pengaduan])->result_array();
		} 
		else 
		{
			return $this->db->get('pengaduan')->result_array();
		}
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
		
		$foto = $_FILES['foto']['name'];
		if ($foto) {
			$config['upload_path'] = './assets/img/img_pengaduan/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('foto')) {
				$new_foto = $this->upload->data('file_name');
				$this->db->set('foto', $new_foto);
			} else {
				echo $this->upload->display_errors();
			}
		}
		
		$data = [
			'isi_laporan'	=> $this->input->post('isi_laporan', true),
			'id_masyarakat'	=> $this->input->post('id_masyarakat', true),
			'id_kelurahan'	=> $this->input->post('id_kelurahan', true),
			'tgl_pengaduan' => date('Y-m-d\TH:i:s')
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

		$foto = $_FILES['foto']['name'];
		if ($foto) 
		{
			$config['upload_path'] = './assets/img/img_pengaduan/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('foto')) 
			{
				$old_foto = $data_pengaduan['foto'];
				if ($old_foto != 'default.png') 
				{
					unlink(FCPATH . 'assets/img/img_pengaduan/' . $data_pengaduan['foto']);
				}
				$new_foto = $this->upload->data('file_name');
				$this->db->set('foto', $new_foto);
			}
			else 
			{
				echo $this->upload->display_errors();
			}
		}

		$this->db->update('pengaduan', $data, ['id_pengaduan' => $id_pengaduan]);

		$isi_log = 'Pengaduan ' . $data['isi_laporan'] . ' berhasil diubah';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('pengaduan');
	}

	public function removePengaduan($id_pengaduan)
	{
		$dataUser = $this->admo->getDataUserAdmin();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus pengaduan ber id ' . $id_pengaduan;
		$this->admo->userPrivilege('pengaduan', $isi_log_2);
		$data_pengaduan = $this->getPengaduanById($id_pengaduan);
		$pengaduan  = $data_pengaduan['isi_laporan'];
		
		$old_foto = $data_pengaduan['foto'];
		if ($old_foto != 'default.png') 
		{
			unlink(FCPATH . 'assets/img/img_pengaduan/' . $data_pengaduan['foto']);
		}
		
		$this->db->delete('tanggapan', ['id_pengaduan' => $id_pengaduan]);
		$this->db->delete('pengaduan', ['id_pengaduan' => $id_pengaduan]);
		$isi_log = 'Pengaduan ' . $pengaduan . ' berhasil dihapus';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('pengaduan'); 
	}
}
