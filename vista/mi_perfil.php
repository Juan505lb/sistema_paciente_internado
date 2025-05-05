<?php
include '../include/parte1.php';
include '../control/usuario/mi_perfil.php';
include '../include/mensaje.php';
?>
<!-- Contenido principal -->
<div class="container-fluid p-0">
    <?php include '../include/header.php'; ?>

    <div class="p-1 d-flex justify-content-center mt-4">
        <div class="card shadow-sm" style="width: 100%; max-width: 600px; border-radius: 10px; background-color:#e7ecef;">
            <div class="card-body text-center">
                <!-- Foto de perfil -->
                <div class="mb-3">
                    <img src="../img/<?= $usuario['id_usuario'] ?>_user.png" alt="Foto de perfil" class="rounded-circle shadow" style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #fff;">
                </div>
                
                <!-- Nombre -->
                <h3 class="mb-1"><?= htmlspecialchars($usuario['nombre']) ?></h3>
                <p class="text-muted mb-3">@<?= htmlspecialchars($usuario['usuario']) ?></p>

                <hr>

                <!-- Información adicional -->
                <div class="text-left px-3">
                    <p><strong><i class="fas fa-user text-primary"></i> Usuario:</strong> <?= htmlspecialchars($usuario['usuario']) ?></p>
                    <p><strong><i class="fas fa-envelope text-danger"></i> Email:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
                    <p><strong><i class="fa fa-user-tag text-info"></i> Cargo:</strong> <?= htmlspecialchars($usuario['cargo']) ?></p>
                </div>

                <!-- Botón cerrar sesión -->
                <div class="mt-4">
                    <a href="../login/cerrar_sesion.php" class="btn btn-primary btn-block" style="border-radius: 30px;">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php include '../include/script.php'; ?>
<?php include '../include/parte2.php'; ?>
