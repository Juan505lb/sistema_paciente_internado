<?php
include '../include/parte1.php';
include '../control/paciente/editar_detalle_medico.php';
?>
<!-- Contenido principal -->
<div class="container-fluid p-0">

  <?php include '../include/header.php'; ?>

  <div style="background-color:#e2e5e7;" class="p-2">
      <h1 class="text-center text-info"><strong>Formulario para ver detalle medico</strong></h1>
      <hr>

      <form action="../control/paciente/p_editar_detalle_medico.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $paciente['id_detalle']; ?>">


        <div class="form-row">
          <div class="form-group col-md-4">
            <label><strong>Nombre y apellido</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary"><i class="fas fa-user"></i></span>
              </div>
              <input disabled type="text" name="nombre" class="form-control"
                value="<?php echo $paciente['nombre_apellido']; ?>" required>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label><strong>Cédula</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-success"><i class="fas fa-id-card"></i></span>
              </div>
              <input disabled type="text" class="form-control" value="<?php echo $paciente['cedula']; ?>" required>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label><strong>Fecha de nacimiento</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-warning"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control" value="<?php echo $paciente['fecha_nacimiento']; ?>" disabled>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label><strong>Edad</strong></label>
            <input type="text" class="form-control" value="<?php echo $edad; ?>" disabled>
          </div>
          <div class="form-group col-md-4">
            <label><strong>Archivo</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-danger"><i class="fas fa-folder"></i></span>
              </div>
              <input type="text" class="form-control" value="<?php echo $paciente['archivo']; ?>" disabled>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label><strong>Estado</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary"><i class="fas fa-hospital-alt"></i></span>
              </div>
              <select name="estado" class="form-control">
                <option value="">Seleccione estado</option>
                <option value="internado" <?php if ($paciente['estado'] == 'internado')
                  echo 'selected'; ?>>Internado
                </option>
                <option value="alta" <?php if ($paciente['estado'] == 'alta')
                  echo 'selected'; ?>>Alta</option>
                <option value="permiso" <?php if ($paciente['estado'] == 'permiso')
                  echo 'selected'; ?>>Permiso</option>

              </select>
            </div>

          </div>
          <div class="form-group col-md-4">
            <label><strong>Fecha de ingreso</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-warning"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control" value="<?php echo $paciente['fecha_ingreso']; ?>" disabled>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label><strong>Sala</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-info"><i class="fas fa-procedures"></i></span>
              </div>
              <select name="sala" class="form-control">
                <option value="">Seleccione</option>
                <option value="colectiva" <?php if ($paciente['sala'] == 'colectiva')
                  echo 'selected'; ?>>Colectiva
                </option>
                <option value="clinica" <?php if ($paciente['sala'] == 'clinica')
                  echo 'selected'; ?>>Clínica</option>
                <option value="seguridad" <?php if ($paciente['sala'] == 'seguridad')
                  echo 'selected'; ?>>Seguridad
                </option>
              </select>
            </div>

          </div>
          <div class="form-group col-md-4">
            <label><strong>Judicial</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-warning"><i class="fas fa-gavel"></i></span>
              </div>
              <select name="judicial" class="form-control">
                <option value="">Seleccione</option>
                <option value="judicial" <?php if ($paciente['judicial'] == 'judicial')
                  echo 'selected'; ?>>Judicial
                </option>
                <option value="no judicial" <?php if ($paciente['judicial'] == 'no judicial')
                  echo 'selected'; ?>>No
                  judicial</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label><strong>Fecha de informe judicial</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-warning"><i class="fas fa-gavel"></i></span>
              </div>
              <input type="date" name="fecha_inf_judicial" class="form-control"
                value="<?php echo $paciente['fecha_inf_judicial']; ?>">
            </div>
          </div>
          <div class="form-group col-md-4">
            <label><strong>Ficha</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary"><i class="fas fa-file-medical"></i></span>
              </div>
              <input type="text" class="form-control" name="ficha" value="<?php echo $paciente['ficha']; ?>">
            </div>
          </div>

          <div class="form-group col-md-4">
            <label><strong>Diagnóstico</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-info"><i class="fas fa-notes-medical"></i></span>
              </div>
              <input type="text" class="form-control" name="diagnostico"
                value="<?php echo $paciente['diagnostico']; ?>">
            </div>
          </div>

          <div class="form-group col-md-4">
            <label><strong>Deposito</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary"><i class="fas fa-syringe"></i></span>
              </div>
              <input type="text" class="form-control" name="deposito" value="<?php echo $paciente['deposito']; ?>">
            </div>
          </div>

          <div class="form-group col-md-4">
            <label><strong>Observacion</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-warning"><i class="fas fa-sticky-note"></i></span>
              </div>
              <input type="text" class="form-control" name="obs" value="<?php echo $paciente['obs']; ?>">
            </div>
          </div>
          <div class="form-group col-md-4">
            <label><strong>Registrado por</strong></label>
            <input type="text" class="form-control" value="<?php echo $paciente['nombre_usuario']; ?>" disabled>
          </div>
          <div class="form-group col-md-4">
            <label><strong>Fecha registro</strong></label>
            <input type="date" class="form-control" value="<?php echo $paciente['fecha_registro']; ?>" disabled>
          </div>
          <div class="col-12 text-right" style="margin-bottom:10px;">
            <a class="btn btn-danger mt-3" href="lista_detalle_medico.php">Volver</a>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php include '../include/script.php'; ?>
<?php include '../include/parte2.php'; ?>