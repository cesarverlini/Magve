<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Ventas_model');
    }
    
    /*
    * Función index cargará dos opciones
    * crear venta nueva
    * crear venta en base a cotización
    */
    public function index(){

        // $cotizacion['cotizaciones'] = $this->Ventas_model->get_cotizaciones();
		
		$data['title'] = "Venta";		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/index');
        $this->load->view('adminlte-3.0.1/footer');  

        // $this->load->view('layouts/header');
        // $this->load->view('ventas/index', $data);
        // $this->load->view('layouts/footer');
    }

    public function check_cotizacion($id_cotizacion = null){

        if(!isset($id_cotizacion)){
            $mensaje = "Algo salió mal. No se proporcionó una cotización valida";
        }else{
            $mensaje = "Cotización recibida con exito";
        }

        $data['mensaje'] = $mensaje;
        $this->load->view('layouts/header');
        $this->load->view('ventas/check_cotizacion', $data);
        $this->load->view('layouts/footer');
	}
	public function correos()
	{
		$respuesta = $this->Ventas_model->get_email();
		// $data = $this->input->post('correo');
		echo json_encode($respuesta);
	}
	public function autocomplete()
	{
		$data = $this->input->post();
		$respuesta = $this->Ventas_model->autocomplete($data);
		echo json_encode($respuesta);
	}
	public function get_cotizaciones()
	{
		$data = $this->input->post('id');
		$respuesta = $this->Ventas_model->get_cotizaciones($data);
		echo json_encode($respuesta);
	}
	public function get_detalles()
	{
		$data = $this->input->post('id');
		$respuesta = $this->Ventas_model->get_detalles($data);
		echo json_encode($respuesta);
	}
	public function Contrato()
	{	
		$fecha_actual=date("d-m-Y");
		$id = $this->uri->segment(4);
		$hora = date("h:m:s a");
		$this->load->library('fpdf_manager');
		$pdf = new fpdf_manager();

		$Nombre_archivo = 'Contrato Evento.pdf';
		$pdf->SetTitle("Contrato Evento");
		$pdf->AddPage();
		/*Encabezado*/
		// $pdf->Image(base_url().'images/gspm.png',10,8,20);
		$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(90,6,'',0,0);
		$pdf->Cell(0,6,'CONTRATO EVENTO',0,0,'C');
		$pdf->SetFont('Arial','I',7);
		$pdf->Cell(0,6,utf8_decode('Fecha de impresión:').$fecha_actual,0,0,'R');
		$pdf->Ln();

		// $data = $this->Cotizaciones_model->get_cotizacion($id);
		// var_dump($data);

		// $pdf->setFillColor(0,214,252); 							
		$pdf->Cell(97,6,"",0,1,'C');
		$pdf->Cell(90,6,"",0,1,'R');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(84,7,utf8_decode("En el presente documento hago constar que yo: "),0,0,'L');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(60,7,utf8_decode("Cesar Ignacio Verduzco Bartolini"),0,1,'L');
		$pdf->SetFont('Arial','',11);
		$pdf->Ln();
		$pdf->Cell(115,7,utf8_decode("Me comprometo a pagar en su totalidad los servicios ofrecidos por"),0,0,'L');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(150,7,utf8_decode(" MAGVE EVENTOS"),0,1,'L');
		$pdf->Ln();
		$pdf->Cell(50,7,utf8_decode("Los cuales consisten en:"),0,0,'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->Cell(15,7,utf8_decode("N°"),1,0,'C');
		$pdf->Cell(35,7,utf8_decode("Tipo"),1,0,'C');
		$pdf->Cell(35,7,utf8_decode("Nombre"),1,0,'C');
		$pdf->Cell(35,7,utf8_decode("Precio"),1,0,'C');
		$pdf->Cell(35,7,utf8_decode("Cantidad"),1,0,'C');
		$pdf->Cell(35,7,utf8_decode("Sub Total"),1,1,'C');

		$id = 54;
		$datos_matriz = $this->Ventas_model->get_detalles($id);
		$i = 1;
		$total = 0;
		$pdf->SetFont('Arial','',9);
		foreach ($datos_matriz as $row) {
			if ($row->id_proveedor = 2) {
				$proveedor = "Local";
			}else if ($row->id_proveedor = 3) {
				$proveedor = "Reposteria";
			}else if ($row->id_proveedor = 4) {
				$proveedor = "Musica";
			}else if ($row->id_proveedor = 5) {
				$proveedor = "Fotografia";
			}else if ($row->id_proveedor = 6) {
				$proveedor = "Imprenta";
			}else if ($row->id_proveedor = 7) {
				$proveedor = "Banquete";
			}
			$total += intval($row->subtotal);
			$pdf->SetWidths(array(15,35,35,35,35,35));
			$pdf->Row(array(
						$i++,
						utf8_decode($proveedor),
						utf8_decode($row->nombre),
						utf8_decode($row->costo),
						utf8_decode($row->cantidad),
						utf8_decode($row->subtotal),				
					 ));
		}
		$pdf->SetFont('Arial','B',11);
		$pdf->Ln();
		$pdf->Cell(185,7,utf8_decode("Por una cantidad total de: $".$total),0,0,'R');


		$pdf->Ln();
		// $pdf->Cell(30,7,utf8_decode($data->total),0,0,'C');
		$pdf->Ln();

		$contrato = $pdf->Output($Nombre_archivo, 'I');	
	}
	public function correo()
	{
		$this->load->library('email');
		$htmlContent = '<h1>HTML email with attachment testing by CodeIgniter Email Library</h1>';
		$htmlContent .= '<p>You can attach the files in this email.</p>';

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_user' => 'mgventos@gmail.com', //Su Correo de Gmail Aqui
			'smtp_pass' => 'Cesar-1993', // Su Password de Gmail aqui
			'smtp_port' => '465',
			'smtp_crypto' => 'ssl',
			'mailtype' => 'html',
			'wordwrap' => TRUE,
			'charset' => 'utf-8'
			);
		$this->email->initialize($config);
		$this->email->to('cesarvb02@gail.com');
		$this->email->from('mgventos@gmail.com', 'Cesar Verduzco');
		$this->email->subject('Test Email (Attachment)');
		$this->email->message("hola mundo");
		// $this->email->attach('files/attachment.pdf');
		$this->email->send();
		if($this->email->send(FALSE)){
			echo "enviado<br/>";
			echo $this->email->print_debugger(array('headers'));
		}else {
			echo "fallo <br/>";
			echo "error: ".$this->email->print_debugger(array('headers'));
		}
	}
}
