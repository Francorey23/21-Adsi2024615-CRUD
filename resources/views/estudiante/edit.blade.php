@extends('plantillaweb');
@section('seccionuno')
    <h3>Formulario Edicion Estudiantes {{$editarEstudiante->id}}</h3>

    <form action="{{route('estudiantes.update', $editarEstudiante)}}"  method="POST" enctype="multipart/form-data"> 
        @method('PUT')
        @csrf

        <input type="text" name="nombres" placeholder="Nombres completos" class="form-control" value="{{$editarEstudiante->nombres}}">
        <input type="email" name="email" placeholder="E mail" class="form-control" value="{{$editarEstudiante->email}}"> 
        <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" class="form-control" value="{{$editarEstudiante->fecha_nacimiento}}">
        <label>Fotografia </label>
        <input type="file" name="foto" placeholder="Foto" class="form-control" value="{{$editarEstudiante->foto}}"><br>
        <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
    </form>

@endsection