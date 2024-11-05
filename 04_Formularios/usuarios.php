<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regex + Bootstrap</title>
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
    
    <div class="container">
        <!-- Content here -->
        <h1>Formulario usuario</h1>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $tmp_usuario = $_POST ["usuario"];
            $tmp_nombre = $_POST ["nombre"];
            $tmp_apellidos = $_POST ["apellido"];

            if($tmp_usuario == ""){
                $err_usuario = "El usuario es obligatorio";
            } else {
                // letras a A -- z Z (mayus o minus), numeros y barrabaja (4 -12 chars)
                $patron = "/^[a-zA-Z0-9_]{4,12}$/";
                if(!preg_match($patron, $tmp_usuario)){
                    $err_usuario = "El usuario debe de contener de 4 a 12 caracteres,
                        solo letras, numeros o barrabaja";
                } else {
                    $usuario = $tmp_usuario;
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
                        $nombre = $tmp_nombre;
                    }
                }
            }

            if($tmp_apellidos == ""){
                $err_apellidos = "El apellido es obligatorio";
            } else {
                if(strlen($tmp_apellidos < 4) || strlen($tmp_apellidos) > 60){
                    $err_apellidos = "El apellido debe de tener entre 4 y 60 caracteres";
                } else {
                    // letras, esacios en blanco y tildes
                    $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]+$/";
                    if(!preg_match($patron, $tmp_apellidos)){
                        $err_apellidos = "El apellido solo puede contener letras y espacios en blanco";
                    } else {
                        $apellidos = $tmp_apellidos;
                    }
                }
            }
        }
        ?>

        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellido">
                <?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>" ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>