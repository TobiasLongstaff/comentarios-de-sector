<?php
    require 'conexion.php';
    session_start();

    if(isset($_POST['mail']))
    {
        $mail = $_POST['mail'];        
        $nombre_apellido = $_POST['nombre_apellido'];
        $password = sha1($_POST['password']);
        $password_con = sha1($_POST['password_con']);
        $planta = $_POST['planta'];
        $sector = $_POST['sector'];

        $hash = md5(rand(0,1000));

        $sql = "SELECT mail FROM usuarios WHERE mail = '$mail'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($resultado) > 0)
        {
            echo 'El mail ya estan asociados a una cuenta';
        }
        else
        {
            if($password == $password_con)
            {
                $sql = "INSERT INTO usuarios (mail, password, nombre_apellido, hash, planta, sector, tipo
                ) VALUES ('$mail', '$password', '$nombre_apellido', 
                '$hash', '$planta', '$sector', 'Pendiente')";
                $resultado = mysqli_query($conexion, $sql);
                if(!$resultado)
                {
                    echo 'Error al cargar los datos, consultar con soporte';
                }
                else
                { 
                    echo '1';
                }
            }
            else
            {
                echo 'Las contraseñas no son iguales';
            }
        }
    }
    mysqli_close($conexion); 
?>