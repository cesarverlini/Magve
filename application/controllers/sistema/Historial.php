<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historial extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Historial_model');
	}

	public function index()
	{		
		$data['ventas'] = $this->Historial_model->get_ventas();
		// var_dump($data['ventas']);
		$data['title'] = "Historial Ventas";		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/historial');
        $this->load->view('adminlte-3.0.1/footer');
	}
	public function ver_venta()
	{
		$id = $this->uri->segment(2);		
		$data['title'] = "Venta";		

		$data['venta'] = $this->Historial_model->get_venta($id);
		$cotizacion = $data['venta'];
		// var_dump($cotizacion[0]->id_cotizacion);
		$data['detalle_venta'] = $this->Historial_model->get_venta_detalle($cotizacion[0]->id_cotizacion);

		$this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/ver_venta');
        $this->load->view('adminlte-3.0.1/footer');
	}

}
