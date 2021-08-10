<?php

    require 'conexion.php';

    $contador = 2;

    $sql="SELECT * FROM prevision_de_hacienda";
    $resultado=mysqli_query($conexion,$sql);
    $json = array();
    while($filas = mysqli_fetch_array($resultado))
    {
        $contador = $contador + 1;

        $json[] = array(
            'id' => $filas['id'],
            'fecha' => $filas['fecha'],
            'apellido' => $filas['apellido'],
            'kg' => $filas['kg'],
            'cont' => $contador
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);

?>