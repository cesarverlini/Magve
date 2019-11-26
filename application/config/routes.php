<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';

// Rutas para venta
$route['ventas'] = 'sistema/ventas';
$route['ventas/verificar-cotizacion/(:any)'] = 'sistema/check_cotizacion/$1';

// servicios
$route['servicios'] = 'sistema/servicios';
$route['servicios/email'] = 'sistema/servicios/send_mail';

//$route['servicios'] = 'sistema/servicios';


// rutas del sistema
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
