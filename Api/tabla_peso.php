<?php

  require_once('configdb.php');
  include_once("clases/nina_peso.php");

    function generarTablaNinas(){
        $db = new Database();
        $con = $db->conectar();
    
        $sql= $con->prepare("SELECT cui,nombre,apellido,fecha_nacimiento,sexo,peso,talla FROM ninos WHERE sexo = false");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $listadoNinas = [];

        foreach ($resultado as $row ) {
            
            $edadMeses = calcularEdadM($row['fecha_nacimiento']); 
            $estadoNutricional = calcularEstadoNutri($edadMeses,$row['peso']);

            $nina = new ninaInfo($row['cui'],$row['nombre'],$row['apellido'],$edadMeses,$estadoNutricional);

           // $listadoNinas[] = $row['cui']. " " . $estadoNutricional ;
            $listadoNinas[]=$nina;
        }

        return $listadoNinas;

    }

    function calcularEdadM($fechaNino){
        $fechaActual = date('Y-m-d');
        $fecha1 = new DateTime($fechaNino);
        $fecha2 = new DateTime($fechaActual);
        $diff = $fecha1->diff($fecha2);
        $anios = $diff->y * 12 ;
        $mesesTotales = $anios + $diff->m;

        return $mesesTotales;
        //echo "meses : " . $mesesTotales;
        //echo $diff->m . ' meses de diferencia';
 


    }

    function calcularEstadoNutri($edad,$peso){
        $resultadoRango="";
        switch ($edad) {
            case 48:
                if ($peso>=14 && $peso<=18.8) {
                    $resultadoRango="Rango Normal";
                }elseif($peso>=12.5 && $peso<=14){
                    $resultadoRango="Desnutricion Aguda";
                }elseif ($peso<12.5) {
                    $resultadoRango="Desnutricion Cronica";
                }elseif ($peso>=18.8 && $peso<=21) {
                    $resultadoRango="Sobre peso";
                }elseif ($peso>21 ) {
                    $resultadoRango="Obesidad";
                }
                break;
            case 49:
            case 50:
                if ($peso>=14.2 && $peso<=19) {
                    $resultadoRango="Rango Normal";
                }elseif($peso>=12.9 && $peso<=14.2){
                    $resultadoRango="Desnutricion Aguda";
                }elseif ($peso<12.9) {
                    $resultadoRango="Desnutricion Cronica";
                }elseif ($peso>=19 && $peso<=21.8) {
                    $resultadoRango="Sobre peso";
                }elseif ($peso>21.8) {
                    $resultadoRango="Obesidad";
                }
                break;
             case 51:
             case 52:
                if ($peso>=14.4 && $peso<=19.5) {
                    $resultadoRango="Rango Normal";
                }elseif($peso>=13 && $peso<=14.4){
                    $resultadoRango="Desnutricion Aguda";
                }elseif ($peso<13) {
                    $resultadoRango="Desnutricion Cronica";
                }elseif ($peso>=19.5 && $peso<=22.2) {
                    $resultadoRango="Sobre peso";
                }elseif ($peso>22.2 ) {
                    $resultadoRango="Obesidad";
                }
                break;
            case 53:
            case 54:
                if ($peso>=14.5 && $peso<=20) {
                    $resultadoRango="Rango Normal";
                }elseif($peso>=13.2 && $peso<=14.5){
                    $resultadoRango="Desnutricion Aguda";
                }elseif ($peso<13.2) {
                    $resultadoRango="Desnutricion Cronica";
                }elseif ($peso>=20 && $peso<=22.8) {
                    $resultadoRango="Sobre peso";
                }elseif ($peso>22.8) {
                    $resultadoRango="Obesidad";
                }
                break;
            case 55:
            case 56:
                if ($peso>=15 && $peso<=20.5) {
                    $resultadoRango="Rango Normal";
                }elseif($peso>=13.5 && $peso<=15){
                    $resultadoRango="Desnutricion Aguda";
                }elseif ($peso<13.5) {
                    $resultadoRango="Desnutricion Cronica";
                }elseif ($peso>=20.5 && $peso<=23.2) {
                    $resultadoRango="Sobre peso";
                }elseif ($peso>23.2) {
                    $resultadoRango="Obesidad";
                }
                break;
             case 57:
             case 58:
                if ($peso>=15.5 && $peso<=21) {
                    $resultadoRango="Rango Normal";
                }elseif($peso>=13.9 && $peso<=15.5){
                    $resultadoRango="Desnutricion Aguda";
                }elseif ($peso<13.9) {
                    $resultadoRango="Desnutricion Cronica";
                }elseif ($peso>=21 && $peso<=23.8) {
                    $resultadoRango="Sobre peso";
                }elseif ($peso>23.8) {
                    $resultadoRango="Obesidad";
                }
                break;
            case 59:
            case 60:
                if ($peso>=15.8 && $peso<=21) {
                    $resultadoRango="Rango Normal";
                }elseif($peso>=13.9 && $peso<=15.5){
                    $resultadoRango="Desnutricion Aguda";
                }elseif ($peso<13.9) {
                    $resultadoRango="Desnutricion Cronica";
                }elseif ($peso>=21 && $peso<=23.8) {
                    $resultadoRango="Sobre peso";
                }elseif ($peso>23.8) {
                    $resultadoRango="Obesidad";
                }
                break;
            default:
                $resultadoRango="No incluye en el rango";
                break;
        }

        return $resultadoRango;
    }
    



?>