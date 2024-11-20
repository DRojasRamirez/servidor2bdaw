<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
</head>
<body>

     <h3><u>Ejercicio 1</u></h3>
     <p>Calcular la suma de todos los numeros pares de 1 a 20</p>

    <?php

    $i = 0;
    $suma = 0;
    
    while($i <= 20){
        $suma = $suma + $i;
        $i = $i+2;
    }
    
    echo "<h3>La suma da $suma</h3>";
    
    
    ?>


    <h3><u>Ejercicio 2</u></h3>
    <p>Mostrar la fecha actual con el siguiente formato: Viernes 27 de Septiembre de 2024
        Utilizar las estructuras de control necesarias</p>

    <!-- Ejercicio 2: Mostrar la fecha actual con el siguiente formato:
        Viernes 27 de Septiembre de 2024
        Utilizar las estructuras de control necesarias -->

        <?php
        
        $dia = date("j");

        $dia_semana = date("l");

		$dia_semana_espanol = null;

		$dia_semana_espanol = match ($dia_semana) {
			"Monday" => "Lunes",
			"Tuesday" => "Martes",
			"Wednesday" => "Miercoles",
			"Thursday" => "Jueves",
			"Friday" => "Viernes",
			"Saturday" => "Sabado",
			"Sunday" => "Domingo"
		};

        $mes = date("F");

        $mes_espanol = null;

        $mes_espanol = match ($mes) {
            "January" => "Enero",
			"February" => "Febrero",
			"March" => "Marzo",
			"April" => "Abril",
			"May" => "Mayo",
			"June" => "Junio",
			"July" => "Julio",
            "August" => "Agosto",
			"September" => "Septiembre",
			"October" => "Octubre",
			"November" => "Noviembre",
			"December" => "Diciembre"
        };

        $anio = date("Y");

        echo "<h1>$dia_semana_espanol $dia de $mes_espanol de $anio</h1>"
        
        ?>

        <h3><u>Ejercicio 3</u></h3>
        <p>Mostrar en una lista los números múltiplos de 3  hasta 100 usando WHile y IF</p>

    <?php
    
    $i = 1;

    echo "<p><ul>";
    while($i <= 100){
        if($i % 3 == 0){
            echo "<li>$i</li>";
        }        
        $i++;
    }
    echo "</ul></p>";

    ?>
        
    <!-- Ejercicio 4: calcular el factorial de 6 usando While-->

    <h3><u>Ejercicio 4</u></h3>
    <p>Calcular el factorial de 6 usando While</p>

    <?php

    $i = 1;

    $factorial = 1;

    while($i <= 6){        
        $factorial *= $i;
        $i++;
    }

    echo "<p>$factorial</p>";

    ?>

    <h3>Ejercicio 5</h3>
    <p>Muestra por pantalla los primeros 50 números primos</p>

    <?php

    /*
    *4 % 2 = 0
    *4 % 3 = 1
    
    * 5 % 2 = 1
    * 5 % 3 = 2
    * 5 % 4 = 1

    *
    *Bucle de 2 a N-1
    *
    */

    //$n = 7;
    $check = true;
    $contador = 0;

    echo "<ol>";
    for($n = 2; $contador<50; $n++){
        $check = true;
        for ($i=2; $i < $n ; $i++){
            if($n % $i == 0){
                $check = false;
                break; //de los pocos casos que seria posible usarlo sin morir en el intento
            }
        }
        if($check){
            echo "<li>$n</li>";
            $contador++;
        }
    }    
    
    echo "</ol>";


    ?>
    
</body>
</html>