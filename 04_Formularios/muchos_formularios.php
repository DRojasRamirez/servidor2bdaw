<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muchos Formularios</title>

    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        
        require('../05_funciones/ejemplo.php');
        require('../05_funciones/iva.php');
    ?>
</head>
<body>
    <h1>Formulario repetir mensaje</h1>
    <form action="" method="post">

        <h2>Introduce un mensaje</h2>
        <input type="text" name="mensaje">

        <h2>Introduce numero de veces que se mostrara</h2>
        <input type="text" name="veces">

        <br><br>
        <input type="hidden" name="accion" value="formulario_mensajeRep">
        <input type="submit" value="Enviar">
    </form>
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["accion"] == "formulario_mensajeRep"){
            $mensaje = $_POST["mensaje"];
            $veces = $_POST["veces"];

            repetirMensaje($veces, $mensaje);
        }
    }
    
    ?>
<h1>Formulario IVA</h1>
<form action="" method="post">

    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio">
    <br><br>
    <select name="iva">
        <option value = "general">General</option>
        <option value = "reducido">Reducido</option>
        <option value = "superreducido">Superreducido</option>
    </select>
    <br><br>
    <input type="hidden" name="accion" value="formulario_iva">
    <input type="submit" value="Calcular">
</form>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["accion"] == "formulario_iva"){
        $precio = $_POST["precio"];
        $iva = $_POST["iva"];
        if($precio != '' && $iva != ''){
            calcularIVA($iva, $precio);
        } else  {
            echo "<p>Te faltan datos</p>";
        }
    }
}
?>

            
           


</body>
</html>