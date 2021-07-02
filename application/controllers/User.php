<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('User_model', 'usmo');

		$this->admo->checkLoginAdmin();
	}

	public function index()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title']  	= 'User';
		$data['user']		= $this->usmo->getUser();
		$this->load->view('templates/header-admin', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function addUser()
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['title'] 		= 'Tambah User';
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password_verify]');
		$this->form_validation->set_rules('password_verify', 'Verifikasi Password', 'required|trim|min_length[3]|matches[password]');
		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('user/add_user', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->usmo->addUser();
		}
	}

	public function editUser($id_user)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$data['user']  		= $this->usmo->getUserById($id_user);
		$data['title'] 		= 'Ubah User - ' . $data['user']['username'];
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('user/edit_user', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->usmo->editUser($id_user);
		}
	}

	public function removeUser($id_user)
	{
		$data['dataUser']	= $this->admo->getDataUserAdmin();
		$this->usmo->removeUser($id_user);
	}
}
