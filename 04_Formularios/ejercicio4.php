<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );  

    ?>
</head>
<body>
    <!--
    EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de texto la temperatura, 
    y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.

    Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

    En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.
    -->
    <form action="" method="post">

        <label for="temperatura">Temperatura</label>
        <input type="text" name="temperatura" id="temperatura">
        <select name="temperaturaActual">
            <option value = "C">Celsius</option>
            <option value = "F">Fahrenheit</option>
            <option value = "K">Kelvin</option>
        </select>
        <br><br>
        <select name="temperaturaModificada">
            <option value = "C">Celsius</option>
            <option value = "F">Fahrenheit</option>
            <option value = "K">Kelvin</option>
        </select>

        <input type="submit" value="Calcular">

        <?php
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $temperatura = $_POST["temperatura"];
            $temperaturaActual = $_POST["temperaturaActual"];
            $temperaturaModificada = $_POST["temperaturaModificada"];

            switch($temperaturaActual){
                case "C":
                    $tresultado = match ($temperaturaModificada) {
                        "C" => $temperatura,
                        "F" => ($temperatura * 1.8) + 32,
                        "K" => $temperatura + 273,
                        default => "ERROR",
                    };
                break;
                case "F":
                    $tresultado = match ($temperaturaModificada) {
                        "F" => $temperatura,
                        "C" => ($temperatura - 32) / 1.8,
                        "K" => (($temperatura - 32) / 1.8) + 273,
                        default => "ERROR",
                    }; 
                break;
                case "K":
                    $tresultado = match ($temperaturaModificada) {
                        "K" => $temperatura,
                        "C" => $temperatura - 273,
                        "F" => (($temperatura - 273) * 1.8) + 32,
                        default => "ERROR",
                    };
                break;
                default:
                    echo "Como hemos llegado aqui?¿?¿??¿";
            }

            echo "<h3>La temperatura final es: " . $tresultado . $temperaturaModificada . "</h3>";

        }
        ?>
</body>
</html>