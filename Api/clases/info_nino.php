<?php

    class infoNino{
         public $cui;
         public $nombre;
         public $apellido;
         public $edad;
         public $rangoC;
  

        public function __construct($cui,$nombre,$apellido,$edad,$rangoC){
            $this->cui = $cui;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
            $this->rangoC = $rangoC;
            
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