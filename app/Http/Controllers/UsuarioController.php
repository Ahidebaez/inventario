<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $usuarios = Usuario::when($search, function ($query, $search) {
            $query->where('nombre_usuario', 'LIKE', '%' . $search . '%')
                  ->orWhere('correo', 'LIKE', '%' . $search . '%');
        })->get();
    
        return view('usuarios.index', compact('usuarios'));
    }

    // Resto de los métodos (create, store, show, edit, update, destroy)
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'nullable|string|max:20',
            'rol' => 'required|string|max:50',
        ]);

        Usuario::create($request->only(['nombre_usuario', 'correo', 'telefono', 'rol']));

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id); // Usa 'id' como clave primaria
        return view('usuarios.show', compact('usuario'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        // return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
{
    $request->validate([
        'nombre_usuario' => 'required|string|max:255',
        'correo' => 'required|email|unique:usuarios,correo,' . $usuario->id,
        'telefono' => 'nullable|string|max:20',
    ]);

    // Solo actualizamos los campos permitidos
    $usuario->update($request->only(['nombre_usuario', 'correo', 'telefono']));

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}