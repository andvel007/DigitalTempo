<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nombre'=> 'required|min:3',
            'apellido'=> 'required|min:3',
            'cedula'=> 'required|min:10',
            'correo'=> 'required|min:10',
            'password'=> 'required|min:8',
            'provincia'=> 'required|min:5',
            'provincia'=> 'required|min:5',
            'ciudad'=> 'required|min:5',
            'direccion'=> 'required|min:10',
            'telefono'=> 'required|min:10'
        ]);
        $usuario= new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->correo = $request->correo;
        $usuario->password = $request->password;
        $usuario->provincia = $request->provincia;
        $usuario->ciudad = $request->ciudad;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->save();
    
        return redirect()->route('usuarios')->with('success', 'Usuario creado correctamente');
      }  
      public function index(){
        $usuarios = Usuario ::all();
        return view('usuarios.index', ['usuarios'=> $usuarios]);
      }
      public function show($id){
        $usuario = Usuario ::find($id);
        return view('usuarios.show', ['usuario' => $usuario]);
      }
      public function update(Request $request, $id){
        $usuario = Usuario ::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->correo = $request->correo;
        $usuario->password = $request->password;
        $usuario->provincia = $request->provincia;
        $usuario->ciudad = $request->ciudad;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->save();
        return redirect()-> route('usuarios')-> with ( 'success', 'usuario actualizado!');
      }
      public function destroy($id){
        $usuario = Usuario ::find($id);
        $usuario->delete();
        return redirect()-> route('usuarios')-> with ( 'success', 'usuario Eliminado!');
      }
}
