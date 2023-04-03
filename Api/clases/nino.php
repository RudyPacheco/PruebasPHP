<?php

    class Nino{
        private $cui;
        private $nombre;
        private $apellido;
        private $fechaNacimineto;
        private $sexo;
        private $peso;
        private $talla;

        public function __construct($cui,$nombre,$apellido,$fechaNacimineto,$sexo,$peso,$talla){
            $this->cui = $cui;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fechaNacimiento = $fechaNacimineto;
            $this->sexo = $sexo;
            $this->peso = $peso;
            $this->talla = $talla;
            
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
        
        public function getFecha(){
            return $this->fechaNacimiento;
        }
        
        public function getSexo(){
            return $this->sexo;
        }
        
        public function getPeso(){
            return $this->peso;
        }
        
        public function getTalla(){
            return $this->talla;
        }


    }




?>