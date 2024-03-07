<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas - Lab 12</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Estilo CSS-->
    <style>
      .form-custom {
        border-radius: 20px;
        background-color: #ffcf40;
        padding: 30px;
      }
      *{
        font-family: 'Poppins', sans-serif;
      }
    </style>
    <!--Fuente Poppins Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

</head>
<body class="ml-5">
  <!--Eliminar venta PHP-->
  <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success" id="success-alert">Venta eliminada correctamente</div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);
    </script>
  <?php endif; ?>

  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger" id="error-alert">Error al eliminar venta</div>
    <script>
        setTimeout(function() {
            document.getElementById('error-alert').style.display = 'none';
        }, 5000);
    </script>
  <?php endif; ?>

    
  <div class="p-4 pt-1 container-fluid row">
      <h2 class="p-3 mt-3 text-center text-primary bg-primary bg-opacity-10 border border-primary rounded fw-bold" style="--bs-border-opacity: .25">
        Registro de ventas - PDF
      </h2>
      
      <form class="mt-4 ml-5 mr-3 form-custom col-4 mb-5" method="POST">
          <?php
          include "../model/conexion.php";
          include "../controller/registro_venta.php";
          ?>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Nombres</label>
              <input type="text" class="form-control" name="nombres">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">DNI</label>
              <input type="text" class="form-control" name="dni">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Producto</label>
              <input type="text" class="form-control" name="producto">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Precio Unitario</label>
              <input type="number" step=".01" class="form-control" name="precio_unit">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Cantidad</label>
              <input type="number" class="form-control" name="cantidad">
          </div>
          <div class="form-group text-center">
              <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
          </div>
      </form>

    <div class="col-8 p-4">
      <table class="table table-bordered border-primary">
        <thead class="bg-info table-primary">
          <tr>
              <th scope="col">ID</th>
              <th scope="col">NOMBRES</th>
              <th scope="col">DNI</th>
              <th scope="col">PRODUCTO</th>
              <th scope="col">PRECIO UNITARIO</th>
              <th scope="col">CANTIDAD</th>
              <th scope="col">PRECIO TOTAL</th>
              <th colspan="2">
                <a class="ms-3 mb-1 btn btn-success" href="../controller/generar_pdfventa.php" target="_blank">
                  <b>GENERAR PDF</b>
                </a>
              </th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once "../model/conexion.php";
          // Cambia la consulta SQL para seleccionar los datos de la tabla ventas
          $sql = $conexion->query("SELECT * FROM ventas");
          // Utiliza un bucle foreach para recorrer cada fila del conjunto de resultados
          foreach ($sql as $row) { ?>
              <tr>
                  <th><?= $row['id'] ?></th>
                  <td><?= $row['nombres'] ?></td>
                  <td><?= $row['dni'] ?></td>
                  <td><?= $row['producto'] ?></td>
                  <td><?= $row['precio_unit'] ?></td>
                  <td><?= $row['cantidad'] ?></td>
                  <td><?= $row['precio_total'] ?></td>
                  <td><a href="modificar.php?id=<?php echo $row['id']; ?>" class="
                  btn btn-warning">Editar</a></td>
                  <td><a href="../controller/eliminar_venta.php?id=<?php echo $row['id']; ?>" class="
                  btn btn-danger">Eliminar</a></td>
              </tr>
          <?php
          }
          ?>
        </tbody>

          <!--Script Bootstrap-->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
          <!--Javascript-->
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!--Para hacer desaparecer los .alert después de un tiempo-->
            
          
      </table>
    </div>
  </div>
</body>
</html>