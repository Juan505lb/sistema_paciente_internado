<?php
session_start();
include "../../conexion/conexion.php";

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['error' => 'no_session']);
    exit;
}

$id_usuario_actual = $_SESSION['id_usuario'];

$query = "SELECT COUNT(*) as no_leidos FROM mensajes WHERE receiver_id = ? AND leido = 0";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario_actual);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode(['no_leidos' => $data['no_leidos']]);
?>
