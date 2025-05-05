<?php 
include '../include/parte1.php';
include '../control/paciente/lista_detalle_medico.php';
include '../include/mensaje.php';
?>
<!-- Contenido principal -->
<div class="container-fluid p-0">

<?php include '../include/header.php';?>

  <div class="p-1">
<h1 class="text-center text-primary"><strong>Planilla de medico</strong></h1>
<hr>
    <table id="tablaPacientes" class="display table table-striped table-bordered table-sm">
        <thead>
            <tr class="bg-info text-white">
                <th>Nº</th>
                <th>Nombre y apellido</th>
                <th>Cédula</th>
                <th>Fecha Nacimiento</th>
                <th>Edad</th>
                <th>Archivo</th>
                <th>F. Ing</th>
                <th>Dx</th>
                <th>Judicial</th>
                <th>Ficha</th>
                <th>Sala</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
        <?php
$contador = 1; // Empezamos desde 1
foreach ($pacientes as $fila) {

    $color = ($fila['judicial'] === 'judicial') ? 'orange' : 'inherit';

    // Color de fondo para sala
    if ($fila['sala'] === 'clinica') {
        $colorSala = 'violet'; // lila
    } elseif ($fila['sala'] === 'seguridad') {
        $colorSala = 'red';
    } else {
        $colorSala = 'inherit';
    }

    // Color de fondo para estado
if ($fila['estado_m'] === 'alta') {
    $colorAlta = 'green';
} elseif ($fila['estado_m'] === 'permiso') {
    $colorAlta = 'yellow';
} else {
    $colorAlta = 'inherit';
}

    echo "<tr>
        <td>{$contador}</td>
        <td style='background-color: $colorAlta'>{$fila['nombre_apellido']}</td>
        <td>{$fila['cedula']}</td>
        <td>{$fila['fecha_nacimiento']}</td>
        <td>{$fila['edad']}</td>
        <td>{$fila['archivo']}</td>
        <td>{$fila['fecha_ingreso']}</td>
        <td>{$fila['diagnostico']}</td>
        <td style='background-color: $color'>{$fila['judicial']}</td>
        <td>{$fila['ficha']}</td>
        <td style='background-color: $colorSala'>{$fila['sala']}</td>
        <td class='text-center align-middle'>
            <div class='dropdown' style='padding: 0; margin: 0;'>
                <a href='#' class='text-dark' id='dropdownMenu{$fila['id']}' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-bars'></i>
                </a>
                <div class='dropdown-menu dropdown-menu-right p-0' aria-labelledby='dropdownMenu{$fila['id']}' style='min-width: 100px;'>
                    <a class='dropdown-item small py-1 px-2' href='ver_detalle_medico.php?id={$fila['id_detalle']}'>
                        <i class='fas fa-eye text-primary mr-1'></i> Ver
                    </a>
                    <a class='dropdown-item small py-1 px-2' href='editar_detalle_medico.php?id={$fila['id_detalle']}'>
                        <i class='fas fa-edit text-success mr-1'></i> Editar
                    </a>
                    <a class='dropdown-item small py-1 px-2' href='eliminar.php?id={$fila['id']}' onclick='return confirm(\"¿Estás seguro de eliminar este paciente?\")'>
                        <i class='fas fa-trash-alt text-danger mr-1'></i> Eliminar
                    </a>
                </div>
            </div>
        </td>
    </tr>";

    $contador++;
}
?>


        </tbody>
    </table>
</div>
</div>
<?php include '../include/script.php'; ?>
<script>
$(document).ready(function () {
    $('#tablaPacientes').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        },
        "responsive": true,
        "pageLength": 10,
        "dom": 'Bfrtip',
        "buttons": [
            {
                "extend": 'excel',
                "text": 'Exportar a Excel',
                "exportOptions": {
                    "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
            },
            {
                "extend": 'pdf',
                "text": 'Exportar a PDF',
                "title": 'Reporte de Pacientes Internados',
                "exportOptions": {
                    "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
            },
            {
                "extend": 'print',
                "text": 'Imprimir',
                "title": 'Reporte de Pacientes Internados',
                "exportOptions": {
                    "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
            }
        ]
    });
});
</script>



<?php include '../include/parte2.php'; ?>

