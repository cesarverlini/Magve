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
		$nombre = $this->input->post("nombre");
		$correo = $this->input->post("correo");
		$telefono = $this->input->post("telefono");

		// $respuesta = $this->Cotizaciones_model->existe_correo($correo);
		// if ($respuesta) {
		// 	echo "true";
		// }else{			
			$data['title'] = "Confirmacion de cotización";

			$cliente = array(
				'nombre' => $nombre,
				'correo' => $correo,
				'telefono' => $telefono,
				'carrito' => array_values(unserialize($this->session->userdata('cart'))),
				'total' => $this->total()
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
		$nombre = $this->input->post("nombre");
		$correo = $this->input->post("correo");
		$telefono = $this->input->post("telefono");

		$respuesta = $this->Cotizaciones_model->existe_correo($correo);
		if ($respuesta) {
			echo "true";
		}else{
			echo "false";
		}
	}
	public function guardar()
	{	

		$carrito = array_values(unserialize($this->session->userdata('cart')));
		$cliente = array(
			'nombre_completo' =>  $this->input->post('nombre_completo'),	
			'correo' =>  $this->input->post('correo'),	
			'telefono' =>  $this->input->post('telefono'),	
		);
		// var_dump($cliente);
		$id_cliente = $this->Cotizaciones_model->insert_clientes($cliente);
		$fecha = date('d-m-y');
		$fecha = explode("-",$fecha);
		$folio = $fecha[0].$fecha[1].$fecha[2];
		$cotizacion = array(				
			'id_empleado' => 1, 
			'id_cliente' => $id_cliente,
			'total' => 	$this->total(),
			'folio' => intval($id_cliente) . intval($folio)
		);
		$id_cotizacion = $this->Cotizaciones_model->insert_cotizacion($cotizacion);


		foreach ($carrito as $value) {
			if ($value['service'] == "Local") {		
				$id_proveedor = 2;	
			}else if ($value['service'] == "Reposteria") {		
				$id_proveedor = 3;	
			}else if ($value['service'] == "Musica") {		
				$id_proveedor = 4;	
			}else if ($value['service'] == "Fotografia") {	
				$id_proveedor = 5;	
			}else if ($value['service'] == "Imprenta") {
				$id_proveedor = 6;	
			}else if ($value['service'] == "Banquete") {
				$id_proveedor = 7;	
			}

			$data = array(
				'id_cotizacion' => $id_cotizacion,
				'id_proveedor' => $id_proveedor,
				'id_producto' => $value['id'],
				'nombre' => $value['name'],
				'descripcion' => $value['descripcion'],
				'cantidad' => $value['quantity'],
				'costo' => $value['price'],
				'subtotal' => intval($value['quantity']) * intval($value['price']),
				// 'tipo_servicio' => $value['service'],
				// 'direccion' => $value['address'],
				// 'capacidad' => $value['capacity'],
				// 'id_servicio' => $value['id'],
			);
			$this->Cotizaciones_model->insert_servicios($data);
		}
		echo json_encode($id_cotizacion);
		// $this->cotizacion_pdf($id_cotizacion);
		// redirect('/servicios', 'refresh');						
		
	}
	private function total(){
        $items = array_values(unserialize($this->session->userdata('cart')));
        $s = 0;
        foreach ($items as $item) {
            $s += $item['price'] * $item['quantity'];
        }
        return $s;
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
		$fecha_actual=date("d-m-Y");
		$id = $this->uri->segment(2);
		// var_dump($id);
		$hora = date("h:m:s a");
		$this->load->library('fpdf_manager');
		$pdf = new fpdf_manager('L','mm','A4');

		$Nombre_archivo = 'Cotizacion Evento.pdf';
		$pdf->SetTitle("Cotizacion Evento");
		$pdf->AddPage();
		/*Encabezado*/
		// $pdf->Image(base_url().'images/gspm.png',10,8,20);
		$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(90,6,'',0,0);
		$pdf->Cell(0,6,'COTIZACION EVENTO',0,0,'C');
		$pdf->SetFont('Arial','I',7);
		$pdf->Cell(0,6,utf8_decode('Fecha de impresión:').$fecha_actual,0,0,'R');
		$pdf->Ln();

		$data = $this->Cotizaciones_model->get_cotizacion($id);
		// var_dump($data);

		$pdf->SetFont('Arial','B',11);
		$pdf->setFillColor(0,214,252); 							
		$pdf->Cell(97,6,"",0,1,'C');
		$pdf->Cell(90,6,"",0,1,'R');
		$pdf->Cell(38,7,utf8_decode("Fecha"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($fecha_actual),1,1,'C');
		$pdf->Cell(38,7,utf8_decode("Cliente"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($data->nombre_completo),1,1,'C');
		$pdf->Cell(38,7,utf8_decode("Telefono"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($data->telefono),1,1,'C');
		$pdf->Cell(38,7,utf8_decode("Correo"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($data->correo),1,1,'C');
		// $pdf->Cell(38,7,utf8_decode("Direccion"),1,0,'C',1);
		// $pdf->Cell(238,7,utf8_decode("Leocadio Salcedo #1297"),1,1,'C');
		$pdf->Ln();

		$pdf->Cell(12,7,utf8_decode("N°"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Tipo Servicio"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Nombre"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Descripcion"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Cantidad"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Costo Unitario"),1,1,'C',1);
		// $pdf->Cell(44,7,utf8_decode("Costo Total"),1,1,'C',1);

		$datos_matriz = $this->Cotizaciones_model->get_datos_cotizacion($id);
		$i = 1;
		$pdf->SetFont('Arial','',9);
		foreach ($datos_matriz as $row) {
			if ($row->id_proveedor == 2) {		
				$tipo_servicio = "Local";
			}else if ($row->id_proveedor == 3) {		
				$tipo_servicio = "Reposteria";
			}else if ($row->id_proveedor == 4) {		
				$tipo_servicio = "Musica";
			}else if ($row->id_proveedor == 5) {	
				$tipo_servicio = "Fotografia";
			}else if ($row->id_proveedor == 6) {
				$tipo_servicio = "Imprenta";
			}else if ($row->id_proveedor == 7) {
				$tipo_servicio = "Banquete";
			}
			$pdf->SetWidths(array(12,52.8,52.8,52.8,52.8,52.8));
			$pdf->Row(array(
						$i++,
						utf8_decode($tipo_servicio),
						utf8_decode($row->nombre),
						utf8_decode($row->descripcion),
						utf8_decode($row->cantidad),
						utf8_decode($row->costo),
						// utf8_decode('5000'),						
					 ));
		}

		$pdf->Ln();
		$pdf->Cell(216,7,"",0,0,'C',0);
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(30,7,utf8_decode("Total: "),0,0,'R',0);
		$pdf->Cell(30,7,utf8_decode($data->total),0,0,'C');

		$pdf->Ln();
		// $pdf->SetY(-30);
		// $pdf->Cell(0,3,$pdf->PageNo(),0,0,'C');

		$pdf->Output($Nombre_archivo, 'I');
	}
}


// SELECT * FROM locales 
// WHERE locales.id NOT IN(select id_local FROM renta_locales WHERE fecha_renta = '2019-11-20'); 
