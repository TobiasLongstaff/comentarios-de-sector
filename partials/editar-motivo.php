<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']) && isset($_SESSION['id_usuario']))
    {
        $id_motivo = $_POST['id']; 
        $nombre = $_POST['nombre'];
        $prioridad = $_POST['prioridad'];

        $sql="UPDATE motivo SET nombre = '$nombre', prioridad = '$prioridad' WHERE id = '$id_motivo'";
        $resultado = mysqli_query($conexion,$sql);
        if(!$resultado)
        {
            echo '2';    
        }
        else
        {
            echo '1';
        }
    }
    else
    {
        echo '2';
    }
    mysqli_close($conexion);

?>