<?php
include '../conexion/conexion.php';

function obtenerUsuario($conexion) {
    $sql = "SELECT 
                u.id_usuario,
                u.nombre,
                u.usuario,
                u.email,
                c.cargo
            FROM 
                usuarios u
            LEFT JOIN 
                cargo c ON u.id_cargo = c.id_cargo";

    $resultado = $conexion->query($sql);

    $usuario = [];
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            
            $usuario[] = $fila;
        }
    }

    return $usuario;
}

$usuario = obtenerUsuario($conexion);

?>
