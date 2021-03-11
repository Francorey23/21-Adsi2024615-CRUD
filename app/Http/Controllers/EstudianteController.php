<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vrdatosEstudiante = Estudiante::All();

        return view('estudiante.index', compact('vrdatosEstudiante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vrEstudiante = new Estudiante;

        $request->validate([
            'foto' => 'required|image|max:1024'
        ]);

        $imagenes = $request->file('foto')->store('public/imagenes');

        //return $imagenes;

        $url = Storage::url($imagenes);
        //return $url;

        //vrEstudiante trae lo que tiene el formulario
        //$request almacena lo que va a la BD
        $vrEstudiante->nombres = $request->nombres;
        $vrEstudiante->email = $request->email;
        $vrEstudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $vrEstudiante->foto = $url;

        $vrEstudiante->save();
        return view('estudiante.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editarEstudiante = Estudiante::Find($id);

        return view('estudiante.edit', compact('editarEstudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editarEstudiante = Estudiante::Find($id);

        //vrEstudiante trae lo que tiene el formulario
        //$request almacena lo que va a la BD
        $editarEstudiante->nombres = $request->nombres;
        $editarEstudiante->email = $request->email;
        $editarEstudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $editarEstudiante->foto = $request->foto;

        $editarEstudiante->save();
        return view('estudiante.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarE = Estudiante::Find($id);
        $eliminarE->delete();
        return back()->with('Mensaje', 'Estudiante eliminado');
    }
}
