<?php
    require 'partials/header.html';
    require 'partials/conexion.php';
    session_start();

    if(empty($_SESSION['id_usuario']))
    {
        header('Location: index.php');
    }


    $id = '';
    $nombre_apellido = '';
    $hash = '';

    if(isset($_GET['hash']) && isset($_GET['mail']))
    {
        $mail_usuario = $_GET['mail'];
        $hash = $_GET['hash'];
        
        $sql="SELECT * FROM usuarios WHERE mail = '$mail_usuario' AND hash = '$hash'";
        $resultado=mysqli_query($conexion,$sql);
        while($filas = mysqli_fetch_array($resultado))
        {
            $id = $filas['id'];
            $nombre_apellido = $filas['nombre_apellido'];
            $planta = $filas['planta'];
            $sector = $filas['sector'];
        }
    }
?>
        <main id="container-aprobar-cliente">
            <div class="mensaje">
                <h1>Verificación y Aprobación de Usuarios</h1>
                <h2>Datos del usuario</h3>
                <hr>
                <form id="from-aprobar-usuario" method="POST">                 
                    <div class="container-datos-usuario">                 
                        <p>id: <?=$id?></p><br>   
                        <p>Nombre y apellido: <?=$nombre_apellido?></p><br>
                        <p>Planta: <?=$planta?></p><br>
                        <p>Sector: <?=$sector?></p><br>
                        <span>Mail: </span>
                        <input class="textbox-verificacion-usuario" type="text" id="mail-usuario" value="<?=$mail_usuario?>" require disabled>
                        <span>Hash: </span>
                        <input class="textbox-verificacion-usuario" type="text" id="hash-usuario" value="<?=$hash?>" require disabled>
                    </div>  
                    <select class="selectlist-permisos" id="select-sector">
                        <option value="" disabled selected>Sector</option>
                        <option value="todos">Todos</option>
                    <?php
                        $sql="SELECT * FROM sector";
                        $resultado=mysqli_query($conexion,$sql);
                        while($filas = mysqli_fetch_array($resultado))
                        {
                            echo '<option value="'.$filas['nombre'].'">'.$filas['nombre'].'</option>';
                        }   
                        mysqli_close($conexion); 
                    ?>
                    </select>
                    <select class="selectlist-permisos" id="select-permisos">
                        <option value="" disabled selected>Permisos</option>
                        <option value="estandar">Estandar</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <input class="btn-acceder" type="submit" value="Aprobar Cuenta">
                </form>
            </div>
        </main>
    </body>
    <script src="assets/plugins/jquery-3.5.1.min.js"></script>
    <script src="assets/plugins/sweetalert2.all.min.js"></script>
    <script src="assets/scripts/aprobar_usuario.js"></script>
 </html>
