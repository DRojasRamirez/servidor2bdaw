<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA-GET</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );    

    DEFINE("GENERAL" , 1.21);
    DEFINE("REDUCIDO" , 1.1);
    DEFINE("SUPERREDUCIDO" , 1.04);
    ?>

</head>
<body>
    <!--
    GENERAL = 21%
    REDUCIDO = 10%
    SUPERREDUCIDO = 4%

    10€ IVA = GENERAL, PVP = 12,1€
    10€ IVA = REDUCIDO, PVP = 11€

    -->
    <form action="" method="get">

        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value = "general">General</option>
            <option value = "reducido">Reducido</option>
            <option value = "superreducido">Superreducido</option>
        </select>
        <br><br>

        <input type="submit" value="Calcular">

        <?php
            //isset (is set) devuelve true si la variable existe
        if(isset($_GET["precio"]) && isset($_GET["iva"])){
            $precio = $_GET["precio"];
            $iva = $_GET["iva"];

            if($precio != '' && $iva != ''){
                $pvp = match ($iva) {
                    "general" => $precio * GENERAL,
                    "reducido" => $precio * REDUCIDO,
                    "superreducido" => $precio * SUPERREDUCIDO,
                    default => "ERROR"
                };
    
                echo "<h3>El total aplicando el IVA es " . $pvp . "€</h3>";
            } else {
                echo "<p>Te faltan datos</p>";
            }

            //var_dump($precio);
            //var_dump($iva);

            
        }
        ?>
    </form>
</body>
</html>