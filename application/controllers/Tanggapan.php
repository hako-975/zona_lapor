<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Tanggapan_model', 'tamo');
		$this->load->model('Pengaduan_model', 'pemo');

		$this->admo->checkLoginAdmin();
	}

	public function index($id_pengaduan = 0)
	{
		if ($id_pengaduan == 0) 
		{
			redirect('pengaduan');
			exit;
		}

		$data['id_pengaduan'] 	= $id_pengaduan;
		$data['pengaduan']		= $this->pemo->getPengaduanById($id_pengaduan);
		$data['dataUser']		= $this->admo->getDataUserAdmin();
		$data['title']  		= 'Tanggapan - ' . $data['pengaduan']['isi_laporan'];
		$data['tanggapan']		= $this->tamo->getTanggapanByIdPengaduan($id_pengaduan);

		$this->load->view('templates/header-admin', $data);
		$this->load->view('tanggapan/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function addTanggapan($id_pengaduan)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['pengaduan']	= $this->pemo->getPengaduanById($id_pengaduan);
		$data['title']  	= 'Tambah Tanggapan - ' . $data['pengaduan']['isi_laporan'];

		$this->form_validation->set_rules('isi_tanggapan', 'Isi Tanggapan', 'required|trim');
		$this->form_validation->set_rules('status_tanggapan', 'Status Tanggapan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('tanggapan/add_tanggapan', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->tamo->addTanggapan($id_pengaduan);
		}
	}

	public function editTanggapan($id_pengaduan, $id_tanggapan)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['pengaduan']	= $this->pemo->getPengaduanById($id_pengaduan);
		$data['tanggapan']	= $this->tamo->getTanggapanById($id_tanggapan);
		$data['title'] 		= 'Ubah Tanggapan - ' . $data['tanggapan']['isi_tanggapan'];

		$this->form_validation->set_rules('isi_tanggapan', 'Isi Tanggapan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('tanggapan/edit_tanggapan', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->tamo->editTanggapan($id_pengaduan, $id_tanggapan);
		}
	}

	public function removeTanggapan($id_pengaduan, $id_tanggapan)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$this->tamo->removeTanggapan($id_pengaduan, $id_tanggapan);
	}
}
