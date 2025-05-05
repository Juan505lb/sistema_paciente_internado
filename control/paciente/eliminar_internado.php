<?php
session_start();
include '../../conexion/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pacientes WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Paciente eliminado correctamente";
        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el paciente";
        $_SESSION['icono'] = "error";
    }

    $stmt->close();
    $conexion->close();

    header("Location: ../../vista/lista_internado.php");
    exit();
} else {
    $_SESSION['mensaje'] = "ID no proporcionado";
    $_SESSION['icono'] = "error";
    header("Location: ../../vista/lista_internado.php");
    exit();
}
?>
