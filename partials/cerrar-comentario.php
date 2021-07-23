<?php

    require 'conexion.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        
        $sql="UPDATE comentarios SET estado = 'Cerrado' WHERE id = '$id'";
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
 

?>