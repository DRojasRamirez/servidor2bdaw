<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>

    <?php

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );  

    ?>
</head>
<body>
    <?php

    //Creamos un array-bidimensional con 3 animes para comenzar el ejercicio
    $animes = [
        ["Code Geass", "Suspense"],
        ["Dungeon Meshi", "Adventuras culinarias"],       
        ["Psycho Pass", "Policial"],
    ];

    //Insertamos dos nuevos animes al array-bidimensional
    array_push($animes, ["Frieren", "Fantasía"]);
    array_push($animes, ["One Piece", "Adventuras"]);

    //Borramos el primer anime y reseteamos las claves para evitar conflictos futuros
    unset($animes[0]);
    $animes = array_values($animes);

    //Creamos un tercer valor para los animes siendo este el año
    for($i = 0; $i < count($animes); $i++){
        $animes[$i][2] = rand(1990, 2030);  
    }

    //Creamos un cuarto valor para los animes siendo este el número de episodios
    for($i = 0; $i < count($animes); $i++){
        $animes[$i][3] = rand(1, 99);  
    }

    //Creamos un quinto valor para los animes siendo este su disponibilidad basado en el año
    for($i = 0; $i < count($animes); $i++){
        if($animes[$i][2] < 2025){
            $animes[$i][4] = "Ya disponible";
        } else {
            $animes[$i][4] = "Próximamente";
        }        
    }

    //Ordenamos el array segun lo solicitado en el ejercicio
    $_titulo = array_column ($animes, 0);
    $_genero = array_column ($animes, 1);
    $_anio = array_column ($animes, 2);
    array_multisort($_genero, SORT_ASC, 
                    $_anio, SORT_ASC,
                    $_titulo, SORT_ASC,
                    $animes);
    ?>

    <!--Creamos la tabla y la rellenamos con los datos del array-bidimensional-->
    <table border>
        <caption>Animes</caption>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Género</th>
                    <th>Año</th>
                    <th>Episodios</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($animes as $anime){
                    list($titulo, $genero, $anio, $caps, $disponibilidad) = $anime;
                    echo "<tr>";
                    echo "<td>$titulo</td>";
                    echo "<td>$genero</td>";
                    echo "<td>$anio</td>";
                    echo "<td>$caps</td>";
                    echo "<td>$disponibilidad</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
    </table>

</body>
</html>