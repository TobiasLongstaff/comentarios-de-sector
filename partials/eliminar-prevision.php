<?php

    require 'conexion.php';
    session_start();

    if(isset($_POST['id']) && isset($_SESSION['id_usuario']))
    {
        $id_prevision = $_POST['id'];

        $sql_delete = "DELETE FROM prevision_de_hacienda WHERE id = '$id_prevision'";
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