<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga</title>
</head>
<body>
    <?php
    /*
        Equipos de la liga

        - Nombre (letras con tilde, ñ, espacios en blanco y punto, maximo 40 caracteres, minimo 2)
        - Inicial (3 letras)
        - Liga (select con las opciones: Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)
        - Ciudad (letras con tilde, ñ, ç y espacios en blanco)
        - Tiene titulo liga (select con si o no)
        - Fecha de fundación (entre hoy y el 18 de diciembre de 1889)
        - Número de jugadores (entre 19 y 32)
    */

    





    ?>

        <form class="col-5" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Iniciales</label>
                <input type="text" class="form-control" name="iniciales">
                <?php if(isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Liga</label>
                <select name="liga">
                    <option value="ea">Liga EA Sports</option>
                    <option value="hyper">Liga Hypermotion</option>
                    <option value="rfef">Liga Primera RFEF</option>
                </select>
                <input type="hidden" name="accion" value="formulario_divisiones">
                <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>" ?>
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

</body>
</html>