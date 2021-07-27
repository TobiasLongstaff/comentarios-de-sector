<?php
    require 'partials/header.html';
    require 'partials/conexion.php';
    session_start();

    if(empty($_SESSION['id_usuario']))
    {
        header('Location: index.php');
    }


    $id = '';
    $nombre = '';
    $apellido = '';
    $cuit = '';
    $razon_socual = '';
    $hash = '';
    $correo = '';

    if(isset($_GET['hash']) && isset($_GET['mail']))
    {
        $mail_usuario = $_GET['mail'];
        $hash = $_GET['hash'];
        
        $sql="SELECT * FROM usuario WHERE mail = '$mail_usuario' AND hash = '$hash'";
        $resultado=mysqli_query($conexion,$sql);
        while($filas = mysqli_fetch_array($resultado))
        {
            $id = $filas['id'];
            $nombre = $filas['nombre'];
            $apellido = $filas['apellido'];
            $cuit = $filas['cuit'];
            $razon_socual = $filas['razon_social'];
            $correo = $filas['mail'];
            $hash = $filas['hash'];
        }
    }
?>
        <main id="contenido-aprobar-cliente">
            <div class="mensaje">
                <h1>Verificación y Aprobación de Cliente</h1>
                <form id="from-aprobar-cliente" method="POST">                 
                   <div class="contenido-datos-cliente">                 
                       <h2>Datos del cliente</h3>
                       <hr>
                       <p class="datos-cliente">id: <?=$id?></p><br>   
                       <p class="datos-cliente">Nombre: <?=$nombre?></p><br>
                       <p class="datos-cliente">Apellido: <?=$apellido?></p><br>
                       <p class="datos-cliente">Cuit: <?=$cuit?></p><br>
                       <p class="datos-cliente">Razon Social: <?=$razon_socual?></p><br>
                       <span class="datos-cliente">Mail: </span>
                       <input class="datos-verificacion-cliente" type="text" id="mail-cliente" value="<?=$correo?>" require disabled>
                       <span class="datos-cliente">Hash: </span>
                       <input class="datos-verificacion-cliente" type="text" id="hash-cliente" value="<?=$hash?>" require disabled>
                   </div>  
                   <select class="selectlist-permisos" id="selectlist-permisos">
                       <option value="editor" calss="selectlist-editor">Editor</option>
                       <option value="seguimiento" class="opcion">Seguimiento</option>
                       <option value="aprobador-comercial" class="opcion">Aprobador Comercial</option>
                       <option value="admin" class="opcion">Administrador</option>
                   </select>
                   <select class="selectlist-permisos" id="selectlist-sucursales">
                   <?php
                       $sql="SELECT * FROM clientes_establecimientos WHERE cuit = '$cuit'";
                       $resultado=mysqli_query($conexion,$sql);
                       while($filas = mysqli_fetch_array($resultado))
                       {
                           $nombre_sucursal = $filas['nombre_sucursal'];
                           echo '<option value="'.$nombre_sucursal.'">'.$nombre_sucursal.'</option>';
                       }    
                   ?>
                   </select>
                   <select class="selectlist-permisos" id="selectlist-tipo">
                       <option value="carniceria">Carniceria</option>
                       <option value="gastronomia">Gastronomia</option>
                   </select>
                   <input class="btn-ingresar btn-aprobar-cuenta" type="submit" value="Aprobar Cuenta">
                </form>
                <div class="conteiner-img-aprobacion">
                    <img src="assets/img/frigopico.png" class="img-frigo-pico-aprobacion" alt="">
                    <img src="assets/img/ohrapampa.png" class="img-ohrapampa-aprobacion" alt="">                    
                </div>  
            </div>
        </main>
    </body>
    <script src="assets/plugins/jquery-3.5.1.min.js"></script>
    <script src="assets/plugins/sweetalert2.all.min.js"></script>
    <script src="assets/scripts/aprobar_usuario.js"></script>
 </html>
