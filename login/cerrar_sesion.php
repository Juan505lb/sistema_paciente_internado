<?php
session_start();
include "../conexion/conexion.php";

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Actualizar el estado a 'offline' en la tabla usuarios
    $sql = "UPDATE usuarios SET estado = 'offline' WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->close();
}

session_destroy();
header("Location: ../index.php");
exit();
?>
