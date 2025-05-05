let receptorId = 0;
let mensajeInterval = null;

function cargarUsuarios() {
    fetch('../control/chat/usuarios_online.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('listaUsuarios').innerHTML = data;

        // si ya hay un receptor seleccionado, vuelvo a resaltarlo
      if (receptorId > 0) {
        activarUsuario(receptorId);
      }
    });
}

function abrirChat(idUsuario, nombreUsuario) {
    receptorId = idUsuario;
    document.getElementById('nombre').textContent = nombreUsuario;
    cargarMensajes();
    
    if (mensajeInterval) {
        clearInterval(mensajeInterval);
    }
    mensajeInterval = setInterval(cargarMensajes, 3000);
}



function activarUsuario(idUsuario) {
    // Quitar la clase activa de todos
    const usuarios = document.querySelectorAll('.usuario-item');
    usuarios.forEach(u => u.classList.remove('active'));

    // Agregar la clase activa al seleccionado
    const usuarioSeleccionado = document.getElementById('usuario_' + idUsuario);
    if (usuarioSeleccionado) {
        usuarioSeleccionado.classList.add('active');
    }
}

function cargarMensajes() {
    if (receptorId > 0) {
        fetch('../control/chat/cargar_mensajes.php?usuario_id=' + receptorId)
        .then(response => response.text())
        .then(data => {
            document.getElementById('mensajes').innerHTML = data;
            marcarLeido();
        });
    }
}


function marcarLeido() {
    if (receptorId > 0) {
        fetch('../control/chat/marcar_leido.php?usuario_id=' + receptorId);
    }
}

