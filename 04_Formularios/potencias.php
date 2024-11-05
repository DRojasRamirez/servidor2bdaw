<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    

        require("../05_funciones/potencias.php");
    ?>
</head>
<body>

    <form action="" method="post">

        <h1>Calculadora de Potencias</h1>

        <label for="base">Base</label>
        <input type="text" name="base" id="base">

        <br><br>
        <label for="expo">Exponente</label>
        <input type="text" name="expo" id="expo">

        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $tmp_base = $_POST["base"];
        $tmp_expo = $_POST["expo"];
        
        /*if($tmp_base != ""){
            if(filter_var($tmp_base, FILTER_VALIDATE_INT) !== false) {
                $base = $tmp_base;
            } else {
                echo "<p>La base debe de ser un número</p>";
            }
        } else {
            echo "<p>La base es obligatoria</p>";
        }*/

        if($tmp_base == ""){
            echo "<p>La base es obligatoria</p>";
        } else {
            if(filter_var($tmp_base, FILTER_VALIDATE_INT) === false) {
                echo "<p>La base debe de ser un número</p>";
            } else {
                $base = $tmp_base; 
            }
        }

        if($tmp_expo != ""){
            if(filter_var($tmp_expo, FILTER_VALIDATE_INT) !== false){
                if($tmp_expo >= 0){
                    $expo = $tmp_expo;
                } else {
                    echo "<p>Funcion no valida para exponentes negativos</p>";
                }
            } else {
                echo "<p>La base debe de ser un número</p>";
            }
        } else {
            echo "<p>La base es obligatoria</p>";
        }

        if(isset($base) && isset($expo)){
            $resultado = potencia($base, $expo);
            echo "<h1>El resultado es $resultado</h1>";
        }
    }
    ?>
</body>
</html>