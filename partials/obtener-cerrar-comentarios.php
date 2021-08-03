<?php

    require 'conexion.php';

    $contador = 0;

    date_default_timezone_set('America/Buenos_Aires');
    $fecha_actual = date('Y-m-d'); 

    $sql="SELECT * FROM comentarios ORDER BY estado DESC";
    $resultado=mysqli_query($conexion,$sql);
    $json = array();
    while($filas = mysqli_fetch_array($resultado))
    {
        $contador = $contador + 1;
        $estado_comentarios = $filas['estado'];

        if($estado_comentarios == 'Cerrado')
        {
            $estado = 'disabled';
        }
        else
        {
            $estado = '';
        }

        $json[] = array(
            'id' => $filas['id'],
            'fecha' => $filas['fecha'],
            'hora' => $filas['hora'],
            'sector' => $filas['sector'],
            'motivo' => $filas['motivo'],
            'comentario' => $filas['comentario'],
            'cont' => $contador,
            'estado' => $estado
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);

?>