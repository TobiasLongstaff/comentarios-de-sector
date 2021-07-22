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
            <button class="btn-nav nav-select">
                <i class="uil uil-comment-alt-plus"></i>
            </button>
        </a>
        <a href="">
            <button class="btn-nav">
                <i class="uil uil-comment-alt-slash"></i>
            </button>
        </a>  
        <a href="">
            <button class="btn-nav">
                <i class="uil uil-user-circle"></i>
            </button>
        </a>       
    </nav>
    <div class="container-comentarios-del-dia">
        <div class="container-comentario" style="--delay: .1s">
        
        </div>
    </div>   
</div>