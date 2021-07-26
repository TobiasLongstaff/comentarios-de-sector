<?php
    session_start();

    if(!$_SESSION['tipo_usuario'] == 'admin')
    {
        header('Location: index.php');
    }

    require 'partials/header.html';

?>
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
                <input type="submit" class="btn-acceder" id="btn-agregar-nuevo-motivo" value="Agregar">
            </form>        
        </div>
    </div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/plugins/sweetalert2.all.min.js"></script>
<script src="assets/scripts/op-admin.js"></script>
</html>