<?php

    require_once('configdb.php');
    include_once("clases/info_nino.php");

    function buscarNino($CUI){
        $db = new Database();
        $con = $db->conectar();

 
     
        $sql= $con->prepare("SELECT cui,nombre,apellido,fecha_nacimiento,sexo,peso,talla FROM ninos WHERE cui = ?");
        $sql->execute([$CUI]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
    
   
        $nombre = $row['fecha_nacimiento'];
       // echo $nombre;
        $edadMeses = calcularEdad($row['fecha_nacimiento']);
        $rango="";
        //$rango = calcularREstatura($edadMeses,$row['talla']);
      
       if ($row['sexo'] == 1 ) {
        $rango = calcularREstaturaM($edadMeses,$row['talla']);
       }elseif ($row['sexo'] == 0) {
        $rango = calcularREstaturaF($edadMeses,$row['talla']);
       }

        $Datos = $row['cui'] . " " . $row['nombre'] . " " .$edadMeses . " ";
        $infomacion = $Datos . $rango;
       
       $ninoInfo = new infoNino($row['cui'],$row['nombre'],$row['apellido'],$edadMeses,$rango);
        return $ninoInfo;
       //return $infomacion;
    }

    function calcularEdad($fechaNino){
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

    function calcularREstaturaM($edad,$talla){
        $resultadoRango="";
        switch ($edad) {
            case 48:
                if ($talla>=96 && $talla<=113) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<96){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 49:
            case 50:
                if ($talla>=97 && $talla<=114) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<97){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
             case 51:
             case 52:
                if ($talla>=98 && $talla<=115) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<98){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 53:
            case 54:
                if ($talla>=99 && $talla<=116) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<99){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 55:
            case 56:
                if ($talla>=100 && $talla<=117) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<100){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
             case 57:
             case 58:
                if ($talla>=101 && $talla<=118) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<101){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 59:
            case 60:
                if ($talla>=102 && $talla<=119) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<102){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            default:
                $resultadoRango="No incluye en el rango";
                break;
        }

        return $resultadoRango;
    }

    function calcularREstaturaF($edad,$talla){
        $resultadoRango="";
        switch ($edad) {
            case 48:
                if ($talla>=95 && $talla<=112) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<95){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 49:
            case 50:
                if ($talla>=96 && $talla<=113) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<96){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
             case 51:
             case 52:
                if ($talla>=97 && $talla<=114) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<97){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 53:
            case 54:
                if ($talla>=98 && $talla<=115) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<98){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 55:
            case 56:
                if ($talla>=99 && $talla<=116) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<99){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
             case 57:
             case 58:
                if ($talla>=100 && $talla<=117) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<100){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            case 59:
            case 60:
                if ($talla>=101 && $talla<=118) {
                    $resultadoRango="Rango Normal";
                }elseif($talla<101){
                    $resultadoRango="Alerta de retardo de crecimiento";
                }else{
                    $resultadoRango="Rango Normal";
                }
                break;
            default:
                $resultadoRango="No incluye en el rango";
                break;
        }

        return $resultadoRango;
    }




?>