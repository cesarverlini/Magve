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

    /*
    * con esta función vamos a hacer el pago a los proveedores
    * con nuestros datos y los de ellos
    */
    public static function Transferencia($tc_numero, $tc_nip, $td_numero, $monto){
        $data = [
            'Tarjeta_Origen'=>intval($tc_numero),
             'Numeros_Verificadores' => intval($tc_nip),
             'Tarjeta_Destino'=> intval($td_numero), 
             'Monto'=> intval($monto)
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


        // $result = json_decode($result, true);
        return json_decode($result, true);

        // print_r($data);
        // print_r($result);

        // echo "<br>";
        // echo $result['id_Transaccion'];
        // echo "<br>";
        // echo $result['fecha'];
        // echo "<br>";
        // echo $result['mensaje']; 
    }

    /*
    * La funcion deposito es para cuando el cliente
    * nos pague en el momento el monto de la compra
    * mediante una interfaz de "terminal" ( pendiente crear ) ( ver plantilla de logos bancos)
    */
    public function Deposito(){

        $data = array(
             'Tarjeta_Destino' => 5799433668183788,
             'Monto' => 55000
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















    // =============================================================

    public static function Transfer(){
        $data = [
            'Tarjeta_Origen'=> 5799433668183788,
             'Numeros_Verificadores' => 506,
             'Tarjeta_Destino'=> 9296838398409083, 
             'Monto'=> 200
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

        print_r($data);
        print_r($result);

        echo "<br>";
        echo $result['id_Transaccion'];
        echo "<br>";
        echo $result['fecha'];
        echo "<br>";
        echo $result['mensaje']; 
    }

}