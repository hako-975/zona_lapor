<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Kecamatan_model', 'kemo');

		$this->admo->checkLoginAdmin();
	}

	public function index()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title']  	= 'Kecamatan';
		$data['kecamatan']	= $this->kemo->getKecamatan();
		$this->load->view('templates/header-admin', $data);
		$this->load->view('kecamatan/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function addKecamatan()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Tambah Kecamatan';

		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('kecamatan/add_kecamatan', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->kemo->addKecamatan();
		}
	}

	public function editKecamatan($id_kecamatan)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['kecamatan']	= $this->kemo->getKecamatanById($id_kecamatan);
		$data['title'] 		= 'Ubah Kecamatan - ' . $data['kecamatan']['kecamatan'];

		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('kecamatan/edit_kecamatan', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->kemo->editKecamatan($id_kecamatan);
		}
	}

	public function removeKecamatan($id_kecamatan)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$this->kemo->removeKecamatan($id_kecamatan);
	}
}
