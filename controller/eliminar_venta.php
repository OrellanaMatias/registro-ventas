<?php
    require_once '../model/conexion.php';

    $db = new Database();
    $con = $db->conectar();

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $query = $con->prepare("DELETE FROM ventas WHERE id=?");
        $query->bind_param("i", $id);
        $query->execute();
        $numElimina = $query->affected_rows;

        if ($numElimina == 1) {
            // Redirige al usuario a index.php con un mensaje de éxito
            header("Location: ../view/index.php?success=1");
            exit;
        } else {
            // Redirige al usuario a index.php con un mensaje de error
            header("Location: ../view/index.php?error=1");
            exit;
        }
    }
?>



