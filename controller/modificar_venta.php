<?php
require_once '../model/conexion.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if (isset($_POST['btnmodificar'])) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $dni = $_POST['dni'];
        $producto = $_POST['producto'];
        $precio_unit = $_POST['precio_unit'];
        $cantidad = $_POST['cantidad'];

        // Calcula el precio total multiplicando el precio unitario por la cantidad
        $precio_total = $precio_unit * $cantidad;

        $query = $con->prepare("UPDATE ventas SET nombres=?, dni=?, producto=?, precio_unit=?, cantidad=?, precio_total=? WHERE id=?");
        $resultado = $query->execute(array($nombres, $dni, $producto, $precio_unit, $cantidad, $precio_total, $id));

        if ($resultado) {
            header("Location: ../view/index.php");
            exit;
        } else {
            echo '<div class="alert alert-danger">Error al Actualizar Venta</div>';
        }
    }
}
?>


