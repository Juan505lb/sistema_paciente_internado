<?php
include "../../conexion/conexion.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json'); // <-- Asegura que la respuesta es JSON

// Obtener detalle de los usuarios en línea
$sqlUsuarios = "SELECT id_usuario, nombre
                FROM usuarios
                WHERE estado = 'online'";
$resultadoUsuarios = $conexion->query($sqlUsuarios);

$usuarios = [];
if ($resultadoUsuarios->num_rows > 0) {
    while ($row = $resultadoUsuarios->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

// Solo devolvemos el array de usuarios
echo json_encode($usuarios);

$conexion->close();
?>
