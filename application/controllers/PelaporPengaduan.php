 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelaporPengaduan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelapor_model', 'pelmo');
		$this->load->model('PelaporPengaduan_model', 'pepemo');
		$this->load->model('Kelurahan_model', 'kelmo');
		$this->load->model('Kecamatan_model', 'kemo');

		$this->pelmo->checkLoginUser();
	}

	public function getKelurahanFilePelapor()
	{
		$this->load->view('pelapor_pengaduan/get_kelurahan', $data);
	}

	public function index($status_pengaduan = '')
	{
		$data['dataUser']	= $this->pelmo->getDataUser();
		$data['title']  	= 'Pengaduan';
		$data['pengaduan']	= $this->pepemo->getPengaduanByStatusPengaduanByIdMasyarakat($status_pengaduan, $data['dataUser']['id_masyarakat']);

		$this->load->view('templates/header-pelapor', $data);
		$this->load->view('pelapor_pengaduan/index', $data);
		$this->load->view('templates/footer-pelapor', $data);
	}

	public function addPelaporPengaduan()
	{
		$data['dataUser']	= $this->pelmo->getDataUser();
		$data['kelurahan']	= $this->kelmo->getKelurahan();
		$data['kecamatan']	= $this->kemo->getKecamatan();
		$data['title'] 		= 'Tambah Pengaduan';

		$this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required|trim|is_natural_no_zero');
		$this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-pelapor', $data);
		    $this->load->view('pelapor_pengaduan/add_pelapor_pengaduan', $data);
		    $this->load->view('templates/footer-pelapor', $data);  
		    $this->load->view('templates/include/form_kecamatan_pelapor', $data);  
		} else {
		    $this->pepemo->addPelaporPengaduan();
		}
	}

	public function editPelaporPengaduan($id_pengaduan)
	{
		$data['dataUser']	= $this->pelmo->getDataUser();
		$data['kelurahan']	= $this->kelmo->getKelurahan();
		$data['kecamatan']	= $this->kemo->getKecamatan();
		$data['pengaduan']	= $this->pepemo->getPengaduanById($id_pengaduan);
		$data['title'] 		= 'Ubah Pengaduan - ' . $data['pengaduan']['isi_laporan'];

		// cek status pengaduan
		if ($tanggapan = $this->db->get_where('tanggapan', ['id_pengaduan' => $id_pengaduan])->row_array()) 
		{
			if ($tanggapan['status_tanggapan'] != null) 
			{
				$isi_log = 'Pengaduan ' . $data['pengaduan']['isi_laporan'] . ' tidak dapat diubah karena telah ditanggapi oleh petugas';
				$this->session->set_flashdata('message-failed', $isi_log);
				redirect('pelaporPengaduan');
			}
		}

		$this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required|trim|is_natural_no_zero');
		$this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-pelapor', $data);
		    $this->load->view('pelapor_pengaduan/edit_pelapor_pengaduan', $data);
		    $this->load->view('templates/footer-pelapor', $data);  
		    $this->load->view('templates/include/form_kecamatan', $data);  
		} else {
		    $this->pepemo->editPelaporPengaduan($id_pengaduan);
		}
	}

	public function removePelaporPengaduan($id_pengaduan)
	{
		$data['pengaduan']	= $this->pepemo->getPengaduanById($id_pengaduan);

		// cek status pengaduan
		if ($tanggapan = $this->db->get_where('tanggapan', ['id_pengaduan' => $id_pengaduan])->row_array()) 
		{
			if ($tanggapan['status_tanggapan'] != null) 
			{
				$isi_log = 'Pengaduan ' . $data['pengaduan']['isi_laporan'] . ' tidak dapat dihapus karena telah ditanggapi oleh petugas';
				$this->session->set_flashdata('message-failed', $isi_log);
				redirect('pelaporPengaduan');
			}
		}

		$data['dataUser']	= $this->pelmo->getDataUser();
		$this->pepemo->removePelaporPengaduan($id_pengaduan);
	}
}
