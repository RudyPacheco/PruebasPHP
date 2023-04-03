<?php

//peticiones 

//echo "Method HTTP: " .$_SERVER['REQUEST_METHOD'];   

//Registro de niño (doctores)
header("Content-Type: application/json");

//include_once("clases/nino.php");
//include 'buscar_nino.php';
//include 'tabla_peso.php';
//include 'guardar.php';

include 'pros_peticion.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
      
        break;
    case 'GET':
     $_DATA = json_decode(file_get_contents('php://input'),true);
     $resultado = solicitarInfo($_DATA['cui'],$_DATA['codigoUsuario'],$_DATA['contrasena']);

     echo json_encode($resultado);

        break;
    default:
        # code...
        break;
}





?>