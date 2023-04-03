<?php

    $conexion = new mysqli("localhost","root","password","ventas");

    if($conexion){
        echo "Conexion Exitosa";
    }else{
        echo "Conexion Fallida";
    }


?>