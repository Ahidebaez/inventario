<?php
namespace App\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search'); // Obtener el término de búsqueda

        $movimientos = Movimiento::with(['usuario', 'equipo'])
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                            ->orWhere('fecha_movimiento', 'like', "%{$search}%")
                            ->orWhere('tipo_movimiento', 'like', "%{$search}%")
                            ->orWhereHas('usuario', function ($query) use ($search) {
                                $query->where('id', 'like', "%{$search}%"); // Buscar por id de usuario
                            })
                            ->orWhereHas('equipo', function ($query) use ($search) {
                                $query->where('id', 'like', "%{$search}%"); // Buscar por id de equipo
                            });
            })
            ->paginate(10); // Paginación de 10 resultados por página

        return view('movimientos.index', compact('movimientos', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_movimiento' => 'required|date',
            'tipo_movimiento' => 'required|string',
            'usuario' => 'required|integer',
            'equipo' => 'required|integer',
            'observaciones' => 'nullable|string',
        ]);

        try {
            Movimiento::create($validatedData);
            return redirect()->route('movimientos.index')->with('success', 'Movimiento creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('movimientos.index')->with('error', 'Error al crear el movimiento.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        $validatedData = $request->validate([
            'fecha_movimiento' => 'required|date',
            'tipo_movimiento' => 'required|string',
            'usuario' => 'required|integer',
            'equipo' => 'required|integer',
            'observaciones' => 'nullable|string',
        ]);
    
        try {
            $movimiento->update($validatedData);
            return redirect()->route('movimientos.index')->with('success', 'Movimiento actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('movimientos.index')->with('error', 'Error al actualizar el movimiento.');
        }
    }


    public function show(Movimiento $movimiento)
    {
        return view('movimientos.show', compact('movimiento'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimiento $movimiento)
    {
        try {
            $movimiento->delete();
            return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('movimientos.index')->with('error', 'Hubo un error al eliminar el movimiento.');
        }
    }
}
