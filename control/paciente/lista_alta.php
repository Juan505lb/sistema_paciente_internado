<?php
include '../conexion/conexion.php';

function obtenerAlta($conexion) {
    $sql = "SELECT 
                p.id,
                CONCAT(p.nombre, ' ', p.apellido) as nombre_apellido,
                p.cedula,
                p.fecha_nacimiento,
                p.fecha_ingreso,
                p.archivo,
                p.direccion,
                p.telefono,
                p.pais,
                p.responsable,
                p.estado,
                p.fecha_egreso,
                p.dia_internacion,
                p.observacion,
                p.fecha_registro,
                p.fecha_actualizacion,
                p.sala,
                m.judicial,
                m.ficha
            FROM 
                pacientes p
            LEFT JOIN 
                usuarios u ON p.id_usuario = u.id_usuario
            LEFT JOIN 
                detalle_medico m ON p.id = m.id_paciente
            WHERE p.estado != 'internado'
            ORDER BY p.fecha_egreso DESC";

    $resultado = $conexion->query($sql);

    $alta = [];
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            // Calcular la edad
            $fecha_nac = new DateTime($fila['fecha_nacimiento']);
            $fecha_actual = new DateTime();
            $edad = $fecha_nac->diff($fecha_actual);
            
            // Agregar la edad al array de pacientes
            $fila['edad'] = $edad->y;

            // Formatear la fecha de nacimiento a 'd/m/Y'
            $fecha_formateada = $fecha_nac->format('d/m/Y');
            $fila['fecha_nacimiento_formateada'] = $fecha_formateada;

            $alta[] = $fila;
        }
    }

    return $alta;
}

$alta = obtenerAlta($conexion);

?>
