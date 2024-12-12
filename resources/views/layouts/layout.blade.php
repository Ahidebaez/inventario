<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infoteca</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100"> <!-- Usamos Flexbox para asegurar que el contenido llena toda la pantalla -->
    @auth
       
             <!-- Encabezado -->
<header class="bg-danger text-white">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <div class="d-flex align-items-center">
            <!-- Logotipo -->
            <img src="{{ asset('images/logo.jpg') }}" alt="Logotipo Infoteca" class="me-3" style="width: 150px; height: 150px; object-fit: cover;">
            <h1 class="h3 mb-0">Infoteca Pedro Ferriz Santa Cruz</h1>
        </div>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('tipos.index') }}">Tipos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('equipos.index') }}">Equipos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('areas.index') }}">Áreas</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('movimientos.index') }}">Movimientos</a></li>
            </ul>
        
        </nav>
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

    </div>
</header>
    
     

        <!-- Contenido principal -->
        {{-- <div class="container my-4 flex-grow-1"> <!-- Asegura que el contenido crezca y empuje el footer -->
            <div class="row">
                <!-- Buscador (Formulario) a la izquierda -->
                <div class="col-md-4">
                    <h4></h4>
                    <form>
                       
                    </form>
                </div>  --}}

                <!-- Tabla a la derecha -->
                <div class="col-md-8">
                    <h4></h4>
                      <!-- Mostrar información del usuario -->
@if(auth()->check())
<div class="alert alert-info text-center">
    <p>
        Bienvenido, <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})
    </p>
    <p>
        Tu rol es: 
        <span class="badge badge-{{ auth()->user()->role === 'Administrador' ? 'success' : 'primary' }}">
            {{ auth()->user()->role }}
        </span>
    </p>
</div>
@endif
                    
                    @yield('content')
                </div>
            </div>
        </div>

        

    @else
        <!-- Redirección a la página de inicio de sesión si no está autenticado -->
        <script>window.location.href = "{{ route('login') }}";</script>
    @endauth

    

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Incluye Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
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

</html>