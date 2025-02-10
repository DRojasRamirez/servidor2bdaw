<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheController extends Controller {

    public function index () {

        $coches = [
            ["RX7", "Mazda", 50000],
            ["Mustang", "Ford", 60000],
            ["307", "Peugeot", 22000],
            ["Ibiza", "Seat", 20000],
        ];

        return view("coches", ["coches" => $coches]);
    }

}
