<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';

// Rutas para venta
$route['ventas'] = 'sistema/ventas';
$route['ventas/verificar-cotizacion/(:any)'] = 'sistema/check_cotizacion/$1';

// servicios
$route['servicios'] = 'sistema/servicios';
// servicios -> carga servicio
$route['servicios/(:any)'] = 'sistema/servicios/vista/$1';
// servicio local
$route['servicios/locales/(:num)'] = 'sistema/servicios/local/$1';

//carrito ver carrito
$route['carrito'] = 'sistema/cart';
$route['carrito/comprar/(:num)'] = 'sistema/cart/buy/$1';
$route['carrito/quitar/(:num)'] = 'sistema/cart/remove/$1';

//cotizaciones
$route['cotizacion'] = 'sistema/cotizaciones';
$route['datos_cliente'] = 'sistema/cotizaciones';
$route['confirmacion'] = 'sistema/cotizaciones/confirmacion';
$route['save_cotizacion'] = 'sistema/cotizaciones/guardar';

//clientes
$route['clientes'] = 'sistema/clientes';



//$route['servicios'] = 'sistema/servicios';
// rutas del sistema
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
