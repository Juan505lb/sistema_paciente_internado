<?php
include '../include/parte1.php';
include '../control/usuario/editar_usuario.php';
?>

<!-- Contenido principal -->
<div class="container-fluid p-0">

  <?php include '../include/header.php'; ?>

  <div class="p-3">
    <h1 class="text-center text-info"><strong>Editar usuario</strong></h1>
    <hr>

    <div class="mb-3 text-center">
      <img src="../img/<?= $usuario['id_usuario'] ?>_user.png" alt="Foto de perfil" class="rounded-circle shadow"
        style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #fff;">
    </div>

    <form action="../control/usuario/p_editar_usuario.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $usuario['id_usuario']; ?>">

  <div class="form-row">
    <div class="form-group col-md-6 col-sm-12">
      <label><strong>Nombre completo</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-primary"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
      </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
      <label><strong>Usuario</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-info"><i class="fas fa-user-tag"></i></span>
        </div>
        <input type="text" name="usuario" class="form-control" value="<?php echo $usuario['usuario']; ?>" required>
      </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
      <label><strong>Nueva Contraseña</strong> (opcional)</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-danger"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" name="contraseña" class="form-control">
      </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
      <label><strong>Email</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-secondary"><i class="fas fa-id-badge"></i></span>
        </div>
        <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>">
      </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
      <label><strong>Cargo</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text text-success"><i class="fas fa-briefcase"></i></span>
        </div>
        <select name="id_cargo" class="form-control" required>
          <option value="">Seleccione...</option>
          <?php
          while ($row = mysqli_fetch_assoc($cargos)) {
            $selected = ($row['id_cargo'] == $usuario['id_cargo']) ? 'selected' : '';
            echo "<option value='" . $row['id_cargo'] . "' $selected>" . $row['cargo'] . "</option>";
          }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
      <label for="foto_perfil"><strong>Foto de Perfil</strong></label>
      <div class="custom-file">
        <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil">
        <label class="custom-file-label" for="foto_perfil"><?= $usuario['id_usuario'] ?>_user.png</label>
      </div>
    </div>

    <div class="form-group col-12 text-right">
      <button type="submit" name="actualizar" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
      <a class="btn btn-secondary" href="lista_usuario.php">Cancelar</a>
    </div>
  </div>
</form>

  </div>
</div>

<?php include '../include/script.php'; ?>
<script>
  // manelo foto pefil
  document.querySelector('.custom-file-input').addEventListener('change', function (e) {
    var fileName = document.getElementById("foto_perfil").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName;
  });
</script>
<?php include '../include/parte2.php'; ?>