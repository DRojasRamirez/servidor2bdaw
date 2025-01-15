<?php
    $_servidor = "localhost";
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_bd = "consolas_bd";

    try {
        $_conexion = new PDO("mysql:host=$_servidor;dbname=$_bd", $_usuario, $_contrasena);
        $_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOExeption $e){
        die("Error de conexion: " . $e -> getMessage());
    }


?>