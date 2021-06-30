 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller 
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

	public function getKelurahanFile()
	{
		$this->load->view('pengaduan/get_kelurahan', $data);
	}

	public function index()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title']  	= 'Pengaduan';
		$data['pengaduan']	= $this->pemo->getPengaduan();

		$this->load->view('templates/header-admin', $data);
		$this->load->view('pengaduan/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function addPengaduan()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['masyarakat']	= $this->mamo->getMasyarakat();
		$data['kelurahan']	= $this->kelmo->getKelurahan();
		$data['kecamatan']	= $this->kemo->getKecamatan();
		$data['title'] 		= 'Tambah Pengaduan';

		$this->form_validation->set_rules('id_masyarakat', 'Username Masyarakat', 'required|trim');
		$this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required|trim');
		$this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('pengaduan/add_pengaduan', $data);
		    $this->load->view('templates/footer-admin', $data);  
		    $this->load->view('templates/include/form_kecamatan', $data);  
		} else {
		    $this->pemo->addPengaduan();
		}
	}

	public function editPengaduan($id_pengaduan)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['masyarakat']	= $this->mamo->getMasyarakat();
		$data['kelurahan']	= $this->kelmo->getKelurahan();
		$data['kecamatan']	= $this->kemo->getKecamatan();
		$data['pengaduan']	= $this->pemo->getPengaduanById($id_pengaduan);
		$data['title'] 		= 'Ubah Pengaduan - ' . $data['pengaduan']['isi_laporan'];

		$this->form_validation->set_rules('id_masyarakat', 'Username Masyarakat', 'required|trim');
		$this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required|trim');
		$this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('pengaduan/edit_pengaduan', $data);
		    $this->load->view('templates/footer-admin', $data);  
		    $this->load->view('templates/include/form_kecamatan', $data);  
		} else {
		    $this->pemo->editPengaduan($id_pengaduan);
		}
	}

	public function removePengaduan($id_pengaduan)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$this->pemo->removePengaduan($id_pengaduan);
	}
}
