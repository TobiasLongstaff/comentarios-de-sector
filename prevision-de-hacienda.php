<?php

    session_start();
    require 'partials/header.html';

    if(empty($_SESSION['id_usuario']) or $_SESSION['tipo_usuario'] != 'hacienda')
    {
        header('Location: index.php');
    }

    date_default_timezone_set('America/Buenos_Aires');
    $fecha_actual = date('Y-m-d'); 
?>
    <div class="container-alerta">
        <i class="uil uil-exclamation-triangle"></i>
        <label id="text-alerta">Error</label>
    </div>
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
                <button class="btn-nav">
                    <i class="uil uil-comment-alt-slash"></i>
                </button>
            </a>  
            <?php
                if($_SESSION['tipo_usuario'] == 'hacienda')
                {
            ?>
                    <a href="prevision-de-hacienda.php">
                        <button class="btn-nav nav-select">
                            <i class="fas fa-horse-head"></i>
                        </button>
                    </a>  
            <?php
                }
            ?>
            <a href="perfil.php">
                <button class="btn-nav">
                    <i class="uil uil-user-circle"></i>
                </button>
            </a>       
        </nav>

        <div class="container-btn-prevision" style="--delay: .2s">
            <button id="ver-prevision" class="btn-general-prevision btn-prevision-left prevision-select">Ver</button>
            <button id="agregar-prevision" class="btn-general-prevision btn-prevision-right">Agregar</button>
        </div>
        <div id="prevision-de-hacienda" class="container-ver-prevision">
            
        </div>
        <div id="agregar-prevision-de-hacienda" class="container-agregar-prevision">
            <h2 class="titulo-crear-comentario">Crear Comentario</h2>
            <form method="POST" id="form-crear-prevision-de-hacienda">
                <div class="form-group">
                    <input type="date" id="pre-fecha" class="form-style-date" value="<?=$fecha_actual?>" autocomplete="off" required>
                </div>   
                <div class="form-group">
                    <input id="pre-apellido" class="form-style" autocomplete="off" placeholder="Apellido" required>
                    <i class="input-icon uil uil-chart-pie-alt"></i>
                </div>
                <div class="form-group">
                    <input id="pre-cantidad" class="form-style textbox-kg" placeholder="Cantidad" autocomplete="off" required>
                    <i class="input-icon uil uil-balance-scale"></i>
                </div>
                <div class="container-btn-comentario">
                    <input type="submit" class="btn-enviar-comentario" value="Enviar">
                    <button type="button" id="btn-cancelar-comentario" class="btn-cancelar-comentario">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/scripts/prevision-de-hacienda.js"></script>
</html>
        