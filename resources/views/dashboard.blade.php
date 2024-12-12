<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    @section('content')
        <div class="text-center">
            <h2 class="mb-4">¡Bienvenido al sistema de inventarios de Equipo De Computo e Inmobiliario!</h2>
        </div>

        <!-- Carrusel de Bootstrap -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/imagen1.jpg') }}" class="d-block w-50" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/imagen2.jpg') }}" class="d-block w-40" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/imagen3.jpg') }}" class="d-block w-55" alt="Imagen 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </a>
        </div>

       

    @endsection

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
