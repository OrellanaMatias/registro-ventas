<?php

require_once '../model/conexion.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if (isset($_POST['btnregistrar'])) {

    if (!empty($_POST['nombres']) AND !empty($_POST['dni']) AND !empty($_POST['producto']) AND !empty($_POST['precio_unit']) AND !empty($_POST['cantidad'])) {
        $nombres = $_POST['nombres'];
        $dni = $_POST['dni'];
        $producto = $_POST['producto'];
        $precio_unit = $_POST['precio_unit'];
        $cantidad = $_POST['cantidad'];

        // Calcula el precio total multiplicando el precio unitario por la cantidad
        $precio_total = $precio_unit * $cantidad;

        $query = $con->prepare("INSERT INTO ventas (nombres, dni, producto, precio_unit, cantidad, precio_total) VALUES (?, ?, ?, ?, ?, ?)");
        $resultado = $query->execute(array($nombres, $dni, $producto, $precio_unit, $cantidad, $precio_total));

        if ($resultado) {
            echo '<div class="alert alert-success"> Venta Registrada Correctamente</div>';
            echo '<script>
                     setTimeout(function(){
                         $(".alert").fadeOut(1000, function(){
                         window.location.href = "../view/index.php";
                         });
                     }, 2000);
                </script>';
            $correcto = true;
        } else {
            echo '<div class="alert alert-danger">Error al Registrar Venta</div>';
        }
    } else {
        echo '<div class="alert alert-warning">ALGUNOS CAMPOS ESTAN VACIOS</div>';
    }
}
?>

