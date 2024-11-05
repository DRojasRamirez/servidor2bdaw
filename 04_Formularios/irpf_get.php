<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRPF</title>

    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );    

    DEFINE("TRAMO1" , 12450);
    DEFINE("TRAMO2" , 20199);
    DEFINE("TRAMO3" , 35199);
    DEFINE("TRAMO4" , 59999);
    DEFINE("TRAMO5" , 299999);
    ?>
</head>
<body>
    <!--
        15000 euros anuales

        12.450 € se aplica el 19%
        de 12.450€ a 15.000€ se aplica el 24%

        //crear copia de este documento con get y controlar errores
        de enviar formulario vacio

        cambiar todos los formularios mandados con post que se controle el
        formulairo vacio

    -->

    <form action="" method="get">

        <label for="bruto">Salario Bruto</label>
        <input type="text" name="bruto" id="bruto">
        <br><br>

        <input type="submit" value="Calcular">

        <?php
        

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $bruto = $_GET["bruto"];
            $resto;
            $neto;

            if($bruto != ''){
                if ($bruto <= TRAMO1){
                    $neto = $bruto - ($bruto * 0.19);
                } else if ($bruto > TRAMO1 && $bruto <= TRAMO2){
                    $resto = $bruto - TRAMO1;
                    $neto = $bruto - (TRAMO1 * 0.19) - ($resto * 0.24);
                } else if($bruto > TRAMO2 && $bruto <= TRAMO3){
                    $resto = $bruto - TRAMO2;
                    $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ($resto * 0.3);
                } else if($bruto > TRAMO3 && $bruto <= TRAMO4){
                    $resto = $bruto - TRAMO3;
                    $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ((TRAMO3-TRAMO2) * 0.3) - ($resto * 0.37);
                } else if($bruto > TRAMO4 && $bruto <= TRAMO5){
                    $resto = $bruto - TRAMO4;
                    $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ((TRAMO3-TRAMO2) * 0.3) - ((TRAMO4-TRAMO3) * 0.37) - ($resto * 0.45);
                } else if($bruto > TRAMO5){
                    $resto = $bruto - TRAMO5;
                    $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ((TRAMO3-TRAMO2) * 0.3) - ((TRAMO4-TRAMO3) * 0.37) - ((TRAMO5-TRAMO4) * 0.45) - ($resto * 0.47);
                } 
                echo "<h3>El salario neto seria: " . $neto . "€</h3>";
            } else {
                echo "<p>Te faltan datos</p>";
            }
        }
        ?>
    </form>
</body>
</html>