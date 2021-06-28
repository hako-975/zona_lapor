<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Log_model', 'lomo');
	}

	public function index()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Riwayat';
		$data['log']   		= $this->lomo->getLog();
		$this->load->view('templates/header-admin', $data);
		$this->load->view('log/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}
}
