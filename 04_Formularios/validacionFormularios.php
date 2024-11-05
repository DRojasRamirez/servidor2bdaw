<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio de clase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
    function depurar($entrada) : string {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        $salida = stripslashes($salida);
        $salida = preg_replace("!\s+!", " ", $salida);        
        return $salida;
    }
    ?>

    <div class="container">

        <p>Validacion de Formularios</p>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $tmp_dni = depurar($_POST ["dni"]);
            $tmp_nombre = depurar($_POST ["nombre"]);
            $tmp_apellido1 = depurar($_POST ["apellido1"]);
            $tmp_apellido2 = depurar($_POST ["apellido2"]);
            $tmp_fecha = depurar($_POST ["fecha"]);
            $tmp_mail = depurar($_POST ["mail"]);

            if($tmp_dni == ""){
                $err_dni = "El DNI es obligatorio";
            } else {
                // 8 caracteres y una letra, La letra debe de ser correcta al calculo oficial
                if(strlen($tmp_dni) != 9){
                    $err_dni = "El DNI debe de contener 9 caracteres en total";
                } else {
                    $tmp_dni = strtoupper($tmp_dni);
                    $patron = "/^[0-9]{8}[A-Z]$/";
                    if(!preg_match($patron, $tmp_dni)){
                        $err_dni = "El DNI debe de contener obligatoriamente 8 números y una letra";
                    } else {
                        $num_dni = substr($tmp_dni, 0, 8);
                        $num_dni = $num_dni % 23;

                        /*$letra_dni = match ($num_dni) {
                            0 => "T",
                            1 => "R",
                            2 => "W",
                            3 => "A",
                            4 => "G",
                            5 => "M",
                            6 => "Y",
                            7 => "F",
                            8 => "P",
                            9 => "D",
                            10 => "X",
                            11 => "B",
                            12 => "N",
                            13 => "J",
                            14 => "Z",
                            15 => "S",
                            16 => "Q",
                            17 => "V",
                            18 => "H",
                            19 => "L",
                            20 => "C",
                            21 => "K",
                            22 => "E",
                            default => "ERROR"
                        };*/

                        $letras_dni = "TRWAGMYFPDXBNJZSQVHLCKE";
                        $letra_dni = substr($letras_dni, $num_dni, 1);

                        if($letra_dni != substr($tmp_dni, -1)){
                            $err_dni = "La letra del DNI es erronea";
                        } else {
                            $dni = $tmp_dni;
                        }                       
                    }                 
                }
            }

            if($tmp_nombre == ""){
                $err_nombre = "El nombre es obligatorio";
            } else {
                if(strlen($tmp_nombre < 2) || strlen($tmp_nombre) > 40){
                    $err_nombre = "El nombre debe de tener entre 2 y 40 caracteres";
                } else {
                    // letras, esacios en blanco y tildes
                    $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]+$/";
                    if(!preg_match($patron, $tmp_nombre)){
                        $err_nombre = "El nombre solo puede contener letras y espacios en blanco";
                    } else {
                        $tmp_nombre = ucwords(strtolower($tmp_nombre));
                        $nombre = $tmp_nombre;
                    }
                }
            }

            if($tmp_apellido1 == ""){
                $err_apellido1 = "El apellido es obligatorio";
            } else {
                if(strlen($tmp_apellido1 < 2) || strlen($tmp_apellido1) > 40){
                    $err_apellidos = "El apellido debe de tener entre 4 y 60 caracteres";
                } else {
                    // letras, esacios en blanco y tildes
                    $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]+$/";
                    if(!preg_match($patron, $tmp_apellido1)){
                        $err_apellido1 = "El apellido solo puede contener letras y espacios en blanco";
                    } else {
                        $tmp_apellido1 = ucwords(strtolower($tmp_apellido1));
                        $apellido1 = $tmp_apellido1;
                    }
                }
            }

            if($tmp_apellido2 == ""){
                $err_apellido2 = "El apellido es obligatorio";
            } else {
                if(strlen($tmp_apellido2 < 2) || strlen($tmp_apellido2) > 40){
                    $err_apellido2 = "El apellido debe de tener entre 4 y 60 caracteres";
                } else {
                    // letras, esacios en blanco y tildes
                    $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]+$/";
                    if(!preg_match($patron, $tmp_apellido2)){
                        $err_apellido2 = "El apellido solo puede contener letras y espacios en blanco";
                    } else {
                        $tmp_apellido2 = ucwords(strtolower($tmp_apellido2));
                        $apellido2 = $tmp_apellido2;
                    }
                }
            }

            if($tmp_mail == ""){
                $err_mail = "El email es obligatorio";
            } else {
                $patron = "/^[a-zA-Z0-9_\-.+]+@([a-zA-Z0-9-]+.)+[a-zA-Z]+$/";
                if(!preg_match($patron, $tmp_mail)){
                    $err_mail = "Email no valido";
                } else {
                    $palabras_baneadas = ["caca", "peo", "recorcholis", "caracoles", "repampanos"];
                    
                    $palabras_encontradas = "";

                    foreach($palabras_baneadas as $palabra_baneada){
                        if(str_contains($tmp_mail, $palabra_baneada)){
                            $palabras_encontradas = "$palabra_baneada, " . $palabras_encontradas;
                        }
                        if($palabras_encontradas != ""){
                            $err_mail = "No se permiten las palabras: $palabras_encontradas";
                        } else {
                            $mail = $tmp_mail;
                        }
                    }
                }
            }

            if($tmp_fecha == ""){
                $err_fecha = "La fecha de nacimiento es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha)){
                    $err_fecha = "Formato de fecha no valido";
                }else {
                        //------------/
                    $fechaActual = date("Y-m-d");
                    /* Otra forma de realizarlo
                    list($anio_actual, $mes_actual, $dia_actual) = explode("-", $fechaActual);
                    */
                    $fechaSeparadaActual = explode("-", $fechaActual);
                    $fechaTmpSeparada = explode("-", $tmp_fecha);

                    $mayorAnio = $fechaSeparadaActual[0] - $fechaTmpSeparada[0];

                    if($mayorAnio < 18){
                        $err_fecha = "No se permite el acceso a usuarios menores de edad";
                    } else if ($mayorAnio > 121){
                        $err_fecha = "No tenemos constancia de usuarios mayores de 120 años";
                    } else if ($mayorAnio == 121){

                        $mayorMes = $fechaSeparadaActual[1] - $fechaTmpSeparada[1]; 

                        if($mayorMes > 0){
                            $err_fecha = "No se permite el acceso a usuarios tan mayores";
                        } else if ($mayorMes == 0){

                            $mayorDia = $fechaSeparadaActual[2] - $fechaTmpSeparada[2];
                            
                            if($mayorDia >= 0){
                                $err_fecha = "No se permite el acceso a usuarios tan mayores";
                            } else {
                                $fecha = $tmp_fecha;
                            }

                        } else {
                            $fecha = $tmp_fecha;
                        }

                    } else if($mayorAnio == 18){

                        $mayorMes = $fechaSeparadaActual[1] - $fechaTmpSeparada[1]; 

                        if($mayorMes < 0){
                            $err_fecha = "No se permite el acceso a usuarios menores de edad";
                        } else if ($mayorMes == 0){

                            $mayorDia = $fechaSeparadaActual[2] - $fechaTmpSeparada[2];
                            
                            if($mayorDia < 0){
                                $err_fecha = "No se permite el acceso a usuarios menores de edad";
                            } else {
                                $fecha = $tmp_fecha;
                            }

                        } else {
                            $fecha = $tmp_fecha;
                        }
                    } else {
                        $fecha = $tmp_fecha;
                    }
                }
            }
        }
        ?>

        <form class="col-5" action="" method="post">
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni">
                <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="apellido1">
                <?php if(isset($err_apellido1)) echo "<span class='error'>$err_apellido1</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="apellido2">
                <?php if(isset($err_apellido2)) echo "<span class='error'>$err_apellido2</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha">
                <?php if(isset($err_fecha)) echo "<span class='error'>$err_fecha</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="text" class="form-control" name="mail">
                <?php if(isset($err_mail)) echo "<span class='error'>$err_mail</span>" ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        if(isset($dni) && isset($nombre) && isset($apellido1) && isset($apellido2)
         && isset($mail) && isset($fecha)){ ?>
            <p><?php echo $dni ?></p>
            <p><?php echo $nombre ?></p>
            <p><?php echo $apellido1 ?></p>
            <p><?php echo $apellido2 ?></p>
            <p><?php echo $mail ?></p>
            <p><?php echo $fecha ?></p>
       <?php } ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>