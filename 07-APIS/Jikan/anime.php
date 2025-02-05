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

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <?php

        if(!isset($_GET["id"])){
            header("location: topAnimes.php");
        }

        $id = $_GET["id"];
        $apiUrl = "https://api.jikan.moe/v4/anime/$id/full";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $anime = $datos["data"];
        //print_r($animes);
        $generos = $anime["genres"];
        $relacionados = $anime["relations"];
        $productores = $anime["producers"];

    ?>
    <div class="container">
        <h1 class="text-center"> <u><?php echo $anime["title"]; ?></u></h1>

        <div class="row">

            <div class="col-3"> 
                <h3> Puntuación: <?php echo $anime["score"]; ?></h3> 
            </div>

            <div class="col-6">
                <img src="<?php echo $anime["images"]["jpg"]["image_url"];?>">
            </div>
        
            <div class="col-3">

                <ul>
                    <?php
                    
                    foreach($generos as $genero){ ?>

                        <li><?php echo $genero["name"];?></li>

                    <?php   } ?>

                </ul>

            </div>
        </div>

        <div class="row">
            <div class="col-7">
                    <p><?php echo $anime["synopsis"]; ?></p>
            </div>

            <div class="text-center col-5"><iframe src="<?php echo $anime["trailer"]["embed_url"]?>"></iframe></div>
        </div>

        <div class="row">

            <div class="col-6">
                <h3>Relacionados: </h3>
                <ul>
                    <?php
            
                        foreach($relacionados as $relacionado){
                            $entradas = $relacionado["entry"]; 
                            foreach($entradas as $entrada){

                                if($entrada["type"] == "anime"){?>                            
                                    <a href="anime.php?id=<?php echo $entrada["mal_id"] ?>">
                                        <li><?php echo $entrada["name"];?></li>
                                    </a>
                                    <?php   }
                                }
                    } ?>
                </ul>
            </div>

            <div class="col-6">
                <h3>Productores</h3>
                    <ul>
                        <?php
                            foreach($productores as $productor){?>
                                <a href="productor.php?id=<?php echo $productor["mal_id"] ?>">
                                        <li><?php echo $productor["name"];?></li>
                                </a>
                            <?php } ?>
                    </ul>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>