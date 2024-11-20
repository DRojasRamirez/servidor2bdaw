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

                $tmp_fabricante = depurar($_POST ["fabricante"]);
                $tmp_pais = depurar($_POST ["pais"]);

                if($tmp_fabricante == ""){
                    $err_fabricante = "El fabricante es obligatorio";
                } else {
                    $patron = "/^[0-9A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/";
                    if(!preg_match($patron, $tmp_fabricante)){
                        $err_fabricante = "Formato de fabricante no valido";
                    } else {
                        $fabricante = $tmp_fabricante;
                    }
                }
                    
                if($tmp_pais == ""){
                    $err_pais = "El fabricante es obligatorio";
                } else {
                    $patron = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/";
                    if(!preg_match($patron, $tmp_pais)){
                        $err_pais = "Formato de fabricante de pais no Valido";
                    } else {
                        $pais = $tmp_pais;
                    }
                }

            }
        ?>

        <form class="col-6" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input type="text" class="form-control" name="fabricante">
                <?php if(isset($err_fabricante)) echo "<span class='error'>$err_fabricante</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Pais de la sede del fabricante</label>
                <input type="text" class="form-control" name="pais">
                <?php if(isset($err_pais)) echo "<span class='error'>$err_pais</span>" ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        if(isset($pais) && isset($fabricante)){ 
            $sql = "INSERT INTO fabricantes (fabricante, pais)
                VALUES ('$fabricante', '$pais')";
            $_conexion -> query($sql);    
        } 
       ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>