<div class="container-activos-del-dia">
    <nav>
        <a href="index.php">
            <button class="btn-nav nav-select">
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
            <button class="btn-nav">
                <i class="uil uil-user-circle"></i>
            </button>
        </a>      
    </nav>
    <div id="comentarios-del-dia" class="container-comentarios-del-dia">
    </div>   
</div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/scripts/activos-del-dia.js"></script>
</html>
