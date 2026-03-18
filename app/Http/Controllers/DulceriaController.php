<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DulceriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dulceria = Dulceria::all();

        return view('dulceria.index', compact('dulceria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dulceria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dulceria::create([
            'Nombre' => $request->Nombre,
            'Precio' => $request->Precio,
            'Descripcion' => $request->Descripcion,
            'TipoAlimento' => $request->TipoAlimento,
            'Categoria' => $request->Categoria,
            'Stock' => $request->Stock,
        ]);

        return redirect()->route('dulceria.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dulceria $dulceria)
    {
        return view('dulceria.edit', compact('dulceria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dulceria $dulceria)
    {
        $request->validate([
            'Nombre' => 'required',
            'Precio' => 'required',
            'Descripcion' => 'required',
            'TipoAlimento' => 'required',
            'Categoria' => 'required',
            'Stock' => 'required',
        ]);

        $dulceria->update($request->all());

        return redirect()->route('dulceria.index')
        ->with('success','Paquete o producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dulceria $dulceria)
    {
        $dulceria->delete();

        return redirect()->route('dulceria.index')
        ->with('success', '¡Paquete o producto eliminado exitosamente!');
    }
}
