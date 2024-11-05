<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de Tablas</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>

</head>
<body>
    <!-- EJERCICIO 1

        Desarrollo web en entorno servidor => Alejandra,
        Desarrollo web en entorno cliente => Jose Miguel,
        Diseño en interfaces web => Jose Miguel,
        Despliegue de aplicaciones => Jaime,
        Empresa e iniciativa emprendedora => Andrea,
        Inglés => Virginia,

        Mostrarlo todo en una Tabla

    -->

    <h2>Ejercicio 1</h2>
    <?php

    $profesores = [
        "Desarrollo web en entorno servidor" => "Alejandra",
        "Desarrollo web en entorno cliente" => "Jose Miguel",
        "Diseño en interfaces web" => "Jose Miguel",
        "Despliegue de aplicaciones" => "Jaime",
        "Empresa e iniciativa emprendedora" => "Andrea",
        "Inglés" => "Virginia",
    ];
    krsort($profesores);
    ?>
    
    <table>
        <caption>Medac 2ºB DAW</caption>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor/a</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($profesores as $asignatura => $docente){ ?>
                    <tr>
                        <td><?php echo $asignatura ?></td>
                        <td><?php echo $docente ?></td>
                </tr>
                <?php } ?>
        </tbody>
    </table>



    <!-- EJERCICIO 2   
        Francisco => 3,
        Daniel => 5,
        Aurora => 10,
        Luis => 7,
        Samuel => 9,

        MOSTRAR EN UNA TABLA CON 3 COLUMNAS
            - COLUMNA 1: ALUMNO
            - COLUMNA 2: NOTA
            - COLUMNA 3: SI NOTA < 5, SUSPENSO, ELSE, APROBADO 
    -->

    <h2>Ejercicio 2</h2>

    <?php

    $estudiantes = [
        "Francisco" => 3,
        "Daniel" => 5,
        "Aurora" => 10,
        "Luis" => 7,
        "Samuel" => 9,
        "Juanjo" => 2,
        "Vicente" => 1,
    ];
    ?>

    <table>
        <caption>Medac 2ºB DAW</caption>
        <thead>
            <tr>
                <th>Alumno/a</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($estudiantes as $alumno => $nota){ ?>
                    <tr>
                        <td><?php echo $alumno ?></td>
                        <td><?php echo $nota ?></td>
                            <?php if ($nota < 5) {
                                echo "<td class='suspenso'>Suspenso</td>";
                            }
                            elseif ($nota >= 7 and $nota <= 8) {
                                echo "<td class='notable'>Notable</td>";
                            }elseif ($nota >= 5 and $nota <= 6) {
                                echo "<td class='aprobado'>Aprobado</td>";
                            }else {
                                echo "<td class='sobresaliente'> Sobresaliente</td>";
                            }
                            ?>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <?php
    /**
     * Insertar dos nuevos estudiantes con notas aleatorias entre 0 y 10
     * 
     * Borrar un estudiante (el que peor me caiga) por la clave
     * 
     * Mostrar en una nueva tabla todo ordenado por los nombres alfabeticamente inverso
     *  
     * Mostar en una nueva tabla todo ordenado por la nota de 10 a 0 (orden inverso) 
     */
    
    $estudiantes["Anni"] = rand(0,10);
    $estudiantes["Alejo"] = rand(0,10);
    
    unset($estudiantes["Vicente"]);

    krsort($estudiantes);

    ?>
    <h3>Tabla nombres inverso</h3>
    <table>
        <caption>Medac 2ºB DAW</caption>
        <thead>
            <tr>
                <th>Alumno/a</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($estudiantes as $alumno => $nota){ ?>
                    <tr>
                        <td><?php echo $alumno ?></td>
                        <td><?php echo $nota ?></td>
                            <?php if ($nota < 5) {
                                echo "<td class='suspenso'>Suspenso</td>";
                            }
                            elseif ($nota >= 7 and $nota <= 8) {
                                echo "<td class='notable'>Notable</td>";
                            }elseif ($nota >= 5 and $nota <= 6) {
                                echo "<td class='aprobado'>Aprobado</td>";
                            }else {
                                echo "<td class='sobresaliente'> Sobresaliente</td>";
                            }
                            ?>
                    </tr>
                <?php } ?>
        </tbody>
    </table>

    <h3>Tabla notas menos a mas nota</h3>
    <?php
        asort($estudiantes);
    ?>

    <table>
        <caption>Medac 2ºB DAW</caption>
        <thead>
            <tr>
                <th>Alumno/a</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($estudiantes as $alumno => $nota){ ?>
                    <tr>
                        <td><?php echo $alumno ?></td>
                        <td><?php echo $nota ?></td>
                            <?php if ($nota < 5) {
                                echo "<td class='suspenso'>Suspenso</td>";
                            }
                            elseif ($nota >= 7 and $nota <= 8) {
                                echo "<td class='notable'>Notable</td>";
                            }elseif ($nota >= 5 and $nota <= 6) {
                                echo "<td class='aprobado'>Aprobado</td>";
                            }else {
                                echo "<td class='sobresaliente'> Sobresaliente</td>";
                            }
                            ?>
                    </tr>
                <?php } ?>
        </tbody>
    </table>

</body>
</html>