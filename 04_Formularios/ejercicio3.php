<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );  

    ?>
    
</head>
<body>
<!--
    EJERCICIO 3: Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos).
-->

    <form action="" method="post">

    <label for="numero1">Numero 1</label>
    <input type="text" name="numero1" id="numero1">
    <br><br>
    <label for="numero2">Numero 2</label>
    <input type="text" name="numero2" id="numero2">
    <br><br>

    <input type="submit" value="Calcular">

    <?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];
    //$resultado = "";


    echo "<ul>";
    for($n = $numero1; $n<=$numero2; $n++){
        $check = true;
        if($n == 1){
            $check = false;
        }
        for ($i=2; $i <= $n/2 ; $i++){
            if($n % $i == 0){
                $check = false;
                break; 
            }
        }
        if($check){
            /*$resultado .= $n . " ";*/
            echo "<li>$n</li>";
        }
    }    

    echo "</ul>";

    }
    ?>


</body>
</html>