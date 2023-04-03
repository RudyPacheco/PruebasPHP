<?php

    class ninaInfo{
         public $cui;
         public $nombre;
         public $apellido;
         public $edad;
         public $rangoP;
  

        public function __construct($cui,$nombre,$apellido,$edad,$rangoP){
            $this->cui = $cui;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
            $this->rangoP = $rangoP;
            
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

        public function getRangoP(){
            return $this->rangoP;
        }
        
     


    }




?>