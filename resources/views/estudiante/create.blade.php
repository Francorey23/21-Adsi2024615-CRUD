@extends('plantillaweb')
    @section('seccionuno')
    
    <h2>Formulario para registro de estudiantes</h2>

    <form action="{{url('/estudiantes')}}" method="POST" enctype="multipart/form-data"> 
        @csrf 
    
        <input type="text" name="nombres" placeholder="Nombres completos" class="form-control">
        <input type="email" name="email" placeholder="E mail" class="form-control">
        <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" class="form-control">
        <label>Fotografia </label>
        <input type="file" name="foto" placeholder="Foto" class="form-control" accept="image/*"><br>
        <button class="btn btn-primary btn-block" type="submit">Insertar</button>

    </form>


    @endsection