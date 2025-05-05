<?php
include '../include/parte1.php';
include '../include/mensaje.php';
?>
<style>
  .usuario-item.active {
    background-color: rgb(154, 181, 202);
    border-radius: 8px;
    padding: 5px;
  }
</style>

<!-- Contenido principal -->
<div class="container-fluid p-0">

  <?php include '../include/header.php'; ?>

  <h1 class="text-center text-primary"><strong>Sala de chat</strong></h1>
  <hr>
  <div class="p-3">

  <div class="row">
  <!-- Contactos -->
  <div class="col-md-3 col-12 mb-3 mb-md-0">
    <div class="bg-info text-white rounded-top p-2">
      <h5 class="m-0" style="font-size: 24px;"><strong>Contacto</strong></h5>
    </div>
    <div class="border bg-white p-2" style="max-height: 250px; overflow-y: auto;" id="listaUsuarios"></div>
  </div>

  <!-- Chat -->
  <div class="col-md-9 col-12">
    <!-- Encabezado -->
    <div class="bg-secondary text-white rounded-top p-2 d-flex align-items-center" style="font-size: 24px;">
      <i class="fa fa-user mr-2" id="nombre"></i>
    </div>

    <!-- Mensajes -->
    <div id="mensajes" class="border bg-white p-3 mb-3" style="max-height: 200px; overflow-y: auto;"></div>

    <!-- Input -->
    <div class="input-group">
      <input type="text" id="mensaje" class="form-control" placeholder="Escribir mensaje...">
      <div class="input-group-append">
        <button id="boton-enviar" class="btn btn-primary" onclick="enviarMensaje()">Enviar</button>
      </div>
    </div>
  </div>
</div>


    </div>
  </div>
<?php include '../include/script.php'; ?>


<script>
let mensajesPrevios = 0;
let usuarioInteractuo = false;

// Registrar que el usuario interactuó con la página
document.addEventListener("click", () => {
  usuarioInteractuo = true;
});

function verificarMensajes() {
  fetch('../control/chat/notificacion.php')
    .then(res => res.json())
    .then(data => {
      if (data.no_leidos !== undefined) {
        const badge = document.getElementById('badge');
        const sonido = document.getElementById('sonidoMensaje');

        if (data.no_leidos > 0) {
          badge.style.display = 'inline-block';
          badge.textContent = data.no_leidos;

          // Solo reproducir sonido si hubo nueva notificación y el usuario ya interactuó
          if (data.no_leidos > mensajesPrevios && usuarioInteractuo) {
            sonido.play().catch(err => {
              console.log("El navegador bloqueó el sonido:", err);
            });
          }
        } else {
          badge.style.display = 'none';
        }

        mensajesPrevios = data.no_leidos;
      }
    });
}

// Llamar a la función de verificación periódicamente
setInterval(verificarMensajes, 10000);
verificarMensajes();
</script>



<script>
  document.addEventListener('DOMContentLoaded', function () {
    let contenedorMensajes = document.getElementById('mensajes');

    contenedorMensajes.addEventListener('click', async function (e) {
      if (e.target.classList.contains('btn-eliminar-mensaje')) {
        e.preventDefault();
        const fecha = e.target.getAttribute('data-fecha');

        if (!confirm('¿Estás seguro de eliminar este mensaje?')) {
          return; // Si cancela, salimos rápido
        }

        // Desactivar el botón para evitar doble click
        e.target.disabled = true;

        try {
          const response = await fetch('../control/chat/eliminar_mensaje.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'fecha=' + encodeURIComponent(fecha)
          });

          const data = await response.text();

          if (data.trim() === 'OK') {
            const mensajeElement = document.getElementById('mensaje-' + fecha);
            if (mensajeElement) {
              mensajeElement.remove();
            }
          } else {
            alert('Error al eliminar: ' + data);
          }

        } catch (error) {
          console.error('Error al eliminar:', error);
          alert('Hubo un error al eliminar el mensaje.');
        } finally {
          e.target.disabled = false; // Volver a activar el botón
        }
      }
    });
  });
</script>


<script>
  let editando = false;
  let fechaEditar = null;

  // Función enviar o editar
  function enviarMensaje() {
    const mensajeInput = document.getElementById('mensaje');
    const mensaje = mensajeInput.value.trim();

    if (mensaje === '') {
      alert('Escribe un mensaje');
      return;
    }


    if (editando) {
      // Si estoy editando
      fetch('../control/chat/editar_mensaje.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'fecha=' + encodeURIComponent(fechaEditar) + '&mensaje=' + encodeURIComponent(mensaje)
      })
        .then(response => response.text())
        .then(data => {
          if (data.trim() === 'OK') {
            // Actualizar el mensaje en pantalla
            const mensajeDiv = document.getElementById('mensaje-texto-' + fechaEditar);
            if (mensajeDiv) {
              mensajeDiv.textContent = mensaje;
            }

            // Limpiar estado de edición
            mensajeInput.value = '';
            editando = false;
            fechaEditar = null;
            document.getElementById('boton-enviar').textContent = 'Enviar';
          } else {
            alert('Error al editar: ' + data);
          }
        })
        .catch(error => console.error('Error:', error));
    } else {
      // Aquí deberías tener tu código normal de enviar nuevo mensaje
      if (mensaje !== '' && receptorId > 0) {
        fetch('../control/chat/enviar_mensaje.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: 'receptor_id=' + receptorId + '&mensaje=' + encodeURIComponent(mensaje)
        })
          .then(response => response.text())
          .then(data => {
            document.getElementById('mensaje').value = '';
            cargarMensajes();

          });
      }
    }
  }

  // Al hacer click en "Editar"
  document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-editar-mensaje')) {
      e.preventDefault();
      const fecha = e.target.getAttribute('data-fecha');
      const mensaje = e.target.getAttribute('data-mensaje');

      // Rellenar el input con el mensaje a editar
      document.getElementById('mensaje').value = mensaje;

      // Cambiar estado
      editando = true;
      fechaEditar = fecha;
      document.getElementById('boton-enviar').textContent = 'Actualizar';
    }
  });

</script>
<script>
  cargarUsuarios();
  setInterval(cargarUsuarios, 50000);
</script>



<?php include '../include/parte2.php'; ?>