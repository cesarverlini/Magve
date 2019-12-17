<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Cotizaciones_model');
	}	
	public function index()
	{	
		$data['title'] = "Datos del cliente";		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view("sistema/cotizacion");
        $this->load->view('adminlte-3.0.1/footer');     

	}
	public function confirmacion()
	{

		$this->form_validation->set_rules('correo', 'correo', 'required|valid_email');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('bad_email', 'La dirección de email no es valida');
			redirect('informacion-del-cliente');
			return;
		}

		$id = $this->input->post("id_cliente");
		$nombre = $this->input->post("nombre");
		$correo = $this->input->post("correo");
		$telefono = $this->input->post("telefono");
		

		// $respuesta = $this->Cotizaciones_model->existe_correo($correo);
		// if ($respuesta) {
		// 	echo "true";
		// }else{			
			$data['title'] = "Confirmacion de cotización";

			$cliente = array(
				'id' => $id,
				'nombre' => $nombre,
				'correo' => $correo,
				'telefono' => $telefono,
				'carrito' => array_values(unserialize($this->session->userdata('cart'))),
				'total' => $this->total(),
				'iva' => $this->iva()
			);
			// $data['total'] = $this->total();

			// $cart = array_values(unserialize($this->session->userdata('cart')));
			$this->load->view('adminlte-3.0.1/header', $data);
			$this->load->view("sistema/confirmacion",$cliente);
			$this->load->view('adminlte-3.0.1/footer');    
		// }
	}
	public function existe_correo()
	{
		$id = $this->input->post("id");
		if ($id == "") {
			$nombre = $this->input->post("nombre");
			$correo = $this->input->post("correo");
			$telefono = $this->input->post("telefono");
			$respuesta = $this->Cotizaciones_model->existe_correo($correo);
			if ($respuesta) {
				echo "true";
			}else{
				echo "false"; //me refiero a false, que el correo no existe en la BD por lo cual se puede proseguir con el proceso
			}	
		}else{
			echo "false"; 
		}
		
	}
	public function guardar()
	{	

		$carrito = array_values(unserialize($this->session->userdata('cart')));
		$id = $this->input->post('id');
		$cliente = array(			
			'nombre_completo' =>  $this->input->post('nombre_completo'),	
			'correo' =>  $this->input->post('correo'),	
			'telefono' =>  $this->input->post('telefono'),	
		);
		if ($id == "") {
			$id_cliente = $this->Cotizaciones_model->insert_clientes($cliente);
		}else{
			$id_cliente = $id;
			// echo $id_cliente;
		}
		
		$fecha = date('d-m-y');
		$fecha = explode("-",$fecha);
		$folio = $fecha[0].$fecha[1].$fecha[2];
		$cotizacion = array(				
			'id_empleado' => 1, 
			'id_cliente' => $id_cliente,
			'subtotal' => 	$this->total(),
			'iva' => $this->iva(),
			'total' => (intval($this->iva())+intval($this->total())),
			'folio' => intval($id_cliente) . intval($folio)
		);
		$id_cotizacion = $this->Cotizaciones_model->insert_cotizacion($cotizacion);

		foreach ($carrito as $value) {
			if ($value['service'] == "Local") {		
				$id_proveedor = 2;	
			}else if ($value['service'] == "Reposteria") {		
				$id_proveedor = 3;	
			}else if ($value['service'] == "Decoracion") {		
				$id_proveedor = 4;	
			}else if ($value['service'] == "Fotografia") {	
				$id_proveedor = 5;	
			}else if ($value['service'] == "Publicidad") {
				$id_proveedor = 6;	
			}else if ($value['service'] == "Banquetes") {
				$id_proveedor = 7;	
			}		
			// var_dump($value);
			// echo $id_proveedor;
			$data = array(
				'id_cotizacion' => $id_cotizacion,
				'id_proveedor' => $id_proveedor,
				'id_producto' => $value['id'],
				'nombre' => $value['name'],
				'descripcion' => $value['description'],
				'cantidad' => $value['quantity'],
				'costo' => $value['price'],
				'subtotal' => intval($value['quantity']) * intval($value['price']),
				// 'tipo_servicio' => $value['service'],
				// 'direccion' => $value['address'],
				// 'capacidad' => $value['capacity'],
				// 'id_servicio' => $value['id'],
			);
			$this->Cotizaciones_model->insert_servicios($data);
			$cart = array_values(unserialize($this->session->userdata('cart')));
			for ($i = 0; $i < count($cart); $i ++) {
				unset($cart[$i]);
			}
			$this->session->set_userdata('cart', serialize($cart));
		}
		echo $id_cotizacion;
		// redirect('servicios');	
		
	}
	private function total(){
        $items = array_values(unserialize($this->session->userdata('cart')));
        $s = 0;
        foreach ($items as $item) {
            $s += $item['price'] * $item['quantity'];
        }
        return $s;
	}
	private function IVA()
	{		
        $subtotal = $this->total();
        $iva = $subtotal * .16;
        return $iva;
	}
	public function autocomplete()
	{
		$data = $this->input->post();
		$respuesta = $this->Cotizaciones_model->autocomplete($data);
		echo json_encode($respuesta);
	}
	// public function index()
	// {	
	// 	$data['title'] = "Cotizacion";
    //     $this->load->view('adminlte-3.0.1/header', $data);
	// 	$this->load->view("sistema/cotizacion");
    //     $this->load->view('adminlte-3.0.1/footer');     
	// }
	public function cotizacion_pdf()
	{		
		// $fecha_actual=date("d-m-Y");
		$id = $this->uri->segment(2);
		// $data = $this->Historial_model->get_venta($id);
		$data = $this->Cotizaciones_model->get_cotizacion($id);

		// var_dump($id);
		$hora = date("h:m:s a");
		$this->load->library('fpdf_manager');
		$pdf = new fpdf_manager('L','mm','A4');

		$Nombre_archivo = 'Cotizacion Evento.pdf';
		$pdf->SetTitle("Cotizacion Evento");
		$pdf->AddPage();
		/*Encabezado*/		
		$pdf->SetFont('Arial','I',10);		
		$pdf->Cell(0,6,utf8_decode('Folio de Cotización: '.$data->folio.''),0,0,'R');
		$pdf->Image(base_url().'assets/img/logo.png',135,10,25,25);
		$fecha = date('d-m-Y', strtotime($data->fecha_registro));
		$pdf->SetFont('Arial','B',12);	
		
		// var_dump($data);
		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','B',11);
		$pdf->setFillColor(0,214,252); 							
		$pdf->Cell(97,6,"",0,1,'C');
		$pdf->Cell(90,6,"",0,1,'R');
		$pdf->Cell(38,7,utf8_decode("Cliente"),1,0,'C',1);
		$pdf->Cell(100,7,utf8_decode($data->nombre_completo),1,0,'C');

		$pdf->Cell(38,7,utf8_decode("Telefono"),1,0,'C',1);
		$pdf->Cell(100,7,utf8_decode($data->telefono),1,1,'C');

		$pdf->Cell(38,7,utf8_decode("Correo"),1,0,'C',1);
		$pdf->Cell(100,7,utf8_decode($data->correo),1,0,'C');

		$pdf->Cell(38,7,utf8_decode("Fecha de cotización"),1,0,'C',1);
		$pdf->Cell(100,7,utf8_decode( $fecha ),1,1,'C');
		$pdf->Ln();

		$pdf->Cell(12,7,utf8_decode("N°"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Tipo Servicio"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Nombre"),1,0,'C',1);
		// $pdf->Cell(44,7,utf8_decode("Descripcion"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Cantidad"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Costo Unitario"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Sub-Total"),1,1,'C',1);
		
		$datos_matriz = $this->Cotizaciones_model->get_datos_cotizacion($id);
		
		$i = 1;
		$pdf->SetFont('Arial','',9);
		$subtotal = 0;
		foreach ($datos_matriz as $row) {
			if ($row->id_proveedor == 2) {		
				$tipo_servicio = "Local";
			}else if ($row->id_proveedor == 3) {		
				$tipo_servicio = "Reposteria";
			}else if ($row->id_proveedor == 4) {		
				$tipo_servicio = "Decoracion";
			}else if ($row->id_proveedor == 5) {	
				$tipo_servicio = "Fotografia";
			}else if ($row->id_proveedor == 6) {
				$tipo_servicio = "Imprenta";
			}else if ($row->id_proveedor == 7) {
				$tipo_servicio = "Banquete";
			}

			$subtotal += $row->subtotal;
			$pdf->SetWidths(array(12,52.8,52.8,52.8,52.8,52.8));
			$pdf->Row(array(
						$i++,
						utf8_decode($tipo_servicio),
						utf8_decode($row->nombre),
						// utf8_decode($row->descripcion),
						utf8_decode($row->cantidad),
						utf8_decode($row->costo),
						utf8_decode($row->subtotal),										
					 ));
		}

		$pdf->Ln();
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(216,7,"",0,0,'C',0);
		$pdf->Cell(30,7,utf8_decode("SubTotal "),0,0,'R',0);
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(30,7,utf8_decode("$".$subtotal),0,1,'R');
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(216,7,"",0,0,'C',0);
		$pdf->Cell(30,7,utf8_decode("IVA: "),0,0,'R',0);
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(30,7,utf8_decode("$".$data->iva),0,1,'R');
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(216,7,"",0,0,'C',0);
		$pdf->Cell(30,7,utf8_decode("Total: "),0,0,'R',0);
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(30,7,utf8_decode("$".$data->total),0,0,'R');

		$pdf->Ln();
		// $pdf->SetY(-30);
		// $pdf->Cell(0,3,$pdf->PageNo(),0,0,'C');

		$pdf->Output($Nombre_archivo, 'I');
	}
}
// $data = $this->Cotizaciones_model->get_cotizacion($id);
// $datos_matriz = $this->Cotizaciones_model->get_datos_cotizacion($id);


// SELECT * FROM locales 
// WHERE locales.id NOT IN(select id_local FROM renta_locales WHERE fecha_renta = '2019-11-20'); 
