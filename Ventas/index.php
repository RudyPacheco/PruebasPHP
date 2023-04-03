<?php
    require 'configdet.php';
    require 'dababase.php';

    $db = new Database();
    $con = $db->conectar();

    $sql= $con->prepare("SELECT codigo, nombre, precio, descripcion, en_existencia, imagen FROM producto");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

     



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
      </div>
    </div>
  </div>
</header>
<main>
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php  foreach ($resultado as $row ) {  ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen'])  ?> " class="card-img-top img-thumbnail">
            <div class="card-body">
              <h5 class="card-title"> <?php echo $row['nombre'];  ?> </h5>
              <h5 class="text"> <?php echo "Q." .  $row['precio'];  ?> </h5>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="detalles.php?id=<?php echo $row['codigo'] ?>&token=<?php echo hash_hmac('sha1',$row['codigo'],KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>

                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>