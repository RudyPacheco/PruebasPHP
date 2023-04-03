<?php
    require 'configdet.php';

    if (isset($POST['id'])) {

        $id = $_POST['id'];
        $token = $_POST['token'];

        $token_tmp = hash_hmac('sha1',$id,KEY_TOKEN);
        
        if ($token == $token_tmp) {

            if (isset($_SSESION['carrito']['productos'][$id])) {
                $_SSESION['carrito']['productos'][$id] += 1;
            }else{
                $_SSESION['carrito']['productos'][$id] = 1;
            }
         

         $datos['numero'] = count($_SSESION['carrito']['productos']);   
         $datos['ok'] = true;
        }else{
            $datos['ok'] = false;
        }


    }else{
        $datos['ok'] = false;


    
    }

echo json_encode($datos);
