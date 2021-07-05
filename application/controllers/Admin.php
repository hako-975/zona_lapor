<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Pengaduan_model', 'pemo');
	}

	public function index()
	{
		$this->admo->checkLoginAdmin();

		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['pengaduan_belum_ditanggapi']	= $this->pemo->getPengaduanByStatusPengaduan('belum_ditanggapi');
		$data['title'] 		= 'Dasbor';
		$this->load->view('templates/header-admin', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function profile()
	{
		$this->admo->checkLoginAdmin();

		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Profil - ' . $data['dataUser']['username'];
		$this->load->view('templates/header-admin', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function changePassword()
	{
		$this->admo->checkLoginAdmin();

		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Ganti Password - ' . $data['dataUser']['username'];
		$this->form_validation->set_rules('old_password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[3]|matches[verify_new_password]');
		$this->form_validation->set_rules('verify_new_password', 'Verifikasi Password Baru', 'required|trim|min_length[3]|matches[new_password]');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
			$this->load->view('admin/change_password', $data);
			$this->load->view('templates/footer-admin', $data);
		} else {
		    $this->admo->changePassword();
		}
	}

	public function editProfile()
	{
		$this->admo->checkLoginAdmin();

		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Ubah Profil - ' . $data['dataUser']['username'];
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
			$this->load->view('admin/edit_profile', $data);
			$this->load->view('templates/footer-admin', $data);
		} else {
		    $this->admo->editProfile();
		}
	}
}
