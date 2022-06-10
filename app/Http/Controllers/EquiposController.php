<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos= Equipo::all();
        return view ('equipos.index',['equipos'=>$equipos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required|max:255',
            'marca'=>'required|max:255',
            'modelo'=>'required|max:255',
            'color'=>'required|max:255',
            'serie' => 'required|max:10',
            'mac'=>'required|max:10',
            'operativo'=>'required|max:255',
            'cargador'=>'required|max:6',
            'observacion'=>'required|max:50'

        ]);
        $equipo = new Equipo;
        $equipos-> nombre = $request->nombre;
        $equipos-> marca= $request->marca;
        $equipos-> modelo= $request->modelo;
        $equipos-> color= $request->color;
        $equipos-> serie= $request->serie;
        $equipos-> mac= $request->mac;
        $equipos->operativo= $request->operativo;
        $equipos-> cargador= $request->cargador;
        $equipos-> observacion= $request->observacion;
        $equipos->save();
    
        return redirect()->route('equipos.index')-> with('success','Nuevo equipo agregado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);
        return view('equipos.show',['equipo'=>$equipo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipo= Equipo::find($id);
        $equipos-> nombre = $request->nombre;
        $equipos-> marca= $request->marca;
        $equipos-> modelo= $request->modelo;
        $equipos-> color= $request->color;
        $equipos-> serie= $request->serie;
        $equipos-> mac= $request->mac;
        $equipos->operativo= $request->operativo;
        $equipos-> cargador= $request->cargador;
        $equipos-> observacion= $request->observacion;
        $equipos->save();

        return redirect()->route('equipos.index')->with ('success','Equipo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo=Equipo::find($id);
        $equipo->delete();
        return redirect()->route('equipos.index')->with ('success','Equipo borrado');
    }
}
