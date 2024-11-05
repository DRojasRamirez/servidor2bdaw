<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );  

    ?>
</head>
<body>
    <?php
    
    $matriz = [];

    $array_ale_enano = [];
    
    $array_ale_enorme = [];

    for($i = 0; $i < 5; $i++){
        $array_ale_enano[$i] = rand(1,10);
        $array_ale_enorme[$i] = rand(10,100);
    }

    array_push($matriz, $array_ale_enano);
    array_push($matriz, $array_ale_enorme);

    for($i = 0; $i < count($matriz); $i++){
        ?> <p>
            <?php
            for($j = 0; $j < count($matriz[$i]); $j++){
                if($j == count($matriz[$i]) - 1){
                    echo $matriz[$i][$j];
                }else{
                    echo $matriz[$i][$j] . ", ";
                }      
            }
            ?>
        </p>
   <?php } ?>

   <?php
   
   $max = 0;
   $min = 100;
   $media = 0;
   
   for($i = 0; $i < count($array_ale_enano); $i++){
        if($array_ale_enano[$i] < $min){
            $min = $array_ale_enano[$i];
        }
        if($array_ale_enano[$i] > $max){
            $max = $array_ale_enano[$i];
        }
        $media += $array_ale_enano[$i]; 
   }

   $media = $media/count($array_ale_enano);

   echo "<h3>El valor minimo del primer array es " . $min . " el mayor es " . $max ." y la media es " . $media . "</h3>";

   $media = 0;
   $min = 100;
   $max = 0;

   for($i = 0; $i < count($array_ale_enorme); $i++){
        if($array_ale_enorme[$i] < $min){
            $min = $array_ale_enorme[$i];
        }
        if($array_ale_enorme[$i] > $max){
            $max = $array_ale_enorme[$i];
        }
        $media += $array_ale_enorme[$i]; 
    }

    $media = $media/count($array_ale_enorme);

    echo "<h3>El valor minimo del segundo array es " . $min . " el mayor es " . $max ." y la media es " . $media . "</h3>";
   
   ?>
    
</body>
</html>