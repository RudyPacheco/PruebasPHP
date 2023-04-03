<!DOCTYPE html >
<html>
<head>
    <title>Pagina web xd</title>
</head>
<body>
    <center>
        <form action="proceso_guardar.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="nombre" /><br><br>
            <input type="text" name="descripcion" placeholder="Descripcion" /><br><br>
            <input type="number" name="precio"placeholder="Precio" /><br><br>
            <input type="number" name="stock"placeholder="Cantidad" /><br><br>
            <input type="file" name="imagen" /><br><br>
            <input type="submit" name="Aceptar"/><br><br>
        </form>
    </center>
</body>
</html>