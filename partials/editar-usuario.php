<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']) && isset($_SESSION['id_usuario']))
    {
        $id_usuarios = $_POST['id']; 
        $permisos = $_POST['permisos'];
        $sector = $_POST['sector'];
        $planta = $_POST['planta'];

        $sql="UPDATE usuarios SET tipo = '$permisos', sector = '$sector', planta = '$planta' WHERE id = '$id_usuarios'";
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