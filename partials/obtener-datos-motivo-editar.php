<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']))
    {
        $id_motivo = $_POST['id'];
        $sql = "SELECT * FROM motivo WHERE id = '$id_motivo'";
        $json = array();
        $resultado=mysqli_query($conexion,$sql);
        if($filas = mysqli_fetch_array($resultado))
        {
            $json[] = array(
                'nombre' => $filas['nombre'],
                'prioridad' => $filas['prioridad'],
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
        mysqli_close($conexion);        
    }
?>