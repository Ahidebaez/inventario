<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infoteca</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <!-- Encabezado -->
    <header class="bg-danger text-white">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <div class="d-flex align-items-center">
                <!-- Logotipo -->
                <img src="{{ asset('images/logo.jpg') }}" alt="Logotipo Infoteca" class="me-3"
                    style="width: 150px; height: 150px; object-fit: cover;">
                <h1 class="h3 mb-0">Infoteca Pedro Ferriz Santa Cruz</h1>
            </div>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('tipos.index') }}">Tipos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('equipos.index') }}">Equipos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white"
                            href="{{ route('usuarios.index') }}">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('areas.index') }}">Áreas</a></li>
                    <li class="nav-item"><a class="nav-link text-white"
                            href="{{ route('movimientos.index') }}">Movimientos</a></li>
                    <!-- Botones de logout y register -->
                    <div class="text-center mt-4">
                        @if (Auth::check())
                            <!-- Cerrar sesión -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Cerrar sesión</button>
                            </form>
                        @else
                            <!-- Enlace a registro -->
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Registrar nuevo usuario</a>
                            @endif
                        @endif
                    </div>
                </ul>

            </nav>
        </div>

    </header>

    <!-- Contenido principal -->
    <div class="container my-4">
        <!-- Mostrar información del usuario -->
        @if(auth()->check())
        <div class="alert alert-info text-center">
            <p>
                Bienvenido, <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})
            </p>
            <p>
                Tu rol es: 
                <span class="badge bg-dark text-white">
                    {{ auth()->user()->role }}
                </span>
            </p>
        </div>
        @endif
    </div>
        @yield('content') <!-- Sección donde se cargará el contenido de cada página -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-1"><strong></strong> Infoteca Pedro Ferriz Santa Cruz (Centro Cultural)</p>
            <p class="mb-1"><strong>Dirección:</strong> Calle Prol. Matamoros, Ocampo esquina, Colonia Zona Centro,
                C.P. 26000</p>
            <p class="mb-1"><strong>Ciudad y Estado:</strong> Piedras Negras, Coahuila</p>
            <p><strong>Teléfono:</strong> 878-786-2845</p>
        </div>
        <p class="mt-3">© {{ date('Y') }} Infoteca Pedro Ferriz Santa Cruz. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Incluye Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
