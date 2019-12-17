<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historial_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function get_ventas()
	{
		$query = $this->db->select('ventas.id, clientes.nombre_completo, cotizacion.folio, ventas.fecha_venta, ventas.total, ventas.numero_transaccion')
						->from('ventas')
						->join('clientes','clientes.id = id_cliente')
						->join('cotizacion','cotizacion.id = id_cotizacion')
						->order_by('fecha_venta', 'DESC')
						->get();
		// $resultados = $this->db->get('ventas');
		$resultados = $query->result();
		return $resultados;
	}

	public function get_venta($id)
	{
		$query = $this->db->select('ventas.id, clientes.nombre_completo, clientes.telefono, clientes.correo, cotizacion.folio, ventas.fecha_venta, ventas.id_cotizacion, cotizacion.folio, cotizacion.total,cotizacion.subtotal,cotizacion.iva, ventas.numero_transaccion')
						->from('ventas')
						->join('clientes','clientes.id = id_cliente')
						->join('cotizacion','cotizacion.id = ventas.id_cotizacion')
						// ->join('detalle_cotizacion_venta', 'cotizacion.id = detalle_cotizacion_venta.id_cotizacion')
						->where('ventas.id',$id)
						->get();
		$resultado = $query->row();
		return $resultado;
	}
	public function get_venta_detalle($id)
	{
		$query = $this->db->select('*')
						->from('cotizacion')						
						->join('detalle_cotizacion_venta', 'cotizacion.id = detalle_cotizacion_venta.id_cotizacion')
						->where('cotizacion.id',$id)
						->get();
		$resultado = $query->result();
		return $resultado;
	}

}
// select * from ventas 
// join cotizacion on cotizacion.id = ventas.id_cotizacion
// join clientes on clientes.id = ventas.id_cliente
// join detalle_cotizacion_venta on detalle_cotizacion_venta.id_cotizacion = cotizacion.id
// where ventas.id = 11
