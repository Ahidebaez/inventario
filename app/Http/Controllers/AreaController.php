<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $areas = Area::where('nombre_area', 'LIKE', '%' . $search . '%')
                ->orWhere('ubicacion', 'LIKE', '%' . $search . '%')
                ->paginate(3); // Paginación de 3 resultados por página
        } else {
            $areas = Area::paginate(3); // Paginación de 3 resultados por página
        }
    
        return view('areas.index', compact('areas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre_area' => 'required|string|max:100',
        'ubicacion' => 'required|string|max:100',
    ]);

    Area::create($validated);
    return redirect()->route('areas.index')->with('success', 'Área agregada correctamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(Area $area)
{
    return view('areas.show', compact('area'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_area)
{
    $validated = $request->validate([
        'nombre_area' => 'required|string|max:100',
        'ubicacion' => 'required|string|max:100',
    ]);

    $area = Area::findOrFail($id_area);
    $area->update($validated);
    return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
{
    // Eliminar el registro de la base de datos
    $area->delete();
    
    // Redirigir a la lista de áreas con un mensaje de éxito
    return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente.');
}
    
}






