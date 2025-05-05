<?php 
session_start();
include '../../conexion/conexion.php';

if (isset($_POST['registrar'])) {
  $nombre = $_POST['nombre'];
  $usuario = $_POST['usuario'];
  $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
  $email = $_POST['email'];
  $id_cargo = $_POST['id_cargo'];

  // Primero insertamos sin la foto
  $sql = "INSERT INTO usuarios (nombre, usuario, contraseña, email, id_cargo)
          VALUES (?, ?, ?, ?, ?)";

  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("ssssi", $nombre, $usuario, $contraseña, $email, $id_cargo);

  if ($stmt->execute()) {
    $id_nuevo_usuario = $stmt->insert_id;

    // Verificar si se subió una imagen
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
      $foto_perfil = $id_nuevo_usuario . "_user.png"; // Nombre final: id_user.png
      $ruta_imagen = "../../img/" . $foto_perfil;

      if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ruta_imagen)) {
        // Guardar el nombre de la imagen en la BD
        $sql_update = "UPDATE usuarios SET foto_perfil = ? WHERE id_usuario = ?";
        $stmt_update = $conexion->prepare($sql_update);
        $stmt_update->bind_param("si", $foto_perfil, $id_nuevo_usuario);
        $stmt_update->execute();
        $stmt_update->close();
      }
    }

    $_SESSION['mensaje'] = "Usuario registrado correctamente";
    $_SESSION['icono'] = "success";
  } else {
    $_SESSION['mensaje'] = "Error al registrar el usuario";
    $_SESSION['icono'] = "error";
  }

  $stmt->close();
  header("Location: ../../vista/lista_usuario.php");
  exit();
}
?>
