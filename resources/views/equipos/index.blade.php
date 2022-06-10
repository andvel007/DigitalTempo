@extends('app')
@section ('content')
<div class="container w-25 border p-4 mt-4">
        <form action="{{ route('equipos.store') }}" method="POST">
        @csrf     
        @if (session('success'))
            <h6 class="alert alert-success"> {{ session('success') }} </h6>
        @endif

        @error ('nombre')
         <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror


        <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name= 'nombre' class="form-control">

        </div>
        <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name= 'marca' class="form-control">

        </div>
        <div class="mb-10">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name= 'modelo' class="form-control">

        </div>
        <div class="mb-10">
                <label for="color" class="form-label">Color</label>
                <input type="text" name= 'color' class="form-control">

        </div>
        <div class="mb-8">
                <label for="serie" class="form-label">#Serie</label>
                <input type="text" name= 'serie' class="form-control">

        </div>
        <div class="mb-5">
                <label for="mac" class="form-label">MAC</label>
                <input type="text" name= 'mac' class="form-control">

        </div>
        <div class="mb-5">
                <label for="operativo" class="form-label">Sistema Operativo</label>
                <input type="text" name= 'operativo' class="form-control">

        </div>
        <div class="mb-5">
                <label for="cargador" class="form-label">Cargador</label>
                <input type="boolean" name= 'cargador' class="form-control">

        </div>
        <div class="mb-10">
                <label for="observacion" class="form-label">Observación</label>
                <input type="text" name= 'observacion' class="form-control">

        </div>
            <button type="submit" class="btn btn-primary">Crear Nuevo Equipo</button>
        </form>
        <div>
                @foreach ($equipos as $equipo)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route ('equipos-edit', ['id' => $equipo->id]) }}" > {{$usuarios->nombre}}</a>
                    </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('equipos-destroy' , [$equipo->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
                 @endforeach
    </div>
</div>
@endsection