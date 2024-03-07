<?php
    include_once "../model/conexion.php";

    $id = $_GET['id'];

    $sql = $conexion->query("SELECT nombres, dni, producto, precio_unit, cantidad, precio_total FROM ventas WHERE id='$id'");
    //Por si hay errores
    if (!$sql) {
        printf("Error: %s\n", $conexion->error);
    }

    $num = $sql->num_rows;

    if ($num > 0) {
        $row = $sql->fetch_assoc();
    } else {
        header("Location: ../view/index.php");
    }
?>



