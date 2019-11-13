<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	public function insert_bebidas($data) //este lo tenia como prueba
    {
        $this->db->insert('banquete_bebidas',$data);
    }
}
