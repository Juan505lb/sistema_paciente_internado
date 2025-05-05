<?php
include '../conexion/conexion.php';

function obtenerCargo($conexion) {
    $sql = "SELECT * FROM cargo";
    $resultado = $conexion->query($sql);

    $cargo = [];
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            
            $cargo[] = $fila;
        }
    }

    return $cargo;
}

$cargo = obtenerCargo($conexion);

?>
