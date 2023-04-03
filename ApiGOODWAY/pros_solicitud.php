<?php
    include_once("clase/peticion_info.php");
    require_once('configdb.php');


    function solicitarInfo($codigoTienda,$codigoUsuario,$contrasena){
    
    $userValido=validarUser($codigoUsuario,$contrasena);    
    
    $Info=" ";

    if ($userValido == TRUE) {
        
        $tiendaVal = validarTienda($codigoTienda);
        if ($tiendaVal == " ") {
            $Info = "Codigo de tienda invalida";          
        }else{
            $Info = buscarInfo($codigoTienda,$codigoUsuario,$tiendaVal);
           
        }

    }else{
        $Info = "Codigo o Contraseña de usuario invalida";
    }



        return $Info;
       //return $infomacion;
    }


    function validarUser($codigoUser,$contrasena){
        $db = new Database();
        $con = $db->conectar();

 
     
        $sql= $con->prepare("SELECT codigo,contrasena FROM usuarios WHERE codigo = ? ");
        $sql->execute([$codigoUser]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
    
   
        $validacion = False;

    if ($row) {
        if ($row['contrasena'] == $contrasena ) {
            $validacion = True;
        }

    }
     
        return $validacion;
    }

    function validarTienda($codigoTienda){
        $db = new Database();
        $con = $db->conectar();

 
     
        $sql= $con->prepare("SELECT codigo,nombre FROM tiendas WHERE codigo = ? ");
        $sql->execute([$codigoTienda]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
    
        
        $validacion = " ";

       if ($row) {
        # code...
        if ($row['codigo'] == $codigoTienda) {
            $validacion = $row['nombre'];
                }
            
       }
        
        

        return $validacion;
    }

    function buscarInfo($codigoTienda,$codigoUsuario,$nombreTienda){
        $db = new Database();
        $con = $db->conectar();

 
     
        $sql= $con->prepare("SELECT numero_factura,codigo_tienda,fecha_emision,codigo_usuario,total FROM facturas WHERE codigo_tienda = ? AND codigo_usuario = ? AND fecha_emision BETWEEN '2022-01-01' AND '2022-12-31' ");
        $sql->execute([$codigoTienda,$codigoUsuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        
        $totalFacturado = 0;
        $totalFactuas = 2;
       foreach ($resultado as $row ) {
        $totalFacturado = $totalFacturado + $resultado['total'];
       

        }
        $resultadoVip= " ";
        if ($totalFacturado > 60000) {
            $resultadoVip="Ya es cliente vip";
        }else{
            $resultadoVip="Aun no es cliente vip";
        }

        $infoSolicitada = new infoUser($nombreTienda,$totalFactuas,$resultadoVip);
    


        return $infoSolicitada;
    }


?>