<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <form action="" method="post">

        <h2>Introduce un mensaje</h2>
        <input type="text" name="mensaje">

        <h2>Introduce numero de veces que se mostrara</h2>
        <input type="text" name="veces">

        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        /**
         * Este codigo se ejecuta cuando el servidor recibe una peticion POST
         */

        $mensaje = $_POST["mensaje"];
        $veces = $_POST["veces"];

        // Añadir al formulario un campo de texto adicional para introducir un numero
        // Mostrar el mensaje tantas veces como indique el numero
        
        for($i = 0; $i < $veces; $i++){           
            echo "<h1>$mensaje</h1>";
        }

    }
    
    
    ?>


</body>
</html>