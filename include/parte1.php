<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../index.php");
    exit();
}

$pagina_actual = basename($_SERVER['PHP_SELF']);
$es_inicio = $pagina_actual == 'index.php';
$es_internado = in_array($pagina_actual, ['lista_internado.php', 'nuevo_internado.php', 'editar_internado.php', 'ver_internado.php']);
$es_alta = in_array($pagina_actual, ['lista_alta.php']);
$es_medico = in_array($pagina_actual, ['lista_detalle_medico.php', 'editar_detalle_medico.php', 'ver_detalle_medico.php']);
$es_usuario = in_array($pagina_actual, ['lista_usuario.php', 'nuevo_usuario.php', 'editar_usuario.php', 'eliminar_usuario.php']);
$es_cargo = in_array($pagina_actual, ['lista_cargo.php', 'nuevo_cargo.php', 'editar_cargo.php', 'eliminar_cargo.php']);
$es_perfil = in_array($pagina_actual, ['mi_perfil.php']);
$es_chat = in_array($pagina_actual, ['chat.php']);
$es_ajuste = ($es_usuario || $es_cargo || $es_perfil || $es_chat);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sidebar vertical</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../chat_js/chat.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: auto;
            display: flex;
            flex-direction: row;
        }

        .sidebar {
            background-color: #6c757d;
            width: 215px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Espacio entre menú y usuario */
        }

        .sidebar .nav-link {
            color: white !important;
            border-radius: 0;
            padding: 15px;
        }

        .sidebar .nav-link.active {
            background-color: white !important;
            color: #6c757d !important;
        }

        .user-info {
            height: 55px;
            background-color: rgb(193, 215, 230);
            padding: 0px;
            color: white;
            text-align: center;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: right;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info i {
            font-size: 1.3rem;
            margin-right: 10px;
        }
        @media (min-width: 991.98px) {
            .menu{
                display:none;
            }
        }
        @media (max-width: 991.98px) {
            body {
                flex-direction: column;
            }
            .menu{
                height: 50px;
                border: none;
                width: 100%;
                min-height: auto;
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
                display:none;
                /* ocultar por defecto */
                flex-direction: column;
            }

        }
    </style>
</head>

<body>
<button class="menu bg-secondary" type="button" id="toggleSidebar">
    <i class="fa fa-bars"></i>
</button>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div>
            <h4 class="text-white text-center py-3">
                <img src="../img/logo.png" alt="Logo"
                    style="border-radius:50%;width: 40px; height: 40px; margin-right: 8px; vertical-align: middle;">
            </h4>

            <hr style="background-color: aliceblue;">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active text-light bg-secondary' : '' ?>"
                href="index.php">
                <i class="fas fa-home"></i><strong> Inicio</strong>
            </a>

            <a class="nav-link <?= $es_internado ? 'active text-light bg-secondary' : '' ?>" href="lista_internado.php">
                <i class="fas fa-procedures"></i> Lista de Internado
            </a>

            <a class="nav-link <?= $es_alta ? 'active text-light bg-secondary' : '' ?>" href="lista_alta.php">
                <i class="fas fa-file-medical"></i> Lista de Alta
            </a>

            <a class="nav-link <?= $es_medico ? 'active text-light bg-secondary' : '' ?>"
                href="lista_detalle_medico.php">
                <i class="fas fa-stethoscope"></i> Planilla Médico
            </a>
            <div class="nav-item">
                <a class="nav-link dropdown-toggle text-white <?= $es_ajuste ? 'bg-secondary' : '' ?>" href="#"
                    id="submenuAjuste" data-toggle="collapse" data-target="#submenuAjusteCollapse"
                    aria-expanded="<?= $es_ajuste ? 'true' : 'false' ?>">
                    <i class="fas fa-cogs"></i> Ajuste
                </a>
                <div class="collapse <?= $es_ajuste ? 'show' : '' ?>" id="submenuAjusteCollapse">
                    <a class="nav-link pl-4 text-white <?= $es_usuario ? 'active text-light bg-secondary' : '' ?>"
                        href="lista_usuario.php">
                        <i class="fas fa-users-cog"></i> Usuarios
                    </a>
                    <a class="nav-link pl-4 text-white <?= $es_cargo ? 'active text-light bg-secondary' : '' ?>"
                        href="lista_cargo.php">
                        <i class="fas fa-id-badge"></i> Cargo
                    </a>
                    <a class="nav-link pl-4 text-white <?= $es_perfil ? 'active text-light bg-secondary' : '' ?>"
                        href="mi_perfil.php">
                        <i class="fas fa-user-circle fa-lg"></i> Mi perfil
                    </a>
                    <a class="nav-link pl-4 text-white <?= $es_chat ? 'active text-light bg-secondary' : '' ?>"
                        href="chat.php">
                        <i class="fas fa-comment fa-lg"></i> Chat
                    </a>
                </div>
            </div>

            <a class="nav-link bg_danger" href="../login/cerrar_sesion.php">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesion
            </a>
        </div>
    </nav>