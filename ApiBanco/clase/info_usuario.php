<?php

    class infoUser{
         public $nombre;
         public $monetarioQ;
         public $monetarioD;
         public $saldoTC;
         public $balance;
         public $calificado;
   

        public function __construct($nombre,$monetarioQ,$monetarioD,$saldoTC,$balance,$calificado){
            $this->nombre = $nombre;
            $this->monetarioQ = $monetarioQ;
            $this->monetarioD = $monetarioD;
            $this->saldoTC = $saldoTC;
            $this->balance = $balance;
            $this->calficado = $calificado;

            
        }


      
        
     


    }
