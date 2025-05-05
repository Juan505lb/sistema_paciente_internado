<?php
include '../include/parte1.php';
?>
<!-- Contenido principal -->
<div class="container-fluid p-0">

    <?php include '../include/header.php'; ?>

    <div class="p-3">
            <h1 class="text-center text-info"><strong>Registrar nuevo paciente</strong></h1>
            <hr>

            <form action="../control/paciente/p_nuevo_paciente.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label><strong>Nombre</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-primary"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>Apellido</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-info"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>Cédula</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-success"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="text" name="cedula" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Segunda fila -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label><strong>Fecha de nacimiento</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-warning"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="fecha_nacimiento" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>Archivo</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger"><i class="fas fa-folder"></i></span>
                            </div>
                            <input type="text" name="archivo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>Dirección</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-secondary"><i
                                        class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" name="direccion" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Tercera fila -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label><strong>Teléfono</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-info"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="telefono" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>País</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-success"><i class="fas fa-flag"></i></span>
                            </div>
                            <input type="text" name="pais" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>Responsable</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-danger"><i class="fas fa-user-shield"></i></span>
                            </div>
                            <input type="text" name="responsable" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Cuarta fila -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label><strong>Estado</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-warning"><i class="fas fa-heartbeat"></i></span>
                            </div>
                            <select name="estado" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="internado">Internado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>Fecha de ingreso</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-primary"><i class="fas fa-calendar-plus"></i></span>
                            </div>
                            <input type="date" name="fecha_ingreso" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label><strong>Sala</strong></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-dark"><i class="fas fa-procedures"></i></span>
                            </div>
                            <select name="sala" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="colectiva">Colectiva</option>
                                <option value="clinica">Clínica</option>
                                <option value="seguridad">Seguridad</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 text-right" style="margi-bottom:10px;">

                        <?php if (in_array($_SESSION['id_cargo'], [1, 2, 3])): ?>
                            <button type="submit" name="registrar" class="btn btn-success">
                                <i class="fas fa-save"></i> Registrar
                            </button>
                        <?php endif; ?>

                        <a class="btn btn-secondary" href="lista_internado.php"> Volver</a>

                    </div>
                </div>
            </form>
        </div>
</div>
<?php include '../include/script.php'; ?>
<?php include '../include/parte2.php'; ?>