<?php
if (isset($_SESSION['mensaje']) && isset($_SESSION['icono'])): ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: '<?php echo $_SESSION['icono']; ?>',
            title: '<?php echo $_SESSION['mensaje']; ?>',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
    <?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
endif;
?>
