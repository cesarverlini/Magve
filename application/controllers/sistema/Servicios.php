<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

    public function __construct(){
        parent::__construct();	
		//$this->load->model('Clientes_model');
    }

    public function index(){
        //$this->load->view('servicios/index');
        $this->load->view('adminlte-3.0.1/header');
        $this->load->view('servicios/index');
        $this->load->view('adminlte-3.0.1/footer');
        
    }
}