<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curl extends CI_Controller {

	public function __construct(){
		parent::__construct();
    }

    public function index(){

        $url_locales  = 'http://api.integradoraenm.com/index.php/Locales/local';
        $url_imprenta = 'http://localhost:8080/api_imprenta/index.php/';

        /*$datos_renta = array(
             'id_local'    => 1,
             'id_cliente'  => 1,
             'fecha_renta' => '2019-12-20'
        );*/

        $datos_renta = array(
            'Fecha' => '2019-12-20',
            'Direccion' => 'Othon Almada #206',
            'Servicio_Contratado' => 1
       );

        $data_string = json_encode($datos_renta);

        $curl = curl_init('http://api.integradoraenm.com/index.php/Locales/local');

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");      // tipo de operación
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);       // retorna información ?
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);   // información a postear

        $result = curl_exec($curl);
        curl_close($curl);

        print_r($result);

        $result = json_decode($result, true);

        print_r($result);


    }

    // =======================================================
    // Metodo para hacer PUT O POST a una api externa con cURL
    // =======================================================
    // url = string, datos = array(), metodo = PUT, POST, etc
    public function curl_request($url, $datos, $metodo){

        $curl = curl_init($url);
        $data_string = json_encode($datos);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($metodo));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);       // retorna información ?
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);   // información a postear

        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);
        return $result;

    }
}