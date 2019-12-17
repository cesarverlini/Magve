<?php

    // Debemos incluir la clase API_Domain.php
    require(APPPATH.'libraries/servicios/API_Domain.php');

    class Reposteria {

		public function __construct(){
			
		}
		
        // Funcion inicial que se ejecuta
        public static function main(){
			
		}
		const Controller = 'Paquetes/';
		public static function tabla_paquetes($id=null)
		{
			return ($id==null) ? API_Domain::DOMAIN_REPOSTERIA.self::Controller.'tabla_paquetes' : 
            API_Domain::DOMAIN_REPOSTERIA.self::Controller.'paquete_reposteria/'.$id;
			// return API_Domain::DOMAIN_REPOSTERIA.'Paquetes/tabla_paquetes';
		}
		// public static function ver_paquete()
		// {
		// 	return API_Domain::DOMAIN_REPOSTERIA.'Paquetes/paquete_reposteria';
        // }
    }

?>
