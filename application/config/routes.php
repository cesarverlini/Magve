<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';

// Rutas para venta
$route['ventas'] = 'sistema/ventas';

// rutas del sistema
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
