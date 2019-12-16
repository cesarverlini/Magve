<?php

    // Debemos incluir la clase API_Domain.php
    require(APPPATH.'libraries/servicios/API_Domain.php');

    class Decoracion {

		const Controller = 'Decoraciones/';
        // retorna los paquetes disponibles en fotografía
        public static function tabla_paquetes($id=null){
			// return ($id==null) ? API_Domain::DOMAIN_DECORACION.self::Controller.'imprenta' : 
            // API_Domain::DOMAIN_LOCALES.self::Controller.'imprenta/'.$id;
            return API_Domain::DOMAIN_DECORACION.'imprenta/paquetes';
        }
    }

?>
