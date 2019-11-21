<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		//$this->load->model('Ventas_model');
    }
    
    /*
    * Función index cargará dos opciones
    * crear venta nueva
    * crear venta en base a cotización
    */
    public function index(){

        //$data['locales'] = $this->ventas_model->mostrar_todo();

        $this->load->view('layouts/header');
        $this->load->view('ventas/index');
        $this->load->view('layouts/footer');

    }
}