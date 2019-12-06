<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	public function insert_servicios($data) //este lo tenga como prueba
    {
        $this->db->insert('detalle_cotizacion_venta',$data);
	}
	public function insert_clientes($data)
	{
		$this->db->insert('clientes',$data);
		$ultimoId = $this->db->insert_id();
		return $ultimoId;
	}
	public function insert_cotizacion($data)
	{
		$this->db->insert('cotizacion',$data);
		$ultimoId = $this->db->insert_id();
		return $ultimoId;
	}
	public function get_detalles($id)
	{
		$this->db->where('id_cotizacion',$id);
		$resultado = $this->db->get('detalle_cotizacion_venta');
		return $resultado;	
	}
	public function set_costototal($id,$costo)
	{
		$this->db->where('id', $id);
		$this->db->update('cotizacion', $costo);
	}
	public function get_datos_cotizacion($id)
	{
		$this->db->where('id_cotizacion',$id);
		$resultado = $this->db->get('detalle_cotizacion_venta');
		return $resultado->result();
	}
	public function get_cotizacion($id)
	{
		$query = "SELECT * FROM cotizacion join clientes on cotizacion.id_cliente = clientes.id where cotizacion.id = ".$id."";
		$resultado = $this->db->query($query);
		// $this->db->select('*');
		// $this->db->from('cotizacion');
		// $this->db->join('clientes', 'cotizacion.id_cliente = clientes.id');
		// $this->db->where('cotizacion.id',$id);
		// $resultado = $this->db->get();
		return $resultado->row();
	}
	public function existe_correo($correo)
	{
		$resultado = $this->db->where('correo',$correo)->get('clientes');
		return $resultado->row();
	}
}
