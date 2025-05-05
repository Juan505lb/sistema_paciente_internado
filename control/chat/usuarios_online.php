<?php
session_start();
include "../../conexion/conexion.php";

if (!isset($_SESSION['id_usuario'])) {
    exit("Debes iniciar sesión");
}

$id_usuario_actual = $_SESSION['id_usuario'];

// Obtener los usuarios online (menos el usuario actual)
$sql = "SELECT id_usuario, nombre FROM usuarios WHERE id_usuario != $id_usuario_actual";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($usuario = $result->fetch_assoc()) {
        $usuario_id = $usuario['id_usuario'];
        // Escapamos comillas simples y dobles para inyectar en JS
        $usuario_name = htmlspecialchars($usuario['nombre'], ENT_QUOTES);

        echo '<div id="usuario_' . $usuario_id . '" class="d-flex align-items-center justify-content-between mb-2 usuario-item">';
        echo '  <a style="text-decoration: none;" href="#" '
            . 'onclick="abrirChat(' . $usuario_id . ', \'' . $usuario_name . '\'); activarUsuario(' . $usuario_id . ');" '
            . 'class="text-dark flex-grow-1 text-truncate">';

        echo '<img src="../img/' . $usuario_id . '_user.png" '
            . 'alt="Perfil" class="rounded-circle mr-2" style="width: 30px; height: 30px;">';

        echo '    <strong>' . $usuario_name . '</strong>';
        echo '  </a>';

        // Badge de mensajes no leídos
        $queryMensajes = "SELECT COUNT(*) as no_leidos FROM mensajes 
                          WHERE sender_id = $usuario_id 
                          AND receiver_id = $id_usuario_actual 
                          AND leido = 0";
        $resMensajes = $conexion->query($queryMensajes);
        $noLeidos = $resMensajes->fetch_assoc()['no_leidos'];

        if ($noLeidos > 0) {
            echo '<span class="badge badge-danger rounded-circle" '
                . 'style="min-width:24px;height:24px;line-height:18px;text-align:center;font-size:12px;">'
                . $noLeidos .
                '</span>';
        }
        echo '</div>';
    }
} else {
    echo '<div class="text-center text-muted">No hay otros usuarios online.</div>';
}
?>