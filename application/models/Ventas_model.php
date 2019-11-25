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
}