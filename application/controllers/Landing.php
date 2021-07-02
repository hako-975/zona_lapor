<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaduan_model', 'pemo');
		$this->load->model('Landing_model', 'lamo');
	}

	public function checkLogin()
	{
		if ($this->session->userdata('id_masyarakat')) 
		{
			redirect('pelapor');		
		}
	}

	public function index()
	{
		$this->checkLogin();

		$data['pengaduan']	= $this->pemo->getPengaduan();
		$data['title'] = 'Zona Lapor';
		$this->load->view('templates/header', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function daftar()
	{
		$this->checkLogin();

		$data['title'] = 'Daftar';
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password_verify]');
		$this->form_validation->set_rules('password_verify', 'Verifikasi Password', 'required|trim|min_length[3]|matches[password]');
		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header', $data);
			$this->load->view('landing/daftar', $data);
			$this->load->view('templates/footer', $data);
		} else {
		    $this->lamo->daftar();
		}
	}

	public function masuk()
	{
		$this->checkLogin();

		$data['title'] = 'Masuk';
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header', $data);
			$this->load->view('landing/masuk', $data);
			$this->load->view('templates/footer', $data);
		} else {
		    $this->lamo->masuk();
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('landing/masuk');
	}

	public function privacyPolicy()
	{
		$this->checkLogin();
		$data['title'] = 'Privacy Policy - Zona Lapor';
		$this->load->view('templates/header', $data);
		$this->load->view('landing/privacy_policy', $data);
		$this->load->view('templates/footer', $data);
	}

	public function termsAndConditions()
	{
		$this->checkLogin();
		$data['title'] = 'Terms & Conditions - Zona Lapor';
		$this->load->view('templates/header', $data);
		$this->load->view('landing/terms_and_conditions', $data);
		$this->load->view('templates/footer', $data);
	}

	public function saran()
	{
		$data['title'] = 'Zona Lapor';
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('saran', 'Saran', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header', $data);
			$this->load->view('landing/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
		    $this->lamo->saran();
		}
	}
}
