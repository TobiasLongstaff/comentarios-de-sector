<?php

    require 'conexion.php';

    $contador = 0;

    date_default_timezone_set('America/Buenos_Aires');
    $fecha_actual = date('Y-m-d'); 

    $sql="SELECT * FROM comentarios WHERE fecha = '$fecha_actual' AND estado = 'Pendiente'";
    $resultado=mysqli_query($conexion,$sql);
    $json = array();
    while($filas = mysqli_fetch_array($resultado))
    {
        $contador = $contador + 1;

        $json[] = array(
            'id' => $filas['id'],
            'fecha' => $filas['fecha'],
            'hora' => $filas['hora'],
            'sector' => $filas['sector'],
            'motivo' => $filas['motivo'],
            'comentario' => $filas['comentario'],
            'cont' => $contador
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);

?>