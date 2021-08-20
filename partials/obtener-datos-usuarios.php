<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']))
    {
        $id_usuario = $_POST['id'];
        $sql = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
        $json = array();
        $resultado=mysqli_query($conexion,$sql);
        if($filas = mysqli_fetch_array($resultado))
        {
            $json[] = array(
                'permiso' => $filas['tipo'],
                'sector' => $filas['sector'],
                'planta' => $filas['planta'],
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
        mysqli_close($conexion);        
    }
?>