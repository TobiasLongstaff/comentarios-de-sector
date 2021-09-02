<?php

    session_start();
    require 'conexion.php';

    if(isset($_POST['fecha']) && isset($_SESSION['id_usuario']))
    {
        $fecha = $_POST['fecha'];
        $apellido = $_POST['apellido'];
        $cantidad = $_POST['cantidad'];
        $id_usuario = $_SESSION['id_usuario'];
        $compra_local = $_POST['compra_local'];
        $comisionista = $_POST['comisionista'];

        $sql = "INSERT INTO prevision_de_hacienda (fecha, apellido, kg, compra_local, comisionista, id_usuario) VALUES 
        ('$fecha', '$apellido', '$cantidad', '$compra_local', '$comisionista', '$id_usuario')";
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