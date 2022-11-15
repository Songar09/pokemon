<?php

    session_start();

include ('conexion.php');

$correo_electronico= $_POST['correo'];
$password= $_POST['contrasena'];
$password= hash('sha512', $password);

$validar_login= mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo='$correo_electronico' and Contraseña='$password'");

if (mysqli_num_rows($validar_login) >0 ) {

    $_SESSION['usuario'] = $correo_electronico;

    header("location:Api/pokemon.php");
    exit;
}else {
   
    exit;
}

?>