<?php

    include '../partials/conexion.php';

    $sql_select = "SELECT comentarios.id AS id_comentario, comentarios.fecha, comentarios.hora, 
    comentarios.sector, comentarios.motivo, comentarios.comentario, comentarios.id_usuario, 
    comentarios.estado, usuarios.nombre_apellido
    FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id";
    $resultado_select=mysqli_query($conexion,$sql_select);
    $json = array();
    while($filas = mysqli_fetch_array($resultado_select))
    {
        $json[] = array(
            'id' => $filas['id_comentario'],
            'fecha' => $filas['fecha'],
            'hora' => $filas['hora'],
            'sector' => $filas['sector'],
            'motivo' => $filas['motivo'],
            'comentario' => $filas['comentario'],
            'usuario' => $filas['nombre_apellido'],
            'estado' => $filas['estado']
        );
    }         

    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);
?>