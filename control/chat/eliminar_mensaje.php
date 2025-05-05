<?php
session_start();
include "../../conexion/conexion.php";

if (!isset($_SESSION['id_usuario'])) {
    exit("Debes iniciar sesión");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'] ?? '';

    if (empty($fecha)) {
        exit("Fecha inválida");
    }

    $usuario_id = $_SESSION['id_usuario'];

    // Borrar solo si el mensaje fue enviado por este usuario
    $sql = "DELETE FROM mensajes WHERE sender_id = ? AND fecha = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("is", $usuario_id, $fecha);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Error al eliminar";
    }

    $stmt->close();
    $conexion->close();
}
?>
