<?php
    // include("conexion.php");
    
    // $nombre = $_POST['nombre'];
    // $descripcion = $_POST['descripcion'];
    // $stock = $_POST['stock'];
    // $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    // $query = "INSERT INTO producto(nombre,descripcion,en_existencia,imagen) VALUES ('$nombre','$descripcion','$stock','$imagen')";
    // $resultado = $conexion->query($query);

    // if ($resultado) {
    //     echo "Se inserto";
    // }else{
    //     echo "no se inserto";
    // }

    require 'dababase.php';

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $db = new Database();
    $con = $db->conectar();

    $sql= $con->prepare("INSERT INTO producto(nombre,descripcion,precio,en_existencia,imagen) VALUES ('$nombre','$descripcion','$precio','$stock','$imagen')");
    $sql->execute();
    
     




?>