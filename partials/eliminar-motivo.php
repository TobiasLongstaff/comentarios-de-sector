<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']) && isset($_SESSION['id_usuario']))
    {
        $id_motivo = $_POST['id'];

        $sql_delete = "DELETE FROM motivo WHERE id = '$id_motivo'";
        $resultado_delete = mysqli_query($conexion, $sql_delete);
        if(!$resultado_delete)
        {
            echo 'Error consultar con soporte ';
        }  
        else
        {
            echo '1';
        }      
    }
    mysqli_close($conexion); 
?>