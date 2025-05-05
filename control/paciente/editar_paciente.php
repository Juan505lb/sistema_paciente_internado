<?php
// Conexión a la base de datos
include "../conexion/conexion.php";

// Obtener el ID del paciente desde la URL
$id = $_GET['id'];

// Consultar los datos del paciente
$query = "SELECT 
    pacientes.*, 
    detalle_medico.diagnostico, 
    detalle_medico.judicial,
    detalle_medico.ficha,
    usuarios.nombre AS nombre_usuario
FROM pacientes
LEFT JOIN detalle_medico ON pacientes.id = detalle_medico.id_paciente
LEFT JOIN usuarios ON pacientes.id_usuario = usuarios.id_usuario
WHERE pacientes.id = ?
";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$paciente = $resultado->fetch_assoc();

// Calcular edad
$fecha_nacimiento = new DateTime($paciente['fecha_nacimiento']);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento)->y;
?>