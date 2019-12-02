<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Ventas_model');
    }
    
    /*
    * Función index cargará dos opciones
    * crear venta nueva
    * crear venta en base a cotización
    */
    public function index(){

        $cotizacion['cotizaciones'] = $this->Ventas_model->get_cotizaciones();
		
		$data['title'] = "Venta";		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/index', $cotizacion);
        $this->load->view('adminlte-3.0.1/footer');  

        // $this->load->view('layouts/header');
        // $this->load->view('ventas/index', $data);
        // $this->load->view('layouts/footer');
    }

    public function check_cotizacion($id_cotizacion = null){

        if(!isset($id_cotizacion)){
            $mensaje = "Algo salió mal. No se proporcionó una cotización valida";
        }else{
            $mensaje = "Cotización recibida con exito";
        }

        $data['mensaje'] = $mensaje;
        $this->load->view('layouts/header');
        $this->load->view('ventas/check_cotizacion', $data);
        $this->load->view('layouts/footer');
	}
	public function correos()
	{
		$respuesta = $this->Ventas_model->get_email();
		// $data = $this->input->post('correo');
		echo json_encode($respuesta);
	}
	public function autocomplete()
	{
		$data = $this->input->post();
		$respuesta = $this->Ventas_model->autocomplete($data);
		echo json_encode($respuesta);
	}
}
