<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<!-- 
    Crear un formulario que reciba el nombre y la edad de una persona

    Si la edad es menor que 18, se mostrara el nombre y que es menor de edad

    Si la edad esta entre 18 y 65 se mostrara el nombre y que es mayor de edad

    Si la edad es mas de 65 se mostrara el nombre y que se ha jubilado
-->

    <form action="" method="post">

        <h1>Edades</h1>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <br><br>
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad">

        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];

        
        if($edad < 18){
            echo "$nombre es menor de edad";
        } elseif($edad >= 18 && $edad < 66){
            echo "$nombre es mayor de edad";
        } else {
            echo "$nombre sa jubilao";
        }

    }
    ?>

</body>
</html>