<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Masyarakat_model', 'mamo');

		$this->admo->checkLoginAdmin();
	}

	public function index()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title']  	= 'Masyarakat';
		$data['masyarakat']	= $this->mamo->getMasyarakat();
		$this->load->view('templates/header-admin', $data);
		$this->load->view('masyarakat/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function addMasyarakat()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Tambah Masyarakat';

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password_verify]');
		$this->form_validation->set_rules('password_verify', 'Verifikasi Password', 'required|trim|min_length[3]|matches[password]');
		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('masyarakat/add_masyarakat', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->mamo->addMasyarakat();
		}
	}

	public function editMasyarakat($id_masyarakat)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['masyarakat']	= $this->mamo->getMasyarakatById($id_masyarakat);
		$data['title'] 		= 'Ubah Masyarakat - ' . $data['masyarakat']['username'];

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('masyarakat/edit_masyarakat', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->mamo->editMasyarakat($id_masyarakat);
		}
	}

	public function removeMasyarakat($id_masyarakat)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$this->mamo->removeMasyarakat($id_masyarakat);
	}
}
