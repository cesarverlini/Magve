<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //$this->load->model('Servicios_model');
    }

    public function index(){
        $data['title'] = "Servicios";
        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view('servicios/index');
        $this->load->view('adminlte-3.0.1/footer');
        
    }

    // metodo para cargar vistas dentro de los servicio
    public function vista($page = 'index')
	{
        if(!file_exists(APPPATH.'views/servicios/'.$page.'.php')){
            $page = 'error_servicio';
        }

        if($page != 'index'){
            $data['title'] = ucfirst($page);
            $this->load->view('adminlte-3.0.1/header', $data);
            $this->load->view('servicios/'.$page.'.php');
            $this->load->view('adminlte-3.0.1/footer');
        }else{
            redirect('servicios');
        }
    }

    // solicitar información de local
    public function local($id_local){
        $data['title'] = 'Detalles de local';
        //$data['local'] = llamado a la api.
        
        $data['id_local'] = $id_local;

        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view('servicios/local_detalle.php');
        $this->load->view('adminlte-3.0.1/footer');
    }

}