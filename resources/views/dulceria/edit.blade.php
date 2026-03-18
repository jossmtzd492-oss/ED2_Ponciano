<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <!-- usar todos los elementos de layout -->
    @extends('layouts.app')
    @section('content')
    <h1>Registrar paquetes o productos</h1>
    
    <form action="{{ route('dulceria.update', $dulceria) }}" method="POST">

        <!--- Uso obligatorio para enviar info en formularios--->
        @csrf
        @method('PUT')

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-candy-cane"></i></span>
            <input type="text" name="Nombre" placeholder="Nombre" value="{{ $dulceria->Nombre }}" class="form-control">
        </div>

       <div class="form-check">
            <input type="checkbox" name="Disponibilidad" value="1" value="{{ $dulceria->Disponibilidad }}" >
            <label >Producto disponible</label>
            
        </div>

       <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
             <input type="number" min=0.5 name="Precio" placeholder="Precio"  value="{{ $dulceria->Precio }}"  class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
             <input type="text" name="Descripcion" placeholder="Descripcion"  value="{{ $dulceria->Descripcion }}"  class="form-control">
        </div>

        <select class="form-select" size="3" name="TipoAlimento"  value="{{ $dulceria->TipoAlimento }}"  aria-label="size 3 select example">
            <span><i class="fa-solid fa-bowl-rice"></i></span>
            <option selected>Selecciona una opción</option>
            <option value="Individual">Individual</option>
            <option value="Combo">Combo</option>
        </select>

        <select class="form-select" size="3" name="Categoria"  value="{{ $dulceria->Categoria }}" aria-label="size 3 select example">
            <span><i class="fa-solid fa-tag"></i></span>
            <option selected>Selecciona una opción</option>
            <option value="Snacks">Snacks</option>
            <option value="Helados">Helados</option>
            <option value="Dulces">Dulces</option>
            <option value="Promocionales">Promocionales</option>
        </select>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-box"></i></span>
             <input type="number" min=0 name="Stock" placeholder="Stock"  value="{{ $dulceria->Stock }}" class="form-control">
        </div>


        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
    </form>
    @endsection
</body>
</html>