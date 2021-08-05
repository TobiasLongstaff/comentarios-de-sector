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
        $motivo = $filas['motivo'];

        $sql = "SELECT * FROM motivo WHERE nombre = '$motivo'";
        $resultado=mysqli_query($conexion,$sql);
        if($filas_select = mysqli_fetch_array($resultado))
        {
            $prioridad = $filas_select['prioridad'];
        }

        $json[] = array(
            'id' => $filas['id_comentario'],
            'fecha' => $filas['fecha'],
            'hora' => $filas['hora'],
            'sector' => $filas['sector'],
            'motivo' => $motivo,
            'comentario' => $filas['comentario'],
            'usuario' => $filas['nombre_apellido'],
            'estado' => $filas['estado'],
            'prioridad' => $prioridad,
        );
    }         

    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);
?>