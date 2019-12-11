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
		$resultado = $this->db->select('*')
			->from('cotizacion')
			->where('id_cliente', $id)
			->get();
		return $resultado->result();
	}
	public function autocomplete($correo)
	{
		$data = $correo['search'];
		$query = $this->db->query("SELECT * FROM clientes where correo like '%$data%'");
		return $query->result();
	}
	public function autocomplete_folio($folio)
	{
		$data = $folio['search'];
		$query = $this->db->query("SELECT * FROM cotizacion where folio like '%$data%'");
		return $query->result();
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
	public function get_cliente_cotizacion($id)
	{
		$resultado = $this->db->select('*')
			->from('cotizacion')
			->join('clientes', 'clientes.id = id_cliente')
			->where('cotizacion.id', $id)
			->get();
		return $resultado->row();
	}
}
