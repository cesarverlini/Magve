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
		
		$data['title'] = "Venta";		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/index');
        $this->load->view('adminlte-3.0.1/footer');
	}
	
	// realizar venta desde una cotización recibida
	public function cotiza_venta($folio_cotizacion = null){

		$data['title'] = "Proceso de confirmación de venta";
		$data['folio'] = $folio_cotizacion;
		$data['detalle'] = $this->Ventas_model->detalle_venta($folio_cotizacion);
		
        $this->load->view('adminlte-3.0.1/header', $data);
		$this->load->view('ventas/cotiza_venta');
        $this->load->view('adminlte-3.0.1/footer');
	}

	public function generar_venta(){
		// datos tarjeta
		$tarjeta = $this->input->post('tarjeta');
		$nip = $this->input->post('nip');
		$cvv = $this->input->post('cvv'); // opcional

		// datos para la venta
		$monto = $this->input->post('monto');
		// TAJETA DE MAGVE
		$destino = 9296838398409083;

		// Llamamos a la API y usamos el metodo transferencia
		require_once(APPPATH.'controllers/BancoApi.php');
		// en "r" se guarda el array de la respuesta de la API
		$r = BancoApi::Transferencia($tarjeta, $nip, $destino, $monto);

		print_r($r);


		// validar si se recibió el pago
		// si este campo esta presente si se hizo la transaccion
		// si no, status_code aparece entonces no se hizo el pago
		echo $r['id_Transaccion'];
		//este ultimo echo seria de que si existe la transaccion mandar un true o algun mensaje y recibirlo en jquery para mandar al alerta
		// echo "true";
	}

	public function procesar_pago(){
		require_once(APPPATH.'controllersBancoApi.php');
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
	public function autocomplete_folio()
	{
		$data = $this->input->post();
		$respuesta = $this->Ventas_model->autocomplete_folio($data);
		// var_dump($respuesta);
		echo json_encode($respuesta);
	}
	public function get_cliente()
	{
		$id = $this->input->post('id');
		$respuesta = $this->Ventas_model->get_cliente($id);
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
		$id = $this->uri->segment(2);
		$hora = date("h:m:s a");
		$this->load->library('fpdf_manager');
		$pdf = new fpdf_manager();
		$respuesta = $this->Ventas_model->get_cliente_cotizacion($id);
		$cliente = $respuesta->nombre_completo;
		$folio = $respuesta->folio;
		$telefono = $respuesta->telefono;
		$correo = $respuesta->correo;
		$total = $respuesta->total;

		$Nombre_archivo = 'Contrato Evento.pdf';
		$pdf->SetTitle("Contrato Evento");
		$pdf->AddPage();
		// $pdf->Cell(0,6,utf8_decode('Fecha de impresión:').$fecha_actual,0,0,'R');
		$pdf->SetFont('Arial','I',10);
		$pdf->Cell(0,6,utf8_decode('CONTRATO No: '.$folio.''),0,0,'R');
		$pdf->Image(base_url().'assets/img/logo.png',20,30,30,30);
		$pdf->SetFont('Arial','B',12);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();		
		$pdf->Cell(45,5,"",0,0,'L');
		$pdf->MultiCell(140,5,utf8_decode("CONTRATO DE PRESTACIÓN DE SERVICIOS DE EVENTOS SOCIALES, QUE  CELEBRAN  POR UNA PARTE,  MAGVE Coordinación de Eventos REPRESENTADA POR A QUIEN EN LO SUCESIVO DE LE DENOMINARÁ 'PRESTADOR DEL SERVICIO', Y POR LA OTRA PARTE '".$cliente."' A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ 'EL CONSUMIDOR' AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS:"),0,'J');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(185,5,utf8_decode("D E C L A R A C I O N E S"),0,1,'C');		
		$pdf->Ln();
		$pdf->Cell(185,5,utf8_decode("I.- Declara 'EL PRESTADOR DEL SERVICIO':"),0,1,'L');	
		$pdf->SetFont('Arial','',12);
		$pdf->Ln();
		$pdf->Cell(185,5,utf8_decode("A)	MAGVE Coordinación de Eventos"),0,1,'L');		
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("B)	Que su domicilio se encuentra ubicado en Ave. Tecnológico y Periférico Poniente S/N C.P. 83170 Colonia Sahuaro, Hermosillo Sonora, México. con número telefónico 6623391580, con correo electrónico magve_eventos@gmail,com."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("C)	Que cuenta con la capacidad, infraestructura, servicios y recursos necesarios para dar cabal cumplimiento a las obligaciones contenidas en el presente contrato."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("D)	Que cuenta con personal capacitado y responsable para atender las quejas y reclamaciones que se originen de la prestación del servicio o del bien adquirido, para lo cual se señala el teléfono, con un horario de atención al público de las horas a las 10:00 A.M. - 6:00 P.M. horas, los días Lunes - Sábado"),0,'J');
		$pdf->Ln();
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(185,5,utf8_decode("II.- DECLARA 'EL CONSUMIDOR':"),0,1,'L');	
		$pdf->SetFont('Arial','',12);
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("A)	Llamarse como ha quedado plasmado en el proemio de este contrato."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("B)	Que es su deseo obligarse en los términos y condiciones del presente contrato, manifestando que cuenta con la capacidad legal para la celebración de este contrato."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("C)	Que su teléfono es ".$telefono.", con el correo electrónico ".$correo."."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("Expuesto lo anterior, las partes se sujetan al contenido de las siguientes:"),0,'J');
		$pdf->Ln();
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(185,5,utf8_decode("C L A U S U L A S"),0,1,'C');	
		$pdf->SetFont('Arial','',12);
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("PRIMERA.- El objeto del presente contrato es la prestación de servicios para la organización de un evento social para CANTIDAD personas, el cual se llevará a cabo  el día FECHA DEL EVENTO,  con  una duración de 	horas,  iniciando  el evento a las   	 horas y terminará a las 	horas, en el salón 	ubicado en DIRECCIÓN DEL SALÓN DE EVENTOS."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("EL PRESTADOR DEL SERVICIO podrá cobrar una cantidad adicional, debidamente prevista en el presupuesto, en el caso de que el evento prolongue su duración y/o el número de invitados exceda del estipulado."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("SEGUNDA.- El precio total que EL CONSUMIDOR debe solventar por la prestación del servicio es el estipulado en el presupuesto que forma parte del presente contrato, no importando si el número de asistentes al evento es inferior al estipulado. Dicho precio será pagado en el establecimiento de EL PRESTADOR DEL SERVICIO, de contado y en moneda nacional de la siguiente forma:"),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("A)	La cantidad de $".$total." a la firma del presente contrato por concepto de anticipo que corresponde al 100% del precio total de servicio."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("TERCERA.- Independientemente de la entrega del anticipo, EL PRESTADOR DEL SERVICIO deberá entregar a EL CONSUMIDOR la factura o comprobante que ampare el pago de los servicios contratados, en la que se hará constar detalladamente el nombre y precio de cada uno de los servicios proporcionados, esto con la finalidad de que EL CONSUMIDOR pueda verificarlos en detalle."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("CUARTA.- EL CONSUMIDOR se obliga a depositar una cantidad equivalente al 10% del precio estipulado para garantizar el pago de servicios excedentes, imprevistos, o daños o perjuicios en su caso. Dicho depósito será devuelto al CONSUMIDOR si al finalizar el evento no se verifico ninguno de esos supuestos."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("QUINTA.- A efecto de tener seguridad en cuanto al número de asistentes al evento social, EL CONSUMIDOR y EL PRESTADOR DEL SERVICIO establecen como procedimiento de control y verificación, el siguiente:"),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("A)	EL CONSUMIDOR y EL PRESTADOR DEL SERVICIO designarán, cada uno, a una persona de su confianza a efecto de que sólo ingresen al lugar personas autorizadas por EL CONSUMIDOR para lo cual, podrán pactar el uso de un boleto o contraseña."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("B)	EL CONSUMIDOR se responsabiliza del excedente de personas que con su autorización expresa hayan ingresado al evento. EL PRESTADOR DEL SERVICIO se obliga a contar con un margen de cuando menos un 10% sobre el total contratado para estar en posibilidades de atender la sobre demanda de asistentes al evento autorizados por EL CONSUMIDOR."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("SEXTA.- EL CONSUMIDOR cuenta con un plazo de cinco días hábiles posteriores a la firma del presente contrato para cancelar la operación sin responsabilidad alguna de su parte, en cuyo caso EL PRESTADOR DEL SERVICIO se obliga a reintegrar todas las cantidades que EL CONSUMIDOR le haya entregado. Si la cancelación se realiza después de los cinco días hábiles antes señalados, EL CONSUMIDOR deberá indemnizar a EL PRESTADOR DEL SERVICIO por los gastos comprobables hasta por un 20% del precio total de la operación que hubiese realizado en ejecución de la prestación del servicio."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("SÉPTIMA.- EL CONSUMIDOR se obliga a designar a una persona de su confianza, quien durante el evento será quien trate los asuntos relacionados con la prestación del servicio, asimismo se obliga a abstenerse de dar instrucciones al personal de EL PRESTADOR DEL SERVICIO que no tenga relación con el objeto del presente y a procurar que sus invitados observen la misma conducta. Por su parte EL PRESTADOR DEL SERVICIO se obliga a designar, de entre su personal, a una persona que será quien durante la celebración del evento trate con el representante de EL CONSUMIDOR o con el mismo, los asuntos relacionados con la prestación del servicio, y se obliga a que su personal atienda con esmero y cortesía a los asistentes al evento."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("OCTAVA.- EL CONSUMIDOR se obliga a cumplir con las disposiciones reglamentarias que rijan el inmueble y a procurar que los asistentes al evento observen la misma conducta. Para tal efecto EL PRESTADOR DEL SERVICIO entregará a la firma del presente contrato a EL CONSUMIDOR una copia del reglamento respectivo en donde se fijen las disposiciones reglamentarias."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("NOVENA.- En caso de que EL PRESTADOR DEL SERVICIO incurra en incumplimiento del presente contrato por causas imputables a él se obliga a elección de EL CONSUMIDOR:"),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("A)	A contratar por su cuenta a otra empresa que este en posibilidades de realizar la prestación del servicio en las condiciones estipuladas por EL CONSUMIDOR. El costo adicional, que en su caso, se genere será absorbido por EL PRESTADOR DEL SERVICIO, o bien"),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("B)	A reintegrar las cantidades que se le hubieren entregado y a pagar una pena convencional del 20% del precio total del servicio."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("DÉCIMA.- EL PRESTADOR DEL SERVICIO es responsable ante EL CONSUMIDOR por el incumplimiento de los servicios contratados, aun cuando subcontrate con terceros dicha prestación."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("DÉCIMA PRIMERA.- Si los bienes destinados a la prestación del servicio sufrieren un menoscabo por culpa o negligencia debidamente comprobada de EL CONSUMIDOR o de sus invitados, éste se obliga a cubrir los gastos de reparación de los mismos, o en su caso, indemnizar al prestador del servicio hasta con un 60% de su valor."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("DÉCIMA SEGUNDA.- Las partes podrán acordar que EL CONSUMIDOR, contrate libremente servicios específicos relacionados con el evento social con otros prestadores de servicios por así convenir a sus intereses, por lo que en caso de actualizarse dicho supuesto EL CONSUMIDOR exime de toda responsabilidad a EL PRESTADOR DEL SERVICIO en lo que respecta a dichos servicios en específico."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("DÉCIMA TERCERA.- En caso de que EL PRESTADOR DEL SERVICIO se encuentre imposibilitado para prestar el servicio por caso fortuito o fuerza mayor, como incendio, temblor u otros acontecimientos de la naturaleza o hechos del hombre ajenos a la voluntad de EL PRESTADOR DEL SERVICIO, no se incurrirá en incumplimiento, únicamente EL PRESTADOR DEL SERVICIO reintegrará a EL CONSUMIDOR, el anticipo que le hubiera entregado."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode("Leído que fue por las partes el contenido del presente contrato y sabedoras de su alcance legal, lo firman por duplicado en la Ciudad de Hermosillo, Sonora, México. a ____de    ____     del año_______."),0,'J');
		$pdf->Ln();
		$pdf->MultiCell(185,5,utf8_decode(""),0,'J');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(92,5,utf8_decode("______________________________"),0,0,'C');	
		$pdf->Cell(92,5,utf8_decode("______________________________"),0,1,'C');	
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(92,5,utf8_decode("EL PRESTADOR DEL SERVICIO"),0,0,'C');	
		$pdf->Cell(92,5,utf8_decode("EL CONSUMIDOR"),0,1,'C');	

		$pdf->Ln();
		$pdf->Ln();

		$contrato = $pdf->Output($Nombre_archivo, 'I');	
	}
}
