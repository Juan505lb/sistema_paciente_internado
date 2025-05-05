<?php
include '../conexion/conexion.php';

function obtenerJudicial($conexion) {
    $sql = "SELECT 
    p.id, p.nombre, p.apellido, p.cedula, p.estado, dm.judicial
FROM 
    pacientes p
LEFT JOIN 
    detalle_medico dm ON p.id = dm.id_paciente
WHERE 
    TRIM(LOWER(dm.judicial)) = 'judicial' AND p.estado = 'internado';
";

    $resultado = $conexion->query($sql);

    $judicial = [];
    if ($resultado && $resultado->num_rows > 0) {
        $judicial = $resultado->fetch_all(MYSQLI_ASSOC);
    }

    return $judicial;
}

$judicial = obtenerJudicial($conexion);

?>
