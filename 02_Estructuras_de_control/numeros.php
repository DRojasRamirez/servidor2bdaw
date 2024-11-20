<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros</title>
</head>
<body>
    <?php
    /*
        $numero = 2;*/

        /*if($numero > 0){
            echo "<p> 1 El numero $numero es mayor que cero </p>";
        }

        if($numero > 0) echo "<p> 2 El numero $numero es mayor que cero </p>";

        if ($numero > 0):
            echo "<p> 3 El numero $numero es mayor que cero </p>";
        endif;    */
    
        //$numero = -3;

        /*if($numero > 0){
            echo "<p> 1 El numero $numero es mayor que cero </p>";
        } else {
            echo "<p> 1 El numero $numero es menor que cero </p>";
        }

        if($numero > 0) echo "<p> 2 El numero $numero es mayor que cero </p>";
        else echo "<p> 2 El numero $numero es menor que cero </p>";

        if ($numero > 0):
            echo "<p> 3 El numero $numero es mayor que cero </p>";
        else:
            echo "<p> 3 El numero $numero es menor que cero </p>";
        endif;*/

        //$numero = 0;

        /*if($numero > 0){
            echo "<p> 1 El numero $numero es mayor que cero </p>";
        } elseif ($numero == 0) {
            echo "<p> 1 El numero $numero es cero </p>";
        } else {
            echo "<p> 1 El numero $numero es menor que cero </p>";
        }*/

       /* if($numero > 0) echo "<p> 2 El numero $numero es mayor que cero </p>";
        elseif ($numero == 0)  echo "<p> 2 El numero $numero es cero </p>";
        else echo "<p> 2 El numero $numero es menor que cero </p>";

        if ($numero > 0):
            echo "<p> 3 El numero $numero es mayor que cero </p>";
        elseif ($numero == 0):
            echo "<p> 3 El numero $numero es cero </p>";
        else:
            echo "<p> 3 El numero $numero es menor que cero </p>";
        endif;*/

    ?>

    <?php
    # Rangos [-10,0), [10,20], (10,20]

    //$num = -7;

    // and o && para la conjuncion

   /* if($num >= -10 && $num < 0){
        echo "<p> El numero $num esta en el rango [-10,0)</p>";
    } elseif ($num >= 0 && $num <= 10){
        echo "<p> El numero $num esta en el rango [0,10]</p>";
    } elseif ($num > 10 && $num <= 20){
        echo "<p> El numero $num esta en el rango (10,20]</p>";
    } else {
        echo "<p> El numero $num no esta en el rango</p>";
    }*/

    /*
    comprobar de 3 formas diferentes con estructura if si el numero aleatorio tiene 1, 2 o 3 digitos
    */

    $numero_aleatorio = rand(1,200);
    $digitos = null;

    //$numero_aleatorio_decimal = rand (10,100)/10;

    if($numero_aleatorio >= 1 && $numero_aleatorio <= 9){
        $digitos = 1;
    } elseif ($numero_aleatorio >= 10 && $numero_aleatorio <= 99){
        $digitos = 2;
    } elseif($numero_aleatorio >= 100 && $numero_aleatorio <= 200) {
        $digitos = 3;
    }

    $digitos_texto = "digitos";
    if($digitos == 1) $digitos_texto = "dígito";

    echo "<p>El número $numero_aleatorio tiene $digitos $digitos_texto</p>";


    //Version con MATCH
    $resultado = match (true) {
        $numero_aleatorio >= 1 && $numero_aleatorio <= 9 => 1,
        $numero_aleatorio >= 10 && $numero_aleatorio <= 99 => 2,
        $numero_aleatorio >= 100 && $numero_aleatorio <= 999 => 3,
        default => "ERROR"
    };
    
    echo "<p>El número $numero_aleatorio tiene $resultado dígitos</p>";

    $n = rand(1,3);

    switch($n){
        case 1:
            echo "El numero es 1";
            break;
        case 2:
            echo "El numero es 2";
            break;
        default:
            echo "El numero es 3";
    }

    $resultado = match ($n) {
        1 => "El numero es 1",
        2 => "El numero es 2",
        3 => "El numero es 3"
    };

    echo "<h3>$resultado</h3>";

    ?>


</body>
</html>