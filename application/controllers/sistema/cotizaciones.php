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
	public function crear_detalle_cotizacion()
	{
		// $this->Crear_Cotizacion();
		// var_dump($this->input->post());
		if($this->input->is_ajax_request()){	

			if ($this->input->post('tipo_servicio') == 'local') {
				$locales = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'direccion' => trim($this->input->post('direccion')), 
					'capacidad' => trim($this->input->post('capacidad')), 
					'costo' => trim($this->input->post('costo')), 
					'fecha_renta' => trim($this->input->post('fecha_renta')),
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($locales);		
			}else if ($this->input->post('tipo_servicio') == 'fotografia') {
				$fotos = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')), 
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($fotos);		
			}
			else if ($this->input->post('tipo_servicio') == 'banquete') {
				$banquete = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')), 
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($banquete);		
			}
			else if ($this->input->post('tipo_servicio') == 'imprenta') {
				$impresiones = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')), 
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($impresiones);		
			}
			else if ($this->input->post('tipo_servicio') == 'decoraciones') {
				$decoraciones = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')), 
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($fotos);		
			}
			// else if ($this->input->post('tipo_servicio') == 'fotografia') {
			// 	$fotos = array(
			// 		'tipo_servicio' => trim($this->input->post('tipo_servicio')),
			// 		'nombre' => trim($this->input->post('nombre')), 
			// 		'descripcion' => trim($this->input->post('descripcion')), 
			// 		'costo' => trim($this->input->post('costo')), 
			// 		'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
			// 	);
			// 	$this->Cotizaciones_model->insert_servicios($fotos);		
			// }
			// else if ($this->input->post('tipo_servicio') == 'fotografia') {
			// 	$fotos = array(
			// 		'tipo_servicio' => trim($this->input->post('tipo_servicio')),
			// 		'nombre' => trim($this->input->post('nombre')), 
			// 		'descripcion' => trim($this->input->post('descripcion')), 
			// 		'costo' => trim($this->input->post('costo')), 
			// 		'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
			// 	);
			// 	$this->Cotizaciones_model->insert_servicios($fotos);		
			// }
			

			// $this->Cotizaciones_model->insert_bebidas($bebidas,$comidas,$postres);
			
		}else{
			show_404();
		}
	}
	function Crear_Cotizacion()
	{
		if($this->input->is_ajax_request()){
			// var_dump($this->input->post());
			$cotizacion = array(				
				'id_empleado' => $this->input->post('id_empleado'), 
				'id_cliente' => $this->input->post('id')			
			);
			$respuesta = $this->Cotizaciones_model->insert_cotizacion($cotizacion);					
			echo $respuesta;
		}
	}
	public function Crear_Cliente()
	{
		if($this->input->is_ajax_request()){
			$cliente = array(				
				'nombre' => trim($this->input->post('nombre')), 
				'correo' => trim($this->input->post('correo')), 
				'telefono' => trim($this->input->post('telefono')), 
			);
			$respuesta = $this->Cotizaciones_model->insert_clientes($cliente);
			// echo $respuesta;
			$cotizacion = array(				
				'id_empleado' => 1, 
				'id_cliente' => $respuesta			
			);
			$respuestacot = $this->Cotizaciones_model->insert_cotizacion($cotizacion);
			echo $respuestacot;
		}

	}
	public function definir_total()
	{
		if($this->input->is_ajax_request()){
			// $cotizacion = array(				
			// 	'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
			// );
			$id_cotizacion = trim($this->input->post('id_cotizacion'));
			$respuesta = $this->Cotizaciones_model->get_detalles($id_cotizacion);
			if ($respuesta) {
				$costo = 0;
				foreach ($respuesta->result() as $row) {
					$costo += $row->costo;
				}
				// echo $costo_total;
				$costo_total = array(
					'total' => $costo
				);
				$respuesta = $this->Cotizaciones_model->set_costototal($id_cotizacion,$costo_total);
				
			}
		}
	}
}


// SELECT * FROM locales 
// WHERE locales.id NOT IN(select id_local FROM renta_locales WHERE fecha_renta = '2019-11-20'); 
