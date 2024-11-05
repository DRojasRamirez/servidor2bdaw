<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );  

    ?>

</head>
<body>
    <!--
    EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.

    -->
    <form action="" method="post">

        <label for="numero1">Numero 1</label>
        <input type="text" name="numero1" id="numero1">
        <br><br>
        <label for="numero2">Numero 2</label>
        <input type="text" name="numero2" id="numero2">
        <br><br>
        <label for="numero3">Numero 3</label>
        <input type="text" name="numero3" id="numero3">
        <br><br>

        <input type="submit" value="Sacar Máximo">

        <?php
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            $numero3 = $_POST["numero3"];
            
            $mayor = $numero1;

            if($mayor < $numero2){
                $mayor = $numero2;
            }
            if($mayor < $numero3){
                $mayor = $numero3;
            }

            

            echo "<h3>El numero más grande es " . $mayor . "</h3>";

        }
        ?>
    </form>
</body>
</html>