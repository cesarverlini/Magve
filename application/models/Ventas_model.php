<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function get_cotizaciones($id)
	{
		// $resultado = $this->db->select('*')
		// 	->from('cotizacion')
		// 	->where('id_cliente', $id)
		// 	->get();
		$query = $this->db->query("SELECT * FROM cotizacion where id_cliente = '".$id."' AND NOT EXISTS (select * from ventas where cotizacion.id = ventas.id_cotizacion)");
		
		return $query->result();
	}

	/*
	* regresamos el ID si existe un local cotizado
	*/
	public function get_direccion_evento($folio){
		$query = $this->db->query("select d.id_producto as id_local from cotizacion c inner join 
		detalle_cotizacion_venta d on c.id = d.id_cotizacion where id_proveedor = 2 
		and c.folio = ".$folio." LIMIT 1 ");
		// Si no trae nada, retornar 0
		return ( $query->row() != null ) ? $query->row() : 0;
	}

	public function detalle_venta($folio)
	{
		$resultado = $this->db->select('*')
								->from('cotizacion')
								->join('clientes', 'clientes.id = id_cliente')
								->join('usuarios', 'id_empleado = usuarios.id')
								->where('folio', $folio)
								->get();
		return $resultado->row();
	}

	public function autocomplete($correo)
	{
		$data = $correo['search'];
		$correo = $this->db->query("SELECT * FROM clientes where correo like '%$data%'");
		$folio = $this->db->query("SELECT * FROM cotizacion where folio like '%$data%' AND NOT EXISTS (select * FROM ventas where cotizacion.id = ventas.id_cotizacion)");

		if ($correo->result()) {
			return $correo->result();
		}else{
			return $folio->result();
		}
		// return $query->result();
	}
	public function cotizacion_folio($folio)
	{
		// $data = $folio['search'];
		// $query = $this->db->query("SELECT * FROM cotizacion where folio like '%$data%'");
		$resultado = $this->db->select('*')
								->from('cotizacion')
								->join('detalle_cotizacion_venta','id_cotizacion = cotizacion.id')
								->where('folio',$folio)->get();
		return $resultado->row();
	}

	public function insertar_venta($data){
		$this->db->insert('ventas', $data);
		return $this->db->insert_id();
	}

	public function general_cotizacion($folio){
		$query = $this->db->query("select * from cotizacion where folio = ".$folio);
		return $query->row_array();
	}

	public function get_cliente($id)
	{
		$respuesta = $this->db->where('id', $id)->get('clientes');
		return $respuesta->result();
	}
	public function get_detalles($id)
	{
		$resultado = $this->db->where('id_cotizacion', $id)->get('detalle_cotizacion_venta');
		return $resultado->result();
	}
	public function get_email()
	{
		$this->db->select('correo');
		$data = $this->db->get('clientes');
		return $data->result();
	}
	public function get_cliente_cotizacion($folio)
	{
		$resultado = $this->db->select('*')
			->from('cotizacion')
			->join('clientes', 'clientes.id = id_cliente')
			->where('cotizacion.folio', $folio)
			->get();
		return $resultado->row();
	}
}
