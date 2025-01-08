<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Anime</title>
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

                $tmp_titulo = depurar($_POST ["titulo"]);
                $tmp_anno_estreno = depurar($_POST ["anno_estreno"]);
                if(isset($_POST["nombre"])){
                    $tmp_nombre = depurar($_POST ["nombre"]);
                } else {
                    $tmp_nombre = "";
                }
                $tmp_num_temporadas = depurar($_POST ["num_temporadas"]);

                /**
                 * $_FILES -> que es un array BIDIMENSIONAL
                 */

                //var_dump($_FILES["imagen"]);
                $nombre_imagen = $_FILES["imagen"]["name"];
                $ubicacion_temporal = $_FILES["imagen"]["tmp_name"];
                $ubicacion_final = "./imagenes/$nombre_imagen";

                move_uploaded_file($ubicacion_temporal, $ubicacion_final);

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

                /**
                 * Las 3 etapas de las prepared statements
                 * 
                 * 1.Preparacion
                 * 2.Enlazaddo (binding)
                 * 3.Ejecucion
                 */

                // 1. Preparacion
                $sql = $_conexion -> prepare ("INSERT INTO animes
                    (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
                    VALUES (?,?,?,?,?)");

                // 2. Enlazado

                $sql -> bind_param("ssiis", $titulo, $nombre_estudio, $anno_estreno, $num_temporadas, $ubicacion_final);

                // 3. Ejecucion
                $sql -> execute();

            }

           




            $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
            $resultado = $_conexion -> query($sql);
            $_conexion -> close();
            $estudios = [];


            while($fila = $resultado -> fetch_assoc()){
                array_push($estudios, $fila["nombre_estudio"]);
            }
            

        ?>

        <h1>Crear un nuevo anime</h1>

        <a class="btn btn-secondary" href="index.php">Volver a tabla</a><br><br>

        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre del Estudio</label>
                <br>
                <select name="nombre">
                <option disabled selected hidden>--- Elige un estudio ---</option>
                <?php
                    foreach($estudios as $estudio){ ?>
                        <option value="<?php echo $estudio ?>">
                            <?php echo $estudio;?>
                        </option>
                 <?php   }
                ?>
                </select>
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div> 
            
            <div class="mb-3">
                <label class="form-label">Año de Estreno</label>
                <input type="text" class="form-control" name="anno_estreno">
                <?php if(isset($err_anno_estreno)) echo "<span class='error'>$err_anno_estreno</span>" ?>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Número de Temporadas</label>
                <input type="text" class="form-control" name="num_temporadas">
                <?php if(isset($err_num_temporadas)) echo "<span class='error'>$err_num_temporadas</span>" ?>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
       if(isset($titulo) && isset($nombre) && 
            isset($anno__estreno) && isset($num_temporadas) 
            && isset($ubicacion_final)){ 
            /*$sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
                VALUES ('$titulo', '$nombre', '$anno__estreno', '$num_temporadas', '$ubicacion_final')";
            $_conexion -> query($sql);    */
        } 
       ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>