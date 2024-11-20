<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
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

        $tmp_titulo = depurar($_POST ["titulo"]);
        $tmp_paginas = depurar($_POST ["paginas"]);
        //$tmp_genero = depurar($_POST ["genero"]);
        $tmp_secuela = depurar($_POST ["secuela"]);
        $tmp_fecha = depurar($_POST ["fecha"]);
        $tmp_sinopsis = depurar($_POST ["sinopsis"]);

        if($tmp_titulo == ""){
            $err_titulo = "El titulo es obligatorio";
        } else {
            if(strlen($tmp_titulo) > 40){
                $err_titulo = "El titulo no puede tener más de 40 caracteres";
            } else {
                $tmp_titulo = strtoupper($tmp_titulo);
                $primerCaracter = substr($tmp_titulo, 0, 1);
                $patron1 = "/^[A-ZáéíóúÁÉÍÓÚÑñ]$/";
                if(!preg_match($patron1, $primerCaracter)){
                    $err_titulo = "El titulo debe de comenzar por una letra";
                } else {
                    $patron2 = "/^[A-ZáéíóúÁÉÍÓÚÑñ.,; 0-9]+$/";
                    if(!preg_match($patron2, $tmp_titulo)){
                        $err_titulo = "El titulo solo puede contener letras, numeros, espacios, puntos, comas, puntos y comas";
                    }
                    $tmp_titulo = ucwords(strtolower($tmp_titulo));
                    $titulo = $tmp_titulo;   
                }
                                  
            }
        }


        if($tmp_paginas == ""){
            $err_paginas= "Las páginas son obligatorias";
        } else {
            if(!filter_var($tmp_paginas, FILTER_VALIDATE_INT)){
                $err_paginas = "Debe de introducir un valor numerico entero";
            } else {
                if($tmp_paginas < 10){
                    $err_paginas = "El numero de páginas debe de ser minimo de 10";
                } elseif($tmp_paginas > 9999){
                    $err_paginas = "El numero de páginas debe de ser maximo de 9999";
                } else {
                    $paginas = $tmp_paginas;
                }
            }
        }

        if($tmp_secuela == ""){
            $secuela = "No";
        } else {
            $secuela = $tmp_secuela;
        }

        if($tmp_fecha == ""){
            $fecha = "";
        } else {
            //$patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    //------------/
                $fechaActual = date("Y-m-d");
                /* Otra forma de realizarlo
                list($anio_actual, $mes_actual, $dia_actual) = explode("-", $fechaActual);
                */
                $fechaSeparadaActual = explode("-", $fechaActual);
                $fechaTmpSeparada = explode("-", $tmp_fecha);

            if($fechaTmpSeparada[0] > ($fechaSeparadaActual[0] + 3)){
                $err_fecha = "No se permiten fechas mayores a tres años";
            } elseif ($fechaTmpSeparada[0] < 1800){
                $err_fecha = "No se permiten fechas previas a 1800";
            } elseif($fechaTmpSeparada[0] == ($fechaSeparadaActual[0] + 3)) {
                if($fechaTmpSeparada[1] > ($fechaSeparadaActual[1])){
                    $err_fecha = "No se permiten fechas mayores a tres años";
                } elseif($fechaTmpSeparada[1] == ($fechaSeparadaActual[1])){
                    if($fechaTmpSeparada[2] > ($fechaSeparadaActual[2])){
                        $err_fecha = "No se permiten fechas mayores a tres años";
                    } else {
                        $fecha = $tmp_fecha;
                    }
                } else {
                    $fecha = $tmp_fecha;
                }
            } else {
                $fecha = $tmp_fecha;
            }              
        }

        if($tmp_sinopsis == ""){
            $sinopsis = $tmp_sinopsis;
        } else {
            if(strlen($tmp_sinopsis) > 200){
                $err_sinopsis = "La sinopsis no puede tener más de 200 caracteres";
            } else {
                $tmp_sinopsis = strtoupper($tmp_sinopsis);
                $patron = "/^[A-ZáéíóúÁÉÍÓÚÑñ ]$/";
                if(!preg_match($patron, $tmp_sinopsis)){
                    $err_sinopsis = "Solo se admiten letras y espacios en blanco";
                } else {
                    $sinopsis = $tmp_sinopsis;
                }
            }
        }


    }

    ?>

        <form class="col-5" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
            </div>
            <div class="mb-3">
            <label class="form-label">Páginas</label>
                <input type="text" class="form-control" name="paginas">
                <?php if(isset($err_paginas)) echo "<span class='error'>$err_paginas</span>" ?>
            </div>
            <!--<div class="mb-3">
                <label class="form-label">Genero</label>
                <input type="radio-button" class="form-control" name="fantasia">
            </div>-->
            <div class="mb-3"> 
                <label>¿Tiene secuela?</label>
                <select name="secuela">
                    <option value="No">NO</option>
                    <option value="Si">SI</option>
                </select>
                <?php if(isset($err_secuela)) echo "<span class='error'>$err_secuela</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de Publicacion</label>
                <input type="date" class="form-control" name="fecha">
                <?php if(isset($err_fecha)) echo "<span class='error'>$err_fecha</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Sinopsis</label>
                <input type="TextArea" class="form-control" name="sinopsis">
                <?php if(isset($err_sinopsis)) echo "<span class='error'>$err_sinopsis</span>" ?>
            </div>

            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        if(isset($titulo) && isset($paginas) && 
            isset($fecha) && isset($secuela) && isset($sinopsis)){ ?>
            <p><?php echo "Título: " . $titulo ?></p>
            <p><?php echo "Páginas: " . $paginas ?></p>
            <p><?php echo "Fecha: " . $fecha?></p>
            <p><?php echo "Secuela: " . $secuela?></p>
            <p><?php echo "Sinopsis: " . $sinopsis?></p>
        <?php } ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>