<?php

    session_start();
    require 'conexion.php';

    if(isset($_POST['fecha']) && isset($_SESSION['id_usuario']))
    {
        $fecha = $_POST['fecha'];
        $apellido = $_POST['apellido'];
        $cantidad = $_POST['cantidad'];
        $id_usuario = $_SESSION['id_usuario'];

        $sql = "INSERT INTO prevision_de_hacienda (fecha, apellido, kg, id_usuario) VALUES 
        ('$fecha', '$apellido', '$cantidad', '$id_usuario')";
        $resultado = mysqli_query($conexion, $sql);
        if(!$resultado)
        {
            echo 'error';
        }
        else
        {
            echo '1';
        }
    }
    mysqli_close($conexion); 

?>