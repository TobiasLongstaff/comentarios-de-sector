<?php

    include '../partials/conexion.php';

    $sql_select = "SELECT prevision_de_hacienda.id AS id_prevision_de_hacienda, prevision_de_hacienda.fecha,
    prevision_de_hacienda.apellido, prevision_de_hacienda.kg, prevision_de_hacienda.comisionista,
    prevision_de_hacienda.compra_local, prevision_de_hacienda.id_usuario, usuarios.nombre_apellido
    FROM prevision_de_hacienda INNER JOIN usuarios ON prevision_de_hacienda.id_usuario = usuarios.id";
    $resultado_select=mysqli_query($conexion,$sql_select);
    $json = array();
    while($filas = mysqli_fetch_array($resultado_select))
    {
        $json[] = array(
            'id' => $filas['id_prevision_de_hacienda'],
            'fecha' => $filas['fecha'],
            'apellido' => $filas['apellido'],
            'cantidad' => $filas['kg'],
            'comisionista' => $filas['comisionista'],
            'compra_local' => $filas['compra_local'],
            'usuario' => $filas['nombre_apellido'],
        );
    }         

    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);
?>