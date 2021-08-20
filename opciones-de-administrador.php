<?php
    session_start();

    if(!$_SESSION['tipo_usuario'] == 'admin')
    {
        header('Location: index.php');
    }

    require 'partials/conexion.php';
    require 'partials/header.html';

?>
    <div class="container-btn-prevision" style="--delay: .1s">
        <button id="ver-abm" type="button" class="btn-general-prevision btn-prevision-left prevision-select">ABM</button>
        <button id="ver-permisos-de-usaurio" type="button" class="btn-general-prevision btn-prevision-right">Permisos usuarios</button>
    </div>
    <div class="container-permisos-de-usuario" id="permisos-de-usuario">
        <h1>PERMISOS DE USUARIO</h1>
        <div class="container-info-adm">
            <div class="container-tabla">
                <table class="table">
                    <thead>
                        <th class="td-id">ID</th>
                        <th>NOMBRE</th>
                        <th>MAIL</th>
                        <th>PLANTA</th>
                        <th>SECTOR</th>
                        <th>PERMISOS</th>
                        <th>CONTROLES</th>
                    </thead>
                    <tbody id="container-usuarios">
                    </tbody>
                </table>        
            </div> 
            <form method="post" id="form-actualizar-usuario" class="container-card-usuarios">
                <h2>Cambiar permiso</h2>
                <input type="hidden" id="id-usu">
                <div class="form-group">
                    <select class="form-style-selectlist" id="permisos-usu" autocomplete="off" required>
                        <option value="" disabled selected>Permiso</option>
                        <option id="op-pendiente" value="Pendiente">Pendiente</option>
                        <option id="op-estandar" value="estandar">Estandar</option>
                        <option id="op-hacienda" value="hacienda">Hacienda</option>
                        <option id="op-admin" value="admin">Administrador</option>
                    </select>
                    <i class="input-icon uil uil-lock"></i>
                </div>
                <div class="form-group">
                    <select class="form-style-selectlist" id="sector-usu" autocomplete="off" required>
                        <option value="" disabled selected>Sector</option>
                        <?php
                            $sql="SELECT * FROM sector";
                            $resultado=mysqli_query($conexion,$sql);
                            while($filas = mysqli_fetch_array($resultado))
                            {
                                $nombre = $filas['nombre'];
                                $nombre_sin_espacios = strtolower(str_replace(" ", "-", $nombre));
                                echo '<option id="op-'.$nombre_sin_espacios.'" value="'.$filas['nombre'].'">'.$filas['nombre'].'</option>';
                            }   
                        ?>
                    </select>
                    <i class="input-icon uil uil-chart-pie-alt"></i>
                </div>
                <div class="form-group">
                    <select class="form-style-selectlist" id="planta-usu" autocomplete="off" required>
                        <option value="" disabled selected>Planta</option>
                        <?php
                            $sql="SELECT * FROM frigorifico";
                            $resultado=mysqli_query($conexion,$sql);
                            while($filas = mysqli_fetch_array($resultado))
                            {
                                $nombre = $filas['nombre'];
                                $nombre_sin_espacios = strtolower(str_replace(" ", "-", $nombre));
                                echo '<option id="op-'.$nombre_sin_espacios.'" value="'.$filas['nombre'].'">'.$filas['nombre'].'</option>';
                            }   
                        ?>
                    </select>
                    <i class="input-icon uil uil-building"></i>
                </div>
                <input type="submit" class="btn-acceder" id="btn-actualizar-permiso" value="Actualizar">
            </form>           
        </div>
    </div>
    <div id="abm">
        <div class="container-adm" style="--delay: .1s">
            <h1>ABM PLANTAS</h1>
            <div class="container-info-adm">
                <div class="container-tabla">
                    <table class="table">
                        <thead>
                            <th class="td-id">ID</th>
                            <th>NOMBRE</th>
                            <th>CONTROLES</th>
                        </thead>
                        <tbody id="container-plantas">
                        </tbody>
                    </table>        
                </div>
                <form id="form-agregar-planta" class="container-card">
                    <h2>Agregar Planta</h2>
                    <input type="hidden" id="id-planta">
                    <div class="form-group">
                        <input type="text" id="nombre-planta" class="form-style" placeholder="Nombre" autocomplete="off" required>
                        <i class="input-icon uil uil-building"></i>
                    </div>
                    <input type="submit" class="btn-acceder" id="btn-agregar-nueva-planta" value="Agregar">
                </form>        
            </div>
        </div>
        <div class="container-adm" style="--delay: .2s">
            <h1>ABM SECTORES</h1>
            <div class="container-info-adm">
                <div class="container-tabla" id="form-agregar-planta">
                    <table class="table">
                        <thead>
                            <th class="td-id">ID</th>
                            <th>NOMBRE</th>
                            <th>CONTROLES</th>
                        </thead>
                        <tbody id="container-sectores">
                        </tbody>
                    </table>        
                </div>
                <form id="form-agregar-sector" class="container-card">
                    <h2>Agregar Sector</h2>
                    <input type="hidden" id="id-sector">
                    <div class="form-group">
                        <input type="text" id="nombre-sector" class="form-style" placeholder="Nombre" autocomplete="off" required>
                        <i class="input-icon uil uil-chart-pie-alt"></i>
                    </div>
                    <input type="submit" class="btn-acceder" id="btn-agregar-nuevo-sector" value="Agregar">
                </form>        
            </div>
        </div>
        <div class="container-adm" style="--delay: .3s">
            <h1>ABM MOTIVOS</h1>
            <div class="container-info-adm">
                <div class="container-tabla" id="form-agregar-planta">
                    <table class="table">
                        <thead>
                            <th class="td-id">ID</th>
                            <th>MOTIVO</th>
                            <th>PRIORIDAD</th>
                            <th>CONTROLES</th>
                        </thead>
                        <tbody id="container-motivos">
                        </tbody>
                    </table>        
                </div>
                <form id="form-agregar-motivo" class="container-card">
                    <h2>Agregar Motivo</h2>
                    <input type="hidden" id="id-motivo">
                    <div class="form-group">
                        <input type="text" id="nombre-motivo" class="form-style" placeholder="Nombre" autocomplete="off" required>
                        <i class="input-icon uil uil-exclamation-octagon"></i>
                    </div>
                    <div class="form-group">
                        <select id="prioridad-motivo" class="form-style-selectlist" autocomplete="off" required>
                            <option value="" disabled selected>Prioridad</option>
                            <option id="1" value="1">1</option>
                            <option id="2" value="2">2</option>
                            <option id="3" value="3">3</option>
                            <option id="4" value="4">4</option>
                            <option id="5" value="5">5</option>
                            <option id="6" value="6">6</option>
                            <option id="7" value="7">7</option>
                            <option id="8" value="8">8</option>
                            <option id="9" value="9">9</option>
                        </select>
                        <i class="input-icon uil uil-arrows-shrink-v"></i>
                    </div> 
                    <input type="submit" class="btn-acceder" id="btn-agregar-nuevo-motivo" value="Agregar">
                </form>        
            </div>
        </div>
    </div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/plugins/sweetalert2.all.min.js"></script>
<script src="assets/scripts/op-admin.js"></script>
</html>