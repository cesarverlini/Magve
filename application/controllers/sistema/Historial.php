<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historial extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Historial_model');
	}

	public function index()
	{		
		$data['ventas'] = $this->Historial_model->get_ventas();
		// var_dump($data['ventas']);
		$data['title'] = "Historial Ventas";		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/historial');
        $this->load->view('adminlte-3.0.1/footer');
	}
	public function ver_venta()
	{
		$id = $this->uri->segment(2);		
		$data['title'] = "Venta";		

		$data['venta'] = $this->Historial_model->get_venta($id);
		$cotizacion = $data['venta'];
		// var_dump($cotizacion[0]->id_cotizacion);
		$data['detalle_venta'] = $this->Historial_model->get_venta_detalle($cotizacion->id_cotizacion);

		$this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/ver_venta');
        $this->load->view('adminlte-3.0.1/footer');
	}
	public function venta_pdf()
	{		
		
		$fecha_actual=date("d-m-Y");
		$id = $this->uri->segment(2);
		$data = $this->Historial_model->get_venta($id);

		// var_dump($id);
		$hora = date("h:m:s a");
		$this->load->library('fpdf_manager');
		$pdf = new fpdf_manager('L','mm','A4');

		$Nombre_archivo = 'Cotizacion Evento.pdf';
		$pdf->SetTitle("Cotizacion Evento");
		$pdf->AddPage();
		/*Encabezado*/		
		$pdf->SetFont('Arial','I',10);		
		$pdf->Cell(0,6,utf8_decode('Folio de Venta: '.$data->folio.''),0,0,'R');
		$pdf->Image(base_url().'assets/img/logo.png',135,10,25,25);
		
		$pdf->SetFont('Arial','B',12);
		
		// $data = $this->Cotizaciones_model->get_cotizacion($id);
		
		// var_dump($data);
		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','B',11);
		$pdf->setFillColor(0,214,252); 							
		$pdf->Cell(97,6,"",0,1,'C');
		$pdf->Cell(90,6,"",0,1,'R');
		$pdf->Cell(38,7,utf8_decode("Fecha"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($data->fecha_venta),1,1,'C');
		$pdf->Cell(38,7,utf8_decode("Cliente"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($data->nombre_completo),1,1,'C');
		$pdf->Cell(38,7,utf8_decode("Telefono"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($data->telefono),1,1,'C');
		$pdf->Cell(38,7,utf8_decode("Correo"),1,0,'C',1);
		$pdf->Cell(238,7,utf8_decode($data->correo),1,1,'C');
		$pdf->Ln();

		$pdf->Cell(12,7,utf8_decode("N°"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Tipo Servicio"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Nombre"),1,0,'C',1);
		// $pdf->Cell(44,7,utf8_decode("Descripcion"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Cantidad"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Costo Unitario"),1,0,'C',1);
		$pdf->Cell(52.8,7,utf8_decode("Sub-Total"),1,1,'C',1);

		$detalle = $this->Historial_model->get_venta_detalle($data->id_cotizacion);
		
		$i = 1;
		$pdf->SetFont('Arial','',9);
		$subtotal = 0;
		foreach ($detalle as $row) {
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
		$pdf->Cell(30,7,utf8_decode("$".$subtotal),0,1,'C');
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(216,7,"",0,0,'C',0);
		$pdf->Cell(30,7,utf8_decode("IVA: "),0,0,'R',0);
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(30,7,utf8_decode("$"),0,1,'C');
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(216,7,"",0,0,'C',0);
		$pdf->Cell(30,7,utf8_decode("Total: "),0,0,'R',0);
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(30,7,utf8_decode("$".$data->total),0,0,'C');

		$pdf->Ln();
		// $pdf->SetY(-30);
		// $pdf->Cell(0,3,$pdf->PageNo(),0,0,'C');

		$pdf->Output($Nombre_archivo, 'I');
	}

}
