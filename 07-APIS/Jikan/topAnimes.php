<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php 
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );        
    ?>
    
</head>
<body>


<?php

    $apiUrl = "https://api.jikan.moe/v4/top/anime?page=1";

    if(isset($_GET["type"])){

        $type = $_GET["type"];
        $apiUrl = "https://api.jikan.moe/v4/top/anime?type=$type";

    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $animes = $datos["data"];
    //print_r($animes);


    ?>

    <form action="" method="get">
        <label>Serie</label>
        <input type="radio" id="serie" name="type" value="TV">
        <br>
        <label>Película</label>
        <input type="radio" id="pelicula" name="type" value="Movie">
        <br>
        <label>Todos</label>
        <input type="radio" id="all" name="type" value="" checked>
        <br>
        <input type="submit" value="Enviar">
    </form>


    <table>
        <thead>
            <tr>
                <th>Posición</th>
                <th>Título</th>
                <th>Nota</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($animes as $anime) { ?>
                <tr>
                    <td><?php echo $anime["rank"] ?></td>
                    <td>
                        <a href="anime.php?id=<?php echo $anime["mal_id"] ?>">
                            <?php echo $anime["title"] ?>
                        </a>
                    </td>
                    <td><?php echo $anime["score"] ?></td>
                    <td>
                        <img width="100px" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    
        $pagination = $datos["pagination"];

        $paginaSiguiente = $pagination["current_page"] + 1;
        var_dump($paginaSiguiente);
        $paginaAnterior = $pagination["current_page"] - 1; 

        if($pagination["current_page"] > 1 && $pagination["has_next_page"]){ ?>

            <a href="topAnimes.php?page=" . $paginaAnterior>Anterior</a>
            <a href="topAnimes.php?page=" . $paginaSiguiente>Siguiente</a>

<?php   } else if(!$pagination["has_next_page"]){ ?>

            <a href="topAnimes.php?page=" . $paginaAnterior>Anterior</a>

<?php   } else { ?>

            <a href="topAnimes.php?page=" . $paginaSiguiente>Siguiente</a>

      <?php  } ?>

    
</body>
</html>