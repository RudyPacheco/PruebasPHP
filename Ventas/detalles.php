<?php
    require 'configdet.php';
    require 'dababase.php';

    $db = new Database();
    $con = $db->conectar();


    function write_to_console($data) {
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
       
        echo "<script>console.log('Console: " . $console . "' );</script>";
       }
       
    



    $id = isset($_GET['id']) ? $_GET['id'] : ''  ;
    $token = isset($_GET['token']) ? $_GET['token'] : '' ;

    if ($id == '' || $token=='') {
        echo 'Error al procesar la peticion';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1',$id,KEY_TOKEN);
        if ($token == $token_tmp) {
            write_to_console("Hello World!");
            $sql= $con->prepare("SELECT count(codigo) FROM producto WHERE codigo=?");
            $sql->execute([$id]);
            
            if ($sql->fetchColumn() > 0 ) {
                write_to_console([1,2,3]);
                $sql= $con->prepare("SELECT codigo, nombre, precio, descripcion, en_existencia, imagen FROM producto WHERE codigo = ?");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $nombre = $row['nombre'];
                $prcio = $row['precio'];
                $descripcion = $row['descripcion'];
                $imagen = $row['imagen'];
                

            }
             


        }else{
            echo 'Error al procesar la peticion';
            exit;
        }
    }

   



?>


<!DOCTYPE html >
<html>
<head>
    <title>Pagina web xd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
  </head>
<body>
    <header>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
      <a href="#" class="navbar-brand ">
        <strong>Tienda Online</strong>
      </a>
      <div class="collapse navbar-collapse" id="navbarHeader">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a href="#" class="nav-link active">Inicio</a>
        </li>  
        <li class="nav-item">
            <a href="#" class="nav-link ">Catalogo</a>
        </li>  
        </ul>
        <a href="carrito.php" class="btn btn-primary">
            Carrito <span id="num_cart" class="badge bg-secondary"></span>
        </a>
      </div>
    </div>
  </div>
</header>
<main>
    <div class="container">
        <div class="row" >
            <div class="col-md-6 order-md-1">
                <img src="data:image/jpg;base64,<?php echo base64_encode($imagen) ?>" class="card-img-top img-thumbnail">
            </div>
            <div class="col-md-6 order-md-2">
                <h2><?php echo $row['nombre']; ?> </h2>
                <p>Descripcion : </p>
                <p class=lead>
                    <?php echo  $row['descripcion']; ?> 
                </p>
                
                <h2><?php echo "Q." . $row['precio']; ?> </h2>
                <div class="d-grip gap-3 col-10 mx-auto"> 
                    <button class="btn btn-primary" type="button">Comprar</button>
                    <button class="btn btn-outline-primary" type="button" onclick="addProduct(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')" >Agregar al carrito</button>
                </div>

            </div>
        </div>   
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script>
        function addProduct(id,token){
            let url= 'carrito.php'
            let formData = new FormData()
            formData.append('id',id)
            formData.append('token',token)

            fetch(url, {
                method:'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
        }
    </script>


</body>
</html>