<?php

    session_start();
    require 'conexion.php';

    if(isset($_POST['mail']) && isset($_POST['password']))
    {
        $mail = $_POST['mail'];
        $password = sha1($_POST['password']);
        $sql = "SELECT * FROM usuarios WHERE mail = '$mail' AND password = '$password'";
        $resultado = mysqli_query($conexion, $sql);
        $numero_fila = mysqli_num_rows($resultado);
        if($numero_fila == '1')
        {
            $filas = mysqli_fetch_array($resultado);

            $_SESSION['id_usuario'] = $filas['id'];

            echo '1';
        }
        else
        {
            echo 'Usuario o Contraseña incorrectos';
        }
    }
    else
    {
        echo 'Error al cargar los valores contactar con el soporte';
    } 
    mysqli_close($conexion); 
?>