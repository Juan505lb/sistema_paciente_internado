<div class="user-info">
    <div style="height:100%;" class="col-9 d-flex flex-row" id="usuarios-online-body">
    </div>
    <div style="height:100%;" class="col-1 d-flex align-items-center text-rigth?">
        <!-- Ícono de mensajes -->
        <a href="chat.php"
            style="color:red; display:inline-flex; align-items:center; font-size:12px; text-decoration:none; position:relative;"
            id="notificacion">
            <i class="fas fa-comment fa-lg text-white"></i>
            <span id="badge"
                style="display:none; background:red; color:white; font-size:10px; border-radius:50%; padding:2px 6px; position:absolute; top:-5px; right:-10px;"></span>
        </a>

        <!-- Sonido de notificación -->
        <audio id="sonidoMensaje">
            <source src="../audio/notificacion.mp3" type="audio/mpeg">
        </audio>

    </div>
    <div style="height:100%; background-color:#ccc;" class="col-2 d-flex align-items-center">
        <img src="../img/<?= $_SESSION['id_usuario'] ?>_user.png" alt="Foto de perfil" class="rounded-circle shadow"
            style="width: 50px; height: 50px; object-fit: cover; border: 4px solid #fff;">
        <small><strong><a href="#" class="text-white"><?php echo $_SESSION['nombre']; ?></a></strong></small>
    </div>
</div>