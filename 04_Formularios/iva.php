<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );    
    
    require("../05_funciones/iva.php");
    ?>
    <style>
        .error{
            font-style: italic;
            color: red;
        }
    </style>

</head>
<body>
    <!--
    GENERAL = 21%
    REDUCIDO = 10%
    SUPERREDUCIDO = 4%

    10€ IVA = GENERAL, PVP = 12,1€
    10€ IVA = REDUCIDO, PVP = 11€

    -->
    <?php
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_precio = $_POST["precio"];
            if(isset($_POST["iva"])){
                $tmp_iva = $_POST["iva"];
            } else {
                $tmp_iva = "";
            }

            if($tmp_precio == ''){
                $err_precio = "Precio necesario";
            } else  {
                if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === false){
                    $err_precio = "Precio debe ser un valor numerico";
                } else {
                    if($tmp_precio < 0){
                        $err_precio = "Precio debe ser mayor que 0";
                    } else {
                        $precio = $tmp_precio;
                    }
                }
            }
            if($tmp_iva == ''){
                $err_iva = "Iva necesario";
            } else  {
                $valores_validos_iva = ["general", "reducido", "superreducido"];
                if(!in_array($tmp_iva, $valores_validos_iva)){
                    $err_iva = "Iva debe de ser un valor valido: general, reducido o superreducido";
                } else {
                    $iva = $tmp_iva;
                }
            }
        }
    ?>
    <form action="" method="post">

        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <?php if(isset($err_precio)) echo "<span class='error'>$err_precio</span>"; ?>
        <br><br>
        <select name="iva">
            <option disabled selected hidden>--- Elige un tipo de IVA ---</option>
            <option value = "general">General</option>
            <option value = "reducido">Reducido</option>
            <option value = "superreducido">Superreducido</option>
        </select>
        <?php if(isset($err_iva)) echo "<span class='error'>$err_iva</span>"; ?>
        <br><br>
        <input type="submit" value="Calcular">

    </form>

    <?php
        if(isset($precio) && isset($iva)){
            $pvp = calcularIVA($iva, $precio);
            echo "<h1>El precio final es $pvp</h1>";
        }
    ?>
</body>
</html>