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
}
