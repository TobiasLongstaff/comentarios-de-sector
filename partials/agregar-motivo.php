<?php

    session_start();
    require 'conexion.php';

    if(isset($_POST['nombre']) && isset($_POST['prioridad']) && isset($_SESSION['id_usuario']))
    {
        $nombre = $_POST['nombre'];
        $prioridad = $_POST['prioridad'];

        $sql = "INSERT INTO motivo (nombre, prioridad) VALUES ('$nombre', '$prioridad')";
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