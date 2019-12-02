<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function get_cotizaciones(){
        $query = $this->db->query("select v.id as 'id', c.nombre as 'id_cliente', u.nombre as 'id_empleado',v.total as 'total', v.fecha_registro as 'fecha'
        from cotizacion as v 
        join clientes as c on v.id_cliente = c.id 
        join usuarios as u on
        v.id_empleado = u.id");

        return $query->result_array();
	}
	public function autocomplete($correo)
	{	
		$data = $correo['search'];		
		$query = $this->db->query("SELECT * FROM clientes where correo like '%$data%'");
		return $query->result();
	}
	public function get_email()
	{
		$this->db->select('correo');
		$data = $this->db->get('clientes');
		return $data->result();
	}
}
