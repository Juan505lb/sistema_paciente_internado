<?php
session_start();
include "../../conexion/conexion.php"; // Ajusta el path si es necesario

if (!isset($_SESSION['id_usuario'])) {
    exit("Debes iniciar sesión");
}

$emisor_id = $_SESSION['id_usuario'];
$receptor_id = isset($_GET['usuario_id']) ? intval($_GET['usuario_id']) : 0;

if ($receptor_id > 0) {
    // Marcar como leído los mensajes que el receptor me envió y que aún no fueron leídos
    $sql = "UPDATE mensajes 
            SET leido = 1 
            WHERE sender_id = $receptor_id AND receiver_id = $emisor_id AND leido = 0";

    $conexion->query($sql);
}
?>
