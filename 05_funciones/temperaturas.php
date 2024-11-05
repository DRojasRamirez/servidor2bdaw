
<?php

function convertirTemperatura($temperaturaInicial, $unidadInicial, $unidadFinal){
    
    $temperaturaFinal = $temperaturaInicial;

    if($unidadInicial == "C") {
        if($unidadFinal == "K") {
            $temperaturaFinal = $temperaturaInicial + 273.15;
        } elseif($unidadFinal == "F") {
            $temperaturaFinal = ($temperaturaInicial * (9/5)) + 32;
        }
    } elseif($unidadInicial == "K") {
        if($unidadFinal == "C") {
            $temperaturaFinal = $temperaturaInicial - 273.15;
        } elseif($unidadFinal == "F") {
            $temperaturaFinal = (($temperaturaInicial - 273.15) * (9/5)) + 32;
        }
    } elseif($unidadInicial == "F") {
        if($unidadFinal == "C") {
            $temperaturaFinal = ($temperaturaInicial - 32) / (9/5);
        } elseif($unidadFinal == "K") {
            $temperaturaFinal = ($temperaturaInicial - 32) / (9/5) + 273.15;
        }
    }

    return $temperaturaFinal;
}
?>


