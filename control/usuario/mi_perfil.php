<?php
include "../conexion/conexion.php"; // Ajustá la ruta si es necesario
// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../index.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Obtener datos del usuario
$query = "SELECT u.id_usuario, u.nombre, u.usuario, u.email, c.cargo
FROM usuarios u
 LEFT JOIN cargo c ON u.id_cargo = c.id_cargo
 WHERE id_usuario = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
?>