<?php

DEFINE("TRAMO1" , 12450);
DEFINE("TRAMO2" , 20199);
DEFINE("TRAMO3" , 35199);
DEFINE("TRAMO4" , 59999);
DEFINE("TRAMO5" , 299999);

function calcularIRPF( int|float $bruto) : float {
    $resto;
    $neto;

    if ($bruto <= TRAMO1){
        $neto = $bruto - ($bruto * 0.19);
    } else if ($bruto > TRAMO1 && $bruto <= TRAMO2){
        $resto = $bruto - TRAMO1;
        $neto = $bruto - (TRAMO1 * 0.19) - ($resto * 0.24);
    } else if($bruto > TRAMO2 && $bruto <= TRAMO3){
        $resto = $bruto - TRAMO2;
        $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ($resto * 0.3);
    } else if($bruto > TRAMO3 && $bruto <= TRAMO4){
        $resto = $bruto - TRAMO3;
        $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ((TRAMO3-TRAMO2) * 0.3) - ($resto * 0.37);
    } else if($bruto > TRAMO4 && $bruto <= TRAMO5){
        $resto = $bruto - TRAMO4;
        $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ((TRAMO3-TRAMO2) * 0.3) - ((TRAMO4-TRAMO3) * 0.37) - ($resto * 0.45);
    } else if($bruto > TRAMO5){
        $resto = $bruto - TRAMO5;
        $neto = $bruto - (TRAMO1 * 0.19) - ((TRAMO2-TRAMO1) * 0.24) - ((TRAMO3-TRAMO2) * 0.3) - ((TRAMO4-TRAMO3) * 0.37) - ((TRAMO5-TRAMO4) * 0.45) - ($resto * 0.47);
    } 
    return $neto;
}



?>