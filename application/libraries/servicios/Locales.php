<?php

    // Debemos incluir la clase API_Domain.php
    require(APPPATH.'libraries/servicios/API_Domain.php');

    class Locales {
        
        const Controller = 'Locales/';

        public static function ver_local($id=null){
            return ($id==null) ? API_Domain::DOMAIN_LOCALES.self::Controller.'local' : 
            API_Domain::DOMAIN_LOCALES.self::Controller.'local/'.$id;
        }
    }
?>
