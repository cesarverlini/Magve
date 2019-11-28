<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Cotizaciones_model');
	}
	
	public function index()
	{	
		$data['title'] = "Datos Cliente";
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view("sistema/cotizacion");
        $this->load->view('adminlte-3.0.1/footer');     

	}
	public function confirmacion()
	{
		$data['title'] = "Confirmacion";

		$cliente = array(
			'nombre' => $this->input->post("nombre"),
			'apellido_p' => $this->input->post("apellido_p"),
			'apellido_m' => $this->input->post("apellido_m"),
			'correo' => $this->input->post("correo"),
			'telefono' => $this->input->post("telefono"),
		);
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view("sistema/confirmacion",$cliente);
        $this->load->view('adminlte-3.0.1/footer');    
	}
	// public function index()
	// {	
	// 	$data['title'] = "Cotizacion";
    //     $this->load->view('adminlte-3.0.1/header', $data);
	// 	$this->load->view("sistema/cotizacion");
    //     $this->load->view('adminlte-3.0.1/footer');     

	// }
	public function crear_detalle_cotizacion()
	{
		// $this->Crear_Cotizacion();
		// var_dump($this->input->post());
		if($this->input->is_ajax_request()){	
			// $datos = ($this->input->post());
			// var_dump($datos);
			// foreach ($datos as $key => $value) {
				
			// }
			if ($this->input->post('tipo_servicio') == 'local') {
				$locales = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'direccion' => trim($this->input->post('direccion')), 
					'capacidad' => trim($this->input->post('capacidad')), 
					'costo' => trim($this->input->post('costo')), 
					'fecha_renta' => trim($this->input->post('fecha_renta')),
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($locales);		
			}else if ($this->input->post('tipo_servicio') == 'fotografia') {
				$fotos = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')), 
					'fecha_renta' => trim($this->input->post('fecha_renta')),
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($fotos);		
			}
			else if ($this->input->post('tipo_servicio') == 'banquete') {
				$banquete = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')), 
					'fecha_renta' => trim($this->input->post('fecha_renta')),
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($banquete);		
			}
			else if ($this->input->post('tipo_servicio') == 'imprenta') {
				$impresiones = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')),
					'fecha_renta' => trim($this->input->post('fecha_renta')),
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($impresiones);		
			}
			else if ($this->input->post('tipo_servicio') == 'decoracion') {
				$decoraciones = array(
					'tipo_servicio' => trim($this->input->post('tipo_servicio')),
					'nombre' => trim($this->input->post('nombre')), 
					'descripcion' => trim($this->input->post('descripcion')), 
					'costo' => trim($this->input->post('costo')), 
					'fecha_renta' => trim($this->input->post('fecha_renta')),
					'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
				);
				$this->Cotizaciones_model->insert_servicios($decoraciones);		
			}			
			
		}else{
			show_404();
		}
	}
	function Crear_Cotizacion()
	{
		if($this->input->is_ajax_request()){
			// var_dump($this->input->post());
			$cotizacion = array(				
				'id_empleado' => $this->input->post('id_empleado'), 
				'id_cliente' => $this->input->post('id')			
			);
			$respuesta = $this->Cotizaciones_model->insert_cotizacion($cotizacion);					
			echo $respuesta;
		}
	}
	public function Crear_Cliente()
	{
		if($this->input->is_ajax_request()){
			$cliente = array(				
				'nombre' => trim($this->input->post('nombre')), 
				'correo' => trim($this->input->post('correo')), 
				'telefono' => trim($this->input->post('telefono')), 
			);
			$respuesta = $this->Cotizaciones_model->insert_clientes($cliente);
			// echo $respuesta;
			$cotizacion = array(				
				'id_empleado' => 1, 
				'id_cliente' => $respuesta,
				'total' => 	trim($this->input->post('total'))		
			);
			$respuestacot = $this->Cotizaciones_model->insert_cotizacion($cotizacion);
			echo $respuestacot;
		}

	}
	public function definir_total()
	{
		if($this->input->is_ajax_request()){
			// $cotizacion = array(				
			// 	'id_cotizacion' => trim($this->input->post('id_cotizacion')), 
			// );
			$id_cotizacion = trim($this->input->post('id_cotizacion'));
			$respuesta = $this->Cotizaciones_model->get_detalles($id_cotizacion);
			if ($respuesta) {
				$costo = 0;
				foreach ($respuesta->result() as $row) {
					$costo += $row->costo;
				}
				// echo $costo_total;
				$costo_total = array(
					'total' => $costo
				);
				$respuesta = $this->Cotizaciones_model->set_costototal($id_cotizacion,$costo_total);
				
			}
		}
	}
	public function cotizacion_pdf()
	{		
		$fecha_actual=date("d-m-Y");
		$id = $this->uri->segment(4);
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
		$pdf->Cell(238,7,utf8_decode($data->nombre),1,1,'C');
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
			$pdf->SetWidths(array(12,52.8,52.8,52.8,52.8,52.8));
			$pdf->Row(array(
						$i++,
						utf8_decode($row->tipo_servicio),
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


				
		// $pdf->setXY(20,28);
		// $pdf->MultiCell(30,5,utf8_decode("Cliente"),1,'C',1);
		// $pdf->setXY(35,28);
		// $pdf->Cell(30,18,utf8_decode("Identificación"),1,0,'C',1);
		// $pdf->setXY(65,28);
		// $pdf->MultiCell(30,6,utf8_decode("Resultado hacia la Orgnanización"),1,'C',1);
		// $pdf->setXY(95,28);
		// $pdf->MultiCell(22,9,utf8_decode("Nivel de Influencia"),1,'C',1);
		// $pdf->setXY(117,28);
		// $pdf->MultiCell(20,9,utf8_decode("Nivel de Interés"),1,'C',1);
		// $pdf->setXY(137,28);
		// $pdf->MultiCell(23,18,utf8_decode("Control"),1,'C',1);
		// $pdf->setXY(160,28);
		// $pdf->MultiCell(27,6,utf8_decode("Necesidades y Espectativas"),1,'C',1);
		// $pdf->setXY(187,28);
		// $pdf->MultiCell(17,9,utf8_decode("¿Qué hacer?"),1,'C',1);
		// $pdf->setXY(204,28);
		// $pdf->MultiCell(20,9,utf8_decode("¿Cómo hacer?"),1,'C',1);
		// $pdf->setXY(224,28);
		// $pdf->MultiCell(20,9,utf8_decode("¿Cuándo hacerlo?"),1,'C',1);
		// $pdf->setXY(244,28);
		// $pdf->MultiCell(20,9,utf8_decode("¿Quien lo hace?"),1,'C',1);
		// $pdf->setXY(264,28);
		// $pdf->MultiCell(24,9,utf8_decode("¿Cómo se monitorea?"),1,'C',1);

		// $datos_matriz = $this->Stakeholders_model->get_matriz($this->uri->segment(3));
		// $i = 1;
		// $pdf->SetFont('Arial','',9);
		// foreach ($datos_matriz as $row) {
		// 	$pdf->SetWidths(array(10,15,30,30,22,20,23,27,17,20,20,20,24));
		// 	$pdf->Row(array(
		// 				$i++,
		// 				utf8_decode($row->grupo_interes),
		// 				utf8_decode($row->nombre_interesado),
		// 				utf8_decode($row->resultado_organizacion),
		// 				utf8_decode($row->nivel_influencia),
		// 				utf8_decode($row->nivel_interes),
		// 				utf8_decode($row->control),
		// 				utf8_decode($row->necesidades_expectativas),
		// 				utf8_decode($row->que_hacer),
		// 				utf8_decode($row->como_hacerlo),
		// 				utf8_decode($row->cuando_hacerlo),
		// 				utf8_decode($row->quien_lo_hace),
		// 				utf8_decode($row->como_monitorea)
		// 			 ));
		// }
		
		$pdf->Ln();
		// $pdf->SetY(-30);
		// $pdf->Cell(0,3,$pdf->PageNo(),0,0,'C');

		$pdf->Output($Nombre_archivo, 'I');
	}
}


// SELECT * FROM locales 
// WHERE locales.id NOT IN(select id_local FROM renta_locales WHERE fecha_renta = '2019-11-20'); 
