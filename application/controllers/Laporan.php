 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Pengaduan_model', 'pemo');
		$this->load->model('Masyarakat_model', 'mamo');
		$this->load->model('Kelurahan_model', 'kelmo');
		$this->load->model('Kecamatan_model', 'kemo');

		$this->admo->checkLoginAdmin();
	}

	public function index()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title']  	= 'Laporan';
		if (isset($_POST['btnFilter'])) 
		{
			$data['pengaduan']	= $this->pemo->getPengaduanFilter($_POST['dari_tgl'], $_POST['sampai_tgl'], $_POST['status_pengaduan']);
		}
		else
		{
			$data['pengaduan']	= $this->pemo->getPengaduan();
		}

		$this->load->view('templates/header-admin', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function printLaporan($dari_tgl = '', $sampai_tgl = '', $status_pengaduan = '')
	{
		if ($dari_tgl != null) 
		{
			$data['filter'] = $dari_tgl . '/' . $sampai_tgl . '/' . $status_pengaduan;
			$data['title'] = 'Cetak Laporan - ' . $dari_tgl . ' - ' . $sampai_tgl . ' dengan status ' . $status_pengaduan;
		}
		else
		{
			$data['filter'] = date('Y-m-01') . '/' . date('Y-m-d') . '/' . 'semua';
			$data['title'] = 'Cetak Laporan';
		}
		$this->load->view('laporan/print_laporan', $data);
	}
}
