<?php

//peticiones 

//echo "Method HTTP: " .$_SERVER['REQUEST_METHOD'];   

//Registro de niño (doctores)
header("Content-Type: application/json");

include_once("clases/nino.php");
include 'buscar_nino.php';
include 'tabla_peso.php';
include 'guardar.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        //echo "Guardar";
        $_POST = json_decode(file_get_contents('php://input'),true);
        //echo "guardando " . $_POST['nombre'];
        $ninoN = new Nino($_POST['cui'],$_POST['nombre'],$_POST['apellido'],$_POST['fechaNacimiento'],$_POST['sexo'],$_POST['peso'],$_POST['talla']);
         //echo $usuario->getNombre();
        registrarNino($ninoN);
        echo "Guardado exitosamente";
        break;
    case 'GET':
        if (isset($_GET{'CUI'})) {
          
          buscarNino($_GET['CUI']);
          echo json_encode(buscarNino($_GET['CUI']));

        }else{
           // echo "Retornar Tabla";
            $restultadoListado=generarTablaNinas();
            echo json_encode($restultadoListado);
        }

        break;
    default:
        # code...
        break;
}





?>