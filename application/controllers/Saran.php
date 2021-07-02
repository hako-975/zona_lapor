<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Saran_model', 'samo');

		$this->admo->checkLoginAdmin();
	}

	public function index()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Saran';
		$data['saran'] 		= $this->samo->getSaran();
		$this->load->view('templates/header-admin', $data);
		$this->load->view('saran/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}
}
