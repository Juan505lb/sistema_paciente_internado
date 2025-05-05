<?php
session_start();
include '../../conexion/conexion.php';

if (isset($_POST['actualizar'])) {
    $id = $_POST['id']; // ID del usuario a actualizar
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $id_cargo = $_POST['id_cargo'];

    // Si el campo contraseña está vacío, no se actualiza
    if (!empty($_POST['contraseña'])) {
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET nombre = ?, usuario = ?, contraseña = ?, email = ?, id_cargo = ? WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssii", $nombre, $usuario, $contraseña, $email, $id_cargo, $id);
    } else {
        $sql = "UPDATE usuarios SET nombre = ?, usuario = ?, email = ?, id_cargo = ? WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssii", $nombre, $usuario, $email, $id_cargo, $id);
    }

    if ($stmt->execute()) {
        // Verificar si hay foto de perfil cargada
        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
            // Ruta donde se guardará la foto
            $nombre_temporal = $_FILES['foto_perfil']['tmp_name'];
            $nombre_final = "../../img/" . $id . "_user.png"; // misma convención que el alta

            // Mover el archivo cargado al directorio deseado
            if (move_uploaded_file($nombre_temporal, $nombre_final)) {
                $_SESSION['mensaje'] = "Usuario y foto de perfil actualizados correctamente";
            } else {
                $_SESSION['mensaje'] = "Usuario actualizado, pero no se pudo cargar la foto de perfil";
            }
        } else {
            $_SESSION['mensaje'] = "Usuario actualizado correctamente";
        }

        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el usuario";
        $_SESSION['icono'] = "error";
    }

    header("Location: ../../vista/lista_usuario.php");
    exit();
}
?>
