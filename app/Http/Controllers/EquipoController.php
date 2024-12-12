<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Captura el valor del buscador.

        // Construye la consulta con filtro de búsqueda si es necesario.
        $equipos = Equipo::query();

        if ($search) {
            $equipos->where('nombre_equipo', 'LIKE', '%' . $search . '%')
                ->orWhere('descripcion', 'LIKE', '%' . $search . '%')
                ->orWhere('estado', 'LIKE', '%' . $search . '%');
        }

        $equipos = $equipos->paginate(10); // Implementa la paginación.

        return view('equipos.index', compact('equipos', 'search')); // Pasa la búsqueda para mantenerla en el formulario.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create'); // Muestra el formulario para agregar un equipo.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
            'fecha_adquisicion' => 'required|date',
            'area' => 'required|integer',
            'tipo_equipo' => 'required|integer',
        ]);

        Equipo::create($data); // Crea un nuevo registro en la base de datos.

        return redirect()->route('equipos.index')->with('success', 'Equipo creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        return view('equipos.show', compact('equipo')); // Muestra los detalles de un equipo específico.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo')); // Muestra el formulario para editar un equipo.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {
        $data = $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
            'fecha_adquisicion' => 'required|date',
            'area' => 'required|integer',
            'tipo_equipo' => 'required|integer',
        ]);

        $equipo->update($data); // Actualiza el registro en la base de datos.

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete(); // Elimina el registro.

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado con éxito.');
    }
}