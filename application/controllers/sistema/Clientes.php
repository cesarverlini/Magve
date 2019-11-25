<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('Clientes_model');
    }
	public function index()
	{
		$data = array(
			'clientes' => $this->Clientes_model->get_Clientes()
		);
		$this->load->view("layouts/header");
		// $this->load->view("layouts/aside");
		$this->load->view("sistema/clientes",$data);
		$this->load->view("layouts/footer");
	}
	public function editar_cliente($id)
	{
		$data = array(
			'cliente' => $this->Clientes_model->get_cliente($id)
		);
		$this->load->view("layouts/header");
		$this->load->view("sistema/editar_cliente",$data);
		$this->load->view("layouts/footer");
	}
	public function update()
	{
		$id = $this->input->post('idCliente');
		$nombre = $this->input->post('nombre');
		$correo = $this->input->post('correo');
		$telefono = $this->input->post('telefono');

		$data = array(
			'nombre' =>$nombre,
			'correo' =>$correo,
			'telefono'=>$telefono
		);

		if ($this->Clientes_model->editar_cliente($id,$data)) {
			redirect(base_url()."sistema/clientes");
		}else{
			$this->session->set_flashdata("error","no se pudo actualizar la informacion del cliente");
			redirect(base_url()."sistema/clientes/editar_clientes/".$id);
		}
	}
}