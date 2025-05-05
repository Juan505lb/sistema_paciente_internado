<?php 
include '../include/parte1.php';
include '../control/paciente/editar_paciente.php';
?>

<!-- Contenido principal -->
<div class="container-fluid p-0">

<?php include '../include/header.php';?>

  <div style="background-color:#e2e5e7;" class="p-2">
<h1 class="text-center text-info"><strong>Ver datos del paciente</strong></h1>
<hr>

<form  action="#" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">


  <div class="form-row">
    <div class="form-group col-md-4">
      <label><strong>Nombre</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-primary"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="nombre" class="form-control" value="<?php echo $paciente['nombre']; ?>" required>
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>Apellido</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-info"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="apellido" class="form-control" value="<?php echo $paciente['apellido']; ?>" required>
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>Cédula</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-success"><i class="fas fa-id-card"></i></span>
        </div>
        <input type="text" name="cedula" class="form-control" value="<?php echo $paciente['cedula']; ?>" required>
      </div>
    </div>

    <div class="form-group col-md-4">
      <label><strong>Fecha de nacimiento</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-warning"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $paciente['fecha_nacimiento']; ?>">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>Edad</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-secondary"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="edad" class="form-control" value="<?php echo $edad; ?>" disabled>
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>Archivo</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-danger"><i class="fas fa-folder"></i></span>
        </div>
        <input type="text" name="archivo" class="form-control" value="<?php echo $paciente['archivo']; ?>">
      </div>
    </div>

    <div class="form-group col-md-4">
      <label><strong>Dirección</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-secondary"><i class="fas fa-map-marker-alt"></i></span>
        </div>
        <input type="text" name="direccion" class="form-control" value="<?php echo $paciente['direccion']; ?>">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>Teléfono</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-info"><i class="fas fa-phone"></i></span>
        </div>
        <input type="text" name="telefono" class="form-control" value="<?php echo $paciente['telefono']; ?>">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>País</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-success"><i class="fas fa-flag"></i></span>
        </div>
        <input type="text" name="pais" class="form-control" value="<?php echo $paciente['pais']; ?>">
      </div>
    </div>

    <div class="form-group col-md-4">
      <label><strong>Responsable</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-danger"><i class="fas fa-user-shield"></i></span>
        </div>
        <input type="text" name="responsable" class="form-control" value="<?php echo $paciente['responsable']; ?>">
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
        <option value="internado" <?php if ($paciente['estado'] == 'internado') echo 'selected'; ?>>Internado</option>
        <option value="alta" <?php if ($paciente['estado'] == 'alta') echo 'selected'; ?>>Alta</option>
      </select>
      </div>
      
    </div>
    <div class="form-group col-md-4">
      <label><strong>Fecha de ingreso</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-warning"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $paciente['fecha_ingreso']; ?>">
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
        <option value="colectiva" <?php if ($paciente['sala'] == 'colectiva') echo 'selected'; ?>>Colectiva</option>
        <option value="clinica" <?php if ($paciente['sala'] == 'clinica') echo 'selected'; ?>>Clínica</option>
        <option value="seguridad" <?php if ($paciente['sala'] == 'seguridad') echo 'selected'; ?>>Seguridad</option>
      </select>
      </div>
      
    </div>
    <div class="form-group col-md-4">
      <label><strong>Judicial</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-warning"><i class="fas fa-gavel"></i></span>
        </div>
        <input type="text" class="form-control" value="<?php echo $paciente['judicial']; ?>">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>Ficha</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-primary"><i class="fas fa-file-medical"></i></span>
        </div>
        <input type="text" class="form-control" value="<?php echo $paciente['ficha']; ?>">
      </div>
    </div>

    <div class="form-group col-md-4">
      <label><strong>Diagnóstico</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-info"><i class="fas fa-notes-medical"></i></span>
        </div>
        <input type="text" class="form-control" value="<?php echo $paciente['diagnostico']; ?>">
      </div>
    </div>

    <div class="form-group col-md-4">
      <label><strong>Fecha de egreso</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-warning"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="date" class="form-control" name="fecha_egreso" value="<?php echo $paciente['fecha_egreso']; ?>">
      </div>
    </div>

    <div class="form-group col-md-4">
      <label><strong>Dia internacion</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-success"><i class="fas fa-calendar-day"></i></span>
        </div>
        <input type="text" class="form-control" value="<?php echo $paciente['dia_internacion']; ?>">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label><strong>Observacion</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-warning"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control" name="observacion" value="<?php echo $paciente['observacion']; ?>">
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
    <div class="col-12 text-right" style="margin-bottom: 10px;">
    <a class="btn btn-danger mt-3" href="lista_internado.php">Volver</a>
  </div>
</div>
 
</form>
</div>
</div>
</div>
<?php include '../include/script.php'; ?>
<?php include '../include/parte2.php'; ?>