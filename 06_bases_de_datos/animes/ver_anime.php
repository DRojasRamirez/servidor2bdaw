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

        <h1>Editar anime</h1>

        <?php

            //echo "<h1>" . $_GET["id_anime"] . "</h1>";

            $id_anime = $_GET["id_anime"];
            $sql ="SELECT * FROM animes WHERE id_anime = $id_anime";
            $resultado = $_conexion -> query($sql);

        

            while($fila = $resultado -> fetch_assoc()){
                $titulo = $fila["titulo"];
                $nombre_estudio = $fila["nombre_estudio"];
                $anno_estreno = $fila["anno_estreno"];
                $num_temporadas = $fila["num_temporadas"];
                $imagen = $fila["imagen"];
            }


            $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
            $resultado = $_conexion -> query($sql);
            $estudios = [];


            while($fila = $resultado -> fetch_assoc()){
                array_push($estudios, $fila["nombre_estudio"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_anime = $_POST["id_anime"];
                $titulo = $_POST["titulo"];
                $nombre_estudio = $_POST["nombre_estudio"];
                $anno__estreno = $_POST["anno_estreno"];
                $num_temporadas = $_POST["num_temporadas"];

                $sql = "UPDATE animes SET
                    titulo = '$titulo',
                    nombre_estudio = '$nombre_estudio',
                    anno_estreno = '$anno_estreno',
                    num_temporadas = '$num_temporadas'
                    WHERE id_anime = $id_anime
                ";

                $_conexion -> query($sql);

            }
            
            

        ?>

        

        

        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo $titulo ?>">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre del Estudio</label>
                <br>
                <select name="nombre_estudio">
                <option value="<?php echo $nombre_estudio ?>" selected hidden><?php echo $nombre_estudio ?></option>
                <?php
                    foreach($estudios as $estudio){ ?>
                        <option value="<?php echo $estudio ?>">
                            <?php echo $estudio;?>
                        </option>
                 <?php   }
                ?>
                </select>
                <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>" ?>
            </div> 
            
            <div class="mb-3">
                <label class="form-label">Año de Estreno</label>
                <input type="text" class="form-control" name="anno_estreno" value="<?php echo $anno_estreno ?>">
                <?php if(isset($err_anno_estreno)) echo "<span class='error'>$err_anno_estreno</span>" ?>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Número de Temporadas</label>
                <input type="text" class="form-control" name="num_temporadas" value="<?php echo $num_temporadas ?>">
                <?php if(isset($err_num_temporadas)) echo "<span class='error'>$err_num_temporadas</span>" ?>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
            </div>
            <input type="hidden" name="id_anime" value="<?php echo $id_anime ?>">
            <input class="btn btn-primary" type="submit" value="Confirmar">
            <a class="btn btn-secondary" href="index.php">Volver a tabla</a>
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>