<?php
include '../../conexion/conexion.php'; // Ajustá la ruta si es necesario
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar los datos
    $id = intval($_POST['id']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $sala = mysqli_real_escape_string($conexion, $_POST['sala']);
    $judicial = mysqli_real_escape_string($conexion, $_POST['judicial']);
    $fecha_inf_judicial = mysqli_real_escape_string($conexion, $_POST['fecha_inf_judicial']);
    $ficha = mysqli_real_escape_string($conexion, $_POST['ficha']);
    $diagnostico = mysqli_real_escape_string($conexion, $_POST['diagnostico']);
    $deposito = mysqli_real_escape_string($conexion, $_POST['deposito']);
    $obs = mysqli_real_escape_string($conexion, $_POST['obs']);


    // Preparar la consulta
    $sql = "UPDATE detalle_medico 
            SET estado = ?, sala = ?, judicial = ?, fecha_inf_judicial = ?, ficha = ?, 
                diagnostico = ?, deposito = ?, obs = ?
            WHERE id = ?";

    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmt->bind_param(
        "ssssssssi", 
        $estado, $sala, $judicial, $fecha_inf_judicial, $ficha,
        $diagnostico, $deposito, $obs, $id
    );

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Detalle medico actualizado correctamente";
        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el paciente";
        $_SESSION['icono'] = "error";
    }

    header("Location: ../../vista/lista_detalle_medico.php");
    exit();
}
?>
