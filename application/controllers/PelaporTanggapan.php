<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelaporTanggapan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelapor_model', 'pelmo');
		$this->load->model('PelaporTanggapan_model', 'petamo');
		$this->load->model('PelaporPengaduan_model', 'pepemo');

		$this->pelmo->checkLoginUser();
	}

	public function index($id_pengaduan = 0)
	{
		if ($id_pengaduan == 0) 
		{
			redirect('pelaporPengaduan');
			exit;
		}

		$data['id_pengaduan'] 	= $id_pengaduan;
		$data['pengaduan']		= $this->pepemo->getPengaduanById($id_pengaduan);
		$data['dataUser']		= $this->pelmo->getDataUser();
		$data['title']  		= 'Tanggapan - ' . $data['pengaduan']['isi_laporan'];
		$data['tanggapan']		= $this->petamo->getTanggapanByIdPengaduan($id_pengaduan);

		$this->load->view('templates/header-pelapor', $data);
		$this->load->view('pelapor_tanggapan/index', $data);
		$this->load->view('templates/footer-pelapor', $data);
	}
}
