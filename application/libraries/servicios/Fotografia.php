<?php

    // Debemos incluir la clase API_Domain.php
    require(APPPATH.'libraries/servicios/API_Domain.php');

    class Fotografia {

        // retorna los paquetes disponibles en fotografía
        public static function tabla_paquetes(){
            return API_Domain::DOMAIN_FOTOGRAFIA.'paquetes/tabla_paquetes';
        }
    }

?>