<?php
session_start();
include "../conexion/conexion.php"; // Archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar entradas
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

    // Buscar el usuario
    $sql = "SELECT u.id_usuario, u.nombre, u.usuario, u.contraseña, u.id_cargo, c.cargo, u.estado
    FROM usuarios u
    LEFT JOIN cargo c ON u.id_cargo = c.id_cargo
    WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($contraseña, $row['contraseña'])) {
            // Iniciar sesión
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['id_cargo'] = $row['id_cargo'];
            $_SESSION['cargo'] = $row['cargo'];
            $_SESSION['estado'] = $row['estado'];

            // Poner el estado como "online"
            $conexion->query("UPDATE usuarios SET estado = 'online' WHERE id_usuario = " . $row['id_usuario']);

            $stmt->close();
            $conexion->close();

            // Redirigir al index
            header("Location: ../vista/index.php");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['mensaje'] = "Contraseña incorrecta";
            $_SESSION['icono'] = "error";
            $stmt->close();
            $conexion->close();
            header("Location: ../index.php");
            exit();
        }
    } else {
        // Usuario no encontrado
        $_SESSION['mensaje'] = "Usuario inexistente";
        $_SESSION['icono'] = "error";
        $stmt->close();
        $conexion->close();
        header("Location: ../index.php");
        exit();
    }
}
?>
