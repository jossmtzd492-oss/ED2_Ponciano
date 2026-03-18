<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA </title>
</head>
<body>
    <!-- usar todos los elementos de layout -->
    @extends('layouts.app')
    @section('content')
    <center><h1>VER DULCES</h1></center>

    <br>

    <div class="d-flex justify-content-end mb-2" >
        <a href=" {{ route('dulceria.create') }}">
            <button class="btn btn-outline-success mb-3 me-3"><i class="fa-solid fa-plus"></i> Nuevo dulce</button>
        </a>

        <form action="{{ route('cerrar') }}" method="POST">
            @csrf 
            <button class="btn btn-outline-danger me-3">Cerrar sesion</button>
        </form>
        <!-- Verificar si la sesion esta activa -->
        @if(auth()->user()->is_admin)

            <a href="{{ route('admin-dashboard') }}" class="btn btn-outline-secondary me-3 mb-3">
                <i class="fa-solid fa-shield"></i>Panel Admin
            </a>

        @endif
    </div>

    @include('partials.alerts')

    
    <table border="1" class="table table-striped table-hover">
        <thead>
            <tr> 
                <th>ID</th>
                <th>Nombre</th>
                <th>Disponibilidad</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Tipo de alimento</th>
                <th>Categoria de alimento</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--!: CICLO PARA RECORRER LOS DATOS DEL MODELO -->
            @foreach ($dulceria as $dulceria)

                <tr>
                    <td> {{ $dulceria->id}}</td>
                    <td> {{ $dulceria->Nombre}}</td>
                    <td> {{ $dulceria->Disponibilidad}}</td>
                    <td> {{ $dulceria->Precio}}</td>
                    <td> {{ $dulceria->Descripcion}}</td>
                    <td> {{ $dulceria->TipoAlimento}}</td>
                    <td> {{ $dulceria->Categoria}}</td>
                    <td> {{ $dulceria->Stock}}</td>
                    
                    <td> 
                        <a href="{{ route('dulceria.edit', $dulceria) }}">
                            <button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        
                        <form action="{{ route('dulceria.destroy', $dulceria) }}" method="POST" class="d-inline">
                            @csrf 
                            @method('DELETE')

                            <button 
                            class="btn btn-outline-danger" onclick="return confirm('Eliminar el registro')">
                            <i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>