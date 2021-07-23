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
    <div class="container-tabla">
        <table>
            <thead>
                <td class="td-id">ID</td>
                <td>NOMBRE</td>
                <td>CONTROLES</td>
            </thead>
            <tbody>
            </tbody>
        </table>        
    </div>
    <form class="container-card">
        <h2>Agregar Planta</h2>
        <div class="form-group">
            <input type="text" id="nombre-planta" class="form-style" placeholder="Nombre" autocomplete="off" required>
            <i class="input-icon uil uil-building"></i>
        </div>
        <input type="submit" class="btn-acceder" value="Agregar">
    </form>
</div>

<div class="container-adm" style="--delay: .2s">
    <h1>ABM SECTORES</h1>
    <div class="container-tabla" id="form-agregar-planta">
        <table>
            <thead>
                <td class="td-id">ID</td>
                <td>NOMBRE</td>
                <td>CONTROLES</td>
            </thead>
            <tbody>
                <tr>
                    <td class="td-id">1</td>
                    <td>Prueba 2</td>
                    <td class="container-controles">
                        <button class="btn-editar"><i class="uil uil-edit-alt"></i></button>
                        <button class="btn-eliminar"><i class="uil uil-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>        
    </div>
    <form class="container-card">
        <h2>Agregar Sector</h2>
        <div class="form-group">
            <input type="text" id="nombre-planta" class="form-style" placeholder="Nombre" autocomplete="off" required>
            <i class="input-icon uil uil-chart-pie-alt"></i>
        </div>
        <input type="submit" class="btn-acceder" value="Agregar">
    </form>
</div>
</body>
<script src="assets/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/scripts/op-admin.js"></script>
</html>