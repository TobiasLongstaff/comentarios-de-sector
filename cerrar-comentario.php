<?php

    session_start();
    require 'partials/header.html';

    if(empty($_SESSION['id_usuario']))
    {
        require 'login.php';
    }
?>
<div class="container-activos-del-dia">
    <nav>
        <a href="index.php">
            <button class="btn-nav">
                <i class="uil uil-clock-three"></i>
            </button>
        </a>
        <a href="agregar-comentario.php">
            <button class="btn-nav">
                <i class="uil uil-comment-alt-plus"></i>
            </button>
        </a>
        <a href="cerrar-comentario.php">
            <button class="btn-nav nav-select">
                <i class="uil uil-comment-alt-slash"></i>
            </button>
        </a>  
        <a href="perfil.php">
            <button class="btn-nav">
                <i class="uil uil-user-circle"></i>
            </button>
        </a>       
    </nav>
    <div id="cerrar-comentarios" class="container-comentarios-del-dia">
    </div>   
</div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/scripts/cerrar-comentario.js"></script>
<script src="assets/plugins/sweetalert2.all.min.js"></script>
</html>