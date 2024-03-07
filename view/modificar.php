<?php
    include "../controller/editar_venta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Venta</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Fuente Poppins Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!--Estilo-->
    <style>
      .form-custom {
        border-radius: 20px;
        background-color: #d3eaf2;
        padding: 30px;
      }
      *{
        font-family: 'Poppins', sans-serif;
      }
    </style>

</head>
<body>
    <div class="container-fluid row">
        <form class="col-4 form-custom" method="POST" action="../controller/modificar_venta.php" autocomplete="off">
            <h3 class="text-center text-secundary">Modificar personas</h3>
            
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" required autofocus>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni" value="<?php echo $row['dni']; ?>">
            </div>
            <div class="mb-3">
                <label for="producto" class="form-label">Producto</label>
                <input type="text" class="form-control" name="producto" id="producto" value="<?php echo $row['producto']; ?>">
            </div>
            <div class="mb-3">
                <label for="precio_unit" class="form-label">Precio Unitario</label>
                <input type="text" class="form-control" name="precio_unit" id="precio_unit" value="<?php echo $row['precio_unit']; ?>">
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" id="cantidad" value="<?php echo $row['cantidad']; ?>">
            </div>
            
            <a href="index.php" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-warning" name="btnmodificar" value="ok">Modificar</button>
        </form>
    </div>
    <!--Script Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--Javascript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>