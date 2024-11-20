<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicacion</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    
<!-- 
    Crear un formulario que reciba un numero y mostramos  la tabla de multiplicar de ese numero
    en una tabla HTML

    2 x 1 = 2
    2 x 2 = 4
-->

    <form action="" method="post">

        <h1>Multiplicacion</h1>

        <label for="multiplo">Numero a multiplicar</label>
        <input type="text" name="multiplo" id="multiplo">

        <br><br>
        <input type="submit" value="Enviar">
        <br><br>
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $multiplo = $_POST["multiplo"];
        $resultados= array();
        
        for($i =1; $i < 11; $i++){
            $resultados[$i] = ($multiplo * $i);
        }

        //print_r($resultados);
        ?>
        <table>
            <thead>
                <tr>
                    <th>Tabla de multiplicar</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultados as $numero => $resultado){
                    ?>
                    <tr>
                    <td><?php echo $multiplo . "X" . $numero ?></td>
                    <td><?php echo $resultado ?></td>
                    </tr><?php
                };
                ?>
            </tbody>
        </table>


    <?php }
    ?>

    
</body>
</html>