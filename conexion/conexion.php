<?php
$host = "localhost";       // o la IP de tu servidor MySQL
$usuario = "root";         // tu usuario de MySQL
$contraseña = "";          // tu contraseña de MySQL
$base_datos = "db_internado";  // nombre de tu base de datos

$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
