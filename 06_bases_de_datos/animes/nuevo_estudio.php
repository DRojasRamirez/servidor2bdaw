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

        $estudios = ["Ghibli", "WIT", "Kyoto_Animation", "Trigger", "MAPPA"]
    ?>

    <div class="container">

        <?php

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $tmp_titulo = depurar($_POST ["titulo"]);
                $tmp_anno_estreno = depurar($_POST ["anno_estreno"]);
                if(isset($_POST["nombre"])){
                    $tmp_nombre = depurar($_POST ["nombre"]);
                } else {
                    $tmp_nombre = "";
                }
                $tmp_num_temporadas = depurar($_POST ["num_temporadas"]);



                if($tmp_titulo == ""){
                    $err_titulo = "El titulo es obligatorio";
                } else {
                    if(strlen($tmp_titulo) > 80){
                        $err_titulo = "El titulo no puede tener más de 80 caracteres";
                    } else {
                        $tmp_titulo = ucwords(strtolower($tmp_titulo));
                        $titulo = $tmp_titulo;                     
                    }
                }

                if($tmp_nombre == ""){
                    $err_nombre = "El nombre es obligatorio";
                } else {
                    $nombre = $tmp_nombre;
                }


                if($tmp_anno_estreno == ""){
                    $anno__estreno = $tmp_anno_estreno;
                } else {
                    $patron = "/^[0-9]+$/";
                    if(!preg_match($patron, $tmp_anno_estreno)){
                        $err_anno_estreno = "Formato de fecha no valido, debe ingresar un valor numerico";
                    } else {
                        $anno__actual = date("Y");
                        if($tmp_anno_estreno < 1960 || $tmp_anno_estreno > ($anno__actual+5)){
                            $err_anno_estreno = "El año de estreno debe de estar entre 1960 y cinco años a futuro máximo";
                        } else {
                            $anno__estreno = $tmp_anno_estreno;
                        }
                    }
                }
                
                if($tmp_num_temporadas == ""){
                    $err_num_temporadas = "El numero de temporadas es obligatorio";
                } else {
                    if(!filter_var($tmp_num_temporadas, FILTER_VALIDATE_INT)){
                        $err_num_temporadas = "Formato de numero de temporadas no valido, debe ingresar un valor numerico entero";
                    } else {
                        if($tmp_num_temporadas < 1 || $tmp_num_temporadas > 99){
                            $err_num_temporadas = "El numero de temporadas debe de estar entre 1 y 99";
                        } else {
                            $num_temporadas = $tmp_num_temporadas;
                        }
                    }
                }



            }
        ?>

        <form class="col-6" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>
          <!--  <div class="mb-3">
                <label class="form-label">Nombre del Estudio</label>
                <select name="nombre">
                <option disabled selected hidden>--- Elige un estudio ---</option>
                <?php
                /*for($i = 0; $i < count($estudios); $i++){
                    ?><option value = <?php echo $estudios[$i]; ?> > <?php echo $estudios[$i];?></option>
                <?php }*/
                ?>
                </select>
                <?php// if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div> -->
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad">
                <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Año de fundacion</label>
                <input type="text" class="form-control" name="anno_fundacion">
                <?php if(isset($err_anno_fundacion)) echo "<span class='error'>$err_anno_fundacion</span>" ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>