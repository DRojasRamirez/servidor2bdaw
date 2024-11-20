<?php
    function repetirMensaje($veces, $mensaje){
        for($i = 0; $i < $veces; $i++){           
            echo "<h1>$mensaje</h1>";
        }
    }
?>