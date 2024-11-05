<?php
DEFINE("GENERAL" , 1.21);
DEFINE("REDUCIDO" , 1.1);
DEFINE("SUPERREDUCIDO" , 1.04);

function calcularIVA(string $iva, int|float $precio) : float {
    $pvp = match ($iva) {
        "general" => $precio * GENERAL,
        "reducido" => $precio * REDUCIDO,
        "superreducido" => $precio * SUPERREDUCIDO,
        default => "ERROR"
    };
    
    return $pvp;
}


?>