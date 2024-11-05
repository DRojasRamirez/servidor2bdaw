<?php

function potencia($base, $expo){
    $resultado = 1;

    for($i = 0; $i < $expo; $i++){      
        $resultado = $base * $resultado;                
    }

    return $resultado;
}

?>