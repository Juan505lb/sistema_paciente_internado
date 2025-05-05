<?php
include '../conexion/conexion.php';

// Validar y asegurar que id es numérico
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = intval($_GET['id']);

    // Obtener datos del usuario
    $sql = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        die("Usuario no encontrado.");
    }

    // Obtener cargos
    $cargos = mysqli_query($conexion, "SELECT id_cargo, cargo FROM cargo");
} else {
    die("ID inválido.");
}
?>
