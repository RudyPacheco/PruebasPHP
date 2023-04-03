<?php

 //echo $usuario->getNombre();
     require_once('configdb.php');

    function registrarNino($ninoN){
    
    $cui = $ninoN->getCui();
    $nombre = $ninoN->getNombre();
    $apellido = $ninoN->getApellido();
    $fecha = $ninoN->getFecha();
    if ($ninoN->getSexo() == 'm') {
        $sexo = true;
    }elseif ($ninoN->getSexo() == 'f') {
        $sexo = false;
    }
    $peso = $ninoN->getPeso();
    $talla = $ninoN->getTalla();
   

    $db = new Database();
    $con = $db->conectar();

    $sql= $con->prepare("INSERT INTO ninos(cui,nombre,apellido,fecha_nacimiento,sexo,peso,talla) VALUES ('$cui','$nombre','$apellido','$fecha','$sexo','$peso','$talla')");
    $sql->execute();
    
     




}


?>