<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );  

    ?>

</head>
<body>
    <form action="" method="post">
        <label for="numero">Número: </label>
        <input type="text" name="numero" id="numero">
        <br>
        <h4>Selecciona la operación a realizar</h4>
        <select name="operacion">
            <option value = "sumatorio">Sumatorio</option>
            <option value = "factorial">Factorial</option>
        </select>
        <br><br>

        <input type="submit" value="Calcular">

        <?php
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero = $_POST["numero"];
            $operacion = $_POST["operacion"];

            $resultadoSum = 0;
            $resultadoFac = 1;

            switch ($operacion){
                case "sumatorio":
                    for($i = 1; $i <= $numero; $i++){
                        $resultadoSum = $resultadoSum + $i; 
                    }
                    echo "<h3>El resultado del sumatorio de ". $numero . " es: " . $resultadoSum . "</h3>";
                    break;
                case "factorial":
                    for($i = 1; $i <= $numero; $i++){
                        $resultadoFac = $resultadoFac * $i; 
                    }
                    echo "<h3>El resultado del factorial de " . $numero . " es: " . $resultadoFac . "</h3>";
                    break;
                default:
                    echo "<h3>ERROR</h3>";
            }
        }
        ?>
    </form>
</body>
</html>