<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
       /* $marcas = [
            "Puleva",
            "Asturiana",
            "Covap",
            "Hacendado",
            "Dia",
            "Milbona"
        ];*/

        $marcas = Marca::all();

        return view("marcas/index", ["marcas" => $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("marcas/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $marca = new Marca;
        $marca -> marca = $request -> input("marca");
        $marca -> anno_fundacion = $request -> input("anno_fundacion");
        $marca -> pais = $request -> input("pais");
        $marca -> save();

        return redirect("/marcas");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marca = Marca::find($id);

        return view("marcas/show", ["marca" => $marca]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca = Marca::find($id);

        return view("marcas/edit", ["marca" => $marca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $marca = Marca::find($id);

        $marca -> marca = $request -> input("marca");
        $marca -> anno_fundacion = $request -> input("anno_fundacion");
        $marca -> pais = $request -> input("pais");
        $marca -> save();

        return redirect("/marcas");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = Marca::find($id);

        $marca -> delete();

        return redirect("/marcas");
    }
}
