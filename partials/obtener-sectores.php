<?php

    require 'conexion.php';
    session_start();

    $contador = 0;

    if($_SESSION['tipo_usuario'] == 'admin' or $_SESSION['sector_usuario'] == 'todos')
    {
        $sql="SELECT * FROM sector";
    }
    else
    {
        $sector = $_SESSION['sector_usuario'];
        $sql="SELECT * FROM sector WHERE nombre = '$sector'";
    }
    
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