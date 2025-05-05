<?php
include '../include/parte1.php';
?>
<!-- Contenido principal -->
<div class="container-fluid p-0">

  <?php include '../include/header.php'; ?>

  <div class="p-3">
      <h1 class="text-center text-info"><strong>Nuevo usuario</strong></h1>
      <hr>

      <form action="../control/usuario/p_nuevo_usuario.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <!-- Nombre completo -->
    <div class="form-group col-md-6 col-12">
      <label><strong>Nombre completo</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-primary"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="nombre" class="form-control text-uppercase" required>
      </div>
    </div>

    <!-- Usuario -->
    <div class="form-group col-md-6 col-12">
      <label><strong>Usuario</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-info"><i class="fas fa-user-tag"></i></span>
        </div>
        <input type="text" name="usuario" class="form-control text-lowercase" required>
      </div>
    </div>

    <!-- Contraseña -->
    <div class="form-group col-md-6 col-12">
      <label><strong>Contraseña</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-danger"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" name="contraseña" class="form-control" required>
      </div>
    </div>

    <!-- Email -->
    <div class="form-group col-md-6 col-12">
      <label><strong>Email</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-secondary"><i class="fas fa-envelope"></i></span>
        </div>
        <input type="email" name="email" class="form-control text-lowercase">
      </div>
    </div>

    <!-- Cargo -->
    <div class="form-group col-md-6 col-12">
      <label><strong>Cargo</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-success"><i class="fas fa-briefcase"></i></span>
        </div>
        <select name="id_cargo" class="form-control" required>
          <option value="">Seleccione...</option>
          <?php
          include '../conexion/conexion.php';
          $result = mysqli_query($conexion, "SELECT id_cargo, cargo FROM cargo");
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_cargo'] . "'>" . $row['cargo'] . "</option>";
          }
          ?>
        </select>
      </div>
    </div>

    <!-- Foto de perfil -->
    <div class="form-group col-md-6 col-12">
      <label><strong>Foto de perfil</strong></label>
      <div class="custom-file">
        <input type="file" name="foto_perfil" class="custom-file-input" id="fotoPerfil" accept="image/*" required>
        <label class="custom-file-label" for="fotoPerfil">Elegir imagen</label>
      </div>
    </div>

    <!-- Botones -->
    <div class="col-12 text-right mt-3">
      <?php if (in_array($_SESSION['id_cargo'], [1, 2, 3])): ?>
        <button type="submit" name="registrar" class="btn btn-success">
          <i class="fas fa-save"></i> Registrar
        </button>
      <?php endif; ?>
      <a class="btn btn-secondary" href="lista_usuario.php">Cerrar</a>
    </div>
  </div>
</form>

    </div>
  </div>
<?php include '../include/script.php'; ?>
<script>
  document.querySelector('.custom-file-input').addEventListener('change', function (e) {
    var fileName = e.target.files[0].name;
    var label = e.target.nextElementSibling;
    label.innerText = fileName;
  });
</script>

<?php include '../include/parte2.php'; ?>