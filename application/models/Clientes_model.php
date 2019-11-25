<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function get_Clientes()
	{
		$resultados = $this->db->get('clientes');
		return $resultados->result();
	}
	public function get_cliente($id)
	{
		$this->db->where('id',$id);
		$resultado = $this->db->get('clientes');
		return $resultado->row();
	}
	public function editar_cliente($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('clientes',$data);
	}
}
