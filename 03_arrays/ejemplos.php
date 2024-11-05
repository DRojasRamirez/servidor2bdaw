<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>

</head>
<body>
    
    <?php
    /*
    Todos los arrays en PHP son asociativos como los MAP de Java

    Tienes pares CLAVE-VALOR
    
    */

    $numeros = [5, 10, 9, 6, 7, 4];
    $numeros = array(6, 10, 9, 4, 3);
    print_r($numeros); //PRINT RELATIONAL

    echo "<br></br>";
    $animales = ["Perro", "Gato", "Ornitorrinco", "Suricato", "Capibara", "Dragon de Komodo"];
    /*$animales = [
        "A01" => "Perro",
        "A02" => "Gato",
        "A03" => "Ornitorrinco",
        "A04" => "Suricato",
        "A05" => "Capibara",
        "A06" => "Dragon de Komodo",
    ];*/

    //print_r($animales);

    echo "<p>" . $animales[3] . "<p>";

    //Añadir con clave al array
    $animales[2] = "Koala";
    $animales[7] = "Iguana";
    $animales["A01"] = "Elefante";

    //Añadir sin clave al array
    array_push($animales, "Morsa", "Foca");
    $animales[] = "Ganso";

    //Borrar registro
    unset($animales[1]);

    print_r($animales);

    //Reindexar a valores numericos ordenados
    $animales = array_values($animales);

    //No existe .leght, hay que usar el count para guardarlo en una variable
    $cantidad_animales = count($animales);
    echo "<h3>Hay $cantidad_animales de animales</h3>";

    echo "<p><u>Recorrer con For</u></p>";

    echo "<ol>";
    for ($i=0 ; $i < count($animales) ; $i++ ) { 
        echo "<li>" . $animales[$i] . "</li>";
    }
    echo "</ol>";

    echo "<p><u>Recorrer con While</u></p>";

    echo "<ol>";
    $i = 0;
    while ($i < count($animales)){
        echo "<li>" . $animales[$i] . "</li>";
        $i++;
    }
    echo "</ol>";

    echo "<br>";

    print_r($animales);

    /*Array de matriculas
        4321 TDZ => "Audi T1"
        1233 CDG => "Mercedes CLR"
        
        Crear El ARRAY con 3 coches

        Añadir dos coches con matricula

        Añadir un coche sin matricula

        Borrar coche sin matricula

        Resetear claves y almacenar resultado en otro array
    */

    echo "<h2> Ejercicio Arrays </h2>";

    $coches = [
        "6723 GHJ" => "Seat Ibiza",
        "9245 JSD" => "Citroen C5",
        "2563 KLS" => "Dacia Duster",
    ];

    echo "<br>";

    print_r($coches);

    $coches["7384 LRS"] = "Seat Leon";
    $coches["2015 HDF"] = "Renault Clio";

    echo "<br><br>";

    print_r($coches);

    array_push($coches, "Peugeot 207");

    //echo "<br><br>";

    //print_r($coches);

    //unset($coches[0]);

    //echo "<br><br>";

    //print_r($coches);

    $coches_reindex = array_values($coches);

    //echo "<br><br>";

    // print_r($coches_reindex);

    //Lista FOREACH

    echo "<ol>";
    foreach($coches as $coche){
        echo "<li>$coche</li>";
    }
    echo "</ol>";

    //Lista FOREACH con clave

    echo "<ol>";
    foreach($coches as $matricula => $coche){
        echo "<li>$matricula, $coche</li>";
    }
    echo "</ol>";
    ?>

    <table>
        <caption>Coches</caption>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Coche</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2133 FSD</td>
                <td>Ferrari 355</td>
            </tr>
            <?php
                /*foreach($coches as $matricula => $coche){
                    echo "<tr>";
                    echo "<td>$matricula</td>";
                    echo "<td>$coche</td>";
                    echo "</tr>";
                }*/
                foreach($coches as $matricula => $coche){ ?>
                    <tr>
                        <td><?php echo $matricula ?></td>
                        <td><?php echo $coche ?></td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>


