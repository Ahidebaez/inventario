<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Rutas públicas (sin autenticación) para la vista 'index'
Route::get('/tipos', [TipoController::class, 'index'])->name('tipos.index');
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');

// Rutas para mostrar un tipo, equipo, usuario, área, movimiento específico
Route::get('/tipos/{tipo}', [TipoController::class, 'show'])->name('tipos.show');
Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/areas/{area}', [AreaController::class, 'show'])->name('areas.show');
Route::get('/movimientos/{movimiento}', [MovimientoController::class, 'show'])->name('movimientos.show');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Rutas para eliminar
    Route::delete('/tipos/{tipo}', [TipoController::class, 'destroy'])->name('tipos.destroy');
    // Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
    // Route::delete('/areas/{area}', [AreaController::class, 'destroy'])->name('area.destroy');
    Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipo.destroy');
    Route::delete('/movimientos/{movimiento}', [MovimientoController::class, 'destroy'])->name('movimiento.destroy');

    Route::get('/tipos/create', [TipoController::class, 'create'])->name('tipos.create');
    Route::post('/tipos', [TipoController::class, 'store'])->name('tipos.store');
    Route::get('/tipos/{tipo}/edit', [TipoController::class, 'edit'])->name('tipos.edit');
    // Ruta para actualizar un tipo
    Route::put('/tipos/{tipo}', [TipoController::class, 'update'])->name('tipos.update');


    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store'); // Crear 
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update'); // Actualizar
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); // Eliminar


    // Ruta para almacenar una nueva área
    Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');

    // Ruta para mostrar el formulario de edición de un área
    Route::get('/areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');

    // Ruta para actualizar un área existente
    Route::put('/areas/{area}', [AreaController::class, 'update'])->name('areas.update');

    Route::delete('/areas/{area}', [AreaController::class, 'destroy'])->name('area.destroy');


//     // Mostrar listado de equipos con búsqueda y paginación
// Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');

// Mostrar formulario para agregar un nuevo equipo
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');

// Guardar un nuevo equipo
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');

// Mostrar un equipo específico (Ver detalles)
// Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');

// Mostrar formulario para editar un equipo existente
Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');

// Actualizar los datos de un equipo existente
Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');

// Eliminar un equipo
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');



    // Puedes agregar más rutas protegidas si lo necesitas

    // Rutas para movimientos
// Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');
Route::post('/movimientos', [MovimientoController::class, 'store'])->name('movimientos.store');
// Route::get('/movimientos/{movimiento}', [MovimientoController::class, 'show'])->name('movimientos.show');
Route::put('/movimientos/{movimiento}', [MovimientoController::class, 'update'])->name('movimientos.update');
Route::delete('/movimientos/{movimiento}', [MovimientoController::class, 'destroy'])->name('movimientos.destroy');
});



Route::get('/', function () {
    return view('welcome');
});

// Solo me da un texto en la pagina principal #! comentando las rutas que tiene ya incluidas laravel con su vista y diseno 
//Route::get('/', function () {
//     return 'welcome';
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::resource('tipos', TipoController::class);
    // Route::resource('usuarios', UsuarioController::class);
    // Route::resource('areas', AreaController::class);
    // Route::resource('equipos', EquipoController::class);
    // Route::resource('movimientos', MovimientoController::class);
    // Añade aquí otras rutas que necesiten autenticación

   
        // Aquí van las rutas de tu dashboard o áreas protegidas
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
});

require __DIR__ . '/auth.php';
