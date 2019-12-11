<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = "Pagos";		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/pago');
        $this->load->view('adminlte-3.0.1/footer');
        // echo "Transferencia";
        // $this->Transferencia();

        // echo "<br>";

        // echo "Deposito";
        // $this->Deposito();
    }

    public function Transferencia(){
        $data = [
            'Tarjeta_Origen'=> $this->input->post("num_tarjeta"),
             'Numeros_Verificadores'=> $this->input->post("nip"),
             'Tarjeta_Destino'=> "20001",
             'Monto'=> $this->input->post("monto"),
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

        $data = [
             'Tarjeta_Destino'=> "20001",
             'Monto'=> $this->input->post("monto"),
            ];
		
			var_dump($data);
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
