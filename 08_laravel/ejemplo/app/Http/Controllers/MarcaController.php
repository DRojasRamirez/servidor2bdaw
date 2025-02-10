<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller {
    public function index () {

        $marcas = [
            "Puleva",
            "Asturiana",
            "Covap",
            "Hacendado",
            "Dia",
            "Milbona"
        ];

        return view("marcas", ["marcas" => $marcas]);
    }
}
