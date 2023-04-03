<?php

    class Database {
        private $hostname ="localhost";
        private $database ="GOODWAY";
        private $username ="root";
        private $password="";


        function conectar(){

            try {
                //code...
                $conexion ="mysql:host=" . $this->hostname ."; dbname=" . $this->database . ";";

                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];
    
                $pod = new PDO($conexion, $this->username, $this->password, $options);
    
                return $pod;
            } catch (PDOException $e) {
                //throw $th;
                echo 'Error conexion' . $e->getMessage();
                exit;
            }
       


        }
    }



