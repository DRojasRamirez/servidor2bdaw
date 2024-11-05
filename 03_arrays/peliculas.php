<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    $peliculas = [
        ["Karate a muerte en Torremolinos", "Acción", 1975],
        ["Sharknado 1-5","Accion", 2015],
        ["Princesa por sorpresa 2", "Comedia", 2008],
        ["Temblores 4", "Terror", 2018],
        ["Cariño, he encogido a los niños", "Aventuras", 2001],
        ["Stuart Little", "Infantil", 2000]
    ];

    /**
     * 1. Añadir con un rand, la duracion de cada pelicula, sera aleatorio entre 30 y 240
     * 
     * 2. Añadir como una nueva columna el tipo de pelicula, el tipo será:
     *      - cortometraje si la duracion es menos de 60
     *      - largometraje si es mayor o igual a 60
     * 3. Mostrar en Tabla, todas las columnas  y ordenadas en este orden:
     *      1º: Género(Alfabeticamente)
     *      2º: Año (De mas reciente a más antiguo)
     *      3ª: Título(Alfabeticamente)
     */

    for($i = 0; $i < count($peliculas); $i++){
        $peliculas[$i][3] = rand(30,240);
    }

    for($i = 0; $i < count($peliculas); $i++){
        if($peliculas[$i][3] < 60){
            $peliculas[$i][4] = "Cortometraje";
        } else {
            $peliculas[$i][4] = "Largometraje";
        }
        
    }

    $_titulo = array_column($peliculas, 0);
    $_genero = array_column($peliculas, 1);
    $_anio = array_column($peliculas, 2);
    

    array_multisort($_genero, SORT_ASC, 
                    $_anio, SORT_DESC,
                    $_titulo, SORT_ASC,
                    $peliculas);


    ?>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Género</th>
                <th>Año Salida</th>
                <th>Duracion (min)</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($peliculas as $pelicula){
                list($titulo, $genero, $anio, $duracion, $tipo) = $pelicula;
                ?>
                <tr>
                <td><?php echo $titulo ?></td>
                <td><?php echo $genero ?></td>
                <td><?php echo $anio ?></td>
                <td><?php echo $duracion ?></td>
                <td><?php echo $tipo ?></td>
                </tr><?php
            };
            ?>
        </tbody>
    </table>

</body>
</html>