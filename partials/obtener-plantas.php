<?php

    require 'conexion.php';

    $contador = 0;

    $sql="SELECT * FROM frigorifico";
    $resultado=mysqli_query($conexion,$sql);
    $json = array();
    while($filas = mysqli_fetch_array($resultado))
    {
        $contador = $contador + 1;

        $json[] = array(
            'id' => $filas['id'],
            'nombre' => $filas['nombre'],
            'cont' => $contador
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);

?>