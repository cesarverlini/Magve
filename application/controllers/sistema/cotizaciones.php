<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Cotizaciones_model');
	}
	public function index()
	{		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("sistema/cotizacion");
		$this->load->view("layouts/footer");
	}
	public function crear_cotizacion()
	{
		if($this->input->is_ajax_request()){
			$data = array(				
				'nombre' => trim($this->input->post('nombre')),
				'cantidad' => trim($this->input->post('cantidad')),
				'precio_unitario' => trim($this->input->post('precio')),
				'total' => trim($this->input->post('total')),
			);
			
			$this->Cotizaciones_model->insert_bebidas($data);
			
		}else{
			show_404();
		}
	}
}
