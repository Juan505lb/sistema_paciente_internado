<!-- jQuery y Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- DataTables JS y Bootstrap integration -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<!-- DataTables Buttons JS -->
<script type="text/javascript" charset="utf8"src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>

<!-- Librerías para exportación -->
<script type="text/javascript" charset="utf8"src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.53/build/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.53/build/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8"src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
    $('.nav-link').on('click', function () {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
</script>

<script>
// ID del usuario logueado
var currentUserId = <?php echo json_encode($_SESSION['id_usuario']); ?>;

function cargarUsuariosOnline() {
    $.ajax({
        url: '../control/usuario/usuario_en_linea.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            var containerBody = $('#usuarios-online-body'); // Solo este contenedor
            
            containerBody.empty(); // Limpia el contenedor

            if (data.length > 0) {
                var hayOtrosUsuarios = false; // para saber si no hay nadie más

                data.forEach(function(user) {
                    if (user.id_usuario != currentUserId) { // <<<<< ESTA LINEA AGREGA EL FILTRO
                        hayOtrosUsuarios = true;
                        containerBody.append(
                            '<div class="d-flex flex-column align-items-center mx-2">' +
                                '<img src="../img/' + user.id_usuario + '_user.png" alt="Profile Icon" class="perfil-icon" style="width: 30px; height: 30px; border-radius: 50%;">' +
                                '<a style="text-decoration:none; color:#fff;" href="chat.php">' + user.nombre + '</a>' +
                            '</div>'
                        );
                    }
                });

                if (!hayOtrosUsuarios) {
                    containerBody.append('<div>No hay otros usuarios en línea</div>');
                }
            } else {
                containerBody.append('<div>No hay usuarios en línea</div>');
            }
        }
    });
}

$(document).ready(function() {
    cargarUsuariosOnline(); // Llama una vez al cargar
    setInterval(cargarUsuariosOnline, 5000); // Actualiza cada 5 segundos
});



$(document).ready(function() {
    cargarUsuariosOnline(); // Llama una vez al cargar
    setInterval(cargarUsuariosOnline, 5000); // Actualiza cada 5 segundos
});

    // cerrar sesion 
    let tiempoInactividad = 10 * 60 * 1000; // 10 minutos

    let temporizador = setTimeout(cerrarSesion, tiempoInactividad);

    function reiniciarTemporizador() {
        clearTimeout(temporizador);
        temporizador = setTimeout(cerrarSesion, tiempoInactividad);
    }

    function cerrarSesion() {
        // Redirige a cerrar_sesion.php para destruir la sesión
        window.location.href = "../login/cerrar_sesion.php";
    }

    // Detecta cualquier movimiento del mouse, tecla o clic para reiniciar el temporizador
    document.addEventListener("mousemove", reiniciarTemporizador);
    document.addEventListener("keydown", reiniciarTemporizador);
    document.addEventListener("click", reiniciarTemporizador);

</script>
<script>
  document.getElementById('toggleSidebar').addEventListener('click', function () {
    var sidebar = document.getElementById('sidebar');
    if (sidebar.style.display === 'none' || sidebar.style.display === '') {
      sidebar.style.display = 'flex';
    } else {
      sidebar.style.display = 'none';
    }
  });

  // Mostrar automáticamente el sidebar en pantallas grandes
  function ajustarSidebar() {
    var anchoPantalla = window.innerWidth;
    var sidebar = document.getElementById('sidebar');
    if (anchoPantalla > 991.98) {
      sidebar.style.display = 'flex';
    } else {
      sidebar.style.display = 'none';
    }
  }

  window.addEventListener('resize', ajustarSidebar);
  window.addEventListener('load', ajustarSidebar);
</script>
