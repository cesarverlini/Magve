<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cart extends CI_Controller{

    public function index(){

        if(unserialize($this->session->userdata('cart'))){
            $data['items'] = array_values(unserialize($this->session->userdata('cart')));
            $data['total'] = $this->total();
            $data['iva'] = $this->IVA();
        }else{
            $data['error'] = TRUE;
        }
        $data['title'] = "Carrito de compras";


        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view('cart/index');
        $this->load->view('adminlte-3.0.1/footer');
    }

    public function buy($id){

        // datos posteados 
        $id_servicio  = $this->input->post('servicio');
        $servicio     = $this->get_nombre_servicio($id_servicio);
		$nombre       = $this->input->post('nombre');
		$costo        = $this->input->post('costo');
        
        // array a guardar
        $item = array(
            'id'         => $id,
            'id_service' => $id_servicio,
			'service'    => $servicio,
			'name'       => $nombre,
            'price'      => $costo,
            'quantity'   => 1
		);

        if(!$this->session->has_userdata('cart')) {
            $cart = array($item);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
            $index = $this->exists($id, $id_servicio);
            $cart = array_values(unserialize($this->session->userdata('cart')));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata('cart', serialize($cart));
            }
        }
        redirect('carrito');
    }

    public function remove($id, $id_srv){
        $index = $this->exists($id, $id_srv);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        redirect('carrito');
    }

    private function exists($id, $id_srv){
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['id'] == $id && $cart[$i]['id_service'] == $id_srv) {
                return $i;
            }
        }
        return -1;
    }

    private function total(){
        $items = array_values(unserialize($this->session->userdata('cart')));
        $s = 0;
        foreach ($items as $item) {
            $s += $item['price'] * $item['quantity'];
        }
        return $s;
	}

	private function IVA()
	{		
        $subtotal = $this->total();
        $iva = $subtotal * .16;
        return $iva;
    }
    
    public function get_nombre_servicio($id_servicio){

        $servicios = array(
            0 => 'local', 
            1 => 'reposteria', 
            2 => 'fotografia', 
            3 => 'publicidad',
            4 => 'musica',
            5 => 'banquete',
            6 => 'decoracion'
        );

        return ( $servicios[$id_servicio] != null ) ? ucfirst($servicios[$id_servicio]) : "Otros";
    }
}
