<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRPF</title>

    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );    

    require("../05_funciones/irpf.php");
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

    <form action="" method="post">

        <label for="bruto">Salario Bruto</label>
        <input type="text" name="bruto" id="bruto">
        <br><br>

        <input type="submit" value="Calcular">

        <?php
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_bruto = $_POST["bruto"];
            
            if($tmp_bruto == ""){
                echo "<p>Salario obligatorio</p>";
            } else {
                if(filter_var($tmp_bruto, FILTER_VALIDATE_FLOAT) === false){
                    echo "<p>Dato no valido, debe de ser un numero</p>";
                } else {
                    if($tmp_bruto < 0){
                        echo "<p>Salario debe ser mayor que 0</p>";
                    } else {
                        $bruto = $tmp_bruto;
                    }
                }
            }

            if(isset($bruto)){
                $salario = calcularIRPF($bruto);
                echo "<h1>El salario neto es $salario</h1>";
            }
        }
        ?>
    </form>
</body>
</html>