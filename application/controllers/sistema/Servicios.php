<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// requerimos la clase para poder hacer uso de los metodos de la api
require(APPPATH.'libraries/servicios/locales.php');

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
            if($page=='locales'){
                $data['locales'] = json_decode(file_get_contents(Locales::ver_local()));
            }
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
        $data['id_local'] = $id_local;
        $data['info_local'] = json_decode(file_get_contents(Locales::ver_local($id_local)));
        // libraries -> servicios -> locales -> API_Domain

        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view('servicios/local_detalle.php');
        $this->load->view('adminlte-3.0.1/footer');
	}
}
