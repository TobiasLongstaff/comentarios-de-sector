<?php

    session_start();
    require 'partials/header.html';

    if(empty($_SESSION['id_usuario']))
    {
        header('Location: index.php');
    }

    date_default_timezone_set('America/Buenos_Aires');
    $fecha_actual = date('Y-m-d'); 
?>
    <div class="container-alerta">
        <i class="uil uil-exclamation-triangle"></i>
        <label id="text-alerta">Error: Lorem, ipsum dolor 404</label>
    </div>
    <div class="container-activos-del-dia">
        <nav>
            <a href="index.php">
                <button class="btn-nav">
                    <i class="uil uil-clock-three"></i>
                </button>
            </a>
            <a href="agregar-comentario.php">
                <button class="btn-nav nav-select">
                    <i class="uil uil-comment-alt-plus"></i>
                </button>
            </a>
            <a href="cerrar-comentario.php">
                <button class="btn-nav">
                    <i class="uil uil-comment-alt-slash"></i>
                </button>
            </a>  
            <a href="perfil.php">
                <button class="btn-nav">
                    <i class="uil uil-user-circle"></i>
                </button>
            </a>       
        </nav>
        <div class="container-comentarios-del-dia">
            <div class="container-agregar-comentarios" style="--delay: .1s">
                <h2 class="titulo-crear-comentario">Crear Comentario</h2>
                <form method="POST" id="form-crear-comentario">
                    <div class="form-group">
                        <input type="date" id="com-fecha" class="form-style-date" value="<?=$fecha_actual?>" autocomplete="off" required>
                    </div> 
                    <div class="form-group">
                        <input type="time" id="com-hora" class="form-style-date" autocomplete="off" required>
                    </div>       
                    <div class="form-group">
                        <select id="com-sector" class="form-style-selectlist" autocomplete="off" required>
                        </select>
                        <i class="input-icon uil uil-chart-pie-alt"></i>
                    </div>    
                    <div class="form-group">
                        <select id="com-motivo" class="form-style-selectlist" autocomplete="off" required>
                        </select>
                        <i class="input-icon uil uil-exclamation-octagon"></i>
                    </div>    
                    <div class="container-text-comentario">
                        <label>Comentario</label>
                        <i class="uil uil-envelope-alt"></i>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" cols="0" id="com-comentario" class="form-style-textarea" required></textarea>
                    </div>
                    <div class="container-btn-comentario">
                        <input type="submit" class="btn-enviar-comentario" value="Enviar">
                        <button type="button" id="btn-cancelar-comentario" class="btn-cancelar-comentario">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>   
    </div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/scripts/crear-comentario.js"></script>
</html>