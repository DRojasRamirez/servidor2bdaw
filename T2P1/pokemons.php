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


        $apiUrl = "https://pokeapi.co/api/v2/pokemon?&limit=5";

        if(isset($_GET["limit"]) && isset($_GET["offset"])){

            $limit = $_GET["limit"];
            $offset = $_GET["offset"];
            $apiUrl = "https://pokeapi.co/api/v2/pokemon?offset=$offset&limit=$limit";
    
        } else if (isset($_GET["limit"]) ){
            $limit = $_GET["limit"];
            $apiUrl = "https://pokeapi.co/api/v2/pokemon?limit=$limit";
        }


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        //curl_close($curl);

        $datos = json_decode($respuesta, true);
        $pokemons = $datos["results"];
        
    ?>

    <form action="" method="get">
        <label>¿Cuántos pokemons quieres mostrar?</label>
        <input type="number" id="numero" name="limit" value="">
        <input type="submit" value="Mostrar">
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Sprite</th>
                <th>Tipos</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($pokemons as $pokemon){
                $apiUrl = $pokemon["url"];
                curl_setopt($curl, CURLOPT_URL, $apiUrl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);

                $datosPokemon = json_decode($respuesta, true);
                $sprites = $datosPokemon["sprites"];
                $tipos = $datosPokemon["types"];

                ?>
                <tr>
                    <td> <?php echo ucfirst($datosPokemon["name"]); ?> </td>
                    <td> <img width="100px" src="<?php echo $sprites["front_default"];?> "></td>
                    <td> <?php foreach($tipos as $tipo){
                        echo ucfirst($tipo["type"]["name"]) . " ";
                    }
                    ?></td>
                </tr>
          <?php  } ?>
        </tbody>
    </table>

    <?php

    if($datos["previous"] == null){

        //var_dump($datos["next"]);
        $urls = explode("?", $datos["next"]);
        //var_dump($urls[1]);
    
       ?> <a href="http://localhost/Ejercicios/T2P1/pokemons.php?<?php echo $urls[1]; ?>">Siguiente</a> <?php

    } else {

        $urlsPrevious = explode("?", $datos["previous"]);
        $urlPrev = $urlsPrevious[1];

        ?> <a href="http://localhost/Ejercicios/T2P1/pokemons.php?<?php echo $urlPrev ?>">Anterior</a>
         <?php
            $urlsNext = explode("?", $datos["next"]);
            $urlNext = $urlsNext[1];
        ?> 
        
        <a href="http://localhost/Ejercicios/T2P1/pokemons.php?<?php echo $urlNext ?>">Siguiente</a> <?php
    }

    ?>
</body>
</html>