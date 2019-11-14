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
		// var_dump($this->input->post());
		if($this->input->is_ajax_request()){
			$bebidas = array(				
				'nombre' => trim($this->input->post('Bebida')),
				'cantidad' => trim($this->input->post('cantidadBebida')),
				'precio_unitario' => trim($this->input->post('precioBebida')),
				'total' => trim($this->input->post('totalBebida')),
			);
			$comidas = array(				
				'nombre' => trim($this->input->post('Comida')),
				'cantidad' => trim($this->input->post('cantidadComida')),
				'precio_unitario' => trim($this->input->post('precioComida')),
				'total' => trim($this->input->post('totalComida')),
			);
			// $this->Cotizaciones_model->insert_comidas($bebidas);
			$postres = array(				
				'nombre' => trim($this->input->post('Postre')),
				'cantidad' => trim($this->input->post('cantidadPostre')),
				'precio_unitario' => trim($this->input->post('precioPostre')),
				'total' => trim($this->input->post('totalPostre')),
			);
			// $this->Cotizaciones_model->insert_bebidas($bebidas);		
			$this->Cotizaciones_model->insert_bebidas($bebidas,$comidas,$postres);
			
		}else{
			show_404();
		}
	}
}
