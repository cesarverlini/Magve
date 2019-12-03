<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cart extends CI_Controller{

    public function index(){

        if(unserialize($this->session->userdata('cart'))){
            $data['items'] = array_values(unserialize($this->session->userdata('cart')));
            $data['total'] = $this->total();
        }else{
            $data['error'] = TRUE;
        }
        $data['title'] = "Carrito de compras";


        $this->load->view('adminlte-3.0.1/header', $data);
        $this->load->view('cart/index');
        $this->load->view('adminlte-3.0.1/footer');
    }

    public function buy($id){
		$servicio = $this->input->post('servicio');
		$nombre = $this->input->post('nombre');
		$direccion = $this->input->post('direccion');
		$costo = $this->input->post('costo');
		$capacidad = $this->input->post('capacidad');
		// $descripcion = $this->input->post('descripcion');
		$descripcion = "alguna descripcion";
		
        // $product = $this->productModel->find($id);
        // $item = array(
        //     'id' => $product->id,
        //     'name' => $product->name,
        //     'photo' => $product->photo,
        //     'price' => $product->price,
        //     'quantity' => 1
        // );

        $item = array(
			'id' => $id,
			'service' => $servicio,
			'name' => $nombre,
			'address' => $direccion,
			'capacity' => $capacidad,
			'descripcion' => $descripcion,
            'photo' => '',
            'price' => $costo,
            'quantity' => 1
		);
		// $item = array(
		// 	'id' => $id,
		// 	'service' => 'local',
        //     'name' => 'producto prueba',
        //     'photo' => '',
        //     'price' => '100',
        //     'quantity' => 1
        // );


        if(!$this->session->has_userdata('cart')) {
            $cart = array($item);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
            $index = $this->exists($id);
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

    public function remove($id){
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        redirect('carrito');
    }

    private function exists($id){
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['id'] == $id) {
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
}
