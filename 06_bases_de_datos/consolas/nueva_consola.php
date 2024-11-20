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
                $tmp_fabricante = depurar($_POST ["fabricante"]);
                $tmp_generacion = depurar($_POST ["generacion"]);
                $tmp_unidades_vendidas = depurar($_POST ["unidades_vendidas"]);

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
                    
                if($tmp_fabricante == ""){
                    $err_fabricante = "El fabricante es obligatorio";
                } else {
                    $patron = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/";
                    if(!preg_match($patron, $tmp_fabricante)){
                        $err_fabricante = "Formato de nombre de fabricante no Valido";
                    } else {
                        $fabricante = $tmp_fabricante;
                    }
                }

                if($tmp_generacion == ""){
                    $err_generacion = "La generacion es obligatoria";
                } else {
                    $patron = "/^[0-9]{1,2}$/";
                    if(!preg_match($patron, $tmp_generacion)){
                        $err_generacion = "Formato de generacion no valido";
                    } else {
                        $generacion = $tmp_generacion;
                    }
                }

                if($tmp_unidades_vendidas == ""){
                    $unidades_vendidas= $tmp_unidades_vendidas;
                } else {
                    $patron = "/^[0-9]+$/";
                    if(!preg_match($patron, $tmp_unidades_vendidas)){
                        $err_unidades_vendidas = "Formato de unidades vendidas no valido";
                    } else {
                        $unidades_vendidas = $tmp_unidades_vendidas;
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
                <label class="form-label">Fabricante</label>
                <input type="text" class="form-control" name="fabricante">
                <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Generacion</label>
                <input type="text" class="form-control" name="generacion">
                <?php if(isset($err_generacion)) echo "<span class='error'>$err_generacion</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Unidades Vendidas</label>
                <input type="text" class="form-control" name="unidades_vendidas">
                <?php if(isset($err_unidades_vendidas)) echo "<span class='error'>$err_unidades_vendidas</span>" ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        if(isset($fabricante) && isset($nombre) && isset($generacion) && isset($unidades_vendidas) ){ 
            $sql = "INSERT INTO consolas (nombre, fabricante, generacion, unidades_vendidas)
                VALUES ('$nombre', '$fabricante', '$generacion', '$unidades_vendidas')";
            $_conexion -> query($sql);    
        } 
       ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>