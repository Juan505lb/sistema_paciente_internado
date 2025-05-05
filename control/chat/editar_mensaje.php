<?php
session_start();
include "../../conexion/conexion.php";

if (!isset($_SESSION['id_usuario'])) {
    exit("Debes iniciar sesión");
}

$usuario_id = $_SESSION['id_usuario'];

// Recibir datos por POST
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';

// Validar
if (empty($fecha) || empty($mensaje)) {
    exit("Datos incompletos");
}

// Actualizar solo si el mensaje pertenece al usuario
$sql = "UPDATE mensajes 
        SET mensaje = ?, fecha = NOW()
        WHERE sender_id = ? AND fecha = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sis", $mensaje, $usuario_id, $fecha);

if ($stmt->execute()) {
    echo "OK"; // Todo salió bien
} else {
    echo "Error al actualizar el mensaje";
}

$stmt->close();
$conexion->close();
?>
