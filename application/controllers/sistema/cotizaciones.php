<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct(){
		parent::__construct();		
	}
	public function index()
	{		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("sistema/cotizacion");
		$this->load->view("layouts/footer");
	}
}
