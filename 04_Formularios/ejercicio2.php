<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );  

    ?>

</head>
<body>
    <!--
    EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c. Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.

    Por ejemplo, si a = 3, b = 10, c = 2

    Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10

    -->

    <form action="" method="post">

        <label for="min">Numero 1</label>
        <input type="text" name="min" id="min">
        <br><br>
        <label for="max">Numero 2</label>
        <input type="text" name="max" id="max">
        <br><br>
        <label for="multiplo">Numero 3</label>
        <input type="text" name="multiplo" id="multiplo">
        <br><br>

        <input type="submit" value="Calcular">

        <?php
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $min = (int)$_POST["min"];
            $max = (int)$_POST["max"];
            $multiplo = (int)$_POST["multiplo"];
            $resultados = [];
            $resultado = "Los múltiplos de " . $multiplo . " entre " . $min . " y " . $max . " son: " ;

            for($i = 0; $i <= $max; $i += $multiplo){
                if($i >= $min){
                    array_push($resultados, $i);
                }
            }

            for($i = 0; $i < count($resultados); $i++){
                if($i == count($resultados) - 1){
                    $resultado .= " y " . $resultados[$i];
                } else {
                    $resultado .= $resultados[$i] . ", ";
                }
            }

            echo "<h3>$resultado</h3>";

        }
        ?>

</body>
</html>