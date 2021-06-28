<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller 
{
	public function index()
	{
		$data['title'] = 'Landing Page';
		$this->load->view('templates/header', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
