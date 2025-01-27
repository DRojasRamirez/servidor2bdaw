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

        $id = $_GET["id"];
        $apiUrl = "https://api.jikan.moe/v4/producers/$id/full";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $productor = $datos["data"];
        $titulos = $productor["titles"]

    ?>

    <h1><?php echo $titulos[0]["title"] ?></h1>

    <img src="<?php echo $productor["images"]["jpg"]["image_url"] ?>">

    <p><?php echo $productor["about"] ?></p>
    
</body>
</html>