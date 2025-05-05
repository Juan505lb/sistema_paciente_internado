<?php 
include '../control/cargo/lista_cargo.php';
include '../include/mensaje.php';
include '../include/parte1.php';
include '../include/mensaje.php';

?>
<!-- Contenido principal -->
<div class="container-fluid p-0">

<?php include '../include/header.php';?>

  <div class="p-1">
<h1 class="text-center text-primary"><strong>Lista de usuario</strong></h1>
<hr>
    <table id="tablaPacientes" class="display table table-striped table-bordered table-sm">
        <thead>
            <tr class="bg-info text-white">
                <th>ID</th>
                <th>Cargo</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
        <?php
foreach ($cargo as $fila) {

    echo "<tr>
        <td>{$fila['id_cargo']}</td>
        <td>{$fila['cargo']}</td>
        <td class='text-center align-middle'>
            <div class='dropdown' style='padding: 0; margin: 0;'>
                <a href='#' class='text-dark' id='dropdownMenu{$fila['id_cargo']}' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-bars'></i>
                </a>
                <div class='dropdown-menu dropdown-menu-right p-0' aria-labelledby='dropdownMenu{$fila['id_cargo']}' style='min-width: 100px;'>
                    
                    <a class='dropdown-item small py-1 px-2' href='editar_cargo.php?id={$fila['id_cargo']}'>
                        <i class='fas fa-edit text-success mr-1'></i> Editar
                    </a>
                    <a class='dropdown-item small py-1 px-2' href='../control/cargo/eliminar.php?id={$fila['id_cargo']}' onclick='return confirm(\"¿Estás seguro de eliminar este cargo?\")'>
                        <i class='fas fa-trash-alt text-danger mr-1'></i> Eliminar
                    </a>
                </div>
            </div>
        </td>
    </tr>";
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
                text: 'Nuevo Usuario',
                action: function () {
                    window.location.href = 'nuevo_usuario.php'; // Cambiá la ruta según tu estructura
                },
                className: 'btn btn-success'
            },
            {
                "extend": 'excel',
                "text": 'Exportar a Excel',
                "title": 'Lista de cargo',
                "exportOptions": {
                    "columns": [0, 1]
                }
            },
            {
                "extend": 'pdf',
                "text": 'Exportar a PDF',
                "title": 'Lista de cargo',
                "exportOptions": {
                    "columns": [0, 1]
                }
            },
            {
                "extend": 'print',
                "text": 'Imprimir',
                "title": 'Lista de cargo',
                "exportOptions": {
                    "columns": [0, 1]
                }
            }
        ]
    });
});
</script>
<?php include '../include/parte2.php'; ?>

