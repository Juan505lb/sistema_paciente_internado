<?php
session_start();
include "../../conexion/conexion.php"; // Ajusta el path si necesitas

if (!isset($_SESSION['id_usuario'])) {
    exit("Debes iniciar sesión");
}

$sender_id = $_SESSION['id_usuario'];
$receptor_id = isset($_POST['receptor_id']) ? intval($_POST['receptor_id']) : 0;
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

if ($receptor_id > 0 && !empty($mensaje)) {
    $mensaje = mysqli_real_escape_string($conexion, $mensaje);

    $sql = "INSERT INTO mensajes (sender_id, receiver_id, mensaje, fecha) 
            VALUES ($sender_id, $receptor_id, '$mensaje', NOW())";

    if ($conexion->query($sql)) {
        echo "Mensaje enviado";
    } else {
        echo "Error al enviar mensaje: " . $conexion->error;
    }
} else {
    echo "Datos inválidos";
}
?>
