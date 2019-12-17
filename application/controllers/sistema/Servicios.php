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
    public function vista($page = 'index'){

        $servicios = array(
            0 => 'locales', 
            1 => 'reposteria', 
            2 => 'fotografia', 
            3 => 'publicidad',
            4 => 'musica',
            5 => 'banquetes',
            6 => 'decoracion'
        );

        // Si retorna un número si es vista valida
        $index_servicios = array_search( $page, $servicios );
        if( is_numeric( $index_servicios ) ){

            $nombre_servicio = $servicios[ $index_servicios ];
            $data['title'] = $libreria_servicio = ucfirst( $nombre_servicio );

            // Llamamos a la librería que contiene los metodos de la API
            require(APPPATH.'libraries/servicios/'.$libreria_servicio.'.php');
            /*
            * Locales       Fotografía  Publicidad
            * Banquetes     Música      Repostería
            */

            // API NUESTRA
            if( $nombre_servicio == 'locales' ){
                // cargamos la información de la API
                $data['locales'] = json_decode(file_get_contents(Locales::ver_local()));

            }else  if( $nombre_servicio == 'decoracion' ){ //API ALAIN
                // cargamos la información de la API
                $data['paquetes'] = json_decode(file_get_contents(Decoracion::tabla_paquetes()));

            }else  if( $nombre_servicio == 'reposteria' ){
                // cargamos la información de la API
                $data['paquetes'] = json_decode(file_get_contents(Reposteria::tabla_paquetes()));

            }else{
                $nombre_servicio = 'servicios_template';
                $data['paquetes'] = json_decode(file_get_contents($libreria_servicio::tabla_paquetes()));
            }
            
            $this->load->view('adminlte-3.0.1/header', $data);
            $this->load->view('servicios/'.$nombre_servicio);
            $this->load->view('adminlte-3.0.1/footer');

        }else{
            // Si no se encuentra el servicio se redirige al index
            redirect('servicios');
        }
    }

    // solicitar información de local
    public function local($id_local){

        require(APPPATH.'libraries/servicios/Locales.php');

        $data['title'] = 'Detalles de local';
        $data['id_local'] = $id_local;
        $data['info_local'] = json_decode(file_get_contents(Locales::ver_local($id_local)));
        // libraries -> servicios -> locales -> API_Domain

        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view('servicios/local_detalle.php');
        $this->load->view('adminlte-3.0.1/footer');
	}

	public function paquete($id_paquete){

        require(APPPATH.'libraries/servicios/Reposteria.php');

        $data['title'] = 'Detalles de Paquete Reposteria';
        $data['id_paquete'] = $id_paquete;
        $data['info_paquete'] = json_decode(file_get_contents(Reposteria::tabla_paquetes($id_paquete)));
        // libraries -> servicios -> locales -> API_Domain

        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view('servicios/reposteria_detalle.php');
        $this->load->view('adminlte-3.0.1/footer');
	}
}
