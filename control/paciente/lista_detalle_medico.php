<?php
include '../conexion/conexion.php';

function obtenerDetalle($conexion) {
    $sql = "SELECT 
                p.id,
                CONCAT(p.nombre, ' ', p.apellido) as nombre_apellido,
                p.cedula,
                p.fecha_nacimiento,
                p.archivo,
                p.fecha_ingreso,
                m.diagnostico,
                m.estado as estado_m,
                m.sala,
                m.judicial,
                m.fecha_inf_judicial,
                m.ficha,
                m.deposito,
                m.id as id_detalle
            FROM 
                detalle_medico m
            LEFT JOIN 
                pacientes p ON m.id_paciente = p.id
            LEFT JOIN 
                usuarios u ON p.id_usuario = u.id_usuario
            
            WHERE m.id_paciente AND p.estado = 'internado'";

    $resultado = $conexion->query($sql);

    $pacientes = [];
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

            $pacientes[] = $fila;
        }
    }

    return $pacientes;
}

$pacientes = obtenerDetalle($conexion);

?>
