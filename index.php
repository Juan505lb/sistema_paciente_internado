<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      background: white;
      border-radius: 15px;
      padding: 40px;
      width: 350px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
      transform-style: preserve-3d;
      perspective: 1000px;
      transition: transform 0.5s;
    }

    .login-card:hover {
      transform: rotateY(5deg) rotateX(5deg);
    }

    .login-title {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
      color: #2a5298;
    }

    .btn-login {
      background-color: #2a5298;
      color: white;
    }

    .btn-login:hover {
      background-color: #1e3c72;
    }
  </style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-danger text-center" role="alert" style="position: absolute; top: 20px; width: 300px;">' 
         . $_SESSION['mensaje'] . 
         '</div>';
    unset($_SESSION['mensaje']); // Limpia el mensaje después de mostrarlo
}
?>

  <form action="login/login.php" method="POST" class="login-card">
    <h3 class="login-title">Iniciar Sesión</h3>
    <hr>
    <div class="form-group">
      <label for="usuario"><i class="fa fa-user text-primary"></i> Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <div class="form-group">
      <label for="contraseña"><i class="fa fa-key text-warning"></i> Contraseña</label>
      <input type="password" class="form-control" id="contraseña" name="contraseña" required>
    </div>
    <button type="submit" class="btn btn-login btn-block">Ingresar</button>
  </form>

</body>
</html>
