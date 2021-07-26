<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']))
    {
        $id_planta = $_POST['id'];
        $sql = "SELECT * FROM frigorifico WHERE id = '$id_planta'";
        $json = array();
        $resultado=mysqli_query($conexion,$sql);
        if($filas = mysqli_fetch_array($resultado))
        {
            $json[] = array(
                'nombre' => $filas['nombre'],
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
        mysqli_close($conexion);        
    }
?>