<?php
session_start();
include "../../conexion/conexion.php";

if (!isset($_SESSION['id_usuario'])) {
  exit("Debes iniciar sesión");
}

$emisor_id = $_SESSION['id_usuario'];
$receptor_id = isset($_GET['usuario_id']) ? intval($_GET['usuario_id']) : 0;

if ($receptor_id <= 0) {
  exit("Usuario receptor no válido");
}

$sql = "SELECT sender_id, mensaje, fecha, leido 
        FROM mensajes 
        WHERE (sender_id = ? AND receiver_id = ?)
           OR (sender_id = ? AND receiver_id = ?)
        ORDER BY fecha DESC";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("iiii", $emisor_id, $receptor_id, $receptor_id, $emisor_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
  $es_mio = $row['sender_id'] == $emisor_id;
  $alinear = $es_mio ? 'text-right' : 'text-left';

  echo '<div class="mb-2 ' . $alinear . '" id="mensaje-' . $row['fecha'] . '">';
  echo '<div class="p-2 rounded" style="background-color:rgb(221, 217, 217); display: inline-block; position: relative;">';

  // Si es mi mensaje, muestro botón desplegable
  if ($es_mio) {
    echo '<div class="dropdown" style="position:relative; top:2px; right:2px;">';
    echo '  <button style="margin-left:5px;" class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton-' . $row['fecha'] . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0px 5px; font-size: 14px;">⋮</button>';
    echo '  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-' . $row['fecha'] . '">';
    echo '    <a class="dropdown-item btn-editar-mensaje" href="#" data-fecha="' . htmlspecialchars($row['fecha']) . '" data-mensaje="' . htmlspecialchars($row['mensaje'], ENT_QUOTES) . '">Editar</a>';
    echo '    <a class="dropdown-item btn-eliminar-mensaje" href="#" data-fecha="' . $row['fecha'] . '">Eliminar</a>';
    echo '  </div>';
    echo '</div>';
  }

  echo '<span id="mensaje-texto-' . $row['fecha'] . '">' . htmlspecialchars($row['mensaje']) . '</span>';

  // Hora y palomilla
  $hora = date('H:i', strtotime($row['fecha']));
  echo '<div class="text-muted small">';
  echo $hora;
  if ($es_mio) {
    echo $row['leido'] ? ' <span style="color: #4fc3f7;">&#10003;&#10003;</span>' : ' <span style="color: #999;">&#10003;</span>';
  }
  echo '</div>';

  echo '</div>';
  echo '</div>';
}

if ($result->num_rows === 0) {
  echo '<div class="text-center text-muted">No hay mensajes aún</div>';
}

$stmt->close();
$conexion->close();
?>
