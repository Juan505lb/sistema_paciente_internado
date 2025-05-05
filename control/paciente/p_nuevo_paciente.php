<?php
session_start();
// Conexión a la base de datos
include '../../conexion/conexion.php';

// Validar y limpiar los datos recibidos
$nombre = strtoupper(trim($_POST['nombre']));
$apellido = strtoupper(trim($_POST['apellido']));
$cedula = trim($_POST['cedula']);
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$archivo = trim($_POST['archivo']);
$direccion = strtoupper(trim($_POST['direccion']));
$telefono = trim($_POST['telefono']);
$pais = strtoupper(trim($_POST['pais']));
$responsable = strtoupper(trim($_POST['responsable']));
$id_usuario = $_SESSION['id_usuario'];
$estado = $_POST['estado'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$sala = $_POST['sala'];


// Fecha actual para ambos campos
$fecha_actualizacion = date('Y-m-d');
$fecha_registro = date('Y-m-d'); // Nueva fecha para 'fecha_registro'

// Insertar datos en la tabla `pacientes`
$sql = "INSERT INTO pacientes 
(nombre, apellido, cedula, fecha_nacimiento, archivo, direccion, telefono, pais, responsable, id_usuario, estado, fecha_ingreso, sala, fecha_registro, fecha_actualizacion)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param(
    "sssssssssisssss",
    $nombre,
    $apellido,
    $cedula,
    $fecha_nacimiento,
    $archivo,
    $direccion,
    $telefono,
    $pais,
    $responsable,
    $id_usuario,
    $estado,
    $fecha_ingreso,
    $sala,
    $fecha_registro,
    $fecha_actualizacion
);

if ($stmt->execute()) {
    $id_paciente = $conexion->insert_id; // 🆗 obtener ID del paciente registrado

    // Insertar en detalle_medico
    $sql_detalle = "INSERT INTO detalle_medico (id_paciente) VALUES (?)";
    $stmt_detalle = $conexion->prepare($sql_detalle);
    $stmt_detalle->bind_param("i", $id_paciente);

    if ($stmt_detalle->execute()) {
        $_SESSION['mensaje'] = "Paciente registrado correctamente";
        $_SESSION['icono'] = "success";
    }

    $stmt_detalle->close();
} else {
    $_SESSION['mensaje'] = "Error al registrar el paciente: " . $stmt->error;
    $_SESSION['icono'] = "error";
}


$stmt->close();
$conexion->close();



header("Location: ../../vista/lista_internado.php");
exit();
?>
