<?php

    include('conexion.php');

    $nombre_completo= $_POST['nombre_completo'];
    $correo_electronico= $_POST['correo'];
    $usuario= $_POST['usuario'];
    $password= $_POST['contrasena'];
    $password= hash('sha512', $password);

    $query= "INSERT INTO usuarios(Nombre_completo, Correo, Usuario, Contraseña)
            VALUES ('$nombre_completo', '$correo_electronico', '$usuario', '$password')";

    $verificar= mysqli_query( $conexion, "SELECT * FROM usuarios WHERE Correo='$correo_electronico'" );
    if (mysqli_num_rows ($verificar) > 0 ) {
        echo '
        <script> 
            alert("Este correo ya se encuentra registrado, intenta con otro");
            window.location = "index.php";
        </script>
    
    ';
    exit();
    }

    

    $verificar_usuario= mysqli_query( $conexion, "SELECT * FROM usuarios WHERE Usuario='$usuario'" );
    if (mysqli_num_rows ($verificar_usuario) > 0 ) {
        echo '
        <script> 
            alert("Este usuario ya se encuentra registrado, intenta con otro nombre de usuario");
            window.location = "index.php";
        </script>
    
    ';
    exit();
    }

    
    
    $ejecutar= mysqli_query ($conexion,$query);


    if ($ejecutar) {
        echo '
            <script> 
                alert("Registro Exitoso!");
                window.location = "index.php";
            </script>
        
        ';
    }else {
        echo '
        <script> 
            alert("Intentalo de nuevo, Registro Fallido!");
            window.location = "index.php";
        </script>
    
    ';
    }

    mysqli_close($conexion);
?>
