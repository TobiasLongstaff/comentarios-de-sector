<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']) && isset($_SESSION['id_usuario']))
    {
        $id_frigo = $_POST['id'];

        $sql_delete = "DELETE FROM frigorifico WHERE id = '$id_frigo'";
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