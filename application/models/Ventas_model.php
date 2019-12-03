<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function get_cotizaciones($id){
        // $query = $this->db->query("select v.id as 'id', c.nombre_completo as 'id_cliente', u.nombre as 'id_empleado',v.total as 'total', v.fecha_registro as 'fecha'
        // from cotizacion as v 
        // join clientes as c on v.id_cliente = c.id 
        // join usuarios as u on
        // v.id_empleado = u.id");

		// return $query->result_array();
		$resultado = $this->db->select('*')
							  ->from('cotizacion')
							//   ->join('detalle_cotizacion_venta', 'cotizacion.id = detalle_cotizacion_venta.id_cotizacion')
							  ->where('id_cliente',$id)
							  ->get();
		return $resultado->result();

	}
	public function autocomplete($correo)
	{	
		$data = $correo['search'];		
		$query = $this->db->query("SELECT * FROM clientes where correo like '%$data%'");
		return $query->result();
	}
	public function get_detalles($id){
		$resultado = $this->db->where('id_cotizacion',$id)->get('detalle_cotizacion_venta');
		return $resultado->result();

	}
	public function get_email()
	{
		$this->db->select('correo');
		$data = $this->db->get('clientes');
		return $data->result();
	}
}
