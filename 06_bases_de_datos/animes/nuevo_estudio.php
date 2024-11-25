<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
        require "./conexion.php";

        session_start();
        if(isset($_SESSION["usuario"])) {
            echo "<h2>Bienveni@" . $_SESSION["usuario"] .  "</h2>";
        } else {
            header("location: usuarios/iniciar_sesion.php"); // nunca usar esta funcion en el body o al menos siempre antes de que haya codigo
            exit;
        }
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        function depurar($entrada) : string {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = stripslashes($salida);
            $salida = preg_replace("!\s+!", " ", $salida);        
            return $salida;
        }
    ?>

    <div class="container">

        <?php

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $tmp_nombre = depurar($_POST ["nombre"]);
                $tmp_ciudad = depurar($_POST ["ciudad"]);

                if($tmp_nombre == ""){
                    $err_nombre = "El nombre es obligatorio";
                } else {
                    $patron = "/^[0-9A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/";
                    if(!preg_match($patron, $tmp_nombre)){
                        $err_nombre = "Formato de nombre no valido";
                    } else {
                        $nombre = $tmp_nombre;
                    }
                }
                    
                if($tmp_ciudad == ""){
                    $err_ciudad = "El nombre es obligatorio";
                } else {
                    $patron = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/";
                    if(!preg_match($patron, $tmp_ciudad)){
                        $err_ciudad = "Formato de nombre de ciudad no Valido";
                    } else {
                        $ciudad = $tmp_ciudad;
                    }
                }

            }
        ?>

        <form class="col-6" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre del Estudio</label>
                <input type="text" class="form-control" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Ciudad de la sede del Estudio</label>
                <input type="text" class="form-control" name="ciudad">
                <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>" ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        if(isset($ciudad) && isset($nombre)){ 
            $sql = "INSERT INTO estudios (nombre_estudio, ciudad)
                VALUES ('$nombre', '$ciudad')";
            $_conexion -> query($sql);    
        } 
       ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>