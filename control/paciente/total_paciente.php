<?php
include '../conexion/conexion.php';

function obtenerTotal($conexion) {
    $sql = "SELECT 
                p.id,
                CONCAT(p.nombre, ' ', p.apellido) as nombre_apellido,
                p.cedula,
                p.fecha_nacimiento,
                p.archivo,
                p.direccion,
                p.telefono,
                p.pais,
                p.responsable,
                p.estado,
                p.fecha_registro,
                p.fecha_actualizacion,
                m.judicial,
                m.ficha
            FROM 
                pacientes p
            LEFT JOIN 
                usuarios u ON p.id_usuario = u.id_usuario
            LEFT JOIN 
                detalle_medico m ON p.id = m.id_paciente ";

    $resultado = $conexion->query($sql);

    $total = [];
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $total[] = $fila;
        }
    }

    return $total;
}

$total = obtenerTotal($conexion);

?>
