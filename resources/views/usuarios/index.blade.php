@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('usuarios') }}" method="POST">
        @csrf     
        @if (session('success'))
            <h6 class="alert alert-success"> {{ session('success') }} </h6>
        @endif

        @error ('nombre')
         <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
      


        <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Usuario</label>
                <input type="text" name= 'nombre' class="form-control">

        </div>
        <div class="mb-3">
                <label for="apellido" class="form-label">Apellido Usuario</label>
                <input type="text" name= 'apellido' class="form-control">

        </div>
        <div class="mb-10">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" name= 'cedula' class="form-control">

        </div>
        <div class="mb-10">
                <label for="correo" class="form-label">Correo</label>
                <input type="text" name= 'correo' class="form-control">

        </div>
        <div class="mb-8">
                <label for="password" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="exampleInputPassword1">

        </div>
        <div class="mb-5">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" name= 'provincia' class="form-control">

        </div>
        <div class="mb-5">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" name= 'ciudad' class="form-control">

        </div>
        <div class="mb-5">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name= 'direccion' class="form-control">

        </div>
        <div class="mb-10">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name= 'telefono' class="form-control">

        </div>
            <button type="submit" class="btn btn-primary">Crear Nuevo Usuario</button>
        </form>
        <div>
                @foreach ($usuarios as $usuario)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route ('usuarios-edit', ['id' => $usuario->id]) }}" > {{$usuarios->nombre}}</a>
                    </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('usuarios-destroy' , [$usuario->id]) }}" method="POST">
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