<?php

    session_start();
    require 'conexion.php';

    if(isset($_POST['fecha']) && isset($_SESSION['id_usuario']))
    {
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $sector = $_POST['sector'];
        $motivo = $_POST['motivo'];
        $comentario = $_POST['comentario'];
        $id_usuario = $_SESSION['id_usuario'];

        $sql = "INSERT INTO comentarios (fecha, hora, sector, motivo, comentario, id_usuario, estado) VALUES 
        ('$fecha', '$hora', '$sector', '$motivo', '$comentario', '$id_usuario', 'Pendiente')";
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