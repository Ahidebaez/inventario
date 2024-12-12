<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    
    // Si se realiza una búsqueda, aplicamos el filtro
    if ($search) {
        $tipos = Tipo::where('nombre_tipo', 'like', '%' . $search . '%')->paginate(100);  // Pagina los resultados
    } else {
        $tipos = Tipo::paginate(100);  // Pagina todos los resultados si no hay búsqueda
    }

    return view('tipos.index', compact('tipos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // No es necesario tener un formulario separado si estás usando el mismo formulario de index para crear o editar
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre_tipo' => 'required|string|max:255',
        ]);

        // Crear el nuevo tipo
        Tipo::create([
            'nombre_tipo' => $request->nombre_tipo,
        ]);

        // Redirigir a la lista de tipos con mensaje de éxito
        return redirect()->route('tipos.index')->with('success', 'Tipo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        return view('tipos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        // Obtener todos los tipos para mostrar en la lista
        $tipos = Tipo::all();
    
        // Pasar ambos, el tipo específico y la lista de todos los tipos, a la vista
        return view('tipos.index', compact('tipos', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        // Validación de datos
        $request->validate([
            'nombre_tipo' => 'required|string|max:255',
        ]);

        // Actualizar el tipo con los nuevos datos
        $tipo->update([
            'nombre_tipo' => $request->nombre_tipo,
        ]);

        // Redirigir a la lista de tipos con mensaje de éxito
        return redirect()->route('tipos.index')->with('success', 'Tipo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        // Eliminar el registro de la base de datos
        $tipo->delete();
    
        // Redirigir a la lista de tipos con un mensaje de éxito
        return redirect()->route('tipos.index')->with('success', 'Tipo eliminado correctamente.');
    }
}