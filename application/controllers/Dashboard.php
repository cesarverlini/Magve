<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	public function index()
	{
		$data['title'] = "Dashboard";
        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view("admin/dashboard");
        $this->load->view('adminlte-3.0.1/footer');        
// 		$this->load->view("layouts/header");
// 		$this->load->view("layouts/aside");
// 		$this->load->view("admin/dashboard");
// 		$this->load->view("layouts/footer");

	}

}
