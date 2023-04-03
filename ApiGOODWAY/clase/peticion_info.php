<?php

    class infoUser{
         public $nombreTienda;
         public $numeroFacturas;
         public $vip;

  

        public function __construct($nombreTienda,$numeroFacturas,$vip){
            $this->nombreTienda = $nombreTienda;
            $this->numeroFacturas = $numeroFacturas;
            $this->vip = $vip;
            
        }


        public function guardarNino(){

        }

        public function getCui(){
            return $this->cui;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }
        
        
        public function getEdad(){
            return $this->edad;
        }

        public function getRangoC(){
            return $this->rangoC;
        }
        
     


    }




?>