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

    // envento para enviar un correo
    public function send_mail(){
        // cargamos la librería de email

        $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $this->email->from('isai.madueno.23@gmail.com', 'Isai Madueno');
        $this->email->to('isai.madueno.23@gmail.com');

        $this->email->subject('Prueba desde codeigniter');
        $this->email->message('Prueba para enviar una cotización por email desde CI3');

        if($this->email->send()){
            echo "si se envio";
        }else{
            echo "algo salio mal";
        }
    }
}