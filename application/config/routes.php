<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';

// Rutas para venta
$route['ventas'] = 'sistema/ventas';
$route['historial_ventas'] = 'sistema/historial';
$route['ver_venta/(:num)'] = 'sistema/historial/ver_venta/$1';
$route['ver_venta_pdf/(:num)'] = 'sistema/historial/venta_pdf/$1';
//vamos a pasar el # de cotización a esta vista para hacer la compra
$route['ventas/cotizacion-venta/(:num)'] = 'sistema/ventas/cotiza_venta/$1';
$route['ventas/verificar-cotizacion/(:any)'] = 'sistema/check_cotizacion/$1';
$route['ventas/generar-venta'] = 'sistema/ventas/generar_venta';

//test api locales curl
$route['curl'] = 'sistema/curl';

// servicios
$route['servicios'] = 'sistema/servicios';
// servicios -> carga servicio
$route['servicios/(:any)'] = 'sistema/servicios/vista/$1';
// servicio local
$route['servicios/locales/(:num)'] = 'sistema/servicios/local/$1';
// servicio reposteria
$route['servicios/paquete/(:num)'] = 'sistema/servicios/paquete/$1';

//carrito ver carrito
$route['carrito'] = 'sistema/cart';
$route['carrito/comprar/(:num)'] = 'sistema/cart/buy/$1';
$route['carrito/quitar/(:num)/(:num)'] = 'sistema/cart/remove/$1/$2';

//cotizaciones
$route['cotizacion_pdf/(:num)'] = 'sistema/cotizaciones/cotizacion_pdf/$1';
$route['cotizacion'] = 'sistema/cotizaciones';
$route['informacion-del-cliente'] = 'sistema/cotizaciones';
$route['confirmacion-cotizacion'] = 'sistema/cotizaciones/confirmacion';
$route['save_cotizacion'] = 'sistema/cotizaciones/guardar';

//clientes
$route['clientes'] = 'sistema/clientes';
$route['editar_cliente'] = 'sistema/clientes/update';
//contrato
$route['contrato/(:num)'] = 'sistema/ventas/contrato/$1';

$route['pagar'] = 'sistema/Pago';
$route['transferencia'] = 'sistema/Pago/Transferencia';
$route['deposito'] = 'sistema/Pago/Deposito';


//$route['servicios'] = 'sistema/servicios';
// rutas del sistema
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
