<?php 
include '../include/parte1.php';
include '../control/paciente/lista_internado.php';
include '../control/paciente/lista_alta.php';
include '../control/paciente/lista_judicial.php';
include '../control/paciente/total_paciente.php';

?>
<!-- Contenido principal -->
<div class="container-fluid p-0">

<?php include '../include/header.php';?>

  <div class="p-3">
<h1 class="text-center"><strong>Bienvenido al sistema - <?=  $_SESSION['nombre'] ?> </strong></h1>
<hr>
<div class="row">
<div class="col-lg-3 col-md-6 mb-4">
    <div class="card shadow-sm border-0 bg-primary text-white">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <?php
                $contador_de_paciente = 0;
                if (!empty($pacientes)) {
                    foreach ($pacientes as $registros_dato) {
                        $contador_de_paciente++;
                    }
                }
                ?>
                <h3 class="card-title mb-0"><?php echo $contador_de_paciente; ?></h3>
                <p class="card-text"><strong>INTERNADO</strong></p>
            </div>
            <i class="fas fa-procedures fa-3x"></i>
        </div>
        <div class="card-footer bg-transparent border-0">
            <a href="lista_internado.php" class="text-white d-flex justify-content-between align-items-center text-decoration-none">
                <span>Más detalle</span>
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">
    <div class="card shadow-sm border-0 bg-warning text-white">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <?php
                $contador_de_paciente = 0;
                if (!empty($judicial)) {
                    foreach ($judicial as $registros_dato) {
                        $contador_de_paciente++;
                    }
                }
                ?>
                <h3 class="card-title mb-0"><?php echo $contador_de_paciente; ?></h3>
                <p class="card-text"><strong>JUDICIAL</strong></p>
            </div>
            <i class="fas fa-gavel fa-3x"></i>
        </div>
        <div class="card-footer bg-transparent border-0">
            <a href="lista_internado.php" class="text-white d-flex justify-content-between align-items-center text-decoration-none">
                <span>Más detalle</span>
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
    <div class="card shadow-sm border-0 bg-success text-white">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <?php
                $contador_de_paciente = 0;
                if (!empty($alta)) {
                    foreach ($alta as $registros_dato) {
                        $contador_de_paciente++;
                    }
                }
                ?>
                <h3 class="card-title mb-0"><?php echo $contador_de_paciente; ?></h3>
                <p class="card-text"><strong>ALTA</strong></p>
            </div>
            <i class="fas fa-file-medical fa-3x"></i>
        </div>
        <div class="card-footer bg-transparent border-0">
            <a href="lista_alta.php" class="text-white d-flex justify-content-between align-items-center text-decoration-none">
                <span>Más detalle</span>
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
    <div class="card shadow-sm border-0 bg-danger text-white">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <?php
                $contador_de_paciente = 0;
                if (!empty($total)) {
                    foreach ($total as $registros_dato) {
                        $contador_de_paciente++;
                    }
                }
                ?>
                <h3 class="card-title mb-0"><?php echo $contador_de_paciente; ?></h3>
                <p class="card-text">TOTAL REGISTRO</p>
            </div>
            <i class="fas fa-users fa-3x"></i>
        </div>
        <div class="card-footer bg-transparent border-0">
            <a href="#" class="text-white d-flex justify-content-between align-items-center text-decoration-none">
                <span>Más detalle</span>
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
</div>
</div>
<?php include '../include/script.php'; ?>
<?php include '../include/parte2.php'; ?>