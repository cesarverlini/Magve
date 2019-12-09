<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BancoApi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }


	public function index()
	{
        echo "Transferencia";
        $this->Transferencia();

        echo "<br>";

        echo "Deposito";
        $this->Deposito();
    }

    public function Transferencia(){
        $data = [
            'Tarjeta_Origen'=>5799433668183788,
             'Numeros_Verificadores' => 506,
             'Tarjeta_Destino'=>8189866056894415, 
             'Monto'=>300
        ];

        $data_string = json_encode($data);

        $curl = curl_init('https://bancossoftwarecomplejo.azurewebsites.net/api/Transaccions/Transferencia');

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string); 

        $result = curl_exec($curl);
        curl_close($curl);


        $result = json_decode($result, true);


        echo "<br>";
        echo $result['id_Transaccion'];
        echo "<br>";
        echo $result['fecha'];
        echo "<br>";
        echo $result['mensaje']; 
    }

    public function Deposito(){

        $data = array(
             'Tarjeta_Destino' => 5799433668183788,
             'Monto' => 5000
        );

        $data_string = json_encode($data);

        $curl = curl_init('https://bancossoftwarecomplejo.azurewebsites.net/api/Transaccions/Deposito');

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string); 

        $result = curl_exec($curl);
        curl_close($curl);


        $result = json_decode($result, true);

        echo "<br>";
        echo $result['id_Transaccion'];
        echo "<br>";
        echo $result['fecha'];
        echo "<br>";
        echo $result['mensaje']; 
        echo "<br>";
    }

}