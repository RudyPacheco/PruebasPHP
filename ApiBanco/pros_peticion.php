<?php
   // include_once("clase/peticion_info.php");
   include_once("clase/info_usuario.php");
    require_once('configbd.php');


    function solicitarInfo($cui,$codigoUsuario,$contrasena){
    
    $userValido=validarUser($cui,$codigoUsuario,$contrasena);    
    
    $Info=" ";

    if ($userValido == " ") {
        
        $Info = "CUI , Codigo o Contraseña de usuario invalida";

    }else{

        $Monetaria = cuentaMonetaria($cui);
        $dolares = $Monetaria * 7.81 ;
        $Info = new infoUser($userValido,$Monetaria,$dolares,300,500,"valido");
      

       
    }



        return $Info;
       //return $infomacion;
    }


    function validarUser($cui,$codigoUser,$contrasena){
        $db = new Database();
        $con = $db->conectar();

 
     
        $sql= $con->prepare("SELECT nombre FROM cliente WHERE cui = ? ");
        $sql->execute([$cui]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
    
   
        $nombre=" ";

    if ($row) {
       
       
            $nombre=$row['nombre'];
        

    }
     
        return $nombre;
    }

   function cuentaMonetaria($cui){
    $db = new Database();
    $con = $db->conectar();


 
    $sql= $con->prepare("SELECT monto FROM cuenta_monetaria WHERE cui = ? ");
    $sql->execute([$cui]);
    $resutaldo = $sql->fetch(PDO::FETCH_ASSOC);
    $totalCM=0;
    if ($resultado) {
        # code...
        $totalCM= $resultado['monto'];

    }
  
    return $totalCM;
   }

?>