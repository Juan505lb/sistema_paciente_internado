<?php
include '../conexion/conexion.php';

// Obtener el ID del paciente desde la URL
$id = $_GET['id'];

    $sql = "SELECT 
                p.id,
                CONCAT(p.nombre, ' ', p.apellido) as nombre_apellido,
                p.cedula,
                p.fecha_nacimiento,
                p.archivo,
                p.fecha_ingreso,
                p.direccion,
                u.nombre as nombre_usuario,
                p.fecha_registro,
                p.fecha_actualizacion,
                m.diagnostico,
                m.estado,
                m.sala,
                m.judicial,
                m.fecha_inf_judicial,
                m.ficha,
                m.deposito,
                m.obs,
                m.id as id_detalle
            FROM 
                detalle_medico m
            LEFT JOIN 
                pacientes p ON m.id_paciente = p.id
            LEFT JOIN 
                usuarios u ON p.id_usuario = u.id_usuario
            WHERE m.id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id); // "i" para entero
    $stmt->execute();
    $resultado = $stmt->get_result();
    $paciente = $resultado->fetch_assoc();

   
        
    
// Calcular edad
$fecha_nacimiento = new DateTime($paciente['fecha_nacimiento']);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento)->y;

?>
