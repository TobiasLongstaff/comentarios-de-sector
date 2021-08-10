<?php

    session_start();
    require 'partials/header.html';

    if(empty($_SESSION['id_usuario']))
    {
        header('Location: index.php');
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
            <button class="btn-nav">
                <i class="uil uil-comment-alt-slash"></i>
            </button>
        </a>  
        <?php
            if($_SESSION['tipo_usuario'] == 'hacienda' || $_SESSION['tipo_usuario'] == 'admin')
            {
        ?>
                <a href="prevision-de-hacienda.php">
                    <button class="btn-nav">
                        <i class="fas fa-horse-head"></i>
                    </button>
                </a>  
        <?php
            }
        ?>
        <a href="perfil.php">
            <button class="btn-nav nav-select">
                <i class="uil uil-user-circle"></i>
            </button>
        </a>       
    </nav>
    <div class="container-perfil">
        <div class="container-info-usuario" style="--delay: .1s">
            <div class="container-info-perfil">
                <div>
                    <i class="container-icono uil uil-user-circle"></i>
                </div>
                <div>
                    <label>Usuario: <?=$_SESSION['nombre_usuario']?></label><br>
                    <label>E-mail: <?=$_SESSION['mail_usuario']?></label><br>
                    <label>Sector: <?=$_SESSION['sector_usuario']?></label>             
                </div>                
            </div>
            <a href="cerrarsesion.php">
                <button type="button" class="btn-acceder">Cerrar sesion</button>
            </a>
            <?php 
                if($_SESSION['tipo_usuario'] == 'admin')
                {
            ?>
                <a href="opciones-de-administrador.php">
                    <button type="button" class="btn-cancelar-comentario">Opciones de administrador</button>
                </a>
            <?php
                }
            ?>
        </div>
    </div>
</div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/scripts/cerrar-comentario.js"></script>
</html>