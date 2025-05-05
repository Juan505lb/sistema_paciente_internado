<?php
session_start(); // Al principio

include "../../conexion/conexion.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Recoger datos del formulario
    $nombre = strtoupper(mysqli_real_escape_string($conexion, $_POST['nombre']));
    $apellido = strtoupper(mysqli_real_escape_string($conexion, $_POST['apellido']));
    $cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);
    $fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
    $archivo = mysqli_real_escape_string($conexion, $_POST['archivo']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $pais = mysqli_real_escape_string($conexion, $_POST['pais']);
    $responsable = mysqli_real_escape_string($conexion, $_POST['responsable']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $sala = mysqli_real_escape_string($conexion, $_POST['sala']);
    $fecha_ingreso = mysqli_real_escape_string($conexion, $_POST['fecha_ingreso']);
    $fecha_egreso = mysqli_real_escape_string($conexion, $_POST['fecha_egreso']);
    $observacion = mysqli_real_escape_string($conexion, $_POST['observacion']);



    // Ejecutar actualización
    $sql = "UPDATE pacientes SET 
        nombre = ?, apellido = ?, cedula = ?, fecha_nacimiento = ?, archivo = ?, 
        direccion = ?, telefono = ?, pais = ?, responsable = ?, estado = ?, sala=?, fecha_ingreso = ?, fecha_egreso = ?, observacion = ?
        WHERE id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssssssssi", 
        $nombre, $apellido, $cedula, $fecha_nacimiento, $archivo,
        $direccion, $telefono, $pais, $responsable, $estado, $sala,
        $fecha_ingreso, $fecha_egreso, $observacion, $id
    );

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Paciente actualizado correctamente";
        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el paciente";
        $_SESSION['icono'] = "error";
    }

    header("Location: ../../vista/editar_internado.php?id=$id");
    exit();
}
?>
