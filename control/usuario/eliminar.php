<?php
session_start();
include '../../conexion/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Usuario eliminado correctamente";
        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el usuario";
        $_SESSION['icono'] = "error";
    }

    $stmt->close();
    $conexion->close();

    header("Location: ../../vista/lista_usuario.php");
    exit();
} else {
    $_SESSION['mensaje'] = "ID no proporcionado";
    $_SESSION['icono'] = "error";
    header("Location: ../../vista/lista_usuario.php");
    exit();
}
?>
