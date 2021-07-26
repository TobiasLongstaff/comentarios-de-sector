<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']) && isset($_SESSION['id_usuario']))
    {
        $id_planta = $_POST['id']; 
        $nombre = $_POST['nombre'];

        $sql="UPDATE frigorifico SET nombre = '$nombre' WHERE id = '$id_planta'";
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