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

    $apiUrl = "https://api.jikan.moe/v4/top/anime";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $animes = $datos["data"];
    //print_r($animes);

    ?>


    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Nota</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($animes as $anime){ ?>
                <tr>
                    <td><?php echo $anime["title"] ?></td>
                    <td><?php echo $anime["score"]?></td>
                    <td><img src="<?php echo $anime["images"]["jpg"]["image_url"]?>"></td>
                </tr>
         <?php  } ?>
        </tbody>
    </table>
    
</body>
</html>