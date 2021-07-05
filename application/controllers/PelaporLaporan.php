 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelaporLaporan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelapor_model', 'pelmo');
		$this->load->model('PelaporPengaduan_model', 'pepemo');

		$this->pelmo->checkLoginUser();
	}

	public function index()
	{
		$data['dataUser']	= $this->pelmo->getDataUser();
		$data['title']  	= 'Laporan';
		if (isset($_POST['btnFilter'])) 
		{
			$data['pengaduan']	= $this->pepemo->getPengaduanFilterByIdMasyarakat($_POST['dari_tgl'], $_POST['sampai_tgl'], $_POST['status_pengaduan'], $data['dataUser']['id_masyarakat']);
		}
		else
		{
			$data['pengaduan']	= $this->pepemo->getPengaduanByIdMasyarakat($data['dataUser']['id_masyarakat']);
		}

		$this->load->view('templates/header-pelapor', $data);
		$this->load->view('pelapor_laporan/index', $data);
		$this->load->view('templates/footer-pelapor', $data);
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
		$this->load->view('pelapor_laporan/print_laporan', $data);
	}
}
