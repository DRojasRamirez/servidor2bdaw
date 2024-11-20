<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>

	<?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>

</head>
<body>
    <?php
    /*
        $numero = "2";
        $numero = (int) $numero;
    
        if($numero == 2){
            echo "SUCCESS";
        } else {
            echo "FAILURE";
        }*/
    
        /*
        "2" == 2 es igual
        "2" !== 2 no es identico
        2 === 2 si es identico
        2 !== 2.0 no es identico
        
        */

		//$hora = (int)date("G");
		//var_dump($hora);

		/*
		SI $hora entre 6 y 11 es Mañana
		SI $hora entre 12 y 14 es Mediodia
		SI $hora entre 15 y 20 es Tarde
		SI &hora entre 20 y 0 es Noche
		SI &hora entre 1 y 5, es Madrugada
		*/

		//$tiempo = null;

		/*if($hora >= 6 && $hora <= 11){
			$tiempo = "Mañana";
		} elseif ($hora >= 12 && $hora <= 14){
			$tiempo = "Mediodia";
		} elseif($hora >= 15 && $hora <= 20) {
			$tiempo = "Tarde";
		} elseif($hora >= 21 && $hora <= 0) {
			$tiempo = "Noche";
		} elseif($hora >= 1 && $hora <= 5) {
			$tiempo = "Madrugada";
		}

		echo "<p>$tiempo</p>";*/
	
		$hora_exacta = date("H:i:s:u");
		echo "<h1>$hora_exacta</h1>";

		
		//echo "<h2>Hoy es $dia</h2>";

		/*Switch si para ver si hay clase de */
		
		//$hay = "Clase";

		//$dia = "Saturday";

		/*switch($dia){
			case "Monday":
			case "Wednesday":
			case "Friday":
				echo "$hay";
				break;
			case "Tuesday":
			case "Thursday":
			case "Saturday":
			case "Sunday":
				echo "NOT $hay";
				break;
			default:
				echo "Como hemos llegado aqui?¿?¿??¿";
		}*/

		/*Con una estructura Switch Cambiar la variable dia a español y reescribir el switch anteriorcon la variable traducida*/

		

		/*switch($dia){
			case "Monday":
				$dia = "Lunes";
				break;
			case "Wednesday":
				$dia = "Miercoles";
				break;
			case "Friday":
				$dia = "Viernes";
				break;
			case "Tuesday":
				$dia = "Martes";
				break;
			case "Thursday":
				$dia = "Jueves";
				break;
			case "Saturday":
				$dia = "Sábado";
				break;
			case "Sunday":
				$dia = "Domingo";
				break;
			default:
				echo "Como hemos llegado aqui?¿?¿??¿";
			}*/

			$dia = date("l");

			$dia_espanol = null;

			$dia_espanol = match ($dia) {
				"Monday" => "Lunes",
				"Tuesday" => "Martes",
				"Wednesday" => "Miercoles",
				"Thursday" => "Jueves",
				"Friday" => "Viernes",
				"Saturday" => "Sabado",
				"Sunday" => "Domingo"
			};

			switch($dia_espanol){
				case "Lunes":
				case "Miercoles":
				case "Viernes":
					echo "<p>Hoy es $dia_espanol y hay clase :)</p>";
					break;
				case "Martes":
				case "Jueves":
				case "Sabado":
				case "Domingo":
					echo "Hoy es $dia_espanol y no hay clase :(";
					break;
				default:
					echo "Como hemos llegado aqui?¿?¿??¿";
			}
    ?>
    
</body>
</html>